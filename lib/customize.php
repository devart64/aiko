<?php
/**
 * Genesis Sample.
 *
 * This file adds the Customizer additions to the Genesis Sample Theme.
 *
 * @package Genesis Sample
 * @author  StudioPress
 * @license GPL-2.0+
 * @link    http://www.studiopress.com/
 */

/**
 * Get default link color for Customizer.
 *
 * Abstracted here since at least two functions use it.
 *
 * @since 2.2.3
 *
 * @return string Hex color code for link color.
 */
function aiko_customizer_get_default_link_color() {
	return '#c3251d';
}

/**
 * Get default accent color for Customizer.
 *
 * Abstracted here since at least two functions use it.
 *
 * @since 2.2.3
 *
 * @return string Hex color code for accent color.
 */
function aiko_customizer_get_default_accent_color() {
	return '#c3251d';
}

add_action( 'customize_register', 'aiko_customizer_register' );
/**
 * Register settings and controls with the Customizer.
 *
 * @since 2.2.3
 * 
 * @param WP_Customize_Manager $wp_customize Customizer object.
 */
function aiko_customizer_register() {

	global $wp_customize;

	$wp_customize->add_setting(
		'aiko_link_color',
		array(
			'default'           => aiko_customizer_get_default_link_color(),
			'sanitize_callback' => 'sanitize_hex_color',
		)
	);

	$wp_customize->add_control(
		new WP_Customize_Color_Control(
			$wp_customize,
			'aiko_link_color',
			array(
				'description' => __( 'Change the default color for linked titles, menu links, post info links and more.', 'aiko' ),
			    'label'       => __( 'Link Color', 'aiko' ),
			    'section'     => 'colors',
			    'settings'    => 'aiko_link_color',
			)
		)
	);

	$wp_customize->add_setting(
		'aiko_accent_color',
		array(
			'default'           => aiko_customizer_get_default_accent_color(),
			'sanitize_callback' => 'sanitize_hex_color',
		)
	);

	$wp_customize->add_control(
		new WP_Customize_Color_Control(
			$wp_customize,
			'aiko_accent_color',
			array(
				'description' => __( 'Change the default color for button hovers.', 'aiko' ),
			    'label'       => __( 'Accent Color', 'aiko' ),
			    'section'     => 'colors',
			    'settings'    => 'aiko_accent_color',
			)
		)
	);

}
