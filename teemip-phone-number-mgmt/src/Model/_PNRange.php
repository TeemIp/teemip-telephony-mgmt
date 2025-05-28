<?php
/*
 * @copyright   Copyright (C) 2010-2025 TeemIp
 * @license     http://opensource.org/licenses/AGPL-3.0
 */

namespace TeemIp\TeemIp\Extension\PhoneNumberManagement\Model;

use CMDBObjectSet;
use Combodo\iTop\Service\Events\EventData;
use DBObjectSearch;
use DBObjectSet;
use DBSearch;
use Dict;
use MetaModel;
use PNObject;
class _PNRange extends PNObject {
    /**
     * Handler for EVENT_DB_COMPUTE_VALUES event
     *
     * @param EventData $oEventData
     * @return void
     */
    public function OnPNRangeComputeValuesRequestedByPhoneNumberMgmt(EventData $oEventData): void
    {
        $aEventData = $oEventData->GetEventData();
        if ($aEventData['is_new']) {
            // At creation, compute parent_id only in the case where no delegation is done.
            $iParentOrgId = $this->Get('parent_org_id');
            if ($iParentOrgId == 0) {
                $iOrgId = $this->Get('org_id');
                $sFirstNumber = $this->Get('firstnumber');
                $sLastNumber = $this->Get('lastnumber');

                // Look for all ranges containing the new range
                // Pick the smallest one
                $sOQL = "SELECT PNRange AS r WHERE r.firstnumber <= :firstnumber AND :lastnumber <= r.lastnumber AND r.org_id = :org_id";
                $oPNRangeSet = new CMDBObjectSet(DBObjectSearch::FromOQL($sOQL), array(), array(
                    'firstnumber' => $sFirstNumber,
                    'lastnumber' => $sLastNumber,
                    'org_id' => $iOrgId,
                ));
                $iMinSize = 0;
                $iNewParentId = 0;
                while ($oPNRange = $oPNRangeSet->Fetch()) {
                    $iPNRangeSize = $oPNRange->GetSize();
                    if (($iMinSize == 0) || ($iPNRangeSize < $iMinSize)) {
                        $iMinSize = $iPNRangeSize;
                        $iNewParentId = $oPNRange->GetKey();
                    }
                }
                $this->Set('parent_id', $iNewParentId);
            }
        }
    }

    /**
     * Handler for EVENT_DB_SET_ATTRIBUTES_FLAGS event
     *
     * @param EventData $oEventData
     * @return void
     */
    public function OnPNRangeSetAttributesFlagsRequestedByPhoneNumberMgmt(EventData $oEventData): void
    {
        $this->AddAttributeFlags('org_id', OPT_ATT_READONLY);
        $this->AddAttributeFlags('occupancy', OPT_ATT_READONLY);
        $this->AddAttributeFlags('parent_org_id', OPT_ATT_READONLY);
        $this->AddAttributeFlags('parent_id', OPT_ATT_READONLY);
        $this->AddAttributeFlags('firstnumber', OPT_ATT_READONLY);
        $this->AddAttributeFlags('lastnumber', OPT_ATT_READONLY);
    }

