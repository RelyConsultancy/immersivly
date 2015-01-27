<?php
/**
 * Plugin Name: Immersivly Plugin
 * Description: After enabling this plugin you will have access to all the custom functionality for the immersivly.experiencematter site.
 * Version: 1.0.0
 * Author: Stan Laurentiu-Vlad
 * Author URI: mailto:laurentiu.stan@freshbyteinc.com
 */
define( 'IMM_BASE_DIR', plugin_dir_url( __FILE__) );
define( 'IMM_BASE_PATH', dirname( __FILE__) );

/** Install the pluign **/
register_activation_hook( __FILE__, 'immersive_install' );

include('inc/install.php');
include('inc/scripts.php');
include('inc/updates.php');
include('inc/alters.php');