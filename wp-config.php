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

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define('DB_NAME', 'aceroinc_wordpressadf');

/** MySQL database username */
define('DB_USER', 'root');

/** MySQL database password */
define('DB_PASSWORD', 'root');

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
define('AUTH_KEY', 'SLBPm/mW}sQCTXyi}?+T/XM?]Mcb_addD)l^p)@c|<!ETAt&s*sOY-PVYQG><mH[hv/BB@BC)tj%UU)A<+_ePcjJxS/jc?fo+Zke|m|qFS]P^v+Z{^gK}vRufVyjK@ms');
define('SECURE_AUTH_KEY', '<yr!^Pg%iL*{{@}+vgTGW;=q{x=umkez(<^!FKL=vuZF|eLaQsT|?=DIuav[E>vkhFtT;PdC>rm-w>O%My;TvaXb@E$]DIlnzXEfd%)Yn[VJN$&iSxw!mGzTL=oJGsb)');
define('LOGGED_IN_KEY', 'q<p(@JR|)@rOss=b{<+M+])g$Tl)pPLr$&HGU}gzgkmIUUI%xTfLgjR|/D<Au}zt@=sdadL<JdDiK_WGoNQnNUjnqO||kk*}z?Z;XznyyV{&ZBOCGKEto}nzFV&NANR_');
define('NONCE_KEY', 'i((ktB/uM*^lMw^rUYpWik%*ODI=AigGDvy]p=KjKa]QS+ffwvx{al[;Ei&zck$cs+bkvv]f-*[*vZoO&wrVT[=j@hZy^Qr<DWd=-ZL(b|)N);lwNUBOKy{bk$WH%$LR');
define('AUTH_SALT', '(mmg]?<nCugo>c=mN(vJ$fZiOvz!DjW@ty*$ho<%]APFo/gKNa*$|[Qw_Q]tEuhe{dtWDJx/m<D&FaefoAhP<da=@{zK!I<]i+>H_*geZNY-gufbzr]!PEeZ>;hNUzE|');
define('SECURE_AUTH_SALT', 'XS%YBrBJI=_[H|%D{w(t>U(rAM/boRwkA-fB+m}wGbMuG{&ijny*%QRc;+$WUD/;f=PzXP}?O&h]h_&/wQ@}LSBdFZr>odQ)n=FL<RYs|?jdqN=kB($o@%v{dfAtBX(v');
define('LOGGED_IN_SALT', 'acZuh!Klutg<;|}PVwElgR@aF$EfLsuwomKESRtUuMB^$lfTRV+kZQdio?MpPF|oZQQNlMmt}UPWhPr{cn[@$kkgKRMOA^/FdLoL]o^/;IsK|CRJUTcBaSPt@v*RQH<n');
define('NONCE_SALT', 'u=|sB_MQdY=L=y@c/)*betjmhRh@G[_yN_Ai]CLQTaBHdkjS(WaM=qIV_u/!NjL+)&bEGK{&VG=D/_/yU}<NTOnnBQ{JC>]LphTB>Ia]F/lfK*Tgur)LZm{+F!$@ZvX;');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each a unique
 * prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'wp_nhvu_';

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

/**
 * Include tweaks requested by hosting providers.  You can safely
 * remove either the file or comment out the lines below to get
 * to a vanilla state.
 */
if (file_exists(ABSPATH . 'hosting_provider_filters.php')) {
	include('hosting_provider_filters.php');
}
