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

<div class="content content--page">
	<div class="row collapse">
		<div class="small-12 columns">
			<main id="main" class="site-main" role="main">

				<?php while ( have_posts() ) : the_post(); ?>

					<?php get_template_part( 'content', 'page' ); ?>

				<?php endwhile; // end of the loop. ?>

			</main>
		</div>
	</div>
	<?php get_template_part( 'partial-newsletter');?>
	<?php get_footer(); ?>
</div>
