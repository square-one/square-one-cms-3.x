<?php
/**
 * @package		Joomla.Administrator
 * @subpackage	com_cpanel
 * @copyright	Copyright (C) 2005 - 2012 Open Source Matters, Inc. All rights reserved.
 * @license		GNU General Public License version 2 or later; see LICENSE.txt
 */

// no direct access
defined('_JEXEC') or die;
?>

<?php
foreach ($this->modules as $module) {
	$output = JModuleHelper::renderModule($module, array('style' => 'well'));
	$params = new JRegistry;
	$params->loadString($module->params);
	echo $output;
}