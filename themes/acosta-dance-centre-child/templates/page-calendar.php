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
      dayNames: ['Sunday','Monday','Tuesday','Wednesday','Thursday','Friday','Saturday'],
      events: [
        <?php while ($query->have_posts()) { ?>
                    <?php
                    $query->the_post();
                    $_ticket_checkin_availability_from_date = get_post_meta(get_the_ID(), '_ticket_checkin_availability_from_date', true);
                    ?>
                    {
            date: new Date("<?= $_ticket_checkin_availability_from_date ?>"),
            eventName: "<?= limit_string(get_the_title(), 40) ?>",
            className: "my-class",
            onclick(e, data) {
              window.location.href = "<?= get_permalink() ?>"
            },
            dateColor: "red"
          },
        <?php } ?>
      ],
      onclickDate: function (e, data) {
        console.log(e, data);
      }
    });
  </script>
<?php } ?>