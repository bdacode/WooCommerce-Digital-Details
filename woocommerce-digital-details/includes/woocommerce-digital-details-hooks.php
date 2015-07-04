<?php
/**
 * WooCommerce Digital Details Hooks
 *
 * @author   Sebs Studio
 * @category Core
 * @package  WooCommerce Digital Details/Functions
 * @version  0.0.1
 */

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

// Write panel for single products
add_filter( 'woocommerce_product_data_tabs', 'ss_wc_add_digital_details_tab' );
add_action( 'woocommerce_product_data_panels', 'ss_wc_write_digital_details_tab_panel' );
add_action( 'woocommerce_process_product_meta', 'ss_wc_save_digital_details_tab_panel' );