    /**
     * Handler for EVENT_DB_CHECK_TO_WRITE event
     *
     * @param EventData $oEventData
     * @return void
     */
    public function OnPNRangeCheckToWriteRequestedByPhoneNumberMgmt(EventData $oEventData): void
    {
        $sFirstNumber = $this->Get('firstnumber');
        $sLastNumber = $this->Get('lastnumber');

        // Make sure first number is smaller than last one
        if ($sFirstNumber > $sLastNumber) {
            $this->AddCheckIssue(Dict::Format('UI:PNManagement:Action:New:PNRange:Reverted'));
            return;
        }

        // Make sure range is fully and strictly contained in requested parent range, if any
        $iParentId = $this->Get('parent_id');
        if ($iParentId > 0) {
            $oParent = MetaModel::GetObject('PNRange', $iParentId);
            if ($oParent) {
                $sParentFirstNumber = $oParent->Get('firstnumber');
                $sParentLastNumber = $oParent->Get('lastnumber');
                if (($sFirstNumber < $sParentFirstNumber) || ($sParentLastNumber < $sLastNumber) || (($sFirstNumber == $sParentFirstNumber) && ($sParentLastNumber == $sLastNumber))) {
                    $this->AddCheckIssue(Dict::Format('UI:PNManagement:Action:New:PNRange:NotInParent'));
                    return;
                }
            }
        }

        // Make sure range doesn't collide with another range attached to the same parent.
        //		If no parent is specified (null), then check is done with all such ranges with no parent specified.
        //		It is done on ranges belonging to the same parent otherwise
        $iId = $this->GetKey();
        $iOrgId = $this->Get('org_id');
        $sOQL = "SELECT PNRange AS r WHERE r.parent_id = :parent_id AND (r.org_id = :org_id OR r.parent_org_id = :org_id) 
                 UNION SELECT PNRange AS r WHERE IF (:parent_id = 0, r.parent_org_id != 0 AND r.org_id = :org_id, 0)";
        $oPNRangeSet = new CMDBObjectSet(DBObjectSearch::FromOQL($sOQL), array(), array(
            'parent_id' => $iParentId,
            'id' => $iId,
            'org_id' => $iOrgId,
        ));
        while ($oPNRange = $oPNRangeSet->Fetch()) {
            $sCurrentFirstNumber = $oPNRange->Get('firstnumber');
            $sCurrentLastNumber = $oPNRange->Get('lastnumber');

            // Does the range already exist?
            // Note that case where org_id are the same is already covered by unicity rule
            if (($oPNRange->Get('org_id') == $this->Get('parent_org_id')) && ($sCurrentFirstNumber == $sFirstNumber) && ($sCurrentLastNumber == $sLastNumber)) {
                $this->AddCheckIssue(Dict::Format('UI:PNManagement:Action:New:PNRange:Collision0'));
                return;
            }
            // Is new first # part of an existing range?
            if (($sCurrentFirstNumber < $sFirstNumber) && ($sFirstNumber <= $sCurrentLastNumber)) {
                $this->AddCheckIssue(Dict::Format('UI:PNManagement:Action:New:PNRange:Collision1'));
                return;
            }
            // Is new last Ip part of an existing range?
            if (($sCurrentFirstNumber <= $sLastNumber) && ($sLastNumber < $sCurrentLastNumber)) {
                $this->AddCheckIssue(Dict::Format('UI:PNManagement:Action:New:PNRange:Collision2'));
                return;
            }
        }

        // Make sure range doesn't contain any range delegated from another organization
        $sOQL = "SELECT PNRange AS r WHERE :firstnumber <= r.firstnumber AND r.lastnumber <= :lastnumber AND r.org_id = :org_id AND r.parent_org_id > 0";
        $oPNRangeSet = new CMDBObjectSet(DBObjectSearch::FromOQL($sOQL), array(), array(
            'firstnumber' => $sFirstNumber,
            'lastnumber' => $sLastNumber,
            'org_id' => $iOrgId,
        ));
        if ($oPNRangeSet->CountExceeds(0)) {
            $this->AddCheckIssue(Dict::Format('UI:PNManagement:Action:Delegate:PNRange:ConflictWithDelegatedBlockFromOtherOrg'));
            return;
        }

        // If block is delegated straight away
        $iParentOrgId = $this->Get('parent_org_id');
        if ($iParentOrgId != 0) {
            // FIXME See later

        }
    }

