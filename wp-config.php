<?php
/**
 * The base configuration for WordPress
 *
 * The wp-config.php creation script uses this file during the
 * installation. You don't have to use the web site, you can
 * copy this file to "wp-config.php" and fill in the values.
 *
 * This file contains the following configurations:
 *
 * * MySQL settings
 * * Secret keys
 * * Database table prefix
 * * ABSPATH
 *
 * @link https://wordpress.org/support/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'pets_control' );

/** MySQL database username */
define( 'DB_USER', 'root' );

/** MySQL database password */
define( 'DB_PASSWORD', '' );

/** MySQL hostname */
define( 'DB_HOST', 'localhost' );

/** Database Charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8mb4' );

/** The Database Collate type. Don't change this if in doubt. */
define( 'DB_COLLATE', '' );

/**#@+
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define( 'AUTH_KEY',         'ru&oZgJ[e7.sD=OG8Q0AN}gG02IT CU9c2)GQbnXIPZBaK^]uwSMo23+xX<oUh$r' );
define( 'SECURE_AUTH_KEY',  'QAG%`]MNUkW3w6cuyINUE`$;~EwW4X&oQr[W7Kw&[pjqR}=?fyq;$pgI5N:Z9Q3C' );
define( 'LOGGED_IN_KEY',    'y_Gh0bE1]WFdceVLm=XR% 2U3]{CSdBk5<S3q#%yON4KJZjvg|&D; cJi>Ff$5f~' );
define( 'NONCE_KEY',        ')O69<q[lTQ3?Zy@UICqicstIdIK`^26Ve*,d*x2XL_CracV@W|^r4)hg(`)-.+5{' );
define( 'AUTH_SALT',        'YXR9ytis%<h-0]+;lRF:W*+}JtLn!|6uN,wXu.}vXufF(LRKi_jWX*XFkUqIrtE(' );
define( 'SECURE_AUTH_SALT', 'Nec{5:(w*,7ec:6y+|>gFOCX~8)1Qm6ev#:|i^>)*}MJh)WY6(|ZLJ$h9f)@K3m>' );
define( 'LOGGED_IN_SALT',   '^kZa@,3ag,UiU<EQzrOwon!0ig~vk3phZ2!|}0JYH,l$go% Jh/0o?Hil*qD0j[L' );
define( 'NONCE_SALT',       '{#dMEPyQg7WJ)1g%3c1JePoV@cY#%]24UPZ&39t~g++U>=P_1*V+9Xq`t;Qy>i-g' );

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'pets_';

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

/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
