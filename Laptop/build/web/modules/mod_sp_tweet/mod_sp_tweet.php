<?php
/*------------------------------------------------------------------------
# mod_sp_tweet - Twitter Module by JoomShaper.com
# ------------------------------------------------------------------------
# author    JoomShaper http://www.joomshaper.com
# Copyright (C) 2010 - 2012 JoomShaper.com. All Rights Reserved.
# @license - http://www.gnu.org/licenses/gpl-2.0.html GNU/GPL
# Websites: http://www.joomshaper.com
-------------------------------------------------------------------------*/
// no direct access
defined('_JEXEC') or die('Restricted access');
JHtml::_('behavior.framework', true);
//Parameters
$uniqid 				= $module->id;
$username				= $params->get('username','joomshaper');
$style					= $params->get ('style','default');
$follow_us				= $params->get ('follow_us',1);
$tweets					= $params->get ('tweets',4);
$avatar					= $params->get ('avatar',1);
$avatar_width			= $params->get ('avatar_width',48);
$linked_avatar			= $params->get ('linked_avatar',1);
$show_user				= $params->get ('show_user',1);
$linked_search			= $params->get ('linked_search',1);
$linked_mention			= $params->get ('linked_mention',1);
$tweet_time				= $params->get ('tweet_time',1);
$tweet_time_linked		= $params->get ('tweet_time_linked',1);
$tweet_src				= $params->get ('tweet_src',1);
$target					= $params->get ('target','_blank');
$cache					= $params->get ('module_cache', 1);
$cache_time				= $params->get ('cache_time', 900);
$document 				= JFactory::getDocument();

require_once (dirname(__FILE__).DS.'helper.php');
SPTweetHelper::loadTimeago();

$document->addScript(JURI::base(true) . '/modules/mod_sp_tweet/assets/js/sp_tweets.js');
$document->addStylesheet(JURI::base(true) . '/modules/mod_sp_tweet/assets/css/' . $style . '.css');
?>
<script type="text/javascript">
//<![CDATA[
	window.addEvent('domready', function() {
		var SPTweet<?php echo $uniqid; ?> = new SPTweet({
			tmpl:			tmpl<?php echo $uniqid ?>,
			url:			'<?php echo JURI::base(true); ?>/modules/mod_sp_tweet/json.php',
			loadingText:	'<?php echo JText::_('LOADING') ?>',
			failedText:		'<?php echo JText::_('FAILED') ?>',
			param:			'username=<?php echo $username; ?>&tweets=<?php echo $tweets; ?>&cache=<?php echo $cache; ?>&cache_time=<?php echo $cache_time; ?>',
			element:		'sp-tweet-id<?php echo $uniqid; ?>'
		});
	});
//]]>	
</script>
<?php	
require(JModuleHelper::getLayoutPath('mod_sp_tweet',$style));
?>