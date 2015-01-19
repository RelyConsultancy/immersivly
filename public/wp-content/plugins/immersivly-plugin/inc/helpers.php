<?php
/**
 * @param $user_id integer
 *  The internal Word Press user ID.
 * @param $post_id integer
 *  The internal Word Press post ID.
 *
 * @return bool
 *  TRUE - if the post isn't already "Saved for later"
 *  FALSE - if the pas was already "Saved for later"
 */
function immersivly_check_if_post_is_not_saved($user_id, $post_id) {
	// Initialize the Word Press database wrapper.
	global $wpdb;
	// Get the custom table name.
	$table_name = $wpdb->prefix . 'immersive_save_for_later';
	// Check if the user with the supplied user ID has already "Saved for later"
	// the post with the supplied ID.
	$result = $wpdb->get_results( "SELECT * FROM {$table_name} WHERE user_id = {$user_id} AND article_id = {$post_id}", OBJECT );
	// If the post wasn't already saved, return TRUE. FALSE otherwise.
	return empty($result) ? FALSE : TRUE;
}