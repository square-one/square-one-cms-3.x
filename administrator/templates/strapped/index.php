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
$doc->addStyleSheet('templates/'.$this->template.'/css/template.css');
$doc->addStyleSheet('../templates/system/css/bootstrap-responsive.css');

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
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
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
								<?php if($user->authorise('core.admin')):?>
									<li><a href="<?php echo $this->baseurl; ?>/index.php?option=com_config">Global Configuration</a></li>
									<li><a href="<?php echo $this->baseurl; ?>/index.php?option=com_admin&view=sysinfo">System Information</a></li>
								<?php endif;?>
								<?php if($user->authorise('core.manage', 'com_cache')):?>
									 <li><a href="<?php echo $this->baseurl; ?>/index.php?option=com_cache">Clear Cache</a></li>
								<?php endif;?>
								<?php if($user->authorise('core.admin', 'com_checkin')):?>
									<li><a href="<?php echo $this->baseurl; ?>/index.php?option=com_checkin">Global Check-in</a></li>
								<?php endif;?>
								<?php if($user->authorise('core.manage', 'com_installer')):?>
									 <li><a href="<?php echo $this->baseurl; ?>/index.php?option=com_installer">Install Extensions</a></li>
								<?php endif;?>
							</ul>
						</li>
						<li class="dropdown"> <a class="dropdown-toggle" data-toggle="dropdown" href="#"><?php echo $user->username; ?> <b class="caret"></b></a>
							<ul class="dropdown-menu">
								<li class=""><a href="index.php?option=com_admin&task=profile.edit&id=<?php echo $user->id;?>">Account</a></li>
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
				<div class="span7">
					<h1 class="page-title"><?php echo JHtml::_('string.truncate', $app->get('JComponentTitle'), 40, false, false);?></h1>
				</div>
				<div class="span3">
					<jdoc:include type="modules" name="searchload" style="none" />
					<!-- placeholder search, remove once we have an admin search -->
					<form class="navbar-search pull-right">
		      			<input type="text" class="search-query" placeholder="Search" style="margin: 0 auto;" data-provide="typeahead" data-items="10" data-source="[&quot;Alabama&quot;,&quot;Alaska&quot;,&quot;Arizona&quot;,&quot;Arkansas&quot;,&quot;California&quot;,&quot;Colorado&quot;,&quot;Connecticut&quot;,&quot;Delaware&quot;,&quot;Florida&quot;,&quot;Georgia&quot;,&quot;Hawaii&quot;,&quot;Idaho&quot;,&quot;Illinois&quot;,&quot;Indiana&quot;,&quot;Iowa&quot;,&quot;Kansas&quot;,&quot;Kentucky&quot;,&quot;Louisiana&quot;,&quot;Maine&quot;,&quot;Maryland&quot;,&quot;Massachusetts&quot;,&quot;Michigan&quot;,&quot;Minnesota&quot;,&quot;Mississippi&quot;,&quot;Missouri&quot;,&quot;Montana&quot;,&quot;Nebraska&quot;,&quot;Nevada&quot;,&quot;New Hampshire&quot;,&quot;New Jersey&quot;,&quot;New Mexico&quot;,&quot;New York&quot;,&quot;North Dakota&quot;,&quot;North Carolina&quot;,&quot;Ohio&quot;,&quot;Oklahoma&quot;,&quot;Oregon&quot;,&quot;Pennsylvania&quot;,&quot;Rhode Island&quot;,&quot;South Carolina&quot;,&quot;South Dakota&quot;,&quot;Tennessee&quot;,&quot;Texas&quot;,&quot;Utah&quot;,&quot;Vermont&quot;,&quot;Virginia&quot;,&quot;Washington&quot;,&quot;West Virginia&quot;,&quot;Wisconsin&quot;,&quot;Wyoming&quot;]">
		      		</form>
		      		<!-- placeholder search, remove once we have an admin search -->
				</div>
			</div>
		</div>
	</div>
	<!-- Subheader -->
	<div class="subhead">
		<div class="container">
			<div class="row">
				<div class="span12">
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
		jQuery('.tip-bottom').tooltip({placement: "bottom"})
	</script>
</body>
</html>
