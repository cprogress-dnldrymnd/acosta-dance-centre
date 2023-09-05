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
                $html .= '<span class="the-price">£' . number_format((float) $product->get_regular_price(), 2, '.', '') . '</span>';
                $html .= '<span class="the-time">';
                $html .= $ticket_time;
                $html .= '<a href="?add-to-cart=' . get_the_ID() . '" data-quantity="1" class="button product_type_simple add_to_cart_button ajax_add_to_cart" data-product_id="1754" data-product_sku="' . get_the_ID() . '"><svg xmlns="http://www.w3.org/2000/svg" width="21.079" height="19.314" viewBox="0 0 21.079 19.314"> <g id="Component_1_2" data-name="Component 1 – 2" transform="translate(0.5 0.5)"> <path id="Path_90" data-name="Path 90" d="M13.37,30.632A.687.687,0,1,1,12.685,30,.66.66,0,0,1,13.37,30.632Z" transform="translate(-5.453 -12.95)" fill="none" stroke="#0f0f0f" stroke-linecap="round" stroke-linejoin="round" stroke-width="1"/> <path id="Path_91" data-name="Path 91" d="M29.87,30.632A.687.687,0,1,1,29.185,30,.66.66,0,0,1,29.87,30.632Z" transform="translate(-11.161 -12.95)" fill="none" stroke="#0f0f0f" stroke-linecap="round" stroke-linejoin="round" stroke-width="1"/> <path id="Path_92" data-name="Path 92" d="M1.5,1.5H5.151L7.6,14.462a1.854,1.854,0,0,0,1.825,1.559h8.871a1.854,1.854,0,0,0,1.825-1.559l1.46-8.122H6.063" transform="translate(-1.5 -1.5)" fill="none" stroke="#0f0f0f" stroke-linecap="round" stroke-linejoin="round" stroke-width="1"/> <g id="Group_322" data-name="Group 322" transform="translate(-2.526 -1)"> <g id="Group_321" data-name="Group 321" transform="translate(12.893 9.528)"> <path id="Path_167" data-name="Path 167" d="M22938.914,4192.754c-.121,0-.219-.13-.219-.292v-3.348c0-.161.1-.292.219-.292s.217.131.217.292v3.348C22939.131,4192.624,22939.035,4192.754,22938.914,4192.754Z" transform="translate(-22936.275 -4189.32)" fill="#0f0f0f"/> <path id="Path_168" data-name="Path 168" d="M22940.137,4190.909h-3.348c-.162,0-.293-.1-.293-.218s.131-.218.293-.218h3.348c.162,0,.293.1.293.218S22940.3,4190.909,22940.137,4190.909Z" transform="translate(-22935.824 -4189.222)" fill="#0f0f0f"/> </g> </g> </g> </svg></a>';
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