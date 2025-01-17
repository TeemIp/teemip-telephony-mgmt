<?php
/*
 * @copyright   Copyright (C) 2010-2025 TeemIp
 * @license     http://opensource.org/licenses/AGPL-3.0
 */

namespace TeemIp\TeemIp\Extension\PhoneNumberManagement\Hook;

use ApplicationContext;
use Dict;
use iPopupMenuExtension;
use PNRange;
use MetaModel;
use SeparatorPopupMenuItem;
use URLButtonItem;
use URLPopupMenuItem;
use UserRights;
use utils;

class PNMgmtExtraMenus implements iPopupMenuExtension
{
	const MODULE_CODE = 'teemip-phone-number-mgmt';
	const RANGE_NAV_FUNCTION_CODE = 'range_navigation';
	const RANGE_NAV_FUNCTION_SETTING_ENABLED = 'enabled';
	const RANGE_NAV_FUNCTION_SETTING_WITHIN_RANGE_ONLY = 'within_range_only';
    const DEFAULT_RANGE_NAV_FUNCTION_SETTING_ENABLED = true;
	const DEFAULT_RANGE_NAV_FUNCTION_SETTING_WITHIN_RANGE_ONLY = true;

	/**
	 * @inheritdoc
	 */
	public static function EnumItems($iMenuId, $param)
	{
		$aResult = array();
		switch ($iMenuId) {
			case iPopupMenuExtension::MENU_OBJLIST_ACTIONS: // $param is a DBObjectSet
				break;

			case iPopupMenuExtension::MENU_OBJLIST_TOOLKIT: // $param is a DBObjectSet
				$oSet = $param;
				$sClass = $oSet->GetClass();

				if ($sClass == 'PNRange') {
					// Additional actions for PNRange
					$operation = utils::ReadParam('operation', '');

					$oAppContext = new ApplicationContext();
					$aParams = $oAppContext->GetAsHash();
					$aParams['class'] = $sClass;
					$aParams['filter'] = $param->GetFilter()->serialize();
					switch ($operation) {
						case 'displaytree':
							$aResult[] = new SeparatorPopupMenuItem();
							$aParams['operation'] = 'displaylist';
							$sMenu = 'UI:PNManagement:Action:DisplayList:PNRange';
							$aResult[] = new URLPopupMenuItem($sMenu, Dict::S($sMenu), utils::GetAbsoluteUrlModulePage('teemip-ip-mgmt', 'ui.teemip-ip-mgmt.php', $aParams));
							break;

						case 'displaylist':
						default:
							$aResult[] = new SeparatorPopupMenuItem();
							$aParams['operation'] = 'displaytree';
							$sMenu = 'UI:PNManagement:Action:DisplayTree:PNRange';
							$aResult[] = new URLPopupMenuItem($sMenu, Dict::S($sMenu), utils::GetAbsoluteUrlModulePage('teemip-ip-mgmt', 'ui.teemip-ip-mgmt.php', $aParams));
							break;
					}
				}
				break;

			case iPopupMenuExtension::MENU_OBJDETAILS_ACTIONS: // $param is a DBObject
				break;

			case iPopupMenuExtension::MENU_DASHBOARD_ACTIONS: // $param is a Dashboard
				break;

			default:
				// Unknown type of menu, do nothing
				break;
		}

		return $aResult;
	}
}
