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
			<legend><?php echo JText::sprintf('INSTL_PRECHECK_FOR_VERSION', $this->version->getLongVersion()); ?> <span class="refresh">
				<a class="btn btn-small" href="index.php?view=preinstall" onclick="return Install.goToPage('preinstall');" title="<?php echo JText::_('JCheck_Again'); ?>"><i class="icon-refresh"></i> <?php echo JText::_('JCheck_Again'); ?></a>
			</span>
			</legend>
			<div class="control-group">
				<label for="" class="control-label">
					<?php echo JText::_('INSTL_PRECHECK_TITLE'); ?>
				</label>
				<div class="controls">
					<div class="install-text">
						<?php echo JText::_('INSTL_PRECHECK_DESC'); ?>
					</div>
					<div class="install-body">
							<table class="table table-striped table-condensed">
								<tbody>
<?php foreach ($this->options as $option) : ?>
								<tr>
									<td class="item">
										<?php echo $option->label; ?>
									</td>
									<td>
										<span class="label label-<?php echo ($option->state) ? 'success' : 'important'; ?>">
											<?php echo JText::_(($option->state) ? 'JYES' : 'JNO'); ?>
										</span>
										<span class="small">
											<?php echo $option->notice; ?>&#160;
										</span>
									</td>
								</tr>
<?php endforeach; ?>
								</tbody>
								<tfoot>
									<tr>
										<td colspan="2"></td>
									</tr>
								</tfoot>
							</table>
					</div>
				</div>
			</div>

			<div class="newsection">
			</div>
			
			<div class="control-group">
				<label for="" class="control-label">
					<?php echo JText::_('INSTL_PRECHECK_RECOMMENDED_SETTINGS_TITLE'); ?>
				</label>
				<div class="controls">
					<div class="install-text">
						<?php echo JText::_('INSTL_PRECHECK_RECOMMENDED_SETTINGS_DESC'); ?>
					</div>
					<div class="install-body">
						<table class="table table-striped table-condensed">
							<thead>
							<tr>
								<th class="toggle">
									<?php echo JText::_('INSTL_PRECHECK_DIRECTIVE'); ?>
								</th>
								<th class="toggle">
									<?php echo JText::_('INSTL_PRECHECK_RECOMMENDED'); ?>
								</th>
								<th class="toggle">
									<?php echo JText::_('INSTL_PRECHECK_ACTUAL'); ?>
								</th>
							</tr>
							</thead>
							<tbody>
<?php foreach ($this->settings as $setting) : ?>
								<tr>
									<td class="item">
										<?php echo $setting->label; ?>
									</td>
									<td class="toggle">
										<span class="label label-inverse">
										<?php echo JText::_(($setting->recommended) ? 'JON' : 'JOFF'); ?>
										</span>
									</td>
									<td>
										<span class="label label-<?php echo ($setting->state === $setting->recommended) ? 'success' : 'important'; ?>">
										<?php echo JText::_(($setting->state) ? 'JON' : 'JOFF'); ?>
										</span>
									</td>
								</tr>
<?php endforeach; ?>
							</tbody>
							<tfoot>
								<tr>
									<td colspan="3"></td>
								</tr>
							</tfoot>
						</table>
					</div>
				</div>
			</div>
			
			<div class="form-actions">
			<?php if ($this->document->direction == 'ltr') : ?>
					<span class="prev">
						<a class="btn" href="index.php?view=language" onclick="return Install.goToPage('language');" rel="prev" title="<?php echo JText::_('JPrevious'); ?>"><?php echo JText::_('JPrevious'); ?></a>
					</span> 
				<?php if ($this->sufficient) : ?>
					<span class="next"><a class="btn btn-primary" href="index.php?view=license" onclick="return Install.goToPage('license');" rel="next" title="<?php echo JText::_('JNext'); ?>"><?php echo JText::_('JNext'); ?></a>
					</span>
				<?php endif; ?>
			<?php elseif ($this->document->direction == 'rtl') : ?>
				<?php if ($this->sufficient) : ?>
					<span class="prev">
						<a class="btn btn-primary" href="index.php?view=license" onclick="return Install.goToPage('license');" rel="next" title="<?php echo JText::_('JNext'); ?>"><?php echo JText::_('JNext'); ?></a>
					</span> 
				<?php endif; ?>
					<span class="next"><a class="btn" href="index.php?view=language" onclick="return Install.goToPage('language');" rel="prev" title="<?php echo JText::_('JPrevious'); ?>"><?php echo JText::_('JPrevious'); ?></a>
					</span> 
			<?php endif; ?>
				</div>
		</fieldset>
	</div>
	<input type="hidden" name="task" value="" />
	<?php echo JHtml::_('form.token'); ?>
</form>
