<?php

/**
 * The base configurations of the WordPress.
 *
 * This file has the following configurations: MySQL settings, Table Prefix,
 * Secret Keys, and ABSPATH. You can find more information by visiting
 * {@link https://codex.wordpress.org/Editing_wp-config.php Editing wp-config.php}
 * Codex page. You can get the MySQL settings from your web host.
 *
 * This file is used by the wp-config.php creation script during the
 * installation. You don't have to use the web site, you can just copy this file
 * to "wp-config.php" and fill in the values.
 *
 * @package WordPress
 */
//define('WP_HOME','http://isardsat-localhost/');
//define('WP_SITEURL','http://isardsat-localhost/');
//
define('WP_SITEURL', 'http://' . $_SERVER['HTTP_HOST']);
define('WP_HOME', 'http://' . $_SERVER['HTTP_HOST']);
// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define('DB_NAME', 'isardsatdb_prod');

/** MySQL database username */
define('DB_USER', 'webap');

/** MySQL database password */
//define('DB_PASSWORD', '23W#yQ;xfVCkhH4s');
define('DB_PASSWORD', 'Alkaline10');

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
define('AUTH_KEY',         '/MuK3&5boOa>iS!)<&|.QcNv]k;%hsz/MCvT?-lNz#q1a<I+>Uc<G.zYgvZd!I,u');
define('SECURE_AUTH_KEY',  'p^)`,Xz#xN+$=%+Qo1a`L:(eY!o!FBKgNlyLzF*7yh|hw*nrEa(E16#S:]tQM[-3');
define('LOGGED_IN_KEY',    'YmKo};af7V=AtFL4p6{3>aF_5k^:P&+}dOz7?m^r,)=@44)5eL[vS|4~`W:]c/bE');
define('NONCE_KEY',        'QoFXEQAi_$>K9yG<vt07JM<c04`Ej5`5=S)]U2)AYp/@/ney,5OzA_7z}$zB-E%y');
define('AUTH_SALT',        '7|a$+ks_O4J66[%4iLOTU5=KMseW)Uj>,m,Zq@gZ6s@|5`o$3bm=L|bbj)F||qy|');
define('SECURE_AUTH_SALT', ' vEF+_9T_bQ!!#EiJqu,4[5}fK{P=;^03M+zH4SrS!4mH#D7<fmZ6Luma|^@bYBc');
define('LOGGED_IN_SALT',   '2p7?a+t6rEF`qj=?5e`+C(I(=x?-6xD2YT!MX30ejf!i_mj|kJV++KB4S+p- <b?');
define('NONCE_SALT',       '3C30#y0hm, CtLd+_:l:,4bOZby~3 >,&/1hQ-a:sk44/&nO=(Or^Z)-}y&K;VdN');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each a unique
 * prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'wp_';

/**
 * For developers: WordPress debugging mode.
 *
 * Change this to true to enable the display of notices during development.
 * It is strongly recommended that plugin and theme developers use WP_DEBUG
 * in their development environments.
 */
define('WP_DEBUG', false);

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
