<?php
function get_image_resized_url($url,$w,$h,$c=false){
	$crop = $c ? 'c' : '';
	$pattern = '/.(jpg|png|gif)/i';
	$replace = '-'.$w.'x'.$h.$crop.'.${1}';
	$resize_url = preg_replace($pattern,$replace,$url);
	return $resize_url;
}