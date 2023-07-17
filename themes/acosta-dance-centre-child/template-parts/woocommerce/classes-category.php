<?php
$term_id = get_queried_object()->term_id;
$product_category = get__terms('product_cat', $term_id);
?>

<?php if ($product_category) { ?>
  <div class="product-category-holder">
    <div class="row">

    </div>
  </div>
<?php } ?>