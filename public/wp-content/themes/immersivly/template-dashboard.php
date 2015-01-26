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

// If the user is not logged in, redirect him to the home page.
if (!is_user_logged_in()) {
	wp_redirect( home_url(), $status );
}
// If the user is logged in, get his ID.
else {
	include_once(IMM_BASE_PATH . '/inc/helpers.php');
	$current_user_id = get_current_user_id();
	$user_saved_posts = immersivly_retrieve_post_for_user($current_user_id);
	global $current_user;
	get_currentuserinfo();
}
?>

<?php get_header(); ?>

<?php get_sidebar('home'); ?>
	<div class="content">
		<div class="row collapse">
			<div class="dashboard-saved-posts">
					<div class="dashboard-saved-posts-list">
						<section class="content--highlighted">
							<div class="row">
								<div class="small-12 medium-10 medium-centered columns">
									<section class="author-box--page">
										<h1 class="author-box--page__title">Welcome, <?php print $current_user->first_name; ?> <?php print $current_user->last_name; ?></h1>
									</section>
								</div>
							</div>
						</section>

						<div class="row">
							<div class="small-12 medium-10 medium-centered columns">
								<?php if ($user_saved_posts) : ?>
									<h4 class="content--block__subtitle">Saved articles</h4>

									<ul>
										<?php foreach ($user_saved_posts as $key => $user_saved_post): ?>
											<li class="saved-article-<? echo $user_saved_post->article_id; ?>">
												<a class="saved-article" href="<?php echo home_url() . $user_saved_post->article_url; ?>" target="_blank"><?php echo $user_saved_post->article_title; ?></a>
												<a id="<?php echo $user_saved_post->article_id ?>" class="remove-post-button" data-userID="<?php print $current_user_id; ?>" href="javascript:;" title="Remove article"></a>
											</li>
										<?php endforeach; ?>
									</ul>
								<?php else : ?>
									<h4 class="no-posts">You don't have any saved posts yet!</h4>
								<?php endif; ?>
							</div>
						</div>
					</div>
			</div>
		</div>
	</div>

<?php get_footer(); ?>