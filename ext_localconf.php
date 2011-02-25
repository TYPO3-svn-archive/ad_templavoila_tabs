<?php
if (!defined ('TYPO3_MODE')) 	die ('Access denied.');

/**
 * For TemplaVoila versions greater than or equal to 1.5, add static data structures as part of EXTCONF
 * For TemplaVoila versions less than 1.5, see ext_tables.php
 */

if (t3lib_div::int_from_ver(t3lib_extMgm::getExtensionVersion('templavoila')) >= 1005000) {
	$GLOBALS['TYPO3_CONF_VARS']['EXTCONF']['templavoila']['staticDataStructures'][] = array(
		'title' => 'LLL:EXT:' . $_EXTKEY . '/lang/locallang.xml:fce.typeHeader',
		'path' => 'EXT:' . $_EXTKEY . '/core_templates/datastructures/fce/cycle (fce).xml',
		'icon' => '',
		'scope' => 2,
	);
}

?>