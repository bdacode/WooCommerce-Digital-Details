<?php
/**
 * WooCommerce Meta Box Functions
 *
 * @author      Sebs Studio
 * @category    Core
 * @package     WooCommerce Digital Details/Admin/Functions
 * @version     0.0.2
 */

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

/**
 * Output a select input box.
 *
 * @since  0.0.2
 * @access public
 * @param  array $field
 */
function ss_wc_wp_select( $field ) {
	global $thepostid, $post;

	$thepostid              = empty( $thepostid ) ? $post->ID : $thepostid;
	$field['placeholder']   = isset( $field['placeholder'] ) ? $field['placeholder'] : '';
	$field['class']         = isset( $field['class'] ) ? $field['class'] : 'select short';
	$field['style']         = isset( $field['style'] ) ? $field['style'] : '';
	$field['wrapper_class'] = isset( $field['wrapper_class'] ) ? $field['wrapper_class'] : '';
	$field['default']       = isset( $field['default'] ) ? $field['default'] : '';
	$field['value']         = isset( $field['value'] ) ? $field['value'] : get_post_meta( $thepostid, $field['id'], true );
	$field['type']          = isset( $field['type'] ) ? $field['type'] : 'select';

	// Custom attribute handling
	$custom_attributes = array();

	if ( ! empty( $field['custom_attributes'] ) && is_array( $field['custom_attributes'] ) ) {

		foreach ( $field['custom_attributes'] as $attribute => $value ){
			$custom_attributes[] = esc_attr( $attribute ) . '="' . esc_attr( $value ) . '"';
		}
	}

	$option_value = !empty( $field['value'] ) ? $field['value'] : $field['default'];

	echo '<p class="form-field ' . esc_attr( $field['id'] ) . '_field ' . esc_attr( $field['wrapper_class'] ) . '"><label for="' . esc_attr( $field['id'] ) . '">' . wp_kses_post( $field['label'] ) . '</label><select id="' . esc_attr( $field['id'] ) . '" name="' . esc_attr( $field['id'] );

	if ( $field['type'] == 'multiselect' ) echo '[]';
	echo '"';
	echo ( $field['type'] == 'multiselect' ) ? ' multiple="multiple"' : '';

	echo ' class="' . esc_attr( $field['class'] ) . '" style="' . esc_attr( $field['style'] ) . '" data-placeholder="' . esc_attr( $field['placeholder'] ) . '" ' . implode( ' ', $custom_attributes ) . '>';

	foreach ( $field['options'] as $key => $value ) {
		echo '<option value="' . esc_attr( $key ) . '"';

		if ( is_array( $option_value ) ) {
			selected( in_array( $key, $option_value ), true );
		}
		else {
			selected( esc_attr( $option_value ), esc_attr( $key ) );
		}

		echo '>' . esc_html( $value ) . '</option>';
	}

	echo '</select> ';

	if ( ! empty( $field['description'] ) ) {

		if ( isset( $field['desc_tip'] ) && false !== $field['desc_tip'] ) {
			echo '<img class="help_tip" data-tip="' . esc_attr( $field['description'] ) . '" src="' . esc_url( WC()->plugin_url() ) . '/assets/images/help.png" height="16" width="16" />';
		} else {
			echo '<span class="description">' . wp_kses_post( $field['description'] ) . '</span>';
		}
	}
	echo '</p>';
}