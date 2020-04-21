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
define( 'DB_NAME', 'wordpress_zonglus' );

/** MySQL database username */
define( 'DB_USER', 'root' );

/** MySQL database password */
define( 'DB_PASSWORD', '' );

/** MySQL hostname */
define( 'DB_HOST', 'localhost' );

/** Database Charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8mb4' );

/** The Database Collate type. Don't change this if in doubt. */
define( 'DB_COLLATE', '' );

/**#@+
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define( 'AUTH_KEY',         'B9D.9UpG=S eM^*6@!W6r+!9l_x@W}n PM#*%BA|%ptHo0$RceA$Qj!o% ,-r-}=' );
define( 'SECURE_AUTH_KEY',  'DP0s>SOFcEOM)nVhfwz$qQ<yZBR{Xz<#d8c0eNr0X<np@EQr!ejPSPDQuq/-_c@&' );
define( 'LOGGED_IN_KEY',    'Ey c^]vi+ u[`=Wz6rm5kVa^Q^&^WA]R/tSAAQ:AJ?,rRRYim1YCx$r^]]UJSN+J' );
define( 'NONCE_KEY',        'a)fuLj{3yQ,|hMy*]zM$-M4$,>a%lT<,)@$xxXUU}1xw@9JsEKT.ZFFjEknM<s|z' );
define( 'AUTH_SALT',        'xuldMiq`(.tpbhI!Fi&|<P,W6Ul;NyIjjmKcQ^JDPJd0u-zBX`<<?=nF@?[wZ(&n' );
define( 'SECURE_AUTH_SALT', 'Cl9tu 1b*XapBF]0]`(F&~!(~4Tg@G9M,sQ:Dq)3d<4${Uh4guL}S:>8X-X[X[ej' );
define( 'LOGGED_IN_SALT',   'I}R3@[k=N]ix;G) *hD];!}Rexg*~c(6nyGfBT%=/=%Dv%u C}NUJ14He]s9iM$<' );
define( 'NONCE_SALT',       '?1@spPna.(QC!!*<;5EkQ>/J*8nJ=Hb/#fv`Tg)F93p2K`oqTo/[E]g4@<%W>]h!' );

/**#@-*/

/**
 * WordPress Database Table prefix.
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
 * visit the Codex.
 *
 * @link https://codex.wordpress.org/Debugging_in_WordPress
 */
define( 'WP_DEBUG', false );

/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', dirname( __FILE__ ) . '/' );
}

/** Sets up WordPress vars and included files. */
require_once( ABSPATH . 'wp-settings.php' );
