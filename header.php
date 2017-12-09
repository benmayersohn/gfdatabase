<!DOCTYPE html>
<html lang="en">
<head>

  <!-- Basic Page Needs
  –––––––––––––––––––––––––––––––––––––––––––––––––– -->
	<meta charset="utf-8">
	<title><?php wp_title('|',true,'right'); ?></title>
  	<meta name="description" content="<?php bloginfo('description'); ?>">
	  <meta name="author" content="Ben Mayersohn">
	

  	<?php 
	  require_once('default_theme_vals.php');
	  
	  // Add transparency to arrow background color
	  $hex = get_theme_mod('essentials_scrollup_bg',SCROLLUP_BG_COLOR);
	  list($r, $g, $b) = sscanf($hex, "#%02x%02x%02x");
	  $arrow_bg = "rgba($r, $g, $b, " . SCROLLUP_BG_OPACITY . ")";
	?>

	<!-- Mobile Specific Metas
	–––––––––––––––––––––––––––––––––––––––––––––––––– -->
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<!-- FONT
	–––––––––––––––––––––––––––––––––––––––––––––––––– -->
	<link href="https://fonts.googleapis.com/css?family=Raleway" rel="stylesheet" type="text/css">


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
	}
	.scroll-up-button{
	background-color: " . $arrow_bg . ";
	color: " . get_theme_mod('essentials_scrollup_color',SCROLLUP_ARROW_COLOR) . ";
	}
	a.scroll-up-button:visited,a.scroll-up-button:hover{
	color: " . get_theme_mod('essentials_scrollup_color',SCROLLUP_ARROW_COLOR) . ";
	}"
	;

	$featured_img_url = get_the_post_thumbnail_url(get_the_ID(),'full');
	if ( $featured_img_url && !is_home()) {
		echo ".pre-nav{
		background-color: transparent;
		background-image: url('" . $featured_img_url . "');}";
	}
	else{
		if (get_theme_mod('essentials_body_header_bg_img') != ''){
			echo ".pre-nav{
			background-color: transparent;
			background-image: url('" . get_theme_mod('essentials_body_header_bg_img') . "');}";
		}
		elseif (get_theme_mod('essentials_body_header_bg_color') != ''){
			echo ".pre-nav{
				background-color: " . get_theme_mod('essentials_body_header_bg_color',BODY_BACKGROUND) . ";}";
		}
	}
	echo "</style>";
	?>
    
    <?php wp_head();?>
</head>
<body data-spy="scroll" style=
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

			<a class="scroll-up-button">
        	<i class="fa fa-arrow-up fa-lg" aria-hidden="true"></i>
    		</a>
			
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
	