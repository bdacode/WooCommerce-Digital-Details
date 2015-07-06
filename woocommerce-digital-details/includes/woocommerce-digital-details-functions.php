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
	// Is Web Font?
	$is_web_font = get_post_meta( $atts['product_id'], '_is_web_font', true );
	// Is Tileable?
	$is_tileable = get_post_meta( $atts['product_id'], '_is_tileable', true );
	// Is Layered?
	$is_layered = get_post_meta( $atts['product_id'], '_is_layered', true );
	// Is Fluid Layout?
	$is_fluid_layout = get_post_meta( $atts['product_id'], '_is_fluid_layout', true );
	// Is Fixed Layout?
	$is_fixed_layout = get_post_meta( $atts['product_id'], '_is_fixed_layout', true );
	// Is Responsive Layout?
	$is_responsive = get_post_meta( $atts['product_id'], '_is_responsive_layout', true );
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
	// Message to Customers
	$message_to_customers = get_post_meta( $atts['product_id'], '_message_to_customers', true );

	// Now we display the post meta data.
	echo '<p>' . __( 'Product Details', 'ss-wc-digital-details' ) . '</p>';

	echo '<ul class="product-meta digital-details">' .
		. '<li>
			<dl>
				<dt><i class="icon-calendar"></i>' . __( 'Date', 'ss-wc-digital-details' ) . '</dt>
				<dd>' . the_date( 'j M, Y' ) . '</dd>
			</dl>
		</li>';

	if ( !empty( $licence ) ) {
	echo '<li>
			<dl>
				<dt><i class="icon-page"></i>' . __( 'License', 'ss-wc-digital-details' ) . '</dt>
				<dd>' . $licence . '</dd>
			</dl>
		</li>';
	} // END if licence

	echo '<li>
			<dl>
				<dt><i class="icon-filetype"></i>' . __( 'File Types', 'ss-wc-digital-details' ) . ' <i class="icon-chris"></i> </dt>
				<dd class="filetypes"> ';

				$terms = get_the_terms( $atts['product_id'], 'file_types' );
				if ( $terms && ! is_wp_error( $terms ) ) {
					$file_type = array();

					foreach ( $terms as $term ) {
						$file_type[] = $term->name;
					}

					$file_types = join( ", ", $file_type );
				}
				echo $file_types . '</dd>
			</dl>
		</li>';
	// END if file types

	if ( !empty( $file_size ) ) {
	echo '<li>
			<dl>
				<dt><i class="icon-anchor"></i>' . __( 'File Size', 'ss-wc-digital-details' ) . '</dt>
				<dd>' . $file_size . '</dd>
			</dl>
		</li>';
	} // END if file size

	if ( !empty( $layered ) && $layered == 'yes' ) {
	echo '<li>
			<dl>
				<dt><i class="icon-layered"></i>' . __( 'Layered', 'ss-wc-digital-details' ) . '</dt>
				<dd>Yes</dd>
			</dl>
		</li>';
	} // END if layered

	if ( !empty( $dimensions ) ) {
	echo '<li>
			<dl>
				<dt><i class="icon-size"></i>'. __( 'Dimensions', 'ss-wc-digital-details' ) . '</dt>
				<dd>' . $dimensions . '</dd>
			</dl>
		</li>';
	} // END if dimensions

	echo '</ul>'; // End of list

	// You can add anything after everything has been displayed.
	do_action( 'ss_wc_shortcode_after_digital_details' );
}
add_shortcode( 'digital_details', 'ss_wc_digital_details_shortcode' );
