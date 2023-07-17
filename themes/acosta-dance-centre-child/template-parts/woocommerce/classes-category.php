<?php
$term_id = get_queried_object()->term_id;
$product_category = get__terms('product_cat', $term_id);
?>
<pre>
  <?php
  var_dump(get__terms('product_cat', $term_id));
  ?>
</pre>
<?php if ($product_category) { ?>
  <div class="product-category-holder">
    <div class="row">
      <?php foreach ($product_category as $cat) { ?>
        <div class="col-lg-4">
          <a class="column-holder d-block">
            <div class="image-box">
              <img src="<?= $cat['thumbnail_url'] ?>" alt="">
            </div>
          </a>
        </div>
      <?php } ?>
    </div>
  </div>
<?php } ?>