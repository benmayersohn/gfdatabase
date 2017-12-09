<?php
get_header(); ?>
<div class="page">
<main id="main" class="site-main" role="main">
<h2 class="text-center question-topic">Blog</h2>
<?php 
if ( have_posts() ) : 
        $paged = ( get_query_var( 'paged' ) ) ? get_query_var( 'paged' ) : 1;
        $args =  array( 
            'paged'             => $paged,
            'posts_per_page'    => get_option('posts_per_page'),
        ); 
        $the_query = new WP_Query($args); 

        if (in_array($paged, array(0,1))): // first page 
        ?> 
        <div style="text-align:center;">
        <h4 class="text-center question-topic">
        Thanks for visiting! Posts are listed in reverse-chronological order.
        </h4>
        </div>
        <?php endif; ?>

	<?php include('list-of-posts.php'); ?>
        
        <?php endif;wp_reset_postdata();?>
        </div>

        <div class="col-lg-4 col-md-3">
        <?php get_sidebar(); ?>
        </div>
        
        </div>

</main>
</div>
<?php get_footer(); ?>
        
        
        