<?php

// Add the version for the custom table. It will help with future updates.
global $immersive_db_version;


/**
 * Install the plugin options.
 */
function immersive_install() {
	// Initialize the Word Press database wrapper.
	global $wpdb;

	$immersive_db_version = '1.0';

	// Set up the new table.
	$table_name = $wpdb->prefix . 'immersive_save_for_later';

	// Set up the charset.
	$charset_collate = $wpdb->get_charset_collate();

	// Create the custom table upon plugin installation.
	$sql = "CREATE TABLE $table_name (
	id mediumint(9) NOT NULL AUTO_INCREMENT,
	user_id mediumint(9) NOT NULL,
	article_id mediumint(9) NOT NULL,
	article_url varchar(225) DEFAULT '' NOT NULL,
	article_title varchar(225) DEFAULT '' NOT NULL,
	UNIQUE KEY id (id)
) $charset_collate;";

	require_once( ABSPATH . 'wp-admin/includes/upgrade.php' );
	dbDelta( $sql );
	// Add the custom table version to the options table.
	add_option( 'immersive_db_version', $immersive_db_version );
}