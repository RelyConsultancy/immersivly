<?php
/**
 * The template used for displaying page content in Homepage
 *
 * @package Immersivly
 */
?>

<?php $category = get_the_category(); ?>
<?php include_once(IMM_BASE_PATH . '/inc/helpers.php'); ?>
<?php $shares = immersivly_get_the_number_of_shares($post->ID); ?>

<div class="item transition small-12 medium-6 large-4 columns <?php echo $category[0]->category_nicename; ?>" data-value="<?php echo get_the_ID(); ?> ">
	<article class="effect-milo" id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
		<ul class="actions no-bullet">
			<li class="categories actions__item">
				<div class="categories__item--<?php echo $category[0]->category_nicename; ?>"><span><?php echo $category[0]->cat_name; ?></span></div>
			</li>
			<li class="actions__item actions--more">
				<ul class="no-bullet">
					<li class="actions__item">
				<span class="actions--shares"><i class="icon-heart"></i><?php print $shares; ?></span>
			</li>
			<li class="actions__item">
				<span class="actions--eta"><i class="icon-time"></i> <?php post_read_time(); ?></span>
			</li>
			<li class="actions__item">
				<span class="actions--comments"><i class="icon-comment"></i> <?php comments_number( 0, 1, '%' ); ?></span>
			</li>
				</ul>
			</li>
		</ul>

		<?php the_post_thumbnail(); ?>
		<!-- <header class="entry-header">
			<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
		</header> -->
		<div class="title">
			<?php if ( get_field('featured') ) : ?>
				<p class="trending-badge icon-trending"><?php _e('Trending'); ?></p>
			<?php endif; ?>
			<?php if ( get_field('article_short_title') ) : ?>
				<h2 class="title__entry"><?php the_field('article_short_title'); ?></h2>
			<?php else : ?>
				<?php the_title( '<h2 class="title__entry">', '</h2>' ); ?>
			<?php endif; ?>

			<p><?php the_excerpt(); ?></p>
		</div>

		<a href="<?php the_permalink(); ?>"></a>
	</article>
</div>