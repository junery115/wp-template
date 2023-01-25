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
define( 'DB_NAME', 'wp-templates' );

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
define( 'AUTH_KEY',         'klh%efm:`3_rnBDg*VgT-j^0Z,I(mp^d5gUMXnpn|DVj}h#z!~s2WCMzu^@qzC6E' );
define( 'SECURE_AUTH_KEY',  '1C3gz]Nf{z]=9;owhq$;kwv8,`g(YDg^_Y(|%Xj$cs@TntX @0W[(PYVvdQ@o;][' );
define( 'LOGGED_IN_KEY',    'UFz7b/?k/*jb6:1!p-kdHQ=6<cpss}*qdswKq$>,HBmd1>R^:[v cHgzVVc!E`^=' );
define( 'NONCE_KEY',        '_>hj@btB0ogscv]:M^+%_+%SwR0qIUn-C[7,f;5h/K]m,we7[C=vL4eJ88{I*?dr' );
define( 'AUTH_SALT',        'hv_e^Xm)J(+;X-cjPxay&wYMK2Y1]K{n+i+bPylhV(GW$W#q$B5m(Ls50d58!`M/' );
define( 'SECURE_AUTH_SALT', ';vOF4/,@~~]5$9-MiD`(GL3B^u/``eU$[$S(y]6;},W{9wpVo=J<=akJqH?VCGp0' );
define( 'LOGGED_IN_SALT',   '6y6_$BfKKWIYn<_p^saZW0/%j,k#LcLqSo8I.<(7VUof$sp[n@S@K?0V$Y]yKVwE' );
define( 'NONCE_SALT',       ' 5(#P~<BBopVg:MI@RaXdOOcS=%Xo QIO}{<WGl:i<|GybHMUHDyg~kW@*FD>vR`' );

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
define( 'WP_DEBUG', true );

/* Add any custom values between this line and the "stop editing" line. */



/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
