<?php

// This file is part of the Carrington Blog Theme for WordPress
// http://carringtontheme.com
//
// Copyright (c) 2008-2010 Crowd Favorite, Ltd. All rights reserved.
// http://crowdfavorite.com
//
// Released under the GPL license
// http://www.opensource.org/licenses/gpl-license.php
//
// **********************************************************************
// This program is distributed in the hope that it will be useful, but
// WITHOUT ANY WARRANTY; without even the implied warranty of
// MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. 
// **********************************************************************

if (__FILE__ == $_SERVER['SCRIPT_FILENAME']) { die(); }
if (CFCT_DEBUG) { cfct_banner(__FILE__); }

get_header();

?>
<div id="homepage-dl-wrap">
	<div id="homepage-dl">
	<?php
	$featureArgs = array(
		'post_type' => array('post','events','volunteer','announcements'),
		'post_status' => 'publish',
		'posts_per_page' => 6,
		'meta_query' => array(
			array(
				'key' => 'featured-meta-state',
				'value' => 'featured',
				'compare' => '=',
			),
		)
	);
	$featureQuery = new WP_Query($featureArgs);
	while(!is_wp_error($featureQuery) && $featureQuery->have_posts() ) : 
		$featureQuery->the_post();
		$title = trim(strip_tags( get_the_title() ) );
		$excerpt =  get_the_excerpt();
		$permalink = get_permalink();
		?>
		<div class="post">
			<?php the_post_thumbnail('dynamiclead');?>
			
			<div class="post-content">
				<a href="<?php _e($permalink) ?>" title="<?php  _e($title) ?>">
					<span class="title"><?php  _e($title) ?></span>
					<?php echo $excerpt; ?>
				</a>
			</div>
		</div>
		<?php 
	endwhile; 
	?>
	</div><!--#homepage-dl-->
</div><!--#homepage-dl-wrap-->
<script>
(function($){
	$('#homepage-dl')
		.delegate('.post-content','mouseenter',function(){
			$(this).add($(this).find('a')).animate({'height':'266px'},{duration:350,easing:'easeOutCubic',queue:false});
		})
		.delegate('.post-content','mouseleave',function(){
			$(this).add($(this).find('a')).animate({'height':'100px'},{duration:350,easing:'easeOutCubic',queue:false});
		});
})(jQuery);
</script>
<div id="homepage-sections">
<?php get_sidebar();?>
</div>
<?php 

get_footer();

?>