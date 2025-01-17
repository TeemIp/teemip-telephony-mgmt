<?php
/*
 * @copyright   Copyright (C) 2010-2025 TeemIp
 * @license     http://opensource.org/licenses/AGPL-3.0
 */

namespace TeemIp\TeemIp\Extension\PhoneNumberManagement\Model;

use CMDBObjectSet;
use DBObjectSearch;
use PNObject;
class _PNRange extends PNObject {
    /**
     * @inheritdoc
     */
    public function GetAttributeFlags($sAttCode, &$aReasons = array(), $sTargetState = ''): string
    {
        $sFlagsFromParent = parent::GetAttributeFlags($sAttCode, $aReasons, $sTargetState);
        $aReadOnlyAttributes = array('org_id', 'occupancy', 'parent_org_id', 'parent_id', 'firstnumber', 'lastnumber');

        if (in_array($sAttCode, $aReadOnlyAttributes)) {
            return (OPT_ATT_READONLY | $sFlagsFromParent);
        }

        return $sFlagsFromParent;
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



}