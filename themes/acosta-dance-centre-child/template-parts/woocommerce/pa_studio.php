<?php
get_header();
$name = get_queried_object()->name;
$alt_title = get__term_meta(get_queried_object()->term_id, 'alt_title');
$content = get__term_meta(get_queried_object()->term_id, 'content');
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
            <div class="content-margin">

                <div class="content-box">
                    <?= wpautop($content) ?>
                </div>

                <div class="book-now-wrapper text-center">
                    <div class="button-group-box text-center justify-content-center " id="book-now">
                        <div class="button-box button-black">

                            <form class="cart" action="https://acostadancecentre.com/product/ballet-class-with-sue-trevor-3/" method="post" enctype="multipart/form-data">

                                <div class="quantity">
                                    <label class="screen-reader-text" for="quantity_64e483aee24f7">Ballet Class Roland Price quantity</label>
                                    <input type="hidden" id="quantity_64e483aee24f7" class="input-text qty text" name="quantity" value="1" aria-label="Product quantity" size="4" min="1" max="1" step="1" placeholder="" inputmode="numeric" autocomplete="off">
                                </div>

                                <button type="submit" name="add-to-cart" value="913" class="single_add_to_cart_button alt">BOOK NOW</button>

                            </form>


                        </div>
                        <div class="button-box  button-bordered" id="join-now">
                            <a href="/memberships">
                                MEMBERSHIPS
                            </a>
                        </div>
                    </div>
                </div>


                <div class="classes md-padding">
                    <div class="more-button text-right d-none d-lg-block">
                        <a class="d-inline-flex align-items-center" href="https://acostadancecentre.com/category/tickets/classes/">
                            <span class="text mr-3">MORE CLASSES</span>
                            <span class="icon">
                                <svg xmlns="http://www.w3.org/2000/svg" width="54.446" height="25.242" viewBox="0 0 54.446 25.242">
                                    <g id="Icon_feather-arrow-right" data-name="Icon feather-arrow-right" transform="translate(1.5 2.121)">
                                        <path id="Path_116" data-name="Path 116" d="M7.5,18H58.946" transform="translate(-7.5 -7.5)" fill="none" stroke="#000" stroke-linecap="round" stroke-linejoin="round" stroke-width="3"></path>
                                        <path id="Path_117" data-name="Path 117" d="M18,7.5,28.5,18,18,28.5" transform="translate(22.946 -7.5)" fill="none" stroke="#000" stroke-linecap="round" stroke-linejoin="round" stroke-width="3"></path>
                                    </g>
                                </svg>
                            </span>
                        </a>
                    </div>
                </div>
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