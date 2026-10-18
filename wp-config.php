<?php
/**
 * The base configuration for WordPress
 *
 * The wp-config.php creation script uses this file during the installation.
 * You don't have to use the website, you can copy this file to "wp-config.php"
 * and fill in the values.
 *
 * This file contains the following configurations:
 *
 * * Database settings
 * * Secret keys
 * * Database table prefix
 * * ABSPATH
 *
 * @link https://developer.wordpress.org/advanced-administration/wordpress/wp-config/
 *
 * @package WordPress
 */

// ** Database settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'sunglass' );

/** Database username */
define( 'DB_USER', 'root' );

/** Database password */
define( 'DB_PASSWORD', '' );

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
define( 'AUTH_KEY',         '/*EK~~1UoIOe#hEP@g.Hl.ss3bg3/fkKfz.DUuGp`krDvC8#tz`#9eO+oS$~jN)%' );
define( 'SECURE_AUTH_KEY',  'ccBl %Ujq^J=>n+1bw&>}*XL~-Q@wN)l:t3hFC3X$S=+*J0y7WAHEv;-:#)jtEKt' );
define( 'LOGGED_IN_KEY',    'wgG=h7qXIhYd_l_DYWU!LomFhjr.f`y}Iz8zjT(XY&!*Ec??No&B8}y8%w{qmUUh' );
define( 'NONCE_KEY',        'Mr2:pPS):|9DtkQ;[IG}+R8]esSDUNHx?w`1U%yA` `0lR~6-7hK6OMp:V0;liKs' );
define( 'AUTH_SALT',        '[!x*J;Sg9c-.hG-k@#B6~d[B4GQt=KEW2>~,I72lH?7tZ j(#[;+HtQ-pyq.aP|-' );
define( 'SECURE_AUTH_SALT', 'dGQ&6p_kVwjWs]yE:QZM.E6x^Eihs~}U3Y?ok,?|i(P8Z[8n9xjwPOTpUzWa0<]R' );
define( 'LOGGED_IN_SALT',   'I=nbYi~UW>(xX&pdO^wCKaqtwZ@,B)_5$&59r}))r4c%+9aJCv}Z&4xz{wfg^dW(' );
define( 'NONCE_SALT',       'B:]1yU`/_q!H`4+RdkUfjkeHR5bi7dgv%3ZAkf!%seKQ3r<h7XxO}`EU2yk]Pau7' );

/**#@-*/

/**
 * WordPress database table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 *
 * At the installation time, database tables are created with the specified prefix.
 * Changing this value after WordPress is installed will make your site think
 * it has not been installed.
 *
 * @link https://developer.wordpress.org/advanced-administration/wordpress/wp-config/#table-prefix
 */
$table_prefix = 'wp_S_feS';

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
 * @link https://developer.wordpress.org/advanced-administration/debug/debug-wordpress/
 */
define( 'WP_DEBUG', false );

/* Add any custom values between this line and the "stop editing" line. */
define( 'FS_METHOD', 'direct' );



/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
