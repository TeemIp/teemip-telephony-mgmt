<?php
/*
 * @copyright   Copyright (C) 2010-2025 TeemIp
 * @license     http://opensource.org/licenses/AGPL-3.0
 */

//
// Class: SimCard
//

Dict::Add('EN US', 'English', 'English', array(
    'Class:SimCard' => 'SIM Card',
    'Class:SimCard+' => 'SIM Card that may be linked to a Mobile Phone, Tablet or PC',
    'SimCard:baseinfo' => 'General Information',
    'SimCard:techinfo' => 'Technical Information',
    'SimCard:date' => 'Dates',
    'SimCard:otherinfo' => 'Other Information',
    'Class:SimCard/Attribute:format' => 'Format',
    'Class:SimCard/Attribute:format+' => '',
    'Class:SimCard/Attribute:format/Value:regular' => 'Regular',
    'Class:SimCard/Attribute:format/Value:mini' => 'Mini',
    'Class:SimCard/Attribute:format/Value:micro' => 'Micro',
    'Class:SimCard/Attribute:format/Value:nano' => 'Nano',
    'Class:SimCard/Attribute:format/Value:esim' => 'ESIM',
    'Class:SimCard/Attribute:format/Value:regular_to_micro' => 'Regular that can be cut to micro',
    'Class:SimCard/Attribute:format/Value:regular_to_nano' => 'Regular that can be cut to nano',
    'Class:SimCard/Attribute:format/Value:micro_to_nano' => 'Micro that can be cut to nano',
    'Class:SimCard/Attribute:iccid' => 'ICCID',
    'Class:SimCard/Attribute:iccid+' => 'ICCID code or SIM Card number',
    'Class:SimCard/Attribute:carrier_id' => 'Carrier',
    'Class:SimCard/Attribute:carrier_id+' => '',
    'Class:SimCard/Attribute:phonenumber_id' => 'Phone number',
    'Class:SimCard/Attribute:phonenumber_id+' => 'The phone number linked to the SIM Card',
    'Class:SimCard/Attribute:phonenumber' => 'Phone number',
    'Class:SimCard/Attribute:phonenumber+' => '',
    'Class:SimCard/Attribute:pin' => 'PIN',
    'Class:SimCard/Attribute:pin+' => 'Primary PIN of the SIM Card - Number with 4 to 8 digits',
    'Class:SimCard/Attribute:pin2' => 'PIN 2',
    'Class:SimCard/Attribute:pin2+' => 'Secondary PIN of the SIM Card - Number with 4 to 8 digits',
    'Class:SimCard/Attribute:puk' => 'PUK',
    'Class:SimCard/Attribute:puk+' => 'Primary PUK of the SIM Card - 8 digits number',
    'Class:SimCard/Attribute:puk2' => 'PUK 2',
    'Class:SimCard/Attribute:puk2+' => 'Secondary PUK of the SIM Card - 8 digits number',
    'Class:SimCard/Attribute:contact_id' => 'Main contact',
    'Class:SimCard/Attribute:contact_id+' => 'The person or team using the SIM Card',
    'Class:SimCard/Attribute:physicaldevice_id' => 'Host',
    'Class:SimCard/Attribute:physicaldevice_id+' => 'Mobile phone, PC or tablet that hosts the SIM Card',
    'Class:SimCard/Attribute:physicaldevice_name' => 'Name of the physical device',
    'Class:SimCard/Attribute:physicaldevice_name+' => '',
    'Class:SimCard/Attribute:physicalinterface_id' => 'Host interface',
    'Class:SimCard/Attribute:physicalinterface_id+' => 'Interface where the SIM Card is stored',
    'Class:SimCard/Attribute:physicalinterface_name' => 'Name of the physical interface',
    'Class:SimCard/Attribute:physicalinterface_name+' => '',
));

//
// Class: TelephonyCI
//

