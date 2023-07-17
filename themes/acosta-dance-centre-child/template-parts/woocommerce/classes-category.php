<?php
$term_id = get_queried_object()->term_id;
$product_category = get__terms('product_cat', $term_id);
?>
<?php if ($product_category) { ?>
  <section class="product-category-section">
    <div class="row">
      <?php foreach ($product_category as $cat) { ?>
        <div class="col-lg-4" id="term-<?= $cat['id'] ?>">
          <a class="column-holder d-block" href="<?= $cat['term_link'] ?>">
            <div class="image-box">
              <img src="<?= $cat['thumbnail_url'] ?>" alt="">
            </div>
            <div class="heading-box">
              <h3><?= $cat['name'] ?></h3>
            </div>
          </a>
        </div>
      <?php } ?>
    </div>
  </section>
<?php } ?>