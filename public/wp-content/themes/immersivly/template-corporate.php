<?php
/**
 * Displays our Corporate Info.
 *
 * @package Immersivly
 *
 * Template name: Corporate
 */

get_header(); ?>

<?php get_sidebar('home'); ?>

<div class="content content--page corporate--page">
	<div class="row collapse">
		<div class="small-12 columns">
			<main id="main" class="site-main" role="main">

				<?php while ( have_posts() ) : the_post(); ?>

					<article class="entry" id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

						<section class="content--highlighted">
							<div class="row">
								<div class="small-12 medium-10 medium-centered columns">
									<section class="author-box--page">
										<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
										<div class="entry__excerpt">
											<?php the_excerpt(); ?>
										</div>
									</section>
								</div>
							</div>
						</section>

						<div class="row">
							<div class="small-12 medium-10 medium-centered columns">

								<div class="entry__content">
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

				<?php endwhile; // end of the loop. ?>

			</main>
		</div>
	</div>
	<?php get_template_part( 'partial-newsletter');?>
	<?php get_footer(); ?>
</div>
