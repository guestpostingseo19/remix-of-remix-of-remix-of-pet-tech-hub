<?php
/**
 * Security hardening.
 *
 * @package PawTech
 */

defined( 'ABSPATH' ) || exit;

/**
 * Remove version fingerprinting and unused discovery endpoints.
 */
function pawtech_harden_head() {
	remove_action( 'wp_head', 'wp_generator' );
	remove_action( 'wp_head', 'wlwmanifest_link' );
	remove_action( 'wp_head', 'rsd_link' );
	remove_action( 'wp_head', 'wp_shortlink_wp_head' );
	remove_action( 'wp_head', 'adjacent_posts_rel_link_wp_head', 10 );
}
add_action( 'init', 'pawtech_harden_head' );

/**
 * Strip the WordPress version from enqueued asset URLs.
 *
 * @param string $src Asset URL.
 * @return string
 */
function pawtech_strip_asset_version( $src ) {
	if ( $src && false !== strpos( $src, 'ver=' . get_bloginfo( 'version' ) ) ) {
		$src = remove_query_arg( 'ver', $src );
	}
	return $src;
}
add_filter( 'style_loader_src', 'pawtech_strip_asset_version', 9999 );
add_filter( 'script_loader_src', 'pawtech_strip_asset_version', 9999 );

/**
 * Never leak whether a username exists through login errors.
 *
 * @return string
 */
function pawtech_generic_login_error() {
	return esc_html__( 'The credentials you entered are not valid.', 'pawtech' );
}
add_filter( 'login_errors', 'pawtech_generic_login_error' );

/**
 * Disable XML-RPC (a common brute-force and pingback amplification vector).
 */
add_filter( 'xmlrpc_enabled', '__return_false' );
add_filter( 'wp_xmlrpc_server_class', '__return_false' );

/**
 * Block REST user enumeration for anonymous visitors.
 *
 * @param mixed $result Current result.
 * @return mixed
 */
function pawtech_restrict_rest_users( $result ) {
	if ( ! empty( $result ) ) {
		return $result;
	}
	if ( is_user_logged_in() ) {
		return $result;
	}
	$route = isset( $GLOBALS['wp']->query_vars['rest_route'] ) ? (string) $GLOBALS['wp']->query_vars['rest_route'] : '';
	if ( '' !== $route && preg_match( '#^/wp/v2/users#', $route ) ) {
		return new WP_Error(
			'rest_user_cannot_view',
			esc_html__( 'Authentication required.', 'pawtech' ),
			array( 'status' => 401 )
		);
	}
	return $result;
}
add_filter( 'rest_authentication_errors', 'pawtech_restrict_rest_users' );

/**
 * Redirect ?author=N enumeration attempts to the homepage.
 */
function pawtech_block_author_scan() {
	if ( is_admin() ) {
		return;
	}
	if ( ! is_user_logged_in() && isset( $_GET['author'] ) && ! is_author() ) { // phpcs:ignore WordPress.Security.NonceVerification.Recommended
		wp_safe_redirect( home_url( '/' ), 301 );
		exit;
	}
}
add_action( 'template_redirect', 'pawtech_block_author_scan' );

/**
 * Send conservative security headers on front-end responses.
 */
function pawtech_security_headers() {
	if ( headers_sent() || is_admin() ) {
		return;
	}
	header( 'X-Content-Type-Options: nosniff' );
	header( 'X-Frame-Options: SAMEORIGIN' );
	header( 'Referrer-Policy: strict-origin-when-cross-origin' );
	header( 'Permissions-Policy: geolocation=(), microphone=(), camera=(), interest-cohort=()' );
	if ( is_ssl() ) {
		header( 'Strict-Transport-Security: max-age=31536000; includeSubDomains' );
	}
}
add_action( 'send_headers', 'pawtech_security_headers' );

/**
 * Disable file editing from the dashboard when the site owner has not opted in.
 */
if ( ! defined( 'DISALLOW_FILE_EDIT' ) ) {
	define( 'DISALLOW_FILE_EDIT', true );
}

/**
 * Allow only safe HTML in theme-authored rich text fields.
 *
 * @param string $html Raw HTML.
 * @return string
 */
function pawtech_kses( $html ) {
	return wp_kses(
		(string) $html,
		array(
			'a'      => array(
				'href'   => array(),
				'title'  => array(),
				'rel'    => array(),
				'target' => array(),
			),
			'strong' => array(),
			'em'     => array(),
			'br'     => array(),
			'span'   => array( 'class' => array() ),
		)
	);
}
