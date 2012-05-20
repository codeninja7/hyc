<?php
add_theme_support( 'nav-menus' );
add_action( 'init', 'register_my_menus' );
add_filter('wp_nav_menu', 'add_markup_pages');

function register_my_menus() {
	register_nav_menus(
		array(
			'primary-menu' => __( 'Navigation' ),
			'secondary-menu' => __( 'Secondary Menu' ),
			'tertiary-menu' => __( 'Tertiary Menu' )
		)
	);
}
function add_markup_pages($output) {
    $output= preg_replace('/menu-item/', 'first-menu-item menu-item', $output, 1);
	$output = substr_replace($output, "last-menu-item menu-item clearfix", strripos($output, "menu-item"), strlen("menu-item"));
    return $output;
}

function wp_corenavi() {
  global $wp_query, $wp_rewrite;
  $pages = '';
  $max = $wp_query->max_num_pages;
  if (!$current = get_query_var('paged')) $current = 1;
  $a['base'] = ($wp_rewrite->using_permalinks()) ? user_trailingslashit( trailingslashit( remove_query_arg( 's', get_pagenum_link( 1 ) ) ) . 'page/%#%/', 'paged' ) : @add_query_arg('paged','%#%');
  if( !empty($wp_query->query_vars['s']) ) $a['add_args'] = array( 's' => get_query_var( 's' ) );
  $a['total'] = $max;
  $a['current'] = $current;
 
  $total = 0; //1 - display the text "Page N of N", 0 - not display
  $a['mid_size'] = 5; //how many links to show on the left and right of the current
  $a['end_size'] = 1; //how many links to show in the beginning and end
  $a['prev_text'] = '&laquo; Previous'; //text of the "Previous page" link
  $a['next_text'] = 'Next &raquo;'; //text of the "Next page" link
 
  if ($max > 1) echo '<div class="pagination">';
  if ($total == 1 && $max > 1) $pages = '<span class="pages">Page ' . $current . ' of ' . $max . '</span>'."\r\n";
  echo $pages . paginate_links($a);
  if ($max > 1) echo '</div>';
}