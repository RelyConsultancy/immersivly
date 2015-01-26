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

        <div class="access-form login-form">
            <div class="login-box">
                <div class="text-center">
                    <a href="/" class="logo">immersiv.ly</a>
                </div>
                <h4 class="text-center">Sign in to your account</h4>
                <?php echo do_shortcode( '[wp-members page="login"]' ); ?>
            </div>
            <div class="password-box">
                <div class="text-center">
                    <a href="#" class="forgot-pass">Forgot password?</a>
                </div>
                <?php echo do_shortcode( '[wp-members page="password"]' ); ?>
            </div>
            <div class="no-account">
                Don't have an account yet? <a href="/register">Sign up</a>
            </div>
        </div>
	</div>
</div>