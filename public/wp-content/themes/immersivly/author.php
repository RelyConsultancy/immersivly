<?php
/**
 * The template for displaying authot posts.
 *
 * @package Immersivly
 */

get_header(); ?>

<?php get_sidebar('home'); ?>

	<div class="content content--block">
		<section class="content--highlighted">
			<div class="row">
				<div class="small-12 medium-10 medium-centered columns">
					<?php immersivly_author_box(); ?>
				</div>
			</div>
		</section>
		
		<div class="row collapse">
			<div class="small-12 medium-10 medium-centered columns">
				<main id="main" class="site-main" role="main">

				<?php if ( have_posts() ) : ?>

					<div class="row">
						<div class="small-12 medium-12 columns">
							<h4 class="content--block__subtitle"><?php _e('Recent articles '); ?></h4>
						</div>
					</div>

					<?php /* Start the Loop */ ?>
					<?php while ( have_posts() ) : the_post(); ?>

						<?php
							get_template_part( 'content', 'block' );
						?>

					<?php endwhile; ?>

					<?php immersivly_paging_nav(); ?>

				<?php else : ?>

					<?php get_template_part( 'content', 'none' ); ?>

				<?php endif; ?>

				</main>
			</div>
		</div>
		<?php get_template_part( 'partial-newsletter');?>
		<?php get_footer(); ?>
	</div>

<?php get_sidebar(); ?>

