<?php
function doro_removeDemoModeLink() { 
    if ( class_exists('ReduxFrameworkPlugin') ) {
        remove_filter( 'plugin_row_meta', array( ReduxFrameworkPlugin::get_instance(), 'plugin_metalinks'), null, 2 );
    }
    if ( class_exists('ReduxFrameworkPlugin') ) {
        remove_action('admin_notices', array( ReduxFrameworkPlugin::get_instance(), 'admin_notices' ) );    
    }
}

class Doro_Walker extends Walker_Nav_Menu
{
    function start_el(&$output, $object, $depth = 0, $args = Array() , $current_object_id = 0) {
           
		global $wp_query;
		$indent = ( $depth ) ? str_repeat( "\t", $depth ) : '';
		$class_names = $value = '';
		$classes = empty( $object->classes ) ? array() : (array) $object->classes;
		$icon_class = $classes[0];
		$classes = array_slice($classes,1);
		$class_names = join( ' ', apply_filters( 'nav_menu_css_class', array_filter( $classes ), $object ) );
		$class_names = ' class="'. esc_attr( $class_names ) . '"';           
		$attributes .= ! empty( $object->target )     ? ' target="'. esc_attr( $object->target     ).'"' : '';
		$attributes .= ! empty( $object->xfn )        ? ' rel="'. esc_attr( $object->xfn) .'"' : '';
		

        if($object->object == 'page')
           {
            $varpost = get_post($object->object_id);                
            $separatepages = get_post_meta($object->object_id, "rnr_open_page", true);
            $disable_menu = get_post_meta($object->object_id, "rnr_disable_section_from_menu", true);
            $current_page_id = get_option('page_on_front');

                if ( ( $disable_menu != true ) && ( $varpost->ID != $current_page_id ) ) {

                    $output .= $indent . '<li id="menu-item-'. $object->ID . '" ' . $class_names .' ' . $value .'>';
                    if ( $separatepages == true )
                        $attributes .= ! empty( $object->url ) ? ' href="'   . esc_attr( $object->url ) .'" ' : '';
                    else {
                    if (is_front_page()) 
                        $attributes .= ' href="#' . $varpost->post_name . '" '; 
                    else 
                        $attributes .= ' href="'. home_url().'/#'. $varpost->post_name .'" ';
                    } 
					$object_output = $args->before;
					$object_output .= '<a'. $attributes .'>';
					$object_output .= $args->link_before . '' . apply_filters( 'the_title', $object->title, $object->ID ) . '';
					$object_output .= $args->link_after;
					$object_output .= '</a>';
					$object_output .= $args->after;    
					$output .= apply_filters( 'walker_nav_menu_start_el', $object_output, $object, $depth, $args );
				}                                         
            }
			else {
		   
		   $output .= $indent . '<li id="menu-item-'. $object->ID . '" ' . $value . $class_names .' > ' ;
		   $attributes .= ! empty( $object->url ) ? ' href="'   . esc_html( $object->url ) .'" ' : '';
           $object_output = $args->before;
           $object_output .= '<a '. $attributes .' >';
           $object_output .= $args->link_before . '' . apply_filters( 'the_title', $object->title, $object->ID ) . '';
           $object_output .= $args->link_after;
           $object_output .= '</a>';
           $object_output .= $args->after;    
			$output .= apply_filters( 'walker_nav_menu_start_el', $object_output, $object, $depth, $args );
		   
		   }
			
        }
}
add_action( 'after_setup_theme', 'doro_setup' );


/**
 * Include the TGM_Plugin_Activation class.
 */
require_once (DORO_THEME_PATH .'/framework/class-tgm-plugin-activation.php');

/**
 * Register the required plugins for this theme.
 */
function doro_register_required_plugins() {
$doro_plugins = array(
// This is an example of how to include a plugin from the WordPress Plugin Repository.
        array(
            'name'      => esc_html__( 'Redux Framework', 'doro' ),
            'slug'      => 'redux-framework',
            'required'  => true,
			'force_activation'   => false,
            'force_deactivation' => false,
        ),
		
		array(
            'name'      => esc_html__( 'Elementor Website Builder', 'doro' ),
            'slug'      => 'elementor',
            'required'  => false,
        ),
		
		array(
            'name'      => esc_html__( 'WPBakery Page Builder', 'doro' ),
            'slug'      => 'js_composer',
			'source'    => 'https://webredox.net/plugins/js_composer.zip',
            'required'  => false,
        ),	
		
		array(
            'name'      => esc_html__( 'Doro Plugin', 'doro' ),
            'slug'      => 'doro-plugin',
			'source'    => 'https://webredox.net/demo/wp/plugins/doro-plugin.zip',
			'required'  => true,
        ),
		array(
            'name'       => esc_html__( 'Revolution Slider', 'doro' ),
            'slug'       => 'revslider',
            'source'     => 'https://webredox.net/plugins/revslider.zip',
            'required'   => false,  
        ),			
		array(
            'name'      => esc_html__( 'Contact Form 7', 'doro' ),
            'slug'      => 'contact-form-7',
            'required'  => true,
        ),
		
		array(
            'name'      => esc_html__( 'Meta Box', 'doro' ),
            'slug'      => 'meta-box',
            'required'  => true,
        ),
		
		array(
            'name'      => esc_html__( 'DORO Demo Importer', 'doro' ),
            'slug'      => 'one-click-demo-import',
            'required'  => true,
        ),		
		
    );

    /**
     * Array of configuration settings. Amend each line as needed.
     */
    $doro_config = array(
        'default_path' => '',                      
        'menu'         => 'tgmpa-install-plugins',
        'has_notices'  => true,
        'dismissable'  => true,
        'dismiss_msg'  => '',                      
        'is_automatic' => false,                   
        'message'      => '',                      
        
    );
tgmpa( $doro_plugins, $doro_config );

if ( is_admin() ) {

	function doro_remove_revolution_slider_meta_boxes() {
		remove_meta_box( 'mymetabox_revslider_0', 'page', 'normal' );
		remove_meta_box( 'mymetabox_revslider_0', 'post', 'normal' );
		remove_meta_box( 'mymetabox_revslider_0', 'gallery', 'normal' );
		remove_meta_box( 'slugdiv', 'gallery', 'normal' );
	}

	add_action( 'do_meta_boxes', 'doro_remove_revolution_slider_meta_boxes' );
	
}

}
