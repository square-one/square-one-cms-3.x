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
<form action="<?php echo JRoute::_('index.php', true, $params->get('usesecure')); ?>" method="post" id="form-login" class="form-horizontal">
	<fieldset class="loginform">
		<legend><?php echo JText::_('MOD_LOGIN_LOGIN'); ?></legend>
		<div class="control-group">
			<label id="mod-login-username-lbl" class="control-label" for="mod-login-username"><?php echo JText::_('JGLOBAL_USERNAME'); ?></label>
			<div class="controls">
			  <div class="input-prepend">
			    <span class="add-on"><i class="icon-user"></i></span><input name="username" id="mod-login-username" type="text" class="inputbox" size="15" />
			  </div>
			</div>
		</div>
		<div class="control-group">
			<label id="mod-login-password-lbl" class="control-label" for="mod-login-password"><?php echo JText::_('JGLOBAL_PASSWORD'); ?></label>
			<div class="controls">
			  <div class="input-prepend">
			    <span class="add-on"><i class="icon-lock"></i></span><input name="passwd" id="mod-login-password" type="password" class="inputbox" size="15" />
			  </div>
			</div>
		</div>
		<div class="control-group">
			<label id="mod-login-language-lbl" class="control-label" for="lang"><?php echo JText::_('MOD_LOGIN_LANGUAGE'); ?></label>
			<div class="controls">
			  <div class="input-prepend">
			    <span class="add-on"><i class="icon-comment"></i></span><?php echo $langs; ?>
			  </div>
			</div>
		</div>		
		<div class="control-group">
			<div class="controls">
				<input type="submit" class="btn btn-primary btn-large" value="<?php echo JText::_( 'MOD_LOGIN_LOGIN' ); ?>" />
			</div>
		</div>
		<input type="hidden" name="option" value="com_login" />
		<input type="hidden" name="task" value="login" />
		<input type="hidden" name="return" value="<?php echo $return; ?>" />
		<?php echo JHtml::_('form.token'); ?>
	</fieldset>
</form>
