<?php
/**
 * The base configuration for WordPress
 *
 * The wp-config.php creation script uses this file during the installation.
 * You don't have to use the web site, you can copy this file to "wp-config.php"
 * and fill in the values.
 *
 * This file contains the following configurations:
 *
 * * Database settings
 * * Secret keys
 * * Database table prefix
 * * ABSPATH
 *
 * @link https://wordpress.org/documentation/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** Database settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'wordpress_lks_photograper' );

/** Database username */
define( 'DB_USER', 'root' );

/** Database password */
define( 'DB_PASSWORD', '' );

/** Database hostname */
define( 'DB_HOST', 'localhost' );

/** Database charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8mb4' );

/** The database collate type. Don't change this if in doubt. */
define( 'DB_COLLATE', '' );

/**#@+
 * Authentication unique keys and salts.
 *
 * Change these to different unique phrases! You can generate these using
 * the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}.
 *
 * You can change these at any point in time to invalidate all existing cookies.
 * This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define( 'AUTH_KEY',         'GwF+g7^]2<CM,h{h`Clp<1(r(.6w@^i]V+h%qFi18BX`0LK|e]0vSRsb[?}Hj3:>' );
define( 'SECURE_AUTH_KEY',  'F~,1x1(.Eu.A5!Zf5$+T5{MR]g0Y#!_Yo|i/,FXvg,qic]v@$T_[ue7I4k;^!s35' );
define( 'LOGGED_IN_KEY',    'zYRW_$ui-OFj0[6V!JNsToDHYSN5k]q?-Fcj^]+{FCx|lNNkxK|2S-S:VL#a*QOp' );
define( 'NONCE_KEY',        'o:NzK?/P?!uY#D-aNUi,OAFZLI.r7r@.cz}&W_ELj4|):l $)r0mI6Mo<F6dtG?}' );
define( 'AUTH_SALT',        'C(%nh9KayrZCQL>P$Xm>8R)X79oC@7SWkcBEWIM%7=SJU[,6vkw+]jdVZ|$.MK&B' );
define( 'SECURE_AUTH_SALT', 'hXr?kY{FW:Qo]oW_eZSUUsJ!,8M!?5R~!+@5.=3}RCy3^Zb]<qi&:(:DI9ONOrKf' );
define( 'LOGGED_IN_SALT',   '*9TWYC}An:YZG *y#R<WU>*F}d^Nq8+@I1D[n_W)^%!y%*7WrYyA.`C6]DHBMPKW' );
define( 'NONCE_SALT',       '3f>`Af+7vLda@FZQC8+BPhfcAX8{WS:&T&+Aj24.?=^pHa;|jZ~xWt4uKUVO2;^p' );

/**#@-*/

/**
 * WordPress database table prefix.
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
 * @link https://wordpress.org/documentation/article/debugging-in-wordpress/
 */
define( 'WP_DEBUG', false );

/* Add any custom values between this line and the "stop editing" line. */



/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
