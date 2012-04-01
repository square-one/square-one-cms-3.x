<?php
/**
 * @package		Joomla.Administrator
 * @subpackage	com_content
 * @copyright	Copyright (C) 2005 - 2012 Open Source Matters, Inc. All rights reserved.
 * @license		GNU General Public License version 2 or later; see LICENSE.txt
 */

// No direct access.
defined('_JEXEC') or die;

// Include the component HTML helpers.
JHtml::addIncludePath(JPATH_COMPONENT.'/helpers/html');

// Load the tooltip behavior.
JHtml::_('behavior.tooltip');
JHtml::_('behavior.formvalidation');
JHtml::_('behavior.keepalive');

// Create shortcut to parameters.
	$params = $this->state->get('params');

	$params = $params->toArray();

// This checks if the config options have ever been saved. If they haven't they will fall back to the original settings.
$editoroptions = isset($params['show_publishing_options']);

if (!$editoroptions):
	$params['show_publishing_options'] = '1';
	$params['show_article_options'] = '1';
	$params['show_urls_images_backend'] = '0';
	$params['show_urls_images_frontend'] = '0';
endif;

// Check if the article uses configuration settings besides global. If so, use them.
if (!empty($this->item->attribs['show_publishing_options'])):
		$params['show_publishing_options'] = $this->item->attribs['show_publishing_options'];
endif;
if (!empty($this->item->attribs['show_article_options'])):
		$params['show_article_options'] = $this->item->attribs['show_article_options'];
endif;
if (!empty($this->item->attribs['show_urls_images_backend'])):
		$params['show_urls_images_backend'] = $this->item->attribs['show_urls_images_backend'];
endif;

?>

<script type="text/javascript">
	Joomla.submitbutton = function(task) {
		if (task == 'article.cancel' || document.formvalidator.isValid(document.id('item-form'))) {
			<?php echo $this->form->getField('articletext')->save(); ?>
			Joomla.submitform(task, document.getElementById('item-form'));
		} else {
			alert('<?php echo $this->escape(JText::_('JGLOBAL_VALIDATION_FORM_FAILED'));?>');
		}
	}
</script>

