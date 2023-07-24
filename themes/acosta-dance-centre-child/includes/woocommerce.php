<?php
// Change add to cart text on product archives page
add_filter('woocommerce_product_add_to_cart_text', 'woocommerce_add_to_cart_button_text_archives');
function woocommerce_add_to_cart_button_text_archives()
{
  return __('BOOK', 'woocommerce');
}

/**
 * @snippet       WooCommerce Hide Prices on the Shop Page
 * @how-to        Get CustomizeWoo.com FREE
 * @author        Rodolfo Melogli
 * @compatible    WooCommerce 5.1
 * @donate $9     https://businessbloomer.com/bloomer-armada/
 */

remove_action('woocommerce_after_shop_loop_item_title', 'woocommerce_template_loop_price', 10);


function action_woocommerce_before_shop_loop_item_title()
{
  echo 'ttes';
}

add_action('woocommerce_before_shop_loop_item_title', 'woocommerce_before_shop_loop_item_title');