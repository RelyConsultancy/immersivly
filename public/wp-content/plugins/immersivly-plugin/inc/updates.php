<?php
/**
 * Update the database, adding a custom table for the number of shares.
 */
function immersive_update_db() {
	$immersive_db_version = '1.2';
	if ( get_site_option( 'immersive_db_version' ) != $immersive_db_version ) {
		// Initialize the Word Press database wrapper.
		global $wpdb;

		// Set up the new table.
		$table_name = $wpdb->prefix . 'immersive_numbers_of_shares';

		// Set up the charset.
		$charset_collate = $wpdb->get_charset_collate();

		// Create the custom table upon plugin installation.
		$sql = "CREATE TABLE $table_name (
			id mediumint(9) NOT NULL AUTO_INCREMENT,
			article_id mediumint(9) NOT NULL,
			number_of_shares mediumint(9) NOT NULL,
			UNIQUE KEY id (id)
		) $charset_collate;";

		require_once( ABSPATH . 'wp-admin/includes/upgrade.php' );
		dbDelta( $sql );

		update_option( 'immersive_db_version', $immersive_db_version );
	}
}
add_action( 'plugins_loaded', 'immersive_update_db' );