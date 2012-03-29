<?php
/**
 * @package		Joomla.Installation
 * @copyright	Copyright (C) 2005 - 2012 Open Source Matters. All rights reserved.
 * @license		GNU General Public License version 2 or later; see LICENSE.txt
 */

defined('_JEXEC') or die;
?>
<div id="installer">
	<fieldset>
	<form action="index.php" method="post" id="adminForm" class="form-validate form-horizontal">
			<legend><?php echo JText::_('INSTL_SITE'); ?></legend>
			<div class="control-group">
				<label for="" class="control-label">
					<?php echo JText::_('INSTL_BASIC_SETTINGS'); ?>
				</label>
				<div class="controls">
					<table class="table table-striped table-condensed">
						<tbody>
							<tr>
								<td class="span2 item">
									<?php echo $this->form->getLabel('site_name'); ?>
								</td>
								<td>
									<?php echo $this->form->getInput('site_name'); ?>
								</td>
							</tr>
							<tr>
								<td class="item">
									<?php echo $this->form->getLabel('admin_email'); ?>
								</td>
								<td>
									<?php echo $this->form->getInput('admin_email'); ?>
								</td>
							</tr>
							<tr>
								<td class="item">
									<?php echo $this->form->getLabel('admin_user'); ?>
								</td>
								<td>
									<?php echo $this->form->getInput('admin_user'); ?>
								</td>
							</tr>
							<tr>
								<td class="item">
									<?php echo $this->form->getLabel('admin_password'); ?>
								</td>
								<td>
									<?php echo $this->form->getInput('admin_password'); ?>
								</td>
							</tr>
							<tr>
								<td class="item">
									<?php echo $this->form->getLabel('admin_password2'); ?>
								</td>
								<td>
									<?php echo $this->form->getInput('admin_password2'); ?>
								</td>
							</tr>
						</tbody>
						<tfoot>
							<tr>
								<td colspan="2"></td>
							</tr>
						</tfoot>
					</table>
				</div>
			</div>
			<div class="control-group">
				<label for="" class="control-label">
					<?php echo JText::_('INSTL_SITE_META_ADVANCED_SETTINGS'); ?>
				</label>
				<div class="controls">
					<table class="table table-striped table-condensed">
						<tbody>
							<tr>
								<td class="span2" title="<?php echo JText::_('INSTL_SITE_METADESC_TITLE_LABEL'); ?>">
									<?php echo $this->form->getLabel('site_metadesc'); ?>
								</td>
								<td>
									<?php echo $this->form->getInput('site_metadesc'); ?>
								</td>
							</tr>
							<tr>
								<td title="<?php echo JText::_('INSTL_SITE_METAKEYS_TITLE_LABEL'); ?>">
									<?php echo $this->form->getLabel('site_metakeys'); ?>
								</td>
								<td>
									<?php echo $this->form->getInput('site_metakeys'); ?>
								</td>
							</tr>
							<tr>
								<td title="<?php echo JText::_('INSTL_SITE_OFFLINE_TITLE_LABEL'); ?>">
									<?php echo $this->form->getLabel('site_offline'); ?>
								</td>
								<td>
									<?php echo $this->form->getInput('site_offline'); ?>
								</td>
							</tr>
						</tbody>
						<tfoot>
							<tr>
								<td colspan="2"></td>
							</tr>
						</tfoot>
					</table>
				</div>
			</div>
		<input type="hidden" name="task" value="setup.saveconfig" />
		<?php echo JHtml::_('form.token'); ?>
		<?php echo $this->form->getInput('sample_installed'); ?>
		</form>

		<form enctype="multipart/form-data" action="index.php" method="post" class="form-horizontal" id="filename">
			<div class="control-group">
				<label for="" class="control-label">
					<?php echo $this->form->getLabel('sample_file'); ?>
				</label>
				<div class="controls">
					<?php echo $this->form->getInput('sample_file'); ?> <span id="theDefault">
						<button class="btn btn-info" name="instDefault" onclick="Install.sampleData(this, <?php echo $this->form->getField('sample_file')->id;?>);"><i class="icon-upload icon-white"></i> <?php echo JText::_('INSTL_SITE_INSTALL_SAMPLE_LABEL'); ?></button>
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
					<div class="alert alert-info">
						<?php echo JText::_('INSTL_SITE_LOAD_SAMPLE_DESC1'); ?>
					</div>
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
	</fieldset>
</div>
