<?php
if(!class_exists('ET_Events')):
class ET_Events {
	
	public function __construct(){
		$this->addActions();
		$this->addFilters();
	}
	
	public function addActions(){
		add_action('admin_enqueue_scripts', array($this, 'enqueueAdministrativeScriptsStyles'));
		add_action('init', array($this,'create_events_post_type'));
		add_action('init', array($this,'add_default_box'));
		add_action('add_meta_boxes', array($this,'add_custom_box'));
		add_action('save_post', array($this,'save_post_meta_data'));
	}
	
	public function addFilters(){
		
	}
	
	public function add_default_box(){
		//register_taxonomy_for_object_type('category', 'volunteer');
	}
	
	public function create_events_post_type(){
		register_post_type( 'events',
			array(
				'labels' => array(
					'name' => __( 'Events' ),
					'singular_name' => __( 'Event' ),
					'add_new' => _x('Add New', 'Event'),
				    'add_new_item' => __('Add New Event'),
				    'edit_item' => __('Edit Event'),
				    'new_item' => __('New Event'),
				    'all_items' => __('All Events'),
				    'view_item' => __('View Event'),
				    'search_items' => __('Search Events'),
				    'not_found' =>  __('No events found'),
				    'not_found_in_trash' => __('No events found in Trash'), 
				    'parent_item_colon' => '',
				    'menu_name' => 'Events'
				),
				'public' => true,
		    	'publicly_queryable' => true,
			    'show_ui' => true, 
			    'show_in_menu' => true, 
			    'query_var' => true,
			    'rewrite' => true,
			    'capability_type' => 'post',
			    'has_archive' => true, 
			    'hierarchical' => false,
			    'menu_position' => 5,
			    'supports' => array('title','editor','author','thumbnail','excerpt','comments'),
			)
		);
	}
	
	public function enqueueAdministrativeScriptsStyles(){
		wp_enqueue_style('jquery-ui-css', get_bloginfo('template_directory').'/css/jquery-ui-1.8.16.custom.css', array(), '1.0');
		wp_enqueue_style('jquery-timepicker-css', get_bloginfo('template_directory').'/css/jquery.timepicker.css', array(), '1.0');
		wp_enqueue_script('jquery-ui-js', get_bloginfo('template_directory').'/js/jquery-ui-1.8.16.custom.min.js', array('jquery'), '1.0');
		wp_enqueue_script('jquery-timepicker', get_bloginfo('template_directory').'/js/jquery.timepicker.js', array('jquery'), '1.0');
	}
	
	function add_custom_box() {
	    add_meta_box( 
	        'events_meta_data',
	        __( 'Events Information', 'events_meta_data' ),
	        array($this,'custom_box'),
	        'events',
	        'normal',
	        'high'
	    );
	}
	
	function custom_box( $post ) {
  		wp_nonce_field( plugin_basename( __FILE__ ), 'events_meta_data_noncename' );
		include('post-type-events-meta-box.php');
	}
	
	function save_post_meta_data( $post_id ) {
	  	if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) return;
		if ( !wp_verify_nonce( $_POST['events_meta_data_noncename'], plugin_basename( __FILE__ ) ) ) return;
		if ( 'page' == $_POST['post_type'] ) {
	    	if ( !current_user_can( 'edit_page', $post_id ) ) return;
	  	}else{
	    	if ( !current_user_can( 'edit_post', $post_id ) ) return;
	  	}
	  	$metaData = $_POST['events-meta'];
		if(is_array($metaData)) {
			update_post_meta($post_id, 'events-meta', $metaData);
		}
	}
	
}

global $ET_Events;
$ET_Events = new ET_Events;

endif;//Check ET_Events Class not defined