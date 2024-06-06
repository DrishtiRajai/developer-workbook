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

// ** Database settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'obl' );

/** Database username */
define( 'DB_USER', 'root' );

/** Database password */
define( 'DB_PASSWORD', 'abcdefghij' );

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
define( 'AUTH_KEY',         ':=|_fFf9k0{~&|rz23fE[c7AB<%;J<5]waP5esSyXA}O*c=?d^5&=~4(c+:M+y|B' );
define( 'SECURE_AUTH_KEY',  ')9$;k-I=Z)ZW~_c6P7du$9n G;=xZUO^s-g|$*d zl=la^a.MMuSA~qaA!GM73#~' );
define( 'LOGGED_IN_KEY',    'x/dqkUk|?-o]jg3Jnj~TZPi~|Nkm4-z#dr):Pm%GkXsKd?>B8}2Als~^jIPJDQ;o' );
define( 'NONCE_KEY',        '_?uZ}0k b(:iX@j JkrpExpek-6T8 #6VO+H8hv4MrF)*,0g$+=TT(.I|z:7u0%I' );
define( 'AUTH_SALT',        'ngj66ur}riIx$HQI`{2)Eb;yr ;/5?xOaZDAPI&8P%3#W4@IzE[pOSgL+Tzg*dZ|' );
define( 'SECURE_AUTH_SALT', 'L:L9kV]%yJP n_LE|96AO[WnBNpy2nc#i3Z/5amS<Sf1~E dXKCQNzo`(P@=Gphl' );
define( 'LOGGED_IN_SALT',   'fIlnz*Qh&6>YV[9R`*-R]Q3t|!^eV?9}%N:yO-.xzWMA`0&u7@{|#p mDE_N+Tj^' );
define( 'NONCE_SALT',       '>PvEN+!m%MRhl1u%S:$S5>id0l#B TPMTMO#iJo/QJc:l*hc(,HdwbnxWg=L$=k=' );

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
