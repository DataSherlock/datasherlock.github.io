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
define('DB_NAME', 'us4hix2x_wp354');

/** MySQL database username */
define('DB_USER', 'us4hix2x_wp354');

/** MySQL database password */
define('DB_PASSWORD', '4.r6@LwS5p');

/** MySQL hostname */
define('DB_HOST', 'localhost');

/** Database Charset to use in creating database tables. */
define('DB_CHARSET', 'utf8');

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
define('AUTH_KEY',         'lz9n5cftz8lsmmbcviukg1anur5ncsebrtjwkgoa5cjazkirdr74jyffr4dijy6f');
define('SECURE_AUTH_KEY',  'hlwgvfgorqmxujvhiahifoa53xxdo7jwlucakljcpryh5pe4cmxaenqzft7mjba1');
define('LOGGED_IN_KEY',    'hpb3vdzobfakrqadvuwprla1ndx9mfhciupaej2hefgvqz4bdsr44xdilzhalj42');
define('NONCE_KEY',        'ozh5nygmb86v0qerz3sjwh1ze5sikiwydlolk36jlcnimfir6m6hbsvnx3a0wlxm');
define('AUTH_SALT',        'vrerd68qmzm5gbcaqjirvrf3cthjmuq5g8uqbqkq42p8zf1lgheehkqhglvhr7k9');
define('SECURE_AUTH_SALT', 'hudsrtvhoyk0jsynfjauj3eic7jk7cqnrfnw5phjmep5dpmtwjvg1ikirvccea00');
define('LOGGED_IN_SALT',   'ar737kavau0pfuwgdlzvdkdr90jyzmpd1tcinbtzf75fmdljuukhaei0r3certyr');
define('NONCE_SALT',       'rq3hfr9sobpshdzh7swm1bxmtb0hjsjeh36vkhrz9uqpnz2xolsjmma7y26xh5sa');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'wpw3_';

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
