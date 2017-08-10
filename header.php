<!DOCTYPE html>
<html lang="en">
<head>

  <!-- Basic Page Needs
  –––––––––––––––––––––––––––––––––––––––––––––––––– -->
	<meta charset="utf-8">
	<title><?php wp_title('|',true,'right'); ?><?php bloginfo('name'); ?></title>
  	<meta name="description" content="<?php bloginfo('description'); ?>">
	  <meta name="author" content="Ben Mayersohn">
	

  	<?php 
	  define("TEMPLATE_DIR",get_template_directory_uri());
	  include('default_theme_vals.php');
	?>

	<!-- Mobile Specific Metas
	–––––––––––––––––––––––––––––––––––––––––––––––––– -->
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<!-- FONT
	–––––––––––––––––––––––––––––––––––––––––––––––––– -->
	<link href="https://fonts.googleapis.com/css?family=Raleway" rel="stylesheet" type="text/css">

	<!-- CSS
	–––––––––––––––––––––––––––––––––––––––––––––––––– -->
	<link rel="stylesheet" href="<?php echo TEMPLATE_DIR; ?>/assets/css/normalize.css">
	<link rel="stylesheet" href="<?php echo TEMPLATE_DIR; ?>/style.css">

	<!-- These style values are set in WordPress customizer -->
	<?php 
	echo "<style>
	#main-menu>.nav>li>a:focus, #main-menu>.nav>li>a:hover {
		background-color: " . get_theme_mod('essentials_navbar_bg',NAVBAR_BG_DEFAULT) . ";
		color: " . get_theme_mod('essentials_navbar_text_active',NAVBAR_TEXT_ACTIVE) . ";
	}
	#main-menu>.nav>.active>a{
  		background-color: " . get_theme_mod('essentials_body_bg',BODY_BACKGROUND) . ";
	}
	#main-menu{
		background-color: " . get_theme_mod('essentials_body_bg',BODY_BACKGROUND) . ";
	}
	#main-menu>ul>li>a{
    color: " . get_theme_mod('essentials_navbar_text',NAVBAR_TEXT) . ";
	}
	#dropdown-button{
    border-color: " . get_theme_mod('essentials_navbar_mobile_color',NAVBAR_MOBILE_DEFAULT) . ";
	background-color: " . get_theme_mod('essentials_body_bg',BODY_BACKGROUND) . ";
	}"
	;

	if (get_theme_mod('essentials_body_header_bg_img') != ''){
		echo ".pre-nav{
		background-color: transparent;
		background-image: url('" . get_theme_mod('essentials_body_header_bg_img') . "');}";
	}
	elseif (get_theme_mod('essentials_body_header_bg_color') != ''){
		echo ".pre-nav{
			background-color: " . get_theme_mod('essentials_body_header_bg_color',BODY_BACKGROUND) . ";}";
	}
	echo "</style>";
	?>

	<!-- Scripts
	–––––––––––––––––––––––––––––––––––––––––––––––––– -->
	<script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mathjax/2.7.1/MathJax.js?config=TeX-AMS-MML_HTMLorMML"></script>
    
    <?php wp_head();?>
</head>
<body style=
"<?php echo "background-color: " . get_theme_mod('essentials_body_bg',BODY_BACKGROUND);?>;
color:<?php echo get_theme_mod('essentials_body_text_color',BODY_TEXT_COLOR);?>;">

	<!-- Primary Page Layout
	–––––––––––––––––––––––––––––––––––––––––––––––––– -->

		<section class="header">
			<div class="pre-nav">
			<a href="<?php echo get_site_url(); ?>">
			<img id="title-img" class="img-responsive" alt="" src="<?php header_image(); ?>">
			</a>
			<h1 class="main-subtitle" style="background-color:<?php echo get_theme_mod('essentials_subtitle_bg',SUBTITLE_BG_DEFAULT); ?>"><?php echo get_theme_mod('essentials_subtitle_text',SUBTITLE_TEXT_DEFAULT); ?></h1>
			</div>
			<div class="navbar-before"></div>
			
			<div id="dropdown-button" class="navbar-header">
				<a class="navbar-toggle collapsed btn btn-navbar" style="color:<?php echo get_theme_mod('essentials_navbar_mobile_color',NAVBAR_MOBILE_DEFAULT);?>;" data-toggle="collapse" data-target="#main-menu">
					<span class="glyphicon glyphicon-menu-hamburger"></span>
				</a>
				<div class="mobile-indicator"></div>
			</div>

			<?php
			wp_nav_menu( array(
							'menu'              => 'primary',
							'theme_location'    => 'primary',
							'container'         => 'div',
							'container_class'   => 'navbar-inner navbar-collapse collapse',
							'container_id'      => 'main-menu',
							'menu_class'        => 'nav nav-pills nav-justified',
							'fallback_cb'       => 'WP_Bootstrap_Navwalker::fallback',
							'walker'            => new WP_Bootstrap_Navwalker())
						);
			?>
		</section>
		<hr class="non-mobile-separator">
		<div class="container">
	