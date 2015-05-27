<?php
/**
 * @package Immersivly
 */
?>

<?php $category = get_the_category(); ?>
<?php $user_ID = get_current_user_id(); ?>
<?php $current_url = $_SERVER['REQUEST_URI']; ?>
<?php include_once(IMM_BASE_PATH . '/inc/helpers.php'); ?>
<?php $shares = immersivly_get_the_number_of_shares($post->ID); ?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="hero" style="background-image: url(<?php echo wp_get_attachment_url( get_post_thumbnail_id( $post->ID ) ); ?>);">

		<div class="row">
			<div class="small-12 medium-8 large-6 medium-push-1 columns">
				<ul class="actions no-bullet">
					<li class="categories actions__item">
						<div class="categories__item--<?php echo $category[0]->category_nicename; ?>"><span><?php echo $category[0]->cat_name; ?></span></div>
					</li>
					<li class="actions__item">
						<span class="actions--shares"><i class="icon-heart"></i> <span class="js-count"><?php print $shares; ?></span></span>
					</li>
					<li class="actions__item">
						<span class="actions--eta"><i class="icon-time"></i> <?php post_read_time(); ?></span>
					</li>
					<li class="actions__item">
						<span class="actions--comments"><i class="icon-comment"></i> <?php comments_number( 0, 1, '%' ); ?></span>
					</li>
				</ul>


				<?php if ( get_the_title() ) : ?>
					<?php the_title( '<h1 class="hero__title">', '</h1>' ); ?>
				<?php else : ?>
					<h1 class="hero__title"><?php the_field('article_short_title'); ?></h1>
				<?php endif; ?>

				<div class="hero__blurb">
					<?php the_excerpt(); ?>
				</div>

				<div class="hero__meta">
					<?php immersivly_posted_on(); ?>
				</div>

				<ul class="social no-bullet" id="<?php the_ID(); ?>">
					<?php immersivly_social_media_buttons(); ?>
				</ul>

				<ul class="article-info no-bullet">
					<li><i class="icon-time"></i><?php post_read_time(); ?> reading time</li>
					<?php if (is_user_logged_in() && immersivly_check_if_post_is_not_saved($user_ID, $post->ID)) : ?>
						<li>
							Post already saved.
						</li>
					<?php elseif (is_user_logged_in()) : ?>
						<li>
							<a href="javascript:;" id="article-save-for-later" data-userID="<?php print $user_ID; ?>" data-articleID = "<?php the_ID(); ?> " data-articleUrl="<?php print $current_url; ?>">
								<span class="article-info__save"><i class="icon-star"></i></span>Save for later
							</a>
						</li>
					<?php endif; ?>
				</ul>
			</div>
		</div>

	</header><!-- .hero -->


	<div class="entry-content entry-content--<?php echo $category[0]->category_nicename; ?>">
		<div class="gap" style="padding-bottom: 20px;">
			<div class="row collapse">
				<div class="small-12 medium-10 medium-centered columns">
					<div class="row">
						<div class="small-12 medium-9 columns">
							<?php if ( get_field('article_intro_text') ) {
								the_field('article_intro_text');
							} ?>
						</div>
						<div class="small-12 medium-3 columns">
							<?php // get_sidebar(); ?>
						</div>
					</div>
				</div>
			</div>
		</div>

		<?php if ( get_field('article_slider') && !get_field('article_secondary_image') ) : ?>
            <section class="media media_picture" style="height: auto;">
            <ul class="bxslider">
                <?php
                    $rows = get_field('article_slider');
                    if ( $rows ) {
                        foreach( $rows as $row ) {
                            echo "<li><img src='{$row['slide_image']['url']}' alt='{$row['slide_text']}'></li>";
                        }
                    }
                ?>
            </ul>
            </section>
            <div class="bx-wrapper bx-custom-pager"></div>
        <?php endif; ?>


		<?php if ( get_field('article_secondary_image') ) : ?>
			<?php $file = get_field('article_secondary_image'); ?>

			<?php if ( $file['mime_type'] === 'video/mp4' ) : ?>

				<section class="media media__video">
					<div class="videobg">
						<video controls id="bgvid" preload="none" width="100%">
							<!-- <source src="polina.webm" type="video/webm"> -->
							<source src="<?php echo $file['url']; ?>" type="video/mp4">
						</video>
					</div>
				</section>
			<?php else : ?>
				<section class="media media_picture">
					<pre><?php //print_r($file) ?></pre>
					<!-- <img src="<?php echo $file['url']; ?>" alt=""> -->

					<picture>
						<source srcset="<?php echo $file['url']; ?>" media="(min-width: 1000px)">
						<source srcset="<?php echo $file['sizes']['large']; ?>" media="(min-width: 800px)">
						<img srcset="<?php echo $file['sizes']['article-phone']; ?>, <?php echo $file['sizes']['article-phone-retina']; ?> 2x" alt="<?php echo $file['title']; ?>">
					</picture>
				</section>
			<?php endif; ?>
		<?php endif; ?>

		<div class="gap">
        <br>
			<div class="row collapse">
				<div class="small-12 medium-10 medium-centered columns">
					<div class="row">
						<div class="small-12 medium-7 large-9 columns">
							<?php the_content(); ?>
						</div>
						<div class="small-12 medium-5 large-3 columns">
							<?php get_sidebar(); ?>
							<?php related_entries(array('use_template'=>true, 'template_file'=>'yarpp-template-example.php')); ?>
						</div>
					</div>
				</div>
			</div>
		</div>

	</div><!-- .entry-content -->

	<footer class="entry-footer">
		<?php // immersivly_entry_footer(); ?>
	</footer><!-- .entry-footer -->
</article><!-- #post-## -->
