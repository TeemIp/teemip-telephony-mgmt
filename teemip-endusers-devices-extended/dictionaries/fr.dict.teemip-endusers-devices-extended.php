<?php
/*
 * @copyright   Copyright (C) 2010-2025 TeemIp
 * @license     http://opensource.org/licenses/AGPL-3.0
 */

//
// Class: SimCard
//

Dict::Add('FR FR', 'French', 'Français', array(
    'Class:SimCard' => 'Carte SIM',
    'Class:SimCard+' => 'Carte SIM povant être liée à un équipement physique tel que téléphone mobile, tablette, PC...',
    'SimCard:baseinfo' => 'Informations Générales',
    'SimCard:techinfo' => 'Informations Techniques',
    'SimCard:date' => 'Dates',
    'SimCard:otherinfo' => 'Autres Informations',
    'Class:SimCard/Attribute:format' => 'Format',
    'Class:SimCard/Attribute:format+' => '',
    'Class:SimCard/Attribute:format/Value:full' => 'Full-size',
    'Class:SimCard/Attribute:format/Value:full+' => '1FF',
    'Class:SimCard/Attribute:format/Value:mini' => 'Mini-SIM',
    'Class:SimCard/Attribute:format/Value:mini+' => '2FF',
    'Class:SimCard/Attribute:format/Value:micro' => 'Micro-SIM',
    'Class:SimCard/Attribute:format/Value:micro+' => '3FF',
    'Class:SimCard/Attribute:format/Value:nano' => 'Nano-SIM',
    'Class:SimCard/Attribute:format/Value:nano+' => '4FF',
    'Class:SimCard/Attribute:format/Value:esim' => 'Embedded-SIM',
    'Class:SimCard/Attribute:format/Value:esim+' => 'eSIM',
    'Class:SimCard/Attribute:format/Value:full_to_micro' => 'Full-size qui peut être sectionnée à la taille micro',
    'Class:SimCard/Attribute:format/Value:full_to_nano' => 'Full-size qui peut être sectionnée à la taille nano',
    'Class:SimCard/Attribute:format/Value:micro_to_nano' => 'Micro-SIM qui peut être sectionnée à la taille nano',
    'Class:SimCard/Attribute:iccid' => 'ICCID',
    'Class:SimCard/Attribute:iccid+' => 'Code ICCID ou numéro de carte SIM',
    'Class:SimCard/Attribute:carrier_id' => 'Opérateur',
    'Class:SimCard/Attribute:carrier_id+' => '',
    'Class:SimCard/Attribute:phonenumber_id' => 'Numéro de téléphone',
    'Class:SimCard/Attribute:phonenumber_id+' => 'Le numéro de téléphone lié à la carte SIM',
    'Class:SimCard/Attribute:phonenumber' => 'Numéro de téléphone',
    'Class:SimCard/Attribute:phonenumber+' => '',
    'Class:SimCard/Attribute:pin' => 'Code PIN',
    'Class:SimCard/Attribute:pin+' => 'Code PIN primaire de la carte SIM - Nombre de 4 à 8 chiffres',
    'Class:SimCard/Attribute:pin2' => 'Code PIN #2',
    'Class:SimCard/Attribute:pin2+' => 'Code PIN secondaire de la carte SIM - Nombre de 4 à 8 chiffres',
    'Class:SimCard/Attribute:puk' => 'Code PUK',
    'Class:SimCard/Attribute:puk+' => 'Code PUK primaire de la carte SIM - Nombre  8 chiffres',
    'Class:SimCard/Attribute:puk2' => 'Code PUK #2',
    'Class:SimCard/Attribute:puk2+' => 'Code PUK secondaire de la carte SIM - Nombre à 8 chiffres',
    'Class:SimCard/Attribute:contact_id' => 'Contact principal',
    'Class:SimCard/Attribute:contact_id+' => 'Personne ou équipe utilisant la carte SIM',
    'Class:SimCard/Attribute:physicaldevice_id' => 'Equipement',
    'Class:SimCard/Attribute:physicaldevice_id+' => 'Equipement physique hébergeant la carte SIM',
    'Class:SimCard/Attribute:physicaldevice_name' => 'Nom de l\'équipement physique',
    'Class:SimCard/Attribute:physicaldevice_name+' => '',
    'Class:SimCard/Attribute:physicalinterface_id' => 'Interface',
    'Class:SimCard/Attribute:physicalinterface_id+' => 'Interface de l\'équipement ou la carte SIM est stockée',
    'Class:SimCard/Attribute:physicalinterface_name' => 'Nom de l\'interface physique',
    'Class:SimCard/Attribute:physicalinterface_name+' => '',
));

//
// Class: TelephonyCI
//

