<?php
/**
 * The header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="content">
 *
 * @package Immersivly
 *
 * Template name: Homepage
 */

get_header(); ?>


<?php get_sidebar('home'); ?>

<div class="content">
	<div class="row collapse">

		<?php query_posts( 'posts_per_page=999' ); ?>
		<?php //do_action('columnpost'); ?>

		<div class="isotope">
			<?php if (have_posts()) :
				$i = 0; // counter
				while ( have_posts()) : the_post();
					if ( $i % 6 == 0) { ?>
					<section class="section">
					<?php } ?>
						
						<?php 
							// Grab content here
							get_template_part( 'content', 'home' ); 
						?>

					<?php $i++;
					if ( $i % 6 == 0 ) { // if counter is multiple of 3, put an closing div ?>
					</section>
					<?php } ?>

				<?php endwhile; ?>
					<?php
					if ( $i % 6 != 0 ) { ?>
					</section>
					<?php } ?>

			<?php endif; ?>
		</div>

	</div>
</div>
<?php get_template_part( 'partial-newsletter');?>
<?php get_footer(); ?>