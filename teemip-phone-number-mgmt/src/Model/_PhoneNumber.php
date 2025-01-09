<?php
/*
 * @copyright   Copyright (C) 2010-2025 TeemIp
 * @license     http://opensource.org/licenses/AGPL-3.0
 */

namespace TeemIp\TeemIp\Extension\PhoneNumberManagement\Model;

use CMDBObjectSet;
use Combodo\iTop\Service\Events\EventData;
use DBObjectSearch;
use MetaModel;
use PNObject;

class _PhoneNumber extends PNObject {
    /**
     * @inheritdoc
     */
    public function GetAttributeFlags($sAttCode, &$aReasons = array(), $sTargetState = ''): string
    {
        $sFlagsFromParent = parent::GetAttributeFlags($sAttCode, $aReasons, $sTargetState);
        $aReadOnlyAttributes = array('org_id', 'pnrange_id', 'number');

        if (in_array($sAttCode, $aReadOnlyAttributes)) {
            return (OPT_ATT_READONLY | $sFlagsFromParent);
        }

        return $sFlagsFromParent;
    }

    /**
     * Event to update PNRange once PhoneNumber has been created
     *
     * @param EventData $oEventData
     * @return void
     * @throws \ArchivedObjectException
     * @throws \CoreCannotSaveObjectException
     * @throws \CoreException
     * @throws \CoreUnexpectedValue
     */
    public function OnPhoneNumberAfterWriteRequestedByPNRange(EventData $oEventData): void
    {
        $aEventData = $oEventData->GetEventData();
        if ($aEventData['is_new']) {
            // Update occupancy of PNRange
            $iRangeId = $this->Get('pnrange_id');
            $oPNRange = MetaModel::GetObject('PNRange', $iRangeId);
            if ($oPNRange) {
                $oPNRange->Set('occupancy', $oPNRange->GetOccupancy());
                $oPNRange->DBUpdate();
            }
        }
    }

    /**
     * Event to update PNRange once PhoneNumber has been deleted
     *
     * @param EventData $oEventData
     * @return void
     * @throws \ArchivedObjectException
     * @throws \CoreCannotSaveObjectException
     * @throws \CoreException
     * @throws \CoreUnexpectedValue
     */
    public function OnPhoneNumberAfterDeleteRequestedByPNRange(EventData $oEventData): void
    {
        // Update occupancy of PNRange
        $iRangeId = $this->Get('pnrange_id');
        $oPNRange = MetaModel::GetObject('PNRange', $iRangeId);
        if ($oPNRange) {
            $oPNRange->Set('occupancy', $oPNRange->GetOccupancy());
            $oPNRange->DBUpdate();
        }
    }

}

