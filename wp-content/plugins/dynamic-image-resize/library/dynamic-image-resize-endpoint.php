<?php
//Load Wordpress Short Init
define( 'SHORTINIT', true );
require_once( dirname(dirname(dirname(dirname(dirname(__FILE__))))). '/wp-load.php' );
require_once( 'config.php' );
wp_mkdir_p($cacheurl);
define ('DIRECTORY_CACHE', $cacheurl);		// cache directory
include('timthumb.php');
?>