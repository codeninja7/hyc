<?php
global $Facebook_Comments, $post;

if ( 'open' == $post->comment_status ):
//$options = $FacebookComments->getOptions();
//$appid = $options['moderator_appid'];
?>

<h3>Comments</h3>
<div class="fb-comments" data-href="<?php the_permalink(); ?>" data-num-posts="5" data-width="630"></div>
<?php 
endif;
