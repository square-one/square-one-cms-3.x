<?php
/**
 * @package		Joomla.Administrator
 * @subpackage	com_menus
 * @copyright	Copyright (C) 2005 - 2012 Open Source Matters, Inc. All rights reserved.
 * @license		GNU General Public License version 2 or later; see LICENSE.txt
 */

defined('_JEXEC') or die;

// Include the component HTML helpers.
JHtml::addIncludePath(JPATH_COMPONENT.'/helpers/html');

// Load the tooltip behavior.
JHtml::_('behavior.tooltip');
JHtml::_('behavior.formvalidation');
JHtml::_('behavior.modal');
?>

<script type="text/javascript">
	Joomla.submitbutton = function(task, type)
	{
		if (task == 'item.setType' || task == 'item.setMenuType') {
			if(task == 'item.setType') {
				document.id('item-form').elements['jform[type]'].value = type;
				document.id('fieldtype').value = 'type';
			} else {
				document.id('item-form').elements['jform[menutype]'].value = type;
			}
			Joomla.submitform('item.setType', document.id('item-form'));
		} else if (task == 'item.cancel' || document.formvalidator.isValid(document.id('item-form'))) {
			Joomla.submitform(task, document.id('item-form'));
		} else {
			// special case for modal popups validation response
			$$('#item-form .modal-value.invalid').each(function(field){
				var idReversed = field.id.split("").reverse().join("");
				var separatorLocation = idReversed.indexOf('_');
				var name = idReversed.substr(separatorLocation).split("").reverse().join("")+'name';
				document.id(name).addClass('invalid');
			});
		}
	}
</script>

