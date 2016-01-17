<?php
/**
 * The template for displaying all single posts.
 *
 * @package Immersivly
 */

get_header(); ?>


<?php get_sidebar('home'); ?>
<div class="content">
	<div class="row collapse">
		<div class="small-12 columns">
			<main id="main" class="site-main" role="main">
				<?php while ( have_posts() ) : the_post(); ?>

					<?php get_template_part( 'content', 'single' ); ?>

					<div class="gap">
						<div class="row collapse">
							<div class="small-12 medium-10 medium-centered columns">
								<div class="row">
									<div class="small-12 medium-6 columns">
										<?php
											// TODO: Refactor under ./inc/template-tags.php

											$tags = get_tags();
											$html = '<ul class="tags no-bullet">';
											foreach ( $tags as $tag ) {
												$tag_link = get_tag_link( $tag->term_id );
														
												$html .= "<li class=\"tags__item\"><a href='{$tag_link}' title='{$tag->name} Tag' class='{$tag->slug}'>";
												$html .= "{$tag->name}</a></li>";
											}
											$html .= '</ul>';
											echo $html;
										?>
									</div>
									<div class="small-12 medium-6 columns">
										
										<ul class="social social--dark social--right no-bullet">
											<?php immersivly_social_media_buttons(); ?>
										</ul>
									</div>
								</div>
							</div>
						</div>
					</div>
				<?php endwhile; ?>


				<div class="gap">
					<div class="row">
						<div class="small-12 medium-10 medium-centered columns">
							<?php immersivly_author_box(); ?>
						</div>
					</div>

					<?php if ( count(wp_get_object_terms( $post->ID, 'stories')) != 0 ) : ?>

					<div class="row">
						<div class="small-12 medium-10 medium-centered columns">
							<?php
								$tax = 'stories';
								$tax_terms = get_terms( $tax, 'orderby=name&order=ASC' );


								if ( $tax_terms ) {
									foreach ( $tax_terms as $tax_term ) {
										$args = array(
											'post_type'             => $post_type,
											$tax                 	=> $tax_term->slug,
											'post_status'           => 'publish',
											'posts_per_page'        => -1
										);

										$stories = new WP_Query($args);
									}
								}

								$categories = get_the_category();
								$current_category = $categories[0]->category_nicename;
							?>

							<section class="story story--<?php echo $current_category; ?>" style="background-image:url(<?php echo z_taxonomy_image_url($tax_term->term_id); ?>);">
								<?php if ( $stories->have_posts() ) : ?>
									<div class="row collapse">
										<div class="small-12 medium-3 columns">
											<div class="vac">
												<div class="vac__content">
													<!-- <h3 class="story__title"><?php _e( $tax_term->name, 'immersivly' ) ?></h3> -->
													<h3 class="story__title">Story<br>timeline</h3>
												</div>
											</div>
										</div>
										
										<div class="small-12 medium-9 columns">
											<ul class="story__list js-stories no-bullet">

											<?php while ( $stories->have_posts() ) : $stories->the_post(); ?>

												
												<li class="story__item">
													<!--<h3><a href="<?php echo esc_url( get_permalink() ); ?>"><?php the_field('article_short_title'); ?></a></h3>-->
													<?php the_title( sprintf( '<h3 class=""><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h3>' ); ?>
												</li>
												

											<?php endwhile; ?>

											</ul>
										</div>
									</div>
								<?php endif; ?>
							</section>
						</div>
					</div>

					<?php endif; ?>

					<section class="content--highlighted">
						<div class="row">
							<div class="small-12 medium-10 medium-centered columns">
								<?php
									// If comments are open or we have at least one comment, load up the comment template
									if ( comments_open() || get_comments_number() ) :
										comments_template();
									endif;
								?>
							</div>
						</div>
					</section>

					<?php // immersivly_post_nav(); ?>


					<div class="row">
						<div class="small-12 medium-10 medium-centered columns">
							<aside class="secondary-articles secondary-articles--bottom">
								<h4 class="secondary-articles__headline"><?php _e('Most read articles') ?></h4>
								<?php
									if (function_exists('wpp_get_mostpopular')) {
										wpp_get_mostpopular("post_type=post&range=all&limit=4&stats_category=1");
									}
								?>
							</aside>
						</div>
					</div>
				</div>
				<?php // get_template_part( 'partial-newsletter');?>
			</main>
		</div>
	</div>
	<?php get_footer(); ?>
</div>