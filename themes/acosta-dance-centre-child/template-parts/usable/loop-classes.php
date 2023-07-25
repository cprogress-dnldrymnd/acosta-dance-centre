<?php
if ($args['type'] == 'featured_classes') {
  $classes = get__theme_option('featured_classes');
}
else if ($args['type'] == 'other_classes') {
  $posts = array(
    'post_type' => 'product',
    'tax_query' => array(
      array(
        'taxonomy' => 'product_cat',
        'field'    => 'slug',
        'terms'    => 'classes'
      )
    )
  );


  $post_list = get_posts($posts);

  $classes = array();

  foreach ($post_list as $post) {
    $classes[] = array(
      'id' => $post->ID
    );
  }
} else if($args['type'] == 'featured_workshops') {
  $classes = get__theme_option('featured_workshops');
}
else {
  $classes = get__theme_option('featured_classes');
}
?>

<section class="featured-product background-light-red d-flex">
  <div class="inner">
    <?php if ($args['heading']) { ?>
      <div class="heading-box mb-5">
        <h2 class="big-title">
          <?= $args['heading'] ?>
        </h2>
      </div>
    <?php } ?>
    <div class="product-box-style-1">
      <?php foreach ($classes as $class) { ?>
        <?php
        $ticket_date_val = get_post_meta($class['id'], '_ticket_checkin_availability_from_date', true);
        $dateformat = strtotime($ticket_date_val);
        $ticket_time = date('g:i a', $dateformat);
        $ticket_day = date('d', $dateformat);
        $ticket_month = date('M', $dateformat);
        ?>
        <div class="product-box-item">
          <div class="row align-items-center">
            <div class="col-lg-2 text-center">
              <div class="meta-date">
                <span class="day d-block"><?= $ticket_day ?></span>
                <span class="month d-block text-uppercase"><?= $ticket_month ?></span>
              </div>
            </div>
            <div class="col-lg-3">
              <div class="image-box position-relative">
                <img src="<?= get_the_post_thumbnail_url($class['id']) ?>" alt="<?= get_the_title($class['id']) ?>">
              </div>
            </div>
            <div class="col-lg-5">
              <div class="title-box">
                <a href="<?= the_permalink() ?>">
                  <h3><?= get_the_title($class['id']) ?></h3>
                </a>
                <div class="meta text-uppercase">
                  <span class="type meta-style-1 mr-4 d-inline-block">STUDIO</span>
                  <span class="time meta-style-1 d-inline-block">TIME: <?= $ticket_time ?></span>
                </div>
              </div>
            </div>
            <div class="col-lg-2">
              <div class="book-box text-center">
                <a href="<?= get_permalink($class['id']) ?>">BOOK</a>
              </div>
            </div>
          </div>
        </div>
      <?php } ?>
    </div>
  </div>
</section>