<?php
/**
 * The base configuration for WordPress
 *
 * The wp-config.php creation script uses this file during the installation.
 * You don't have to use the web site, you can copy this file to "wp-config.php"
 * and fill in the values.
 *
 * This file contains the following configurations:
 *
 * * Database settings
 * * Secret keys
 * * Database table prefix
 * * ABSPATH
 *
 * @link https://wordpress.org/documentation/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** Database settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'portfolio' );

/** Database username */
define( 'DB_USER', 'root' );

/** Database password */
define( 'DB_PASSWORD', 'root' );

/** Database hostname */
define( 'DB_HOST', 'localhost:3307' );

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
define( 'AUTH_KEY',         'W(R6G4GL[w}{psVoKa!3WH1loK6g9|^QI8hFOzh&DOCJw?|l)Bp,+5OM5a7h4@R_' );
define( 'SECURE_AUTH_KEY',  'YUA&H*Cq| WWj[-nIpi2>cL_*jgq@<0NC^JOuFv^D+K}WC{YAmQO:!mWD*/bs&wW' );
define( 'LOGGED_IN_KEY',    ' nGmR&2F)fyD?p~%wXH-tG:|[I3,-;gcGxMl@y^;]j>b=5WlNNqz(*yjKFLN]Lz ' );
define( 'NONCE_KEY',        'I5L~[*e!lamEIyt@1*Y6X)Ud9!l>mT-Igh!zV{fC;[yWZH(.>IQ_/^ ExK0,xq$F' );
define( 'AUTH_SALT',        'Ra:B*Mj^YCMa#5SL~$m*oKJdzOJLIGf#L3+GT4TcGT0X2{ZVpt6Q9S#?-HcaY(bN' );
define( 'SECURE_AUTH_SALT', 'RYA`aY|h<4$?N_^[ fjhK2* MQp_6yja%tX*=68J)VoM(HZ5;|g13.zL[^Dw2tX`' );
define( 'LOGGED_IN_SALT',   'bXJ@p65w11AA6(nI+*__DO*Hh,_guQ$[Mrt{F%^d1&7l}R6XUI4OWq#O^L&Q`}XP' );
define( 'NONCE_SALT',       'hb+:;4M]Qu3VNTZdI{OFs!F@S&oq5a{&$Ii!0T_l?1h3`g2y#j2F=lI}Ko=x!b6%' );

/**#@-*/

/**
 * WordPress database table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'wp_';

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
 * @link https://wordpress.org/documentation/article/debugging-in-wordpress/
 */
define( 'WP_DEBUG', false );

/* Add any custom values between this line and the "stop editing" line. */



/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
