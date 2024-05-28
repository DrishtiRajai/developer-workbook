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
 * @link https://wordpress.org/support/article/editing-wp-config-php/
 *
 * @package WordPress
 */
if( $_SERVER['HTTP_HOST'] == 'training-drishtir.md-staging.com' ) {

	$dbName = 'training_drishtir';
	$dbUser = 'training_drishtir';
	$dbPwd = 'qcDebtgIWCr2Yd24';
	$dbHost = '172.104.166.158';
	$table_prefix = 'vp_';

} else {
	$dbName = 'wp_exercise';
	$dbUser = 'root';
	$dbPwd = 'abcdefghij';
	$dbHost = 'localhost';
	$table_prefix = 'wp_';
}
// ** Database settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', $dbName);

/** Database username */
define( 'DB_USER', $dbUser );

/** Database password */
define( 'DB_PASSWORD', $dbPwd );

/** Database hostname */
define( 'DB_HOST', $dbHost );

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
define( 'AUTH_KEY',         'cK/I9?X=_Tv5bnXcku0o6sQH@4IaL+sUHh`5[Xo-#ewl(EW;VO`O9Wh:+4Pn2-?o' );
define( 'SECURE_AUTH_KEY',  '~u#vC-/<PB34Ht=a41r!mMzRmt#^2&<!%xhFy-BW#<f>z5qp(([.~(y<RbviRoE;' );
define( 'LOGGED_IN_KEY',    'H(/l_.-U(g!cJnVLt-|63z];#]5A@l7Aj[WN(}_qW}epS(mHCqrO=,Qyp>Q@]PW|' );
define( 'NONCE_KEY',        '4KWW!.Eo5^yO=wA7N=3}x(Y<u{#;l3.O/b1w,}t/^$}A#*e}T v_GjE(wGAiE6Tb' );
define( 'AUTH_SALT',        '_}k{h(h:CIo6Hpc)e^F|mBZ[pJ0a[ZH)!*:xGokoUb!szbp}2_4pBs;b!8%0D;+_' );
define( 'SECURE_AUTH_SALT', 'Cf=T;{3]}4)[,Pu=g<xL]oU` Z<(~u.YFCuE9Yg^} 5oRtd{)QR7^+Co4aL*(tLr' );
define( 'LOGGED_IN_SALT',   '2R~u}c%yX`7oj,wk@[fk9i16$C8wB|O[{TjyURo2JXV9on]/op&DL_NpR;4sZ+NF' );
define( 'NONCE_SALT',       '>11v9^Z=:3ZFg}4fQ2]5#%`MgGiJR6|_ X;8AlRm@S9O(3?cfGPiCK/*xH_VW?:}' );

/**#@-*/

/**
 * WordPress database table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
//$table_prefix = 'vp_';

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

/* Add any custom values between this line and the "stop editing" line. */



/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
