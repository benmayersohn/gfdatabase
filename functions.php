<?php

require_once('wp-bootstrap-navwalker.php'); // for menu
require_once('question-functions.php'); // question post type + hint/answer
require_once('customizer.php'); // theme customization
require_once('default_theme_vals.php');

//Exclude pages from WordPress Search
if (!is_admin()) {
function wpb_search_filter($query) {
if ($query->is_search) {
$query->set('post_type', 'post');
}
return $query;
}
add_filter('pre_get_posts','wpb_search_filter');
}

function custom_theme_setup() {
    add_theme_support( 'html5', array( 'comment-list' ) );
}
add_action( 'after_setup_theme', 'custom_theme_setup' );

// Get permalink for question feeder
// either home or separate question feeder page
function question_feeder_permalink(){
	$args = array(
		'post_type'  => 'page', 
		'post_status' => 'publish',
		'meta_query' => array( 
			array(
				'key'   => '_wp_page_template', 
				'value' => 'question-feeder.php',
			)
		)
	);
	$query = new WP_Query( $args );

	/* This should only happen ONCE. Only one question feeder per website. */
	if ( $query->have_posts() ) {
		while ( $query->have_posts() ) {
			$query->the_post();
			$link = get_the_permalink();
		}
		wp_reset_query();
	}
	/* ...unless we don't create one. In this case, just get home url (default) */
	else{
		$link = get_home_url();
	}

	return $link;
}

defined('FEEDER_LINK') or define('FEEDER_LINK', question_feeder_permalink());

function wp_42573_fix_template_caching( WP_Screen $current_screen ) {
	// Only flush the file cache with each request to post list table, edit post screen, or theme editor.
	if ( ! in_array( $current_screen->base, array( 'post', 'edit', 'theme-editor' ), true ) ) {
		return;
	}
	$theme = wp_get_theme();
	if ( ! $theme ) {
		return;
	}
	$cache_hash = md5( $theme->get_theme_root() . '/' . $theme->get_stylesheet() );
	$label = sanitize_key( 'files_' . $cache_hash . '-' . $theme->get( 'Version' ) );
	$transient_key = substr( $label, 0, 29 ) . md5( $label );
	delete_transient( $transient_key );
}
add_action( 'current_screen', 'wp_42573_fix_template_caching' );

add_theme_support( 'post-thumbnails' );

// Replaces the excerpt "Read More" text by a link
function new_excerpt_more($more) {
	return '...<p><a class="moretopic" href="'. get_permalink() . '"> (Continue)</a></p>';
}
add_filter('excerpt_more', 'new_excerpt_more');

/* Theme setup */

function get_num_questions($terms){
	$count = 0;
	foreach ($terms as $term){
		$count = $count + ($term->count);
	}
	return $count;
}

/* Images */
$args = array(
	'flex-width'    => true,
	'flex-height'    => true,
	'width'         => 0,
	'height'        => 0,
	'default-image' => get_template_directory_uri() . '/assets/images/gfdatabase.png',
	'uploads'       => true,
);
add_theme_support( 'custom-header', $args );

add_action( 'after_setup_theme', 'wpt_setup' );
    if ( ! function_exists( 'wpt_setup' ) ){
		function wpt_setup() {  
			register_nav_menu( 'primary', __( 'Primary navigation') );
		}
	}


function wpt_register_js() {
    wp_register_script('jquery.bootstrap.min', 'https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js', array('jquery'));
    wp_enqueue_script('jquery.bootstrap.min');
    
    wp_register_script('scroll-top', TEMPLATE_DIR . '/assets/js/scroll-top.js', array('jquery'));
    wp_enqueue_script('scroll-top');
    
    // Only include MathJax and the question javascript when the post type is a question
    if (get_post_type() === 'question' || get_post_meta( get_the_ID(), '_wp_page_template', true ) === 'question-feeder.php'){
    	wp_register_script('mathjax', 'https://cdnjs.cloudflare.com/ajax/libs/mathjax/2.7.1/MathJax.js?config=TeX-AMS-MML_HTMLorMML');
    	wp_enqueue_script('mathjax');
    
	wp_register_script('question', TEMPLATE_DIR . '/assets/js/question.js', array('jquery'));
    	wp_enqueue_script('question');
    }
}
add_action( 'wp_enqueue_scripts', 'wpt_register_js' );

function wpt_register_css() {
    wp_register_style( 'bootstrap.min', 'https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css' );
    wp_enqueue_style( 'bootstrap.min' );
    
    wp_register_style('font-awesome', 'https://maxcdn.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css');
    wp_enqueue_style('font-awesome');
    
    wp_register_style('normalize', TEMPLATE_DIR . '/assets/css/normalize.css');
    wp_enqueue_style('normalize');
    
    wp_enqueue_style( 'parent-style', TEMPLATE_DIR . '/style.css');
    if (TEMPLATE_DIR !== STYLESHEET_DIR){
    wp_enqueue_style( 'child-style', STYLESHEET_DIR . '/style.css', array( 'parent-style' ) );
    }
}
add_action( 'wp_enqueue_scripts', 'wpt_register_css' );