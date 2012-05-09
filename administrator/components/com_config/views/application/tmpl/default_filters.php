<?php
/**
 * @package		Joomla.Administrator
 * @subpackage	com_config
 * @copyright	Copyright (C) 2005 - 2012 Open Source Matters, Inc. All rights reserved.
 * @license		GNU General Public License version 2 or later; see LICENSE.txt
 */

// No direct access
defined('_JEXEC') or die;
?>
<fieldset class="form-vertical">
	<legend><?php echo JText::_('COM_CONFIG_TEXT_FILTER_SETTINGS'); ?></legend>
	<p><?php echo JText::_('COM_CONFIG_TEXT_FILTERS_DESC'); ?></p>
	<?php foreach ($this->form->getFieldset('filters') as $field): ?>
		<div class="control-group">
			<div class="control-label"><?php echo $field->label; ?></div>
			<div class="controls"><?php echo $field->input; ?></div>
		</div>
	<?php endforeach; ?>
</fieldset>