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
//error_reporting(E_ALL);
// no direct access
defined('_JEXEC') or die('Restricted access');
require_once JPATH_SITE.'/components/com_content/helpers/route.php';

jimport('joomla.application.component.model');

JModel::addIncludePath(JPATH_SITE.'/components/com_content/models');

abstract class modSlideShowSP2Helper
{
		
	static function getList($params){
		
		$app	= JFactory::getApplication();
		$db		= JFactory::getDbo();

		// Get an instance of the generic articles model
		$model = JModel::getInstance('Articles', 'ContentModel', array('ignore_request' => true));

		// Set application parameters in model
		$appParams = JFactory::getApplication()->getParams();
		$model->setState('params', $appParams);

		// Set the filters based on the module params
		$model->setState('list.start', 0);

		$count		    = $params->get('max_article',3); 
		$thumbratio		= $params->get('thumbratio', 1) ? true : false;
		$thumbwidth		= trim($params->get('thumbwidth', 50));
		$thumbheight	= trim($params->get('thumbheight', 50));
		$titleas		= $params->get('titleas');
		$desclimitas	= $params->get('desclimitas');
		$titlelimit		= (int) $params->get('titlelimit');
		$desclimit		= (int) $params->get('desclimit');
		$c_titleas		= $params->get('c_titleas');
		$c_desclimitas	= $params->get('c_desclimitas');		
		$c_titlelimit	= (int) $params->get('c_titlelimit');
		$c_desclimit	= (int) $params->get('c_desclimit');

		$model->setState('list.limit', (int) $count);
		
		$model->setState('filter.published', 1);

		// User filter
		$userId = JFactory::getUser()->get('id');
		switch ($params->get('user_id'))
		{
			case 'by_me':
				$model->setState('filter.author_id', (int) $userId);
				break;
			case 'not_me':
				$model->setState('filter.author_id', $userId);
				$model->setState('filter.author_id.include', false);
				break;

			case '0':
				break;

			default:
				$model->setState('filter.author_id', (int) $params->get('user_id'));
				break;
		}		

		//  Featured switch
		switch ($params->get('show_featured'))
		{
			case '1':
				$model->setState('filter.featured', 'only');
				break;
			case '0':
				$model->setState('filter.featured', 'hide');
				break;
			default:
				$model->setState('filter.featured', 'show');
				break;
		}
		
		$model->setState('list.select', 'a.fulltext, a.id, a.title, a.alias, a.title_alias, a.introtext, a.state, a.catid, a.created, a.created_by, a.created_by_alias,' .
			' a.modified, a.modified_by,a.images, a.publish_up, a.publish_down, a.attribs, a.metadata, a.metakey, a.metadesc, a.access,' .
			' a.hits, a.featured,' .
			' LENGTH(a.fulltext) AS readmore');
			
		// Access filter
		$access = !JComponentHelper::getParams('com_content')->get('show_noauth');
		$authorised = JAccess::getAuthorisedViewLevels(JFactory::getUser()->get('id'));
		$model->setState('filter.access', $access);

		// Category filter
		$model->setState('filter.category_id', $params->get('catid', array()));

		// Filter by language
		$model->setState('filter.language',$app->getLanguageFilter());

		// Set ordering
		$model->setState('list.ordering', $params->get('ordering', 'a.ordering'));
		$model->setState('list.direction', $params->get('ordering_direction', 'ASC'));

		//	Retrieve Content
		$items = $model->getItems();
		
		foreach ($items as &$item) {
			$item->slug = $item->id.':'.$item->alias;
			$item->catslug 		= $item->catid.':'.$item->category_alias;
			$author 			= JFactory::getUser($item->created_by);
			
			$item->author 		= $author->name;	
			$item->created 		= JHTML::_('date', $item->created, JText::_('DATE_FORMAT_LC3'));
			$item->hits 		= $item->hits;
			
			$item->image 		= JURI::base().modSlideShowSP2Helper::getImages($item->introtext,$item->images,$thumbwidth,$thumbheight,$thumbratio)->image;
			$item->thumb 		= JURI::base().modSlideShowSP2Helper::getImages($item->introtext,$item->images,$thumbwidth,$thumbheight,$thumbratio)->thumb;
			$item->none 		= JURI::base().'modules/mod_slideshow_pro_sp2/assets/images/none.gif';
			$item->title 		= modSlideShowSP2Helper::cText(htmlspecialchars($item->title),$titlelimit,$titleas);
			$item->text 		= modSlideShowSP2Helper::cText(JHtml::_('content.prepare', $item->introtext),$desclimit,$desclimitas);	
			$item->c_title 		= modSlideShowSP2Helper::cText(htmlspecialchars($item->title),$c_titlelimit,$c_titleas);
			$item->c_text 		= modSlideShowSP2Helper::cText(JHtml::_('content.prepare', $item->introtext),$c_desclimit,$c_desclimitas);
			$item->link 		= JRoute::_(ContentHelperRoute::getArticleRoute($item->slug, $item->catslug));
		}	
		
		return $items;
	}	

