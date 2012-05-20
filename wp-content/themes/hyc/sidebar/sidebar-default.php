<?php
if (__FILE__ == $_SERVER['SCRIPT_FILENAME']) { die(); }
if (CFCT_DEBUG) { cfct_banner(__FILE__); }

global $post;
$orig_post = $post;
?>

<div id="sidebar">
<?php
$post = $orig_post;
if ( function_exists('dynamic_sidebar') ) {
	dynamic_sidebar('default');
}
?>
</div><!--#sidebar-->