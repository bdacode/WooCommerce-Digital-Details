<?php
/**
 * WooCommerce Digital Details Template Hooks
 *
 * Action/filter hooks used for Digital Details functions/templates
 *
 * @author   Sebs Studio
 * @category Core
 * @package  WooCommerce Digital Details/Templates
 * @version  0.0.1
 */

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

add_filter( 'woocommerce_get_availability', 'ss_wc_digital_details_change_stock_status_label', 10, 2 );
