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
	// Is Vector?
	$is_vector = get_post_meta( $atts['product_id'], '_is_vector', true );
	// Is Fluid Layout?
	$is_fluid_layout = get_post_meta( $atts['product_id'], '_is_fluid_layout', true );
	// Is Fixed Layout?
	$is_fixed_layout = get_post_meta( $atts['product_id'], '_is_fixed_layout', true );
	// Is Responsive Layout?
	$is_responsive = get_post_meta( $atts['product_id'], '_is_responsive_layout', true );
	// Columns
	$columns = get_post_meta( $atts['product_id'], '_columns', true );
	// Minimum Browser Requirement
	$minimum_browser_requirements = get_post_meta( $atts['product_id'], '_minimum_browser_requirement', true );
	// Dimensions
	$dimensions = get_post_meta( $atts['product_id'], '_dimensions', true );
	// Orientation
	$orientation = get_post_meta( $atts['product_id'], '_orientation', true );
	// DPI Size
	$dpi_size = get_post_meta( $atts['product_id'], '_dpi_size', true );
	// Requirements
	$requirements = get_post_meta( $atts['product_id'], '_requirements', true );
	// Live Preview
	$live_preview = get_post_meta( $atts['product_id'], '_live_preview', true );

	// Now we display the post meta data.
	//echo '<p>' . __( 'Product Details', 'ss-wc-digital-details' ) . '</p>';

	echo '<ul class="product-meta digital-details">
		<li>
			<dl>
				<dt><i class="icon-calendar"></i>' . __( 'Date', 'ss-wc-digital-details' ) . '</dt>
				<dd>' . get_the_date( 'j M, Y' ) . '</dd>
			</dl>
		</li>';

	// Licence
	if ( !empty( $licence ) ) {
	echo '<li>
			<dl>
				<dt><i class="icon-page"></i>' . __( 'License', 'ss-wc-digital-details' ) . '</dt>
				<dd>' . $licence . '</dd>
			</dl>
		</li>';
	} // END if licence

	// File Types
	$terms = get_the_terms( $atts['product_id'], 'file_types' );
	if ( $terms && ! is_wp_error( $terms ) ) {

	echo '<li>
			<dl>
				<dt><i class="icon-filetype"></i>' . __( 'File Types', 'ss-wc-digital-details' ) . ' <i class="icon-chris"></i> </dt>
				<dd class="filetypes"> ';

				$file_type = array();

				foreach ( $terms as $term ) {
					$file_type[] = $term->name;
				}

				$file_types = join( ", ", $file_type );
				echo $file_types . '</dd>
			</dl>
		</li>';
	} // END if file types

	// File Size
	if ( !empty( $file_size ) ) {
	echo '<li>
			<dl>
				<dt><i class="icon-anchor"></i>' . __( 'File Size', 'ss-wc-digital-details' ) . '</dt>
				<dd>' . $file_size . '</dd>
			</dl>
		</li>';
	} // END if file size

	// Web Font
	if ( !empty( $is_web_font ) && $is_web_font == 'yes' ) {
	echo '<li>
			<dl>
				<dt><i class="icon-font"></i>' . __( 'Web Font', 'ss-wc-digital-details' ) . '</dt>
				<dd>Yes</dd>
			</dl>
		</li>';
	} // END if web font

	// Is Tileable
	if ( !empty( $is_tileable ) && $is_tileable == 'yes' ) {
	echo '<li>
			<dl>
				<dt><i class="icon-tileable"></i>' . __( 'Tileable', 'ss-wc-digital-details' ) . '</dt>
				<dd>Yes</dd>
			</dl>
		</li>';
	} // END if tileable

	// Layered
	if ( !empty( $is_layered ) && $is_layered == 'yes' ) {
	echo '<li>
			<dl>
				<dt><i class="icon-layered"></i>' . __( 'Layered', 'ss-wc-digital-details' ) . '</dt>
				<dd>Yes</dd>
			</dl>
		</li>';
	} // END if layered

	// Fluid Layout
	if ( !empty( $is_fluid_layout ) && $is_fluid_layout == 'yes' ) {
	echo '<li>
			<dl>
				<dt><i class="icon-fluid-layout"></i>' . __( 'Fluid Layout', 'ss-wc-digital-details' ) . '</dt>
				<dd>Yes</dd>
			</dl>
		</li>';
	} // END if fluid layout

	// Fixed Layout
	if ( !empty( $is_fixed_layout ) && $is_fixed_layout == 'yes' ) {
	echo '<li>
			<dl>
				<dt><i class="icon-fixed-layout"></i>' . __( 'Fixed Layout', 'ss-wc-digital-details' ) . '</dt>
				<dd>Yes</dd>
			</dl>
		</li>';
	} // END if fixed layout

	// Responsive Layout
	if ( !empty( $is_responsive_layout ) && $is_responsive_layout == 'yes' ) {
	echo '<li>
			<dl>
				<dt><i class="icon-responsive-layout"></i>' . __( 'Responsive Layout', 'ss-wc-digital-details' ) . '</dt>
				<dd>Yes</dd>
			</dl>
		</li>';
	} // END if fluid layout

	// Columns
	if ( !empty( $columns ) ) {
	echo '<li>
			<dl>
				<dt><i class="icon-columns"></i>'. __( 'Columns', 'ss-wc-digital-details' ) . '</dt>
				<dd>' . $columns . '</dd>
			</dl>
		</li>';
	} // END if columns

	// Minimum Browser
	if ( !empty( $minimum_browser_requirements ) ) {
	echo '<li>
			<dl>
				<dt><i class="icon-browser"></i>'. __( 'Minimum Browsers', 'ss-wc-digital-details' ) . '</dt>
				<dd>';

				foreach( $minimum_browser_requirements as $key => $browser ) {
					$browsers[] = $browser;
				}

				$browsers = join( ", ", $browsers );

				echo $browsers . '</dd>
			</dl>
		</li>';
	} // END if minimum browser

	// Dimensions
	if ( !empty( $dimensions ) ) {
	echo '<li>
			<dl>
				<dt><i class="icon-size"></i>'. __( 'Dimensions', 'ss-wc-digital-details' ) . '</dt>
				<dd>' . wpautop( $dimensions ) . '</dd>
			</dl>
		</li>';
	} // END if dimensions

	// Orientation
	if ( !empty( $orientation ) ) {
	echo '<li>
			<dl>
				<dt><i class="icon-orientation"></i>'. __( 'Orientation', 'ss-wc-digital-details' ) . '</dt>
				<dd>';
				foreach( $orientation as $key => $rotation ) {
					echo $rotation;
				}
				echo '</dd>
			</dl>
		</li>';
	} // END if orientation

	// DPI Size
	if ( !empty( $dpi_size ) ) {
	echo '<li>
			<dl>
				<dt><i class="icon-dpi-size"></i>'. __( 'DPI Size', 'ss-wc-digital-details' ) . '</dt>
				<dd>' . $dpi_size . ' DPI</dd>
			</dl>
		</li>';
	} // END if dpi size

	// Requirements
	if ( !empty( $requirements ) ) {
	echo '<li>
			<dl>
				<dt><i class="icon-requirements"></i>'. __( 'Requirements', 'ss-wc-digital-details' ) . '</dt>
				<dd>';

				foreach( $requirements as $key => $requirement ) {
					$required[] = $requirement;
				}

				$required = join( ", ", $required );

				echo $required . '</dd>
			</dl>
		</li>';
	} // END if requirement

	// Live Preview
	if ( !empty( $live_preview ) ) {
	echo '<li>
			<dl>
				<dt><i class="icon-web"></i>'. __( 'Live Preview', 'ss-wc-digital-details' ) . '</dt>
				<dd><a class="button alt custom" href="' . $live_preview . '" target="_blank">'. __( 'View Live Preview', 'ss-wc-digital-details' ) . '</a></dd>
			</dl>
		</li>';
	} // END if live preview

	echo '</ul>'; // End of list

	// You can add anything after everything has been displayed.
	do_action( 'ss_wc_shortcode_after_digital_details' );

	return ob_get_clean();
}
add_shortcode( 'digital_details', 'ss_wc_digital_details_shortcode' );
