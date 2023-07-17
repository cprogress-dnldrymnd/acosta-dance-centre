<?php $featured_classes = get__theme_option('featured_classes'); ?>

<?php if ($featured_classes) { ?>
  <section class="featured-product background-light-red md-padding-bottom d-flex">
    <div class="inner">
      <div class="heading-box">
        <h2 class="big-title">
          SUMMER 23<br> FEATURED CLASSES
        </h2>
      </div>

      <div class="product-box-style-1">
        <?php foreach ($featured_classes as $class) { ?>
          <div class="row align-items-center">
            <div class="col-lg-2 text-center">
              <div class="meta-date">
                <span class="day">25</span>
                <span class="month">JULY</span>
              </div>
            </div>
            <div class="col-lg-3">
              <div class="image-box">
                <img src="<?= get_the_post_thumbnail_url($class['id']) ?>" alt="<?= get_the_title($class['id']) ?>">
              </div>
            </div>
            <div class="col-lg-5">
              <div class="heading-box">
                <h3><?= get_the_title($class['id']) ?></h3>
              </div>
            </div>
            <div class="col-lg-2">
              <div class="book-box">
                <a href="<?= get_permalink($class['id']) ?>">BOOK NOW</a>
              </div>
            </div>
          </div>
        <?php } ?>
      </div>
    </div>
  </section>
<?php } ?>