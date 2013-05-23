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

abstract class SPTweetHelper {
	public function loadTimeago(){
		if(defined('_SPTWEET')) 
			return;
		define ('_SPTWEET',1);	
		?>
		<script type="text/javascript">
		//<![CDATA[
			function timeago (timestamp) {
				var date = new Date(timestamp),
					diff = (((new Date()).getTime() - date.getTime()) / 1000),
					day_diff = Math.floor(diff / 86400);

				if (isNaN(day_diff) || day_diff < 0 || day_diff >= 31)
					return;

				return day_diff == 0 && (
						diff < 60 && "<?php echo Jtext::_('JUST_NOW') ?>" ||
						diff < 120 && "<?php echo Jtext::_('ABOUT') ?> 1 <?php echo Jtext::_('MINUTE') ?> <?php echo Jtext::_('AGO') ?>" ||
						diff < 3600 && "<?php echo Jtext::_('ABOUT') ?> " + Math.floor(diff / 60) + " <?php echo Jtext::_('MINUTES') ?> <?php echo Jtext::_('AGO') ?>" ||
						diff < 7200 && "<?php echo Jtext::_('ABOUT') ?> 1 <?php echo Jtext::_('HOUR') ?> <?php echo Jtext::_('AGO') ?>" ||
						diff < 86400 && "<?php echo Jtext::_('ABOUT') ?> " + Math.floor(diff / 3600) + " <?php echo Jtext::_('HOURS') ?> <?php echo Jtext::_('AGO') ?>") ||
					day_diff == 1 && "<?php echo Jtext::_('ABOUT') ?> 1 <?php echo Jtext::_('DAY') ?> <?php echo Jtext::_('AGO') ?>" ||
					day_diff < 7 && "<?php echo Jtext::_('ABOUT') ?> " + day_diff + " <?php echo Jtext::_('DAYS') ?> <?php echo Jtext::_('AGO') ?>" ||
					day_diff < 31 && "<?php echo Jtext::_('ABOUT') ?> " + Math.ceil(day_diff / 7) + " <?php echo Jtext::_('WEEKS') ?> <?php echo Jtext::_('AGO') ?>";
			}
		//]]>
		</script>
		<?php
	}
}
?>
