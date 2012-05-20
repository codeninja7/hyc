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
<h1><?php echo single_cat_title('', false); ?></h1>
<?php
	global $wp_query;
	$args = array_merge( $wp_query->query, array('post_type' => array('post','volunteer','events')));
	query_posts( $args );
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