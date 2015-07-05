<?php
/**
 * WooCommerce Digital Details Post Meta Data
 *
 * Adds additional fields to the product meta data.
 *
 * @author  Sebs Studio
 * @package WooCommerce Digital Details/Admin/Post Types/Meta Boxes
 * @version 0.0.4
 */

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

/**
 * Adds a new tab panel for digital details.
 *
 * @since  0.0.1
 * @access public
 * @return array
 */
function ss_wc_add_digital_details_tab( $product_data_tabs ){
	$product_data_tabs['digital_details'] = array(
		'label'  => __( 'Digital Details', 'ss-wc-digital-details' ),
		'target' => 'digital_details_product_data',
		'class'  => array( 'show_if_virtual', 'hide_if_grouped', 'hide_if_variable' ),
	);

	return $product_data_tabs;
} // END ss_wc_add_digital_details_tab()

/**
 * Displays the fields for the new tab panel.
 *
 * @since  0.0.1
 * @access public
 * @uses   woocommerce_wp_checkbox()
 * @uses   woocommerce_wp_text_input()
 * @uses   woocommerce_wp_select()
 * @uses   ss_wc_wp_select()
 */
function ss_wc_write_digital_details_tab_panel() {
	echo '<div id="digital_details_product_data" class="panel woocommerce_options_panel">';

	do_action( 'ss_wc_digital_details_options_top' );

	echo '<div class="options_group">';

	// What licence
	woocommerce_wp_text_input(
		array(
			'id'            => '_licence',
			'label'         => __( 'Licence', 'ss-wc-digital-details' ),
			'desc_tip'      => true,
			'description'   => __( 'Enter the licence that is associated with this file.', 'ss-wc-digital-details' ),
			'wrapper_class' => 'hide_if_variable',
			'style'         => 'min-width: 150px;'
		)
	);

	// File Size
	woocommerce_wp_text_input(
		array(
			'id'            => '_file_size',
			'label'         => __( 'File Size', 'ss-wc-digital-details' ),
			'desc_tip'      => true,
			'description'   => __( 'Enter the size of the file. e.g. 1 KB, 1 MB or 1 GB', 'ss-wc-digital-details' ),
			'placeholder'   => __( '1.5 MB', 'ss-wc-digital-details' ),
			'wrapper_class' => 'hide_if_variable',
			'style'         => 'width: 150px;'
		)
	);

	echo '</div>';
	echo '<div class="options_group">';

	// Is Web Font?
	woocommerce_wp_checkbox(
		array(
			'id'            => '_is_web_font',
			'label'         => __( 'Web Font?', 'ss-wc-digital-details' ),
			'description'   => __( 'Enable if this file is a Web Font.', 'ss-wc-digital-details' ),
			'wrapper_class' => 'hide_if_variable',
		)
	);

	echo '</div>';
	echo '<div class="options_group">';

	// Is Tileable?
	woocommerce_wp_checkbox(
		array(
			'id'            => '_is_tileable',
			'label'         => __( 'Tileable?', 'ss-wc-digital-details' ),
			'description'   => __( 'Enable if this file is Tileable.', 'ss-wc-digital-details' ),
			'wrapper_class' => 'hide_if_variable',
		)
	);

	// Is Layered?
	woocommerce_wp_checkbox(
		array(
			'id'            => '_is_layered',
			'label'         => __( 'Layered?', 'ss-wc-digital-details' ),
			'description'   => __( 'Enable if this file has Layers.', 'ss-wc-digital-details' ),
			'wrapper_class' => 'hide_if_variable',
		)
	);

	// Is Vector?
	woocommerce_wp_checkbox(
		array(
			'id'            => '_is_vector',
			'label'         => __( 'Vector Formatted?', 'ss-wc-digital-details' ),
			'description'   => __( 'Enable if this file has a Vector format.', 'ss-wc-digital-details' ),
			'wrapper_class' => 'hide_if_variable',
		)
	);

	echo '</div>';
	echo '<div class="options_group">';

	// Is Fluid Layout?
	woocommerce_wp_checkbox(
		array(
			'id'            => '_is_fluid_layout',
			'label'         => __( 'Fluid Layout?', 'ss-wc-digital-details' ),
			'description'   => __( 'Enable if this file has a fluid layout.', 'ss-wc-digital-details' ),
			'wrapper_class' => 'hide_if_variable',
		)
	);

	// Is Fixed Layout?
	woocommerce_wp_checkbox(
		array(
			'id'            => '_is_fixed_layout',
			'label'         => __( 'Fixed Layout?', 'ss-wc-digital-details' ),
			'description'   => __( 'Enable if this file has a fixed layout.', 'ss-wc-digital-details' ),
			'wrapper_class' => 'hide_if_variable',
		)
	);

	// Is Responsive Layout?
	woocommerce_wp_checkbox(
		array(
			'id'            => '_is_responsive_layout',
			'label'         => __( 'Responsive Layout?', 'ss-wc-digital-details' ),
			'description'   => __( 'Enable if this file has a responsive layout.', 'ss-wc-digital-details' ),
			'wrapper_class' => 'hide_if_variable',
		)
	);

	// Columns
	woocommerce_wp_text_input(
		array(
			'id'                => '_columns',
			'label'             => __( 'Columns', 'ss-wc-digital-details' ),
			'placeholder'       => '12',
			'desc_tip'          => true,
			'description'       => __( 'Enter the amount of columns this theme has.', 'ss-wc-digital-details' ),
			'type'              => 'number',
			'custom_attributes' => array(
				'step' => 'any',
				'min'  => '1'
			),
			'wrapper_class'     => 'hide_if_variable',
			'style'             => 'width: 60px;'
		)
	);

	// Minimum Browser Requirement
	// @filter ss_wc_digital_details_min_browser_options
	ss_wc_wp_select(
		array(
			'id'             => '_minimum_browser_requirement',
			'label'          => __( 'Minimum Browser', 'ss-wc-digital-details' ),
			'type'           => 'multiselect',
			'options'        => apply_filters( 'ss_wc_digital_details_min_browser_options', array(
				''           => '',
				'ie9'        => __( 'IE 9+', 'ss-wc-digital-details' ),
				'firefox_14' => __( 'Firefox 14+', 'ss-wc-digital-details' ),
				'chrome_19'  => __( 'Chrome 19+', 'ss-wc-digital-details' ),
				'safari_5'   => __( 'Safari 5.1+', 'ss-wc-digital-details' ),
				'opera_12'   => __( 'Opera 12+', 'ss-wc-digital-details' ),
			) ),
			'default'        => '',
			'wrapper_class'  => 'hide_if_variable',
			'placeholder'    => __( 'Select the browsers this theme works in.', 'ss-wc-digital-details' ),
			'class'          => 'wc-enhanced-select chosen_select',
			'style'          => 'min-width: 350px;',
		)
	);

	echo '</div>';
	echo '<div class="options_group">';

	// Dimensions
	woocommerce_wp_textarea_input(
		array(
			'id'            => '_dimensions',
			'label'         => __( 'Dimensions', 'ss-wc-digital-details' ),
			'placeholder'   => sprintf( __( 'Enter the dimensions of the digital item by "%s" seperating the values.', 'ss-wc-digital-details' ), WC_DELIMITER ),
			'desc_tip'      => true,
			'description'   => __( 'e.g. 8.5 x 11 in', 'ss-wc-digital-details' ),
			'wrapper_class' => 'hide_if_variable',
		)
	);

	// Orientation
	ss_wc_wp_select(
		array(
			'id'            => '_orientation',
			'label'         => __( 'Orientation', 'ss-wc-digital-details' ),
			'options'       => array(
				''          => '',
				'landscape' => __( 'Landscape', 'ss-wc-digital-details' ),
				'portrait'  => __( 'Portrait', 'ss-wc-digital-details' ),
				'square'    => __( 'Square', 'ss-wc-digital-details' ),
			),
			'default'       => '',
			'wrapper_class' => 'show_if_photo',
			'placeholder'   => __( 'Select the orientation of this photo.', 'ss-wc-digital-details' ),
			'class'         => 'wc-enhanced-select chosen_select',
			'style'         => 'width: 300px;'
		)
	);

	// DPI Size
	woocommerce_wp_text_input(
		array(
			'id'                => '_dpi_size',
			'label'             => __( 'DPI Size', 'ss-wc-digital-details' ),
			'placeholder'       => '72',
			'desc_tip'          => true,
			'description'       => __( 'Enter the DPI size of the file.', 'ss-wc-digital-details' ),
			'type'              => 'number',
			'custom_attributes' => array(
				'step' => 'any',
				'min'  => '72'
			),
			'wrapper_class'     => 'hide_if_variable',
			'style'             => 'width: 60px;'
		)
	);

	echo '</div>';
	echo '<div class="options_group">';

	// Requirements
	// @filter ss_wc_digital_details_requirement_options
	ss_wc_wp_select(
		array(
			'id'            => '_requirements',
			'label'         => __( 'Requirements', 'ss-wc-digital-details' ),
			'type'          => 'multiselect',
			'options'       => apply_filters( 'ss_wc_digital_details_requirement_options', array(
				''                   => '',
				'adobe_cs1+'         => 'Adobe CS1+',
				'adobe_cs2+'         => 'Adobe CS2+',
				'adobe_cs3+'         => 'Adobe CS3+',
				'adobe_cs4+'         => 'Adobe CS4+',
				'adobe_cs5+'         => 'Adobe CS5+',
				'adobe_photoshop'    => 'Adobe Photoshop',
				'adobe_indesign'     => 'Adobe InDesign',
				'adobe_illustrator'  => 'Adobe Illustrator',
				'adobe_after_effcts' => 'Adobe After Effects'
			) ),
			'default'       => '',
			'wrapper_class' => 'hide_if_variable',
			'placeholder'   => __( 'Select the requirements this file needs to edit', 'ss-wc-digital-details' ),
			'class'         => 'wc-enhanced-select chosen_select',
			'style'         => 'min-width: 350px;',
		)
	);

	// Live Preview
	woocommerce_wp_text_input(
		array(
			'id'                => '_live_preview',
			'label'             => __( 'Live Preview', 'ss-wc-digital-details' ),
			'placeholder'       => 'http://',
			'desc_tip'          => true,
			'description'       => __( 'Enter the URL address for the live preview of this item.', 'ss-wc-digital-details' ),
			'data_type'         => 'url',
			'wrapper_class'     => 'hide_if_variable',
			'style'             => 'min-width: 350px;'
		)
	);

	echo '</div>';
	echo '<div class="options_group">';

	// Message to Customers
	woocommerce_wp_textarea_input(
		array(
			'id'            => '_message_to_customers',
			'label'         => __( 'Message to Customers', 'ss-wc-digital-details' ),
			'desc_tip'      => true,
			'description'   => __( 'Leave a message for your customers. This will be displayed under the featured image.', 'ss-wc-digital-details' ),
			'wrapper_class' => 'hide_if_variable',
		)
	);

	echo '</div>'; // Close group

	do_action( 'ss_wc_digital_details_options_bottom' );

	echo '</div>'; // Close product tab panel
} // END ss_wc_write_digital_details_tab_panel()

