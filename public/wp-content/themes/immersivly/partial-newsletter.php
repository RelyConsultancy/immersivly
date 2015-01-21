<?php
/**
 * The header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="content">
 *
 * @package Immersivly
 *
 * Template name: Partial Newsletter
 */
?>

<div class="subscribe-bar">
	<div class="row">
		<div class="small-12 medium-11 large-7 medium-push-1 columns">
			<?php echo do_shortcode( '[mc4wp_form]' ); ?>
		</div>
	</div>
</div>