Dict::Add('FR FR', 'French', 'Français', array(
    'Class:TelephonyCI/Attribute:phonenumber_id' => 'Numéro de téléphone',
    'Class:TelephonyCI/Attribute:phonenumber_id+' => 'Le numéro de téléphone lié à cet équipement',
    'Class:TelephonyCI/Attribute:phonenumber' => 'Numéro de téléphone',
    'Class:TelephonyCI/Attribute:phonenumber+' => '',
    'TelephonyCI:baseinfo' => 'Informations Générales',
    'TelephonyCI:hwinfo' => 'Informations Matériel',
    'TelephonyCI:date' => 'Dates',
    'TelephonyCI:techinfo' => 'Informations Techniques',
));

//
// Class: MobilePhone
//

Dict::Add('FR FR', 'French', 'Français', array(
    'Class:MobilePhone/Attribute:simcard_format' => 'Format de la carte SIM',
    'Class:MobilePhone/Attribute:simcard_format+' => '',
    'Class:MobilePhone/Attribute:simcard_format/Value:full' => 'Full-size',
    'Class:MobilePhone/Attribute:simcard_format/Value:full+' => '1FF',
    'Class:MobilePhone/Attribute:simcard_format/Value:mini' => 'Mini-SIM',
    'Class:MobilePhone/Attribute:simcard_format/Value:mini+' => '2FF',
    'Class:MobilePhone/Attribute:simcard_format/Value:micro' => 'Micro-SIM',
    'Class:MobilePhone/Attribute:simcard_format/Value:micro+' => '3FF',
    'Class:MobilePhone/Attribute:simcard_format/Value:nano' => 'Nano-SIM',
    'Class:MobilePhone/Attribute:simcard_format/Value:nano+' => '4FF',
    'Class:MobilePhone/Attribute:simcard_format/Value:esim' => 'Embedded-SIM',
    'Class:MobilePhone/Attribute:simcard_format/Value:esim+' => 'eSIM',
    'Class:MobilePhone/Attribute:simcard1_id' => 'Carte SIM #1',
    'Class:MobilePhone/Attribute:simcard1_id+' => 'Carte SIM primaire du téléphone',
    'Class:MobilePhone/Attribute:simcard1_name' => 'Nom de la carte SIM primaire',
    'Class:MobilePhone/Attribute:simcard1_name+' => '',
    'Class:MobilePhone/Attribute:simcard2_id' => 'Carte SIM #2',
    'Class:MobilePhone/Attribute:simcard2_id+' => 'Carte SIM secondaire du téléphone',
    'Class:MobilePhone/Attribute:simcard2_name' => 'Nom de la carte SIM secondaire',
    'Class:MobilePhone/Attribute:simcard2_name+' => '',
));

//
// Class: PC
//

Dict::Add('FR FR', 'French', 'Français', array(
    'Class:PC/Attribute:simcard_format' => 'Format de la carte SIM',
    'Class:PC/Attribute:simcard_format+' => '',
    'Class:PC/Attribute:simcard_format/Value:full' => 'Full-size',
    'Class:PC/Attribute:simcard_format/Value:full+' => '1FF',
    'Class:PC/Attribute:simcard_format/Value:mini' => 'Mini-SIM',
    'Class:PC/Attribute:simcard_format/Value:mini+' => '2FF',
    'Class:PC/Attribute:simcard_format/Value:micro' => 'Micro-SIM',
    'Class:PC/Attribute:simcard_format/Value:micro+' => '3FF',
    'Class:PC/Attribute:simcard_format/Value:nano' => 'Nano-SIM',
    'Class:PC/Attribute:simcard_format/Value:nano+' => '4FF',
    'Class:PC/Attribute:simcard_format/Value:esim' => 'Embedded-SIM',
    'Class:PC/Attribute:simcard_format/Value:esim+' => 'eSIM',
    'Class:PC/Attribute:simcard_id' => 'Carte SIM',
    'Class:PC/Attribute:simcard_id+' => 'Carte SIM du PC',
    'Class:PC/Attribute:simcard_name' => 'Nom de la carte SIM',
    'Class:PC/Attribute:simcard_name+' => '',
));

//
// Class: Tablet
//

Dict::Add('FR FR', 'French', 'Français', array(
    'Class:Tablet/Attribute:simcard_format' => 'Format de la carte SIM',
    'Class:Tablet/Attribute:simcard_format+' => '',
    'Class:Tablet/Attribute:simcard_format/Value:full' => 'Full-size',
    'Class:Tablet/Attribute:simcard_format/Value:full+' => '1FF',
    'Class:Tablet/Attribute:simcard_format/Value:mini' => 'Mini-SIM',
    'Class:Tablet/Attribute:simcard_format/Value:mini+' => '2FF',
    'Class:Tablet/Attribute:simcard_format/Value:micro' => 'Micro-SIM',
    'Class:Tablet/Attribute:simcard_format/Value:micro+' => '3FF',
    'Class:Tablet/Attribute:simcard_format/Value:nano' => 'Nano-SIM',
    'Class:Tablet/Attribute:simcard_format/Value:nano+' => '4FF',
    'Class:Tablet/Attribute:simcard_format/Value:esim' => 'Embedded-SIM',
    'Class:Tablet/Attribute:simcard_format/Value:esim+' => 'eSIM',
    'Class:Tablet/Attribute:simcard_id' => 'Carte SIM',
    'Class:Tablet/Attribute:simcard_id+' => 'Carte SIM de la tablette',
    'Class:Tablet/Attribute:simcard_name' => 'Nom de la carte SIM',
    'Class:Tablet/Attribute:simcard_name+' => '',
    'Tablet:baseinfo' => 'Informations Générales',
    'Tablet:hwinfo' => 'Informations Matériel',
    'Tablet:date' => 'Dates',
    'Tablet:techinfo' => 'Informations Techniques',
));

