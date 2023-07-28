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
remove_action('woocommerce_single_product_summary', 'woocommerce_template_single_excerpt', 20);
remove_action('woocommerce_single_product_summary', 'woocommerce_template_single_add_to_cart', 30);
remove_action('woocommerce_single_product_summary', 'woocommerce_template_single_price', 10);


add_action('single_product_custom_title', 'woocommerce_template_single_title');

function action_woocommerce_before_single_product_summary()
{
  echo '<section class="product-summary">';
}


add_action('woocommerce_before_single_product_summary', 'action_woocommerce_before_single_product_summary');

function action_woocommerce_after_single_product_summary()
{
  echo '</section>';
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
  //if (has_term($product_cats, 'product_cat', $product_id)) {

  // KEEP BELOW ONLY THE TABS YOU NEED TO REMOVE   <===  <===  <===  <===
  unset($tabs['description']); // (Description tab)  
  unset($tabs['reviews']); // (Reviews tab)
  unset($tabs['additional_information']); // (Additional information tab)
  //}
  return $tabs;
}


function action_woocommerce_after_single_product()
{
  global $product;
  do_action('single_product_after_image');
  echo '</div>';
  echo ' <div class="col-xl-4">';
  $ticket_date = single_get_date($product->get_id());
  $ticket_time = single_get_date($product->get_id(), 'time');

  $_product_category = _product_category(get_the_ID());
  ?>

  <div class="details-box position-relative">
    <h3 class="doro-heading">DETAILS</h3>
    <?php if ($_product_category != 'memberships') { ?>
      <table class="table">
        <?php if ($product->get_price_html()) { ?>
          <tr>
            <th>PRICE</th>
          </tr>
          <tr>
            <td><?= $product->get_price_html(); ?></td>
          </tr>
        <?php } ?>

        <?php if ($ticket_date) { ?>
          <tr>
            <th>DATE</th>
          </tr>
          <tr>
            <td><?= $ticket_date ?> </td>
          </tr>
        <?php } ?>

        <?php if ($ticket_time) { ?>
          <tr>
            <th>TIME</th>
          </tr>
          <tr>
            <td><?= $ticket_time ?> </td>
          </tr>
        <?php } ?>
        <?php do_action('woocommerce_product_additional_information', $product); ?>
      </table>
    <?php }
    else { ?>
      <?= get_the_excerpt() ?>
    <?php } ?>

    <div class="button-box text-center button-black">
      <?php
      if ($_product_category == 'workshops') {
        echo '<div class="button-box button-black">';
        echo ' <a href="#book-now">BOOK NOW</a>';
        echo '</div>';
      }
      else if ($_product_category == 'classes') {
        echo ' <span>AVAILABLE TO BOOK SOON</span>';
      }
      else if ($_product_category == 'memberships') {
        echo ' <a href="#join-now">JOIN NOW</a>';
      }
      ?>
    </div>
  </div>

  <?php
  if ($_product_category != 'memberships') {
    echo do_shortcode('[membership_box]');

  }
  else { ?>
    <div class="membership-side-buttons">
      <div class="button-box button-black mb-3">
        <a href="/category/tickets/classes/" class="w-100">FIND A DANCE CLASS</a>
      </div>
      <div class="button-box button-bordered">
        <a href="/category/tickets/workshops/" class="w-100">FIND A WORKSHOP</a>
      </div>
    </div>
  <?php } ?>
  <?php
  echo '</div>';
  echo '</div>';

}


add_action('woocommerce_after_single_product', 'action_woocommerce_after_single_product');


function action_woocommerce_before_single_product()
{
  echo '<div class="product-inner">';
  echo '<div class="row">';
  echo '<div class="col-xl-8">';
}

add_action('woocommerce_before_single_product', 'action_woocommerce_before_single_product');


function action_woocommerce_sidebar()
{
  if (is_product()) {
    remove_action('woocommerce_sidebar', 'woocommerce_get_sidebar', 10);
  }
}
add_action('wp', 'action_woocommerce_sidebar');

