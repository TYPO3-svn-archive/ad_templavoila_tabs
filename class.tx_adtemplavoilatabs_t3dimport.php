<?php

/***************************************************************
 * Copyright notice
 *
 * (c) 2010 Christian Technology Ministries International Inc.
 * (c) 2011 Arno Dudek <webmaster@adgrafik.at>
 * All rights reserved
 *
 * This file is part of the Web-Empowered Church (WEC)
 * (http://WebEmpoweredChurch.org) ministry of Christian Technology Ministries 
 * International (http://CTMIinc.org). The WEC is developing TYPO3-based
 * (http://typo3.org) free software for churches around the world. Our desire
 * is to use the Internet to help offer new life through Jesus Christ. Please
 * see http://WebEmpoweredChurch.org/Jesus.
 *
 * You can redistribute this file and/or modify it under the terms of the
 * GNU General Public License as published by the Free Software Foundation;
 * either version 2 of the License, or (at your option) any later version.
 *
 * The GNU General Public License can be found at
 * http://www.gnu.org/copyleft/gpl.html.
 *
 * This file is distributed in the hope that it will be useful for ministry,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
 * GNU General Public License for more details.
 *
 * This copyright notice MUST APPEAR in all copies of the file!
 ***************************************************************/

class tx_adtemplavoilatabs_t3dimport {

	public function main($params, $pObj) {
		$content = array();
		$flashText = '';
		$fieldName = $params['fieldName'];
		$fieldValue = $params['fieldValue'];

		// Do import.
		if (t3lib_div::_GP('doImport') && $fieldValue) {
			$this->importTemplateObjects($fieldValue);
		}

		// Check if template object is in database.
		$templateObjects = t3lib_BEFunc::getRecordsByField('tx_templavoila_tmplobj', 'pid', $fieldValue, 'AND fileref = \'EXT:ad_templavoila_tabs/core_templates/fce/fce_tabs.html\'');
		if (count($templateObjects) > 0) {
			$flashSubject = 'Found existing template object';
			$flashText = 'The SysFolder you\'ve selected for import already contains the TemplaVoila template object. You have now completed the installation.';
			$flashSeverity = t3lib_flashMessage::OK;
		} else {
			$content[] = '<input type="hidden" name="submit" value="Update" />';
			$content[] = '<select name="' . $fieldName . '" size="5">';

			$sysFolders = t3lib_BEFunc::getRecordsByField('pages', 'doktype', 254, '', '', 'title');
			foreach ($sysFolders as $sysFolder) {
				if ($sysFolder['uid'] == $fieldValue) {
					$selected = 'selected="selected"';
				} else {
					$selected = '';
				}
	
				$content[] = '<option ' . $selected . 'value="' . $sysFolder['uid'] . '">' . $sysFolder['title'] . ' (UID:' . $sysFolder['uid'] . ' PID:' . $sysFolder['pid'] . ')</option>';
			}

			$content[] = '</select>';
			$content[] = '<input type="submit" name="doImport" value="Import" />';
		}

		if ($flashText) {
			$flashMessage = t3lib_div::makeInstance('t3lib_flashMessage', $flashText, $flashSubject, $flashSeverity);
			$content[] = $flashMessage->render();
		}

		return implode(LF, $content);
	}

	protected function importTemplateObjects($pid) {
		$templateObjectPath = t3lib_extMgm::extPath('ad_templavoila_tabs') . 'fec_import.t3d';
		$data = null;

		if(@is_file($templateObjectPath)) {
			require_once(t3lib_extMgm::extPath('impexp') . 'class.tx_impexp.php');
			$import = t3lib_div::makeInstance('tx_impexp');
			$import->init(0, 'import');
			$import->enableLogging = TRUE;

			if ($import->loadFile($templateObjectPath, $loadAllData = TRUE)) {
				$data = $import->dat;
				$import->importData($pid);
			}
		}
	}
}

if (defined('TYPO3_MODE') && $TYPO3_CONF_VARS[TYPO3_MODE]['XCLASS']['ext/ad_templavoila_tabs/class.tx_adtemplavoilatabs_t3dimport.php'])	{
	include_once($TYPO3_CONF_VARS[TYPO3_MODE]['XCLASS']['ext/ad_templavoila_tabs/class.tx_adtemplavoilatabs_t3dimport.php']);
}

?>