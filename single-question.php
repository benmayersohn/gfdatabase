<?php get_header(); ?>

<main id="main" class="site-main" role="main">
    <?php while ( have_posts() ) : the_post();
    get_template_part('content-question');
    endwhile;
    ?>

</main><!-- .site-main -->

<?php get_footer(); ?>

