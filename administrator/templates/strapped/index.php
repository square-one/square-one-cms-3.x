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
    if ($option == "com_cpanel") :
    	$span = "span8";
    elseif ((!JRequest::getInt('hidemainmenu')) && $this->countModules('right')) :
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
	
</head>

<body class="site <?php echo $option . " view-" . $view . " layout-" . $layout . " task-" . $task . " itemid-" . $itemid . " ";?>">
	<!-- Top Navigation -->
	<div class="navbar navbar-fixed-top">
		<div class="navbar-inner">
			<div class="container"> <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse"> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </a> <a class="brand" href="<?php echo $this->baseurl; ?>"><?php echo $sitename; ?></a>
				<div class="nav-collapse">
					<jdoc:include type="modules" name="menu" style="none" />
					<ul class="nav pull-right">
						<li class="dropdown"> <a class="dropdown-toggle" data-toggle="dropdown" href="#">Settings <b class="caret"></b></a>
							<ul class="dropdown-menu">
								<li class=""><a href="./docs.html#banners">Banners</a></li>
								<li class=""><a href="./docs.html#contact">Contact</a></li>
								<li class=""><a href="./com_com_content.html">Content</a></li>
								<li class=""><a href="./docs.html#finder">Finder</a></li>
								<li class=""><a href="./docs.html#mailto">Mailto</a></li>
								<li class=""><a href="./docs.html#media">Media</a></li>
								<li class=""><a href="./docs.html#newsfeeds">Newsfeeds</a></li>
								<li class=""><a href="./docs.html#search">Search</a></li>
								<li class=""><a href="./docs.html#users">Users</a></li>
								<li class=""><a href="./docs.html#weblinks">Weblinks</a></li>
								<li class=""><a href="./docs.html#wrapper">Wrapper</a></li>
							</ul>
						</li>
						<li class="dropdown"> <a class="dropdown-toggle" data-toggle="dropdown" href="#">firstname.lastname <b class="caret"></b></a>
							<ul class="dropdown-menu">
								<li class=""><a href="./docs.html#banners">Account</a></li>
								<li class=""><a href="./docs.html#contact">Contact</a></li>
								<li class=""><a href="./com_com_content.html">Content</a></li>
								<li class=""><a href="./docs.html#finder">Finder</a></li>
								<li class=""><a href="./docs.html#mailto">Mailto</a></li>
								<li class=""><a href="./docs.html#media">Media</a></li>
								<li class=""><a href="./docs.html#newsfeeds">Newsfeeds</a></li>
								<li class=""><a href="./docs.html#search">Search</a></li>
								<li class=""><a href="./docs.html#users">Users</a></li>
								<li class=""><a href="./docs.html#weblinks">Weblinks</a></li>
								<li class=""><a href="./docs.html#wrapper">Wrapper</a></li>
							</ul>
						</li>
					</ul>
				</div>
				<!--/.nav-collapse --> 
			</div>
		</div>
	</div>
	<!-- Header -->
	<div class="header">
		<div class="container">
			<div class="row">
				<div class="span2">
					<a class="logo" href="<?php echo $this->baseurl; ?>"></a>
				</div>
				<div class="span10 navbar-search">
					<jdoc:include type="modules" name="searchload" style="none" />
				</div>
			</div>
		</div>
	</div>
	<!-- Subheader -->
	<div class="subhead">
		<div class="container">
			<div class="row">
				<div class="span2">
					<div class="page-title"><h1><?php echo JHtml::_('string.truncate', $app->get('JComponentTitle'), 10, true, false);?></h1></div>
				</div>
				<div class="span10">
					<jdoc:include type="modules" name="toolbar" style="no" />
				</div>
			</div>
		</div>
	</div>
	<!-- Container -->
	<div class="container">
		<div class="row">
			<?php if (!JRequest::getInt('hidemainmenu') && $option != "com_cpanel"): ?>
			<!-- Begin Sidebar -->
			<div id="sidebar" class="span2">
				<div class="sidebar-nav">
					<jdoc:include type="modules" name="submenu" style="no" />
				</div>
			</div>
			<!-- End Sidebar -->
			<?php endif; ?>
			<div id="content" class="<?php echo $span;?>">
				<!-- Begin Content -->
				<jdoc:include type="modules" name="top" style="xhtml" />
				<jdoc:include type="message" />
				<jdoc:include type="component" />
				<jdoc:include type="modules" name="bottom" style="xhtml" />
				<!-- End Content -->
			</div>
			<?php if (($this->countModules('right')) || ($option == "com_cpanel")) : ?>
			<div id="aside" class="span4">
				<!-- Begin Right Sidebar -->
				<?php
				/* Load cpanel modules */
				if ($option == "com_cpanel"):?>
					<jdoc:include type="modules" name="icon" style="well" />
				<?php endif;?>
				<jdoc:include type="modules" name="right" style="xhtml" />
				<!-- End Right Sidebar -->
			</div>
			<?php endif; ?>
		</div>
		<hr />
		<div class="footer">
			<p>&copy; <?php echo $sitename; ?> <?php echo date('Y');?></p>
		</div>
	</div>
	<jdoc:include type="modules" name="debug" style="none" />
	<script>
		jQuery('.tip').tooltip()
	</script>
</body>
</html>
