<?php get_header(); ?>

<main id="main" class="site-main" role="main">

    <?php while ( have_posts() ) : the_post();?>
    <div <?php post_class(); ?> id="post-<?php the_ID(); ?>">
        <h1 class="text-center question-topic"><?php the_title(); ?></h1>
        <div class="question-content">
        <?php the_content(); ?>
        </div>
    </div>
    <?php
        // If comments are open or we have at least one comment, load up the comment template.
        if ( comments_open() || get_comments_number() ) :
            comments_template();
        endif;
    ?>

    <nav class="navigation post-navigation" role="navigation">
    <h2 class="screen-reader-text">Navigation</h2>
    <div class="nav-links">
        <?php 
        if (get_next_post()){
            $next_post = get_next_post();  
            $next_title = $next_post->post_title; 
            $next_link = get_permalink($next_post->ID);  
        }
        if (get_previous_post()){
            $previous_post = get_previous_post();
            $previous_title = $previous_post->post_title;
            $previous_link = get_permalink($previous_post->ID);
        }?>

        <?php if (get_previous_post()) : ?>
            <div class="nav-previous">
            <span>Previous:</span>
            <a href="<?php echo $previous_link ?>" rel="prev">
            <span class="post-title"><?php echo $previous_title?></span></a>
            </div>
        <?php endif; if (get_next_post()) : ?>
        <div class="nav-next">
        <span>Next:</span> 
        <a href="<?php echo $next_link; ?>" rel="next">
        <span class="post-title"><?php echo $next_title?></span></a></div>
        </div>
        <?php endif; ?>
    </nav>

    <?php
    // End the loop.
    endwhile;?>

</main><!-- .site-main -->

<?php get_footer(); ?>

