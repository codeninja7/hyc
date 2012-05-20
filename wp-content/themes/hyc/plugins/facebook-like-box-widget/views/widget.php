<?php 
echo $before_widget;
?>
<div class="widgetInner">
	<h3><?php _e($instance['title']);?><b class="tail"></b><b class="wrap"></b></h3>
	<div class="fb-wrapper">
		<div id="fb-root"></div>
		<div class="fb-like-box" data-href="http://www.facebook.com/HeraldYouth" data-width="302" data-show-faces="true" data-stream="false" data-header="false"></div>
		<hr />
	</div>
</div>
<?php 
echo $after_widget;