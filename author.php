<?php
get_header(); ?>
<div class="page">
<main id="main" class="site-main" role="main">
<h2 class="text-center question-topic"><?php $title = get_the_author(); echo $title;?></h2>
<?php 
if ( have_posts() ) : 
        $paged = ( get_query_var( 'paged' ) ) ? get_query_var( 'paged' ) : 1;
        $args =  array( 
            'paged'             => $paged,
            'posts_per_page'    => get_option('posts_per_page'),
            'author'     => get_the_author_meta( 'ID' )
        ); 
        $the_query = new WP_Query($args); ?>

	<?php get_sidebar('widgety-top'); ?>

	<?php include('list-of-posts.php'); ?>
        
        <?php endif;wp_reset_postdata();?>
        </div>

        <div class="col-lg-4 col-md-3">
        <?php get_sidebar();?>
        </div>
    </div>
</main>
</div>
<?php get_footer();
