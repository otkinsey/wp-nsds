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
define('AUTH_KEY',         '(U*6f+lB&J]!Xq$2#`g-h#(1;!?,2gdphwG}5f.bz^jnsSqj!dB4YPQjn|72 <&N');
define('SECURE_AUTH_KEY',  '+9)CNnYI/[dH&@W0dKN/?*Mti0IHj211a+G ;o{q,ZHWr-E6V(O+B(Ck-tR@]NKL');
define('LOGGED_IN_KEY',    'b6+:p7|q6kSuz2G|2~&e&Yl6L-/xK9[<1/{o cms<^AgN-=Y){SNjBtw26_vopn|');
define('NONCE_KEY',        'j{sL@KrIJ#zp+#Klj//bVGg>Kwl--96JF)sp|-S|T>VNJ(6Tza{>d]5z_AVylCA-');
define('AUTH_SALT',        '+nL3TJdCP3{3}fa1KX`Z-_Q5{(A=-aJl^T)zg7e@]g-<-c]>-<dL/A04E(]u20h]');
define('SECURE_AUTH_SALT', '3ld~+(jCHD6oB|#-gsJ=iRsHu<=n*)`;()<vX2L9(`qbrXl??}?3U@w;)`t qQfb');
define('LOGGED_IN_SALT',   'O}3|qr@V 2RUmy|`!HY5h94tA%TCV7%&k5lfdCBr1y]=D>ibA9+>CWJ{uX;*?jq1');
define('NONCE_SALT',       '7?R3y<PU^)uQw3H9Sh6+aWj35k<K@XGVxI7P?_W~k`]1^<(re-Ar:+1Z}N&0.m.^');

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