<form action="<?php echo JRoute::_('index.php?option=com_content&layout=edit&id='.(int) $this->item->id); ?>" method="post" name="adminForm" id="item-form" class="form-validate">
	<ul class="nav nav-tabs">
	  <li class="active"><a href="#general" data-toggle="tab"><?php echo JText::_('COM_CONTENT_ARTICLE_DETAILS');?></a></li>
	  <li><a href="#publishing" data-toggle="tab"><?php echo JText::_('COM_CONTENT_FIELDSET_PUBLISHING');?></a></li>
	  <?php  $fieldSets = $this->form->getFieldsets('attribs'); ?>
	  	<?php foreach ($fieldSets as $name => $fieldSet) : ?>
  			<?php if ($params['show_article_options'] || (( $params['show_article_options'] == '' && !empty($editoroptions) ))): ?>
  				<?php if ($name != 'editorConfig' && $name != 'basic-limited') : ?>
  					<li><a href="#attrib-<?php echo $name;?>" data-toggle="tab"><?php echo JText::_($fieldSet->label);?></a></li>
  				<?php endif ?>
  			<?php endif; ?>
  		<?php endforeach; ?>
 		<?php if ( $this->canDo->get('core.admin')   ):  ?>
 			<li><a href="#editor" data-toggle="tab"><?php echo JText::_('COM_CONTENT_SLIDER_EDITOR_CONFIG');?></a></li>
 		<?php endif ?>
	  <li><a href="#images" data-toggle="tab"><?php echo JText::_('COM_CONTENT_FIELDSET_URLS_AND_IMAGES');?></a></li>
	  <li><a href="#metadata" data-toggle="tab"><?php echo JText::_('JGLOBAL_FIELDSET_METADATA_OPTIONS');?></a></li>
	  <?php if ($this->canDo->get('core.admin')): ?>
	 	 <li><a href="#permissions" data-toggle="tab"><?php echo JText::_('COM_CONTENT_FIELDSET_RULES');?></a></li>
	 	<?php endif ?>
	</ul>
	
	<div class="tab-content">
		<!-- Begin Tabs -->
		<div class="tab-pane active" id="general">
			<fieldset class="adminform">
				<div class="control-group form-inline">
					<?php echo $this->form->getInput('title'); ?> <?php echo $this->form->getInput('catid'); ?>
				</div>
				<?php echo $this->form->getInput('articletext'); ?>
			</fieldset>
		</div>
		
		<?php // Do not show the publishing options if the edit form is configured not to. ?>
			<?php  if ($params['show_publishing_options'] || ( $params['show_publishing_options'] = '' && !empty($editoroptions)) ): ?>
				<div class="tab-pane" id="publishing">
					<fieldset class="panelform">
						<div class="control-group">
							<div class="controls"><?php echo $this->form->getLabel('alias'); ?>
							<?php echo $this->form->getInput('alias'); ?></div>
				
							<div class="controls"><?php echo $this->form->getLabel('state'); ?>
							<?php echo $this->form->getInput('state'); ?></div>
				
							<div class="controls"><?php echo $this->form->getLabel('access'); ?>
							<?php echo $this->form->getInput('access'); ?></div>
				
							<div class="controls"><?php echo $this->form->getLabel('featured'); ?>
							<?php echo $this->form->getInput('featured'); ?></div>
				
							<div class="controls"><?php echo $this->form->getLabel('language'); ?>
							<?php echo $this->form->getInput('language'); ?></div>
				
							<div class="controls"><?php echo $this->form->getLabel('id'); ?>
							<?php echo $this->form->getInput('id'); ?></div>
							
							<div class="controls"><?php echo $this->form->getLabel('created_by'); ?>
							<?php echo $this->form->getInput('created_by'); ?></div>
			
							<div class="controls"><?php echo $this->form->getLabel('created_by_alias'); ?>
							<?php echo $this->form->getInput('created_by_alias'); ?></div>
			
							<div class="controls"><?php echo $this->form->getLabel('created'); ?>
							<?php echo $this->form->getInput('created'); ?></div>
			
							<div class="controls"><?php echo $this->form->getLabel('publish_up'); ?>
							<?php echo $this->form->getInput('publish_up'); ?></div>
			
							<div class="controls"><?php echo $this->form->getLabel('publish_down'); ?>
							<?php echo $this->form->getInput('publish_down'); ?></div>
			
							<?php if ($this->item->modified_by) : ?>
								<div class="controls"><?php echo $this->form->getLabel('modified_by'); ?>
								<?php echo $this->form->getInput('modified_by'); ?></div>
			
								<div class="controls"><?php echo $this->form->getLabel('modified'); ?>
								<?php echo $this->form->getInput('modified'); ?></div>
							<?php endif; ?>
			
							<?php if ($this->item->version) : ?>
								<div class="controls"><?php echo $this->form->getLabel('version'); ?>
								<?php echo $this->form->getInput('version'); ?></div>
							<?php endif; ?>
			
							<?php if ($this->item->hits) : ?>
								<div class="controls"><?php echo $this->form->getLabel('hits'); ?>
								<?php echo $this->form->getInput('hits'); ?></div>
							<?php endif; ?>
						</div>
					</fieldset>
				</div>
			<?php  endif; ?>
			<?php  $fieldSets = $this->form->getFieldsets('attribs'); ?>
				<?php foreach ($fieldSets as $name => $fieldSet) : ?>
					<div class="tab-pane" id="attrib-<?php echo $name;?>">
					<?php // If the parameter says to show the article options or if the parameters have never been set, we will
						  // show the article options. ?>
		
					<?php if ($params['show_article_options'] || (( $params['show_article_options'] == '' && !empty($editoroptions) ))): ?>
						<?php // Go through all the fieldsets except the configuration and basic-limited, which are
							  // handled separately below. ?>
		
						<?php if ($name != 'editorConfig' && $name != 'basic-limited') : ?>
							<?php if (isset($fieldSet->description) && trim($fieldSet->description)) : ?>
								<p class="tip"><?php echo $this->escape(JText::_($fieldSet->description));?></p>
							<?php endif; ?>
							<fieldset class="panelform">
								<div class="control-group">
								<?php foreach ($this->form->getFieldset($name) as $field) : ?>
									<div class="controls"><?php echo $field->label; ?>
									<?php echo $field->input; ?></div>
								<?php endforeach; ?>
								</div>
							</fieldset>
						<?php endif ?>
						<?php // If we are not showing the options we need to use the hidden fields so the values are not lost.  ?>
					<?php  elseif ($name == 'basic-limited'): ?>
							<?php foreach ($this->form->getFieldset('basic-limited') as $field) : ?>
								<?php  echo $field->input; ?>
							<?php endforeach; ?>
		
					<?php endif; ?>
					</div>
				<?php endforeach; ?>
			<?php // We need to make a separate space for the configuration
			      // so that those fields always show to those wih permissions ?>
			<?php if ( $this->canDo->get('core.admin')   ):  ?>
				<div class="tab-pane" id="editor">
					<fieldset  class="panelform" >
						<div class="control-group">
						<?php foreach ($this->form->getFieldset('editorConfig') as $field) : ?>
							<div class="controls"><?php echo $field->label; ?>
							<?php echo $field->input; ?></div>
						<?php endforeach; ?>
						</div>
					</fieldset>
				</div>
			<?php endif ?>
		
			<?php // The url and images fields only show if the configuration is set to allow them.  ?>
			<?php // This is for legacy reasons. ?>
			<?php if ($params['show_urls_images_backend']): ?>
				<div class="tab-pane" id="images">
					<fieldset class="panelform">
					<div class="control-group">
						<div class="controls">
							<?php echo $this->form->getLabel('images'); ?>
							<?php echo $this->form->getInput('images'); ?>
						</div>
		
						<?php foreach($this->form->getGroup('images') as $field): ?>
							<div class="controls">
								<?php if (!$field->hidden): ?>
									<?php echo $field->label; ?>
								<?php endif; ?>
								<?php echo $field->input; ?>
							</div>
						<?php endforeach; ?>
							<?php foreach($this->form->getGroup('urls') as $field): ?>
							<div class="controls">
								<?php if (!$field->hidden): ?>
									<?php echo $field->label; ?>
								<?php endif; ?>
								<?php echo $field->input; ?>
							</div>
						<?php endforeach; ?>
					</div>
					</fieldset>
				</div>
			<?php endif; ?>
			
			<div class="tab-pane" id="metadata">
				<fieldset class="panelform">
					<?php echo $this->loadTemplate('metadata'); ?>
				</fieldset>
			</div>
		
			<?php if ($this->canDo->get('core.admin')): ?>
				<div class="tab-pane" id="permissions">
					<fieldset class="panelform">
						<legend><?php echo JText::_('COM_CONTENT_FIELDSET_RULES');?></legend>
						<?php echo $this->form->getLabel('rules'); ?>
						<?php echo $this->form->getInput('rules'); ?>
					</fieldset>
				</div>
			<?php endif; ?>
		<!-- End Tabs -->
	</div>
		<input type="hidden" name="task" value="" />
		<input type="hidden" name="return" value="<?php echo JRequest::getCmd('return');?>" />
		<?php echo JHtml::_('form.token'); ?>
</form>