function action_single_product_after_image()
{
  $text_after_image = carbon_get_the_post_meta('text_after_image');
  $ticket_date = single_get_date(get_the_ID());
  $ticket_time = single_get_date(get_the_ID(), 'time');
  $_product_category = _product_category(get_the_ID());
  ?>
  <div class="content-margin">
    <?php if ($text_after_image) { ?>
      <h2 class="doro-heading">
        <?= $text_after_image ?>
      </h2>
    <?php } ?>
    <?php if ($_product_category != 'memberships') { ?>
      <div class="date-box text-uppercase">
        <?= $ticket_date . ',  ' . $ticket_time ?>
      </div>
    <?php } ?>

    <div class="content-box">
      <?= wpautop(get_the_content()) ?>
    </div>

    <?php if ($_product_category != 'memberships') { ?>
      <div class="book-now-wrapper text-center">
        <div class="button-group-box text-center justify-content-center " id="book-now">
          <?php
          if ($_product_category == 'workshops') {
            echo '<div class="button-box button-black">';
            do_action('single_add_to_cart');
            echo '</div>';
          }
          ?>

          <div class="button-box  button-bordered" id="join-now">
            <a href="/memberships">
              MEMBERSHIPS
            </a>
          </div>
        </div>
      </div>
    <?php } ?>

    <?php if ($_product_category == 'memberships') { ?>
      <style>
        .newsletter-box {
          max-width: 66.666667%;
        }

        .newsletter-box h3 {
          font-size: 50px;
        }
      </style>
      <?php
      global $product;
      $variations = $product->get_available_variations();
      $product_variation = array();
      foreach ($variations as $variation) {
        $product_variation[$variation['variation_id']] = $variation['attributes']['attribute_payment-plan'];
      }
      ?>
      <div class="add-to-cart-box text-center md-padding-bottom" id="join-now">
        <h3>A PLACE OF PASSION, ARTISTIC BRILLIANCE, AND BOUNDLESS CREATIVITY. JOIN THE ACOSTA DANCE CENTRE TODAY</h3>
        <div class="button-group-box justify-content-center">
          <?php foreach ($product_variation as $key => $variation) { ?>
            <?php
            $product = wc_get_product($key);
            ?>
            <div class="button-box <?= $variation == 'Monthly' ? 'button-black' : 'button-bordered' ?>">
              <a href="?add-to-cart=<?= $key ?>">
                PAY <?= $variation ?>
              </a>
            </div>
          <?php } ?>
        </div>
      </div>
    <?php } ?>

    <?php if ($_product_category != 'memberships') { ?>
      <div class="classes md-padding">
        <?= do_shortcode('[adc_classes type="related"]') ?>
      </div>
    <?php } ?>
  </div>

  <?php
}


add_action('single_product_after_image', 'action_single_product_after_image');

add_action('single_add_to_cart', 'woocommerce_template_single_add_to_cart');



/**
 * Remove related products output
 */
remove_action('woocommerce_after_single_product_summary', 'woocommerce_output_related_products', 20);



function _product_category($id, $classes = 'classes', $workshops = 'workshops', $memberships = 'memberships')
{
  $terms = get_the_terms($id, 'product_cat');
  $terms_val = array();
  foreach ($terms as $term) {
    $terms_val[] = $term->term_id;
  }
  if (in_array(79, $terms_val)) {
    return $classes;
  }
  else if (in_array(78, $terms_val)) {
    return $workshops;
  }
  else if (in_array(88, $terms_val)) {
    return $memberships;
  }
}

function _product_category_id($id)
{
  $terms = get_the_terms($id, 'product_cat');
  $terms_val = array();
  foreach ($terms as $term) {
    $terms_val[] = $term->term_id;
  }
  if (in_array(79, $terms_val)) {
    return 79;
  }
  else if (in_array(78, $terms_val)) {
    return 78;
  }
  else if (in_array(88, $terms_val)) {
    return 88;
  }
}

// Change add to cart text on single product page
add_filter('woocommerce_product_single_add_to_cart_text', 'woocommerce_add_to_cart_button_text_single');
function woocommerce_add_to_cart_button_text_single()
{
  return __('BOOK NOW', 'woocommerce');
}

function default_no_quantities($individually, $product)
{
  $individually = true;
  return $individually;
}
add_filter('woocommerce_is_sold_individually', 'default_no_quantities', 10, 2);

add_action('woocommerce_cart_totals_custom_text', 'action_woocommerce_cart_totals_before_shipping', 10, 0);

function action_woocommerce_cart_totals_before_shipping()
{
  ?>
  <tr class='cart-subtotal'>
    <th>Membership Discount</th>
    <td><?php var_dump(wc_memberships_get_user_active_memberships())?></td>
  </tr>
  <?php
}