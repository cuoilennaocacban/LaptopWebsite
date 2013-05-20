<?php
/*---------------------------------------------------------------
# Package - Joomla Template based on Helix Framework   
# ---------------------------------------------------------------
# Template Name - Shaper iStore
# Template Version 1.0.0
# ---------------------------------------------------------------
# Author - JoomShaper http://www.joomshaper.com
# Copyright (C) 2010 - 2012 JoomShaper.com. All Rights Reserved.
# license - PHP files are licensed under  GNU/GPL V2
# license - CSS  - JS - IMAGE files  are Copyrighted material 
# Websites: http://www.joomshaper.com
-----------------------------------------------------------------*/
//no direct accees
defined ('_JEXEC') or die ('resticted aceess');
require_once(dirname(__FILE__).DS.'lib'.DS.'helix.php');
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="<?php echo $this->language; ?>" lang="<?php echo $this->language;?>" >
<head>
	<?php
		$helix->loadHead();
		$helix->addCSS('template.css,joomla.css,custom.css,modules.css,typography.css,css3.css');
		if (JRequest::getVar('option')=='com_virtuemart') $helix->addCSS('vmsite.css');//virtuemart css
		if ($helix->isRTL()) $helix->addCSS('template_rtl.css');
		$helix->getStyle();
	?>
</head>
<?php $helix->addFeatures('ie6warn'); ?>
<body class="bg<?php if ($helix->isRTL()) echo ' rtl' ?> clearfix">
	<div id="toparea" class="clearfix">
		<div class="sp-wrap clearfix">
			<div class="sp-inner">
				<?php $helix->addFeatures('toppanel'); //Top Panel ?>
		
				<?php $helix->addModules('slides') //position slides ?>
				<div class="clr"></div>
				<div id="header" class="clearfix" align="left">

					<div id="hornav-wrapper" class="clearfix">
						<?php $helix->addFeatures('hornav') //Main navigation ?>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="sp-wrap clearfix">
		<?php $helix->addModules('user1, user2, user3, user4, user5, user6', 'sp_xhtml', 'sp-userpos', false, true); //positions user1-user6 ?>
		<div class="clearfix">
			<?php $helix->loadLayout(); //mainbody ?>
		</div>
		<?php $helix->addModules('scroller', 'sp_xhtml') //position slides ?>
	</div>
	
	<div id="sp-bottom" class="clearfix">
		<div class="sp-wrap clearfix">
			<div class="sp-inner">
				<?php $helix->addModules('bottom1, bottom2, bottom3, bottom4, bottom5, bottom6', 'sp_flat', 'sp-bottom-grid', '',true) //positions bottom1-bottom6 ?>
				
			</div>
		</div>	
	</div>
	<?php $helix->addFeatures('analytics,jquery,ieonly'); /*--- analytics, jquery and ieonly features ---*/?>
	<?php $helix->compress(); /* --- Compress CSS and JS files --- */ ?>	
	<?php $helix->getFonts() /*--- Standard and Google Fonts ---*/?>
	<jdoc:include type="modules" name="debug" />
</body>
</html>
