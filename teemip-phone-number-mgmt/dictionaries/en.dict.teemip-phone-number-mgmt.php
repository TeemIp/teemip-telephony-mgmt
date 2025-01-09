<?php
/*
 * @copyright   Copyright (C) 2010-2025 TeemIp
 * @license     http://opensource.org/licenses/AGPL-3.0
 */

//////////////////////////////////////////////////////////////////////
// Classes in 'teemip-phone-number-mgmt Module'
//////////////////////////////////////////////////////////////////////
//

//
// Class: PNObject
//

Dict::Add('EN US', 'English', 'English', array(
    'Class:PNObject' => 'Phone Number Object',
    'Class:PNObject+' => '',
    'Class:PNObject/Attribute:finalclass' => 'Sub-class',
    'Class:PNObject/Attribute:finalclass+' => 'Name of the final class',
    'Class:PNObject/Attribute:org_id' => 'Organization',
    'Class:PNObject/Attribute:org_id+' => '',
    'Class:PNObject/Attribute:org_name' => 'Organization name',
    'Class:PNObject/Attribute:org_name+' => '',
    'Class:PNObject/Attribute:status' => 'Status',
    'Class:PNObject/Attribute:status+' => '',
    'Class:PNObject/Attribute:status/Value:reserved' => 'Reserved',
    'Class:PNObject/Attribute:status/Value:reserved+' => '',
    'Class:PNObject/Attribute:status/Value:allocated' => 'Allocated',
    'Class:PNObject/Attribute:status/Value:allocated+' => '',
    'Class:PNObject/Attribute:status/Value:released' => 'Released',
    'Class:PNObject/Attribute:status/Value:released+' => '',
    'Class:PNObject/Attribute:status/Value:unassigned' => 'Unassigned',
    'Class:PNObject/Attribute:status/Value:unassigned+' => '',
    'Class:PNObject/Attribute:comment' => 'Note',
    'Class:PNObject/Attribute:comment+' => '',
    'Class:PNObject/Attribute:requestor_id' => 'Requestor',
    'Class:PNObject/Attribute:requestor_id+' => '',
    'Class:PNObject/Attribute:requestor_name' => 'Requestor name',
    'Class:PNObject/Attribute:requestor_name+' => '',
    'Class:PNObject/Attribute:allocation_date' => 'Allocation date',
    'Class:PNObject/Attribute:allocation_date+' => 'Date when PN object has been allocated',
    'Class:PNObject/Attribute:release_date' => 'Release date',
    'Class:PNObject/Attribute:release_date+' => 'Date when PN object has been released and is not used anymore.',
    'Class:PNObject/Attribute:contacts_list' => 'Contacts',
    'Class:PNObject/Attribute:contacts_list+' => 'Contacts attached to the PN object',
    'Class:PNObject/Attribute:documents_list' => 'Documents',
    'Class:PNObject/Attribute:documents_list+' => 'Documents attached to the PN object',
    'Class:PNObject/Attribute:tickets_list' => 'Documents',
    'Class:PNObject/Attribute:tickets_list+' => 'Documents attached to the PN object',
));

//
// Class: lnkContactToPNObject
//

Dict::Add('EN US', 'English', 'English', array(
    'Class:lnkContactToPNObject' => 'Link Contact / PN Object',
    'Class:lnkContactToPNObject+' => '',
    'Class:lnkContactToPNObject/Name' => '%1$s / %2$s',
    'Class:lnkContactToPNObject/Attribute:pnobject_id' => 'PN Object',
    'Class:lnkContactToPNObject/Attribute:pnobject_id+' => '',
    'Class:lnkContactToPNObject/Attribute:contact_id' => 'Contact',
    'Class:lnkContactToPNObject/Attribute:contact_id+' => '',
    'Class:lnkContactToPNObject/Attribute:contact_name' => 'Contact name',
    'Class:lnkContactToPNObject/Attribute:contact_name+' => '',
));

//
// Class: lnkDocToPNObject
//

Dict::Add('EN US', 'English', 'English', array(
    'Class:lnkDocToPNObject' => 'Link Document / PN Object',
    'Class:lnkDocToPNObject+' => '',
    'Class:lnkDocToPNObject/Name' => '%1$s / %2$s',
    'Class:lnkDocToPNObject/Attribute:pnobject_id' => 'PN Object',
    'Class:lnkDocToPNObject/Attribute:pnobject_id+' => '',
    'Class:lnkDocToPNObject/Attribute:document_id' => 'Document',
    'Class:lnkDocToPNObject/Attribute:document_id+' => '',
    'Class:lnkDocToPNObject/Attribute:document_name' => 'Document name',
    'Class:lnkDocToPNObject/Attribute:document_name+' => '',
));

//
// Class: lnkPNObjectToTicket
//

