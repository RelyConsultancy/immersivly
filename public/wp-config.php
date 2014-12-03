<?php
/**
 * The base configurations of the WordPress.
 *
 * This file has the following configurations: MySQL settings, Table Prefix,
 * Secret Keys, WordPress Language, and ABSPATH. You can find more information
 * by visiting {@link http://codex.wordpress.org/Editing_wp-config.php Editing
 * wp-config.php} Codex page. You can get the MySQL settings from your web host.
 *
 * This file is used by the wp-config.php creation script during the
 * installation. You don't have to use the web site, you can just copy this file
 * to "wp-config.php" and fill in the values.
 *
 * @package WordPress
 */

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define('DB_NAME', 'immersivly');

/** MySQL database username */
define('DB_USER', 'immersivly');

/** MySQL database password */
define('DB_PASSWORD', 'HLwTLbw6ex3L3MRt');

/** MySQL hostname */
define('DB_HOST', 'localhost');

/** Database Charset to use in creating database tables. */
define('DB_CHARSET', 'utf8');

/** The Database Collate type. Don't change this if in doubt. */
define('DB_COLLATE', '');

/**#@+
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         '/%FTIV?a3{:X}zwd<Bjyb-<Luo@BQr]-c`WKviso7 Rllmdt+8(bX^U{2u9r+P|l');
define('SECURE_AUTH_KEY',  '*G^1bd`VBy:[0?Vp-]DJQUUd^Mr3T9a0kWVEBBj>{O$<:`;j4e4Eoem4SM./6DHS');
define('LOGGED_IN_KEY',    '6$/D=*l-R~}z96MizF6b~%]oSvF&OOV8~k[66T@P]*:?Tm@R=u[sN>0kJx@02+7/');
define('NONCE_KEY',        'qx7D7YhR%s9SG4|$g6+!Mqf9`OB=5a_;(uZW2m+MwSPgyO4pW*^;BJ)>:.VmOH)-');
define('AUTH_SALT',        '1Q}^=?^,}Rd$vD &Uj`<Nn-~n^Xn@Dzr;$B Ejf. oN==*K8&R1v`<0,_6<-r`bY');
define('SECURE_AUTH_SALT', 'Mz$v_8/{2k]2Yw_>K,V%:ZF_oR[$k@}AXVMFAT_iH]#)D>Op}3{ N|J}/|z!wz^(');
define('LOGGED_IN_SALT',   'alnQ)#w)z-r!|]0|!b756%+)p$N,2w ~#,8GcVn8!uF=%,}Ypn`5aK+T*^mTIh[v');
define('NONCE_SALT',       'BBYTj[}-_zb)5+fhh&^eVbo{-:5u 2c#;5:7_a-2vKd+f;[GKJ>^y<B- <1RS?f`');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each a unique
 * prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'wp_';

/**
 * For developers: WordPress debugging mode.
 *
 * Change this to true to enable the display of notices during development.
 * It is strongly recommended that plugin and theme developers use WP_DEBUG
 * in their development environments.
 */
define('WP_DEBUG', false);

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
