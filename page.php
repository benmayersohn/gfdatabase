<?php get_header(); ?>

<main id="main" class="site-main" role="main">

    <?php while ( have_posts() ) : the_post();?>
    
    <div <?php post_class(); ?> id="post-<?php the_ID(); ?>">
        <!-- Put title if hide-title meta entry is (1) set to false or (2) not set at all -->
        <?php 
        global $post;
        $hide_title = get_post_meta($post->ID, 'hide-title', true) === 'true';
        if (!$hide_title) : ?>
        <h2 class="text-center question-topic"><?php the_title(); ?></h2>
        <?php endif; ?>
        <div>
        <?php the_content(); ?>
        </div>
    </div>
    <?php
    // End the loop.
    endwhile;
?>

</main><!-- .site-main -->

<?php get_footer(); ?>

