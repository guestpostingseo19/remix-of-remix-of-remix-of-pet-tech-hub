<?php
/**
 * Hero widget.
 *
 * @package PawTech
 */

defined( 'ABSPATH' ) || exit;

if ( ! class_exists( 'PawTech_Widget_Base' ) ) {
	return;
}

/**
 * PawTech hero.
 */
class PawTech_Widget_Hero extends PawTech_Widget_Base {

	protected $part = 'hero';

	public function get_name() {
		return 'pawtech-hero';
	}

	public function get_title() {
		return esc_html__( 'PawTech Hero', 'pawtech' );
	}

	public function get_icon() {
		return 'eicon-banner';
	}

	protected function register_controls() {
		$this->start_controls_section(
			'content',
			array( 'label' => esc_html__( 'Content', 'pawtech' ) )
		);

		$this->add_control( 'eyebrow', array( 'label' => esc_html__( 'Eyebrow', 'pawtech' ), 'type' => \Elementor\Controls_Manager::TEXT, 'default' => pawtech_get_option( 'hero_eyebrow', __( 'Pet care service · open 24 hours', 'pawtech' ) ) ) );
		$this->add_control( 'title_accent', array( 'label' => esc_html__( 'Headline (highlighted)', 'pawtech' ), 'type' => \Elementor\Controls_Manager::TEXT, 'default' => __( 'Watch your pet', 'pawtech' ) ) );
		$this->add_control( 'title_rest', array( 'label' => esc_html__( 'Headline (rest)', 'pawtech' ), 'type' => \Elementor\Controls_Manager::TEXT, 'default' => __( 'and talk to a vet, any time', 'pawtech' ) ) );
		$this->add_control( 'subtitle', array( 'label' => esc_html__( 'Sub-headline', 'pawtech' ), 'type' => \Elementor\Controls_Manager::TEXTAREA, 'rows' => 4, 'default' => __( 'PawTech is a pet care service. We keep an eye on where your pet is and how they feel. If something looks wrong, we tell you and a real vet joins the call.', 'pawtech' ) ) );
		$this->add_control( 'cta_label', array( 'label' => esc_html__( 'Primary button', 'pawtech' ), 'type' => \Elementor\Controls_Manager::TEXT, 'default' => __( 'See our plans', 'pawtech' ) ) );
		$this->add_control( 'cta_link', array( 'label' => esc_html__( 'Primary link', 'pawtech' ), 'type' => \Elementor\Controls_Manager::URL, 'default' => array( 'url' => '#pricing' ) ) );
		$this->add_control( 'cta2_label', array( 'label' => esc_html__( 'Secondary button', 'pawtech' ), 'type' => \Elementor\Controls_Manager::TEXT, 'default' => __( 'Read the journal', 'pawtech' ) ) );
		$this->add_control( 'cta2_link', array( 'label' => esc_html__( 'Secondary link', 'pawtech' ), 'type' => \Elementor\Controls_Manager::URL, 'default' => array( 'url' => home_url( '/blog/' ) ) ) );
		$this->add_control( 'note', array( 'label' => esc_html__( 'Small note', 'pawtech' ), 'type' => \Elementor\Controls_Manager::TEXT, 'default' => __( 'No gear to buy. Works with the collar or tag you already have.', 'pawtech' ) ) );
		$this->add_control( 'hero_image', array( 'label' => esc_html__( 'Hero image', 'pawtech' ), 'type' => \Elementor\Controls_Manager::MEDIA, 'default' => array( 'url' => PAWTECH_URI . 'assets/images/hero-collar.jpg' ) ) );
		$this->add_control( 'image_alt', array( 'label' => esc_html__( 'Hero image alt text', 'pawtech' ), 'type' => \Elementor\Controls_Manager::TEXT, 'default' => __( 'Happy dog resting in warm evening light while the PawTech care service watches over them', 'pawtech' ) ) );
		$this->add_control( 'badge_title', array( 'label' => esc_html__( 'Floating card title', 'pawtech' ), 'type' => \Elementor\Controls_Manager::TEXT, 'default' => __( 'All good today', 'pawtech' ) ) );
		$this->add_control( 'badge_copy', array( 'label' => esc_html__( 'Floating card text', 'pawtech' ), 'type' => \Elementor\Controls_Manager::TEXT, 'default' => __( 'Heart rate is normal', 'pawtech' ) ) );

		$this->end_controls_section();
	}

	protected function render() {
		$s    = $this->get_settings_for_display();
		$args = $this->clean(
			array(
				'eyebrow'      => isset( $s['eyebrow'] ) ? $s['eyebrow'] : '',
				'title_accent' => isset( $s['title_accent'] ) ? $s['title_accent'] : '',
				'title_rest'   => isset( $s['title_rest'] ) ? $s['title_rest'] : '',
				'subtitle'     => isset( $s['subtitle'] ) ? $s['subtitle'] : '',
				'cta_label'    => isset( $s['cta_label'] ) ? $s['cta_label'] : '',
				'cta2_label'   => isset( $s['cta2_label'] ) ? $s['cta2_label'] : '',
				'note'         => isset( $s['note'] ) ? $s['note'] : '',
				'image_alt'    => isset( $s['image_alt'] ) ? $s['image_alt'] : '',
				'badge_title'  => isset( $s['badge_title'] ) ? $s['badge_title'] : '',
				'badge_copy'   => isset( $s['badge_copy'] ) ? $s['badge_copy'] : '',
			)
		);

		$args['cta_url']  = ! empty( $s['cta_link']['url'] ) ? esc_url_raw( $s['cta_link']['url'] ) : '#pricing';
		$args['cta2_url'] = ! empty( $s['cta2_link']['url'] ) ? esc_url_raw( $s['cta2_link']['url'] ) : home_url( '/blog/' );
		$args['image']    = ! empty( $s['hero_image']['url'] ) ? esc_url_raw( $s['hero_image']['url'] ) : '';

		get_template_part( 'template-parts/sections/hero', null, $args );
	}
}
