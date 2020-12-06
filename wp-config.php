<?php
/**
 * The base configuration for WordPress
 *
 * The wp-config.php creation script uses this file during the
 * installation. You don't have to use the web site, you can
 * copy this file to "wp-config.php" and fill in the values.
 *
 * This file contains the following configurations:
 *
 * * MySQL settings
 * * Secret keys
 * * Database table prefix
 * * ABSPATH
 *
 * @link https://wordpress.org/support/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'wordpress' );

/** MySQL database username */
define( 'DB_USER', 'root' );

/** MySQL database password */
define( 'DB_PASSWORD', '' );

/** MySQL hostname */
define( 'DB_HOST', 'localhost' );

/** Database Charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8mb4' );

/** The Database Collate type. Don't change this if in doubt. */
define( 'DB_COLLATE', '' );

/**#@+
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define( 'AUTH_KEY',         '@yG.mjg1J)sEsr@;c@B%EFyKq0Z/SXDEqWuspH-q Be6BjEH.%<0k+FNkPx_=U+x' );
define( 'SECURE_AUTH_KEY',  'PW:Af[e9PPb%=v2lc~f/f?K27RrbW*7m5hCbj<=:nr4CJ!)wU$D6=Zu>D8?W96?8' );
define( 'LOGGED_IN_KEY',    '(CH+D:A^9JT]h,Fo+?RzMrcbvp27kuuLYx}c3GG)>9|Jyfh/a{cyT}VpgR<#Z&l!' );
define( 'NONCE_KEY',        'ZX.uzA$[@SC/d]p!{DsPbY~0QV;TkF{%R_U:iz}1;&@DsN+e?v^P$!0~[(,<,(_T' );
define( 'AUTH_SALT',        '0pE0Z$%&X{+;{nErY2,kxEtBG[k^iTypLkb([D,sTD)EtTA?<;;[X@{(-Ta{@g^W' );
define( 'SECURE_AUTH_SALT', 'Y2n)qQXn4kkkYwZ3uQuJH=;,ufDta&_FRj8U!8:)d8WQ[Y_ynpr u0K s~i(vU?@' );
define( 'LOGGED_IN_SALT',   '15?5P:`%Ld.`jjd?ae/;ZiP_|-+B6-5],uJX;K=bQ~A|pOi2/q6Jx_m0Ta2V#)#B' );
define( 'NONCE_SALT',       'qP,M2-gT(4W7(_`!b#e#QW6slG-SD)U4SHY#M$)MWcfU1cE?vqGIRx^4LAKH?,9A' );

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'wp_';

/**
 * For developers: WordPress debugging mode.
 *
 * Change this to true to enable the display of notices during development.
 * It is strongly recommended that plugin and theme developers use WP_DEBUG
 * in their development environments.
 *
 * For information on other constants that can be used for debugging,
 * visit the documentation.
 *
 * @link https://wordpress.org/support/article/debugging-in-wordpress/
 */
define( 'WP_DEBUG', false );

/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
