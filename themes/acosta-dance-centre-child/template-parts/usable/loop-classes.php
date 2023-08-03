<?php
if ($args['type'] == 'featured_classes') {
  $classes = get__theme_option('featured_classes');
}
else if ($args['type'] == 'related') {


  $terms = get_the_terms(get_the_ID(), 'product_cat');
  $terms_val = array();


  foreach ($terms as $term) {
    $terms_val[] = $term->term_id;
  }
  $meta_query = [];

  $meta_query[] = [
    'key'     => '_ticket_checkin_availability_from_date',
    'value'   => date('Y/m/d'),
    'compare' => '>=',
    'type'    => 'DATE'
  ];

  $posts = array(
    'post_type'      => 'product',
    'posts_per_page' => 3,
    'tax_query'      => array(
      array(
        'taxonomy' => 'product_cat',
        'field'    => 'term_id',
        'terms'    => $terms_val
      )
    ),
    'meta_query'     => $meta_query,
    'orderby'        => 'meta_value',
    'order'          => 'ASC'
  );


  $heading_val = _product_category(get_the_ID(), 'CLASSES', 'WORKSHOPS');

  $categ_id = _product_category_id(get_the_ID());

  $post_list = get_posts($posts);

  $classes = array();

  foreach ($post_list as $post) {
    $classes[] = array(
      'id' => $post->ID
    );
  }

  $heading = 'OTHER <br>' . $heading_val;
  $more_text = 'MORE ' . $heading_val;
}
else if ($args['type'] == 'featured_workshops') {
  $classes = get__theme_option('featured_workshops');
  sort($arr);
}
else {
  $classes = get__theme_option('featured_classes');
  sort($arr);
}
/*
if ($args['categ']) {
  $term_name = get_term($args['categ'])->name;
  $more_text = 'MORE ' . $term_name;
  $categ_id = $args['categ'];
}

if (($args['type'] == 'related') || $args['categ']) {
  $more_button_val = 'true';
}
else {
  $more_button_val = 'false';
}1
*/
?>

<?php if ($args['type'] == 'related') { ?>
  <div class="more-button text-right d-none d-lg-block">
    <a class="d-inline-flex align-items-center" href="<?= get_term_link($categ_id) ?>">
      <span class="text mr-3"><?= $more_text ?></span>
      <span class="icon">
        <svg xmlns="http://www.w3.org/2000/svg" width="54.446" height="25.242" viewBox="0 0 54.446 25.242">
          <g id="Icon_feather-arrow-right" data-name="Icon feather-arrow-right" transform="translate(1.5 2.121)">
            <path id="Path_116" data-name="Path 116" d="M7.5,18H58.946" transform="translate(-7.5 -7.5)" fill="none"
              stroke="#000" stroke-linecap="round" stroke-linejoin="round" stroke-width="3" />
            <path id="Path_117" data-name="Path 117" d="M18,7.5,28.5,18,18,28.5" transform="translate(22.946 -7.5)"
              fill="none" stroke="#000" stroke-linecap="round" stroke-linejoin="round" stroke-width="3" />
          </g>
        </svg>
      </span>
    </a>
  </div>
<?php } ?>
<section class="featured-product background-light-red d-flex">

  <div class="inner">
    <?php if ($args['heading'] || $heading) { ?>
      <div class="heading-box mb-5">
        <h2 class="doro-heading">
          <?= $heading ? $heading : $args['heading'] ?>
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
        $product = wc_get_product($class['id']);
        $pa_studio = $product->get_attribute('pa_studio');
        ?>
        <div class="product-box-item">
          <div class="row align-items-center">
            <div class="col-lg-2 col-sm-6 text-center">
              <div class="meta-date">
                <span class="day d-block"><?= $ticket_day ?></span>
                <span class="month d-block text-uppercase"><?= $ticket_month ?></span>
              </div>
            </div>
            <div class="col-lg-3 col-sm-6">
              <div class="image-box position-relative">
                <img src="<?= get_the_post_thumbnail_url($class['id'], 'large') ?>"
                  alt="<?= get_the_title($class['id']) ?>">
              </div>
            </div>
            <div class="col-lg-5">
              <div class="title-box text-uppercase">
                <a href="<?= get_permalink($class['id']) ?>">
                  <h3><?= get_the_title($class['id']) ?></h3>
                </a>
                <div class="meta text-uppercase">
                  <?php if ($pa_studio) { ?>
                    <span class="type meta-style-1 mr-4 d-inline-block"><?= $pa_studio ?></span>
                  <?php } ?>
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
    <?php if ($args['type'] == 'related') { ?>
      <div class="more-button  d-block d-lg-none text-center pb-5">
        <a class="d-inline-flex align-items-center" href="<?= get_term_link($categ_id) ?>">
          <span class="text mr-3"><?= $more_text ?></span>
          <span class="icon">
            <svg xmlns="http://www.w3.org/2000/svg" width="54.446" height="25.242" viewBox="0 0 54.446 25.242">
              <g id="Icon_feather-arrow-right" data-name="Icon feather-arrow-right" transform="translate(1.5 2.121)">
                <path id="Path_116" data-name="Path 116" d="M7.5,18H58.946" transform="translate(-7.5 -7.5)" fill="none"
                  stroke="#000" stroke-linecap="round" stroke-linejoin="round" stroke-width="3" />
                <path id="Path_117" data-name="Path 117" d="M18,7.5,28.5,18,18,28.5" transform="translate(22.946 -7.5)"
                  fill="none" stroke="#000" stroke-linecap="round" stroke-linejoin="round" stroke-width="3" />
              </g>
            </svg>
          </span>
        </a>
      </div>
    <?php } ?>
  </div>
</section>