<?php
if(!class_exists('ET_Featured')):
class ET_Featured {

	public function __construct(){
		$this->addActions();
		$this->addFilters();
	}
	
	public function addActions(){
		add_action( 'add_meta_boxes', array($this,'add_custom_box'));
		add_action( 'save_post', array($this,'save_post_meta_data'));
	}
	
	public function addFilters(){
		
	}
	
	
	function add_custom_box() {
		add_meta_box( 
	        'featured_meta_data',
	        __( 'Featured Item', 'featured_information_textdomain' ),
	        array($this,'custom_box'),
	        'post',
	        'side',
	        'default'
	    );
	    add_meta_box( 
	        'featured_meta_data',
	        __( 'Featured Item', 'featured_information_textdomain' ),
	        array($this,'custom_box'),
	        'events',
	        'side',
	        'default'
	    );
	    add_meta_box( 
	        'featured_meta_data',
	        __( 'Featured Information', 'featured_information_textdomain' ),
	        array($this,'custom_box'),
	        'volunteer',
	        'side',
	        'default'
	    );
	    add_meta_box( 
	        'featured_meta_data',
	        __( 'Featured Information', 'featured_information_textdomain' ),
	        array($this,'custom_box'),
	        'announcements',
	        'side',
	        'default'
	    );
	}
	
	function custom_box($post) {
  		wp_nonce_field( plugin_basename( __FILE__ ), 'featured_meta_data_noncename' );
  		$checked = (get_post_meta($post->ID , 'featured-meta-state', true)=='featured') ? 'checked="checked"' : '';
  		echo '<label class="selectit">';
  		echo '<input id="featured-meta-state" type="checkbox" name="featured-meta-state" value="featured" '.$checked.'/>';
  		echo '&nbsp;Feature on Home Page';
  		echo '</label>';

	}
	
	function save_post_meta_data( $post_id ) {
		if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) return;
		if ( !wp_verify_nonce( $_POST['featured_meta_data_noncename'], plugin_basename( __FILE__ ) ) ) return;
		if ( 'page' == $_POST['post_type'] ) {
	    	if ( !current_user_can( 'edit_page', $post_id ) ) return;
	  	}else{
	    	if ( !current_user_can( 'edit_post', $post_id ) ) return;
	  	}
	  	$metaData = ($_POST['featured-meta-state']) ? $_POST['featured-meta-state'] : false;
		update_post_meta($post_id, 'featured-meta-state', $metaData);
	}
}

global $ET_Featured;
$ET_Featured = new ET_Featured;

endif;//Check ET_Featured Class not defined