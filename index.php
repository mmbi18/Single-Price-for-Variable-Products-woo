<?php
/*
Plugin Name: Single Price for Variable Products tma
Description: www.t-ma.ir Display only a single price for variable products in WooCommerce.
Version: 1.0
Author: mohammad bagheri
*/

// Display only the minimum price for variable products
add_filter('woocommerce_variable_sale_price_html', 'custom_variation_price', 10, 2);
add_filter('woocommerce_variable_price_html', 'custom_variation_price', 10, 2);

function custom_variation_price($price, $product) {
    // Get all variation prices
    $prices = $product->get_variation_prices(true);

    // Get the minimum price
    $min_price = current($prices['price']);

    // Format the price
    $price = wc_price($min_price);

    return $price;
}
