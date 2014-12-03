<?php
/**
 * Custom template tags for this theme.
 *
 * Eventually, some of the functionality here could be replaced by core features.
 *
 * @package Immersivly
 */

if ( ! function_exists( 'immersivly_paging_nav' ) ) :
/**
 * Display navigation to next/previous set of posts when applicable.
 */
function immersivly_paging_nav() {
	// Don't print empty markup if there's only one page.
	if ( $GLOBALS['wp_query']->max_num_pages < 2 ) {
		return;
	}
	?>
	<nav class="navigation paging-navigation" role="navigation">
		<h1 class="screen-reader-text"><?php _e( 'Posts navigation', 'immersivly' ); ?></h1>
		<div class="nav-links">

			<?php if ( get_next_posts_link() ) : ?>
			<div class="nav-previous"><?php next_posts_link( __( '<span class="meta-nav">&larr;</span> Older posts', 'immersivly' ) ); ?></div>
			<?php endif; ?>

			<?php if ( get_previous_posts_link() ) : ?>
			<div class="nav-next"><?php previous_posts_link( __( 'Newer posts <span class="meta-nav">&rarr;</span>', 'immersivly' ) ); ?></div>
			<?php endif; ?>

		</div><!-- .nav-links -->
	</nav><!-- .navigation -->
	<?php
}
endif;

if ( ! function_exists( 'immersivly_post_nav' ) ) :
/**
 * Display navigation to next/previous post when applicable.
 */
function immersivly_post_nav() {
	// Don't print empty markup if there's nowhere to navigate.
	$previous = ( is_attachment() ) ? get_post( get_post()->post_parent ) : get_adjacent_post( false, '', true );
	$next     = get_adjacent_post( false, '', false );

	if ( ! $next && ! $previous ) {
		return;
	}
	?>
	<nav class="navigation post-navigation" role="navigation">
		<h1 class="screen-reader-text"><?php _e( 'Post navigation', 'immersivly' ); ?></h1>
		<div class="nav-links">
			<?php
				previous_post_link( '<div class="nav-previous">%link</div>', _x( '<span class="meta-nav">&larr;</span>&nbsp;%title', 'Previous post link', 'immersivly' ) );
				next_post_link(     '<div class="nav-next">%link</div>',     _x( '%title&nbsp;<span class="meta-nav">&rarr;</span>', 'Next post link',     'immersivly' ) );
			?>
		</div><!-- .nav-links -->
	</nav><!-- .navigation -->
	<?php
}
endif;

if ( ! function_exists( 'immersivly_posted_on' ) ) :
/**
 * Prints HTML with meta information for the current post-date/time and author.
 */
function immersivly_posted_on() {
	$time_string = '<time class="entry-date published updated" datetime="%1$s">%2$s</time>';
	if ( get_the_time( 'U' ) !== get_the_modified_time( 'U' ) ) {
		// $time_string = '<time class="entry-date published" datetime="%1$s">%2$s</time><time class="updated" datetime="%3$s">%4$s</time>';
		$time_string = '<time datetime="%1$s">%2$s</time>';
	}

	$time_string = sprintf( $time_string,
		esc_attr( get_the_date( 'c' ) ),
		esc_html( get_the_date( 'd M Y' ) ),
		esc_attr( get_the_modified_date( 'c' ) ),
		esc_html( get_the_modified_date() )
	);

	$posted_on = sprintf(
		_x( '%s', 'post date', 'immersivly' ), $time_string
	);

	

	$posted_by = sprintf(
		_x( 'By %s', 'post author', 'immersivly' ),
		'<a class="" href="' . esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ) . '">' . esc_html( get_the_author() ) . '</a>'
	);

	echo '<strong> ' . $posted_by . '</strong><span> ' . $posted_on . '</span>';

}
endif;

if ( ! function_exists( 'immersivly_entry_footer' ) ) :
/**
 * Prints HTML with meta information for the categories, tags and comments.
 */
function immersivly_entry_footer() {
	// Hide category and tag text for pages.
	if ( 'post' == get_post_type() ) {
		/* translators: used between list items, there is a space after the comma */
		$categories_list = get_the_category_list( __( ', ', 'immersivly' ) );
		if ( $categories_list && immersivly_categorized_blog() ) {
			printf( '<span class="cat-links">' . __( 'Posted in %1$s', 'immersivly' ) . '</span>', $categories_list );
		}

		/* translators: used between list items, there is a space after the comma */
		$tags_list = get_the_tag_list( '', __( ', ', 'immersivly' ) );
		if ( $tags_list ) {
			printf( '<span class="tags-links">' . __( 'Tagged %1$s', 'immersivly' ) . '</span>', $tags_list );
		}
	}

	if ( ! is_single() && ! post_password_required() && ( comments_open() || get_comments_number() ) ) {
		echo '<span class="comments-link">';
		comments_popup_link( __( 'Leave a comment', 'immersivly' ), __( '1 Comment', 'immersivly' ), __( '% Comments', 'immersivly' ) );
		echo '</span>';
	}

	edit_post_link( __( 'Edit', 'immersivly' ), '<span class="edit-link">', '</span>' );
}
endif;


