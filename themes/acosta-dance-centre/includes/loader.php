<?php
function doro_import_files() {
	return array(
		array(
			'import_file_name'             => 'Multi Page Demo - Light',
			'categories'                   => array( 'Elementor' ),
			'local_import_file'            => trailingslashit( get_template_directory() ) . 'includes/doro-demo/el/multi/light/demo-content.xml',
			'local_import_widget_file'     => trailingslashit( get_template_directory() ) . 'includes/doro-demo/el/multi/light/widgets.wie',
			//'local_import_customizer_file' => trailingslashit( get_template_directory() ) . 'ocdi/customizer.dat',
			'local_import_redux'           => array(
				array(
					'file_path'   => trailingslashit( get_template_directory() ) . 'includes/doro-demo/el/multi/light/redux.json',
					'option_name' => 'doro',
				),
			),
			'import_preview_image_url'     => 'https://webredox.net/demo/wp/doro/images/light.png',
			'import_notice'                => __( 'Be patient, it can take a couple of minutes.', 'doro' ),
			'preview_url'                  => 'http://webredox.net/demo/wp/doro/el/light',
		),		
		array(
			'import_file_name'             => 'Multi Page Demo - Dark',
			'categories'                   => array( 'Elementor' ),
			'local_import_file'            => trailingslashit( get_template_directory() ) . 'includes/doro-demo/el/multi/dark/demo-content.xml',
			'local_import_widget_file'     => trailingslashit( get_template_directory() ) . 'includes/doro-demo/el/multi/dark/widgets.wie',
			//'local_import_customizer_file' => trailingslashit( get_template_directory() ) . 'ocdi/customizer.dat',
			'local_import_redux'           => array(
				array(
					'file_path'   => trailingslashit( get_template_directory() ) . 'includes/doro-demo/el/multi/dark/redux.json',
					'option_name' => 'doro',
				),
			),
			'import_preview_image_url'     => 'https://webredox.net/demo/wp/doro/images/dark.png',
			'import_notice'                => __( 'Be patient, it can take a couple of minutes.', 'doro' ),
			'preview_url'                  => 'http://webredox.net/demo/wp/doro/el/dark',
		),		
		array(
			'import_file_name'             => 'One Page Demo - Light',
			'categories'                   => array( 'Elementor' ),
			'local_import_file'            => trailingslashit( get_template_directory() ) . 'includes/doro-demo/el/onepage/light/demo-content.xml',
			'local_import_widget_file'     => trailingslashit( get_template_directory() ) . 'includes/doro-demo/el/onepage/light/widgets.wie',
			//'local_import_customizer_file' => trailingslashit( get_template_directory() ) . 'ocdi/customizer.dat',
			'local_import_redux'           => array(
				array(
					'file_path'   => trailingslashit( get_template_directory() ) . 'includes/doro-demo/el/onepage/light/redux.json',
					'option_name' => 'doro',
				),
			),
			'import_preview_image_url'     => 'https://webredox.net/demo/wp/doro/images/light.png',
			'import_notice'                => __( 'Be patient, it can take a couple of minutes.', 'doro' ),
			'preview_url'                  => 'http://webredox.net/demo/wp/doro/onepage/el/light',
		),		
		array(
			'import_file_name'             => 'One Page Demo - Dark',
			'categories'                   => array( 'Elementor' ),
			'local_import_file'            => trailingslashit( get_template_directory() ) . 'includes/doro-demo/el/onepage/dark/demo-content.xml',
			'local_import_widget_file'     => trailingslashit( get_template_directory() ) . 'includes/doro-demo/el/onepage/dark/widgets.wie',
			//'local_import_customizer_file' => trailingslashit( get_template_directory() ) . 'ocdi/customizer.dat',
			'local_import_redux'           => array(
				array(
					'file_path'   => trailingslashit( get_template_directory() ) . 'includes/doro-demo/el/onepage/dark/redux.json',
					'option_name' => 'doro',
				),
			),
			'import_preview_image_url'     => 'https://webredox.net/demo/wp/doro/images/dark.png',
			'import_notice'                => __( 'Be patient, it can take a couple of minutes.', 'doro' ),
			'preview_url'                  => 'http://webredox.net/demo/wp/doro/onepage/el/dark',
		),
        /*  
		array(
			'import_file_name'             => 'Multi Page Demo - Light',
			'categories'                   => array( 'WPBakery' ),
			'local_import_file'            => trailingslashit( get_template_directory() ) . 'includes/doro-demo/vc/multi/light/demo-content.xml',
			'local_import_widget_file'     => trailingslashit( get_template_directory() ) . 'includes/doro-demo/vc/multi/light/widgets.wie',
			//'local_import_customizer_file' => trailingslashit( get_template_directory() ) . 'ocdi/customizer.dat',
			'local_import_redux'           => array(
				array(
					'file_path'   => trailingslashit( get_template_directory() ) . 'includes/doro-demo/vc/multi/light/redux.json',
					'option_name' => 'doro',
				),
			),
			'import_preview_image_url'     => 'https://webredox.net/demo/wp/doro/images/light.png',
			'import_notice'                => __( 'Be patient, it can take a couple of minutes.', 'doro' ),
			'preview_url'                  => 'http://webredox.net/demo/wp/doro/light/',
		),		
		array(
			'import_file_name'             => 'Multi Page Demo - Dark',
			'categories'                   => array( 'WPBakery' ),
			'local_import_file'            => trailingslashit( get_template_directory() ) . 'includes/doro-demo/vc/multi/dark/demo-content.xml',
			'local_import_widget_file'     => trailingslashit( get_template_directory() ) . 'includes/doro-demo/vc/multi/dark/widgets.wie',
			//'local_import_customizer_file' => trailingslashit( get_template_directory() ) . 'ocdi/customizer.dat',
			'local_import_redux'           => array(
				array(
					'file_path'   => trailingslashit( get_template_directory() ) . 'includes/doro-demo/vc/multi/dark/redux.json',
					'option_name' => 'doro',
				),
			),
			'import_preview_image_url'     => 'https://webredox.net/demo/wp/doro/images/dark.png',
			'import_notice'                => __( 'Be patient, it can take a couple of minutes.', 'doro' ),
			'preview_url'                  => 'http://webredox.net/demo/wp/doro/dark',
		),		
		*/
		
	);
}
add_filter( 'pt-ocdi/import_files', 'doro_import_files' );

