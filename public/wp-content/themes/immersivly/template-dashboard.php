<?php
/**
 * The header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="content">
 *
 * @package Immersivly
 *
 * Template name: User Dashboard
 */

// If the user is not logged in, redirect him to the login page.
if (!is_user_logged_in()) {
	$location =  home_url() . '/login';
	wp_redirect( $location, $status );
}
// If the user is logged in, get his ID.
else {
	include_once(IMM_BASE_PATH . '/inc/helpers.php');
	$current_user_id = get_current_user_id();
	$user_saved_posts = immersivly_retrieve_post_for_user($current_user_id);
}
?>

<?php get_header(); ?>

<?php get_sidebar('home'); ?>
	<div class="content">
		<div class="row collapse">
			<div class="dashboard-saved-posts">
				<?php if ($user_saved_posts) : ?>
					<div class="dashboard-saved-posts-list">
						<h2>Below you have the list of saved articles</h2>
						<ul>
					<?php
						foreach ($user_saved_posts as $key => $user_saved_post) {
							print '<li class="saved-article-' . $user_saved_post->article_id. '">';
							print '<a href="' . home_url() . $user_saved_post->article_url . '" target="__blank">' . $user_saved_post->article_title . '</a> ';
							print ' | <a id="' . $user_saved_post->article_id . '" class="remove-post-button" data-userID="' . $current_user_id. '" href="javascript:;">Remove post from list</a></br>';
							print '</li>';
						}
					?>
						</ul>
					</div>
				<?php else : ?>
					<p class="no-posts">You don't have any saved posts yet!</p>
				<?php endif; ?>
			</div>
		</div>
	</div>

<?php get_footer(); ?>