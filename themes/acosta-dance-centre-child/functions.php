<?php
add_action('wp_enqueue_scripts', 'doro_add_stylesheet', 30);
function doro_add_stylesheet()
{
	wp_enqueue_style('doro-swiper-css', 'https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.css');
	wp_enqueue_style('doro-swiper-calendar', get_stylesheet_directory_uri() . '/assets/calendar/dist/calendar-gc.min.css');
	wp_enqueue_style('doro-child-style', get_stylesheet_directory_uri() . '/style.css', false, '1.0', 'all');
	wp_enqueue_script('doro-swiper-js', 'https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.js');
	wp_enqueue_script('doro-swiper-calendar-js', get_stylesheet_directory_uri() . '/assets/calendar/dist/calendar-gc.min.js');
}

/*-----------------------------------------------------------------------------------*/
/* After Theme Setup
/*-----------------------------------------------------------------------------------*/
function action_after_setup_theme()
{
	add_theme_support('woocommerce');
	add_theme_support('wc-product-gallery-lightbox');
	add_theme_support('wc-product-gallery-slider');
}
add_action('after_setup_theme', 'action_after_setup_theme');

function action_widgets_init()
{
	register_sidebar(
		array(
			'name'          => 'Footer Column 1',
			'id'            => 'footer_column_1',
			'before_widget' => '<div>',
			'after_widget'  => '</div>',
			'before_title'  => '<h5 class="widget-title">',
			'after_title'   => '</h5>',
		)
	);


	register_sidebar(
		array(
			'name'          => 'Footer Column 2',
			'id'            => 'footer_column_2',
			'before_widget' => '<div>',
			'after_widget'  => '</div>',
			'before_title'  => '<h5 class="widget-title">',
			'after_title'   => '</h5>',
		)
	);

	register_sidebar(
		array(
			'name'          => 'Footer Column 3',
			'id'            => 'footer_column_3',
			'before_widget' => '<div>',
			'after_widget'  => '</div>',
			'before_title'  => '<h5 class="widget-title">',
			'after_title'   => '</h5>',
		)
	);

	register_sidebar(
		array(
			'name'          => 'Footer Column 4',
			'id'            => 'footer_column_4',
			'before_widget' => '<div>',
			'after_widget'  => '</div>',
			'before_title'  => '<h5 class="widget-title">',
			'after_title'   => '</h5>',
		)
	);


	register_sidebar(
		array(
			'name'          => 'Footer Column 5',
			'id'            => 'footer_column_5',
			'before_widget' => '<div>',
			'after_widget'  => '</div>',
			'before_title'  => '<h5 class="widget-title">',
			'after_title'   => '</h5>',
		)
	);

	register_sidebar(
		array(
			'name'          => 'Footer After Columns Left',
			'id'            => 'footer_after_columns_left',
			'before_widget' => '<div>',
			'after_widget'  => '</div>',
			'before_title'  => '<h5 class="widget-title">',
			'after_title'   => '</h5>',
		)
	);
	register_sidebar(
		array(
			'name'          => 'Footer After Columns Right',
			'id'            => 'footer_after_columns_right',
			'before_widget' => '<div>',
			'after_widget'  => '</div>',
			'before_title'  => '<h5 class="widget-title">',
			'after_title'   => '</h5>',
		)
	);
}
add_action('widgets_init', 'action_widgets_init');

