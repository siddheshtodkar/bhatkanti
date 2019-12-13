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
 * @link https://codex.wordpress.org/Editing_wp-config.php
 *
 * @package WordPress
 */

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'wpdb' );

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
define( 'AUTH_KEY',         'v;T%`<t=MNcHiM8isW>.tq;^keQ,54.q#coc LBzHYY,[J7#gm`#jRFG[0LkxMQ_' );
define( 'SECURE_AUTH_KEY',  'P#][GOz7X1@Ft>o@1O4R[fVV`({[hHM+~5-g=<6j!Lc})GF7)R&nO=C|AQJ`X2I{' );
define( 'LOGGED_IN_KEY',    'hDjr9V<jv0VIB/focs#ReGiC_t*/nWx:MD8-aaF#EGSkPhy#u?#?L% Yk]/>%AG:' );
define( 'NONCE_KEY',        '% whApVa$wgL/v-U4s#rWRqS&m_g~U[qCRBoJ3ZbP<R>8,0eI(U6UsGLBP3_OtYQ' );
define( 'AUTH_SALT',        'e}4Kc{3$Z.2e8>Qple):n$q@bD9!c=U]A!X_4*J7G2%>W)j# e-%2f@OW6**(6#O' );
define( 'SECURE_AUTH_SALT', 'qS4|7~.&WE~>Yp;6yYDn6eewW.4Q;^YxrN^S||EWT_xv93r1C/TuK@* m]N<w!z5' );
define( 'LOGGED_IN_SALT',   '~30&@^N+%+/v#B2)VdR/Gl[~xY%(Khb1;vqs?aU^P?s?O|c&IZ7fw3L>MA3e6S>|' );
define( 'NONCE_SALT',       'EN,``Z`=xul|I|^Gfc~?_B83wk9Sz},?ku:bSAQV=Y)+_9cl9#s3wlODo50Gp^C9' );

/**#@-*/

/**
 * WordPress Database Table prefix.
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
 * visit the Codex.
 *
 * @link https://codex.wordpress.org/Debugging_in_WordPress
 */
define( 'WP_DEBUG', false );

/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', dirname( __FILE__ ) . '/' );
}

/** Sets up WordPress vars and included files. */
require_once( ABSPATH . 'wp-settings.php' );
