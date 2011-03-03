<?php

########################################################################
# Extension Manager/Repository config file for ext "ad_templavoila_tabs".
#
# Auto generated 03-03-2011 16:06
#
# Manual updates:
# Only the data in the array - everything else is removed by next
# writing. "version" and "dependencies" must not be touched!
########################################################################

$EM_CONF[$_EXTKEY] = array(
	'title' => 'ad: Templavoila Tabs',
	'description' => 'This Extension extends Templavoila Framework with jQuery-Tabs. NOTE: Tested only for templavoila_framework! But should work with templavoila also. Please test and response ;)',
	'category' => 'plugin',
	'shy' => 0,
	'version' => '1.0.2',
	'dependencies' => 'templavoila',
	'conflicts' => '',
	'priority' => '',
	'loadOrder' => '',
	'module' => '',
	'state' => 'stable',
	'uploadfolder' => 0,
	'createDirs' => '',
	'modify_tables' => '',
	'clearcacheonload' => 1,
	'lockType' => '',
	'author' => 'Arno Dudek',
	'author_email' => 'webmaster@adgrafik.at',
	'author_company' => 'ad:grafik',
	'CGLcompliance' => '',
	'CGLcompliance_note' => '',
	'constraints' => array(
		'depends' => array(
			'typo3' => '4.4.0-0.0.0',
			'templavoila' => '1.5.0-',
		),
		'conflicts' => array(
		),
		'suggests' => array(
		),
	),
	'_md5_values_when_last_written' => 'a:16:{s:9:"ChangeLog";s:4:"1250";s:40:"class.tx_adtemplavoilatabs_t3dimport.php";s:4:"d7c9";s:21:"ext_conf_template.txt";s:4:"0ac5";s:12:"ext_icon.gif";s:4:"3dcf";s:17:"ext_localconf.php";s:4:"8881";s:14:"ext_tables.php";s:4:"28f8";s:14:"fec_import.t3d";s:4:"ed51";s:49:"core_templates/datastructures/fce/tabs (fce).html";s:4:"7b31";s:48:"core_templates/datastructures/fce/tabs (fce).xml";s:4:"721f";s:32:"core_templates/fce/fce_tabs.html";s:4:"9325";s:39:"core_templates/typoscript/constants.txt";s:4:"19ab";s:35:"core_templates/typoscript/setup.txt";s:4:"9744";s:14:"doc/manual.sxw";s:4:"01b2";s:18:"lang/locallang.xml";s:4:"cb3d";s:22:"lang/locallang_csh.xml";s:4:"dde5";s:23:"res/js/jquery.cookie.js";s:4:"3847";}',
	'suggests' => array(
	),
);

?>