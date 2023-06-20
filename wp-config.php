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
define( 'DB_NAME', 'acosta-dance-centre' );

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
define( 'AUTH_KEY',         'OOThiL5]VXRc9Z-kB7/%AN3:[T 4,h`?P.v;&%MAjZ`DIXp%G}K/_W$u~UbF6YY>' );
define( 'SECURE_AUTH_KEY',  'r=Lm{qg<%0YWnHS79A0erklR2r(kTPl.7s)CWun1Wn$/+,9=?t-^CE&&;44[]*/h' );
define( 'LOGGED_IN_KEY',    'tmr0)Hklc(6qr1!eT1ZQ*3D/#!<2iT+yD,b2p;^FPjQ9X:ksYXlgo%aQ9=nSYr&@' );
define( 'NONCE_KEY',        'XhSae8,Cd6vQD7w%j4(kFTn5)|>}kaK]HsX.QA0~u0Tf&Vss k?ehZ!DOaz2Gu|l' );
define( 'AUTH_SALT',        'yinhxgr313/JjdRq,5?$fc~kSraG5}0hlX<jYw*|]WF{:PSz#NOUCz9sKOUG=u$v' );
define( 'SECURE_AUTH_SALT', 'n)%Zko#4la{|Li7ihq68X.LCtS7i3XV=Ttx_.LFM nr2r7&EE9rrf-0VC_kJXFuf' );
define( 'LOGGED_IN_SALT',   '&-`*]x(&?ve8vvBsHsAmXH=O.Igh{2!Go;1Zhv]<~zY&vt}%~fTB(X&|-hq-3_Qt' );
define( 'NONCE_SALT',       'DI6MVn0  AR94J@Oo3wRvxVtbo2hch;a)U-Fy+EA}4!P@_?aA4[*pjAi:1A:D^EU' );

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
