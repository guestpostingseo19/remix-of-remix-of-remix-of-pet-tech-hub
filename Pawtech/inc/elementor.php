<?php
/**
 * Elementor integration: full theme support plus native PawTech widgets.
 *
 * @package PawTech
 */

defined( 'ABSPATH' ) || exit;

/**
 * Is the current (or given) page built with Elementor?
 *
 * @param int|null $post_id Post ID.
 * @return bool
 */
function pawtech_is_elementor_page( $post_id = null ) {
	if ( ! did_action( 'elementor/loaded' ) || ! class_exists( '\Elementor\Plugin' ) ) {
		return false;
	}
	$post_id = $post_id ? (int) $post_id : (int) get_the_ID();
	if ( ! $post_id ) {
		return false;
	}
	$documents = \Elementor\Plugin::$instance->documents;
	if ( ! $documents ) {
		return false;
	}
	$document = $documents->get( $post_id );
	return $document && $document->is_built_with_elementor();
}

/**
 * Declare theme support so Elementor uses the theme's header/footer wrappers.
 */
function pawtech_elementor_theme_support() {
	add_theme_support( 'elementor' );
	add_theme_support( 'elementor-pro' );
	add_theme_support( 'elementor-default-fonts' );
}
add_action( 'after_setup_theme', 'pawtech_elementor_theme_support' );

/**
 * Register a dedicated widget category.
 *
 * @param \Elementor\Elements_Manager $elements_manager Manager.
 */
function pawtech_elementor_category( $elements_manager ) {
	$elements_manager->add_category(
		'pawtech',
		array(
			'title' => esc_html__( 'PawTech', 'pawtech' ),
			'icon'  => 'fa fa-paw',
		)
	);
}
add_action( 'elementor/elements/categories_registered', 'pawtech_elementor_category' );

/**
 * Register the PawTech widgets.
 *
 * @param \Elementor\Widgets_Manager $widgets_manager Manager.
 */
function pawtech_register_elementor_widgets( $widgets_manager ) {
	require_once PAWTECH_DIR . 'inc/elementor/class-pawtech-widget-base.php';

	$widgets = array(
		'hero'         => 'PawTech_Widget_Hero',
		'stats'        => 'PawTech_Widget_Stats',
		'features'     => 'PawTech_Widget_Features',
		'telehealth'   => 'PawTech_Widget_Telehealth',
		'how-it-works' => 'PawTech_Widget_How_It_Works',
		'pricing'      => 'PawTech_Widget_Pricing',
		'faq'          => 'PawTech_Widget_Faq',
		'blog'         => 'PawTech_Widget_Blog',
	);

	foreach ( $widgets as $file => $class ) {
		$path = PAWTECH_DIR . 'inc/elementor/widgets/class-pawtech-widget-' . $file . '.php';
		if ( file_exists( $path ) ) {
			require_once $path;
			if ( class_exists( $class ) ) {
				$widgets_manager->register( new $class() );
			}
		}
	}
}
add_action( 'elementor/widgets/register', 'pawtech_register_elementor_widgets' );

/**
 * Elementor page settings: let the canvas use the full width safely.
 */
function pawtech_elementor_body_class( $classes ) {
	if ( pawtech_is_elementor_page() ) {
		$classes[] = 'pawtech-elementor';
	}
	return $classes;
}
add_filter( 'body_class', 'pawtech_elementor_body_class' );
