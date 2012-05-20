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

get_header();
?>

<div id="content" class="category">

<?php if (have_posts()) : while (have_posts()): the_post();
	$title = (get_query_var('paged')<2) ? get_the_author_meta('display_name') : get_the_author_meta('display_name').', PG. '.get_query_var('paged');
?>
	<div class="author-wrapper">
		<div class="author-content">
			<h1 class="author-name"><?php echo get_the_author_meta('user_firstname'); ?> <?php echo get_the_author_meta('user_lastname'); ?><b class="wrap"></b><b class="tail"></b></h1>
			<div class="description author-bio">
				<?php userphoto_the_author_photo();?>
				<?php echo cfct_basic_content_formatting(get_the_author_meta('description')); ?>
				<br class="clearfix"/>
			</div>
		</div>
	</div>
<?php break;endwhile;endif;rewind_posts(); ?>

<?php
	cfct_template_file('loop','loop-default');
	if(function_exists('wp_corenavi')) {
    	wp_corenavi();
	}
?>
</div><!--#content-->

<?php 

get_sidebar();

get_footer();

?>