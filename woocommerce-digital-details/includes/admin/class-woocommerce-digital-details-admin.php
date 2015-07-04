<?php
/**
 * WooCommerce Digital Details Admin.
 *
 * @author   Sebs Studio
 * @category Admin
 * @package  WooCommerce Digital Details/Admin
 * @version  0.0.1
 */

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

if ( ! class_exists( 'SS_WC_Digital_Details_Admin' ) ) {

class SS_WC_Digital_Details_Admin {

	/**
	 * Constructor
	 *
	 * @since  0.0.1
	 * @access public
	 */
	public function __construct() {
		// Actions
		add_action( 'current_screen', array( $this, 'conditonal_includes' ) );
	} // END __construct()

	/**
	 * Include admin files conditionally.
	 *
	 * @since  0.0.1
	 * @access public
	 */
	public function conditonal_includes() {
		$screen = get_current_screen();

		switch ( $screen->id ) {

			case 'product' :
				include( 'ss-wc-meta-box-functions.php' );
				include( 'post-types/meta-boxes/class-wc-digital-details-meta-box-product-data.php' );
				break;

		} // END switch
	} // END conditional_includes()

} // END class SS_WC_Digital_Details_Admin()

} // END if class_exists('SS_WC_Digital_Details_Admin')

return new SS_WC_Digital_Details_Admin();
