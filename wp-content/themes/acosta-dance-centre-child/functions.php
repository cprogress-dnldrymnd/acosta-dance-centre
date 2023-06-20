<?php
add_action( 'wp_enqueue_scripts', 'doro_add_stylesheet', 20);
function doro_add_stylesheet() {
	wp_enqueue_style( 'doro-child-style', get_stylesheet_directory_uri() . '/style.css', false, '1.0', 'all' );
}
?>