<?php
// Make sure we have access to jquery.
wp_enqueue_script('jquery');

// Define an init action.
add_action( 'init', 'immersive_add_front_scripts' );

/**
 * Include custom js files.
 */
function immersive_add_front_scripts() {
	wp_register_script( "front", IMM_BASE_DIR . 'scripts/immersivly-plugin.js', array( ), false, true );
}

/**
 * Ajax callback for the "Save for later" functionality.
 */
function immersive_save_for_later() {
	// Initialize the Word Press database wrapper.
	global $wpdb;

	// Get the required info.
	$user_id = $_POST['user_id'];
	$article_id = $_POST['article_id'];
	$article_url = $_POST['article_url'];

	$current_post = get_post($article_id);
	$article_title = $current_post->post_title;

	// Get the custom table which will hold the required date.
	$immersive_table = $wpdb->prefix . 'immersive_save_for_later';

	// Attempt saving relevant info.
	if($wpdb->insert($immersive_table,array(
			'user_id' => $user_id,
			'article_id' => $article_id,
			'article_url' => $article_url,
			'article_title' => $article_title,
		)) === FALSE) {
		echo 'There was a problem while trying to "Save for later". Please refresh the page and try again';
	}
	// If saving has failed display a pertinent message to the user.
	else {
		echo 'Post "Saved for later"';
	}
	die();
}

/**
 * Ajax callback for the "Removed saved post" functionality.
 */
function immersive_remove_saved_post() {
	// Initialize the Word Press database wrapper.
	global $wpdb;

	// Get the custom table which will hold the required date.
	$immersive_table = $wpdb->prefix . 'immersive_save_for_later';

	// Get the required data.
	$article_id = $_POST['article_id'];
	$user_id = $_POST['user_id'];

	// Execute the deletion query.
	$wpdb->query("DELETE FROM {$immersive_table} WHERE article_id={$article_id} AND user_id={$user_id}");

	// Return the article id. Used to replace the div containing the respective
	// post, with a default message.
	echo $article_id;

	die();
}

/**
 * Ajax callback used for updating the number of shares per post.
 */
function immersivly_update_number_of_shares() {
	// Initialize the Word Press database wrapper.
	global $wpdb;
	// Get the custom table name.
	$table_name = $wpdb->prefix . 'immersive_numbers_of_shares';

	// Get the required data.
	$article_id = $_POST['article_id'];
	// Update the number of shares.
	$wpdb->query("UPDATE {$table_name} SET number_of_shares = number_of_shares + 1 WHERE article_id = {$article_id}");
	// Return the new number of shares, for updating the display.
	$result = $wpdb->get_results( "SELECT number_of_shares, number_of_shares_fake FROM {$table_name} WHERE article_id = {$article_id} ", OBJECT );
	$shares = array_pop($result);
	$number_of_shares = $shares->number_of_shares;

	if ($number_of_shares > 50) {
		echo $number_of_shares;
	}
	else {
		echo $shares->number_of_shares_fake;
	}

	die();
}

// Add the custom actions the the wp_ajax layer.
add_action('wp_ajax_immersive_save_for_later', 'immersive_save_for_later');
add_action('wp_ajax_nopriv_immersive_save_for_later', 'immersive_save_for_later');

add_action('wp_ajax_immersive_remove_saved_post', 'immersive_remove_saved_post');
add_action('wp_ajax_nopriv_immersive_remove_saved_post', 'immersive_remove_saved_post');

add_action('wp_ajax_immersivly_update_number_of_shares', 'immersivly_update_number_of_shares');
add_action('wp_ajax_nopriv_immersivly_update_number_of_shares', 'immersivly_update_number_of_shares');