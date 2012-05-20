<?php
add_action('widgets_init', create_function('', 'return register_widget("List_Category_Loop");'));
class List_Category_Loop extends WP_Widget {
	
	/** constructor */
    function List_Category_Loop() {
    	parent::WP_Widget(false, $name = 'List Category Loop');  
    }
    
    /** @see WP_Widget::widget */
    function widget($args, $instance) {
        extract( $args );
	    $title = $instance['title'];
		$category = $instance['category'];
	    $size = $instance['size'];
	
	    echo $before_widget;
	    include('views/widget.php');
		echo $after_widget;
    }
    
    /** @see WP_Widget::update */
    function update($new_instance, $old_instance) {
		$instance = $old_instance;
		$instance['title'] = strip_tags($new_instance['title']);
		$instance['category'] = strip_tags($new_instance['category']);
		$instance['size'] = strip_tags($new_instance['size']);
    	return $instance;
    }
    
	function form($instance) {	
		
	    $title = esc_attr($instance['title']);
		$category = esc_attr($instance['category']);
	    $size = esc_attr($instance['size']);
		
	    include('views/admin.php');
	}
	    
}