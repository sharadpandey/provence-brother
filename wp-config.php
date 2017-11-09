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
define('DB_NAME', 'provdev_provnbrother_db');

/** MySQL database username */
define('DB_USER', 'provdev_provn_user');

/** MySQL database password */
define('DB_PASSWORD', 'im@rk123#@');

/** MySQL hostname */
define('DB_HOST', 'localhost');

/** Database Charset to use in creating database tables. */
define('DB_CHARSET', 'utf8mb4');

/** The Database Collate type. Don't change this if in doubt. */
define('DB_COLLATE', '');

/**#@+
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         '5g2GEJ&}r)~oPB-tsm>KUx-%-`>ep zxd}A0VcHwj)n@@FyhZYSZaMdNt05Tvqz*');
define('SECURE_AUTH_KEY',  '(V8$IGxV%[0Mic*MD<yUq(R*&8dov6IuHcdAlkCS>?%t{N#8-RY#xLieCA_+2fgo');
define('LOGGED_IN_KEY',    'A7f@CUx?lS>t;bo2MUNI:JnC}|[]gh{;<vRy*Ekwsqu/L`8vPlWp@5TR_KuRyorX');
define('NONCE_KEY',        '$PYQ`*^&^0EOec4`^vsTVOb=Da-[j~jw6k(^[Di~dwk$^kVJa>nNW<8pw{WldMOR');
define('AUTH_SALT',        'oUNgwZ(kB/%%,Dh- C(d|xpCrbM~u({ezs|>h}gaQ69vN,}yC9)_{b;+;u9|VpzA');
define('SECURE_AUTH_SALT', 'LSq-caomGptTK(#}0y$VJH{&$cJ`(_k8qH(%<3Nz(V0-Ch9;r,{b-x--Ep)aX+Za');
define('LOGGED_IN_SALT',   'fkJD@`7>,m^~{xG{z)Mm+%__/yS/zx1d0z7u-<RWj]_1*B+|N<zd.t?U;QEP+Y^f');
define('NONCE_SALT',       'Q*VE Q3/{IJ&Wd6 OPVnWNpQ>-i&bB5>TkW6><xZ2YQ~.1,%RsR^Y5(mC4X)rXd|');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'pnb_';

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
define('WP_DEBUG', false);

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
