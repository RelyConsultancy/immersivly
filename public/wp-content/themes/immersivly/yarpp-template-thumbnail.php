<?php
/*
YARPP Template: Thumbnails
Description: Requires a theme which supports post thumbnails
Author: mitcho (Michael Yoshitaka Erlewine)
*/ ?>

<?php $category = get_the_category(); ?>

<div class="secondary-articles">
	<h4 class="secondary-articles__headline"><?php _e('Related articles') ?></h4>
	<?php if (have_posts()):?>
	<ul class="no-bullet">
		<?php while (have_posts()) : the_post(); ?>
			<?php if ( has_post_thumbnail() ) : ?>
			<li class="secondary-articles__item">
				<figure class="thumbnail">
					<ul class="actions no-bullet">
						<li class="categories actions__item">
							<div class="categories__item--<?php echo $category[0]->category_nicename; ?>"><span><?php echo $category[0]->cat_name; ?></span></div>
						</li>
					</ul>
					<?php  
						$attr = array(
							'alt'   => trim( strip_tags( get_the_excerpt() ) ),
							'title' => trim( strip_tags( get_the_title() ) ),
						);
					?>
					<a class="effect-opacity" href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title_attribute(); ?>"><?php the_post_thumbnail( 'popular', $attr ); ?></a>
				</figure>

				<?php the_title( sprintf( '<h6 class="secondary-articles__title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h6>' ); ?>
			</li>
			<?php endif; ?>
		<?php endwhile; ?>
	</ul>

	<?php else : ?>
	<p><?php _e('No related articles.') ?></p>
	<?php endif; ?>
</div>