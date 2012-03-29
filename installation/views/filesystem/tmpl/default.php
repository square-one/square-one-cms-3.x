<?php
/**
 * @package		Joomla.Installation
 * @copyright	Copyright (C) 2005 - 2012 Open Source Matters, Inc. All rights reserved.
 * @license		GNU General Public License version 2 or later; see LICENSE.txt
 */

defined('_JEXEC') or die;
?>
<form action="index.php" method="post" id="adminForm" class="form-validate form-horizontal">
	<div id="installer">
		<fieldset>
			<legend><?php echo JText::_('INSTL_FTP_TITLE'); ?></legend>
			<div class="control-group">
				<label for="" class="control-label">
					<?php echo JText::_('INSTL_FTP'); ?>
				</label>
				<div class="controls">
					<?php echo JText::_('INSTL_FTP_DESC'); ?>
				</div>
			</div>
			<div class="control-group">
				<label for="" class="control-label">
					<?php echo JText::_('INSTL_BASIC_SETTINGS'); ?>
				</label>
				<div class="controls">
					<table class="table table-striped table-condensed">
						<tr>
							<td>
								<?php echo $this->form->getLabel('ftp_enable'); ?>
							</td>
							<td>
								<?php echo $this->form->getInput('ftp_enable'); ?>
							</td>
							<td>
							
							</td>
						</tr>
						<tr>
							<td>
								<?php echo $this->form->getLabel('ftp_user'); ?>
							</td>
							<td>
								<?php echo $this->form->getInput('ftp_user'); ?>
							</td>
							<td>
								<em>
								<?php echo JText::_('INSTL_FTP_USER_DESC'); ?>
								</em>
							</td>
						</tr>
						<tr>
							<td>
								<?php echo $this->form->getLabel('ftp_pass'); ?>
							</td>
							<td>
								<?php echo $this->form->getInput('ftp_pass'); ?>
							</td>
							<td>
								<em>
								<?php echo JText::_('INSTL_FTP_PASSWORD_DESC'); ?>
								</em>
							</td>
						</tr>
						<tr id="rootPath">
							<td>
								<?php echo $this->form->getLabel('ftp_root'); ?>
							</td>
							<td>
								<?php echo $this->form->getInput('ftp_root'); ?>
							</td>
							<td>
							
							</td>
						</tr>
					</table>
					<p>
						<button id="findbutton" class="btn" onclick="Install.detectFtpRoot(this);"><i class="icon-folder-open"></i> <?php echo JText::_('INSTL_AUTOFIND_FTP_PATH'); ?></button> 
						<button id="verifybutton" class="btn" onclick="Install.verifyFtpSettings(this);"><i class="icon-ok"></i> <?php echo JText::_('INSTL_VERIFY_FTP_SETTINGS'); ?></button>
					</p>
				</div>
			</div>
			<div class="control-group">
				<label for="" class="control-label">
					<?php echo JText::_('INSTL_ADVANCED_SETTINGS'); ?>
				</label>
				<div class="controls">
					<table class="table table-striped table-condensed">
						<tr id="host">
							<td>
								<?php echo $this->form->getLabel('ftp_host'); ?>
							</td>
							<td>
								<?php echo $this->form->getInput('ftp_host'); ?>
							</td>
						</tr>
						<tr id="port">
							<td>
								<?php echo $this->form->getLabel('ftp_port'); ?>
							</td>
							<td>
								<?php echo $this->form->getInput('ftp_port'); ?>
							</td>
						</tr>
						<tr>
							<td>
								<?php echo $this->form->getLabel('ftp_save'); ?>
							</td>
							<td>
								<?php echo $this->form->getInput('ftp_save'); ?>
							</td>
						</tr>
					</table>
				</div>
			</div>
			<div class="form-actions">
			<?php if ($this->document->direction == 'ltr') : ?>
					<span class="prev"><a class="btn" href="index.php?view=database" onclick="return Install.goToPage('database');" rel="prev" title="<?php echo JText::_('JPrevious'); ?>"><?php echo JText::_('JPrevious'); ?></a></span> 
					<span class="next"><a class="btn btn-primary" href="#" onclick="Install.submitform();" rel="next" title="<?php echo JText::_('JNext'); ?>"><?php echo JText::_('JNext'); ?></a></span>
			<?php elseif ($this->document->direction == 'rtl') : ?>
					<span class="prev"><a class="btn btn-primary" href="#" onclick="Install.submitform();" rel="next" title="<?php echo JText::_('JNext'); ?>"><?php echo JText::_('JNext'); ?></a></span> 
					<span class="next"><a class="btn" href="index.php?view=database" onclick="return Install.goToPage('database');" rel="prev" title="<?php echo JText::_('JPrevious'); ?>"><?php echo JText::_('JPrevious'); ?></a></span>
			<?php endif; ?>
				</div>
		</fieldset>
	</div>
	<input type="hidden" name="task" value="setup.filesystem" />
	<?php echo JHtml::_('form.token'); ?>
</form>
