<?php
/**
 * Stat band widget.
 *
 * @package PawTech
 */

defined( 'ABSPATH' ) || exit;

if ( ! class_exists( 'PawTech_Widget_Base' ) ) {
	return;
}

/**
 * PawTech stats.
 */
class PawTech_Widget_Stats extends PawTech_Widget_Base {

	protected $part = 'stats';

	public function get_name() {
		return 'pawtech-stats';
	}

	public function get_title() {
		return esc_html__( 'PawTech Stat Band', 'pawtech' );
	}

	public function get_icon() {
		return 'eicon-counter';
	}

	protected function register_controls() {
		$this->start_controls_section( 'content', array( 'label' => esc_html__( 'Numbers', 'pawtech' ) ) );

		$repeater = new \Elementor\Repeater();
		$repeater->add_control( 'value', array( 'label' => esc_html__( 'Value', 'pawtech' ), 'type' => \Elementor\Controls_Manager::TEXT, 'default' => '24/7' ) );
		$repeater->add_control( 'label', array( 'label' => esc_html__( 'Label', 'pawtech' ), 'type' => \Elementor\Controls_Manager::TEXT, 'default' => esc_html__( 'Team on duty', 'pawtech' ) ) );

		$this->add_control(
			'stats',
			array(
				'label'       => esc_html__( 'Stats', 'pawtech' ),
				'type'        => \Elementor\Controls_Manager::REPEATER,
				'fields'      => $repeater->get_controls(),
				'default'     => pawtech_default( 'stats' ),
				'title_field' => '{{{ value }}} — {{{ label }}}',
			)
		);

		$this->end_controls_section();
	}
}
