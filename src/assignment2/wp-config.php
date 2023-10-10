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
define( 'DB_NAME', 'wordpress' );

/** Database username */
define( 'DB_USER', 'wordpress' );

/** Database password */
define( 'DB_PASSWORD', '<REPLACE_THIS>' );

/** Database hostname */
define( 'DB_HOST', 'localhost' );

/** Database charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8' );

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
define('AUTH_KEY',         'o0JY(a]BVoPnCG-+U.ar,Bb}v&z-~)|M-ba2A%3VUYO0UlWu7=RRp4s{psp&1@w[');
define('SECURE_AUTH_KEY',  ')C:oz]!eg}Q~Z3u!T;ge*g4s$q:8*2BOfu$/Iui2Glu;>fi Q`3[`B|h)ec gg@/');
define('LOGGED_IN_KEY',    '%)EX.RAkp]T- K;WYjJX}?s-QX<`LBI$Y#N.w2M| VF P|u=-]PS|WJi4osW>m<N');
define('NONCE_KEY',        'A(UDc+VTu`4NpR2c|f*I7a/%l_EZ,Klm%3Hf=z@:c?*+[PAQ*|zcc4_sO-0TnVZc');
define('AUTH_SALT',        'nI+HV?.{v.?!vc|x<TvK~LvT(H6Qe45|M*|71!nB{tDzb<[wzDZAQZ;LK7x$j|dD');
define('SECURE_AUTH_SALT', 'dn@fHA0|XpR_QDXG9]Y7B<h PR-r-7PTMlzQ2M]|;`+j[G#,><R8ND<Ghrdak2?A');
define('LOGGED_IN_SALT',   'yS}<_nb8-bC+;eJ#uG|gS=M1-bv{[>4F-^cf~er}j|O@C?=&NXzNSvy;i W:ru)-');
define('NONCE_SALT',       '|=$+qrrO*p.HT1WU5+y{-JjM?`G7f5+pG`kKG|59tE:{roi~GFrG/x;F8@(V1;ra');

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
