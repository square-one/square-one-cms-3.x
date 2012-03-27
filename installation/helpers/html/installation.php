<?php
/**
 * @package		Joomla.Installation
 * @copyright	Copyright (C) 2005 - 2012 Open Source Matters. All rights reserved.
 * @license		GNU General Public License version 2 or later; see LICENSE.txt
 */

class JHtmlInstallation
{
	public static function stepbar()
 	{
		$view = JRequest::getWord('view');
		switch ($view) {
			case '':
			case 'language':
				$on = 1;
				break;
			case 'preinstall':
				$on = 2;
				break;
			case 'license':
				$on = 3;
				break;
			case 'database':
				$on = 4;
				break;
			case 'filesystem':
				$on = 5;
				break;
			case 'site':
				$on = 6;
				break;
			case 'complete':
				$on = 7;
				break;
			case 'remove':
				$on = 7;
				break;
			default:
				$on = 1;
		}

 		$html = '<ul class="nav nav-tabs">' .
			'<li class="step'.($on == 1 ? ' active' : '').'" id="language"><a href="#">'.JText::_('INSTL_STEP_1_LABEL').'</a></li>' .
			'<li class="step'.($on == 2 ? ' active' : '').'" id="preinstall"><a href="#">'.JText::_('INSTL_STEP_2_LABEL').'</a></li>' .
			'<li class="step'.($on == 3 ? ' active' : '').'" id="license"><a href="#">'.JText::_('INSTL_STEP_3_LABEL').'</a></li>' .
			'<li class="step'.($on == 4 ? ' active' : '').'" id="database"><a href="#">'.JText::_('INSTL_STEP_4_LABEL').'</a></li>' .
			'<li class="step'.($on == 5 ? ' active' : '').'" id="filesystem"><a href="#">'.JText::_('INSTL_STEP_5_LABEL').'</a></li>' .
			'<li class="step'.($on == 6 ? ' active' : '').'" id="site"><a href="#">'.JText::_('INSTL_STEP_6_LABEL').'</a></li>' .
			'<li class="step'.($on == 7 ? ' active' : '').'" id="complete"><a href="#">'.JText::_('INSTL_STEP_7_LABEL').'</a></li>'.
			'</ul>';
			return $html;
	}
}
