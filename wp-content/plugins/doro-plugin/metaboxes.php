<?php
/**
 * Registering meta boxes
 *
 * All the definitions of meta boxes are listed below with comments.
 * Please read them CAREFULLY.
 *
 * You also should read the changelog to know what has been changed before updating.
 *
 * For more information, please visit:
 * @link http://www.deluxeblogtips.com/meta-box/docs/define-meta-boxes
 */

/********************* META BOX DEFINITIONS ***********************/

/**
 * Prefix of meta keys (optional)
 * Use underscore (_) at the beginning to make keys hidden
 * Alt.: You also can make prefix empty to disable it
 */
// Better has an underscore as last sign
$prefix = 'rnr_';

global $meta_boxes;

$meta_boxes = array();

global $smof_data;


/* ----------------------------------------------------- */
// Page Sections Metaboxes
/* ----------------------------------------------------- */


/* ----------------------------------------------------- */
// Revolution Slider
/* ----------------------------------------------------- */

$revolutionslider = array();
$revolutionslider[0] = 'No Slider';

if(class_exists('RevSlider')){
    $slider = new RevSlider();
	$arrSliders = $slider->getArrSliders();
	foreach($arrSliders as $revSlider) { 
		$revolutionslider[$revSlider->getAlias()] = $revSlider->getTitle();
	}
}

/* Page Section Background Settings */

$grid_array = array('2 Columns','3 Columns','4 Columns');

$pagebg_type_array = array(
	'image' => 'Image',
	'gradient' => 'Gradient',
	'color' => 'Color'
);



/* ----------------------------------------------------- */
/* page Type Metaboxes
/* ----------------------------------------------------- */
$meta_boxes[] = array(
	'id' => 'home_page_type',
	'title' => 'Default Page Template Options',
	'pages' => array( 'page' ),
	'context' => 'normal',	
	'fields' => array(
		
		// SELECT BOX
		array(
			'name'     => esc_attr__( 'Page Layout', 'dogmawp' ),
			'id'   => $prefix . 'page_layout',
			'desc'  => __( 'Works only Default Page Type', 'dogmawp' ),
			'type'     => 'image_select',
			// Array of 'value' => 'Label' pairs for select box
			'options'  => array(
				'st0' => __( get_template_directory_uri().'/includes/metaboxes/img/wr-page-default.png', 'doro' ),
				'st1' => esc_attr__( get_template_directory_uri().'/includes/metaboxes/img/wr-page-right.png', 'doro' ),
				'st2' => __( get_template_directory_uri().'/includes/metaboxes/img/page-one.png', 'doro' ),
				'st3' => __( get_template_directory_uri().'/includes/metaboxes/img/wr-page-full.png', 'doro' ),								
			),
			'desc'  => esc_attr__( '', 'dogmawp' ),
			// Select multiple values, optional. Default is false.
			'multiple'    => false,
			'std'         => 'st0',
			'placeholder' => __( 'Select an Option', 'dogmawp' ),
		),	
		
		
	)
);


/* ----------------------------------------------------- */
/* page Header Options
/* ----------------------------------------------------- */
$meta_boxes[] = array(
	'id' => 'th_default_page_header_opt',
	'title' => 'Overall Page Options.',	
	'pages' => array( 'page' ),
	'context' => 'normal',	
	'fields' => array(

		array(
			   'name'     => esc_attr__( 'Page Header Section', 'doro' ),
			   'id'   => $prefix . 'page_header_block',
			   'desc' => '',
			   'type'     => 'radio',
			   // Array of 'value' => 'Label' pairs for select box
			   'options'  => array(
				'yes' => esc_attr__( 'Enable', 'doro' ),
				'no' => esc_attr__( 'Disable', 'doro' ),
			   ),
			   // Select multiple values, optional. Default is false.
			   'std'         => 'yes',
		),					
		array(
			'name'		=> 'Title',
			'id'		=> $prefix . 'page_right_block_header_title',
			'clone'		=> false,
			'type'		=> 'textfield',
			'std'		=> '',
			'desc'		=> '',
			'hidden' => array( 'rnr_page_header_block', '!=', 'yes' ),
		),		
		array(
			'name'		=> 'Subtitle',
			'id'		=> $prefix . 'page_right_block_header_subtitle',
			'clone'		=> false,
			'type'		=> 'textfield',
			'std'		=> '',
			'desc'		=> '',
			'hidden' => array( 'rnr_page_header_block', '!=', 'yes' ),
		),
		array(
			   'name'     => esc_attr__( 'Animate Style', 'doro' ),
			   'id'   => $prefix . 'page_header_block_animate',
			   'desc' => '',
			   'type'     => 'radio',
			   // Array of 'value' => 'Label' pairs for select box
			   'options'  => array(
				'yes' => esc_attr__( 'Enable', 'doro' ),
				'no' => esc_attr__( 'Disable', 'doro' ),
			   ),
			   // Select multiple values, optional. Default is false.
			   'std'         => 'no',
			   'hidden' => array( 'rnr_page_header_block', '!=', 'yes' ),
		),	
		array(
			'name'		=> 'Open as a separate page',
			'id'		=> $prefix . 'open_page',
			'type'      => 'checkbox',
			'desc'		=> 'Check it while using "One Page Menu" and want to open this page as a separate page.',
			// Value can be 0 or 1
			'std'  => 0,
			'visible' => array( 'rnr_page_layout', '!=', 'st2' )
		),		
	)
);


