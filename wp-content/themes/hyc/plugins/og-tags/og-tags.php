<?php
if(!class_exists('OG_Tags')){
	
	
class OG_Tags{	
	
	function __construct(){
		add_action('wp_head',array($this,'addOGTags'));
	}
	
	function addOGTags(){
		global $wp_query, $post;
		$title = get_bloginfo('name');
		$image = 'http://'.$_SERVER["HTTP_HOST"].'/wp-content/themes/hyc/img/hyc-head-logo.jpg';
		$description = '';
		$url = 'http://'.$_SERVER["HTTP_HOST"].$_SERVER['REQUEST_URI'];
		$blogname = get_bloginfo('name');
		$facebook_admin_id = '712951986,8802808';
		$facebook_app_id = '109885939129734';
	
		if($wp_query->is_single || $wp_query->is_page ){
			$temp_title = get_the_title();
			$title = (($temp_title=='')?$title:$temp_title);
			$temp_image = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID),'ogtags' );
			$image = (($temp_image[0]=='')?$image:$temp_image[0]);
			$temp_description = ($wp_query->is_page) ? '' : preg_replace('/\s+?(\S+)?$/', '', substr(get_the_excerpt(), 0, 101));
			$description = (($temp_description=='')?$description:$temp_description);
		}
		$ogtags = '<meta property="og:title" content="'.$title.'"/>
		    <meta property="og:type" content="non_profit"/>
		    <meta property="og:url" content="'.$url.'"/>
		    <meta property="og:image" content="'.$image.'"/>
		    <meta property="og:site_name" content="'.$blogname.'"/>
		    <meta property="fb:admins" content="'.$facebook_admin_id.'"/>
		    <meta property="fb:app_id" content="'.$facebook_app_id.'"/>
		    <meta property="og:description" content="'.$description.'"/>';
		echo $ogtags;
	}
}
global $OG_Tags;
$OG_Tags = new OG_Tags();

}//class_exists