/**
 * Saves the digital details.
 *
 * @since  0.0.1
 * @access public
 * @param  $post_id
 */
function ss_wc_save_digital_details_tab_panel( $post_id ) {
	// Checkbox fields
	$is_web_font     = isset( $_POST['_is_web_font'] ) ? 'yes' : '';
	$is_tileable     = isset( $_POST['_is_tileable'] ) ? 'yes' : '';
	$is_layered      = isset( $_POST['_is_layered'] ) ? 'yes' : '';
	$is_fluid_layout = isset( $_POST['_is_fluid_layout'] ) ? 'yes' : '';
	$is_fixed_layout = isset( $_POST['_is_fixed_layout'] ) ? 'yes' : '';
	$is_responsive   = isset( $_POST['_is_responsive_layout'] ) ? 'yes' : '';
	$is_vector       = isset( $_POST['_is_vector'] ) ? 'yes' : '';

	// Is WebFont?
	if ( !empty( $is_web_font ) && $is_web_font == 'yes' ) {
		update_post_meta( $post_id, '_is_web_font', $is_web_font );
	} else {
		delete_post_meta( $post_id, '_is_web_font' );
	}

	// Is Tileable?
	if ( !empty( $is_tileable ) && $is_web_font == 'yes' ) {
		update_post_meta( $post_id, '_is_tileable', $is_tileable );
	} else {
		delete_post_meta( $post_id, '_is_tileable' );
	}

	// Is Layered?
	if ( !empty( $is_layered ) && $is_layered == 'yes' ) {
		update_post_meta( $post_id, '_is_layered', $is_layered );
	} else {
		delete_post_meta( $post_id, '_is_layered' );
	}

	// Is Fluid Layout?
	if ( !empty( $is_fluid_layout ) && $is_fluid_layout == 'yes' ) {
		update_post_meta( $post_id, '_is_fluid_layout', $is_fluid_layout );
	} else {
		delete_post_meta( $post_id, '_is_fluid_layout' );
	}

	// Is Fixed Layout?
	if ( !empty( $is_fixed_layout ) && $is_fixed_layout == 'yes' ) {
		update_post_meta( $post_id, '_is_fixed_layout', $is_fixed_layout );
	} else {
		delete_post_meta( $post_id, '_is_fixed_layout' );
	}

	// Is Responsive?
	if ( !empty( $is_responsive ) && $is_responsive == 'yes' ) {
		update_post_meta( $post_id, '_is_responsive_layout', $is_responsive );
	} else {
		delete_post_meta( $post_id, '_is_responsive_layout' );
	}

	// Is Vector?
	if ( !empty( $is_vector ) && $is_vector == 'yes' ) {
		update_post_meta( $post_id, '_is_vector', $is_vector );
	} else {
		delete_post_meta( $post_id, '_is_vector' );
	}

	// Text fields

	// Licence
	if ( isset( $_POST['_licence'] ) ) {
		update_post_meta( $post_id, '_licence', trim( strip_tags( esc_attr( $_POST['_licence'] ) ) ) );
	} else {
		delete_post_meta( $post_id, '_licence' );
	}

	// File Size
	if ( isset( $_POST['_file_size'] ) ) {
		update_post_meta( $post_id, '_file_size', trim( strip_tags( esc_attr( $_POST['_file_size'] ) ) ) );
	} else {
		delete_post_meta( $post_id, '_file_size' );
	}

	// DPI Size
	if ( isset( $_POST['_dpi_size'] ) ) {
		update_post_meta( $post_id, '_dpi_size', trim( strip_tags( esc_attr( $_POST['_dpi_size'] ) ) ) );
	} else {
		delete_post_meta( $post_id, '_dpi_size' );
	}

	// Columns
	if ( isset( $_POST['_columns'] ) ) {
		update_post_meta( $post_id, '_columns', trim( strip_tags( esc_attr( $_POST['_columns'] ) ) ) );
	} else {
		delete_post_meta( $post_id, '_columns' );
	}

	// Live Preview
	if ( isset( $_POST['_live_preview'] ) ) {
		update_post_meta( $post_id, '_live_preview', trim( strip_tags( esc_attr( $_POST['_live_preview'] ) ) ) );
	} else {
		delete_post_meta( $post_id, '_live_preview' );
	}

	// Orientation
	if ( isset( $_POST['_orientation'] ) ) {
		update_post_meta( $post_id, '_orientation', wc_clean( $_POST['_orientation'] ) );
	} else {
		delete_post_meta( $post_id, '_orientation' );
	}

	// Requirements
	if ( isset( $_POST['_requirements'] ) ) {
		update_post_meta( $post_id, '_requirements', wc_clean( $_POST['_requirements'] ) );
	} else {
		delete_post_meta( $post_id, '_requirements' );
	}

	// Minimum Browser Requirement
	if ( isset( $_POST['_minimum_browser_requirement'] ) ) {
		update_post_meta( $post_id, '_minimum_browser_requirement', wc_clean( $_POST['_minimum_browser_requirement'] ) );
	} else {
		delete_post_meta( $post_id, '_minimum_browser_requirement' );
	}

	// Textarea Fields

	// Dimensions
	if ( isset( $_POST['_dimensions'] ) ) {
		update_post_meta( $post_id, '_dimensions', esc_html( $_POST['_dimensions'] ) );
	} else {
		delete_post_meta( $post_id, '_dimensions' );
	}

	// Message to Customers
	if ( isset( $_POST['_message_to_customers'] ) ) {
		update_post_meta( $post_id, '_message_to_customers', esc_html( $_POST['_message_to_customers'] ) );
	} else {
		delete_post_meta( $post_id, '_message_to_customers' );
	}

} // END ss_wc_save_digital_details_tab_panel()
