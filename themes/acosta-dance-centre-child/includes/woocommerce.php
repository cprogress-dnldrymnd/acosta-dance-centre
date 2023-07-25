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


function action_woocommerce_before_shop_loop_item()
{
  $ticket_date_val = get_post_meta(get_the_ID(), '_ticket_checkin_availability_from_date', true);
  $dateformat = strtotime($ticket_date_val);
  $ticket_time = date('g:i a', $dateformat);
  $ticket_day = date('d', $dateformat);
  $ticket_day_week = date('D', $dateformat);
  $ticket_month = date('M', $dateformat);
  echo ' <div class="image-holder">';
  ?>
  <div class="meta-date">
    <div class="m-d text-uppercase text-center">
      <span class="month d-block"><?= $ticket_day_week ?></span>
      <span class="day d-block"><?= $ticket_day ?></span>
      <span class="month d-block text-uppercase"><?= $ticket_month ?></span>
    </div>
    <div class="time-holder text-center">
      <span class="time d-block text-uppercase month"><?= $ticket_time ?></span>
    </div>
  </div>
  <?php
}

add_action('woocommerce_before_shop_loop_item', 'action_woocommerce_before_shop_loop_item');

function action_woocommerce_after_shop_loop_item_title()
{
  echo '</div>';
  ?>
  <h3>
    <?= get_the_title() ?>
  </h3>
  <?php
}

add_action('woocommerce_after_shop_loop_item_title', 'action_woocommerce_after_shop_loop_item_title');


remove_action('woocommerce_shop_loop_item_title', 'woocommerce_template_loop_product_title', 10);

/*
add_action('woocommerce_new_product', 'mp_sync_on_product_save', 10, 1);
add_action('woocommerce_update_product', 'mp_sync_on_product_save', 10, 1);
function mp_sync_on_product_save($product_id)
{

  $product = wc_get_product($product_id);

  $product_attr = get_post_meta($product_id, '_product_attributes', true); //get the whole product attributes first


  update_post_meta($product_id, '_product_attributes', $product_attr);
}*/

remove_action('woocommerce_single_product_summary', 'woocommerce_template_single_title', 5);
remove_action('woocommerce_single_product_summary', 'woocommerce_template_single_meta', 40);

function action_before_single_product_image()
{
  echo '<h1 class="product_title entry-title"> ' . get_the_title() . '</h1>';
}

add_action('before_single_product_image', 'action_before_single_product_image');

function action_woocommerce_before_single_product_summary()
{
  echo '<div class="product-summary d-flex">';
}


add_action('woocommerce_before_single_product_summary', 'action_woocommerce_before_single_product_summary');

function action_woocommerce_after_single_product_summary()
{
  echo '</div>';
}

add_action('woocommerce_after_single_product_summary', 'action_woocommerce_after_single_product_summary');


add_filter('woocommerce_product_tabs', 'conditionaly_removing_product_tabs', 99);
function conditionaly_removing_product_tabs($tabs)
{

  // Get the global product object
  global $product;

  // Get the current product ID
  $product_id = $product->get_id();

  // Define HERE your targeted categories (Ids, slugs or names)   <===  <===  <===
  $product_cats = array('classes');

  // If the current product have the same ID than one of the defined IDs in your array,… 
  // we remove the tab.
  if (has_term($product_cats, 'product_cat', $product_id)) {

    // KEEP BELOW ONLY THE TABS YOU NEED TO REMOVE   <===  <===  <===  <===
    unset($tabs['description']); // (Description tab)  
    unset($tabs['reviews']); // (Reviews tab)
    unset($tabs['additional_information']); // (Additional information tab)
  }
  return $tabs;
}
remove_action('woocommerce_single_product_summary', 'woocommerce_template_single_excerpt', 20);