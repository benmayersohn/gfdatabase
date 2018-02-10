<?php
get_header(); ?>
<div class="page">
<main id="main" class="site-main" role="main">
<?php 
if ( is_day() ) :
        $title = get_the_date();
        $date_query = array('year'      => (int)get_the_date('Y'), 
                            'monthnum'  => (int)get_the_date('n'),
                            'day'       => (int)get_the_date('j'));
        elseif ( is_month() ) :
            $title = get_the_date('F Y');
            $date_query = array('year'      => (int)get_the_date('Y'), 
                                'monthnum'  => (int)get_the_date('n'));
        elseif ( is_year() ) :
            $title = get_the_date('Y');
            $date_query = array('year'      => (int)get_the_date('Y'));
        else :
            $title = 'Archives';
            $date_query = NULL; // will return false on isset
        endif;?>
<h2 class="text-center question-topic"><?php echo $title;?></h2>
<?php
if ( have_posts() ) : 
        $paged = ( get_query_var( 'paged' ) ) ? get_query_var( 'paged' ) : 1;
        $args =  array( 
            'paged'             => $paged,
            'posts_per_page'    => get_option('posts_per_page'),
            'category_name'     => $title
        ); 
        if ($date_query){
            $args['date_query'] = array($date_query);
        }
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
<?php get_footer(); ?>
