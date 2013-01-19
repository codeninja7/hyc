<?php
add_theme_support( 'post-thumbnails' );
//add_image_size('thumbnail',140,210,true); // Thumbnail
//add_image_size('medium',300,300,false); // Medium
//add_image_size('large',630,420,false); // Large
add_image_size('blogroll',620,430,true); // Normal post thumbnails
add_image_size('dynamiclead',160,286,false); // Dynamic Lead
add_image_size('ogtags',100,100,false); // Dynamic Lead

update_option('image_default_link_type','none');

function fb_unautop_4_img( $content ) {
    $content = preg_replace(
        '/<p>\\s*?(<a rel=\"attachment.*?><img.*?><\\/a>|<img.*?>)?\\s*<\\/p>/s',
        '$1',
        $content
    );
    return $content;
}
add_filter( 'the_content', 'fb_unautop_4_img', 10 );

function type_users_excerpt($html,$curauth){
	
	$html = '
	<div class="author-wrapper staff-wrapper">
		<div class="author-content">
			<h1 class="author-name"><a href="/author/'.$curauth->user_login.'/">'.get_the_author_meta('user_firstname',$curauth->ID).' '.get_the_author_meta('user_lastname',$curauth->ID).'</a><b class="wrap"></b><b class="tail"></b></h1>
			<div class="description author-bio">
				<a href="/author/'.$curauth->user_login.'/">'.userphoto__get_userphoto($curauth->ID, USERPHOTO_FULL_SIZE, '', '', array(), '').'</a>
				<p class="staff-title">
					'.get_the_author_meta('staff-title',$curauth->ID).'<br/>
					Since '.get_the_author_meta('staff-date-start',$curauth->ID).'
				</p>
				'.cfct_basic_content_formatting(get_the_author_meta('staff-bio',$curauth->ID)).'
				<br class="clearfix"/>
			</div>
		</div>
	</div>';
	echo $html;
	
}
add_filter( 'wordpress_users_get_user_listing', 'type_users_excerpt', 10, 2 );

add_filter( 'pre_site_transient_update_core', create_function( '$a', "return null;" )); // screening core update
add_filter( 'pre_site_transient_update_plugins', create_function( '$a', "return null;" )); // screening plugin update
add_filter( 'pre_site_transient_update_themes', create_function( '$a', "return null;" )); // screening theme update
remove_action('admin_init', '_maybe_update_core'); // forbid wp_version_check();
remove_action('admin_init', '_maybe_update_plugins'); // forbid wp_update_plugins();
remove_action('admin_init', '_maybe_update_themes'); // forbid wp_update_themes();
