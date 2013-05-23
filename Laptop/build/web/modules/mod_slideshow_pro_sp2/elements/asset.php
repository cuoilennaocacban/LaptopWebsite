<?php
/*
# ------------------------------------------------------------------------
# SlideShow Pro SP2 module for Joomla 2.5
# ------------------------------------------------------------------------
# Copyright (C) 2010 - 2012 JoomShaper.com. All Rights Reserved.
# @license - PHP files are GNU/GPL V2. CSS / JS are Copyrighted Commercial,
# Author: JoomShaper.com
# Websites:  http://www.joomshaper.com
# Redistribution, Modification or Re-licensing of this file in part of full, 
# is bound by the License applied. 
# ------------------------------------------------------------------------
*/

// no direct access
defined( '_JEXEC' ) or die( 'Restricted access' );

jimport('joomla.form.formfield');

class JFormFieldAsset extends JFormField
{
	protected	$type = 'Asset';
	
	protected function getInput() {
		$doc = JFactory::getDocument();	
		$doc->addScript(JURI::root(true).'/modules/mod_slideshow_pro_sp2/elements/js/jquery.js');
		$doc->addScript(JURI::root(true).'/modules/mod_slideshow_pro_sp2/elements/js/jquery.uniform.min.js');
		$doc->addScript(JURI::root(true).'/modules/mod_slideshow_pro_sp2/elements/js/script.js');
		$doc->addStylesheet(JURI::root(true).'/modules/mod_slideshow_pro_sp2/elements/css/style.css');
		return null;
	}
} 
?>