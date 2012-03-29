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
			<legend><?php echo JText::_('INSTL_DATABASE'); ?></legend>
			<div class="control-group">
				<label for="" class="control-label">
					<?php echo JText::_('INSTL_DATABASE_TITLE'); ?>
				</label>
				<div class="controls">
						<?php echo JText::_('INSTL_DATABASE_DESC'); ?>
				</div>
			</div>
			<div class="control-group">
					<label for="" class="control-label">
						<?php echo JText::_('INSTL_BASIC_SETTINGS'); ?>
					</label>
					<div class="controls">
						<table class="table table-striped table-condensed">
							<tr>
								<td colspan="2">
									<?php echo $this->form->getLabel('db_type'); ?>
									<br />
									<?php echo $this->form->getInput('db_type'); ?>
								</td>
								<td>
									<em>
									<?php echo JText::_('INSTL_DATABASE_TYPE_DESC'); ?>
									</em>
								</td>
							</tr>
							<tr>
								<td colspan="2">
									<?php echo $this->form->getLabel('db_host'); ?>
									<br />
									<?php echo $this->form->getInput('db_host'); ?>
								</td>
								<td>
									<em>
									<?php echo JText::_('INSTL_DATABASE_HOST_DESC'); ?>
									</em>
								</td>
							</tr>
							<tr>
								<td colspan="2">
									<?php echo $this->form->getLabel('db_user'); ?>
									<br />
									<?php echo $this->form->getInput('db_user'); ?>
								</td>
								<td>
									<em>
									<?php echo JText::_('INSTL_DATABASE_USER_DESC'); ?>
									</em>
								</td>
							</tr>
							<tr>
								<td colspan="2">
									<?php echo $this->form->getLabel('db_pass'); ?>
									<br />
									<?php echo $this->form->getInput('db_pass'); ?>
								</td>
								<td>
									<em>
									<?php echo JText::_('INSTL_DATABASE_PASSWORD_DESC'); ?>
									</em>
								</td>
							</tr>
							<tr>
								<td colspan="2">
									<?php echo $this->form->getLabel('db_name'); ?>
									<br />
									<?php echo $this->form->getInput('db_name'); ?>
								</td>
								<td>
									<em>
									<?php echo JText::_('INSTL_DATABASE_NAME_DESC'); ?>
									</em>
								</td>
							</tr>
							<tr>
								<td colspan="2">
									<?php echo $this->form->getLabel('db_prefix'); ?>
									<br />
									<?php echo $this->form->getInput('db_prefix'); ?>
								</td>
								<td>
									<em>
									<?php echo JText::_('INSTL_DATABASE_PREFIX_DESC'); ?>
									</em>
								</td>
							</tr>
							<tr>
								<td colspan="2">
									<?php echo $this->form->getLabel('db_old'); ?>
									<br />
									<?php echo $this->form->getInput('db_old'); ?>
								</td>
								<td>
									<em>
									<?php echo JText::_('INSTL_DATABASE_OLD_PROCESS_DESC'); ?>
									</em>
								</td>
							</tr>
						</table>
					</div>
				</div>
				<div class="form-actions">
				<?php if ($this->document->direction == 'ltr') : ?>
						<span class="prev"><a class="btn" href="index.php?view=license" onclick="return Install.goToPage('license');" rel="prev" title="<?php echo JText::_('JPrevious'); ?>"><?php echo JText::_('JPrevious'); ?></a></span> 
						<span class="next"><a class="btn btn-primary" href="#" onclick="Install.submitform();" rel="next" title="<?php echo JText::_('JNext'); ?>"><?php echo JText::_('JNext'); ?></a></span>
				<?php elseif ($this->document->direction == 'rtl') : ?>
						<span class="prev"><a class="btn btn-primary" href="#" onclick="Install.submitform();" rel="next" title="<?php echo JText::_('JNext'); ?>"><?php echo JText::_('JNext'); ?></a></span> 
						<span class="next"><a class="btn" href="index.php?view=license" onclick="return Install.goToPage('license');" rel="prev" title="<?php echo JText::_('JPrevious'); ?>"><?php echo JText::_('JPrevious'); ?></a></span>
				<?php endif; ?>
				</div>
		</fieldset>
	</div>
	<input type="hidden" name="task" value="setup.database" />
	<?php echo JHtml::_('form.token'); ?>
</form>
