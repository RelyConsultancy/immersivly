<?php
/**
 * Check if post was already saved by the user, by supplying the user id and
 * post id.
 *
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

/**
 * Get all the saved posts for a supplied user ID.
 *
 * @param $user_id integer
 *  The internal Word Press user ID.
 *
 * @return object | bool
 *  The list of saved posts.
 *  No saved posts were found.
 */
function immersivly_retrieve_post_for_user($user_id) {
	// Initialize the Word Press database wrapper.
	global $wpdb;
	// Get the custom table name.
	$table_name = $wpdb->prefix . 'immersive_save_for_later';
	// Check if the user with the supplied user ID has already "Saved for later"
	// the post with the supplied ID.
	$results = $wpdb->get_results( "SELECT * FROM {$table_name} WHERE user_id = {$user_id} ", OBJECT );
	// Return the list of saved posts. False otherwise.
	return !empty($results) ? $results : FALSE;
}

/**
 * Get the number of shares for a supplied post ID.
 *
 * @param $post_id integer
 *  The id for the post.
 *
 * @return int
 *  The number of shares.
 */
function immersivly_get_the_number_of_shares($post_id) {
	// Initialize the Word Press database wrapper.
	global $wpdb;
	// Get the custom table name.
	$table_name = $wpdb->prefix . 'immersive_numbers_of_shares';
	// Check if the user with the supplied user ID has already "Saved for later"
	// the post with the supplied ID.
	$results = $wpdb->get_results( "SELECT * FROM {$table_name} WHERE article_id = {$post_id} ", OBJECT );

	// If no result was found, it means that there were no shares for the
	// current post. By the specs we give the post a rand number of shares (25,
	// 50) and save the data to the DB.
	if (empty($results)) {
		$number_of_shares = rand(25, 50);
		$wpdb->query("INSERT INTO {$table_name} (article_id, number_of_shares) VALUES ({$post_id}, {$number_of_shares})");

		return $number_of_shares;
	}
	else {
		$result = array_pop($results);
		return $result->number_of_shares;
	}
}