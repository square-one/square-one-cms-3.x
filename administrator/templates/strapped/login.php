<?php
	/*** @copyright Copyright Pixel Praise LLC © 2012. All rights reserved. */
	// no direct access
	defined('_JEXEC') or die;
	
	$app = JFactory::getApplication();
	$doc = JFactory::getDocument();
	
	// Add Stylesheets
	$doc->addStyleSheet('../templates/system/css/bootstrap.css');
	$doc->addStyleSheet('../templates/system/css/bootstrap-extended.css');
	$doc->addStyleSheet('../templates/system/css/bootstrap-responsive.css');
	$doc->addStyleSheet('template/css/template.css');
?>
<!DOCTYPE html>
<html>
<head>
	<?php 
    // Detecting Home
    $menu = & JSite::getMenu();
    if ($menu->getActive() == $menu->getDefault()) :
    $siteHome = 1;
    else:
    $siteHome = 0;
    endif;

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
    if ($this->countModules('position-7') && $this->countModules('right')) :
    	$span = "span6";
    elseif ($this->countModules('position-7') && !$this->countModules('right')) :
    	$span = "span10";
    elseif (!$this->countModules('position-7') && $this->countModules('right')) :
    	$span = "span8";
    else :
    	$span = "span12";
    endif;
	?>

	<jdoc:include type="head" />
	
	<script type="text/javascript">
		window.addEvent('domready', function () {
			document.getElementById('form-login').username.select();
			document.getElementById('form-login').username.focus();
		});
	</script>

</head>

<body class="site <?php echo $option . " view-" . $view . " layout-" . $layout . " task-" . $task . " itemid-" . $itemid . " ";?>  <?php if($siteHome): echo "homepage";endif;?> ">
	<!-- Top Navigation -->
	<div class="navbar navbar-fixed-top">
		<div class="navbar-inner">
			<div class="container"> <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse"> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </a> <a class="brand" href="<?php echo $this->baseurl; ?>"><?php echo $sitename; ?></a>
				<div class="nav-collapse">
					<jdoc:include type="modules" name="position-1" style="none" />
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
					<div class="page-title"><?php echo $title = $this->getTitle();?></div>
				</div>
				<div class="span10">
					<jdoc:include type="modules" name="toolbar" style="xhtml" />
				</div>
			</div>
		</div>
	</div>
	<!-- Container -->
	<div class="container">
		<div class="row">
			<?php if ($this->countModules('position-7')) : ?>
			<div id="sidebar" class="span2">
				<jdoc:include type="modules" name="create" style="xhtml" />
				<!-- Begin Sidebar -->
				<div class="btn-group">
				  <a class="btn btn-large btn-info btn-wide dropdown-toggle" data-toggle="dropdown" href="#">
				    Create 
				    <span class="caret"></span>
				  </a>
				  <ul class="dropdown-menu">
				    <li><a href="#">Project</a></li>
				    <li><a href="#">Milestone</a></li>
				    <li><a href="#">Task List</a></li>
				    <li><a href="#">Task</a></li>
				    <li class="divider"></li>
				    <li><a href="#">Event</a></li>
				    <li><a href="#">Discussion</a></li>
				    <li class="divider"></li>
				    <li><a href="#">Group</a></li>
				    <li><a href="#">User</a></li>
				  </ul>
				</div>
				<hr />
				<div class="sidebar-nav">
					<jdoc:include type="modules" name="position-7" style="xhtml" />
					<jdoc:include type="modules" name="left" style="xhtml" />
	            </div>
	        	<!-- End Sidebar -->
			</div>
			<?php endif; ?>
			<div id="content" class="<?php echo $span;?>">
				<!-- Begin Content -->
				<div id="element-box" class="login">
					<h1><?php echo JText::_('COM_LOGIN_JOOMLA_ADMINISTRATION_LOGIN') ?></h1>
					<jdoc:include type="message" />
					<jdoc:include type="component" />
					<p><?php echo JText::_('COM_LOGIN_VALID') ?></p>
					<p><a href="<?php echo JURI::root(); ?>"><?php echo JText::_('COM_LOGIN_RETURN_TO_SITE_HOME_PAGE') ?></a></p>
				</div>
				<noscript>
					<?php echo JText::_('JGLOBAL_WARNJAVASCRIPT') ?>
				</noscript>
				<!-- End Content -->
			</div>
			<?php if ($this->countModules('right')) : ?>
			<div id="aside" class="span4">
				<!-- Begin Right Sidebar -->
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
	<script src="<?php echo $this->baseurl; ?>/templates/system/js/jquery.js"></script>
	<script src="<?php echo $this->baseurl; ?>/templates/system/js/bootstrap.min.js"></script>
	<script src="<?php echo $this->baseurl; ?>/administrator/templates/<?php echo $this->template ?>/js/application.js"></script>
    <script src="<?php echo $this->baseurl; ?>/administrator/templates/<?php echo $this->template ?>/js/classes.js"></script>
</body>

</html>