/* ----------------------------------------------------- */
/* Portfolio Post Type Metaboxes
/* ----------------------------------------------------- */
$meta_boxes[] = array(
	'id' => 'portfolio_type',
	'title' => 'Portfolio Details Page Header Options.',
	'pages' => array( 'portfolio' ),
	'context' => 'normal',	
	'fields' => array(
		
		array(
			   'name'     => esc_attr__( 'Header Section', 'doro' ),
			   'id'   => $prefix . 'port_header_block',
			   'desc' => '',
			   'type'     => 'radio',
			   // Array of 'value' => 'Label' pairs for select box
			   'options'  => array(
				'yes' => esc_attr__( 'Enable', 'doro' ),
				'no' => esc_attr__( 'Disable', 'doro' ),
			   ),
			   // Select multiple values, optional. Default is false.
			   'std'         => 'yes',
		),					
		array(
			'name'		=> 'Title',
			'id'		=> $prefix . 'port_right_block_header_title',
			'clone'		=> false,
			'type'		=> 'textfield',
			'std'		=> '',
			'desc'		=> '',
			'hidden' => array( 'rnr_port_header_block', '!=', 'yes' ),
		),		
		array(
			'name'		=> 'Subtitle',
			'id'		=> $prefix . 'port_right_block_header_subtitle',
			'clone'		=> false,
			'type'		=> 'textfield',
			'std'		=> '',
			'desc'		=> '',
			'hidden' => array( 'rnr_port_header_block', '!=', 'yes' ),
		),
		array(
			   'name'     => esc_attr__( 'Animate Style', 'doro' ),
			   'id'   => $prefix . 'port_header_block_animate',
			   'desc' => '',
			   'type'     => 'radio',
			   // Array of 'value' => 'Label' pairs for select box
			   'options'  => array(
				'yes' => esc_attr__( 'Enable', 'doro' ),
				'no' => esc_attr__( 'Disable', 'doro' ),
			   ),
			   // Select multiple values, optional. Default is false.
			   'std'         => 'no',
			   'hidden' => array( 'rnr_port_header_block', '!=', 'yes' ),
		),			
		
	)
);

/* ----------------------------------------------------- */
/* Portfolio Details Options
/* ----------------------------------------------------- */
$meta_boxes[] = array(
	'id' => 'port_details_page_header_type4',
	'title' => 'Portfolio Details Page Gallery Options.',
    'pages' => array( 'portfolio'),
	'context' => 'normal',	
	'fields' => array(	
		array(
			   'name'     => esc_attr__( 'Gallery Block Section', 'doro' ),
			   'id'   => $prefix . 'port_gallery_block_section',
			   'desc' => '',
			   'type'     => 'radio',
			   // Array of 'value' => 'Label' pairs for select box
			   'options'  => array(
				'yes' => esc_attr__( 'Enable', 'doro' ),
				'no' => esc_attr__( 'Disable', 'doro' ),
			   ),
			   // Select multiple values, optional. Default is false.
			   'std'         => 'yes',			   
		),		
		array(
		'name'		=> 'Gallery Images',
		'id'		=> $prefix . 'portfolio_gallery_images',
		'clone'		=> false,
		'type'		=> 'image_advanced',
		'max_file_uploads' => '1000',
		'desc'		=> '',
		'hidden' => array( 'rnr_port_gallery_block_section', '!=', 'yes' ),
		),
		array(
			   'name'     => esc_attr__( 'Animate Style', 'doro' ),
			   'id'   => $prefix . 'port_gallery_block_animate',
			   'desc' => '',
			   'type'     => 'radio',
			   // Array of 'value' => 'Label' pairs for select box
			   'options'  => array(
				'yes' => esc_attr__( 'Enable', 'doro' ),
				'no' => esc_attr__( 'Disable', 'doro' ),
			   ),
			   // Select multiple values, optional. Default is false.
			   'std'         => 'no',
			   'hidden' => array( 'rnr_port_gallery_block_section', '!=', 'yes' ),
		),							
	
	)
);

