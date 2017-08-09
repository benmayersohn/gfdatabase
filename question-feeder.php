<?php 

/*
Template Name: Question Feeder

The key to GFDatabase! This is what feeds the questions randomly.
*/

get_header(); ?>

<main id="main" class="site-main" role="main">
    <?php 

    /* If we've submitted questions thus far, pick a random one and display it.
     * Otherwise tell user they haven't created any questions yet.
     */

    // See if we've passed GET parameter ?show-question=true
    // Otherwise show intro screen
    define('SHOW_QUESTION','show-question');
    define('TOPIC','chosen-topic');

    $topic = $_GET[TOPIC];
    define('FEEDER_LINK',question_feeder_permalink());

    if (isset($_GET[SHOW_QUESTION]) && $_GET[SHOW_QUESTION] === '1'){

        if (isset($_GET[TOPIC])) {
            $tax_query = array(
            array(
			'taxonomy' => 'topic',
			'field'    => 'slug',
			'terms'    => $topic,
		    ));
            $args = array ('post_type' => 'gfd_question', 'orderby' => 'rand', 'tax_query' => $tax_query, 'posts_per_page' => '1' );
        }
        else{
            $args = array ('post_type' => 'gfd_question', 'orderby' => 'rand', 'posts_per_page' => '1' );
        }

        $question_query = new WP_Query($args);
        
        if ( is_null($question_query) || !$question_query->have_posts() ){
            if (isset($_GET[TOPIC])) {
                echo "<h2 class=\"text-center\">You have no questions on this topic in your database!</h2>";
            }
            else{
                echo "<h2 class=\"text-center\">You have no questions in your database! Please add some.</h2>";
            }
        } 
        
        while ( $question_query->have_posts() ) : $question_query->the_post(); 
        get_template_part('content-gfd_question');
        ?>

        <?php endwhile; wp_reset_postdata(); 
    }
    // Otherwise, we show intro dialog (unless we enter some invalid input, in which case we show nothing.)
    else{
        if (!isset($_GET[TOPIC]) || (isset($_GET[TOPIC]) && get_term_by('slug',$_GET[TOPIC],'topic'))){
            get_template_part('intro-gfd');
        }
        else{
            echo "<h2 class=\"text-center\">This topic doesn't exist!</h2>";
        }
    }
    ?>
    
</main><!-- .site-main -->

<?php get_footer(); ?>