//
// Class: Peripheral
//

Dict::Add('FR FR', 'French', 'Français', array(
    'Class:Peripheral/Attribute:simcard_format' => 'Format de la carte SIM',
    'Class:Peripheral/Attribute:simcard_format+' => '',
    'Class:Peripheral/Attribute:simcard_format/Value:full' => 'Full-size',
    'Class:Peripheral/Attribute:simcard_format/Value:full+' => '1FF',
    'Class:Peripheral/Attribute:simcard_format/Value:mini' => 'Mini-SIM',
    'Class:Peripheral/Attribute:simcard_format/Value:mini+' => '2FF',
    'Class:Peripheral/Attribute:simcard_format/Value:micro' => 'Micro-SIM',
    'Class:Peripheral/Attribute:simcard_format/Value:micro+' => '3FF',
    'Class:Peripheral/Attribute:simcard_format/Value:nano' => 'Nano-SIM',
    'Class:Peripheral/Attribute:simcard_format/Value:nano+' => '4FF',
    'Class:Peripheral/Attribute:simcard_format/Value:esim' => 'Embedded-SIM',
    'Class:Peripheral/Attribute:simcard_format/Value:esim+' => 'eSIM',
    'Class:Peripheral/Attribute:simcard_id' => 'Carte SIM',
    'Class:Peripheral/Attribute:simcard_id+' => 'Carte SIM du périphérique',
    'Class:Peripheral/Attribute:simcard_name' => 'Nom de la carte SIM',
    'Class:Peripheral/Attribute:simcard_name+' => '',
    'Peripheral:baseinfo' => 'Informations Générales',
    'Peripheral:hwinfo' => 'Informations Matériel',
    'Peripheral:date' => 'Dates',
    'Peripheral:techinfo' => 'Informations Techniques',
));

//
// Class: NetworkDevice
//

Dict::Add('FR FR', 'French', 'Français', array(
    'Class:NetworkDevice/Attribute:simcard_format' => 'Format de la carte SIM',
    'Class:NetworkDevice/Attribute:simcard_format+' => '',
    'Class:NetworkDevice/Attribute:simcard_format/Value:full' => 'Full-size',
    'Class:NetworkDevice/Attribute:simcard_format/Value:full+' => '1FF',
    'Class:NetworkDevice/Attribute:simcard_format/Value:mini' => 'Mini-SIM',
    'Class:NetworkDevice/Attribute:simcard_format/Value:mini+' => '2FF',
    'Class:NetworkDevice/Attribute:simcard_format/Value:micro' => 'Micro-SIM',
    'Class:NetworkDevice/Attribute:simcard_format/Value:micro+' => '3FF',
    'Class:NetworkDevice/Attribute:simcard_format/Value:nano' => 'Nano-SIM',
    'Class:NetworkDevice/Attribute:simcard_format/Value:nano+' => '4FF',
    'Class:NetworkDevice/Attribute:simcard_format/Value:esim' => 'Embedded-SIM',
    'Class:NetworkDevice/Attribute:simcard_format/Value:esim+' => 'eSIM',
    'Class:NetworkDevice/Attribute:simcard_id' => 'Carte SIM',
    'Class:NetworkDevice/Attribute:simcard_id+' => 'Carte SIM du PC',
    'Class:NetworkDevice/Attribute:simcard_name' => 'Nom de la carte SIM',
    'Class:NetworkDevice/Attribute:simcard_name+' => '',
));

//
// Menus & actions
//

Dict::Add('FR FR', 'French', 'Français', array(
    'Menu:TelefonySpace:TelephonyDevices' => 'Equipements téléphonique',
    'Menu:TelefonySpace:DevicesWithSIM' => 'Matériels équipé d\'une carte SIM',
    'Title:DevicesWithSIM:NetworkDevice' => 'Equipements réseaux',
    'Title:DevicesWithSIM:PC' => 'PCs',
    'Title:DevicesWithSIM:Peripheral' => 'Périphériques',
    'Title:DevicesWithSIM:Tablet' => 'Tablettes',
));

