<?php
/*
 * @copyright   Copyright (C) 2010-2025 TeemIp
 * @license     http://opensource.org/licenses/AGPL-3.0
 */

namespace TeemIp\TeemIp\Extension\PhoneNumberManagement\Model;

use PNObject;

class _PNExtension extends PNObject
{
    /**
     * @inheritdoc
     */
    public function GetAttributeFlags($sAttCode, &$aReasons = array(), $sTargetState = ''): string
    {
        $sFlagsFromParent = parent::GetAttributeFlags($sAttCode, $aReasons, $sTargetState);
        $aReadOnlyAttributes = array('org_id', 'phonenumber_id');

        if (in_array($sAttCode, $aReadOnlyAttributes)) {
            return (OPT_ATT_READONLY | $sFlagsFromParent);
        }

        return $sFlagsFromParent;
    }
}
