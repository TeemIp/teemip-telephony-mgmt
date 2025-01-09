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
        $aReadOnlyAttributes = array('org_id', 'occupancy', 'parent_id', 'firstnumber', 'lastnumber');

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

}