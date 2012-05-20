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

define('ABSPATH', dirname(__FILE__) . '/');

$css_files = array(
	'attachment' => 'attachment.css',
	'carrington-blog' => 'carrington-blog.css',
	'img' => 'img.css',
	'typography' => 'typography.css',
	'hyc-admin' => 'hyc-admin.css',
	'hyc' => 'hyc.css',
);

// set default
$load = array('typography', 'carrington-blog', 'img' , 'hyc');

if (!isset($_GET['type'])) {
	$_GET['type'] = 'main';
}

switch ($_GET['type']) {
	case 'attachment':
		$load = array('typography', 'attachment', 'img' , 'hyc-admin', 'hyc');
		break;
	case 'attachment-noimg':
		$load = array('typography', 'attachment' , 'hyc-admin', 'hyc');
		break;
	case 'noimg':
		$load = array('typography', 'carrington-blog' , 'hyc-admin', 'hyc');
		break;
	case 'main':
	default:
		// use default
		break;
}

ob_start("ob_gzhandler");

header('Content-type: text/css');
header("Cache-Control: public");
// cache for 1 day
header('Expires: '.gmdate('D, d M Y H:i:s', time() + 86400) . 'GMT'); 

foreach ($load as $file) {
	include(ABSPATH.$css_files[$file]);
	echo "\n\n";
}

?>