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
define( 'DB_NAME', 'meo' );

/** Database username */
define( 'DB_USER', 'root' );

/** Database password */
define( 'DB_PASSWORD', '123456' );

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
define( 'AUTH_KEY',         '>)FgV2u?cIMYT~Kw^`!r.]q|p{1XMa*$>.kn4hf:UZ-UnXyFGBpA@u`1>Vl(kEG*' );
define( 'SECURE_AUTH_KEY',  'j=1{PyfOMtG|KL@eE10N._ j0EdZkHHN> |wP#?wfG@y +.wN74vx^$%p6kuuc8P' );
define( 'LOGGED_IN_KEY',    'x~!iexptZ1%ZtKIc6gzfi[/P}fCMQGuX@%|(~F*-$rXO0h-C}G{b@3n iTsRVcpq' );
define( 'NONCE_KEY',        'vLG%:yP&boyfR<7XKY</.`S_mG[*x@YmbH .JQU?!$We)*[[f80>0xjMK&TiBI.s' );
define( 'AUTH_SALT',        't~N~p:(gma3S-g#q|nF|L%koiTY}AH)FXSoT73[YvUzN@cykFUAsi5MdoHh%zRJa' );
define( 'SECURE_AUTH_SALT', '#BnW,h%{N+qi12}i#fbx8^>)e@ZeY8*SZ[:hQo<[+ V# 3GEg$<&h=GOIkIgJi)8' );
define( 'LOGGED_IN_SALT',   '58i6LwyTL7*qXPV,*{.t1LZQIxVtX><[?D-kw^i`;dPxFi`c_h;6%!^&YU=i0BLN' );
define( 'NONCE_SALT',       'xQ`>[8T!Fc10uo&,Y/4K`p 3%pHI}0O3ZoC@U2/s.:ms,/RC={oefp6oP2:qcYVr' );

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
