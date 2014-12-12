<?php
/**
 * @package Immersivly
 */
?>


<?php $category = get_the_category(); ?>



<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="hero" style="background-image: url(<?php echo wp_get_attachment_url( get_post_thumbnail_id( $post->ID ) ); ?>);">

		<div class="row">
			<div class="small-12 medium-8 large-4 medium-push-1 columns">
				<ul class="actions no-bullet">
					<li class="categories actions__item">
						<div class="categories__item--<?php echo $category[0]->category_nicename; ?>"><span><?php echo $category[0]->cat_name; ?></span></div>
					</li>
					<!-- <li class="actions__item">
						<span class="actions--shares"><i class="icon-heart"></i> <span class="js-count">122</span></span>
					</li> -->
					<li class="actions__item">
						<span class="actions--eta"><i class="icon-time"></i> <?php post_read_time(); ?></span>
					</li>
					<li class="actions__item">
						<span class="actions--comments"><i class="icon-comment"></i> <?php comments_number( 0, 1, '%' ); ?></span>
					</li>
				</ul>
				
				
				<?php if ( get_field('article_short_title') ) : ?>
					<h1 class="hero__title"><?php the_field('article_short_title'); ?></h1>
				<?php else : ?>
					<?php the_title( '<h1 class="hero__title">', '</h1>' ); ?>
				<?php endif; ?>

				<div class="hero__blurb">
					<?php the_excerpt(); ?>
				</div>

				<div class="hero__meta">
					<?php immersivly_posted_on(); ?>
				</div>

				<ul class="social no-bullet">
					<?php immersivly_social_media_buttons(); ?>
				</ul>

				<ul class="article-info no-bullet">
					<li><i class="icon-time"></i><?php post_read_time(); ?> reading time</li>
					<li><a href="javascript:;"><span class="article-info__save"><i class="icon-star"></i></span>Save for later</a></li>
				</ul>
			</div>
		</div>

	</header><!-- .hero -->


	<div class="entry-content entry-content--<?php echo $category[0]->category_nicename; ?>">
		<div class="gap" style="paddinb-bottom: 20px;">
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
				<section class="media media_picture" style="background-image: url();">
					<img src="<?php echo $file['url']; ?>" alt="">
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
