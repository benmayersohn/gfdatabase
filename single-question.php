<?php get_header(); ?>

<main id="main" class="site-main" role="main">
<div class="row">
        <div class="col-lg-8 col-md-7 middle-panel-rise">
    <?php while ( have_posts() ) : the_post();
    get_template_part('content-question');
    endwhile;
    ?>
    </div>
	<div class="col-lg-4 col-md-5">
			<?php get_sidebar('footer');?>
		</div>
	</div>

</main><!-- .site-main -->

<?php get_footer(); ?>

