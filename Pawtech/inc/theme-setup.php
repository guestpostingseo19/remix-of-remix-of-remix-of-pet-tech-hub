<?php
/**
 * Theme supports, menus, sidebars.
 *
 * @package PawTech
 */

defined( 'ABSPATH' ) || exit;

/**
 * Register theme supports.
 */
function pawtech_setup() {
	load_theme_textdomain( 'pawtech', PAWTECH_DIR . 'languages' );

	add_theme_support( 'automatic-feed-links' );
	add_theme_support( 'title-tag' );
	add_theme_support( 'post-thumbnails' );
	add_theme_support( 'customize-selective-refresh-widgets' );
	add_theme_support( 'align-wide' );
	add_theme_support( 'responsive-embeds' );
	add_theme_support( 'editor-styles' );
	add_editor_style( 'assets/css/theme.css' );

	add_theme_support(
		'html5',
		array( 'search-form', 'comment-form', 'comment-list', 'gallery', 'caption', 'style', 'script', 'navigation-widgets' )
	);

	add_theme_support(
		'custom-logo',
		array(
			'height'      => 64,
			'width'       => 64,
			'flex-height' => true,
			'flex-width'  => true,
		)
	);

	register_nav_menus(
		array(
			'primary'        => esc_html__( 'Primary menu', 'pawtech' ),
			'footer-services' => esc_html__( 'Footer — Services', 'pawtech' ),
			'footer-care'    => esc_html__( 'Footer — Care', 'pawtech' ),
			'footer-company' => esc_html__( 'Footer — Company', 'pawtech' ),
		)
	);

	add_image_size( 'pawtech-card', 1280, 720, true );
	add_image_size( 'pawtech-feature', 1024, 1024, true );
}
add_action( 'after_setup_theme', 'pawtech_setup' );

/**
 * Content width for embeds.
 */
function pawtech_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'pawtech_content_width', 1152 );
}
add_action( 'after_setup_theme', 'pawtech_content_width', 0 );

/**
 * Widget areas.
 */
function pawtech_widgets_init() {
	register_sidebar(
		array(
			'name'          => esc_html__( 'Blog sidebar', 'pawtech' ),
			'id'            => 'pawtech-sidebar',
			'description'   => esc_html__( 'Shown beside blog archives and single posts.', 'pawtech' ),
			'before_widget' => '<section id="%1$s" class="pawtech-widget %2$s rounded-2xl hairline bg-surface p-6 mb-6">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="font-display text-base font-semibold mb-3">',
			'after_title'   => '</h2>',
		)
	);
	register_sidebar(
		array(
			'name'          => esc_html__( 'Footer extra', 'pawtech' ),
			'id'            => 'pawtech-footer',
			'description'   => esc_html__( 'Optional widgets rendered above the footer credit line.', 'pawtech' ),
			'before_widget' => '<div id="%1$s" class="pawtech-widget %2$s">',
			'after_widget'  => '</div>',
			'before_title'  => '<h2 class="mb-3 text-xs font-semibold uppercase tracking-[0.18em] text-primary">',
			'after_title'   => '</h2>',
		)
	);
}
add_action( 'widgets_init', 'pawtech_widgets_init' );
