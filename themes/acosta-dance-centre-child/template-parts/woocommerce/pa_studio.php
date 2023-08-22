<?php
get_header();
$name = get_queried_object()->name;
$alt_title = get__term_meta(get_queried_object()->term_id, 'alt_title');
?>

<nav class="woocommerce-breadcrumb">
    <a href="https://acostadancecentre.com">Home</a>&nbsp;/&nbsp;Studio&nbsp;/&nbsp;
    <?php
    if ($alt_title) {
        echo $alt_title;
    } else {
        woocommerce_page_title();
    }
    ?>
</nav>

<div class="product-inner">
    <div class="row">
        <div class="col-xl-8">
            <div id="product-913" class="member-discount discount-restricted product type-product post-913 status-publish first instock product_cat-classes product_cat-tickets has-post-thumbnail sold-individually shipping-taxable purchasable product-type-simple">
                <section class="product-summary">
                    <h1 class="product_title entry-title">
                        <?php
                        if ($alt_title) {
                            echo $alt_title;
                        } else {
                            woocommerce_page_title();
                        }
                        ?>
                    </h1>
                    <div class="woocommerce-product-gallery woocommerce-product-gallery--with-images woocommerce-product-gallery--columns-4 images" data-columns="4" style="opacity: 1; transition: opacity 0.25s ease-in-out 0s;">
                        <figure class="woocommerce-product-gallery__wrapper">
                            <div data-thumb="https://acostadancecentre.com/wp-content/uploads/2023/06/ADC-Image-100x100.png" data-thumb-alt="" class="woocommerce-product-gallery__image"><a href="https://acostadancecentre.com/wp-content/uploads/2023/06/ADC-Image.png"><img width="681" height="552" src="https://acostadancecentre.com/wp-content/uploads/2023/06/ADC-Image.png" class="wp-post-image" alt="" decoding="async" title="ADC Image" data-caption="" data-src="https://acostadancecentre.com/wp-content/uploads/2023/06/ADC-Image.png" data-large_image="https://acostadancecentre.com/wp-content/uploads/2023/06/ADC-Image.png" data-large_image_width="681" data-large_image_height="552" loading="lazy" srcset="https://acostadancecentre.com/wp-content/uploads/2023/06/ADC-Image.png 681w, https://acostadancecentre.com/wp-content/uploads/2023/06/ADC-Image-600x486.png 600w, https://acostadancecentre.com/wp-content/uploads/2023/06/ADC-Image-300x243.png 300w" sizes="(max-width: 681px) 100vw, 681px"></a></div>
                        </figure>
                    </div>
                    <div class="summary entry-summary">
                    </div>

                </section>
            </div>
        </div>
        <div class="col-xl-4">
            <div class="details-box position-relative">
                <h3 class="doro-heading">DETAILS</h3>
                <table class="table">
                    <tbody>
                        <tr>
                            <th>PRICE</th>
                        </tr>
                        <tr>
                            <td><del aria-hidden="true"><span class="woocommerce-Price-amount amount"><bdi><span class="woocommerce-Price-currencySymbol">£</span>10.00</bdi></span></del> <ins><span class="woocommerce-Price-amount amount"><bdi><span class="woocommerce-Price-currencySymbol">£</span>8.00</bdi></span></ins></td>
                        </tr>

                        <tr>
                            <th>DATE</th>
                        </tr>
                        <tr>
                            <td>04 Sep 2023 </td>
                        </tr>

                        <tr>
                            <th>TIME</th>
                        </tr>
                        <tr>
                            <td>12:00 pm </td>
                        </tr>
                    </tbody>
                </table>
                <div class="button-box text-center button-black">
                    <div class="button-box button-black"> <a href="#book-now">BOOK NOW</a></div>
                </div>
            </div>
            <?= do_shortcode('[membership_box]') ?>
        </div>
    </div>
</div>

<?php
get_footer();
?>