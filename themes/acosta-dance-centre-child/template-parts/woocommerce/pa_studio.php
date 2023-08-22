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
            <div class="studio-gallery">
                
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