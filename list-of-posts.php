<div class="row">
        <div class="col-lg-8 col-md-7 middle-panel-rise">
        <?php while ( have_posts() ) : the_post();?>     
        <h2>
        <a href="<?php echo esc_url(get_the_permalink());?>"><?php echo get_the_title();?></a>
        </h2>
    	<?php $img_src = get_the_post_thumbnail_url(get_the_ID(), array(400, 200)); if ($img_src) : ?>
        <a href="<?php echo esc_url(get_the_permalink());?>">
        <img alt="" class="img-responsive" style="width:400px;height:250px;border-style:solid;border-width:3px;border-color:black;" src="<?php echo $img_src;?>">
        </a>
		<?php endif; ?>

        <h6 class="post-meta">
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
        </h6>

        <?php
        // End the loop.
        endwhile;
        
        // Pagination
        echo "<hr>";
        $big = 999999999; // need an unlikely integer
        echo paginate_links( array(
            'base' => str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
            'format' => '?paged=%#%',
            'current' => max( 1, $paged ),
            'total' => $the_query->max_num_pages
        ) );
        ?>