Dict::Add('EN US', 'English', 'English', array(
    'Class:TelephonyCI/Attribute:phonenumber_id' => 'Phone number',
    'Class:TelephonyCI/Attribute:phonenumber_id+' => 'The phone number linked to this CI',
    'Class:TelephonyCI/Attribute:phonenumber' => 'Phone number',
    'Class:TelephonyCI/Attribute:phonenumber+' => '',
    'TelephonyCI:baseinfo' => 'General Information',
    'TelephonyCI:hwinfo' => 'Hardware Information',
    'TelephonyCI:date' => 'Dates',
    'TelephonyCI:techinfo' => 'Technical Information',
));

//
// Class: MobilePhone
//

Dict::Add('EN US', 'English', 'English', array(
    'Class:MobilePhone/Attribute:simcard_format' => 'SIM Card Format',
    'Class:MobilePhone/Attribute:simcard_format+' => '',
    'Class:MobilePhone/Attribute:simcard_format/Value:regular' => 'Regular',
    'Class:MobilePhone/Attribute:simcard_format/Value:mini' => 'Mini',
    'Class:MobilePhone/Attribute:simcard_format/Value:micro' => 'Micro',
    'Class:MobilePhone/Attribute:simcard_format/Value:nano' => 'Nano',
    'Class:MobilePhone/Attribute:simcard_format/Value:esim' => 'ESIM',
    'Class:MobilePhone/Attribute:simcard1_id' => 'SIM Card #1',
    'Class:MobilePhone/Attribute:simcard1_id+' => 'Primary SIM Card of the phone',
    'Class:MobilePhone/Attribute:simcard1_name' => 'Name of the primary SIM Card',
    'Class:MobilePhone/Attribute:simcard1_name+' => '',
    'Class:MobilePhone/Attribute:simcard2_id' => 'SIM Card #2',
    'Class:MobilePhone/Attribute:simcard2_id+' => 'Secondary SIM Card of the phone',
    'Class:MobilePhone/Attribute:simcard2_name' => 'Name of the secondary SIM Card',
    'Class:MobilePhone/Attribute:simcard2_name+' => '',
));

//
// Class: PC
//

Dict::Add('EN US', 'English', 'English', array(
    'Class:PC/Attribute:simcard_format' => 'SIM Card Format',
    'Class:PC/Attribute:simcard_format+' => '',
    'Class:PC/Attribute:simcard_format/Value:regular' => 'Regular',
    'Class:PC/Attribute:simcard_format/Value:mini' => 'Mini',
    'Class:PC/Attribute:simcard_format/Value:micro' => 'Micro',
    'Class:PC/Attribute:simcard_format/Value:nano' => 'Nano',
    'Class:PC/Attribute:simcard_format/Value:esim' => 'ESIM',
    'Class:PC/Attribute:simcard_id' => 'SIM Card',
    'Class:PC/Attribute:simcard_id+' => 'IM Card of the PC',
    'Class:PC/Attribute:simcard_name' => 'Name of the SIM Card',
    'Class:PC/Attribute:simcard_name+' => '',
));

//
// Class: Tablet
//

Dict::Add('EN US', 'English', 'English', array(
    'Class:Tablet/Attribute:simcard_format' => 'SIM Card Format',
    'Class:Tablet/Attribute:simcard_format+' => '',
    'Class:Tablet/Attribute:simcard_format/Value:regular' => 'Regular',
    'Class:Tablet/Attribute:simcard_format/Value:mini' => 'Mini',
    'Class:Tablet/Attribute:simcard_format/Value:micro' => 'Micro',
    'Class:Tablet/Attribute:simcard_format/Value:nano' => 'Nano',
    'Class:Tablet/Attribute:simcard_format/Value:esim' => 'ESIM',
    'Class:Tablet/Attribute:simcard_id' => 'SIM Card',
    'Class:Tablet/Attribute:simcard_id+' => 'SIM Card of the tablet',
    'Class:Tablet/Attribute:simcard_name' => 'Name of the SIM Card',
    'Class:Tablet/Attribute:simcard_name+' => '',
    'Tablet:baseinfo' => 'General Information',
    'Tablet:hwinfo' => 'Hardware Information',
    'Tablet:date' => 'Dates',
    'Tablet:techinfo' => 'Technical Information',
));

//
// Menus & actions
//

Dict::Add('EN US', 'English', 'English', array(
    'Menu:TelefonySpace:Devices' => 'Telephony Devices',
));

