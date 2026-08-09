<?php
/**
 * Shared base class for PawTech Elementor widgets.
 *
 * @package PawTech
 */

defined( 'ABSPATH' ) || exit;

if ( ! class_exists( '\Elementor\Widget_Base' ) ) {
	return;
}

/**
 * Base widget: renders a theme template part with the widget settings.
 */
abstract class PawTech_Widget_Base extends \Elementor\Widget_Base {

	/**
	 * Template part slug inside template-parts/sections.
	 *
	 * @var string
	 */
	protected $part = '';

	/**
	 * Widget categories.
	 *
	 * @return array
	 */
	public function get_categories() {
		return array( 'pawtech' );
	}

	/**
	 * Keywords.
	 *
	 * @return array
	 */
	public function get_keywords() {
		return array( 'pawtech', 'pet', 'section' );
	}

	/**
	 * Icon.
	 *
	 * @return string
	 */
	public function get_icon() {
		return 'eicon-parallax';
	}

	/**
	 * Scripts the widget needs.
	 *
	 * @return array
	 */
	public function get_script_depends() {
		return array( 'pawtech-theme' );
	}

	/**
	 * Sanitize an Elementor settings array into safe scalars.
	 *
	 * @param array $settings Raw settings.
	 * @return array
	 */
	protected function clean( $settings ) {
		$clean = array();
		foreach ( (array) $settings as $key => $value ) {
			if ( is_array( $value ) ) {
				$clean[ $key ] = $this->clean( $value );
			} elseif ( is_bool( $value ) || is_int( $value ) || is_float( $value ) ) {
				$clean[ $key ] = $value;
			} else {
				$clean[ $key ] = sanitize_text_field( (string) $value );
			}
		}
		return $clean;
	}

	/**
	 * Render the matching template part.
	 */
	protected function render() {
		$args = $this->clean( $this->get_settings_for_display() );
		get_template_part( 'template-parts/sections/' . $this->part, null, $args );
	}
}