$meta_boxes[] = array(
	'id' => 'port_details_page_header_type5',
	'title' => 'Portfolio Details Page Content Options.',
    'pages' => array( 'portfolio'),
	'context' => 'normal',	
	'fields' => array(	
		array(
			   'name'     => esc_attr__( 'Content Block Section', 'doro' ),
			   'id'   => $prefix . 'port_content_block_section',
			   'desc' => '',
			   'type'     => 'radio',
			   // Array of 'value' => 'Label' pairs for select box
			   'options'  => array(
				'yes' => esc_attr__( 'Enable', 'doro' ),
				'no' => esc_attr__( 'Disable', 'doro' ),
			   ),
			   // Select multiple values, optional. Default is false.
			   'std'         => 'yes',
		),		
		array(
			'name'		=> 'Project Details Title',
			'id'		=> $prefix . 'port_content_header_title',
			'desc'		=> 'Ex: 8 - Eight Inc.',
			'clone'		=> false,
			'type'		=> 'text',
			'std'		=> '',
			'hidden' => array( 'rnr_port_content_block_section', '!=', 'yes' ),
		   ),		   		   
		array(
				'id'		=> $prefix . 'portfolio_column_grid_project_info_main',
				'name'        => 'Project Info Item',
				'type'        => 'group',
				'clone'       => true,
				'sort_clone'  => true,
				'collapsible' => true,
				'group_title' => 'Project Info List', // ID of the subfield
				'save_state' => true,
				'fields' => array(

					array(
						'name' => 'Data Title',
						'id'   => $prefix . 'port_column_grid_dt_in_title',
						'type' => 'text',
						'desc'		=> 'Ex: Project Name:',
					),
					
					array(
						'name' => 'Data Subtitle',
						'id'   => $prefix . 'port_column_grid_dt_in_subtitle',
						'type' => 'text',
						'desc'		=> 'Ex: Corporate Identity',
					),
				),
				'hidden' => array( 'rnr_port_content_block_section', '!=', 'yes' ),
			),
		array(
			   'name'     => esc_attr__( 'Animate Style', 'doro' ),
			   'id'   => $prefix . 'port_content_block_animate',
			   'desc' => '',
			   'type'     => 'radio',
			   // Array of 'value' => 'Label' pairs for select box
			   'options'  => array(
				'yes' => esc_attr__( 'Enable', 'doro' ),
				'no' => esc_attr__( 'Disable', 'doro' ),
			   ),
			   // Select multiple values, optional. Default is false.
			   'std'         => 'no',
			   'hidden' => array( 'rnr_port_content_block_section', '!=', 'yes' ),
		),				
					
	)
);


/********************* META BOX REGISTERING ***********************/

/**
 * Register meta boxes
 *
 * @return void
 */
function doro_register_meta_boxes()
{
	global $meta_boxes;

	// Make sure there's no errors when the plugin is deactivated or during upgrade
	if ( class_exists( 'RW_Meta_Box' ) )
	{
		foreach ( $meta_boxes as $meta_box )
		{
			new RW_Meta_Box( $meta_box );
		}
	}
}

// Hook to 'admin_init' to make sure the meta box class is loaded before
// (in case using the meta box class in another plugin)
// This is also helpful for some conditionals like checking page template, categories, etc.
add_action( 'admin_init', 'doro_register_meta_boxes' );