function social_network()
{
	$doro_options = get_option('doro');
	ob_start();
?>
	<?php if (Doro_AfterSetupTheme::return_thme_option('social-footer') != 'no') { ?>
		<ul class="social-network">
			<?php if (!empty($doro_options['facebook'])) : ?>
				<li><a href="<?php echo esc_url($doro_options['facebook']); ?>" target="_blank"><i class="ti-facebook font-14px black-icon"></i></a></li>
			<?php endif; ?>

			<?php if (!empty($doro_options['twitter'])) : ?>
				<li><a href="<?php echo esc_url($doro_options['twitter']); ?>" target="_blank"><i class="ti-twitter-alt font-14px black-icon"></i></a></li>
			<?php endif; ?>

			<?php if (!empty($doro_options['google-plus'])) : ?>
				<li><a href="<?php echo esc_url($doro_options['google-plus']); ?>" target="_blank"><i class="ti-google font-14px black-icon"></i></a></li>
			<?php endif; ?>

			<?php if (!empty($doro_options['linkedin'])) : ?>
				<li><a href="<?php echo esc_url($doro_options['linkedin']); ?>" target="_blank"><i class="ti-linkedin font-14px black-icon"></i></a></li>
			<?php endif; ?>

			<?php if (!empty($doro_options['instagram'])) : ?>
				<li><a href="<?php echo esc_url($doro_options['instagram']); ?>" target="_blank"><i class="ti-instagram font-14px black-icon"></i></a></li>
			<?php endif; ?>

			<?php if (!empty($doro_options['pinterest'])) : ?>
				<li><a href="<?php echo esc_url($doro_options['pinterest']); ?>" target="_blank"><i class="ti-pinterest-alt font-14px black-icon"></i></a></li>
			<?php endif; ?>

			<?php if (!empty($doro_options['soundcloud'])) : ?>
				<li><a href="<?php echo esc_url($doro_options['soundcloud']); ?>" target="_blank"><i class="ti-soundcloud font-14px black-icon"></i></a></li>
			<?php endif; ?>

			<?php if (!empty($doro_options['skype'])) : ?>
				<li><a href="<?php echo esc_url($doro_options['skype']); ?>" target="_blank"><i class="ti-skype font-14px black-icon"></i></a></li>
			<?php endif; ?>

			<?php if (!empty($doro_options['dribbble'])) : ?>
				<li><a href="<?php echo esc_url($doro_options['dribbble']); ?>" target="_blank"><i class="ti-dribbble font-14px black-icon"></i></a></li>
			<?php endif; ?>

			<?php if (!empty($doro_options['youtube'])) : ?>
				<li><a href="<?php echo esc_url($doro_options['youtube']); ?>" target="_blank"><i class="ti-youtube font-14px black-icon"></i></a></li>
			<?php endif; ?>

			<?php if (!empty($doro_options['vimeo'])) : ?>
				<li><a href="<?php echo esc_url($doro_options['vimeo']); ?>" target="_blank"><i class="ti-vimeo font-14px black-icon"></i></a></li>
			<?php endif; ?>

			<?php if (!empty($doro_options['dropbox'])) : ?>
				<li><a href="<?php echo esc_url($doro_options['dropbox']); ?>" target="_blank"><i class="ti-dropbox font-14px black-icon"></i></a></li>
			<?php endif; ?>

			<?php if (!empty($doro_options['github'])) : ?>
				<li><a href="<?php echo esc_url($doro_options['github']); ?>" target="_blank"><i class="ti-github font-14px black-icon"></i></a></li>
			<?php endif; ?>
			<?php if (!empty($doro_options['tumblr'])) : ?>
				<li><a href="<?php echo esc_url($doro_options['tumblr']); ?>" target="_blank"><i class="ti-tumblr-alt font-14px black-icon"></i></a></li>
			<?php endif; ?>

			<?php if (!empty($doro_options['email'])) : ?>
				<li><a href="mailto:<?php echo esc_attr($doro_options['email']); ?>" target="_blank"><i class="ti-email font-14px black-icon"></i></a></li>
			<?php endif; ?>

			<?php
			$doro_more_social = Doro_AfterSetupTheme::return_thme_option('opt_add_more_social', '');
			if (!empty($doro_more_social)) {
				foreach ($doro_more_social as $doro_more_socials) {; ?>
					<?php echo balanceTags($doro_more_socials); ?>
			<?php }
			}; ?>
		</ul>
	<?php } ?>
<?php

	return ob_get_clean();
}

add_shortcode('social_network', 'social_network');


/*-----------------------------------------------------------------------------------*/
/* Register Carbofields
/*-----------------------------------------------------------------------------------*/
add_action('carbon_fields_register_fields', 'tissue_paper_register_custom_fields');
function tissue_paper_register_custom_fields()
{
	require_once('includes/post-meta.php');
}
require_once('includes/woocommerce.php');
require_once('includes/shortcodes.php');

function get__post_meta($value)
{
	if (function_exists('carbon_get_the_post_meta')) {
		return carbon_get_the_post_meta($value);
	} else {
		return 'Error: Carbonfield not activated';
	}
}

function get__term_meta($term_id, $value)
{
	if (function_exists('carbon_get_term_meta')) {
		return carbon_get_term_meta($term_id, $value);
	} else {
		return 'Error: Carbonfield not activated';
	}
}

function get__post_meta_by_id($id, $value)
{
	if (function_exists('carbon_get_post_meta')) {
		return carbon_get_post_meta($id, $value);
	} else {
		return 'Error: Carbonfield not activated';
	}
}
function get__theme_option($value)
{
	if (function_exists('carbon_get_theme_option')) {
		return carbon_get_theme_option($value);
	} else {
		return 'Error: Carbonfield not activated';
	}
}


