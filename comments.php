<div id="comments" class="comments-area">

	<?php // You can start editing here -- including this comment! ?>

	<?php if ( have_comments() ) : ?>
		<h2 class="comments-title">Comments</h2>
		<br>
		<ul class="list-unstyled">
		    <?php
		        // Register Custom Comment Walker
		        require_once('wp-bootstrap-comment-walker.php');
		
		        wp_list_comments( array(
		            'style'         => 'ul',
		            'short_ping'    => true,
		            'avatar_size'   => '64',
		            'walker'        => new Bootstrap_Comment_Walker(),
		        ) );
		    ?>
		</ul><!-- .comment-list -->

		<?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) : // are there comments to navigate through ?>
		<nav id="comment-nav-below" class="navigation" role="navigation">
			<h1 class="assistive-text section-heading"><?php _e( 'Comment navigation'); ?></h1>
			<div class="nav-previous"><?php previous_comments_link( __( '&larr; Older Comments') ); ?></div>
			<div class="nav-next"><?php next_comments_link( __( 'Newer Comments &rarr;') ); ?></div>
		</nav>
		<?php endif; // check for comment navigation ?>

		<?php
		/* If there are no comments and comments are closed, let's leave a note.
		 * But we only want the note on posts and pages that had comments in the first place.
		 */
		if ( ! comments_open() && get_comments_number() ) :
		?>
		<p class="nocomments"><?php _e( 'Comments are closed.'); ?></p>
		<?php endif; ?>

	<?php endif; // have_comments() ?>

	<?php comment_form(); ?>

</div><!-- #comments .comments-area -->