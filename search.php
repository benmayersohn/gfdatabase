<?php get_header(); ?>
<div class="page">
<main id="main" class="site-main" role="main">
	<?php 
	$search_string = esc_html(get_search_query());?>
	<h2 class="text-center question-topic">Search Results</h2>
	<h5 id="searchedfor">Searched for: "<?php echo $search_string;?>"</h5>
	<?php get_sidebar('widgety-top'); ?>
	<?php 
	if ( have_posts() ) : 
		$paged = ( get_query_var( 'paged' ) ) ? get_query_var( 'paged' ) : 1;
        $args =  array( 
			'paged'             => $paged,
			'post_type'			=> 'post',
			'posts_per_page'    => get_option('posts_per_page'),
			's'					=> $search_string
        ); 
		$the_query = new WP_Query($args);
		include('list-of-posts.php'); ?>
		
	<?php else: ?>
	<div class="row">
        <div class="col-lg-8 col-md-7 middle-panel-rise">
		<div class="text-center question-topic">
			<h3>Nothing found!</h3>
		</div>
		<hr/>
    <?php endif; wp_reset_postdata();?>
	
		</div>
	
        <div class="col-lg-4 col-md-5">
        <?php get_sidebar();?>
		<?php get_sidebar('footer');?>
        </div>

    </div>

</main><!-- .site-main -->
</div>
<?php get_footer(); ?>