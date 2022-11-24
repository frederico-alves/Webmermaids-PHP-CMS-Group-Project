<?php
/**
 * 
 * user: admin
 * pass: 123
 * 
 * 
 * 
 * 
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
 * @link https://wordpress.org/support/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** Database settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'webmermaids-wordpress' );

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
define( 'AUTH_KEY',         'b/ceQ:HFKc|$HJE{J4D75v&3;T`ui)3N<Nb.:(cL)IE{ckh>pk}_`N3wK7fGp#pa' );
define( 'SECURE_AUTH_KEY',  'TGgbn}-,CLv1?85:z JFg>v2xH{lw$i0:]z*73)Cz?^ZTfeuP=ku:p`En3A+HZ}=' );
define( 'LOGGED_IN_KEY',    '8%84J] GpIIhuiJ8-[s;UTVoM.Y3MIF|u,*H0#,w!wFI7[Q$wpg*@?s{7;1wjxBC' );
define( 'NONCE_KEY',        't>rX<Q{_FJJu75!GrnVv>1G;KEeUUS#eFs[:ZTKF23#yW6eC4)&jXro!3y$S}qP>' );
define( 'AUTH_SALT',        'GUpok{F)eg5aP);Gw#:Fy]C%&J5(PH&`#ji(O ~b9e_tM$W+N?z.n5QtEX2l1?60' );
define( 'SECURE_AUTH_SALT', 'tG/kJY# 1G73&*pv;r~FfkCl!9TX|e%^f?[c~+7t`pGK ;cIeKFWt&1qsOv|p(~k' );
define( 'LOGGED_IN_SALT',   '.)N-Dc@j?4AdKzh:cDA+ao/ZO)%.Ywm;T/*S=C,u0)t:Hq2Lu#Sjaq!`(WMqbN]o' );
define( 'NONCE_SALT',       'n#-g^&Dv+qQ}(9g|y>Q(/=g)B:alT3vX:nW$=.z:[z6JIXWu10T`)*|j;rQgRs92' );

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
 * @link https://wordpress.org/support/article/debugging-in-wordpress/
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
