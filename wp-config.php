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
define('WP_CACHE', true);
define( 'WPCACHEHOME', 'C:\xampp\htdocs\crafted-in-sweden\wp-content\plugins\wp-super-cache/' );
define( 'DB_NAME', 'cis' );

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
define( 'AUTH_KEY',         '>)TCzM|(Gf$ 7inI~SM22BPHU3R({$tc=5jCp&1;[uqdynBkUNnlez@HJv#t^gOP' );
define( 'SECURE_AUTH_KEY',  ';O@6U!,s*bk0+sWPF%xvE~<ra(J;JOiNje_F^>rT@<{E$s.R8`<R#+uqkn@i8>0C' );
define( 'LOGGED_IN_KEY',    '!UTTgGTf#Cv%+=o/ |$=tc-9Fmhb,>Zk,u8q*GONPB}l7AzU(]#)^l_n:J0wiiE%' );
define( 'NONCE_KEY',        '9Qzm7{b7Lj8&#$K}2Xoji>3k-wR;loFLw6%W+ UGVS3mC&W^HUsG~dUpxqyzxj$g' );
define( 'AUTH_SALT',        'p_lKJs?<36qJHdnH3%PiQlhq?}tBL.N|QO/-<{A,#K(&G}s~E,*NEA$c64@Q`XXi' );
define( 'SECURE_AUTH_SALT', 'vgoe7GPQ1S3qS0{uc` ~)R@7FGz9I:(BLh$)?7bz4D[+:?I~xffB-4eM#TE`OF(0' );
define( 'LOGGED_IN_SALT',   'm(.*~TG$5E~fy/zLJ<Z3F5+=zO(DPo$w~!db!&mJPy!F96[>n~dHUl,-ls ]YwK&' );
define( 'NONCE_SALT',       'Ov5]k6!/SpR!dF(L3Rt<=b6hxMLuz>6DHnQr7uLE[vw>jjd;6z!-RAaqj!2^^xWZ' );

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
