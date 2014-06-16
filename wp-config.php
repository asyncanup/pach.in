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

if ($_SERVER['RDS_DB_NAME']) {
    // ** MySQL settings - You can get this info from your web host ** //
    /** The name of the database for WordPress */
    define('DB_NAME', $_SERVER['RDS_DB_NAME']);

    /** MySQL database username */
    define('DB_USER', $_SERVER['RDS_USERNAME']);

    /** MySQL database password */
    define('DB_PASSWORD', $_SERVER['RDS_PASSWORD']);

    /** MySQL hostname */
    define('DB_HOST', $_SERVER['RDS_HOSTNAME']);

} else {
    define('DB_NAME', 'pach');
    define('DB_USER', 'root');
    define('DB_PASSWORD', '');
    define('DB_HOST', 'localhost:3306');
}

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
define('AUTH_KEY',         'p!|p8P mC(5~%+T*EXo?h4%qqI|RaXCgT/_V>>LRo|D}vB6~8R7)FT!peN1Gm7(=');
define('SECURE_AUTH_KEY',  'lC.H9R-pT+t6GuW8RM4Q9S@:8-gcl%Ad|u|Vt6c*F@xRk1GAxd<_gFBi~^[-jEr-');
define('LOGGED_IN_KEY',    '3VbIY*!K)cc;I1 !H)9L*]h/mI~P+E.0Rw:7aR}1$U7K+t649+*TFO+w,q2ejO|2');
define('NONCE_KEY',        'e:?{Bvf[a+h;|I4n`|IQH-89>/,;(U?e6f0hlLv]xAV1;nEyq5[A6Vv`nGHT2>qh');
define('AUTH_SALT',        '4-jz:Ix{yI|{iw(d=C~jf1<r_?QaB:C8~Mj;@F>7tl2W?L!*cL+x8(:/I!8U&v0u');
define('SECURE_AUTH_SALT', 'U|cU2yf+_ 3L:wSZ.+Wp1!U>w+%%MCBP=wyFL5SM3@K+x5s$$C8Yl,!=h-fycbUh');
define('LOGGED_IN_SALT',   '-@,SryCAw:L**`Ano7|. _%Ho(zAopbhCxX;I$ik!xYj2eS|9y*PL<=Bl1:(1/>F');
define('NONCE_SALT',       'z])y;ZM*;&<2Y]+z91h%$80$T9?N>L{hR,!Gc+dlMs131BL@J BRQ( fgmtYT Q=');

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
