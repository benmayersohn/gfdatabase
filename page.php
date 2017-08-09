<?php get_header(); ?>

<main id="main" class="site-main" role="main">

    <?php while ( have_posts() ) : the_post();?>
    <div <?php post_class(); ?> id="post-<?php the_ID(); ?>">
        <h2 class="text-center question-topic"><?php the_title(); ?></h2>
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

