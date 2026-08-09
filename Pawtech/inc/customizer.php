<?php
/**
 * Customizer options for copy that site owners change most often.
 *
 * @package PawTech
 */

defined( 'ABSPATH' ) || exit;

/**
 * Sanitize a checkbox.
 *
 * @param mixed $value Raw value.
 * @return bool
 */
function pawtech_sanitize_checkbox( $value ) {
	return (bool) $value;
}

/**
 * Sanitize the theme mode select.
 *
 * @param string $value Raw value.
 * @return string
 */
function pawtech_sanitize_mode( $value ) {
	return in_array( $value, array( 'night', 'day' ), true ) ? $value : 'night';
}

/**
 * Register settings.
 *
 * @param WP_Customize_Manager $wp_customize Customizer.
 */
function pawtech_customize_register( $wp_customize ) {
	$wp_customize->add_panel(
		'pawtech_panel',
		array(
			'title'    => esc_html__( 'PawTech theme', 'pawtech' ),
			'priority' => 20,
		)
	);

	$wp_customize->add_section(
		'pawtech_general',
		array(
			'title' => esc_html__( 'General', 'pawtech' ),
			'panel' => 'pawtech_panel',
		)
	);

	$fields = array(
		'default_mode'    => array(
			'default' => 'night',
			'label'   => esc_html__( 'Default colour mode', 'pawtech' ),
			'type'    => 'select',
			'choices' => array(
				'night' => esc_html__( 'Night', 'pawtech' ),
				'day'   => esc_html__( 'Day', 'pawtech' ),
			),
			'sanitize' => 'pawtech_sanitize_mode',
		),
		'show_mode_toggle' => array(
			'default'  => true,
			'label'    => esc_html__( 'Show the day/night toggle', 'pawtech' ),
			'type'     => 'checkbox',
			'sanitize' => 'pawtech_sanitize_checkbox',
		),
		'header_cta_label' => array(
			'default'  => esc_html__( 'Join PawTech', 'pawtech' ),
			'label'    => esc_html__( 'Header button label', 'pawtech' ),
			'type'     => 'text',
			'sanitize' => 'sanitize_text_field',
		),
		'header_cta_url'  => array(
			'default'  => '#pricing',
			'label'    => esc_html__( 'Header button link', 'pawtech' ),
			'type'     => 'text',
			'sanitize' => 'sanitize_text_field',
		),
		'footer_about'    => array(
			'default'  => esc_html__( 'A pet care service. We track your pet, watch their health every day, and put a real vet on the line when you need one.', 'pawtech' ),
			'label'    => esc_html__( 'Footer description', 'pawtech' ),
			'type'     => 'textarea',
			'sanitize' => 'sanitize_textarea_field',
		),
		'footer_note'     => array(
			'default'  => esc_html__( 'PawTech does not replace emergency vet care.', 'pawtech' ),
			'label'    => esc_html__( 'Footer legal note', 'pawtech' ),
			'type'     => 'text',
			'sanitize' => 'sanitize_text_field',
		),
	);

	foreach ( $fields as $key => $field ) {
		$wp_customize->add_setting(
			'pawtech_' . $key,
			array(
				'default'           => $field['default'],
				'sanitize_callback' => $field['sanitize'],
				'transport'         => 'refresh',
			)
		);
		$args = array(
			'label'   => $field['label'],
			'section' => 'pawtech_general',
			'type'    => $field['type'],
		);
		if ( isset( $field['choices'] ) ) {
			$args['choices'] = $field['choices'];
		}
		$wp_customize->add_control( 'pawtech_' . $key, $args );
	}

	// Hero section.
	$wp_customize->add_section(
		'pawtech_hero',
		array(
			'title' => esc_html__( 'Hero', 'pawtech' ),
			'panel' => 'pawtech_panel',
		)
	);

	$hero = array(
		'hero_eyebrow'      => array( esc_html__( 'Pet care service · open 24 hours', 'pawtech' ), esc_html__( 'Eyebrow', 'pawtech' ), 'text' ),
		'hero_title_accent' => array( esc_html__( 'Watch your pet', 'pawtech' ), esc_html__( 'Headline (highlighted part)', 'pawtech' ), 'text' ),
		'hero_title_rest'   => array( esc_html__( 'and talk to a vet, any time', 'pawtech' ), esc_html__( 'Headline (rest)', 'pawtech' ), 'text' ),
		'hero_subtitle'     => array( esc_html__( 'PawTech is a pet care service. We keep an eye on where your pet is and how they feel. If something looks wrong, we tell you and a real vet joins the call.', 'pawtech' ), esc_html__( 'Sub-headline', 'pawtech' ), 'textarea' ),
		'hero_primary_cta'  => array( esc_html__( 'See our plans', 'pawtech' ), esc_html__( 'Primary button label', 'pawtech' ), 'text' ),
		'hero_primary_url'  => array( '#pricing', esc_html__( 'Primary button link', 'pawtech' ), 'text' ),
		'hero_secondary_cta' => array( esc_html__( 'Read the journal', 'pawtech' ), esc_html__( 'Secondary button label', 'pawtech' ), 'text' ),
		'hero_note'         => array( esc_html__( 'No gear to buy. Works with the collar or tag you already have.', 'pawtech' ), esc_html__( 'Small note under the buttons', 'pawtech' ), 'text' ),
	);

	foreach ( $hero as $key => $conf ) {
		list( $default, $label, $type ) = $conf;
		$wp_customize->add_setting(
			'pawtech_' . $key,
			array(
				'default'           => $default,
				'sanitize_callback' => 'textarea' === $type ? 'sanitize_textarea_field' : 'sanitize_text_field',
				'transport'         => 'refresh',
			)
		);
		$wp_customize->add_control(
			'pawtech_' . $key,
			array(
				'label'   => $label,
				'section' => 'pawtech_hero',
				'type'    => $type,
			)
		);
	}

	if ( isset( $wp_customize->selective_refresh ) ) {
		$wp_customize->get_setting( 'blogname' )->transport        = 'postMessage';
		$wp_customize->get_setting( 'blogdescription' )->transport = 'postMessage';
	}
}
add_action( 'customize_register', 'pawtech_customize_register' );
