<?php
/**
 * @package		Joomla.Site
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
$doc->addStyleSheet('templates/system/css/bootstrap.css');
$doc->addStyleSheet('templates/system/css/bootstrap-extended.css');
$doc->addStyleSheet('templates/'.$this->template.'/css/template.css');
$doc->addStyleSheet('templates/system/css/bootstrap-responsive.css');

// Add current user information
$user =& JFactory::getUser();
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
    if ($this->countModules('position-7') && $this->countModules('position-8')) :
    	$span = "span6";
    elseif ($this->countModules('position-7') && !$this->countModules('position-8')) :
    	$span = "span9";
    elseif (!$this->countModules('position-7') && $this->countModules('position-8')) :
    	$span = "span9";
    else :
    	$span = "span12";
    endif;
	?>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<script src="<?php echo $this->baseurl; ?>/templates/system/js/jquery.js"></script>
	<script src="<?php echo $this->baseurl; ?>/templates/system/js/bootstrap.min.js"></script>
	<script type="text/javascript">
	  jQuery.noConflict();
	</script>
	<jdoc:include type="head" />
	
</head>

<body class="site <?php echo $option . " view-" . $view . " layout-" . $layout . " task-" . $task . " itemid-" . $itemid . " ";?>">
	<!-- Header -->
	<div class="header">
		<div class="header-inner">
			<div class="container"> 
				<a class="brand pull-left" href="<?php echo $this->baseurl; ?>">
					<img src="<?php echo $this->baseurl; ?>/templates/<?php echo $this->template ?>/images/logo.png" alt="<?php echo $sitename; ?>" />
				</a>
				<jdoc:include type="modules" name="position-1" style="none" />
			</div>
		</div>
	</div>
	<!-- Container -->
	<div class="container">
		<jdoc:include type="modules" name="banner" style="xhtml" />
		<div class="row">
			<?php if ($this->countModules('position-7')): ?>
			<!-- Begin Sidebar -->
			<div id="sidebar" class="span3">
				<div class="sidebar-nav">
					<jdoc:include type="modules" name="position-7" style="xhtml" />
				</div>
			</div>
			<!-- End Sidebar -->
			<?php endif; ?>
			<div id="content" class="<?php echo $span;?>">
				<!-- Begin Content -->
				<jdoc:include type="modules" name="position-3" style="xhtml" />
				<jdoc:include type="message" />
				<jdoc:include type="component" />
				<jdoc:include type="modules" name="position-2" style="none" />
				<!-- End Content -->
			</div>
			<?php if ($this->countModules('position-8')) : ?>
			<div id="aside" class="span3">
				<!-- Begin Right Sidebar -->
				<jdoc:include type="modules" name="position-8" style="xhtml" />
				<!-- End Right Sidebar -->
			</div>
			<?php endif; ?>
		</div>
		<hr />
		<div class="footer">
			<jdoc:include type="modules" name="footer" style="none" />
			<p class="pull-right"><a href="#top" id="back-top">Back to top</a></p>
			<p>&copy; <?php echo $sitename; ?> <?php echo date('Y');?></p>
		</div>
	</div>
	<jdoc:include type="modules" name="debug" style="none" />
	<script>
		jQuery('.tip').tooltip()
		jQuery('.tip-bottom').tooltip({placement: "bottom"})
	</script>
</body>
</html>
