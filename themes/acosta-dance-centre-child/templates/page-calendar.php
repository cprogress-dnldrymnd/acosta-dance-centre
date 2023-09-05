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
                            $html .= '<div class="image" style="background-image: url(' . $image . ')">';
                            $html .= '</div>';
                            $html .= '<div class="title">';
                            $html .= '<span class="the-title">' . get_the_title() . '</span>';
                            $html .= '<span class="the-price">£' . number_format((float) $product->get_regular_price(), 2, '.', '') . '</span>';
                            $html .= '<span class="the-time">';
                            $html .= $ticket_time;
                            $html .= '<a href="?add-to-cart='.get_the_ID().'" data-quantity="1" class="button product_type_simple add_to_cart_button ajax_add_to_cart" data-product_id="1754" data-product_sku="' . get_the_ID() . '"><svg xmlns="http://www.w3.org/2000/svg" width="32.119" height="29.472" viewBox="0 0 32.119 29.472"> <g id="Icon_feather-shopping-cart" data-name="Icon feather-shopping-cart" transform="translate(1 1)"> <path id="Path_90" data-name="Path 90" d="M15.052,31.409A1.531,1.531,0,1,1,13.526,30,1.471,1.471,0,0,1,15.052,31.409Z" transform="translate(-2.527 -5.346)" fill="none" stroke="#0f0f0f" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" /> <path id="Path_91" data-name="Path 91" d="M31.552,31.409A1.531,1.531,0,1,1,30.026,30,1.471,1.471,0,0,1,31.552,31.409Z" transform="translate(-4.486 -5.346)" fill="none" stroke="#0f0f0f" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" /> <path id="Path_92" fill="#000s" data-name="Path 92" d="M1.5,1.5H6.976l3.669,16.978a2.7,2.7,0,0,0,2.738,2.041H26.69a2.7,2.7,0,0,0,2.738-2.041L31.619,7.84H8.345" transform="translate(-1.5 -1.5)" fill="none" stroke="#0f0f0f" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" /> </g> </svg></a>';
                            $html .= '</span>';
                            $html .= '</div>';
                            $html .= '</div>';
                            ?>{
            date: new Date("<?= $_ticket_checkin_availability_from_date ?>"),
            eventName: '<?= $html ?>',
            className: "my-class",
            onclick(e, data) {
              window.location.href = "<?= get_permalink() ?>"
            },
          },
        <?php } ?>
      ],
      onclickDate: function (e, data) {
        console.log(e, data);
      }
    });
  </script>
<?php } ?>