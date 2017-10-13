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
define('DB_NAME', 'ss_db');

/** MySQL database username */
define('DB_USER', 'claudia');

/** MySQL database password */
define('DB_PASSWORD', 'XmK7B3OrWf8PHT2q');

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
define('AUTH_KEY',         'V:$!(ofbw1Fm9-AsBZ#EQ9YFSfl-sS:ogj+LgZ*:5Uoeoi]RD`7UBzGDlT8]y:2!');
define('SECURE_AUTH_KEY',  'p+++CF}gbUH?#)!lKihGQ&eKaF8+H5=_8}z{!],(xVW|I^$yf8{Wl`.cEdP^S#kh');
define('LOGGED_IN_KEY',    'HVA$8*v&>N1z ~uCK6[&lc-Z(aVy{?;xFjla@FtR2n,wx?Xd/yTxV$?~Itgbj^iS');
define('NONCE_KEY',        'Rd/_rY=_, 9y%e(SQXz#C$/9/8#!Ud}:7B2.U!Ov<jN,cuGXcSZAQ6=fxD+kIsCw');
define('AUTH_SALT',        '-Ctf?::bTgCttVK*Rkz5svF 4m@8~_=:Q1m~7UsU9BwK:Pb*MYB,>otr<4^)QA_R');
define('SECURE_AUTH_SALT', '@UIJN?Dg}*%<LrYs{x`qR4fRf:h#cz;G}/>rE-Il[H]&P&HectA?(|fN`$.0zo/@');
define('LOGGED_IN_SALT',   'z7N>d-M->;d}6Cd`4RETkF|Z/MrvW}KS(qR}Q@$^-,=w8}`n|C0K9LJaW9zd[|u9');
define('NONCE_SALT',       'VIt6Lyb7S[ccQa_kR?CS^hcrYmK}~D(v?dGnf0HdRQJcIG>ma+7sFJD#yv1rG8dI');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'ss_';

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

