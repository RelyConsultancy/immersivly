<?php
/**
 * The template for displaying category posts.
 *
 * @package Immersivly
 */

get_header(); ?>

<?php get_sidebar('home'); ?>

	<div class="content content--block">
		<div class="row collapse">
			<div class="small-12 medium-10 medium-centered columns">
				<main id="main" class="site-main" role="main">

				<?php if ( have_posts() ) : ?>

					<div class="row">
						<div class="small-12 medium-12 columns">
							<header class="content__header">
								<h1 class="content--block__title"><?php single_tag_title(); ?></h1>
							</header><!-- .page-header -->

							<h4 class="content--block__subtitle"><?php _e('Recent articles '); ?></h4>
						</div>
					</div>

					<?php /* Start the Loop */ ?>
					<?php while ( have_posts() ) : the_post(); ?>

						<?php
						/**
						 * Run the loop for the search to output the results.
						 * If you want to overload this in a child theme then include a file
						 * called content-search.php and that will be used instead.
						 */
						get_template_part( 'content', 'block' );
						?>

					<?php endwhile; ?>

					<?php immersivly_numeric_posts_nav(); ?>

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
