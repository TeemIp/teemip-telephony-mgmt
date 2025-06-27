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
     * Event to set attribute flags.
     *
     * @param EventData $oEventData
     * @return void
     */
    public function OnPhoneNumberSetAttributesFlagsRequestedByPhoneNumberMgmt(EventData $oEventData): void
    {
        $this->AddAttributeFlags('org_id', OPT_ATT_READONLY);
        $this->AddAttributeFlags('pnrange_id', OPT_ATT_READONLY);
        $this->AddAttributeFlags('number', OPT_ATT_READONLY);
    }

    /**
     * Event to update PNRange once PhoneNumber has been created
     *
     * @param EventData $oEventData
     * @return void
     */
    public function OnPhoneNumberAfterWriteRequestedByPhoneNumberMgmt(EventData $oEventData): void
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
     */
    public function OnPhoneNumberAfterDeleteRequestedByPhoneNumberMgmt(EventData $oEventData): void
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