/**
 * Lists all product categories and sub-categories in a tree structure.
 *
 * @return array
 */
function list_terms($taxonomy = 'product_cat', $parent = false)
{


	$categories = treeify_terms($categories);

	return $categories;
}

/**
 * Converts a flat array of terms into a hierarchical tree structure.
 *
 * @param WP_Term[] $terms Terms to sort.
 * @param integer   $root_id Id of the term which is considered the root of the tree.
 *
 * @return array Returns an array of term data. Note the term data is an array, rather than
 * term object.
 */
function treeify_terms($terms, $root_id = 0)
{

	foreach ($terms as $term) {
		if ($term->parent === $root_id) {
			array_push(
				$tree,
				array(
					'name'     => $term->name,
					'slug'     => $term->slug,
					'id'       => $term->term_id,
					'children' => treeify_terms($terms, $term->term_id),
				)
			);
		}
	}

	return $tree;
}

function get__terms($taxonomy = 'product_cat', $parent = false)
{

	$args = array(
		'taxonomy'   => $taxonomy,
		'orderby'    => 'name',
		'hide_empty' => false,
	);

	if ($parent) {
		$args['parent'] = $parent;
	}

	$terms = get_terms($args);


	$terms_arr = array();

	foreach ($terms as $term) {
		$thumbnail_id = get_term_meta($term->term_id, 'thumbnail_id', true);
		array_push(
			$terms_arr,
			array(
				'id'            => $term->term_id,
				'name'          => $term->name,
				'term_link'     => get_term_link($term->term_id),
				'thumbnail_url' => wp_get_attachment_image_url($thumbnail_id, 'large'),
			)
		);
	}

	return $terms_arr;
}


/**
 * @snippet Remove "Default Sorting" Dropdown @ WooCommerce Shop & Archive Pages
 */
add_action('init', 'adc_remove_default_sorting_storefront');

function adc_remove_default_sorting_storefront()
{
	remove_action('woocommerce_after_shop_loop', 'woocommerce_catalog_ordering', 30);
	remove_action('woocommerce_before_shop_loop', 'woocommerce_catalog_ordering', 30);
	remove_action('woocommerce_before_shop_loop', 'woocommerce_result_count', 20);
	remove_action('woocommerce_after_shop_loop', 'woocommerce_result_count', 20);
}


/*
add_action('template_redirect', 'my_redirect_if_user_not_logged_in');

function my_redirect_if_user_not_logged_in()
{

	if (!is_user_logged_in() && is_front_page()) {

		wp_redirect('https://acostadancecentre.com/holding-page/');

		exit;

	}

}
*/

add_filter('gettext', 'translate_text', 30);
add_filter('ngettext', 'translate_text', 30);
function translate_text($translated)
{
	$words = array(
		// 'word to translate' => 'translation'
		'Doro' => 'ADC',
	);
	$translated = str_ireplace(array_keys($words), $words, $translated);
	return $translated;
}


function action_admin_head()
{
?>
	<style>
		#toplevel_page_doro {
			display: none !important;
		}

		#redux-header {
			display: none;
		}
	</style>
<?php
}

add_action('admin_head', 'action_admin_head');



function single_get_date($id, $type = 'date')
{
	$ticket_date_val = get_post_meta($id, '_ticket_checkin_availability_from_date', true);
	$ticket_date_val_end = get_post_meta($id, '_ticket_checkin_availability_to_date', true);

	$ticket_date_from = date('d M', strtotime($ticket_date_val));
	$ticket_date_Y = date('Y', strtotime($ticket_date_val_end));
	$ticket_time_from = date('g:i a', strtotime($ticket_date_val));

	if ($ticket_date_val_end) {
		$ticket_date_to = date('d M', strtotime($ticket_date_val_end));
		$ticket_time_to = date('g:i a', strtotime($ticket_date_val_end));
		if ($type == 'date') {
			if ($ticket_date_from != $ticket_date_to) {
				return $ticket_date_from . ' - ' . $ticket_date_to . ' ' . $ticket_date_Y;
			} else {
				return $ticket_date_from . ' ' . $ticket_date_Y;;
			}
		} else {
			if ($ticket_time_from != $ticket_time_to) {
				return $ticket_time_from . ' - ' . $ticket_time_to;
			} else {
				return $ticket_time_from;
			}
		}
	} else {
		if ($type == 'date') {
			return $ticket_date_from;
		} else {
			return $ticket_time_from;
		}
	}
}

