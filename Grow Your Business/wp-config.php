<?php
/**
 * The base configuration for WordPress
 *
 * The wp-config.php creation script uses this file during the installation.
 * You don't have to use the website, you can copy this file to "wp-config.php"
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

 if( $_SERVER['HTTP_HOST'] == 'training-exercise-drishtir.md-staging.com' ) {

	$dbName = 'training_exercise_drishtir';
	$dbUser = 'training_exercise_drishtir';
	$dbPwd = '7Fvzhs3IVciKtu1T';
	$dbHost = '172.104.166.158';

} else {
	$dbName = 'final-exercise';
	$dbUser = 'root';
	$dbPwd = 'Alpha@1234';
	$dbHost = 'localhost';
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
define( 'AUTH_KEY',         'Tu3r{n`!8sxfJh><!8Bx9-@i1UAw@z:~M7]d.K> COv Zh=|yTzno;tmIlY|[SZO' );
define( 'SECURE_AUTH_KEY',  'F$^xn?Y&76R)0X3bwLGIW|D7[C!<6@{X)Q^hJ0XrAu&<Nl~e,9`M#xcdM<st#t[,' );
define( 'LOGGED_IN_KEY',    'pF]tK!S?%2;mU2uED3! wSq,xt3m~H0)*0#a?`|c`N=/+4kYoDh/DKMxH;[fH@B/' );
define( 'NONCE_KEY',        'alaFT)jiEFhBKDgswV )x9CGviaN7oF.Dq(2y+OdD(y*F/,x~nP19|uyk@m86&kR' );
define( 'AUTH_SALT',        'kQ(%l6wBzcpb;s-XGTo,/MvBW|aA.#hlE=_`-_:9>:c8Gi6Gn>bur|Xn] <T>_RW' );
define( 'SECURE_AUTH_SALT', '6&dD+`F1{|)O_4$F=&r;X*c]?3H$TD &$S,o{Z}+lqN[DfI}?GITx/bKv$%M/7. ' );
define( 'LOGGED_IN_SALT',   '<kh4=+B;oDqx%[%5Jn1EWZ+</OIuDGb6gt-5cFaE[km#/7t/YC:J_lM!egA DCt?' );
define( 'NONCE_SALT',       ';}r,jv_GXgly)/4&hnI^NLR*&M*.#rM*A:6V|w.wR!fXm!s4)c+bo}!Wmecmgbpz' );

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
