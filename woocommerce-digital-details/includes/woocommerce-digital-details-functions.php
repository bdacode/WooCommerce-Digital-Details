<?php
/**
 * WooCommerce Digital Details Page Functions
 *
 * Functions related to product pages.
 *
 * @author   Sebs Studio
 * @category Core
 * @package  WooCommerce Digital Details/Functions
 * @version  0.0.1
 */

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

function ss_wc_digital_details_change_stock_status_label( $availability, $_product ) {
	global $post;

	// First check that if we have stock.
	if ( !$_product->is_in_stock() ) {

		// Change the label text "Out of Stock" to "'Digital Details".
		$set_digital_details   = get_post_meta( $post->ID, '_set_digital_details', true );
		$digital_details_label = get_post_meta( $post->ID, '_digital_details_label', true );

		if ( !empty( $set_digital_details ) && $set_digital_details == 'yes' ) {
			if ( !empty( $digital_details_label ) ) {
				$availability['availability'] = $digital_details_label;
			} else {
				$availability['availability'] = __( 'Digital Details', 'ss-wc-digital-details' );
			}

			$availability['class'] = 'out-of-stock coming-soon';
		}
	}

	return $availability;
}
