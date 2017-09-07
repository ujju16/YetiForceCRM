<?php
/* +***********************************************************************************
 * The contents of this file are subject to the vtiger CRM Public License Version 1.0
 * ("License"); You may not use this file except in compliance with the License
 * The Original Code is:  vtiger CRM Open Source
 * The Initial Developer of the Original Code is vtiger.
 * Portions created by vtiger are Copyright (C) vtiger.
 * All Rights Reserved.
 * *********************************************************************************** */

Class Settings_Profiles_EditAjax_Action extends Settings_Vtiger_IndexAjax_View
{

	public function __construct()
	{
		parent::__construct();
		$this->exposeMethod('checkDuplicate');
	}

	public function process(\App\Request $request)
	{
		$mode = $request->getMode();
		if (!empty($mode)) {
			$this->invokeExposedMethod($mode, $request);
			return;
		}
	}

	public function checkDuplicate(\App\Request $request)
	{
		$profileName = $request->get('profilename');
		$recordId = $request->get('record');
		$recordModel = Settings_Profiles_Record_Model::getInstanceByName($profileName, false, $recordId);
		$response = new Vtiger_Response();
		if (!empty($recordModel)) {
			$response->setResult(array('success' => true, 'message' => \App\Language::translate('LBL_DUPLICATES_EXIST', $request->getModule(false))));
		} else {
			$response->setResult(array('success' => false));
		}
		$response->emit();
	}
}
