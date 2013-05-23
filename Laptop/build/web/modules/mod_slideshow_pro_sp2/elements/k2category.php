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
defined('_JEXEC') or die('Restricted access');

jimport('joomla.form.formfield');
class JFormFieldK2Category extends JFormField {

	var	$type = 'k2category';

	function getInput(){
		return JElementK2Category::fetchElement($this->name, $this->value, $this->element, $this->options['control']);
	}
}

jimport('joomla.html.parameter.element');

class JElementK2Category extends JElement
{

	var	$_name = 'k2category';

	function fetchElement($name, $value, &$node, $control_name){
		$db = &JFactory::getDBO();
		$query = 'SELECT m.* FROM #__k2_categories m WHERE published=1 AND trash = 0 ORDER BY parent, ordering';
		$db->setQuery( $query );
		$mitems = $db->loadObjectList();
		$fieldName = $name.'[]';
		if (count($mitems)) {
			$children = array();
			if ($mitems){
				foreach ( $mitems as $v ){
					$v->title = $v->name;
					$v->parent_id = $v->parent;
					$pt = $v->parent;
					$list = @$children[$pt] ? $children[$pt] : array();
					array_push( $list, $v );
					$children[$pt] = $list;
				}
			}
			$list = JHTML::_('menu.treerecurse', 0, '', array(), $children, 9999, 0, 0 );
			$mitems = array();

			foreach ( $list as $item ) {
				$item->treename = JString::str_ireplace('&#160;', '- ', $item->treename);
				$mitems[] = JHTML::_('select.option',  $item->id, '   '.$item->treename );
			}
			$output= JHTML::_('select.genericlist',  $mitems, $fieldName, 'class="inputbox" multiple="multiple" size="10"', 'value', 'text', $value );
		} else {
			$mitems[] = JHTML::_('select.option', 0, 'K2 is not installed or there is no K2 category available.');
			$output   = JHtml::_('select.genericlist', $mitems, $fieldName, 'class="inputbox" disabled="disabled" multiple="multiple" style="width:160px" size="5"', 'value', 'text', $value);
		}
		return $output;
	}
}
