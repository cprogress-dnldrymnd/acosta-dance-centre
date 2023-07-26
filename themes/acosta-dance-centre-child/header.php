<!DOCTYPE html>
<html class="no-js" <?php language_attributes(); ?>>

<head>
	<meta charset="<?php bloginfo('charset'); ?>">
	<?php $doro_options = get_option('doro'); ?>
	<meta name="viewport"
		content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no">
	<meta name="robots" content="index, follow" />
	<?php wp_head(); ?>
	<?php if (is_product_category()) { ?>
		<?php
		$filter = isset($_GE['wpf_fbv']) ? true : false;
		?>
		<style>
			.featured-product {
				display: none !important;
			}
			.product-loop {
				padding-top: 0;
			}
		</style>
	<?php } ?>
</head>

<body <?php body_class(); ?>>
	<?php if (Doro_AfterSetupTheme::return_thme_option('enable_preloader') != 'no') { ?>
		<!-- Preloader -->
		<div class="preloader-bg"></div>
		<div id="preloader">
			<div id="preloader-status">
				<div class="preloader-position loader"> <span></span> </div>
			</div>
		</div>
	<?php }
	; ?>

	<?php
	if (Doro_AfterSetupTheme::return_thme_option('enable_scroll_top') != 'st2') {
		?>
		<!-- Progress scroll totop -->
		<div class="progress-wrap cursor-pointer">
			<svg class="progress-circle svg-content" width="100%" height="100%" viewBox="-1 -1 102 102">
				<path d="M50,1 a49,49 0 0,1 0,98 a49,49 0 0,1 0,-98" />
			</svg>
		</div>
		<?php wp_enqueue_script('doro-scrollto-script'); ?>
		<?php
	}
	?>
	<div id="doro-page"> <a href="#" class="js-doro-nav-toggle doro-nav-toggle"><i></i></a>
		<!-- Sidebar Section -->
		<?php get_template_part('template-parts/header/header-section'); ?>

		<!-- Main Section -->
		<div id="doro-main">

			<div id="doro-inner">