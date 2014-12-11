<?php
/**
 * The template used for displaying page content in page.php
 *
 * @package Immersivly
 */
?>

<article class="entry" id="post-<?php the_ID(); ?>" <?php post_class(); ?>>


	<div class="row">
		<div class="small-12 medium-10 medium-centered columns">
			<header class="entry__header">
				<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
			</header>

			<div class="entry__content">
				<div class="entry__excerpt"><?php the_excerpt(); ?></div>
				<?php the_content(); ?>
				<?php
					wp_link_pages( array(
						'before' => '<div class="page-links">' . __( 'Pages:', 'immersivly' ),
						'after'  => '</div>',
					) );
				?>
			</div>

			<footer class="entry__footer">
				<?php edit_post_link( __( 'Edit', 'immersivly' ), '<span class="edit-link">', '</span>' ); ?>
			</footer><!-- .entry-footer -->
		</div>
	</div>
</article>
