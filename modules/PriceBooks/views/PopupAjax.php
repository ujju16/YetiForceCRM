<?php
/* +**********************************************************************************
 * The contents of this file are subject to the vtiger CRM Public License Version 1.1
 * ("License"); You may not use this file except in compliance with the License
 * The Original Code is:  vtiger CRM Open Source
 * The Initial Developer of the Original Code is vtiger.
 * Portions created by vtiger are Copyright (C) vtiger.
 * All Rights Reserved.
 * ********************************************************************************** */

class PriceBooks_PopupAjax_View extends PriceBooks_Popup_View
{

	public function __construct()
	{
		parent::__construct();
		$this->exposeMethod('getListViewCount');
		$this->exposeMethod('getRecordsCount');
		$this->exposeMethod('getPageCount');
	}

	public function preProcess(\App\Request $request)
	{
		return true;
	}

	public function postProcess(\App\Request $request)
	{
		return true;
	}

	public function process(\App\Request $request)
	{
		$mode = $request->getMode();
		if (!empty($mode)) {
			$this->invokeExposedMethod($mode, $request);
			return;
		}
		$viewer = $this->getViewer($request);
		$moduleName = $request->getModule();

		$this->initializeListViewContents($request, $viewer);

		echo $viewer->view('PopupContents.tpl', $moduleName, true);
	}
}
