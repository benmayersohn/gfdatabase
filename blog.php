<?php
/*
Template Name: Post List
*/
get_header(); ?>

<div class="wrap">
	<header class="page-header">
		<h2 class="page-title"><?php _e('Posts'); ?></h2>
	</header>

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">
            <?php 
            $paged = get_query_var( 'paged' ) ? get_query_var( 'paged' ) : 1;
            $args = array('post_type' => 'post', 'posts_per_page' => 2, 'paged' => $paged);
            $post_query = new WP_Query($args);

            $temp_query = $wp_query;
            $wp_query   = NULL;
            $wp_query   = $post_query;

            if ( !$post_query->have_posts() ) : ?>
            <h2 class="text-center">You have no posts in your database! Please add some.</h2>
            <?php endif; ?>

            <?php while ( $post_query->have_posts() ) : $post_query->the_post(); ?>

            <header class="entry-header">
            <?php
            the_title( '<h3 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h3>' );
            ?>
            </header><!-- .entry-header -->

            <div class="entry-content">
            <?php
            echo get_the_excerpt();
            ?>
	    </div><!-- .entry-content -->

        <?php endwhile; ?>
        
        <?php 
        $pag_args = array(
		'base' =>  get_pagenum_link() . "%_%",
		'format' => '?paged=%#%',
		'current' => max(1,$paged),
		'total' => $post_query->max_num_pages,
		'prev_text' => 'Previous',
		'next_text' => 'Next'
        );?>

        <br><br>
        <?php echo paginate_links( $pag_args );?>

        <?php
        // lastly, reset query
        wp_reset_postdata();
        $wp_query = NULL;
        $wp_query = $temp_query;
        ?>

		</main><!-- #main -->
	</div><!-- #primary -->
	<?php get_sidebar(); ?>
</div><!-- .wrap -->

<?php get_footer();
