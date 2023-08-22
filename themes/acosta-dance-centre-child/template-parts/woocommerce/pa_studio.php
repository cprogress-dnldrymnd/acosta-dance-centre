<?php
get_header();
$name = get_queried_object()->name;
$alt_title = get__term_meta(get_queried_object()->term_id, 'alt_title');
$content = get__term_meta(get_queried_object()->term_id, 'content');
$gallery = get__term_meta(get_queried_object()->term_id, 'gallery');
$studio = get__term_meta(get_queried_object()->term_id, 'studio');
$size = get__term_meta(get_queried_object()->term_id, 'size');
$capacity = get__term_meta(get_queried_object()->term_id, 'capacity');
$location = get__term_meta(get_queried_object()->term_id, 'location');
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
                <!-- Swiper -->
                <h1>
                    <?php
                    if ($alt_title) {
                        echo $alt_title;
                    } else {
                        woocommerce_page_title();
                    }
                    ?>
                </h1>
                <div class="swiper mySwiperGallery">
                    <div class="swiper-wrapper">
                        <?php foreach ($gallery as $g) { ?>
                            <div class="swiper-slide">
                                <img src="<?= wp_get_attachment_image_url($g, 'large') ?>">
                            </div>
                        <?php } ?>
                    </div>
                    <div class="swiper-button-next">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-right" viewBox="0 0 16 16">
                            <path fill-rule="evenodd" d="M1 8a.5.5 0 0 1 .5-.5h11.793l-3.147-3.146a.5.5 0 0 1 .708-.708l4 4a.5.5 0 0 1 0 .708l-4 4a.5.5 0 0 1-.708-.708L13.293 8.5H1.5A.5.5 0 0 1 1 8z" />
                        </svg>
                    </div>
                    <div class="swiper-button-prev">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-left" viewBox="0 0 16 16">
                            <path fill-rule="evenodd" d="M15 8a.5.5 0 0 0-.5-.5H2.707l3.147-3.146a.5.5 0 1 0-.708-.708l-4 4a.5.5 0 0 0 0 .708l4 4a.5.5 0 0 0 .708-.708L2.707 8.5H14.5A.5.5 0 0 0 15 8z" />
                        </svg>
                    </div>
                    <div class="swiper-pagination"></div>

                </div>

            </div>
            <div class="content-margin content-studio">

                <div class="content-box">
                    <?= wpautop($content) ?>
                </div>

                <div class="book-now-wrapper text-center">
                    <div class="button-group-box text-center justify-content-center " id="book-now">
                        <div class="button-box  button-black " id="join-now">
                            <a href="/category/tickets/classes">
                                FIND A CLASSS
                            </a>
                        </div>
                        <div class="button-box  button-bordered" id="join-now">
                            <a href="/category/tickets/workshops">
                                FIND A WORKSHOP
                            </a>
                        </div>
                    </div>
                </div>

                <section class="cta-v2 background-light-red d-flex">

                    <div class="inner">
                        <div class="heading-box mb-5">
                            <h2 class="doro-heading main-heading">
                                ACCESS </h2>
                        </div>

                        <div class="row">
                            <div class="col-lg-5">
                                <div class="image-box">
                                    <img src="https://acostadancecentre.com/wp-content/uploads/2023/08/acosta-img.png" alt="">
                                </div>
                            </div>
                            <div class="col-lg-7">
                                <div class="sec-title text-left">
                                    <span class="heading-meta">ACCESS REQUESTS</span>
                                    <h2 class="doro-heading">GET IN TOUCH</h2>
                                </div>
                                <div class="description-box">
                                    <p>
                                        If you have any access requests or specific needs for your visit to the Acosta Dance Centre, please don’t hesitate to reach out to us. We would love to hear from you and ensure your visit is as enjoyable and accommodating as possible.
                                    </p>
                                </div>
                                <div class="d-flex text-center justify-content-center" >
                                    <div class="button-box  button-black mb-2 mr-2">
                                        <a href="/contact">
                                            GET IN TOUCH
                                        </a>
                                    </div>
                                    <div class="button-box  button-bordered mb-2">
                                        <a href="#">
                                            ACCESSIBLE PARKING
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
        </div>
        <div class="col-xl-4">
            <div class="details-box position-relative">
                <h3 class="doro-heading">DETAILS</h3>
                <table class="table">
                    <tbody>
                        <?php if ($studio) { ?>
                            <tr>
                                <th>STUDIO</th>
                            </tr>
                            <tr>
                                <td><?= $studio ?></td>
                            </tr>
                        <?php } ?>

                        <?php if ($size) { ?>
                            <tr>
                                <th>SIZE</th>
                            </tr>
                            <tr>
                                <td><?= $size ?></td>
                            </tr>
                        <?php } ?>
                        <?php if ($capacity) { ?>
                            <tr>
                                <th>CAPACITY</th>
                            </tr>
                            <tr>
                                <td><?= $capacity ?></td>
                            </tr>
                        <?php } ?>
                        <?php if ($location) { ?>
                            <tr>
                                <th>LOCATION</th>
                            </tr>
                            <tr>
                                <td><?= $location ?></td>
                            </tr>
                        <?php } ?>
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

<!-- Initialize Swiper -->
<script>
    var swiper = new Swiper(".mySwiperGallery", {
        loop: true,
        navigation: {
            nextEl: ".swiper-button-next",
            prevEl: ".swiper-button-prev",
        },
        pagination: {
            el: ".swiper-pagination",
        },
    });
</script>