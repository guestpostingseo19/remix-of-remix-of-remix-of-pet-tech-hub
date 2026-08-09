<?php
/**
 * Services grid widget.
 *
 * @package PawTech
 */

defined( 'ABSPATH' ) || exit;

if ( ! class_exists( 'PawTech_Widget_Base' ) ) {
	return;
}

/**
 * PawTech services.
 */
class PawTech_Widget_Features extends PawTech_Widget_Base {

	protected $part = 'features';

	public function get_name() {
		return 'pawtech-features';
	}

	public function get_title() {
		return esc_html__( 'PawTech Services Grid', 'pawtech' );
	}

	public function get_icon() {
		return 'eicon-gallery-grid';
	}

	protected function register_controls() {
		$this->start_controls_section( 'content', array( 'label' => esc_html__( 'Content', 'pawtech' ) ) );

		$this->add_control( 'eyebrow', array( 'label' => esc_html__( 'Eyebrow', 'pawtech' ), 'type' => \Elementor\Controls_Manager::TEXT, 'default' => __( 'Our services', 'pawtech' ) ) );
		$this->add_control( 'title', array( 'label' => esc_html__( 'Title', 'pawtech' ), 'type' => \Elementor\Controls_Manager::TEXT, 'default' => __( 'Four services, one caring team', 'pawtech' ) ) );
		$this->add_control( 'intro', array( 'label' => esc_html__( 'Intro', 'pawtech' ), 'type' => \Elementor\Controls_Manager::TEXTAREA, 'default' => __( 'Everything we do goes into one simple timeline, so you can see location, health, behaviour and food in one place.', 'pawtech' ) ) );

		$repeater = new \Elementor\Repeater();
		$repeater->add_control( 'title', array( 'label' => esc_html__( 'Title', 'pawtech' ), 'type' => \Elementor\Controls_Manager::TEXT, 'default' => __( 'Live pet tracking', 'pawtech' ) ) );
		$repeater->add_control( 'copy', array( 'label' => esc_html__( 'Text', 'pawtech' ), 'type' => \Elementor\Controls_Manager::TEXTAREA ) );
		$repeater->add_control( 'card_image', array( 'label' => esc_html__( 'Image', 'pawtech' ), 'type' => \Elementor\Controls_Manager::MEDIA ) );
		$repeater->add_control( 'alt', array( 'label' => esc_html__( 'Image alt text', 'pawtech' ), 'type' => \Elementor\Controls_Manager::TEXT ) );

		$defaults = array();
		foreach ( pawtech_default( 'services' ) as $service ) {
			$defaults[] = array(
				'title'      => $service['title'],
				'copy'       => $service['copy'],
				'alt'        => $service['alt'],
				'card_image' => array( 'url' => PAWTECH_URI . 'assets/images/' . $service['image'] ),
			);
		}

		$this->add_control(
			'services',
			array(
				'label'       => esc_html__( 'Services', 'pawtech' ),
				'type'        => \Elementor\Controls_Manager::REPEATER,
				'fields'      => $repeater->get_controls(),
				'default'     => $defaults,
				'title_field' => '{{{ title }}}',
			)
		);

		$this->end_controls_section();
	}

	protected function render() {
		$s        = $this->get_settings_for_display();
		$services = array();

		if ( ! empty( $s['services'] ) && is_array( $s['services'] ) ) {
			foreach ( $s['services'] as $item ) {
				$services[] = array(
					'title'     => sanitize_text_field( (string) ( isset( $item['title'] ) ? $item['title'] : '' ) ),
					'copy'      => sanitize_textarea_field( (string) ( isset( $item['copy'] ) ? $item['copy'] : '' ) ),
					'alt'       => sanitize_text_field( (string) ( isset( $item['alt'] ) ? $item['alt'] : '' ) ),
					'image_url' => ! empty( $item['card_image']['url'] ) ? esc_url_raw( $item['card_image']['url'] ) : '',
				);
			}
		}

		get_template_part(
			'template-parts/sections/features',
			null,
			array(
				'eyebrow'  => sanitize_text_field( (string) ( isset( $s['eyebrow'] ) ? $s['eyebrow'] : '' ) ),
				'title'    => sanitize_text_field( (string) ( isset( $s['title'] ) ? $s['title'] : '' ) ),
				'intro'    => sanitize_textarea_field( (string) ( isset( $s['intro'] ) ? $s['intro'] : '' ) ),
				'services' => $services,
			)
		);
	}
}
