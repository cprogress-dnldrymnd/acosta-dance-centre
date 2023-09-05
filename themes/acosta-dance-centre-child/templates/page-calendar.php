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
if ($query->have_posts()) {
  while ($query->have_posts()) {
    $query->the_post();
    echo '<pre>';
    var_dump(get_post_meta(get_the_ID()));
    echo '</pre>';
  }
  wp_reset_postdata();
}

?>
<section class="calendar">
  <div id="calendar"></div>
</section>
<?php get_footer(); ?>
<script>
  var $ = jQuery;
  var calendar = jQuery("#calendar").calendarGC({
    events: [
      {
        date: new Date("2023-09-09"),
        eventName: "Holiday",
        className: "my-class",
        onclick(e, data) {
          console.log(data);
        },
        dateColor: "red"
      },
      {
        date: new Date("2022-02-07"),
        eventName: "Holiday with wife",
        className: "my-class",
        onclick(e, data) {
          console.log(data);
        },
        dateColor: "red"
      },
      // ... more events
    ],
    onclickDate: function (e, data) {
      console.log(e, data);
    }
  });
</script>