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
define( 'DB_NAME', 'wp_blog' );

/** Database username */
define( 'DB_USER', 'root' );

/** Database password */
define( 'DB_PASSWORD', 'root' );

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
define( 'AUTH_KEY',         'e3(OBRig+UxY0TOc}oEXK|%fXYI/:CzDw y5?C%:>Uj`z;Ea #iKcIIrpwt{selF' );
define( 'SECURE_AUTH_KEY',  '[|jEc>R ZM`w)Zd@;(.zFC[ Ta-v(Sa$$W6?_7,@xx-V:-L$0&$o7>). g~g1~ 0' );
define( 'LOGGED_IN_KEY',    '^?Mii!.329zf%1X/9$p*g+NC~2$4k6S&dDeb+vHG[*?jUQz>/9(wz& *=?@ 4gR(' );
define( 'NONCE_KEY',        '9.?:BVEES`_9G$r>b%{cIPd#b;`S_ZEhl}z5^bvl2Dj=tN:,{,W 3CK/{TrlzOF_' );
define( 'AUTH_SALT',        'i743)/J=,w_`]ggV:Owd;zm@/Ciq>rztaSp1P;bKLs_q`B1u&m=SJc,cpS|Xv16S' );
define( 'SECURE_AUTH_SALT', '#!pci6/(2~wtll;]Ez.Vp^xD262NWTP7{(lU]:vm}9BCf4Q9^-gZkj9##l}V$bw<' );
define( 'LOGGED_IN_SALT',   'mH=u=;;xgm&?{6,+)sxk71V/>cC%yY[{961(q(g_RX38Jc~@I2u2}{1=K7c4Y;$B' );
define( 'NONCE_SALT',       'nNjK/nGz?Xg~Aj?K#4(ZT9a+nYgP2!Rp~Y(MaHkQlZb]gxtXE1vIOQ}9J)2di%j_' );

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
