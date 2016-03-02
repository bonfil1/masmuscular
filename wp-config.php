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
define('DB_NAME', 'masmusc');

/** MySQL database username */
define('DB_USER', 'masmuscular');

/** MySQL database password */
define('DB_PASSWORD', '$masmuscular$');

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
define('AUTH_KEY',         ',t(:JD,qM%HcXvg4?6_{AWTHBb+^z_z70lz)nH[SzWU1~K 0Z4#%x.]9Oc+:3QZt');
define('SECURE_AUTH_KEY',  'ZEq5Q[*O5 jW& S, 52wKpil;~B{($*0=@q$q=b(W%vb.1Drw,Yrk-BP:=XZdyj{');
define('LOGGED_IN_KEY',    '0$rA^>gwa/#oP`);N@lFPz=9NN<[dA;~, 0tF)il07bMg!ha`RLu(sjdZ <hU)lX');
define('NONCE_KEY',        '/:Fry{!wBjSj`2n(GuYCYb-}`c@SfR(W=Q;-XM.2}w2T=COIuRr5@w#FU%MILDoz');
define('AUTH_SALT',        'f}gN$D+dW~VZV+B%^XV%#CA-kdEsU-qWMqZop*iz7!2b0YtVl@^vS5pkH&+)ZXJ0');
define('SECURE_AUTH_SALT', 'j-P)P2]EqJg+R%}LvxO3|8A,W<ol2~^OiNP`. Y27}?H$Hh4:!;c9jSD:=56i rJ');
define('LOGGED_IN_SALT',   'oi$oti;W9|4B<XAUxz,c*@8zj!C!/J5:-@PXo|$KULaF:p%D#RkZ37,glme/g5u&');
define('NONCE_SALT',       'VQ-S0}qp2Vm)I)YTB5c^m~05Pih?)21>nf9{nbjx&2Y4Xss(1YJ?:q58sDR9|(^N');

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
define('WP_DEBUG', false);

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
