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
define( 'DB_NAME', 'portafolio' );

/** Database username */
define( 'DB_USER', 'root' );

/** Database password */
define( 'DB_PASSWORD', '' );

/** Database hostname */
define( 'DB_HOST', 'localhost' );

/** Database charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8' );

/** The database collate type. Don't change this if in doubt. */
define( 'DB_COLLATE', '' );

if ( !defined('WP_CLI') ) {
    define( 'WP_SITEURL', $_SERVER['REQUEST_SCHEME'] . '://' . $_SERVER['HTTP_HOST'] );
    define( 'WP_HOME',    $_SERVER['REQUEST_SCHEME'] . '://' . $_SERVER['HTTP_HOST'] );
}



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
define( 'AUTH_KEY',         'RI8aetKInV1EAGrsCiwWMnRqJwxe5rDcimu9pjyDodu2kwc3O7RcYw3UjStV4RfD' );
define( 'SECURE_AUTH_KEY',  '6ZK6bAGoXSMC72H1QQ50MopVMy7SQAML5tPkHiLxTXC9QXGLthhgvkn4Tu9oX1K3' );
define( 'LOGGED_IN_KEY',    '3CDsWwSn8ApOsB5zs8boCpgyuuqTY7AyxIxnPMrulQAG2h0xCFuwJddnwDQwnmap' );
define( 'NONCE_KEY',        'WBQGTanWaYfPgKZSbAcUaHVtRabKdd4SaYPoanJcO2v5m5S4TmpP0oFZFVk6qhOw' );
define( 'AUTH_SALT',        'ZJLgR37ytE4OVZ5j07YgrlxG4vQvHlSPSF01tFZvhY3kNFYbQiAw8nzn2nTAUOoM' );
define( 'SECURE_AUTH_SALT', 'kjKtoKp4gep0wcflagJX2QrAL6wshiHjhJifmpYTM0fIYaXofRAtiCFWBI3dzQrH' );
define( 'LOGGED_IN_SALT',   'RTN7kkMPnK75KJP9UROSvBTDtuUTAtw0bIFABN81htAxDfdjgxtiW3TEDETzldOn' );
define( 'NONCE_SALT',       'wMc1RvvrITnn38lqr77gyQG7RqoEGr1SJCRZqW3COd2EZoXJ4CX1fUSLFke6SuJz' );

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