    /**
     * Handler for EVENT_DB_AFTER_WRITE event
     *
     * @param EventData $oEventData
     * @return void
     */
    public function OnPNRangeAfterWriteRequestedByPhoneNumberMgmt(EventData $oEventData): void
    {
        $iId = $this->GetKey();
        $iOrgId = $this->Get('org_id');
        $iParentOrgId = $this->Get('parent_org_id');
        $sFirstNumber = $this->Get('firstnumber');
        $sLastNumber = $this->Get('lastnumber');

        $aEventData = $oEventData->GetEventData();
        if ($aEventData['is_new']) {
            // Look for all ranges attached to the parent of the range being created and contained in it
            // Attach them to the new range
            $sOQL = "SELECT PNRange AS r WHERE r.parent_id = :paren_id AND :firstnumber <= r.firstnumber AND r.lastnumber <= :lastnumber AND (r.org_id = :org_id OR r.parent_org_id = :org_id) AND r.id != :id";
            $oPNRangeSet = new CMDBObjectSet(DBObjectSearch::FromOQL($sOQL), array(), array(
                'firstnumber' => $sFirstNumber,
                'lastnumber' => $sLastNumber,
                'org_id' => $iOrgId,
                'id' => $iId,
            ));
            while ($oPNRange = $oPNRangeSet->Fetch()) {
                $oPNRange->Set('parent_id', $iId);
                $oPNRange->DBUpdate();
            }

            // If range is delegated, look for ranges at the top of the tree, in the same org, that are contained within the new range
            // Attach them to the new range
            if ($iParentOrgId != 0) {
                $sOQL = "SELECT PNRange AS r WHERE r.parent_id = 0 AND :firstnumber <= r.firstnumber AND r.lastnumber <= lastnumber AND r.org_id = :org_id";
                $oPNRangeSet = new CMDBObjectSet(DBObjectSearch::FromOQL($sOQL), array(), array(
                    'firstnumber' => $sFirstNumber,
                    'lastnumber' => $sLastNumber,
                    'org_id' => $iOrgId,
                ));
                while ($oPNRange = $oPNRangeSet->Fetch()) {
                    $oPNRange->Set('parent_id', $iId);
                    $oPNRange->DBUpdate();
                }
            }
        }
    }

    /**
     * Compute the size f the range
     *
     * @return int
     */
    public function GetSize(): int
    {
        $sFirstNumber = $this->Get('firstnumber');
        $sLastNumber = $this->Get('lastnumber');
        return ($sLastNumber - $sFirstNumber + 1);
    }

    /**
     * Compute the occupancy percentage
     *
     * @return int
     */
    public function GetOccupancy(): int
    {
        $sOQL = "SELECT PhoneNumber AS p WHERE pnrange_id = :id";
        $oPhoneNumberSet = new CMDBObjectSet(DBObjectSearch::FromOQL($sOQL), array(), array('id' => $this->GetKey()));
        $iSize = $this->GetSize();

        return ($oPhoneNumberSet->Count() / $iSize) * 100;
    }

    /**
     * Returns index to be used within tree computations
     *
     * @return int
     * @throws \ArchivedObjectException
     * @throws \CoreException
     */
    public function GetIndexForTree() {
        return $this->Get('firstnumber');
    }

    /**
     * Get PNRange in the node of a hierarchical tree
     *
     * @param $bWithIcon
     * @param $iTreeOrgId
     * @return string
     */
    public function GetAsLeaf($bWithIcon, $iTreeOrgId) {
        $sHtml = '';
        $sHtml .= "&nbsp;".$this->GetHyperlink();
        $sHtml .= "&nbsp;&nbsp;&nbsp;[".$this->Get('firstnumber')." - ".$this->Get('lastnumber')."]";
//        $sHtml .= "&nbsp;&nbsp;&nbsp;".$this->GetAsHTML('ipblocktype_name');

        // Display delegation information if required
        $iOrgId = $this->Get('org_id');
        $iParentOrgId = $this->Get('parent_org_id');
        if ($iParentOrgId != 0) {
            if ($iTreeOrgId == $iOrgId) {
                // Range is delegated from parent org
                $sHtml .= "&nbsp;&nbsp;&nbsp; - ".Dict::Format('Class:IPBlock:DelegatedFromParent', $this->GetAsHTML('parent_org_id'));
            } else {
                // Range is delegated to child org
                $sHtml .= "&nbsp;&nbsp;&nbsp; - ".Dict::Format('Class:IPBlock:DelegatedToChild', $this->GetAsHTML('org_id'));
            }
        }

        return $sHtml;
    }

    /**
     * Check if PNRange is delegated
     *
     * @return bool
     */
    public function IsDelegated(): bool
    {
        return ($this->Get('parent_org_id') == 0) ? false : true;
    }

