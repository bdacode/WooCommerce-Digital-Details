<?php
/**
 * WooCommerce Digital Details Page Functions
 *
 * Functions related to product pages.
 *
 * @author   Sebs Studio
 * @category Core
 * @package  WooCommerce Digital Details/Functions
 * @version  0.0.5
 */

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

/**
 * Displays the digital details via a shortcode.
 * This shortcode can be inserted anywhere on the 
 * single product page or via a widget if you 
 * have enabled widgets to support shortcodes.
 *
 * @since  0.0.5
 * @access public
 * @param  $atts
 * @global $post
 */
function ss_wc_digital_details_shortcode( $atts ) {
	global $post;

	// Get attribuets
	$atts = shortcode_atts( array(
		'product_id' => $post->ID,
	), $atts );

	ob_start();

	// If the post type is not identified as a product then display nothing.
	if ( !is_product() ) return false;

	// You can add anything before everything has been displayed.
	do_action( 'ss_wc_shortcode_before_digital_details' );

	// First we collect the post meta data.

	// Licence
	$licence = get_post_meta( $atts['product_id'], '_licence', true );
	// File Size
	$file_size = get_post_meta( $atts['product_id'], '_file_size', true );
	// Is WebFont?
	$is_web_font = get_post_meta( $atts['product_id'], '_is_web_font', true );
	// Is Tileable?
	$is_tileable = get_post_meta( $atts['product_id'], '_is_tileable', true );
	// Is Layered?
	$is_layered = get_post_meta( $atts['product_id'], '_is_layered', true );
	// Is Fluid Layout?
	$is_fluid_layout = get_post_meta( $atts['product_id'], '_is_fluid_layout', true );
	// Is Fixed Layout?
	$is_fixed_layout = get_post_meta( $atts['product_id'], '_is_fixed_layout', true );
	// Is Responsive?
	$is_responsive = get_post_meta( $atts['product_id'], '_is_responsive', true );
	// Is Vector?
	$is_vector = get_post_meta( $atts['product_id'], '_is_vector', true );
	// DPI Size
	$dpi_size = get_post_meta( $atts['product_id'], '_dpi_size', true );
	// Columns
	$columns = get_post_meta( $atts['product_id'], '_columns', true );
	// Orientation
	$orientation = get_post_meta( $atts['product_id'], '_orientation', true );
	// Requirements
	$requirements = get_post_meta( $atts['product_id'], '_requirements', true );
	// Minimum Browser Requirement
	$minimum_browser_requirements = get_post_meta( $atts['product_id'], '_minimum_browser_requirement', true );
	// Dimensions
	$dimensions = get_post_meta( $atts['product_id'], '_dimensions', true );

	// Now we display the post meta data.

	// You can add anything after everything has been displayed.
	do_action( 'ss_wc_shortcode_after_digital_details' );
}
add_shortcode( 'digital_details', 'ss_wc_digital_details_shortcode' );
