<?php
/**
 * The template used for displaying page content in page.php
 *
 * @package Immersivly
 */
?>

<article class="entry" id="post-<?php the_ID(); ?>" <?php post_class(); ?>>


	<div class="row">
		<div class="medium-10 columns medium-centered">
			<header class="entry__header">
				<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
			</header>
		</div>
		<div class="medium-6 medium-offset-1 columns">

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
		<div class="medium-3 medium-pull-1 columns">
			<div class="promo-column">
				<p style="background: gray; padding: 10px; color: #fff;">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ad eveniet quos nobis autem beatae fugit accusantium repellendus pariatur, sunt, reprehenderit eaque corrupti, perspiciatis impedit. Hic placeat magni recusandae, tempora eum?</p>
			</div>
		</div>
	</div>
</article>
