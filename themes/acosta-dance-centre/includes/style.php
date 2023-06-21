<?php
global $doro_options;
$doro_options = get_option('doro');
function doro_style() {
wp_enqueue_style('doro-main', (DORO_THEME_URL . '/style.css'));
wp_enqueue_style('doro-animate', (DORO_THEME_URL . '/includes/css/animate.css'));
wp_enqueue_style('doro-et-lineicons', (DORO_THEME_URL . '/includes/css/et-lineicons.css'));
wp_enqueue_style('doro-themify-icons', (DORO_THEME_URL . '/includes/css/themify-icons.css'));
wp_enqueue_style('doro-fontawesome', (DORO_THEME_URL . '/includes/css/fontawesome.css'));
wp_enqueue_style('doro-bootstrap', (DORO_THEME_URL . '/includes/css/bootstrap.css'));
wp_enqueue_style('doro-flexslider', (DORO_THEME_URL . '/includes/css/flexslider.css'));
wp_enqueue_style('doro-fancybox', (DORO_THEME_URL . '/includes/css/jquery-fancybox-min.css'));
wp_enqueue_style('doro-style', (DORO_THEME_URL . '/includes/css/style.css'));
if (Doro_AfterSetupTheme::return_thme_option('enable_preloader')!='no'){
wp_enqueue_style('addo-preloader-style', (DORO_THEME_URL . '/includes/css/preloader-style.css'));
}
if (Doro_AfterSetupTheme::return_thme_option('colorstyle')=='yes'){
wp_enqueue_style('doro-style-dark', (DORO_THEME_URL . '/includes/css/style-dark.css'));
}
if (Doro_AfterSetupTheme::return_thme_option('scrollbar')=='no'){
wp_enqueue_style('doro-scrollbar', (DORO_THEME_URL . '/includes/css/scrollbar.css'));
}
wp_enqueue_style('doro-map', (DORO_THEME_URL . '/includes/css/map.css'));
wp_enqueue_style('doro-yourstyle', (DORO_THEME_URL . '/includes/css/yourstyle.css'));
}
add_action('wp_enqueue_scripts', 'doro_style');

function doro_fonts_url() {
    $doro_font_url = '';
    
    if ( 'off' !== _x( 'on', 'Hind font: on or off', 'doro' ) ) {
        $doro_font_url = add_query_arg( 'family','Hind:300,400,500,600,700|Oswald:300,400,500,600,700|Poppins:300,400,500,600,700' , "//fonts.googleapis.com/css" );
    }
    return $doro_font_url;
}

function doro_scripts() {
    wp_enqueue_style( 'doro_fonts', doro_fonts_url(), array(), '1.0.0' );
}
add_action( 'wp_enqueue_scripts', 'doro_scripts' );

function doro_enqueue_custom_admin_style() {
wp_register_style( 'custom_wp_admin_css', (DORO_THEME_URL . '/includes/css/admin-style.css'), false, '1.0.0' );
wp_enqueue_style( 'custom_wp_admin_css' );
}
add_action( 'admin_enqueue_scripts', 'doro_enqueue_custom_admin_style' );