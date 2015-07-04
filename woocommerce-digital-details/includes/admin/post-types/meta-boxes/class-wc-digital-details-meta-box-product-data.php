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

	$file_types_args = array(
		'type'         => 'product',
		'orderby'      => 'name',
		'order'        => 'ASC',
		'hide_empty'   => 1,
		'hierarchical' => 1,
		'taxonomy'     => 'file_types'
	);
	$file_types = get_categories( $file_types_args );
	print_r($file_types);

	// File Types needs a select input that fetches the new categories
	woocommerce_wp_select(
		array(
			'id'          => '_file_types',
			'label'       => __( 'File Types', 'ss-wc-digital-details' ),
			'type'    => 'multiselect',
			'desc_tip'    => true,
			'description' => __( 'Select the file types this item has.', 'ss-wc-digital-details' ),
			'options'     => $file_types
		)
	);

	?>
	<p class="form-field"><label for="file_types"><?php _e( 'File Types', 'ss-wc-digital-details' ); ?></label>
	<input type="hidden" class="wc-product-search" style="width: 50%;" id="file_types" name="_file_types" data-placeholder="<?php _e( 'Select the file types', 'ss-wc-digital-details' ); ?>" data-action="woocommerce_json_search_products" data-multiple="true" data-selected="<?php
	$file_types = array_filter( array_map( 'string', (array) get_post_meta( $post->ID, '_file_types', true ) ) );
	$json_ids   = array();

	foreach ( $file_types as $file_type ) {
		$json_ids[ $file_type ] = array( $file_type->category_nicename => $file_type->cat_name );
	}

	echo esc_attr( json_encode( $json_ids ) );
	?>" value="<?php echo implode( ',', array_keys( $json_ids ) ); ?>" /> <img class="help_tip" data-tip='<?php _e( 'Select the file types this item has.', 'ss-wc-digital-details' ) ?>' src="<?php echo WC()->plugin_url(); ?>/assets/images/help.png" height="16" width="16" /></p>

	<?php
	// File Size
	woocommerce_wp_text_input(
		array(
			'id'            => '_file_size',
			'label'         => __( 'File Size', 'ss-wc-digital-details' ),
			'type'          => 'number',
			'custom_attributes' => array(
				'step' => 'any',
				'min'  => '0'
			),
			'desc_tip'      => true,
			'description'   => __( 'Enter the size of the file in Mega Bytes', 'ss-wc-digital-details' ),
			'wrapper_class' => 'hide_if_variable',
		)
	);

	// Is WebFont?
	woocommerce_wp_checkbox(
		array(
			'id'            => '_is_web_font',
			'label'         => __( 'Is this file a web font?', 'ss-wc-digital-details' ),
			'wrapper_class' => 'hide_if_variable',
		)
	);

	// Is Tileable?
	woocommerce_wp_checkbox(
		array(
			'id'            => '_is_tileable',
			'label'         => __( 'Is this file Tileable?', 'ss-wc-digital-details' ),
			'wrapper_class' => 'hide_if_variable',
		)
	);

	// Is Layered?
	woocommerce_wp_checkbox(
		array(
			'id'            => '_is_layered',
			'label'         => __( 'Is this file layered?', 'ss-wc-digital-details' ),
			'wrapper_class' => 'hide_if_variable',
		)
	);

	// Is Fluid Layout?
	woocommerce_wp_checkbox(
		array(
			'id'            => '_is_fluid_layout',
			'label'         => __( 'Does this file have a fluid layout?', 'ss-wc-digital-details' ),
			'wrapper_class' => 'hide_if_variable',
		)
	);

	// Is Fixed Layout?
	woocommerce_wp_checkbox(
		array(
			'id'            => '_is_fixed_layout',
			'label'         => __( 'Does this file have a fixed layout?', 'ss-wc-digital-details' ),
			'wrapper_class' => 'hide_if_variable',
		)
	);

	// Is Responsive Layout?
	woocommerce_wp_checkbox(
		array(
			'id'            => '_is_responsive_layout',
			'label'         => __( 'Does this file have a responsive layout?', 'ss-wc-digital-details' ),
			'wrapper_class' => 'hide_if_variable',
		)
	);

	// Is Vector?
	woocommerce_wp_checkbox(
		array(
			'id'            => '_is_vector',
			'label'         => __( 'Is this file a vector?', 'ss-wc-digital-details' ),
			'wrapper_class' => 'hide_if_variable',
		)
	);

	// Orientation
	woocommerce_wp_select(
		array(
			'id'      => '_orientation',
			'label'   => __( 'Orientation', 'ss-wc-digital-details' ),
			'options' => array(
				'landscape' => __( 'Landscape', 'ss-wc-digital-details' ),
				'portrait'  => __( 'Portrait', 'ss-wc-digital-details' ),
			),
		)
	);

	// Requirements
	woocommerce_wp_select(
		array(
			'id'      => '_requirements',
			'label'   => __( 'Requirements', 'ss-wc-digital-details' ),
			'type'    => 'multiselect',
			'options' => apply_filters( 'ss_wc_digital_details_requirement_options', array(
				'adobe_cs5+'         => 'Adobe CS5+',
				'adobe_photoshop'    => 'Adobe Photoshop',
				'adobe_indesign'     => 'Adobe Indesign',
				'adobe_after_effcts' => 'Adobe After Effects'
			) )
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
				'step' 	=> 'any',
				'min'	=> '72'
			),
			'wrapper_class'     => 'hide_if_variable',
			'style'             => 'width:80px;'
		)
	);

	echo '</div>';

	echo '</div>'; // Close product tab panel
} // END ss_wc_write_digital_details_tab_panel()

/**
 * Saves the product options for single products.
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