function update_product_time_attribute($product_id)
{
	// Get product attributes
	$ticket_date_val = get_post_meta($product_id, '_ticket_checkin_availability_from_date', true);


	if ($ticket_date_val) {
		$ticket_time = single_get_date($product_id, 'time');

		$product_attributes = get_post_meta($product_id, '_product_attributes', true);

		$term_taxonomy_ids = wp_set_object_terms($product_id, $ticket_time, 'pa_time', false);

		$thedata = array(
			'pa_time' => array(
				'name'         => 'TIME',
				'value'        => $ticket_time,
				'is_visible'   => '0',
				'is_variation' => '0',
				'is_taxonomy'  => '1'
			)
		);

		$product_attributes = array_merge($product_attributes, $thedata);
		// Set updated attributes back in database
		update_post_meta($product_id, '_product_attributes', $product_attributes);
	}
}


add_action('woocommerce_new_product', 'mp_sync_on_product_save', 10, 1);
add_action('woocommerce_update_product', 'mp_sync_on_product_save', 10, 1);
function mp_sync_on_product_save($product_id)
{
	update_product_time_attribute($product_id);
}


function limit_string($string, $limit = 500)
{
	$string = strip_tags($string);
	if (strlen($string) > $limit) {

		// truncate string
		$stringCut = substr($string, 0, $limit);
		$endPoint = strrpos($stringCut, ' ');

		//if the string doesn't contain any space then it will cut without word basis.
		$string = $endPoint ? substr($stringCut, 0, $endPoint) : substr($stringCut, 0);
		$string .= '...';
	}
	return $string;
}

function action_wp_footer()
{
?>
	<script>
		jQuery(document).ready(function() {
			jQuery('.thwcfd-field-checkbox').each(function(index, element) {
				jQuery('<span class="bg"> <span class="wpcf7-spinner"></span> </span>').insertAfter(jQuery(this).find('input'));
			});
		});

		auto_coupon('#discount_disabled', 'adc_disabled');
		auto_coupon('#discount_student', 'adc_student');
		auto_coupon('#discount_uc_recipient', 'adc_universal_credit_recipient');

		function auto_coupon($id, $name) {
			jQuery($id).change(function(e) {
				var $this = jQuery(this);
				jQuery('.thwcfd-field-checkbox').addClass('disabled');
				jQuery(this).next().addClass('adding-discounts');
				setTimeout(function() {
					if (jQuery($id).is(':checked')) {
						jQuery('input[name="coupon_code"]').val($name);
						jQuery('button[name="apply_coupon"]').click();
					} else {
						jQuery('a[data-coupon="' + $name + '"]').click();
					}
					jQuery('input[name="coupon_code"]').val('');
				}, 500);

			});
		}
		jQuery('body').on('updated_checkout', function() {
			jQuery('.thwcfd-field-checkbox').removeClass('disabled');
			jQuery('.thwcfd-field-checkbox span.bg').removeClass('adding-discounts');

		});
	</script>

	<script>
		if (window.innerWidth > 767) {
			jQuery(window).scroll(function() {
				var $scroll = jQuery(window).scrollTop();
				console.log($scroll);

				if ($scroll > 600) {
					jQuery('#doro-aside').addClass('collapse-sidebar');
					jQuery('body').addClass('collapse-sidebar-body');
				}
			});
			jQuery('.menu-opener').click(function(e) {
				jQuery('#doro-aside').removeClass('collapse-sidebar');
				jQuery('body').removeClass('collapse-sidebar-body');
			});
		}
	</script>

	<?php if (is_checkout()) { ?>
		<script>
			jQuery(document).ready(function() {

				jQuery('input[name="donation_note"]').text('ACOSTA DANCE FOUNDATION');
				jQuery('.donation').click(function(e) {
					console.log(jQuery(this).attr('value'));
					$val = parseInt(jQuery(this).attr('value'));
					if ($val != 0) {
						jQuery('input[name="donation-price"]').val($val);
					} else {
						jQuery('input[name="donation-price"]').val('');
					}
					jQuery('.donation').removeClass('active');
					jQuery(this).addClass('active');

				});

				jQuery('.custom-amount').keyup(function(e) {
					$val = parseInt(jQuery(this).val());
					if (jQuery(this).val()) {
						jQuery('input[name="donation-price"]').val($val);
					} else {
						jQuery('input[name="donation-price"]').val('');
					}
				});
			});
		</script>
	<?php } ?>
	<?php
}

add_action('wp_footer', 'action_wp_footer');

function action_wp_head()
{

	if (!current_user_can('administrator')) {
	?>
		<style>
			.wdgk_donation_content {
				display: none !important;
			}
		</style>
<?php
	}
}

add_action('wp_head', 'action_wp_head');
