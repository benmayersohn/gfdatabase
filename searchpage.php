<?php
/*
Template Name: Search Page
*/
?>
<?php

// We'll mainly use this page to display search results, 
// but you can also query from here.

get_header(); ?>


<div class="wrap">
	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

			<?php get_search_form(); ?>

		</main><!-- #main -->
	</div><!-- #primary -->
</div><!-- .wrap -->

<?php get_footer();