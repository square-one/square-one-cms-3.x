<?php
/**
 * @package		Joomla.Administrator
 * @subpackage	mod_login
 * @copyright	Copyright (C) 2005 - 2012 Open Source Matters, Inc. All rights reserved.
 * @license		GNU General Public License version 2 or later; see LICENSE.txt
 */

// No direct access.
defined('_JEXEC') or die;
JHtml::_('behavior.keepalive');
?>
<form action="<?php echo JRoute::_('index.php', true, $params->get('usesecure')); ?>" method="post" id="form-login" class="form-inline">
	<fieldset class="loginform">
		<div class="control-group">
			<div class="controls">
			  <div class="input-prepend">
			    <span class="add-on"><i class="icon-user"></i></span><input name="username" id="mod-login-username" type="text" class="inputbox tip" title="<?php echo JText::_('JGLOBAL_USERNAME'); ?>" size="15" />
			  </div>
			</div>
		</div>
		<div class="control-group">
			<div class="controls">
			  <div class="input-prepend">
			    <span class="add-on"><i class="icon-lock"></i></span><input name="passwd" id="mod-login-password" type="password" class="inputbox tip" title="<?php echo JText::_('JGLOBAL_PASSWORD'); ?>" size="15" />
			  </div>
			</div>
		</div>
		<div class="control-group">
			<div class="controls">
				<div class="btn-group">
					<input type="submit" class="btn btn-primary btn-large" value="<?php echo JText::_( 'MOD_LOGIN_LOGIN' ); ?>" /><a class="btn btn-primary btn-large" data-toggle="collapse" data-target="#language"><i class="icon-comment icon-white tip" title="<?php echo JText::_('MOD_LOGIN_LANGUAGE'); ?>"></i></a>
				</div>
			</div>
		</div>
		<div id="language" class="collapse fade">
			<hr />
		    <?php echo $langs; ?>
		</div>
		<input type="hidden" name="option" value="com_login" />
		<input type="hidden" name="task" value="login" />
		<input type="hidden" name="return" value="<?php echo $return; ?>" />
		<?php echo JHtml::_('form.token'); ?>
	</fieldset>
</form>
