<?php

require_once('wp-bootstrap-navwalker.php'); // for menu
require_once('gfdquestion-functions.php'); // question post type + hint/answer
require_once('customizer.php'); // theme customization

// Replaces the excerpt "Read More" text by a link
function new_excerpt_more($more) {
	return '...<p><a class="moretopic" href="'. get_permalink() . '"> (Continue)</a></p>';
}
add_filter('excerpt_more', 'new_excerpt_more');

/* Theme setup */

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
    wp_register_script('jquery.bootstrap.min', 'https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js', 'jquery');
    wp_enqueue_script('jquery.bootstrap.min');
}
add_action( 'init', 'wpt_register_js' );

function wpt_register_css() {
    wp_register_style( 'bootstrap.min', 'https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css' );
    wp_enqueue_style( 'bootstrap.min' );
}
add_action( 'wp_enqueue_scripts', 'wpt_register_css' );