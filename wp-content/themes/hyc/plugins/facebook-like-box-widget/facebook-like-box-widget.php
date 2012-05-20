<?php
/*
Plugin Name: Contact Us Widget
Description: A contact us sidebar widget.
Author: Eric Tsuei.
Version: 1.0
Author URI: http://www.etsuei.com
*/

// Load the widget on widgets_init
function facebook_like_box_widget() {
	register_widget('Facebook_Like_Box_Widget');
}
add_action('widgets_init', 'facebook_like_box_widget');

/**
 * SP RecentWidget class
 *
 * @author Shane & Peter, Inc. (Peter Chester)
 **/
class Facebook_Like_Box_Widget extends WP_Widget {
	
	var $pluginDomain = 'facebook_like_box_widget';

	/**
	 * Contact Widget constructor
	 *
	 * @return void
	 * @author Eric Tsuei
	 */
	function Facebook_Like_Box_Widget() {
		$widget_ops = array( 'classname' => 'widget_facebook_like_box_widget', 'description' => __( 'Facebook Like Box.', $this->pluginDomain ) );
		$control_ops = array( 'id_base' => 'widget_facebook_like_box_widget' );
		$this->WP_Widget('widget_facebook_like_box_widget', __('Facebook Like Box', $this->pluginDomain), $widget_ops, $control_ops);	
	}
	
	/**
	 * Widget frontend output
	 *
	 * @param array $args 
	 * @param array $instance 
	 * @return void
	 * @author Eric Tsuei
	 */
	function widget( $args, $instance ) {
		extract( $args );
		$title = apply_filters('widget_title', $instance['title']);
		include( $this->getTemplateHierarchy( 'widget', 'follow-us-widget' ) );
	}

	/**
	 * Update widget options
	 *
	 * @param object $new_instance Widget Instance
	 * @param object $old_instance Widget Instance 
	 * @return object
	 * @author Eric Tsuei
	 */
	function update( $new_instance, $old_instance ) {
		$instance = $old_instance;
		$instance['title'] = strip_tags($new_instance['title']);
		$instance['facebook_url'] = $new_instance['facebook_url'];
		$instance['width'] = $new_instance['width'];
		return $instance;
	}

	/**
	 * Form UI
	 *
	 * @param object $instance Widget Instance
	 * @return void
	 * @author Shane & Peter, Inc. (Peter Chester)
	 */
	function form( $instance ) {
		$defaults = array( 
			'title' => __('Find Us On Facebook'),
			'facebook_url' => __('https://www.facebook.com/pages/Herald-Youth-a-ministry-of-CCHC/126523534129896'),
			'width' => __('302'),
		);
		$instance = wp_parse_args( (array) $instance, $defaults );
		$title = esc_attr($instance['title']);
		$facebook_url = esc_attr($instance['facebook_url']);
		$width = esc_attr($instance['width']);
		include('views/admin.php');
	}

	/**
	 * Loads theme files in appropriate hierarchy: 1) child theme, 
	 * 2) parent template, 3) plugin resources. will look in the onair-widget/
	 * directory in a theme and the views/ directory in the plugin
	 *
	 * @param string $template template file to search for
	 * @return template path
	 * @author Shane & Peter, Inc. (Matt Wiebe)
	 **/

	function getTemplateHierarchy($template,$path) {
		// whether or not .php was added
		$template_slug = rtrim($template, '.php');
		$template = $template_slug . '.php';
		
		if ( $theme_file = locate_template( array( trailingslashit($path) . $template ) ) ) {
			$file = $theme_file;
		} else {
			$file = 'views/' . $template;
		}
		return apply_filters( 'template_' . $path . '_' . $template_slug, $file, $template );
	}
}
?>