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
define('DB_NAME', 'nurturedspirit');

/** MySQL database username */
define('DB_USER', 'otkinsey');

/** MySQL database password */
define('DB_PASSWORD', 'komet1');

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
define('AUTH_KEY',         'u,`Rrg`FD7o{ZRw-GSVro)rR/n8]]UUThSvA%CevHC,Ec=d%|:|>;-/^UieQ.8.#');
define('SECURE_AUTH_KEY',  '@]._5|+/]a!|6slT7c+iFcia*P+=1oIYR`%[W+RE<k RItKUOF>kE[*sd9L`b>Iv');
define('LOGGED_IN_KEY',    'In<oKn</z.=};_!i`T&+1xS`zx$%wk2j*qt>}?z6(UM)eX|2a!#UyVigqd)uTcS(');
define('NONCE_KEY',        'RT3(@0];tCMo|xVJuK>s|7v.ZW6}HZMyYq s{}D@GB4tcxUB9){+NWPlnuaacHJ0');
define('AUTH_SALT',        'FpTf%Y]n*!DJ-D1aSSC#T.Z^f7 q_J[@@.Le[D|EcrqdJ>`E-uyQ!n[q?wfcY=+?');
define('SECURE_AUTH_SALT', 'nf<-+Y.@bWRB[NCK34eRZ#F1(5D2ofRhO^PCw^w+z+;oXkLe: (7Zp{][^h12Sq7');
define('LOGGED_IN_SALT',   '?.|OQv#4Gwy %F0dyR~[|klc$|lS0,!Z3H[2hF[C?rQ*MLpCL8 ^w8$Co6|(p$dm');
define('NONCE_SALT',       'it//3r?b6b3FS:.M3C9nD[o`G(NCwCl{1MwdA&~Bv6wU9^(fT!-gPeM:ERQ^Zh~#');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'ns_';

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
