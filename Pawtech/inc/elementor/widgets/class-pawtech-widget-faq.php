<?php
/**
 * FAQ widget.
 *
 * @package PawTech
 */

defined( 'ABSPATH' ) || exit;

if ( ! class_exists( 'PawTech_Widget_Base' ) ) {
	return;
}

/**
 * PawTech FAQ.
 */
class PawTech_Widget_Faq extends PawTech_Widget_Base {

	protected $part = 'faq';

	public function get_name() {
		return 'pawtech-faq';
	}

	public function get_title() {
		return esc_html__( 'PawTech FAQ', 'pawtech' );
	}

	public function get_icon() {
		return 'eicon-help-o';
	}

	protected function register_controls() {
		$this->start_controls_section( 'content', array( 'label' => esc_html__( 'Content', 'pawtech' ) ) );

		$this->add_control( 'eyebrow', array( 'label' => esc_html__( 'Eyebrow', 'pawtech' ), 'type' => \Elementor\Controls_Manager::TEXT, 'default' => __( 'Questions', 'pawtech' ) ) );
		$this->add_control( 'title', array( 'label' => esc_html__( 'Title', 'pawtech' ), 'type' => \Elementor\Controls_Manager::TEXT, 'default' => __( 'Answers before you join', 'pawtech' ) ) );

		$repeater = new \Elementor\Repeater();
		$repeater->add_control( 'q', array( 'label' => esc_html__( 'Question', 'pawtech' ), 'type' => \Elementor\Controls_Manager::TEXT ) );
		$repeater->add_control( 'a', array( 'label' => esc_html__( 'Answer', 'pawtech' ), 'type' => \Elementor\Controls_Manager::TEXTAREA, 'rows' => 5 ) );

		$this->add_control(
			'faqs',
			array(
				'label'       => esc_html__( 'Questions', 'pawtech' ),
				'type'        => \Elementor\Controls_Manager::REPEATER,
				'fields'      => $repeater->get_controls(),
				'default'     => pawtech_default( 'faqs' ),
				'title_field' => '{{{ q }}}',
			)
		);

		$this->end_controls_section();
	}
}
