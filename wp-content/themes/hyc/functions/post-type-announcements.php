<?php
if(!class_exists('ET_Announcements')):
class ET_Announcements {
	
	public function __construct(){
		$this->addActions();
		$this->addFilters();
	}
	
	public function addActions(){
		//add_action('admin_enqueue_scripts', array($this, 'enqueueAdministrativeScriptsStyles'));
		add_action('init', array($this,'create_post_type'));
		//add_action('init', array($this,'add_default_box'));
		//add_action('add_meta_boxes', array($this,'add_custom_box'));
		//add_action('save_post', array($this,'save_post_meta_data'));
	}
	
	public function addFilters(){
		
	}
	
	public function add_default_box(){
		
	}
	
	public function create_post_type(){
		register_post_type( 'announcements',
			array(
				'labels' => array(
					'name' => __( 'Announcements' ),
					'singular_name' => __( 'Announcement' ),
					'add_new' => _x('Add New', 'Announcement'),
				    'add_new_item' => __('Add New Announcement'),
				    'edit_item' => __('Edit Announcement'),
				    'new_item' => __('New Announcement'),
				    'all_items' => __('All Announcements'),
				    'view_item' => __('View Announcement'),
				    'search_items' => __('Search Announcements'),
				    'not_found' =>  __('No announcements found'),
				    'not_found_in_trash' => __('No announcements found in Trash'), 
				    'parent_item_colon' => '',
				    'menu_name' => 'Announcements'
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
			    'supports' => array('title','editor','author','thumbnail','excerpt'),
			)
		);
	}
	
	public function enqueueAdministrativeScriptsStyles(){
		
	}
	
	function add_custom_box() {
		
	}
	
	function custom_box( $post ) {
		
	}
	
	function save_post_meta_data( $post_id ) {
		
	}
	
}

global $ET_Announcements;
$ET_Announcements = new ET_Announcements;

endif;//Check ET_Announcements Class not defined