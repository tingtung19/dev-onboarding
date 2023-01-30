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
define( 'DB_NAME', 'dev-onboarding' );

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
define( 'AUTH_KEY',         '7TfH6S1DMnCg2Swkg4gst7b21ExExdfbAkOE7Bi0qrmbdhzBpiDZk0sGfbIkl8AF' );
define( 'SECURE_AUTH_KEY',  'Sy6DsV9mC0TTL0v9bT5uqSuwILabXw4CzEiBRrOmSbciT1MEVAYp6RaToJHJE9Gg' );
define( 'LOGGED_IN_KEY',    '879n3ZVvxLuooHvlrPsfTONtAzxTFnvIwJjMTj4xhQcHuJ7FvrhJmqa4nWaHhSdb' );
define( 'NONCE_KEY',        '2xpmfVskS0LkyQXGJhLVK8D1CRjdo1CQXs6iAQanFArOu3NmMWrQAZAkFoOXmEuc' );
define( 'AUTH_SALT',        'UXGkrRYadx3gJZo32J5BBrsxEa7x8DKXncRNgnhd3kHWumt44sCXPy1BWQserrLd' );
define( 'SECURE_AUTH_SALT', '2cmNrkpsVw4nhFsKt3gSuRp5QplV2GxaGk5VIuJTrzB4q2iASUkorFfmWkr3khKC' );
define( 'LOGGED_IN_SALT',   'qT7T2CqF8pCRLjD5ZZqtGaFiyTBvZykTIP7GJ4WFR2cj7zZb01R7g2GiaH1WoCdG' );
define( 'NONCE_SALT',       'DCNzd2nBZmOKDDpENwgQ1dnofycDfd8ggpVlmZYIglE9gxr6N1wXCdZ8TtQ8lDmZ' );

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

define('DISALLOW_FILE_EDIT', false);
define('DISALLOW_FILE_MODS', false);
