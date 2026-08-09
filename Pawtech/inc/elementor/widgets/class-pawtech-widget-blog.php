<?php
/**
 * Latest posts widget.
 *
 * @package PawTech
 */

defined( 'ABSPATH' ) || exit;

if ( ! class_exists( 'PawTech_Widget_Base' ) ) {
	return;
}

/**
 * PawTech journal preview.
 */
class PawTech_Widget_Blog extends PawTech_Widget_Base {

	protected $part = 'blog-preview';

	public function get_name() {
		return 'pawtech-blog';
	}

	public function get_title() {
		return esc_html__( 'PawTech Journal Preview', 'pawtech' );
	}

	public function get_icon() {
		return 'eicon-posts-grid';
	}

	protected function register_controls() {
		$this->start_controls_section( 'content', array( 'label' => esc_html__( 'Content', 'pawtech' ) ) );

		$this->add_control( 'eyebrow', array( 'label' => esc_html__( 'Eyebrow', 'pawtech' ), 'type' => \Elementor\Controls_Manager::TEXT, 'default' => __( 'Journal', 'pawtech' ) ) );
		$this->add_control( 'title', array( 'label' => esc_html__( 'Title', 'pawtech' ), 'type' => \Elementor\Controls_Manager::TEXT, 'default' => __( 'Field notes on pet technology', 'pawtech' ) ) );
		$this->add_control(
			'count',
			array(
				'label'   => esc_html__( 'Number of posts', 'pawtech' ),
				'type'    => \Elementor\Controls_Manager::NUMBER,
				'min'     => 1,
				'max'     => 12,
				'default' => 3,
			)
		);

		$this->end_controls_section();
	}
}