    /**
     * Delegate PNRange
     *
     * @param $aParam
     * @return void
     */
    public function DoDelegate($aParam) {
        $iOrgId = $this->Get('org_id');
        $iChildOrgId = $aParam['child_org_id'];

        $this->Set('parent_org_id', $iOrgId);
        $this->Set('org_id', $iChildOrgId);
        $this->DBUpdate();
    }

    /**
     * Undelegate PNRange
     *
     * @return void
     */
    public function DoUndelegate() {
        $iParentOrgId = $this->Get('parent_org_id');

        $this->Set('parent_org_id', 0);
        $this->Set('org_id', $iParentOrgId);
        $this->DBUpdate();
    }

    /**
     * Return next operation after current one
     *
     * @param $sOperation
     *
     * @return string
     */
    public function GetNextOperation($sOperation) {
        switch ($sOperation) {
            case 'findspace':
                return 'dofindspace';
            case 'dofindspace':
                return 'findspace';

            case 'shrinkrange':
                return 'doshrinkrange';
            case 'doshrinkrange':
                return 'shrinkrange';

            case 'splitrange':
                return 'dosplitrange';
            case 'dosplitrange':
                return 'splitrange';

            case 'expandrange':
                return 'doexpandrange';
            case 'doexpandrange':
                return 'expandrange';

            case 'delegate':
                return 'dodelegate';
            case 'dodelegate':
                return 'delegate';

            default:
                return '';
        }
    }

    /**
     * @inheritdoc
     */
    public static function GetShortcutActions($sFinalClass)
    {
        // Prepend the shortcut actions with the navigation menu
        $aNavigationActions = ['previous_pnrange', 'next_pnrange'];
        $aConfiguredActions = parent::GetShortcutActions($sFinalClass);
        $aShortcutActions = array_merge($aNavigationActions, $aConfiguredActions);

        return $aShortcutActions;
    }

    /**
     * Get the previous PNRange if it exists
     *
     * @param bool $bInRange if lookup should be done in parent range only
     *
     * @return null
     */
    public function GetPreviousRange($bInRange)
    {
        // Create OQL according to $bInRange
        $iParent = $this->Get('parent_id');
        if ($bInRange) {
            if ($iParent > 0) {
                $sOQL = 'SELECT PNRange AS r WHERE r.parent_id = :parent_id AND r.firstnumber < :number';
            } else {
                return null;
            }
        } else {
            $sOQL = 'SELECT PNRange AS r WHERE r.org_id = :org_id AND r.firstnumber < :number';
        }
        // Set the ordering criteria ['ip'=> false] and set a limit (1)
        $oPNRangeSet = new DBObjectSet(DBSearch::FromOQL($sOQL), ['firstnumber' => false], ['org_id' => $this->Get('org_id'), 'parent_id' => $iParent, 'number' => $this->Get('firstnumber')], null, 1);
        $oPNRangeSet->OptimizeColumnLoad(['PNRange' => ['id', 'firstnumber']]);
        if ($oPreviousRange = $oPNRangeSet->Fetch()) {
            return $oPreviousRange;
        }

        return null;
    }

    /**
     * Get the next PNRange if it exists
     *
     * @param bool $bInRange if lookup should be done in parent range only
     *
     * @return null
     */
    public function GetNextRange($bInRange)
    {
        // Create OQL according to $bInRange
        $iParent = $this->Get('parent_id');
        if ($bInRange) {
            if ($iParent > 0) {
                $sOQL = 'SELECT PNRange AS r WHERE r.parent_id = :parent_id AND r.firstnumber > :number';
            } else {
                return null;
            }
        } else {
            $sOQL = 'SELECT PNRange AS r WHERE r.org_id = :org_id AND r.firstnumber > :number';
        }
        // Set the ordering criteria ['ip'=> false] and set a limit (1)
        $oPNRangeSet = new DBObjectSet(DBSearch::FromOQL($sOQL), ['firstnumber' => true], ['org_id' => $this->Get('org_id'), 'parent_id' => $iParent, 'number' => $this->Get('firstnumber')], null, 1);
        $oPNRangeSet->OptimizeColumnLoad(['PNRange' => ['id', 'firstnumber']]);
        if ($oNextRange = $oPNRangeSet->Fetch()) {
            return $oNextRange;
        }

        return null;
    }


}