function doro_after_import_setup( $selected_import ) {

	if ( 'Multi Page Demo - Light' === $selected_import['import_file_name'] ) {
		// Assign menus to their locations.
		$main_menu = get_term_by( 'name', 'Main Menu', 'nav_menu' );

		set_theme_mod( 'nav_menu_locations', array(
				'top-menu' => $main_menu->term_id,
			)
		);

		// Assign front page and posts page (blog page).
		$front_page_id = get_page_by_title( 'Home' );
		//$blog_page_id  = get_page_by_title( 'Blog' );

		update_option( 'show_on_front', 'page' );
		update_option( 'page_on_front', $front_page_id->ID );
		update_option( 'page_for_posts', $blog_page_id->ID );
	}
	else if ( 'Multi Page Demo - Dark' === $selected_import['import_file_name'] ) {
		// Assign menus to their locations.
		$main_menu = get_term_by( 'name', 'Main Menu', 'nav_menu' );

		set_theme_mod( 'nav_menu_locations', array(
				'top-menu' => $main_menu->term_id,
			)
		);

		// Assign front page and posts page (blog page).
		$front_page_id = get_page_by_title( 'Home' );

		update_option( 'show_on_front', 'page' );
		update_option( 'page_on_front', $front_page_id->ID );
		update_option( 'page_for_posts', $blog_page_id->ID );
	}
	else if ( 'One Page Demo - Light' === $selected_import['import_file_name'] ) {
		// Assign menus to their locations.
		$main_menu = get_term_by( 'name', 'Main Menu', 'nav_menu' );

		set_theme_mod( 'nav_menu_locations', array(
				'main-menu' => $main_menu->term_id,
			)
		);

		// Assign front page and posts page (blog page).
		$front_page_id = get_page_by_title( 'Intro' );

		update_option( 'show_on_front', 'page' );
		update_option( 'page_on_front', $front_page_id->ID );
		update_option( 'page_for_posts', $blog_page_id->ID );
	}	
	else if ( 'One Page Demo - Dark' === $selected_import['import_file_name'] ) {
		// Assign menus to their locations.
		$main_menu = get_term_by( 'name', 'Main Menu', 'nav_menu' );

		set_theme_mod( 'nav_menu_locations', array(
				'main-menu' => $main_menu->term_id,
			)
		);

		// Assign front page and posts page (blog page).
		$front_page_id = get_page_by_title( 'Intro' );

		update_option( 'show_on_front', 'page' );
		update_option( 'page_on_front', $front_page_id->ID );
		update_option( 'page_for_posts', $blog_page_id->ID );
	}

}
add_action( 'pt-ocdi/after_import', 'doro_after_import_setup' );

function ocdi_plugin_page_setup( $default_settings ) {
	$default_settings['parent_slug'] = 'themes.php';
	$default_settings['page_title']  = esc_html__( 'Doro Demo Importer' , 'pt-ocdi' );
	$default_settings['menu_title']  = esc_html__( 'Doro Demo Importer' , 'pt-ocdi' );
	$default_settings['capability']  = 'import';
	$default_settings['menu_slug']   = 'doro-one-click-demo-import';

	return $default_settings;
}
add_filter( 'pt-ocdi/plugin_page_setup', 'ocdi_plugin_page_setup' );