<?php
if(!class_exists('Facebook_Like_Button')){
	
	
class Facebook_Like_Button{
	
	public function __construct(){
		add_filter('facebook_like_button_byline',array($this,'renderHTML'));
	}
	
	public function renderHTML($fb_like_btn_byline){		
		$fb_like_btn_byline = '<div class="fb-like" data-send="true" data-width="350" data-show-faces="false"></div>';
		return $fb_like_btn_byline;
		
	}
}
global $Facebook_Like_Button;
$Facebook_Like_Button = new Facebook_Like_Button();

}//class_exists