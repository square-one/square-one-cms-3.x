<?php
/**
 * @package		Joomla.Administrator
 * @subpackage	com_menus
 * @copyright	Copyright (C) 2005 - 2012 Open Source Matters, Inc. All rights reserved.
 * @license		GNU General Public License version 2 or later; see LICENSE.txt
 */

defined('_JEXEC') or die;
?>
<?php
	$fieldSets = $this->form->getFieldsets('request');

	if (!empty($fieldSets)) {
		$fieldSet = array_shift($fieldSets);
		$label = !empty($fieldSet->label) ? $fieldSet->label : 'COM_MENUS_'.$fieldSet->name.'_FIELDSET_LABEL';
		if (isset($fieldSet->description) && trim($fieldSet->description)) :
			echo '<p class="tip">'.$this->escape(JText::_($fieldSet->description)).'</p>';
		endif;
	?>
			<?php $hidden_fields = ''; ?>
				<?php foreach ($this->form->getFieldset('request') as $field) : ?>
				<?php if (!$field->hidden) : ?>
				<div class="control-group">
					<div class="control-label">
						<?php echo $field->label; ?>
					</div>
					<div class="controls">
						<?php echo $field->input; ?>
					</div>
				</div>
				<?php else : $hidden_fields.= $field->input; ?>
				<?php endif; ?>
				<?php endforeach; ?>
			<?php echo $hidden_fields; ?>
<?php
	}

	$fieldSets = $this->form->getFieldsets('params');

	foreach ($fieldSets as $name => $fieldSet) :
		$label = !empty($fieldSet->label) ? $fieldSet->label : 'COM_MENUS_'.$name.'_FIELDSET_LABEL';
			if (isset($fieldSet->description) && trim($fieldSet->description)) :
				echo '<p class="tip">'.$this->escape(JText::_($fieldSet->description)).'</p>';
			endif;
			?>
				<?php foreach ($this->form->getFieldset($name) as $field) : ?>
					<div class="control-group">
						<div class="control-label">
							<?php echo $field->label; ?>
						</div>
						<div class="controls">
							<?php echo $field->input; ?>
						</div>
					</div>
				<?php endforeach; ?>
<?php endforeach;?>
<?php

	$fieldSets = $this->form->getFieldsets('associations');

	foreach ($fieldSets as $name => $fieldSet) :
		$label = !empty($fieldSet->label) ? $fieldSet->label : 'COM_MENUS_'.$name.'_FIELDSET_LABEL';
			if (isset($fieldSet->description) && trim($fieldSet->description)) :
				echo '<p class="tip">'.$this->escape(JText::_($fieldSet->description)).'</p>';
			endif;
			?>
				<?php foreach ($this->form->getFieldset($name) as $field) : ?>
					<div class="control-group">
						<div class="control-label">
							<?php echo $field->label; ?>
						</div>
						<div class="controls">
							<?php echo $field->input; ?>
						</div>
					</div>
				<?php endforeach; ?>
<?php endforeach;?>