if ( ! function_exists( 'immersivly_author_box' ) ) :
/**
 * Prints HTML with information regarding the author.
 */
function immersivly_author_box() {

	$author_avatar 	= do_shortcode('[avatar]');
	$author_name 	= get_the_author_meta('display_name');
	$author_bio 	= get_the_author_meta('description');

	if ( is_single() ) {

		$author_url = sprintf(
			'<span class="author"><a class="" href="' . esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ) . '">' . esc_html( 'Read more articles by ' . get_the_author() . '...' ) . '</a></span>'
		);

		?>
			<section class="author-box">
				<div class="row collapse">
					<div class="small-2 columns">
						<?php printf( '<span class="author-box__avatar">' . __( '%1$s', 'immersivly' ) . '</span>', $author_avatar ); ?>
					</div>
					<div class="small-10 columns">

						<?php
							printf( '<h5 class="author-box__title"><strong>' . __( 'Written by %1$s', 'immersivly' ) . '</strong></h5>', $author_name ); 
							
							echo '<p class="author-box__bio">' . $author_bio . ' <strong>' . $author_url . '</strong></p>';
						?>
					</div>
				</div>
			</section>
		<?php
	} else if ( is_author() ) { ?>
		<?php 
			$twitter = 	get_the_author_meta( 'twitter_profile' );
			$facebook = get_the_author_meta( 'facebook_profile' );
			$gplus = 	get_the_author_meta( 'google_profile' );
			$linkedin = get_the_author_meta( 'linkedin_profile' );

			$profiles = [];

			if ( $twitter ) {
				$profiles[] = [ 'type' => 'twitter', 'url' => get_the_author_meta( 'twitter_profile' ) ];
			}
			if ( $facebook ) {
				$profiles[] = [ 'type' => 'facebook', 'url' => get_the_author_meta( 'facebook_profile' ) ];
			}
			if ( $gplus ) {
				$profiles[] = [ 'type' => 'gplus', 'url' => get_the_author_meta( 'google_profile' ) ];
			}
			if ( $linkedin ) {
				$profiles[] = [ 'type' => 'linkedin', 'url' => get_the_author_meta( 'linkedin_profile' ) ];
			}
		?>

		<section class="author-box--page">
			<div class="row collapse">
				<div class="small-12 columns">
					<?php printf( '<h1 class="author-box--page__title">' . __( '%1$s', 'immersivly' ) . '</h1>', $author_name );  ?>
				</div>
			</div>
			<div class="row collapse">
				<div class="small-2 columns">
					<?php printf( '<span class="author-box--page__avatar">' . __( '%1$s', 'immersivly' ) . '</span>', $author_avatar ); ?>
				</div>
				<div class="small-10 columns">

					<?php
						
						echo '<p class="author-box--page__bio">' . $author_bio . '</p>';
					?>
				</div>
			</div>
			<div class="row">
				<div class="small-12 columns">
					<ul class="social social--dark no-bullet">
						<li class="social__label">Connect with <?php echo $author_name; ?></li>
						<?php foreach ( $profiles as $profile ) : ?>
							<li class="social__item social--dark__item"><a class="social__item--<?php echo $profile['type'] ?>" href="<?php echo $profile['url']; ?>"><i class="icon-<?php echo $profile['type'] ?>"></i></a></li>
						<?php endforeach; ?>
					</ul>
				</div>
			</div>
		</section>
	<?php } else {
		// Do nothing, maybe fallback?
	}
}
endif;

/**
 * Returns true if a blog has more than 1 category.
 *
 * @return bool
 */
function immersivly_categorized_blog() {
	if ( false === ( $all_the_cool_cats = get_transient( 'immersivly_categories' ) ) ) {
		// Create an array of all the categories that are attached to posts.
		$all_the_cool_cats = get_categories( array(
			'fields'     => 'ids',
			'hide_empty' => 1,

			// We only need to know if there is more than one category.
			'number'     => 2,
		) );

		// Count the number of categories that are attached to the posts.
		$all_the_cool_cats = count( $all_the_cool_cats );

		set_transient( 'immersivly_categories', $all_the_cool_cats );
	}

	if ( $all_the_cool_cats > 1 ) {
		// This blog has more than 1 category so immersivly_categorized_blog should return true.
		return true;
	} else {
		// This blog has only 1 category so immersivly_categorized_blog should return false.
		return false;
	}
}

/**
 * Flush out the transients used in immersivly_categorized_blog.
 */
function immersivly_category_transient_flusher() {
	// Like, beat it. Dig?
	delete_transient( 'immersivly_categories' );
}
add_action( 'edit_category', 'immersivly_category_transient_flusher' );
add_action( 'save_post',     'immersivly_category_transient_flusher' );
