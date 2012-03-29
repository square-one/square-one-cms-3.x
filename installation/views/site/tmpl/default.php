<?php
/**
 * @package		Joomla.Installation
 * @copyright	Copyright (C) 2005 - 2012 Open Source Matters. All rights reserved.
 * @license		GNU General Public License version 2 or later; see LICENSE.txt
 */

defined('_JEXEC') or die;
?>
<div id="installer">
	<form action="index.php" method="post" id="adminForm" class="form-validate form-horizontal">
		<fieldset>
			<legend><?php echo JText::_('INSTL_SITE'); ?></legend>
			<div class="control-group">
				<label for="" class="control-label">
					<?php echo $this->form->getLabel('site_name'); ?>
				</label>
				<div class="controls">
					<?php echo $this->form->getInput('site_name'); ?> <i class="hasTip icon-info-sign" title="<?php echo JText::_('INSTL_SITE_NAME_DESC'); ?>"></i>
				</div>
			</div>
			<div class="control-group">
				<label for="" class="control-label">
					<?php echo $this->form->getLabel('admin_email'); ?>
				</label>
				<div class="controls">
					<?php echo $this->form->getInput('admin_email'); ?>  <i class="hasTip icon-info-sign" title="<?php echo JText::_('INSTL_SITE_CONF_DESC'); ?>"></i>
				</div>
			</div>
			<div class="control-group">
				<label for="" class="control-label">
					<?php echo $this->form->getLabel('admin_user'); ?>
				</label>
				<div class="controls">
					<?php echo $this->form->getInput('admin_user'); ?>
				</div>
			</div>
			<div class="control-group">
				<label for="" class="control-label">
					<?php echo $this->form->getLabel('admin_password'); ?>
				</label>
				<div class="controls">
					<?php echo $this->form->getInput('admin_password'); ?>
				</div>
			</div>
			<div class="control-group">
				<label for="" class="control-label">
					<?php echo $this->form->getLabel('admin_password2'); ?>
				</label>
				<div class="controls">
					<?php echo $this->form->getInput('admin_password2'); ?>
				</div>
			</div>
			<div class="control-group">
				<label for="" class="control-label">
					<?php echo $this->form->getLabel('site_metadesc'); ?>
				</label>
				<div class="controls">
					<?php echo $this->form->getInput('site_metadesc'); ?>
				</div>
			</div>
			<div class="control-group">
				<label for="" class="control-label">
					<?php echo $this->form->getLabel('site_metakeys'); ?>
				</label>
				<div class="controls">
					<?php echo $this->form->getInput('site_metakeys'); ?>
				</div>
			</div>
			
			<div class="control-group">
				<label for="" class="control-label">
					<?php echo $this->form->getLabel('site_offline'); ?>
				</label>
				<div class="controls">
					<?php echo $this->form->getInput('site_offline'); ?>
				</div>
			</div>
		</fieldset>
		<input type="hidden" name="task" value="setup.saveconfig" />
		<?php echo JHtml::_('form.token'); ?>
		<?php echo $this->form->getInput('sample_installed'); ?>
		</form>

		<form enctype="multipart/form-data" action="index.php" method="post" class="form-horizontal" id="filename">
			<legend><?php echo JText::_('INSTL_SITE_LOAD_SAMPLE_TITLE'); ?></legend>
			<div class="control-group">
				<label for="" class="control-label">
					<?php echo $this->form->getLabel('sample_file'); ?>
				</label>
				<div class="controls">
					<?php echo $this->form->getInput('sample_file'); ?> <span id="theDefault">
						<button class="btn btn-inverse" name="instDefault" onclick="Install.sampleData(this, <?php echo $this->form->getField('sample_file')->id;?>);"><i class="icon-upload icon-white"></i> <?php echo JText::_('INSTL_SITE_INSTALL_SAMPLE_LABEL'); ?></button>
					</span>
					 <i class="icon-info-sign" title="<?php echo JText::_('INSTL_SITE_INSTALL_SAMPLE_DESC'); ?>"></i>
					 <div class="message inlineError" id="theDefaultError" style="display: none">
					 	<dl>
					 		<dt class="error"><?php echo JText::_('JERROR'); ?></dt>
					 		<dd id="theDefaultErrorMessage"></dd>
					 	</dl>
					 </div>
				</div>
			</div>
			<div class="control-group">
				<label for="" class="control-label">
					
				</label>
				<div class="controls small">
					<p><?php echo JText::_('INSTL_SITE_LOAD_SAMPLE_DESC1'); ?></p>
					<p><?php echo JText::_('INSTL_SITE_LOAD_SAMPLE_DESC2'); ?></p>
					<p><?php echo JText::_('INSTL_SITE_LOAD_SAMPLE_DESC3'); ?></p>
					<p><?php echo JText::_('INSTL_SITE_LOAD_SAMPLE_DESC4'); ?></p>
					<p><?php echo JText::_('INSTL_SITE_LOAD_SAMPLE_DESC8'); ?></p>
				</div>
			</div>
			<div class="form-actions">
			<?php if ($this->document->direction == 'ltr') : ?>
					<span class="prev"><a class="btn" href="index.php?view=filesystem" onclick="return Install.goToPage('filesystem');" rel="prev" title="<?php echo JText::_('JPrevious'); ?>"><?php echo JText::_('JPrevious'); ?></a></span> 
					<span class="next"><a class="btn btn-primary" href="#" onclick="Install.submitform();" rel="next" title="<?php echo JText::_('JNext'); ?>"><?php echo JText::_('JNext'); ?></a></span>
			<?php elseif ($this->document->direction == 'rtl') : ?>
					<span class="prev"><a class="btn btn-primary" href="#" onclick="Install.submitform();" rel="next" title="<?php echo JText::_('JNext'); ?>"><?php echo JText::_('JNext'); ?></a></span> 
					<span class="next"><a class="btn" href="index.php?view=filesystem" onclick="return Install.goToPage('filesystem');" rel="prev" title="<?php echo JText::_('JPrevious'); ?>"><?php echo JText::_('JPrevious'); ?></a></span>
			<?php endif; ?>
				</div>
			<?php echo $this->form->getInput('type'); ?>
			<?php echo JHtml::_('form.token'); ?>
		</form>
</div>
