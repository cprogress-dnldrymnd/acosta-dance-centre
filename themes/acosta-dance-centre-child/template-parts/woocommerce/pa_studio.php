<?php
get_header();
$alt_title = get__term_meta(get_queried_object()->term_id, 'alt_title');

?>
<header class="woocommerce-products-header">
    <?php if (apply_filters('woocommerce_show_page_title', true)) : ?>
        <h1 class="woocommerce-products-header__title page-title big-title">
            <?php
            if ($alt_title) {
                echo $alt_title;
            } else {
                woocommerce_page_title();
            }
            ?>
        </h1>
    <?php endif; ?>

    <?php
    /**
     * Hook: woocommerce_archive_description.
     *
     * @hooked woocommerce_taxonomy_archive_description - 10
     * @hooked woocommerce_product_archive_description - 10
     */
    do_action('woocommerce_archive_description');
    ?>
</header>

<?php
get_footer();
?>