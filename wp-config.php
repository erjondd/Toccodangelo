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
define( 'DB_NAME', 'curly' );

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
define( 'AUTH_KEY',         'y}QR#$ f=OKb>}z:TvV|g&q9P5CO+b_X*DYL)}#>clqTiJUCv]N.~QY~Ufql::oN' );
define( 'SECURE_AUTH_KEY',  '_vxmNt&2Ozvj!CEsnm]?N|3E]IYl,1P:=an>+cvwOc|:uzco<Dw*Hj!OJhJk,?d:' );
define( 'LOGGED_IN_KEY',    'yY-2Hmzlcjv~eaL~JNUwEFTgSpo9FsAN3gce`x-2LO<&vm.|k152p8sE+,;4a~at' );
define( 'NONCE_KEY',        'VchLI[EqRtRHZ62.7C3[J^:kx{MD)$U4Zjz{.O.NkeoD`w$eQEMyk>+/SRxFq-QO' );
define( 'AUTH_SALT',        '@avvps,GU4|fnz25LbZ&{Gp|bIc__5V[-w5CHIoAnJ0(%Yucb@9wYb9Ql8`)H/5B' );
define( 'SECURE_AUTH_SALT', '@KyQMxDm[-Kx?bEQk`Wh`!D1:!C]VRelmFAuCWMdK]n9PW>g+Cnf:zd)o7QqVjTP' );
define( 'LOGGED_IN_SALT',   'CIZ`q@WqHrS0$U0-S]- jZ]>*?#?WFB]jHtk2^b#!,@U&-oXFaH59FGuFhR%Uo,5' );
define( 'NONCE_SALT',       'HG-wFCub&53.~>%T2_tP1]1pQ.7PpI7SJ^%7h4oy}`85?1St(X6P{6|3ju$&yxaL' );

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
