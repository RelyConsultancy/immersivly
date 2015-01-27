<?php

add_filter( 'wpmem_inc_login_inputs', 'immersive_change_user_name_label' );

/**
 * A function used to alter the wp-members login form to change the label for
 * the username to: E-mail.
 *
 * @param $login_arguments
 * Array holding all the login form info (from wp-members).
 *
 * @return array
 */
function immersive_change_user_name_label( $login_arguments ) {
	$login_arguments[0]['name'] = 'Email';

	return $login_arguments;
}