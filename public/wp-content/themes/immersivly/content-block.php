<?php
/**
 * The template used for displaying page content in Tags, Author and block style pages
 *
 * @package Immersivly
 */
?>

<?php $category = get_the_category(); ?>

<div class="small-12 medium-6 large-4 columns">
	<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

		<figure class="thumbnail">
			<ul class="actions no-bullet">
				<li class="categories actions__item">
					<div class="categories__item--<?php echo $category[0]->category_nicename; ?>"><span><?php echo $category[0]->cat_name; ?></span></div>
				</li>
			</ul>
			<a class="effect-opacity" href="<?php the_permalink(); ?>">
				<?php the_post_thumbnail('block'); ?>
			</a>
		</figure>
		
		<div class="entry-content">
			<div class="title">
				<?php if ( get_field('article_short_title') ) : ?>
					<h4 class="title__entry"><a href="<?php the_permalink(); ?>"><?php the_field('article_short_title'); ?></a></h4>
				<?php else : ?>
					<?php the_title( sprintf( '<h4 class="title__entry"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h4>' ); ?>
				<?php endif; ?>

				<p><?php the_excerpt(); ?></p>
			</div>
		</div>
	</article>
</div>