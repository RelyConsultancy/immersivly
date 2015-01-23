<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after
 *
 * @package Immersivly
 */
?>

<?php /*
	<?php if ( !is_home() ) : ?>
		<footer id="colophon" class="footer gap" role="contentinfo">
			<div class="row">
				<div class="small-12 medium-1 columns">
					<a class="footer__logo" href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a>
				</div>
				<div class="small-12 medium-11 columns">
					<nav class="footer__nav" role="navigation">
						<?php wp_nav_menu( array( 'theme_location' => 'footer' ) ); ?>
					</nav>
				</div>
			</div>
		</footer>
	<?php endif; ?>
*/ ?>
<?php wp_footer(); ?>


<div class="overlay overlay--cover">
	<a href="#" class="overlay__close icon-close"></a>

	<div id="nav" class="overlay__inner">
		<nav class="overlay__nav" role="navigation">
			<?php wp_nav_menu( array( 'theme_location' => 'footer' ) ); ?>
		</nav>
	</div>

	<div id="login" class="overlay__inner">
		<?php get_template_part('partial-login'); ?>
	</div>
</div>

</body>
</html>
