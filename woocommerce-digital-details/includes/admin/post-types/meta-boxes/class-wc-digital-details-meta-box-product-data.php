<?php
/**
 * WooCommerce Digital Details Post Meta Data
 *
 * Adds additional fields to the product meta data.
 *
 * @author  Sebs Studio
 * @package WooCommerce Digital Details/Admin/Post Types/Meta Boxes
 * @version 0.0.1
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

	echo '<div class="options_group">';

	// What licence
	woocommerce_wp_text_input(
		array(
			'id'            => '_licence',
			'label'         => __( 'Licence', 'ss-wc-digital-details' ),
			'desc_tip'      => true,
			'description'   => __( 'Enter the licence that is associated with this file.', 'ss-wc-digital-details' ),
			'wrapper_class' => 'hide_if_variable',
		)
	);

	// Product Category
	/*ss_wc_wp_select(
		array(
			'id'      => '_product_category',
			'label'   => __( 'Product Category', 'ss-wc-digital-details' ),
			'options' => array(
				'landscape' => __( 'Landscape', 'ss-wc-digital-details' ),
				'portrait'  => __( 'Portrait', 'ss-wc-digital-details' ),
			),
			'wrapper_class' => 'hide_if_variable',
		)
	);*/

	// File Size
	woocommerce_wp_text_input(
		array(
			'id'            => '_file_size',
			'label'         => __( 'File Size', 'ss-wc-digital-details' ),
			'desc_tip'      => true,
			'description'   => __( 'Enter the size of the file. e.g. 1KB, 1MB or 1GB', 'ss-wc-digital-details' ),
			'placeholder'   => __( '1.5MB', 'ss-wc-digital-details' ),
			'wrapper_class' => 'hide_if_variable',
			'style'         => 'width: 150px;'
		)
	);

	// Is WebFont?
	woocommerce_wp_checkbox(
		array(
			'id'            => '_is_web_font',
			'label'         => __( 'Web Font?', 'ss-wc-digital-details' ),
			'description'   => __( 'Enable if this file is a Web Font.', 'ss-wc-digital-details' ),
			'wrapper_class' => 'hide_if_variable',
		)
	);

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
			'description'   => __( 'Enable if this file is Layered.', 'ss-wc-digital-details' ),
			'wrapper_class' => 'hide_if_variable',
		)
	);

	// Is Fluid Layout?
	woocommerce_wp_checkbox(
		array(
			'id'            => '_is_fluid_layout',
			'label'         => __( 'Fluid Layout?', 'ss-wc-digital-details' ),
			'description'   => __( 'Enable if this file has a Fluid Layout.', 'ss-wc-digital-details' ),
			'wrapper_class' => 'hide_if_variable',
		)
	);

	// Is Fixed Layout?
	woocommerce_wp_checkbox(
		array(
			'id'            => '_is_fixed_layout',
			'label'         => __( 'Fixed Layout?', 'ss-wc-digital-details' ),
			'description'   => __( 'Enable if this file has a Fixed Layout.', 'ss-wc-digital-details' ),
			'wrapper_class' => 'hide_if_variable',
		)
	);

	// Is Responsive Layout?
	woocommerce_wp_checkbox(
		array(
			'id'            => '_is_responsive_layout',
			'label'         => __( 'Responsive Layout?', 'ss-wc-digital-details' ),
			'description'   => __( 'Enable if this file has a Responsive Layout.', 'ss-wc-digital-details' ),
			'wrapper_class' => 'hide_if_variable',
		)
	);

	// Is Vector?
	woocommerce_wp_checkbox(
		array(
			'id'            => '_is_vector',
			'label'         => __( 'Vector Format?', 'ss-wc-digital-details' ),
			'description'   => __( 'Enable if this file has a Vector format.', 'ss-wc-digital-details' ),
			'wrapper_class' => 'hide_if_variable',
		)
	);

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
	woocommerce_wp_select(
		array(
			'id'            => '_orientation',
			'label'         => __( 'Orientation', 'ss-wc-digital-details' ),
			'options'       => array(
				'landscape' => __( 'Landscape', 'ss-wc-digital-details' ),
				'portrait'  => __( 'Portrait', 'ss-wc-digital-details' ),
			),
			'wrapper_class' => 'show_if_photo',
			'style'         => 'width: 150px;'
		)
	);

	// Requirements
	// @filter ss_wc_digital_details_requirement_options
	ss_wc_wp_select(
		array(
			'id'          => '_requirements',
			'label'       => __( 'Requirements', 'ss-wc-digital-details' ),
			'type'        => 'multiselect',
			'options'     => apply_filters( 'ss_wc_digital_details_requirement_options', array(
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
			'default'     => '',
			'placeholder' => __( 'Select the requirements this file needs to edit', 'ss-wc-digital-details' ),
			'class'       => 'wc-enhanced-select chosen_select',
			'style'       => 'min-width: 350px;',
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
	$wc_product_digital_details = isset( $_POST['_set_digital_details'] ) ? 'yes' : '';
	$wc_digital_details_label   = trim( strip_tags( $_POST['_digital_details_label'] ) );

	if ( !empty( $wc_product_digital_details ) && $wc_product_digital_details == 'yes' ) {
		update_post_meta( $post_id, '_set_digital_details', $wc_product_digital_details );
	} else {
		delete_post_meta( $post_id, '_set_digital_details' );
	}

	if ( isset( $wc_digital_details_label ) ) {
		update_post_meta( $post_id, '_digital_details_label', $wc_digital_details_label );
	} else {
		delete_post_meta( $post_id, '_digital_details_label' );
	}
} // END ss_wc_save_digital_details_tab_panel()
