<?php
define( 'WP_CACHE', true );
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
 * * Localized language
 * * ABSPATH
 *
 * @link https://wordpress.org/support/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** Database settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'u799386343_3bMKV' );

/** Database username */
define( 'DB_USER', 'u799386343_YTLms' );

/** Database password */
define( 'DB_PASSWORD', 'FXVnrKtHuc' );

/** Database hostname */
define( 'DB_HOST', '127.0.0.1' );

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
define( 'AUTH_KEY',          ':;ON!K>,(<e0/%`dSTMc~|_tac3Xi}C}Do66cS&,`;Cc)fTu?:B5SnIB;Y~iXiVL' );
define( 'SECURE_AUTH_KEY',   ')f!R|wxcSWEP.faLxpnUJEV.1t7E!C9rd/w$w3}205VT)-BwaZ4.4.y74?Ig1J(>' );
define( 'LOGGED_IN_KEY',     'xPh!aKG@&`c)Vs5qpszVO}TFHb:.Y*E{c3dBuwI9,OEz$G74x)NB98Nbz_S.@]~@' );
define( 'NONCE_KEY',         '^Hi20fJWE?in:i@W>3enrJ~A<eRx|tS#6!t|_#i_-qyXF0AJ|k4{eo!w@U/BP~*:' );
define( 'AUTH_SALT',         'a6L>H|Ye^IpQE{s*^*dS.0*8Zrn*-#TBtYd!g2uvve;LMBY5J*Ep/SNVa(sXo5O2' );
define( 'SECURE_AUTH_SALT',  '>|1:kk*ul[6ttqvH/m%``e}jz^q]}D2hvzxX?k^xYlqau!Kd&eWSVwiQRZ#Uz]Cm' );
define( 'LOGGED_IN_SALT',    'Z&(V<[EG,u-U+i(QO.y.AFP9HYuU|j.F9`i1~kh8E*/;pK(M]H{=(Hc[j3isXwjD' );
define( 'NONCE_SALT',        ',/u6Mc3C(W|Mo$haL|7.}K+&Bp0?EW!R? 0C<1~.k=3iE|rl((P}kV<x+|~G%4^f' );
define( 'WP_CACHE_KEY_SALT', 'ip20p>dW$8#>YK|toA{v%j5jf(6j:OD7[mPY^@!h8%!-&oeydAT!A;Dak5+3TCO^' );


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



define( 'FS_METHOD', 'direct' );
define( 'WP_AUTO_UPDATE_CORE', 'minor' );
/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
