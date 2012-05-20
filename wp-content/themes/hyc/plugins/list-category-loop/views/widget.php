<?php 
$url = ($category=='post') ? '/category/blog/' : '/'.$category.'/';
?>
<div class="widgetInner">
	<h3><a href="<?php echo $url?>"><?php echo $title?></a><b class="tail"></b><b class="wrap"></b></h3>
	<ul>
	<?php
	$args = array(
		'post_type' => $category,
		'post_status' => 'publish',
		'posts_per_page' => $size,
	);
	$catQuery = new WP_Query($args);
	while(!is_wp_error($catQuery) && $catQuery->have_posts() ) : 
		$catQuery->the_post();
		$catTitle = trim(strip_tags( get_the_title() ) );
		$permalink = get_permalink();
		?>
		<li><a href="<?php echo $permalink?>"><?php echo $catTitle?></a></li>
	<?php endwhile; ?>
	</ul>
</div>