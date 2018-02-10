<?php get_header(); ?>
<div class="page">
<main id="main" class="site-main" role="main">
<div class="row">
        <div class="col-lg-8 col-md-7 middle-panel-rise">
        
        <?php while ( have_posts() ) : the_post();?>
        
        <div <?php post_class(); ?> id="post-<?php the_ID(); ?>">
        <h2 class="text-center question-topic"><?php the_title(); ?></h2>
        <img alt="" class="img-responsive" style="width:400px;height:250px;border-style:solid;border-width:3px;border-color:black;" src="<?php echo get_the_post_thumbnail_url(get_the_ID(), 'full');?>">
        <h5 class="post-meta">
        Posted by: <?php echo get_the_author();?> in <?php 
        $categories = get_the_category();
        foreach( $categories as $key => $category ) {
            echo "<a href=\"" . site_url('category/' . $category->slug) . "\">" . $category->name . "</a>";
            if (array_key_exists($key+1, $categories)){
                echo ", ";
            }
        }
        echo ' ' . human_time_diff( get_the_time('U'), current_time('timestamp') ) . ' ago';
        ?>
        </h5>
        <hr/>
        <div class="question-content">
        <?php the_content(); ?>
        </div>

        </div>
        <?php
        // End the loop.
        endwhile;?>
			
		<hr/>
        <div class="question-comments text-left">
            <?php
             // If comments are open or we have at least one comment, load up the comment template.
            if ( comments_open() || get_comments_number() ) :
             comments_template();
            endif;
            ?>
        </div>
        </div>
	
	<div class="col-lg-4 col-md-3">
        <?php get_sidebar('widgety'); ?>
        <?php get_sidebar();?>
        </div>
        
        </div>
        
        
 

</main><!-- .site-main -->
</div>
<?php get_footer(); ?>

