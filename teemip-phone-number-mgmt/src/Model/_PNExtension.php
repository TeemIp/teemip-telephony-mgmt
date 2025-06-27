<?php
/*
 * @copyright   Copyright (C) 2010-2025 TeemIp
 * @license     http://opensource.org/licenses/AGPL-3.0
 */

namespace TeemIp\TeemIp\Extension\PhoneNumberManagement\Model;

use Combodo\iTop\Service\Events\EventData;
use PNObject;

class _PNExtension extends PNObject
{
    /**
     * Event to set attribute flags.
     *
     * @param EventData $oEventData
     * @return void
     */
    public function OnPNExtensionSetAttributesFlagsRequestedByPhoneNumberMgmt(EventData $oEventData): void
    {
        $this->AddAttributeFlags('org_id', OPT_ATT_READONLY);
        $this->AddAttributeFlags('phonenumber_id', OPT_ATT_READONLY);
    }

}
