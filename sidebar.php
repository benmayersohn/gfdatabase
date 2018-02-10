<?php 
// get recent posts
$args = array (
    'post_status'       => 'publish',
    'numberposts'       => 5
    );
    $recent_posts = wp_get_recent_posts( $args );
?>
<hr>
<div id="right-panel-rise">
<h3>Recent Posts</h3>
<ul class="list-unstyled">
<?php foreach ($recent_posts as $recent) :?>
<li class="recent-posts" style="padding-top:20px;">
<a href="<?php echo get_permalink($recent["ID"]);?>">
<img style="width:24px;height:24px;" src="<?php echo get_the_post_thumbnail_url($recent["ID"], 'thumbnail');?>">
<?php echo wordwrap($recent["post_title"], 40);?>
</a>
</li>
<?php endforeach; ?>
</ul>

<h3>Archive</h3>
<?php 
$args = array(
	'format'          => 'custom', 
	'before'          => '',
	'after'           => '<br>',
	'show_post_count' => true,
);
wp_get_archives($args); 
?>

<h3>Categories</h3>
<?php 
$args = array(
    'style' => '',
    'show_count' => true,
);

wp_list_categories($args); 
?>
</div>