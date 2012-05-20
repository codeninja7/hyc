<?php
if(!class_exists('ET_Volunteer')):
class ET_Volunteer {

	public function __construct(){
		$this->addActions();
		$this->addFilters();
	}
	
	public function addActions(){
		add_action('init', array($this,'create_post_type'));
		add_action('init', array($this,'add_default_box'));
		add_action('add_meta_boxes', array($this,'add_custom_box'));
		add_action('save_post', array($this,'save_post_meta_data'));
	}
	
	public function addFilters(){
		
	}
	
	public function add_default_box(){
		//register_taxonomy_for_object_type('category', 'volunteer');
	}
	
	public function create_post_type(){
		register_post_type( 'volunteer',
			array(
				'labels' => array(
					'name' => __( 'Volunteer Opportunities' ),
					'singular_name' => __( 'Volunteer Opportunity' ),
					'add_new' => _x('Add New', 'Opportunity'),
				    'add_new_item' => __('Add New Opportunity'),
				    'edit_item' => __('Edit Opportunity'),
				    'new_item' => __('New Opportunity'),
				    'all_items' => __('All Volunteer Opportunities'),
				    'view_item' => __('View Volunteer Opportunity'),
				    'search_items' => __('Search Volunteer Opportunity'),
				    'not_found' =>  __('No opportunities found'),
				    'not_found_in_trash' => __('No opportunities found in Trash'), 
				    'parent_item_colon' => '',
				    'menu_name' => 'Volunteer Opportunities'
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
	
	function add_custom_box() {
		add_meta_box( 
	        'volunteer_meta_data',
	        __( 'Volunteer Opportunity Information', 'volunteer_meta_data' ),
	        array($this,'custom_box'),
	        'volunteer',
	        'side',
	        'high'
	    );
	}
	
	function custom_box( $post ) {
  		wp_nonce_field( plugin_basename( __FILE__ ), 'volunteer_meta_data_noncename' );
		include('post-type-volunteer-meta-box.php');
	}
	
	function save_post_meta_data( $post_id ) {
		if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) return;
		if ( !wp_verify_nonce( $_POST['volunteer_meta_data_noncename'], plugin_basename( __FILE__ ) ) ) return;
		if ( 'page' == $_POST['post_type'] ) {
	    	if ( !current_user_can( 'edit_page', $post_id ) ) return;
	  	}else{
	    	if ( !current_user_can( 'edit_post', $post_id ) ) return;
	  	}
	  	$metaData = $_POST['volunteer-meta'];
		if(is_array($metaData)) {
			update_post_meta($post_id, 'volunteer-meta', $metaData);
		}
	}
}

global $ET_Volunteer;
$ET_Volunteer = new ET_Volunteer;

endif;//Check ET_Volunteer Class not defined