<form action="<?php echo JRoute::_('index.php?option=com_menus&layout=edit&id='.(int) $this->item->id); ?>" method="post" name="adminForm" id="item-form" class="form-validate form-horizontal">
	<fieldset>
		<ul class="nav nav-tabs">
		  <li class="active"><a href="#details" data-toggle="tab"><?php echo JText::_('COM_MENUS_ITEM_DETAILS');?></a></li>
		  <li><a href="#basic" data-toggle="tab"><?php echo JText::_('COM_MENUS_BASIC_FIELDSET_LABEL');?></a></li>
		  <li><a href="#options" data-toggle="tab"><?php echo JText::_('COM_MENUS_ADVANCED_FIELDSET_LABEL');?></a></li>
		  <?php if (!empty($this->modules)) : ?>
		  	<li><a href="#modules" data-toggle="tab"><?php echo JText::_('COM_MENUS_ITEM_MODULE_ASSIGNMENT');?></a></li>
		  <?php endif; ?>
		</ul>
		<div class="tab-content">
		  <div class="tab-pane active" id="details">
		  	<div class="control-group">
				<div class="control-label">
					<?php echo $this->form->getLabel('type'); ?>
				</div>
				<div class="controls">
					<?php echo $this->form->getInput('type'); ?>
				</div>
			</div>
			<div class="control-group">
				<div class="control-label">
					<?php echo $this->form->getLabel('title'); ?>
				</div>
				<div class="controls">
					<?php echo $this->form->getInput('title'); ?>
				</div>
			</div>
			<?php if ($this->item->type =='url'): ?>
				<?php $this->form->setFieldAttribute('link', 'readonly', 'false');?>
				<div class="control-group">
					<div class="control-label">
						<?php echo $this->form->getLabel('link'); ?>
					</div>
					<div class="controls">
						<?php echo $this->form->getInput('link'); ?>
					</div>
				</div>
			<?php endif; ?>

			<?php if ($this->item->type == 'alias'): ?>
				<div class="control-group">
					<div class="control-label">
						<?php echo $this->form->getLabel('aliastip'); ?>
					</div>
				</div>
			<?php endif; ?>

			<?php if ($this->item->type !='url'): ?>
				<div class="control-group">
					<div class="control-label">
						<?php echo $this->form->getLabel('alias'); ?>
					</div>
					<div class="controls">
						<?php echo $this->form->getInput('alias'); ?>
					</div>
				</div>
			<?php endif; ?>

			<?php if ($this->item->type !=='url'): ?>
				<div class="control-group">
					<div class="control-label">
						<?php echo $this->form->getLabel('link'); ?>
					</div>
					<div class="controls">
						<?php echo $this->form->getInput('link'); ?>
					</div>
				</div>
			<?php endif ?>

			<div class="control-group">
				<div class="control-label">
					<?php echo $this->form->getLabel('published'); ?>
				</div>
				<div class="controls">
					<?php echo $this->form->getInput('published'); ?>
				</div>
			</div>
			
			<div class="control-group">
				<div class="control-label">
					<?php echo $this->form->getLabel('access'); ?>
				</div>
				<div class="controls">
					<?php echo $this->form->getInput('access'); ?>
				</div>
			</div>

			<div class="control-group">
				<div class="control-label">
					<?php echo $this->form->getLabel('menutype'); ?>
				</div>
				<div class="controls">
					<?php echo $this->form->getInput('menutype'); ?>
				</div>
			</div>

			<div class="control-group">
				<div class="control-label">
					<?php echo $this->form->getLabel('parent_id'); ?>
				</div>
				<div class="controls">
					<?php echo $this->form->getInput('parent_id'); ?>
				</div>
			</div>

			<div class="control-group">
				<div class="control-label">
					<?php echo $this->form->getLabel('menuordering'); ?>
				</div>
				<div class="controls">
					<?php echo $this->form->getInput('menuordering'); ?>
				</div>
			</div>

			<div class="control-group">
				<div class="control-label">
					<?php echo $this->form->getLabel('browserNav'); ?>
				</div>
				<div class="controls">
					<?php echo $this->form->getInput('browserNav'); ?>
				</div>
			</div>

			<?php if ($this->item->type == 'component') : ?>
				<div class="control-group">
					<div class="control-label">
						<?php echo $this->form->getLabel('home'); ?>
					</div>
					<div class="controls">
						<?php echo $this->form->getInput('home'); ?>
					</div>
				</div>
			<?php endif; ?>

		  </div>
		  <div class="tab-pane" id="basic">
		  	<div class="control-group">
		  		<div class="control-label">
		  			<?php echo $this->form->getLabel('note'); ?>
		  		</div>
		  		<div class="controls">
		  			<?php echo $this->form->getInput('note'); ?>
		  		</div>
		  	</div>
		  	<div class="control-group">
				<div class="control-label">
					<?php echo $this->form->getLabel('language'); ?>
				</div>
				<div class="controls">
					<?php echo $this->form->getInput('language'); ?>
				</div>
			</div>

			<div class="control-group">
				<div class="control-label">
					<?php echo $this->form->getLabel('template_style_id'); ?>
				</div>
				<div class="controls">
					<?php echo $this->form->getInput('template_style_id'); ?>
				</div>
			</div>

			<div class="control-group">
				<div class="control-label">
					<?php echo $this->form->getLabel('id'); ?>
				</div>
				<div class="controls">
					<?php echo $this->form->getInput('id'); ?>
				</div>
			</div>
		  </div>
	  	  <div class="tab-pane" id="options">
	  	  	<?php echo $this->loadTemplate('options'); ?>
	  	  </div>
		  <?php if (!empty($this->modules)) : ?>
			  <div class="tab-pane" id="modules">
			  	<?php echo $this->loadTemplate('modules'); ?>
			  </div>
		  <?php endif; ?>
		</div>
	</fieldset>

	<input type="hidden" name="task" value="" />
	<?php echo $this->form->getInput('component_id'); ?>
	<?php echo JHtml::_('form.token'); ?>
	<input type="hidden" id="fieldtype" name="fieldtype" value="" />
</form>
