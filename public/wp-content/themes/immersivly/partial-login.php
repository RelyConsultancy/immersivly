<?php
/**
 * The header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="content">
 *
 * @package Immersivly
 *
 * Partial name: Partial Login
 */
?>
<div class="row">
	<div class="small-12 medium-6 medium-centered columns">
		<!-- 				<form action="#" style="padding-top: 20%;">
					<input type="text" placeholder="Email address">
				</form>
				<?php dynamic_sidebar( 'overlay' ); ?> -->

		<?php echo do_shortcode( '[wp-members page="login"]' ); ?>
	</div>
</div>