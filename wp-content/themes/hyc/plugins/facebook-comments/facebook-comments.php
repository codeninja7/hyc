<?php
if(!class_exists('Facebook_Comments')){
	
	
class Facebook_Comments{	
	
	public function __construct(){
		add_filter('comments_template',array($this,'renderComments'));
	}
	
	public function renderComments($url){
		
		return trailingslashit( dirname(__FILE__) ).'views/facebook-comments.php';
		
	}
}
global $Facebook_Comments;
$Facebook_Comments = new Facebook_Comments();

}//class_exists