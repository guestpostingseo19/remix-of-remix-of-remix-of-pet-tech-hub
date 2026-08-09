<?php
/**
 * PawTech theme bootstrap.
 *
 * @package PawTech
 */

defined( 'ABSPATH' ) || exit;

define( 'PAWTECH_VERSION', '1.0.0' );
define( 'PAWTECH_DIR', trailingslashit( get_template_directory() ) );
define( 'PAWTECH_URI', trailingslashit( get_template_directory_uri() ) );

require_once PAWTECH_DIR . 'inc/security.php';
require_once PAWTECH_DIR . 'inc/theme-setup.php';
require_once PAWTECH_DIR . 'inc/enqueue.php';
require_once PAWTECH_DIR . 'inc/template-functions.php';
require_once PAWTECH_DIR . 'inc/customizer.php';
require_once PAWTECH_DIR . 'inc/elementor.php';
