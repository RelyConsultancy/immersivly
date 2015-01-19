<?php
/**
 * Default config settings
 *
 * Enter any WordPress config settings that are default to all environments
 * in this file. These can then be overridden in the environment config files.
 * 
 * Please note if you add constants in this file (i.e. define statements) 
 * these cannot be overridden in environment config files.
 * 
 * @package    Studio 24 WordPress Multi-Environment Config
 * @version    1.0
 * @author     Studio 24 Ltd  <info@studio24.net>
 */
  

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

define('WP_SITEURL', 'http://' . $_SERVER['HTTP_HOST'] .
                str_replace(DIRECTORY_SEPARATOR, '/', str_replace(realpath($_SERVER['DOCUMENT_ROOT']), '', dirname(__FILE__))));
define('WP_HOME', WP_SITEURL);

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each a unique
 * prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'wp_';

/**
 * WordPress Localized Language, defaults to English.
 *
 * Change this to localize WordPress. A corresponding MO file for the chosen
 * language must be installed to wp-content/languages. For example, install
 * de_DE.mo to wp-content/languages and set WPLANG to 'de_DE' to enable German
 * language support.
 */
define('WPLANG', '');
