<?php
/**
 * Telehealth widget.
 *
 * @package PawTech
 */

defined( 'ABSPATH' ) || exit;

if ( ! class_exists( 'PawTech_Widget_Base' ) ) {
	return;
}

/**
 * PawTech telehealth section.
 */
class PawTech_Widget_Telehealth extends PawTech_Widget_Base {

	protected $part = 'telehealth';

	public function get_name() {
		return 'pawtech-telehealth';
	}

	public function get_title() {
		return esc_html__( 'PawTech Vet Calls', 'pawtech' );
	}

	public function get_icon() {
		return 'eicon-video-camera';
	}

	protected function register_controls() {
		$this->start_controls_section( 'content', array( 'label' => esc_html__( 'Content', 'pawtech' ) ) );

		$this->add_control( 'eyebrow', array( 'label' => esc_html__( 'Eyebrow', 'pawtech' ), 'type' => \Elementor\Controls_Manager::TEXT, 'default' => __( 'Vet video calls', 'pawtech' ) ) );
		$this->add_control( 'title', array( 'label' => esc_html__( 'Title', 'pawtech' ), 'type' => \Elementor\Controls_Manager::TEXT, 'default' => __( 'Talk to a vet before you get in the car', 'pawtech' ) ) );
		$this->add_control( 'intro', array( 'label' => esc_html__( 'Intro', 'pawtech' ), 'type' => \Elementor\Controls_Manager::TEXTAREA, 'default' => __( "Most late-night worries can be sorted out on a call. Our vets already have your pet's health notes, so you don't have to explain everything from the start.", 'pawtech' ) ) );
		$this->add_control( 'section_image', array( 'label' => esc_html__( 'Image', 'pawtech' ), 'type' => \Elementor\Controls_Manager::MEDIA, 'default' => array( 'url' => PAWTECH_URI . 'assets/images/feature-telehealth.jpg' ) ) );

		$repeater = new \Elementor\Repeater();
		$repeater->add_control( 'text', array( 'label' => esc_html__( 'Point', 'pawtech' ), 'type' => \Elementor\Controls_Manager::TEXTAREA ) );

		$defaults = array();
		foreach ( pawtech_default( 'points' ) as $point ) {
			$defaults[] = array( 'text' => $point );
		}

		$this->add_control(
			'points',
			array(
				'label'       => esc_html__( 'Points', 'pawtech' ),
				'type'        => \Elementor\Controls_Manager::REPEATER,
				'fields'      => $repeater->get_controls(),
				'default'     => $defaults,
				'title_field' => '{{{ text }}}',
			)
		);

		$this->end_controls_section();
	}

	protected function render() {
		$s      = $this->get_settings_for_display();
		$points = array();
		if ( ! empty( $s['points'] ) && is_array( $s['points'] ) ) {
			foreach ( $s['points'] as $point ) {
				$points[] = array( 'text' => sanitize_textarea_field( (string) ( isset( $point['text'] ) ? $point['text'] : '' ) ) );
			}
		}

		get_template_part(
			'template-parts/sections/telehealth',
			null,
			array(
				'eyebrow' => sanitize_text_field( (string) ( isset( $s['eyebrow'] ) ? $s['eyebrow'] : '' ) ),
				'title'   => sanitize_text_field( (string) ( isset( $s['title'] ) ? $s['title'] : '' ) ),
				'intro'   => sanitize_textarea_field( (string) ( isset( $s['intro'] ) ? $s['intro'] : '' ) ),
				'image'   => ! empty( $s['section_image']['url'] ) ? esc_url_raw( $s['section_image']['url'] ) : '',
				'points'  => $points,
			)
		);
	}
}
