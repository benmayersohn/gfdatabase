<?php
/* CUSTOMIZE */

include('default_theme_vals.php');

// Credits to: https://wptheming.com/2015/07/customizer-control-arbitrary-html/
if ( class_exists( 'WP_Customize_Control' ) && ! class_exists( 'Prefix_Custom_Content' ) ) :
class Prefix_Custom_Content extends WP_Customize_Control {

	// Whitelist content parameter
	public $content = '';

	/**
	 * Render the control's content.
	 *
	 * Allows the content to be overriden without having to rewrite the wrapper.
	 *
	 * @since   1.0.0
	 * @return  void
	 */
	public function render_content() {
		if ( isset( $this->label ) ) {
			echo '<span class="customize-control-title">' . $this->label . '</span>';
		}
		if ( isset( $this->content ) ) {
			echo $this->content;
		}
		if ( isset( $this->description ) ) {
			echo '<span class="description customize-control-description">' . $this->description . '</span>';
		}
	}
}
endif;

function my_customize_register() {     
	global $wp_customize;
	$wp_customize->remove_section( 'colors' ); // get rid of default color customizing
	$wp_customize->remove_section( 'static_front_page' ); // we only have one option for this theme

	$wp_customize->add_panel( 'essentials', array(
    'priority'       => 5,
    'capability'     => 'edit_theme_options',
    'theme_supports' => '',
    'title'          => __('Essentials'),
    'description'    => 'Site subtitle, home page, question intro, etc.',
	) );

	$wp_customize->add_section( 'essentials_subtitle_sec', array(
    'title'          => __('Subtitle'),
    'priority'      => 45,
	'panel' 		=> 'essentials',
	) );

	$wp_customize->add_section( 'essentials_body', array(
    'title'          => __('Body'),
    'priority'      => 35,
	'panel' 		=> 'essentials',
	) );

    $wp_customize->add_section( 'essentials_intro', array(
    'title'          => __('Intro'),
    'priority'      => 65,
	'panel' 		=> 'essentials',
	) );

	$wp_customize->add_section( 'essentials_navbar', array(
    'title'          => __('Navigation Bar'),
    'priority'      => 55,
	'panel' 		=> 'essentials',
	) );

	$wp_customize->add_section( 'essentials_footer', array(
    'title'          => __('Footer'),
    'priority'      => 75,
	'panel' 		=> 'essentials',
	) );

	$wp_customize->add_setting( 'essentials_body_bg', array(
	'default' => BODY_BACKGROUND,
	'type' => 'theme_mod',
	'capability' => 'edit_theme_options',
	'transport' => '',
	) );

	$wp_customize->add_control(new WP_Customize_Color_Control( 
	$wp_customize, 
	'body_bg', 
	array(
		'label'      => __( 'Background Color'),
		'section'    => 'essentials_body',
		'settings'   => 'essentials_body_bg',
	)));

	$wp_customize->add_setting( 'essentials_body_text_color', array(
	'default' => BODY_TEXT_COLOR,
	'type' => 'theme_mod',
	'capability' => 'edit_theme_options',
	'transport' => '',
	) );

	$wp_customize->add_control(new WP_Customize_Color_Control( 
	$wp_customize, 
	'body_text_color', 
	array(
		'label'      => __( 'Text Color'),
		'section'    => 'essentials_body',
		'settings'   => 'essentials_body_text_color',
	)));

	$wp_customize->add_setting( 'essentials_subtitle_text', array(
	'default' => SUBTITLE_TEXT_DEFAULT,
	'type' => 'theme_mod',
	'capability' => 'edit_theme_options',
	'transport' => '',
	'sanitize_callback' => 'sanitize_text',
	) );

	$wp_customize->add_control( 'essentials_subtitle_text', array(
    'type' => 'textarea',
    'section' => 'essentials_subtitle_sec',
    'label' => __('Subtitle'),
    'description' => __('Use HTML to change font weight, color, etc.'),
	) );

    $wp_customize->add_setting( 'essentials_subtitle_bg', array(
	'default' => SUBTITLE_BG_DEFAULT,
	'type' => 'theme_mod',
	'capability' => 'edit_theme_options',
	'transport' => '',
	) );

	$wp_customize->add_control(new WP_Customize_Color_Control( 
	$wp_customize, 
	'subtitle_bg_color', 
	array(
		'label'      => __( 'Background Color'),
		'section'    => 'essentials_subtitle_sec',
		'settings'   => 'essentials_subtitle_bg',
	)));

	/* INTRO */

    $wp_customize->add_setting( 'essentials_heading', array(
	'default' => ESS_HEADING,
	'type' => 'theme_mod',
	'capability' => 'edit_theme_options',
	'transport' => '',
	'sanitize_callback' => 'sanitize_text',
	) );

    $wp_customize->add_control( 'essentials_heading', array(
    'type' => 'text',
    'section' => 'essentials_intro',
    'label' => __('Heading'),
    'description' => __('Main Heading'),
	) );

    $wp_customize->add_setting( 'essentials_desc', array(
	'default' => ESS_DESCRIPTION,
	'type' => 'theme_mod',
	'capability' => 'edit_theme_options',
	'transport' => '',
	'sanitize_callback' => 'sanitize_text',
	) );

    $wp_customize->add_control( 'essentials_desc', array(
    'type' => 'textarea',
    'section' => 'essentials_intro',
    'label' => __('Description'),
    'description' => __('Main Intro Description (HTML allowed)'),
	) );

    $wp_customize->add_setting( 'essentials_ready', array(
	'default' => ESS_READY,
	'type' => 'theme_mod',
	'capability' => 'edit_theme_options',
	'transport' => '',
	'sanitize_callback' => 'sanitize_text',
	) );

    $wp_customize->add_control( 'essentials_ready', array(
    'type' => 'text',
    'section' => 'essentials_intro',
    'label' => __('Ready?'),
    'description' => __('Optional prompt to pump people up.'),
	) );

	/* NAVBAR */
	$wp_customize->add_setting( 'essentials_navbar_text', array(
	'default' => NAVBAR_TEXT,
	'type' => 'theme_mod',
	'capability' => 'edit_theme_options',
	'transport' => '',
	) );

	$wp_customize->add_control(new WP_Customize_Color_Control( 
	$wp_customize, 
	'nav_text_color', 
	array(
		'label'      => __( 'Text Color'),
		'section'    => 'essentials_navbar',
		'settings'   => 'essentials_navbar_text',
	)));

	$wp_customize->add_setting( 'essentials_navbar_text_active', array(
	'default' => NAVBAR_TEXT_ACTIVE,
	'type' => 'theme_mod',
	'capability' => 'edit_theme_options',
	'transport' => '',
	) );

	$wp_customize->add_control(new WP_Customize_Color_Control( 
	$wp_customize, 
	'nav_text_active_color', 
	array(
		'label'      => __( 'Hover (Mouse-Over) Text Color'),
		'section'    => 'essentials_navbar',
		'settings'   => 'essentials_navbar_text_active',
	)));

	$wp_customize->add_setting( 'essentials_navbar_bg', array(
	'default' => NAVBAR_BG_DEFAULT,
	'type' => 'theme_mod',
	'capability' => 'edit_theme_options',
	'transport' => '',
	) );

	$wp_customize->add_control(new WP_Customize_Color_Control( 
	$wp_customize, 
	'nav_bg_color', 
	array(
		'label'      => __( 'Hover (Mouse-Over) Background Color'),
		'section'    => 'essentials_navbar',
		'settings'   => 'essentials_navbar_bg',
	)));

	$wp_customize->add_setting( 'essentials_navbar_mobile_color', array(
	'default' => NAVBAR_MOBILE_DEFAULT,
	'type' => 'theme_mod',
	'capability' => 'edit_theme_options',
	'transport' => '',
	) );

	$wp_customize->add_control(new WP_Customize_Color_Control( 
	$wp_customize, 
	'nav_mobile_color', 
	array(
		'label'      => __( 'Mobile Menu Color (of Button and Borders)'),
		'section'    => 'essentials_navbar',
		'settings'   => 'essentials_navbar_mobile_color',
	)));

	/* FOOTER */

	$wp_customize->add_setting( 'essentials_footer_text', array(
	'default' => FOOTER_TEXT,
	'type' => 'theme_mod',
	'capability' => 'edit_theme_options',
	'transport' => '',
	'sanitize_callback' => 'sanitize_text',
	) );

	$wp_customize->add_control( 'essentials_footer_text', array(
    'type' => 'text',
    'section' => 'essentials_footer',
    'label' => __('Footer Text'),
    'description' => __('Footer Text'),
	) );

	$wp_customize->add_setting( 'essentials_footer_text_color', array(
	'default' => FOOTER_TEXT_COLOR,
	'type' => 'theme_mod',
	'capability' => 'edit_theme_options',
	'transport' => '',
	) );

	$wp_customize->add_control(new WP_Customize_Color_Control( 
	$wp_customize, 
	'footer_text_color', 
	array(
		'label'      => __( 'Footer Text Color'),
		'section'    => 'essentials_footer',
		'settings'   => 'essentials_footer_text_color',
	)));

	$wp_customize->add_setting( 'essentials_footer_bg', array(
	'default' => FOOTER_BG_COLOR,
	'type' => 'theme_mod',
	'capability' => 'edit_theme_options',
	'transport' => '',
	) );

	$wp_customize->add_control(new WP_Customize_Color_Control( 
	$wp_customize, 
	'footer_bg', 
	array(
		'label'      => __( 'Footer Background Color'),
		'section'    => 'essentials_footer',
		'settings'   => 'essentials_footer_bg',
	)));

} 

add_action( 'customize_register', 'my_customize_register');

/* You can add any HTML that you can add to a blog post. It's safe! */
function sanitize_text($text){
    return wp_kses_post($text);
}