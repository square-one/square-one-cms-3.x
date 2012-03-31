<?php
/**
 * @package		Joomla.Administrator
 * @subpackage	Templates.strapped
 * @copyright	Copyright (C) 2005 - 2012 Open Source Matters, Inc. All rights reserved.
 * @license		GNU General Public License version 2 or later; see LICENSE.txt
 * @since		3.0
 */
 
// no direct access
defined('_JEXEC') or die;

$app = JFactory::getApplication();
$doc = JFactory::getDocument();

// Add Stylesheets
$doc->addStyleSheet('../templates/system/css/bootstrap.css');
$doc->addStyleSheet('../templates/system/css/bootstrap-extended.css');
$doc->addStyleSheet('../templates/system/css/bootstrap-responsive.css');
$doc->addStyleSheet('templates/'.$this->template.'/css/template.css');
?>
<!DOCTYPE html>
<html>
<head>
	<?php 

    // Detecting Active Variables
    $option = JRequest::getCmd('option', '');
    $view = JRequest::getCmd('view', '');
    $layout = JRequest::getCmd('layout', '');
    $task = JRequest::getCmd('task', '');
    $itemid = JRequest::getCmd('Itemid', '');
    $sitename = $app->getCfg('sitename');
    if($task == "edit" || $layout == "form" ) :
    $fullWidth = 1;
    else:
    $fullWidth = 0;
    endif;
    $document =& JFactory::getDocument();
    
    // Adjusting content width
    if ((!JRequest::getInt('hidemainmenu')) && $this->countModules('right')) :
    	$span = "span6";
    elseif ((!JRequest::getInt('hidemainmenu')) && !$this->countModules('right')) :
    	$span = "span10";
    elseif ((JRequest::getInt('hidemainmenu')) && $this->countModules('right')) :
    	$span = "span8";
    else :
    	$span = "span12";
    endif;
	?>
	<script src="<?php echo $this->baseurl; ?>/templates/<?php echo $this->template ?>/js/jquery.js"></script>
	<script src="<?php echo $this->baseurl; ?>/templates/<?php echo $this->template ?>/js/bootstrap.min.js"></script>
	<script type="text/javascript">
	  jQuery.noConflict();
	</script>
	<jdoc:include type="head" />
	<script type="text/javascript">
		window.addEvent('domready', function () {
			document.getElementById('form-login').username.select();
			document.getElementById('form-login').username.focus();
		});
	</script>
</head>

<body class="site <?php echo $option . " view-" . $view . " layout-" . $layout . " task-" . $task . " itemid-" . $itemid . " ";?>">
	<!-- Container -->
	<div class="container">
		<div class="row">
			<div class="span3">&nbsp;</div>
			<div id="content" class="span6">
				<!-- Begin Content -->
				<div id="element-box" class="login well">
					<jdoc:include type="message" />
					<jdoc:include type="component" />
				</div>
				<noscript>
					<?php echo JText::_('JGLOBAL_WARNJAVASCRIPT') ?>
				</noscript>
				<!-- End Content -->
				<p><?php echo JText::_('COM_LOGIN_VALID') ?></p>
				<p><a href="<?php echo JURI::root(); ?>" class="btn btn-mini"><i class="icon-share"></i> <?php echo JText::_('COM_LOGIN_RETURN_TO_SITE_HOME_PAGE') ?></a></p>
				<hr />
				<div class="footer">
					<p>&copy; <?php echo $sitename; ?> <?php echo date('Y');?></p>
				</div>
			</div>
			<div class="span3">&nbsp;</div>
		</div>
	</div>
	<jdoc:include type="modules" name="debug" style="none" />
	<script>
		jQuery('.tip').tooltip()
	</script>
</body>
</html>