Dict::Add('EN US', 'English', 'English', array(
    'Class:lnkPNObjectToTicket' => 'Link IP Object / Ticket',
    'Class:lnkPNObjectToTicket+' => '',
    'Class:lnkPNObjectToTicket/Name' => '%1$s / %2$s',
    'Class:lnkPNObjectToTicket/Attribute:pnobject_id' => 'PN Object',
    'Class:lnkPNObjectToTicket/Attribute:pnobject_id+' => '',
    'Class:lnkPNObjectToTicket/Attribute:ticket_id' => 'Ticket',
    'Class:lnkPNObjectToTicket/Attribute:ticket_id+' => '',
    'Class:lnkPNObjectToTicket/Attribute:ticket_ref' => 'Ref',
    'Class:lnkPNObjectToTicket/Attribute:ticket_ref+' => '',
    'Class:lnkPNObjectToTicket/Attribute:ticket_title' => 'Title',
    'Class:lnkPNObjectToTicket/Attribute:ticket_title+' => '',
));

//
// Class: PNRange
//

Dict::Add('EN US', 'English', 'English', array(
	'Class:PNRange' => 'Phone Number Range',
	'Class:PNRange+' => '',
	'Class:PNRange:baseinfo' => 'General Information',
	'Class:PNRange:numberinginfo' => 'Numbering Information',
	'Class:PNRange/Attribute:name' => 'Name',
	'Class:PNRange/Attribute:name+' => '',
    'Class:PNRange/Attribute:parent_id' => 'Parent range',
    'Class:PNRange/Attribute:parent_id+' => 'Parent range that the range belongs to',
    'Class:PNRange/Attribute:parent_name' => 'Parent name',
    'Class:PNRange/Attribute:parent_name+' => '',
	'Class:PNRange/Attribute:firstnumber' => 'First number',
	'Class:PNRange/Attribute:firstnumber+' => 'First number of the range',
    'Class:PNRange/Attribute:lastnumber' => 'Last number',
    'Class:PNRange/Attribute:lastnumber+' => 'Last number of the range',
    'Class:PNRange/Attribute:occupancy' => 'Registered numbers',
    'Class:PNRange/Attribute:occupancy+' => 'Percentage of phone numbers that belong to the range',
    'Class:PNRange/Attribute:phonenumbers_list' => 'Phone numbers',
    'Class:PNRange/Attribute:phonenumbers_list+' => 'All the pone numbers that belong to the range',
));

//
// Class: PhoneNumber
//

Dict::Add('EN US', 'English', 'English', array(
    'Class:PhoneNumber' => 'Phone Number',
    'Class:PhoneNumber+' => '',
    'Class:PhoneNumber:baseinfo' => 'General Information',
    'Class:PhoneNumber:numberinfo' => 'Number Information',
    'Class:PhoneNumber/Attribute:pnrange_id' => 'Phone number range',
    'Class:PhoneNumber/Attribute:pnrange_id+' => '',
    'Class:PhoneNumber/Attribute:pnrange_name' => 'Name of the range',
    'Class:PhoneNumber/Attribute:pnrange_name+' => '',
    'Class:PhoneNumber/Attribute:number' => 'Number',
    'Class:PhoneNumber/Attribute:number+' => '',
    'Class:PhoneNumber/Attribute:pnextensions_list' => 'Extensions',
    'Class:PhoneNumber/Attribute:pnextensions_list+' => 'All the extensions attached to that number',
));

//
// Class: PNExtension
//

Dict::Add('EN US', 'English', 'English', array(
    'Class:PNExtension' => 'Extension',
    'Class:PNExtension+' => '',
    'Class:PNExtension/Name' => '%1$s - %2$s',
    'Class:PNExtension:baseinfo' => 'General Information',
    'Class:PNExtension:numberinfo' => 'Extension Information',
    'Class:PNExtension/Attribute:phonenumber_id' => 'Phone number',
    'Class:PNExtension/Attribute:phonenumber_id+' => '',
    'Class:PNExtension/Attribute:phonenumber_number' => 'Phone number',
    'Class:PNExtension/Attribute:phonenumber_number+' => '',
    'Class:PNExtension/Attribute:code' => 'Code',
    'Class:PNExtension/Attribute:code+' => '',
));

//
// Menus & actions
//

Dict::Add('EN US', 'English', 'English', array(
    'Menu:PNManagement' => 'Phone Number Management',
    'Menu:PNManagement+' => '',
    'Menu:PNSpace' => 'Phone Number Space',
    'Menu:PNSpace+' => '',
    'Menu:NewPNObject' => 'New Phone Numbers object',
    'Menu:NewPNObject+' => 'Creation of a new phone number object',
    'Menu:SearchPNObject' => 'Search for Phone Number objects',
    'Menu:SearchPNObject+' => '',
    'Menu:PNRange' => 'Phone Number Ranges',
    'Menu:PNRange+' => '',
    'Menu:PhoneNumber' => 'Phone Numbers',
    'Menu:PhoneNumber+' => '',
    'Menu:PNExtension' => 'Extensions',
    'Menu:PNExtension+' => '',
    'Menu:PNSpace:PNObjects' => 'Phone Number Objects',
));