	function cText($text, $limit, $limitas) {
		
		switch ($limitas) {
			case 0 :
				$text = JFilterOutput::cleanText($text);
				$text = explode(' ',$text);
				$sep = (count($text)>$limit) ? '...' : '';
				$text=implode(' ', array_slice($text,0,$limit)) . $sep;
				break;
			case 1 :
				$text = JFilterOutput::cleanText($text);
				$sep  = (strlen($text)>$limit) ? '...' : '';
				$text =utf8_substr($text,0,$limit) . $sep;
				break;
			case 2 :
				$allowed_tags = '<b><i><a><small><h1><h2><h3><h4><h5><h6><sup><sub><em><strong><u><br>';
				$text = strip_tags( $text, $allowed_tags );
				$text = $text;
				break;
			default :
				$text = JFilterOutput::cleanText($text);
				$text = explode(' ',$text);
				$sep = (count($text)>$limit) ? '...' : '';
				$text=implode(' ', array_slice($text,0,$limit)) . $sep;
				break;
		}		
		
		return $text;
	}
	
	
	function getImages($text, $image_src="", $thumbwidth=50, $thumbheight=50, $thumbratio) {	  
	
		$image_src = json_decode($image_src);
		
		if (JVERSION>=2.5 && @$image_src->image_intro) {
			$image_path = $image_src->image_intro;
		} elseif (JVERSION>=2.5 && @$image_src->image_fulltext) {
			$image_path = $image_src->image_fulltext;
		}else {
			preg_match('/< *img[^>]*src *= *["\']?([^"\']*)/i', $text, $matches);	
			if (!isset($matches[1])) { 
				$matches[1]='modules/mod_slideshow_pro_sp2/assets/images/no-image.jpg';
			}
			
			if (!file_exists($matches[1])) {
				$matches[1]='modules/mod_slideshow_pro_sp2/assets/images/no-image.jpg';
			}
			if (isset($matches[1])) {
				$image_path = $matches[1];
			}			
		}
		
		$images = new stdClass();
		$images->image = false;
		
		$paths = array();	
		 
		if ($image_path) {
			// remove any / that begins the path
			if (substr($image_path, 0 , 1) == '/') $image_path = substr($image_path, 1);
			
			// create a thumb filename
			$file_div = strrpos($image_path,'.');
			$thumb_ext = substr($image_path, $file_div);
			$thumb_prev = substr($image_path, 0, $file_div);
			$thumb_path = $thumb_prev . "_thumb" . $thumb_ext;
				
			// check to see if this file exists, if so we don't need to create it
			if (function_exists("gd_info")) {
				// file doens't exist, so create it and save it
				if (!class_exists("spThumbnail")) include_once('class.spThumbnail.php');
				
				//Check existing thumbnails dimensions
				if (file_exists($thumb_path)) {
					$size = GetImageSize( $thumb_path );
					$currentWidth=$size[0];
					$currentHeight=$size[1];
				}
				
				//Creating thumbnails		
                if (!file_exists($thumb_path) || $currentWidth!=$thumbwidth || $currentHeight!=$thumbheight ) {
					$thumb = new spThumbnail;
					$thumb->new_width = $thumbwidth;
					$thumb->new_height = $thumbheight;
					$thumb->image_to_resize = $image_path; // Full Path to the file
					$thumb->ratio = $thumbratio; // Keep Aspect Ratio?
					$thumb->save = $thumb_path;
					$thumb->resize();
    			}
			}
			
			$images->image = $image_path;
			$images->thumb = $thumb_path;
		} 
		return $images;
	}
	
}