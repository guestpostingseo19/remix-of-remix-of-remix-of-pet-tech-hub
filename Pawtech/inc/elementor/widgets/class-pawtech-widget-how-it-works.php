<?php
/**
 * How-it-works widget.
 *
 * @package PawTech
 */

defined( 'ABSPATH' ) || exit;

if ( ! class_exists( 'PawTech_Widget_Base' ) ) {
	return;
}

/**
 * PawTech steps.
 */
class PawTech_Widget_How_It_Works extends PawTech_Widget_Base {

	protected $part = 'how-it-works';

	public function get_name() {
		return 'pawtech-how-it-works';
	}

	public function get_title() {
		return esc_html__( 'PawTech How It Works', 'pawtech' );
	}

	public function get_icon() {
		return 'eicon-number-field';
	}

	protected function register_controls() {
		$this->start_controls_section( 'content', array( 'label' => esc_html__( 'Content', 'pawtech' ) ) );

		$this->add_control( 'eyebrow', array( 'label' => esc_html__( 'Eyebrow', 'pawtech' ), 'type' => \Elementor\Controls_Manager::TEXT, 'default' => __( 'How it works', 'pawtech' ) ) );
		$this->add_control( 'title', array( 'label' => esc_html__( 'Title', 'pawtech' ), 'type' => \Elementor\Controls_Manager::TEXT, 'default' => __( 'Three easy steps, then we stay quiet', 'pawtech' ) ) );

		$repeater = new \Elementor\Repeater();
		$repeater->add_control( 'n', array( 'label' => esc_html__( 'Number', 'pawtech' ), 'type' => \Elementor\Controls_Manager::TEXT, 'default' => '01' ) );
		$repeater->add_control( 'title', array( 'label' => esc_html__( 'Title', 'pawtech' ), 'type' => \Elementor\Controls_Manager::TEXT ) );
		$repeater->add_control( 'copy', array( 'label' => esc_html__( 'Text', 'pawtech' ), 'type' => \Elementor\Controls_Manager::TEXTAREA ) );

		$this->add_control(
			'steps',
			array(
				'label'       => esc_html__( 'Steps', 'pawtech' ),
				'type'        => \Elementor\Controls_Manager::REPEATER,
				'fields'      => $repeater->get_controls(),
				'default'     => pawtech_default( 'steps' ),
				'title_field' => '{{{ n }}} — {{{ title }}}',
			)
		);

		$this->end_controls_section();
	}
}
