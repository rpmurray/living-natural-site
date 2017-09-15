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
define('DB_NAME', 'wordpress');

/** MySQL database username */
define('DB_USER', 'wordpress_admin');

/** MySQL database password */
define('DB_PASSWORD', 'wordpress_admin');

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
define('AUTH_KEY',         '%5tN!?o;Y}3q+E75oFE@<&?v6&g/2(W@JK[%e/,Y;F{9I1k) ?ZF1i@bhk52w!<?');
define('SECURE_AUTH_KEY',  'QmPN>ASU{Bwx8:u~DF!]FSw[jyqcP{a|V71Ocas+))c7ft&.O:S|1.`*F%wn4q_W');
define('LOGGED_IN_KEY',    '-byw#1;U<f0o K+ON]xKMhv=JH?%eocGZ4Xtba=-nB,I:q94#gd;=VP.CM_WRaoH');
define('NONCE_KEY',        'q ^Cr4<Na?bZmp.Bo~Ev[=R3`HCT?n>27Ry}jGb!9#n[TET-#!PDLQ{Q4E?,3c3o');
define('AUTH_SALT',        'Z+.SfJ`tqT,Mu|O~`=9!pcj9fPP>DFVUjX-pORP+xKT?~WPCz:3AGm]e>2++w8Dt');
define('SECURE_AUTH_SALT', '~SHBlk!?E2}320cR3Xr.Pq:~o.Tp6Ui_s.NN:ktxwki9Em,VOoI;b=@])b<!gZ(v');
define('LOGGED_IN_SALT',   '=}H:Olf%Ud`Zp-(4F(M?~;Zb$r*v@G`N-CP}9l%T$raqrbHr)cdjyN#oiAS7}K>^');
define('NONCE_SALT',       '>!8o]5<1CA5b0Sr%Q><W&|HXcD?`Qr>d6aX%uCpznzhSkUNt5acCfQU1bVJ?53NI');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'wp_';

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
define('WP_DEBUG', true);
define('WP_DEBUG_LOG', true);
define( 'WP_DEBUG_DISPLAY', true);

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');

