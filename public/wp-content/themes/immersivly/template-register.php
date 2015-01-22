<?php
/**
 * Template used for Register page.
 *
 *
 * @package Immersivly
 *
 * Template name: Register
 */


get_header(); ?>

<?php get_sidebar('home'); ?>

<div class="content content--page">
	<div class="row collapse">
		<div class="small-12 columns">
			<main id="main" class="site-main" role="main">

				<?php while ( have_posts() ) : the_post(); ?>

					<?php get_template_part( 'content', 'page' ); ?>

				<?php endwhile; // end of the loop. ?>

				<?php // Register Form ?>
				<div class="row">
					<div class="small-12 medium-10 medium-centered columns">
						<?php echo do_shortcode( '[wp-members page="register"]' ); ?>	
					</div>
				</div>
			</main>
		</div>
	</div>
	<?php get_footer(); ?>
</div>