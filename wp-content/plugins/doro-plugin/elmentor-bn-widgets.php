<?php
function unregister_widgets( $widgets_manager ) {
	$widgets_manager->unregister( 'doro-title' );
	$widgets_manager->unregister( 'doro-text' );
	$widgets_manager->unregister( 'doro-image' );
	$widgets_manager->unregister( 'doro-image-slider' );
	$widgets_manager->unregister( 'doro-services' );
	$widgets_manager->unregister( 'doro-post' );
	$widgets_manager->unregister( 'doro-portfolio-grid' );
	$widgets_manager->unregister( 'doro-list' );
	$widgets_manager->unregister( 'doro-team' );
	$widgets_manager->unregister( 'doro-gallery' );
	$widgets_manager->unregister( 'doro-contact' );
	$widgets_manager->unregister( 'doro-form' );
	$widgets_manager->unregister( 'doro-map' );
}