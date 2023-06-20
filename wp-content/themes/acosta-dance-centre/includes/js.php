<?php
if( !function_exists ('doro_enqueue_scripts') ) :
	function doro_enqueue_scripts() {
	global $opt_theme_style;
	$doro_options = get_option('doro');	
	$doro_protocol = is_ssl() ? 'https' : 'http';			
	wp_enqueue_script('modernizr-min', (DORO_THEME_URL . '/includes/js/modernizr-min.js'), array('jquery'), '1.0',true);
	wp_enqueue_script('easing-min', (DORO_THEME_URL . '/includes/js/easing-min.js'), array('jquery'), '1.0',true);
	wp_enqueue_script('bootstrap-min', (DORO_THEME_URL . '/includes/js/bootstrap-min.js'), array('jquery'), '1.0',true);
	wp_enqueue_script('waypoints-min', (DORO_THEME_URL . '/includes/js/waypoints-min.js'), array('jquery'), '1.0',true);
	wp_register_script('flexslider-min', (DORO_THEME_URL . '/includes/js/flexslider-min.js'), array('jquery'), '1.0',true);
	wp_register_script('flexslider-script', (DORO_THEME_URL . '/includes/js/flexslider-script.js'), array('jquery'), '1.0',true);
	wp_enqueue_script('sticky-kit-min', (DORO_THEME_URL . '/includes/js/sticky-kit-min.js'), array('jquery'), '1.0',true);
	wp_register_script('fancybox', (DORO_THEME_URL . '/includes/js/jquery-fancybox-min.js'), array('jquery'), '1.0',true);
	wp_register_script('map-min', (DORO_THEME_URL . '/includes/js/map-min.js'), array('jquery'), '1.0',true);  
	wp_register_script('map-script', (DORO_THEME_URL . '/includes/js/map-script.js'), array('jquery'), '1.0',true);	
	wp_register_script('isotope', (DORO_THEME_URL . '/includes/js/isotope.pkgd.min.js'), array('jquery'), '1.0',true);
	wp_register_script('imagesloaded', (DORO_THEME_URL . '/includes/js/imagesloaded.pkgd.min.js'), array('jquery'), '1.0',true);
	wp_register_script('doro-loadmore', (DORO_THEME_URL . '/includes/js/doro-loadmore.js'), array('jquery'), '1.0',true);
	wp_enqueue_script('doro-main', (DORO_THEME_URL . '/includes/js/main.js'), array('jquery'), '1.0',true);	
	wp_register_script('doro-scrollto-script', (DORO_THEME_URL . '/includes/js/scrollto-script.js'), array('jquery'), '1.0',true);	
		
	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
	wp_enqueue_script( 'comment-reply' );
	}
}
	add_action('wp_enqueue_scripts', 'doro_enqueue_scripts');
endif;