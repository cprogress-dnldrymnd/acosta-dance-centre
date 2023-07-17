<?php
add_action('wp_enqueue_scripts', 'doro_add_stylesheet', 30);
function doro_add_stylesheet()
{
	wp_enqueue_style('doro-child-style', get_stylesheet_directory_uri() . '/style.css', false, '1.0', 'all');
}

/*-----------------------------------------------------------------------------------*/
/* After Theme Setup
/*-----------------------------------------------------------------------------------*/
function action_after_setup_theme()
{
	add_theme_support('woocommerce');
	add_theme_support('wc-product-gallery-zoom');
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

}
add_action('widgets_init', 'action_widgets_init');

function social_network()
{
	$doro_options = get_option('doro');
	ob_start();
	?>
	<?php if (Doro_AfterSetupTheme::return_thme_option('social-footer') != 'no') { ?>
		<ul class="social-network">
			<?php if (!empty($doro_options['facebook'])): ?>
				<li><a href="<?php echo esc_url($doro_options['facebook']); ?>" target="_blank"><i
							class="ti-facebook font-14px black-icon"></i></a></li>
			<?php endif; ?>

			<?php if (!empty($doro_options['twitter'])): ?>
				<li><a href="<?php echo esc_url($doro_options['twitter']); ?>" target="_blank"><i
							class="ti-twitter-alt font-14px black-icon"></i></a></li>
			<?php endif; ?>

			<?php if (!empty($doro_options['google-plus'])): ?>
				<li><a href="<?php echo esc_url($doro_options['google-plus']); ?>" target="_blank"><i
							class="ti-google font-14px black-icon"></i></a></li>
			<?php endif; ?>

			<?php if (!empty($doro_options['linkedin'])): ?>
				<li><a href="<?php echo esc_url($doro_options['linkedin']); ?>" target="_blank"><i
							class="ti-linkedin font-14px black-icon"></i></a></li>
			<?php endif; ?>

			<?php if (!empty($doro_options['instagram'])): ?>
				<li><a href="<?php echo esc_url($doro_options['instagram']); ?>" target="_blank"><i
							class="ti-instagram font-14px black-icon"></i></a></li>
			<?php endif; ?>

			<?php if (!empty($doro_options['pinterest'])): ?>
				<li><a href="<?php echo esc_url($doro_options['pinterest']); ?>" target="_blank"><i
							class="ti-pinterest-alt font-14px black-icon"></i></a></li>
			<?php endif; ?>

			<?php if (!empty($doro_options['soundcloud'])): ?>
				<li><a href="<?php echo esc_url($doro_options['soundcloud']); ?>" target="_blank"><i
							class="ti-soundcloud font-14px black-icon"></i></a></li>
			<?php endif; ?>

			<?php if (!empty($doro_options['skype'])): ?>
				<li><a href="<?php echo esc_url($doro_options['skype']); ?>" target="_blank"><i
							class="ti-skype font-14px black-icon"></i></a></li>
			<?php endif; ?>

			<?php if (!empty($doro_options['dribbble'])): ?>
				<li><a href="<?php echo esc_url($doro_options['dribbble']); ?>" target="_blank"><i
							class="ti-dribbble font-14px black-icon"></i></a></li>
			<?php endif; ?>

			<?php if (!empty($doro_options['youtube'])): ?>
				<li><a href="<?php echo esc_url($doro_options['youtube']); ?>" target="_blank"><i
							class="ti-youtube font-14px black-icon"></i></a></li>
			<?php endif; ?>

			<?php if (!empty($doro_options['vimeo'])): ?>
				<li><a href="<?php echo esc_url($doro_options['vimeo']); ?>" target="_blank"><i
							class="ti-vimeo font-14px black-icon"></i></a></li>
			<?php endif; ?>

			<?php if (!empty($doro_options['dropbox'])): ?>
				<li><a href="<?php echo esc_url($doro_options['dropbox']); ?>" target="_blank"><i
							class="ti-dropbox font-14px black-icon"></i></a></li>
			<?php endif; ?>

			<?php if (!empty($doro_options['github'])): ?>
				<li><a href="<?php echo esc_url($doro_options['github']); ?>" target="_blank"><i
							class="ti-github font-14px black-icon"></i></a></li>
			<?php endif; ?>
			<?php if (!empty($doro_options['tumblr'])): ?>
				<li><a href="<?php echo esc_url($doro_options['tumblr']); ?>" target="_blank"><i
							class="ti-tumblr-alt font-14px black-icon"></i></a></li>
			<?php endif; ?>

			<?php if (!empty($doro_options['email'])): ?>
				<li><a href="mailto:<?php echo esc_attr($doro_options['email']); ?>" target="_blank"><i
							class="ti-email font-14px black-icon"></i></a></li>
			<?php endif; ?>

			<?php
			$doro_more_social = Doro_AfterSetupTheme::return_thme_option('opt_add_more_social', '');
			if (!empty($doro_more_social)) {
				foreach ($doro_more_social as $doro_more_socials) {
					; ?>
					<?php echo balanceTags($doro_more_socials); ?>
				<?php }
			}
			; ?>
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

function get__post_meta($value)
{
	if (function_exists('carbon_get_the_post_meta')) {
		return carbon_get_the_post_meta($value);
	}
	else {
		return 'Error: Carbonfield not activated';
	}
}

function get__term_meta($term_id, $value)
{
	if (function_exists('carbon_get_term_meta')) {
		return carbon_get_term_meta($term_id, $value);
	}
	else {
		return 'Error: Carbonfield not activated';
	}
}

function get__post_meta_by_id($id, $value)
{
	if (function_exists('carbon_get_post_meta')) {
		return carbon_get_post_meta($id, $value);
	}
	else {
		return 'Error: Carbonfield not activated';
	}
}
function get__theme_option($value)
{
	if (function_exists('carbon_get_theme_option')) {
		return carbon_get_theme_option($value);
	}
	else {
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
	$categories = get_terms(
		array(
			'taxonomy'   => $taxonomy,
			'orderby'    => 'name',
			'hide_empty' => false,
			'parent'     => $parent,
		)
	);

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
	$tree = array();

	foreach ($terms as $term) {
		if ($term->parent === $root_id) {
			array_push(
				$tree,
				array(
					'name'     => $term->name,
					'slug'     => $term->slug,
					'id'       => $term->term_id,
					'count'    => $term->count,
					'children' => treeify_terms($terms, $term->term_id),
				)
			);
		}
	}

	return $tree;
}