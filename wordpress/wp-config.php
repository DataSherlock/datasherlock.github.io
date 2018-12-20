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
define('DB_NAME', 'us4hix2x_wp288');

/** MySQL database username */
define('DB_USER', 'us4hix2x_wp288');

/** MySQL database password */
define('DB_PASSWORD', '4i-S-pdD47');

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
define('AUTH_KEY',         'kfuoswxxdketjk6g1w4xz2ujwfg2f3ztbienzz73ftuw1feigkhn03nwooddpzaj');
define('SECURE_AUTH_KEY',  'ni2b0tllaqbpfgvxkow7uc7ryyceskfe1bvgq8r30dz469yskssrykxjnxq3n3ax');
define('LOGGED_IN_KEY',    'ashizkl63euppvluymp6z6w7fq05x3eptkhiqzqy9wycnsy64f4uukrrf68wyhlk');
define('NONCE_KEY',        'utoeswpsm7ozohhom6yj3jgpf4wtucaix78plyquojgpxe6d5feld1sfaqwt9q5s');
define('AUTH_SALT',        'dlr0ftkxf1lehgj2tpry7vkt3iytztjk456wesszwwaynr4i6x6mzq6pcaufsox1');
define('SECURE_AUTH_SALT', 'uvbzagufc2j6dyliq769ibjs2sd5uq3oxtddn1qxm9rxfayipwh227ndkqf3rr2c');
define('LOGGED_IN_SALT',   'csrmlests8tniph3cteox8tk9zsyhzy8mx3crtptwdxvwjtybcv8apcy2t4l0dtc');
define('NONCE_SALT',       'bqqledukkx2vc0gv8flqhicoya2zd39xjn8pgybsnym1vg7q3eltkaaculo3buzg');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'wppv_';

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

/* Multisite */
define( 'WP_ALLOW_MULTISITE', true );
define('MULTISITE', true);
define('SUBDOMAIN_INSTALL', false);
define('DOMAIN_CURRENT_SITE', 'jeromerajan.com');
define('PATH_CURRENT_SITE', '/');
define('SITE_ID_CURRENT_SITE', 1);
define('BLOG_ID_CURRENT_SITE', 1);

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
