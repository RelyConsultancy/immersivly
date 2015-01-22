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
                <div class="row">
                    <div class="small-12 large-6 large-offset-1 columns">
                        <header class="entry__header">
                            <?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
                        </header>

                        <div class="entry__excerpt">
                            <?php while ( have_posts() ) : the_post(); ?>
                                <?php the_content(); ?>
                            <?php endwhile; // end of the loop. ?>
                        </div>

                        <?php // Register Form ?>
                        <div class="access-form register-form">
                        	<?php echo do_shortcode( '[wp-members page="register"]' ); ?>
                        </div>
                    </div>
                </div>
            </main>
        </div>
    </div>
    <?php get_footer(); ?>
</div>