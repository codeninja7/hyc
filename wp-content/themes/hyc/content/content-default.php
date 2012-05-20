<?php

// This file is part of the Carrington Blog Theme for WordPress
// http://carringtontheme.com
//
// Copyright (c) 2008-2010 Crowd Favorite, Ltd. All rights reserved.
// http://crowdfavorite.com
//
// Released under the GPL license
// http://www.opensource.org/licenses/gpl-license.php
//
// **********************************************************************
// This program is distributed in the hope that it will be useful, but
// WITHOUT ANY WARRANTY; without even the implied warranty of
// MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. 
// **********************************************************************

if (__FILE__ == $_SERVER['SCRIPT_FILENAME']) { die(); }
if (CFCT_DEBUG) { cfct_banner(__FILE__); }

global $previousday;
global $post;
$previousday = -1;

?>
<div id="post-content-<?php the_ID() ?>" <?php post_class('full'); ?>>
	
	<h1 class="entry-title full-title"><?php the_title() ?></h1>
	<span class="by-line">By <a href="<?php _e(get_author_posts_url(get_the_author_meta('ID')));?>" title="<?php _e(attribute_escape(get_the_author()))?>"><?php _e(attribute_escape(get_the_author()))?></a> - Posted <?php the_date(); ?></span>
	<?php 
	$fb_like_btn_byline = apply_filters('facebook_like_button_byline',$fb_like_btn_byline);
	echo $fb_like_btn_byline;
	?>
	<div class="entry-content full-content">
<?php 
		the_content('<span class="more-link">'.__('Continued...', 'carrington-blog').'</span>'); 
		$args = array(
			'before' => '<p class="pages-link">'. __('Pages: ', 'carrington-blog'),
			'after' => "</p>\n",
			'next_or_number' => 'number'
		);
		wp_link_pages($args);
?>
		<div class="clear"></div>
	</div><!-- .entry-content-->
	
	<?php the_tags(__('<p class="filed tags alt-font tight">Tagged with ', 'carrington-blog'), ', ', '.</p>'); ?>

	<?php edit_post_link(__('Edit', 'carrington-blog'), '<div class="edit-post edit">', '</div>'); ?>
</div><!-- .post -->