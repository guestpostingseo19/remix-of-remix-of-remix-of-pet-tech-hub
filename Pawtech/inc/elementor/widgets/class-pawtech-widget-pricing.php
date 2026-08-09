<?php
/**
 * Pricing widget.
 *
 * @package PawTech
 */

defined( 'ABSPATH' ) || exit;

if ( ! class_exists( 'PawTech_Widget_Base' ) ) {
	return;
}

/**
 * PawTech pricing table.
 */
class PawTech_Widget_Pricing extends PawTech_Widget_Base {

	protected $part = 'pricing';

	public function get_name() {
		return 'pawtech-pricing';
	}

	public function get_title() {
		return esc_html__( 'PawTech Pricing', 'pawtech' );
	}

	public function get_icon() {
		return 'eicon-price-table';
	}

	protected function register_controls() {
		$this->start_controls_section( 'content', array( 'label' => esc_html__( 'Content', 'pawtech' ) ) );

		$this->add_control( 'eyebrow', array( 'label' => esc_html__( 'Eyebrow', 'pawtech' ), 'type' => \Elementor\Controls_Manager::TEXT, 'default' => __( 'Plans', 'pawtech' ) ) );
		$this->add_control( 'title', array( 'label' => esc_html__( 'Title', 'pawtech' ), 'type' => \Elementor\Controls_Manager::TEXT, 'default' => __( 'Simple monthly service. Stop any time.', 'pawtech' ) ) );
		$this->add_control( 'intro', array( 'label' => esc_html__( 'Intro', 'pawtech' ), 'type' => \Elementor\Controls_Manager::TEXTAREA, 'default' => __( 'There is nothing to buy. Prices are per pet, per month. No long contract and no setup fee.', 'pawtech' ) ) );

		$repeater = new \Elementor\Repeater();
		$repeater->add_control( 'name', array( 'label' => esc_html__( 'Plan name', 'pawtech' ), 'type' => \Elementor\Controls_Manager::TEXT ) );
		$repeater->add_control( 'price', array( 'label' => esc_html__( 'Price', 'pawtech' ), 'type' => \Elementor\Controls_Manager::TEXT ) );
		$repeater->add_control( 'period', array( 'label' => esc_html__( 'Period', 'pawtech' ), 'type' => \Elementor\Controls_Manager::TEXT, 'default' => __( '/mo', 'pawtech' ) ) );
		$repeater->add_control( 'tagline', array( 'label' => esc_html__( 'Tagline', 'pawtech' ), 'type' => \Elementor\Controls_Manager::TEXT ) );
		$repeater->add_control(
			'features',
			array(
				'label'       => esc_html__( 'Features (one per line)', 'pawtech' ),
				'type'        => \Elementor\Controls_Manager::TEXTAREA,
				'rows'        => 6,
			)
		);
		$repeater->add_control( 'featured', array( 'label' => esc_html__( 'Highlight this plan', 'pawtech' ), 'type' => \Elementor\Controls_Manager::SWITCHER, 'return_value' => 'yes', 'default' => '' ) );
		$repeater->add_control( 'badge', array( 'label' => esc_html__( 'Badge text', 'pawtech' ), 'type' => \Elementor\Controls_Manager::TEXT, 'default' => __( 'Most picked', 'pawtech' ) ) );
		$repeater->add_control( 'cta', array( 'label' => esc_html__( 'Button label', 'pawtech' ), 'type' => \Elementor\Controls_Manager::TEXT ) );
		$repeater->add_control( 'plan_link', array( 'label' => esc_html__( 'Button link', 'pawtech' ), 'type' => \Elementor\Controls_Manager::URL, 'default' => array( 'url' => '#pricing' ) ) );

		$defaults = array();
		foreach ( pawtech_default( 'tiers' ) as $tier ) {
			$defaults[] = array(
				'name'     => $tier['name'],
				'price'    => $tier['price'],
				'period'   => __( '/mo', 'pawtech' ),
				'tagline'  => $tier['tagline'],
				'features' => implode( "\n", $tier['features'] ),
				'featured' => $tier['featured'] ? 'yes' : '',
				'badge'    => __( 'Most picked', 'pawtech' ),
				/* translators: %s: plan name. */
				'cta'      => sprintf( __( 'Start %s', 'pawtech' ), $tier['name'] ),
			);
		}

		$this->add_control(
			'tiers',
			array(
				'label'       => esc_html__( 'Plans', 'pawtech' ),
				'type'        => \Elementor\Controls_Manager::REPEATER,
				'fields'      => $repeater->get_controls(),
				'default'     => $defaults,
				'title_field' => '{{{ name }}} — {{{ price }}}',
			)
		);

		$this->end_controls_section();
	}

	protected function render() {
		$s     = $this->get_settings_for_display();
		$tiers = array();

		if ( ! empty( $s['tiers'] ) && is_array( $s['tiers'] ) ) {
			foreach ( $s['tiers'] as $tier ) {
				$features = array();
				if ( ! empty( $tier['features'] ) ) {
					foreach ( preg_split( '/\r\n|\r|\n/', (string) $tier['features'] ) as $line ) {
						$line = sanitize_text_field( $line );
						if ( '' !== trim( $line ) ) {
							$features[] = $line;
						}
					}
				}
				$tiers[] = array(
					'name'     => sanitize_text_field( (string) ( isset( $tier['name'] ) ? $tier['name'] : '' ) ),
					'price'    => sanitize_text_field( (string) ( isset( $tier['price'] ) ? $tier['price'] : '' ) ),
					'period'   => sanitize_text_field( (string) ( isset( $tier['period'] ) ? $tier['period'] : '' ) ),
					'tagline'  => sanitize_text_field( (string) ( isset( $tier['tagline'] ) ? $tier['tagline'] : '' ) ),
					'badge'    => sanitize_text_field( (string) ( isset( $tier['badge'] ) ? $tier['badge'] : '' ) ),
					'cta'      => sanitize_text_field( (string) ( isset( $tier['cta'] ) ? $tier['cta'] : '' ) ),
					'featured' => ( isset( $tier['featured'] ) && 'yes' === $tier['featured'] ),
					'features' => $features,
					'url'      => ! empty( $tier['plan_link']['url'] ) ? esc_url_raw( $tier['plan_link']['url'] ) : '#pricing',
				);
			}
		}

		get_template_part(
			'template-parts/sections/pricing',
			null,
			array(
				'eyebrow' => sanitize_text_field( (string) ( isset( $s['eyebrow'] ) ? $s['eyebrow'] : '' ) ),
				'title'   => sanitize_text_field( (string) ( isset( $s['title'] ) ? $s['title'] : '' ) ),
				'intro'   => sanitize_textarea_field( (string) ( isset( $s['intro'] ) ? $s['intro'] : '' ) ),
				'tiers'   => $tiers,
			)
		);
	}
}
