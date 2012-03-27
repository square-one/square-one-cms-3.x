<?php
/**
 * @package		Joomla.Installation
 * @copyright	Copyright (C) 2005 - 2012 Open Source Matters, Inc. All rights reserved.
 * @license		GNU General Public License version 2 or later; see LICENSE.txt
 */

defined('_JEXEC') or die;

$doc = JFactory::getDocument();

// Include the component HTML helpers.
JHtml::addIncludePath(JPATH_COMPONENT.'/helpers/html');

// Add Stylesheets
$doc->addStyleSheet('../media/system/css/bootstrap.css');
$doc->addStyleSheet('../media/system/css/bootstrap-extended.css');
$doc->addStyleSheet('../media/system/css/bootstrap-responsive.css');
$doc->addStyleSheet('template/css/template.css');

if ($this->direction == 'rtl') {
	$doc->addStyleSheet('template/css/template_rtl.css');
}

// Add JavaScript
$doc->addScript('../media/system/js/jquery.js');
$doc->addScript('../media/system/js/bootstrap.js');

// Load the JavaScript behaviors
JHtml::_('behavior.framework', true);
JHtml::_('behavior.keepalive');
JHtml::_('behavior.tooltip');
JHtml::_('behavior.formvalidation');
JHtml::_('script', 'installation/template/js/installation.js', true, false, false, false);
?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="<?php echo $this->language; ?>" lang="<?php echo $this->language; ?>" dir="<?php echo $this->direction; ?>" >
	<head>
		<jdoc:include type="head" />

		<!--[if IE 7]>
			<link href="template/css/ie7.css" rel="stylesheet" type="text/css" />
		<![endif]-->
		<script type="text/javascript">
			window.addEvent('domready', function() {
				window.Install = new Installation('rightpad', '<?php echo JURI::current(); ?>');

				Locale.define('<?php echo JFactory::getLanguage()->getTag(); ?>', 'installation', {
					sampleDataLoaded: '<?php echo JText::_('INSTL_SITE_SAMPLE_LOADED', true); ?>'
				});
				Locale.use('<?php echo JFactory::getLanguage()->getTag(); ?>');
			});
 		</script>
	</head>
	<body class="installation">
		<!-- Header -->
		<div class="header">
			<div class="header-inner">
				<div class="container"> 
					<div class="brand">
						<img src="<?php echo $this->baseurl ?>/template/images/joomla.png" alt="Joomla" />
					</div>
				</div>
			</div>
		</div>
		<!-- Container -->
		<div class="container">
			<?php echo JHtml::_('installation.stepbar'); ?>
			<jdoc:include type="installation" />
			<hr />
			<div class="footer">
				<p class="pull-right"><a href="#top" id="back-top">Back to top</a></p>
				<p><?php $joomla= '<a href="http://www.joomla.org">Joomla!&#174;</a>';
				echo JText::sprintf('JGLOBAL_ISFREESOFTWARE', $joomla) ?></p>
			</div>
		</div>
	</body>
</html>
