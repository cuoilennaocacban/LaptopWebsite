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
defined( '_JEXEC' ) or die( 'Restricted access' );
?>
<script type="text/javascript">
//<![CDATA[
	function tmpl<?php echo $uniqid ?>(tweets) {
		var output = '<div class="sp-tweet">';
		
		for (i = 0; i < tweets.length; i++) {
			var status = tweets[i].text.replace(/((https?|s?ftp|ssh)\:\/\/[^"\s\<\>]*[^.,;'">\:\s\<\>\)\]\!])/g, function (url) {
				return '<a target="<?php echo $target; ?>" href="' + url + '">' + url + '</a>';
			}).replace(/\B@([_a-z0-9]+)/ig, function (reply) {
				return reply.charAt(0) + '<a target="<?php echo $target; ?>" href="http://twitter.com/' + reply.substring(1) + '">' + reply.substring(1) + '</a>';
			});
			
			output += '<div class="sp-tweet-list">';
			
			output += '<div class="tweet-user-info">';
			
			<?php if($avatar) { ?>
				<?php if($linked_avatar) { ?>
					output += '<a target="<?php echo $target; ?>" href="' + tweets[i].user.screen_name + '"><img class="tweet-avatar" src="' + tweets[i].user.profile_image_url + '" alt="' + tweets[i].user.name + '" title="' + tweets[i].user.name + '" width="<?php echo $avatar_width ?>" /></a>';
				<?php } else { ?>
					output += '<img class="tweet-avatar" src="' + tweets[i].user.profile_image_url + '" alt="' + tweets[i].user.name + '" title="' + tweets[i].user.name + '" width="<?php echo $avatar_width ?>" />';
				<?php } ?>
			<?php } ?>
			
			output += '</div>';
			
			output += '<div class="tweet-text" style="margin-left:' + (<?php echo $avatar_width; ?> + 16) + 'px">';
			output += '<div class="bubble-tl"><div class="bubble-tr"><div class="bubble-tm"></div></div></div>';
			
			output += '<div class="bubble-l"><div class="bubble-r"><div class="bubble-m">';
			
			<?php if($tweet_time) { ?>
				<?php if($tweet_time_linked) { ?>
					output += '<div class="date"><a target="<?php echo $target; ?>" href="http://twitter.com/' + tweets[i].user.screen_name + '/statuses/' + tweets[i].id + '">' + timeago(tweets[i].created_at) + '</a></div>';
				<?php } else { ?>
					output += '<div class="date">' + timeago(tweets[i].created_at) + '</div>';
				<?php } ?>
			<?php } ?>
			
			<?php if($tweet_src) { ?>
				output += '<div class="source">From ' + tweets[i].source + '</div>';
			<?php } ?>
			
			output += '<div class="sp-tweet-clr"></div>';
			output += status;
			
			output += '</div></div></div>';
			
			output += '<div class="bubble-bl"><div class="bubble-br"><div class="bubble-bm"></div></div></div>';
			output += '<div class="sp-tweet-clr"></div>';
			
			output += '</div>';
			output += '</div>';
		}
		
		output += '<a class="followme" target="<?php echo $target; ?>" href="http://twitter.com/' + tweets[0].user.screen_name + '"><?php echo JText::_('FOLLOW') ?> ' + tweets[0].user.name + ' <?php echo JText::_('ON_TWITTER') ?></a>';
		output += '<div class="sp-tweet-clr"></div>';
		output += '</div>';
		
		return output;
	}
//]]>
</script>
<div id="sp-tweet-id<?php echo $uniqid; ?>">
</div>