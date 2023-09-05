<?php
/*-----------------------------------------------------------------------------------*/
/* Template Name: Calendar 
/*-----------------------------------------------------------------------------------*/
?>
<?php get_header(); ?>
<?php
$args = array(
  'post_type'      => 'product',
  'posts_per_page' => -1,
  'tax_query'      => array(
    array(
      'taxonomy' => 'product_cat',
      'field'    => 'slug',
      'terms'    => 'classes',
    ),
  ),
);
$query = new WP_Query($args);
while ($query->have_posts()) {
  $query->the_post();
  //echo '<pre>';
  //var_dump(get_post_meta(get_the_ID()));
//echo '</pre>';
}
wp_reset_postdata();

?>
<?php woocommerce_breadcrumb() ?>
<div class="heading-box">
  <h1><?php the_title() ?></h1>
</div>
<section class="calendar">
  <div id="calendar"></div>
</section>
<?php get_footer(); ?>

<?php if ($query->have_posts()) { ?>
  <?php
  $query = new WP_Query($args);
  ?>
  <script>
    var $ = jQuery;
    var calendar = jQuery("#calendar").calendarGC({
      dayNames: ['Sunday', 'Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday'],
      events: [
        <?php while ($query->have_posts()) { ?>
                <?php
                $query->the_post();
                $_ticket_checkin_availability_from_date = get_post_meta(get_the_ID(), '_ticket_checkin_availability_from_date', true);
                $dateformat = strtotime($_ticket_checkin_availability_from_date);
                $ticket_time = date('g:i a', $dateformat);
                global $product;
                $image = get_the_post_thumbnail_url(get_the_ID(), 'thumbnail');
                $html = '<div class="class-html">';
                $html .= '<a href="' . get_permalink() . '" class="image" style="background-image: url(' . $image . ')">';
                $html .= '</a>';
                $html .= '<div class="title">';
                $html .= '<a class="the-title" href="' . get_permalink() . '">' . get_the_title() . '</a>';
                $html .= '<span class="the-time">';
                $html .= $ticket_time;
                $html .= '<span class="the-price">£' . number_format((float) $product->get_regular_price(), 2, '.', '') . '</span>';
                $html .= '</span>';
                $html .= '<span class="atc">';
                $html .= '<a href="?add-to-cart=' . get_the_ID() . '" data-quantity="1" class="button product_type_simple add_to_cart_button ajax_add_to_cart" data-product_id="' . get_the_ID() . '" >ADD TO CART</a>';
                $html .= '</span>';
                $html .= '</div>';
                $html .= '</div>';
                ?>{
            date: new Date("<?= $_ticket_checkin_availability_from_date ?>"),
            eventName: '<?= $html ?>',
            className: "my-class",
          },
        <?php } ?>
      ],
      onclickDate: function (e, data) {
        console.log(e, data);
      }
    });
  </script>
<?php } ?>