<?php
/*** Removing shortcodes ***/
vc_remove_element("vc_widget_sidebar");
vc_remove_element("vc_gallery");
vc_remove_element("vc_wp_search");
vc_remove_element("vc_wp_meta");
vc_remove_element("vc_wp_recentcomments");
vc_remove_element("vc_wp_calendar");
vc_remove_element("vc_wp_pages");
vc_remove_element("vc_wp_tagcloud");
vc_remove_element("vc_wp_custommenu");
vc_remove_element("vc_wp_text");
vc_remove_element("vc_wp_posts");
vc_remove_element("vc_wp_links");
vc_remove_element("vc_wp_categories");
vc_remove_element("vc_wp_archives");
vc_remove_element("vc_wp_rss");
vc_remove_element("vc_teaser_grid");
vc_remove_element("vc_button");
vc_remove_element("vc_button2");
vc_remove_element("vc_cta_button");
vc_remove_element("vc_cta_button2");
vc_remove_element("vc_message");
vc_remove_element("vc_tour");
vc_remove_element("vc_progress_bar");
vc_remove_element("vc_pie");
vc_remove_element("vc_posts_slider");
vc_remove_element("vc_toggle");
vc_remove_element("vc_images_carousel");
vc_remove_element("vc_posts_grid");
vc_remove_element("vc_carousel");

/*** Remove unused parameters ***/
if (function_exists('vc_remove_param')) {
	vc_remove_param('vc_single_image', 'css_animation');
	vc_remove_param('vc_column_text', 'css_animation');
	vc_remove_param('vc_row', 'video_bg');
	vc_remove_param('vc_row', 'video_bg_url');
	vc_remove_param('vc_row', 'video_bg_parallax');
	vc_remove_param('vc_row', 'full_height');
	vc_remove_param('vc_row', 'content_placement');
	vc_remove_param('vc_row', 'full_width');
	vc_remove_param('vc_row', 'bg_image');
	vc_remove_param('vc_row', 'bg_color');
	vc_remove_param('vc_row', 'font_color');
	vc_remove_param('vc_row', 'margin_bottom');
	vc_remove_param('vc_row', 'bg_image_repeat');
	vc_remove_param('vc_tabs', 'interval');
	vc_remove_param('vc_separator', 'style');
	vc_remove_param('vc_separator', 'color');
	vc_remove_param('vc_separator', 'accent_color');
	vc_remove_param('vc_separator', 'el_width');
	vc_remove_param('vc_text_separator', 'style');
	vc_remove_param('vc_text_separator', 'color');
	vc_remove_param('vc_text_separator', 'accent_color');
	vc_remove_param('vc_text_separator', 'el_width');
	vc_remove_param('vc_row', 'gap');
    vc_remove_param('vc_row', 'columns_placement');
    vc_remove_param('vc_row', 'equal_height');
    vc_remove_param('vc_row_inner', 'gap');
    vc_remove_param('vc_row_inner', 'content_placement');
    vc_remove_param('vc_row_inner', 'equal_height');
    vc_remove_param('vc_hoverbox', 'use_custom_fonts_primary_title');
    vc_remove_param('vc_hoverbox', 'use_custom_fonts_hover_title');
    vc_remove_param('vc_hoverbox', 'hover_add_button');
	vc_remove_param('vc_row', 'parallax');
    vc_remove_param('vc_row', 'parallax_image');
	vc_remove_param('vc_row', 'parallax_speed_bg');
	vc_remove_param('vc_row', 'parallax_speed_video');
	vc_remove_param('vc_row', 'disable_element');
	vc_remove_param('vc_row', 'el_id');
	vc_remove_param('vc_row', 'el_class');
	//vc_remove_param('vc_row', 'css_animation');
}

/*** Row ***/

vc_add_param("vc_row", array(
	"type" => "dropdown",
	"class" => "",
	"show_settings_on_create"=>true,
	"heading" => "Row Type",
	"param_name" => "row_type",
	"value" => array(		
		"Blank Section" => "st1",
		"Doro Row" => "main-section",
	)
));
vc_add_param("vc_row", array(
	"type" => "dropdown",
	"class" => "",
	"heading" => "Section Layout",
	"param_name" => "wr_section_layout",
	"value" => array(
		"Full Width" => "section_full_width",
		"In Grid" => "section_grid",
	),
	"dependency" => Array('element' => "row_type", 'value' => array('main-section'))
));
vc_add_param("vc_row", array(
	"type" => "dropdown",
	"class" => "",
	"heading" => "Grid Layout",
	"param_name" => "wr_section_layout_grid",
	"value" => array(
		"Default" => "",
		"Fluid" => "section_layout_grid",
		"Fluid 2" => "section_layout_grid2",
	),
	"dependency" => Array('element' => "row_type", 'value' => array('main-section'))
));
vc_add_param("vc_row", array(
	"type" => "dropdown",
	"class" => "",
	"heading" => "Section Default Padding",
	"param_name" => "wr_default_pad",
	"value" => array(
		"Disable" => "",
		"Space 60 60" => "section-padding",
	),
	"dependency" => Array('element' => "row_type", 'value' => array('main-section'))
));
vc_add_param("vc_row", array(
	"type" => "textfield",
	"class" => "",
	"heading" => "Section ID",
	"param_name" => "wr_section_id",
	"value" => "",
	"dependency" => Array('element' => "row_type", 'value' => array('main-section'))
));
vc_add_param("vc_row", array(
	"type" => "textfield",
	"class" => "",
	"heading" => "Section Class",
	"param_name" => "wr_section_class",
	"value" => "",
	"dependency" => Array('element' => "row_type", 'value' => array('main-section'))
));
vc_add_param("vc_row", array(
	"type" => "textfield",
	"class" => "",
	"heading" => "Height",
	"param_name" => "wr_section_height",
	"value" => "",
	"description" => esc_attr__("Please insert height in format: 300px", 'doro'),
	"dependency" => Array('element' => "row_type", 'value' => array('main-section'))
));
vc_add_param("vc_row", array(
	"type" => "colorpicker",
	"class" => "",
	"heading" => "Background Color",
	"param_name" => "wr_background_color",
	"value" => "",
	"dependency" => Array('element' => "row_type", 'value' => array('main-section'))
));
vc_add_param("vc_row", array(
	"type" => "attach_image",
	"class" => "",
	"heading" => "Background Image",
	"value" => "",
	"param_name" => "wr_background_img",
	"description" => "",
	"dependency" => Array('element' => "row_type", 'value' => array('main-section'))
));
vc_add_param("vc_row", array(
	"type" => "textfield",
	"class" => "",
	"heading" => "Padding Top",
	"param_name" => "wr_padding_top",
	"value" => "",
	"description" => esc_attr__("In format: 10px", 'doro'),
	"dependency" => Array('element' => "row_type", 'value' => array('main-section'))
));
vc_add_param("vc_row", array(
	"type" => "textfield",
	"class" => "",
	"heading" => "Padding Bottom",
	"param_name" => "wr_padding_bottom",
	"value" => "",
	"description" => esc_attr__("In format: 10px", 'doro'),
	"dependency" => Array('element' => "row_type", 'value' => array('main-section'))
));
vc_add_param("vc_row", array(
	"type" => "textfield",
	"class" => "",
	"heading" => "Margin Top",
	"param_name" => "wr_margin_top",
	"value" => "",
	"description" => esc_attr__("In format: 10px", 'doro'),
	"dependency" => Array('element' => "row_type", 'value' => array('main-section'))
));
vc_add_param("vc_row", array(
	"type" => "textfield",
	"class" => "",
	"heading" => "Margin Bottom",
	"param_name" => "wr_margin_bottom",
	"value" => "",
	"description" => esc_attr__("In format: 10px", 'doro'),
	"dependency" => Array('element' => "row_type", 'value' => array('main-section'))
));

/***************** Doro Shortcodes *********************/

// Title Block
vc_map( array(
		"name" => "Doro Heading",
		"base" => "wr_vc_section_title",
		"category" => 'by Doro',
		"icon" => "icon-doro",
		"allowed_contaidoro_element" => 'vc_row',
		"params" => array(
			array(
				"type" => "textfield",
				"holder" => "hidden",
				"class" => "",
				"heading" => "Extra Class",
				"param_name" => "class",
				"value" => "",
			),	
			array(
				"type" => "dropdown",
				"holder" => "hidden",
				"class" => "",
				"heading" => "Style Type",
				"param_name" => "featyretype",
				"value" => array(
					"Style 1" => "st1",
					"Style 2" => "st2",
					
				),
				"description" => ""
			),			
			array(
				"type" => "textfield",
				"holder" => "hidden",
				"class" => "",
				"heading" => "Title Text",
				"param_name" => "title",
				"value" => "",
				"admin_label" => true,
			),
			array(
				"type" => "textfield",
				"holder" => "hidden",
				"class" => "",
				"heading" => "Subtitle Text",
				"param_name" => "title2",
				"value" => "",
				"admin_label" => true,
			),				
			array(
				"type" => "colorpicker",
				"holder" => "hidden",
				"class" => "",
				"heading" => "Title Color",
				"param_name" => "color",
				"value" => ""
			),	
			array(
				"type" => "colorpicker",
				"holder" => "hidden",
				"class" => "",
				"heading" => "Subtitle Color",
				"param_name" => "color2",
				"value" => ""
			),				
				array(
				"type" => "dropdown",
				"holder" => "hidden",
				"class" => "",
				"heading" => "Title Text Transform",
				"param_name" => "text_transform",
				"value" => array(
				    "None" => "",
					"Uppercase" => "uppercase",
					"Lowercase" => "lowercase",
					"Capitalize" => "capitalize",
				),
				"description" => ""
			),			
			array(
				"type" => "textfield",
				"holder" => "hidden",
				"class" => "",
				"heading" => "Font Size",
				"param_name" => "font_size",
				"value" => ""
			),
			array(
				"type" => "textfield",
				"holder" => "hidden",
				"class" => "",
				"heading" => "Subtitle Font Size",
				"param_name" => "font_size2",
				"value" => ""
			),			
			array(
				"type" => "dropdown",
				"holder" => "hidden",
				"class" => "",
				"heading" => "Font Weight",
				"param_name" => "font_weight",
				"value" => array(
				    "" => "",
					"Default" => "normal",
					"Lighter" => "lighter",
					"Thin 100" => "100",
					"Extra-Light 200" => "200",
					"Light 300" => "300",
					"Regular 400" => "400",
					"Medium 500" => "500",
					"Semi-Bold 600" => "600",
					"Bold 700" => "700",
					"Extra-Bold 800" => "800",
					"Ultra-Bold 900" => "900",
				)

			),	
			array(
				"type" => "dropdown",
				"holder" => "hidden",
				"class" => "",
				"heading" => "Subtitle Font Weight",
				"param_name" => "font_weight2",
				"value" => array(
				    "" => "",
					"Default" => "normal",
					"Lighter" => "lighter",
					"Thin 100" => "100",
					"Extra-Light 200" => "200",
					"Light 300" => "300",
					"Regular 400" => "400",
					"Medium 500" => "500",
					"Semi-Bold 600" => "600",
					"Bold 700" => "700",
					"Extra-Bold 800" => "800",
					"Ultra-Bold 900" => "900",
				)

			),			
			array(
				"type" => "textfield",
				"holder" => "hidden",
				"class" => "",
				"heading" => "Font Line Height",
				"param_name" => "line_height",
				"value" => ""
			),	
			array(
				"type" => "dropdown",
				"holder" => "hidden",
				"class" => "",
				"heading" => "Text Align",
				"param_name" => "text_align",
				"value" => array(
				    "" => "",
					"Left" => "left",
					"Right" => "right",
					"Center" => "center",
					"Justify" => "justify",
					
				),
				"description" => ""
			),
			array(
				"type" => "dropdown",
				"holder" => "hidden",
				"class" => "",
				"heading" => "Float",
				"param_name" => "float",
				"value" => array(
					"Default" => "",
					"Left" => "float-left",
					"Right" => "float-right",
					"Center" => "float-center",
				)
			),			
			array(
				"type" => "textfield",
				"holder" => "hidden",
				"class" => "",
				"heading" => "Title Margin",
				"param_name" => "margin",
				"value" => "",
				"description" => __("Please insert margin in format: 0px 0px 0px 0px", 'doro')
			),
			array(
				"type" => "textfield",
				"holder" => "hidden",
				"class" => "",
				"heading" => "Title Padding",
				"param_name" => "padding",
				"value" => "",
				"description" => __("Please insert padding in format: 0px 0px 0px 0px", 'doro')
			),	
			array(
				"type" => "textfield",
				"holder" => "hidden",
				"class" => "",
				"heading" => "Subtitle Margin",
				"param_name" => "margin2",
				"value" => "",
				"description" => __("Please insert margin in format: 0px 0px 0px 0px", 'doro')
			),
			array(
				"type" => "textfield",
				"holder" => "hidden",
				"class" => "",
				"heading" => "Subtitle Padding",
				"param_name" => "padding2",
				"value" => "",
				"description" => __("Please insert padding in format: 0px 0px 0px 0px", 'doro')
			),				
			
		)
) );

// Text Block
vc_map( array(
		"name" => "Doro Content",
		"base" => "wr_vc_section_text",
		"category" => 'by Doro',
		"icon" => "icon-doro",
		"allowed_contaidoro_element" => 'vc_row',
		"params" => array(
			array(
				"type" => "textfield",
				"holder" => "hidden",
				"class" => "",
				"heading" => "Extra Class",
				"param_name" => "class",
				"value" => ""
			),						
			array(
				"type" => "textarea_html",
				"holder" => "div",
				"class" => "",
				"heading" => "Content Text",
				"param_name" => "content",
				"value" => "I am text block. Click edit button to change this text. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut elit tellus, luctus nec ullamcorper mattis, pulvinar dapibus leo.",
			),				
			array(
				"type" => "dropdown",
				"holder" => "hidden",
				"class" => "",
				"heading" => "Float",
				"param_name" => "float",
				"value" => array(
					"Default" => "",
					"Left" => "float-left",
					"Right" => "float-right",
					"Center" => "float-center",
				)
			),			
			array(
				"type" => "textfield",
				"holder" => "hidden",
				"class" => "",
				"heading" => "Margin",
				"param_name" => "margin2",
				"value" => "",
				"description" => __("Please insert margin in format: 0px 0px 0px 0px", 'doro')
			),
			array(
				"type" => "textfield",
				"holder" => "hidden",
				"class" => "",
				"heading" => "Padding",
				"param_name" => "padding2",
				"value" => "",
				"description" => __("Please insert padding in format: 0px 0px 0px 0px", 'doro')
			),				
			
		)
) );
// Image Block
vc_map( array(
		"name" => "Doro Image",
		"base" => "wr_vc_section_image",
		"category" => 'by Doro',
		"icon" => "icon-doro",
		"allowed_contaidoro_element" => 'vc_row',
		"params" => array(
			array(
				"type" => "textfield",
				"holder" => "hidden",
				"class" => "",
				"heading" => "Extra Class",
				"param_name" => "class",
				"value" => ""
			),
			array(
				"type" => "dropdown",
				"holder" => "hidden",
				"class" => "",
				"heading" => "Style Type",
				"param_name" => "featyretype",
				"value" => array(
					"Style 1" => "st1",
					"Style 2" => "st2",
					
				),
				"description" => ""
			),			
			array(
				"type" => "attach_image",
				"holder" => "hidden",
				"class" => "",
				"heading" => "Upload Image",
				"param_name" => "img_url",
				"value" => "",
				"admin_label" => true,
			),		
			array(
				"type" => "textfield",
				"holder" => "hidden",
				"class" => "",
				"heading" => "Add URL",
				"param_name" => "link_url",
				"value" => "",
			),			
			array(
				"type" => "dropdown",
				"holder" => "hidden",
				"class" => "",
				"heading" => "URL Target",
				"param_name" => "link_target",
				"value" => array(
					"Self" => "_self",
					"Blank" => "_blank",
					"Parent" => "_parent",	
					"Top" => "_top"	
				),
				"description" => ""
			),				
			array(
				"type" => "textfield",
				"holder" => "hidden",
				"class" => "",
				"heading" => "Width",
				"param_name" => "width",
				"value" => ""
			),				
			array(
				"type" => "textfield",
				"holder" => "hidden",
				"class" => "",
				"heading" => "Height",
				"param_name" => "height",
				"value" => ""
			),
			array(
				"type" => "dropdown",
				"holder" => "hidden",
				"class" => "",
				"heading" => "Float",
				"param_name" => "float",
				"value" => array(
					"None" => "none",
					"Left" => "left",
					"Right" => "right",
				)

			),				
			array(
				"type" => "dropdown",
				"holder" => "hidden",
				"class" => "",
				"heading" => "Position",
				"param_name" => "position",
				"value" => array(
					"Default" => "inherit",
					"Absolute" => "absolute",
					"Relative" => "relative",
					"Static" => "static",
					
				),
				"description" => ""
			),			
			array(
				"type" => "textfield",
				"holder" => "hidden",
				"class" => "",
				"heading" => "Top",
				"param_name" => "top",
				"value" => ""
			),	
			array(
				"type" => "textfield",
				"holder" => "hidden",
				"class" => "",
				"heading" => "Bottom",
				"param_name" => "Bottom",
				"value" => ""
			),
			array(
				"type" => "textfield",
				"holder" => "hidden",
				"class" => "",
				"heading" => "Left",
				"param_name" => "left",
				"value" => ""
			),	
			array(
				"type" => "textfield",
				"holder" => "hidden",
				"class" => "",
				"heading" => "Right",
				"param_name" => "right",
				"value" => ""
			),	
			array(
				"type" => "textfield",
				"holder" => "hidden",
				"class" => "",
				"heading" => "Z-index",
				"param_name" => "zindex",
				"value" => ""
			),				
			array(
				"type" => "textfield",
				"holder" => "hidden",
				"class" => "",
				"heading" => "Margin",
				"param_name" => "margin",
				"value" => "",
				"description" => __("Please insert margin in format: 0px 0px 0px 0px", 'doro')
			),
			array(
				"type" => "textfield",
				"holder" => "hidden",
				"class" => "",
				"heading" => "Padding",
				"param_name" => "padding",
				"value" => "",
				"description" => __("Please insert padding in format: 0px 0px 0px 0px", 'doro')
			),

		)
) );
// Icon Block
vc_map( array(
		"name" => "Doro Icon & Text",
		"base" => "wr_vc_icon",
		"category" => 'by Doro',
		"icon" => "icon-doro",
		"allowed_contaidoro_element" => 'vc_row',
		"params" => array(
			array(
				"type" => "textfield",
				"holder" => "hidden",
				"class" => "",
				"heading" => "Extra Class",
				"param_name" => "class",
				"value" => ""
			),					
			array(
				"type" => "textfield",
				"holder" => "hidden",
				"class" => "",
				"heading" => "Icon Name",
				"param_name" => "icon_name",
				"value" => "",
				"admin_label" => true,
				"description" => __("Please insert icon class name here. <strong><a href='https://museomix.be/doc/Icons-ET-LineIcons.html' target='_blank'>ET Line</a></strong> Ex: et-pricetags or <strong><a href='https://fontawesome.com/v5/cheatsheet' target='_blank'>Fontawesome</a></strong> Ex: fal fa-bullhorn")
			),	
			array(
				"type" => "textfield",
				"holder" => "hidden",
				"class" => "",
				"heading" => "Title Text",
				"param_name" => "title",
				"value" => "",
				"admin_label" => true,
			),	
			array(
				"type" => "textarea_html",
				"holder" => "div",
				"class" => "",
				"heading" => "Content Text",
				"param_name" => "content",
				"value" => "",
				"admin_label" => true,
			),				
			array(
				"type" => "colorpicker",
				"holder" => "hidden",
				"class" => "",
				"heading" => "Title Color",
				"param_name" => "color",
				"value" => ""
			),	
			array(
				"type" => "colorpicker",
				"holder" => "hidden",
				"class" => "",
				"heading" => "Icon Color",
				"param_name" => "icon_color",
				"value" => ""
			),				
			array(
				"type" => "textfield",
				"holder" => "hidden",
				"class" => "",
				"heading" => "Title URL",
				"param_name" => "link_url",
				"value" => "",
			),			
			array(
				"type" => "dropdown",
				"holder" => "hidden",
				"class" => "",
				"heading" => "Title URL Target",
				"param_name" => "link_target",
				"value" => array(
				    "" => "",
					"Self" => "_self",
					"Blank" => "_blank",
					"Parent" => "_parent",	
					"Top" => "_top"	
				),
				"description" => ""
			),					
			array(
				"type" => "dropdown",
				"holder" => "hidden",
				"class" => "",
				"heading" => "Title Text Transform",
				"param_name" => "text_transform",
				"value" => array(
				    "None" => "",
					"Uppercase" => "uppercase",
					"Lowercase" => "lowercase",
					"Capitalize" => "capitalize",
				),
				"description" => ""
			),			
			array(
				"type" => "textfield",
				"holder" => "hidden",
				"class" => "",
				"heading" => "Title Font Size",
				"param_name" => "font_size",
				"value" => ""
			),
			array(
				"type" => "dropdown",
				"holder" => "hidden",
				"class" => "",
				"heading" => "Title Font Weight",
				"param_name" => "font_weight",
				"value" => array(
				    "" => "",
					"Default" => "normal",
					"Lighter" => "lighter",
					"Thin 100" => "100",
					"Extra-Light 200" => "200",
					"Light 300" => "300",
					"Regular 400" => "400",
					"Medium 500" => "500",
					"Semi-Bold 600" => "600",
					"Bold 700" => "700",
					"Extra-Bold 800" => "800",
					"Ultra-Bold 900" => "900",
				)

			),			
			array(
				"type" => "textfield",
				"holder" => "hidden",
				"class" => "",
				"heading" => "Title Font Line Height",
				"param_name" => "line_height",
				"value" => ""
			),	
			array(
				"type" => "dropdown",
				"holder" => "hidden",
				"class" => "",
				"heading" => "Float",
				"param_name" => "float",
				"value" => array(
					"Default" => "",
					"Left" => "float-left",
					"Right" => "float-right",
					"Center" => "float-center",
				)
			),				
			array(
				"type" => "textfield",
				"holder" => "hidden",
				"class" => "",
				"heading" => " Margin",
				"param_name" => "margin",
				"value" => "",
				"description" => __("Please insert margin in format: 0px 0px 0px 0px", 'doro')
			),
			array(
				"type" => "textfield",
				"holder" => "hidden",
				"class" => "",
				"heading" => "Padding",
				"param_name" => "padding",
				"value" => "",
				"description" => __("Please insert padding in format: 0px 0px 0px 0px", 'doro')
			),					
		)
) );
// Blog Block
vc_map( array(
		"name" => "Doro Blog",
		"base" => "wr_vc_blog",
		"category" => 'by Doro',
		"icon" => "icon-doro",
		"allowed_contaibauen_element" => 'vc_row',
		"params" => array(
			array(
				"type" => "textfield",
				"holder" => "hidden",
				"class" => "",
				"heading" => "CSS Class",
				"param_name" => "class",
				"value" => ""
			),				
			array(
				"type" => "textfield",
				"holder" => "hidden",
				"class" => "",
				"heading" => "Number Of Posts To Show",
				"param_name" => "showpost",
				"value" => "100",
				"description" => __("Insert number of post show in format: 4", 'doro'),
				"admin_label" => true,
			),									
			array(
				"type" => "textfield",
				"holder" => "hidden",
				"class" => "",
				"heading" => "Category Name",
				"param_name" => "categoryname",
				"value" => "",
				"description" => __("(Optional) Insert category name in format: Graphic", 'doro'),
				"admin_label" => true,
			),	
			
		)
) );
// Portfolio Block
vc_map( array(
		"name" => "Doro Portfolio",
		"base" => "wr_vc_portfolio",
		"category" => 'by Doro',
		"icon" => "icon-doro",
		"allowed_contaidoro_element" => 'vc_row',
		"params" => array(
			array(
				"type" => "textfield",
				"holder" => "hidden",
				"class" => "",
				"heading" => "Extra Class",
				"param_name" => "class",
				"value" => ""
			),						
			array(
				"type" => "textfield",
				"holder" => "hidden",
				"class" => "",
				"heading" => "Category Name",
				"param_name" => "categoryname",
				"value" => "",
				"description" => __("(Optional) Insert category name in format: Graphic", 'doro'),
				"admin_label" => true,
			),		
			array(
				"type" => "textfield",
				"holder" => "hidden",
				"class" => "",
				"heading" => "Number of posts to show",
				"param_name" => "postcount",
				"value" => "-1",
				"description" => __("Please insert number of member show in format: 8", 'doro'),
				"admin_label" => true,
			),				
			array(
				"type" => "textfield",
				"holder" => "hidden",
				"class" => "",
				"heading" => esc_attr__('Post Offset', 'doro'),
				"param_name" => "postoffset",
				"value" => "",
				"description" => esc_attr__('Use this field if you need.', 'doro'),
				"admin_label" => true,
			),	            
		)
) );

// Testimonials Block
class WPBakeryShortCode_WR_VC_Testimonials  extends WPBakeryShortCodesContainer {}
//Register "container" content element. It will hold all your inner (child) content elements
vc_map( array(
        "name" => "Doro Team Member", "doro",
        "base" => "wr_vc_testimonials",
        "as_parent" => array('only' => 'wr_vc_testimonial'), // Use only|except attributes to limit child shortcodes (separate multiple values with comma)
        "content_element" => true,
		"category" => 'by Doro',
		"icon" => "icon-doro",
        "show_settings_on_create" => true,
        "params" => array(
			
			array(
				"type" => "textfield",
				"holder" => "hidden",
				"class" => "",
				"heading" => "Class",
				"param_name" => "class",
				"value" => ""
			),	
			array(
				"type" => "attach_image",
				"holder" => "hidden",
				"class" => "",
				"heading" => "Member's Image",
				"param_name" => "image",
				"description" => "",
				"admin_label" => true,
			),				
			array(
				"type" => "textfield",
				"holder" => "hidden",
				"class" => "",
				"heading" => "Title Text",
				"param_name" => "title",
				"value" => "",
				"description" => __("Please insert team member name here in format: Robert Lee", 'doro'),
				"admin_label" => true,
			),
			array(
				"type" => "textfield",
				"holder" => "hidden",
				"class" => "",
				"heading" => "Subtitle Text",
				"param_name" => "title2",
				"value" => "",
				"description" => __("Please insert team member designation here in format: Founder &amp; CEO", 'doro'),
				"admin_label" => true,
			),				
			array(
				"type" => "textfield",
				"holder" => "hidden",
				"class" => "",
				"heading" => "Add URL",
				"param_name" => "button_url",
				"value" => "",
				"description" => "",
				
			),
			
			array(
				"type" => "dropdown",
				"holder" => "hidden",
				"class" => "",
				"heading" => "URL Target",
				"param_name" => "button_target",
				"value" => array(
					"Self" => "_self",
					"Blank" => "_blank",
					"Parent" => "_parent",	
					"Top" => "_top"	
				),
				"description" => "",
			),			
            
        ),
        "js_view" => 'VcColumnView'
) );

class WPBakeryShortCode_WR_VC_Testimonial extends WPBakeryShortCode {}
vc_map( array(
        "name" => "Doro Member Social Icon", "doro",
        "base" => "wr_vc_testimonial",
        "content_element" => true,
		"icon" => "icon-doro",
        "as_child" => array('only' => 'wr_vc_testimonials'), // Use only|except attributes to limit parent (separate multiple values with comma)
        "params" => array(
			
			array(
				"type" => "textfield",
				"holder" => "hidden",
				"class" => "",
				"heading" => "Social Icon",
				"param_name" => "button_text",
				"value" => "",
				"description" => __("Please insert <strong><a href='https://themify.me/themify-icons' target='_blank'>Themify</a></strong> icon class name here. Ex: instagram"),
				"admin_label" => true,
				
			),
			
			array(
				"type" => "textfield",
				"holder" => "hidden",
				"class" => "",
				"heading" => "Add URL",
				"param_name" => "button_url",
				"value" => "",
				"description" => "",
				
			),
			
			array(
				"type" => "dropdown",
				"holder" => "hidden",
				"class" => "",
				"heading" => "URL Target",
				"param_name" => "button_target",
				"value" => array(
					"Self" => "_self",
					"Blank" => "_blank",
					"Parent" => "_parent",	
					"Top" => "_top"	
				),
				"description" => "",
			),
							
            
        )
) );


// Slider Block
class WPBakeryShortCode_WR_VC_Skills  extends WPBakeryShortCodesContainer {}
//Register "container" content element. It will hold all your inner (child) content elements
vc_map( array(
        "name" => "Doro Slider", "Doro",
        "base" => "wr_vc_skills",
        "as_parent" => array('only' => 'wr_vc_skill'), // Use only|except attributes to limit child shortcodes (separate multiple values with comma)
        "content_element" => true,
		"category" => 'by Doro',
		"icon" => "icon-doro",
        "show_settings_on_create" => true,
        "params" => array(
			array(
				"type" => "textfield",
				"holder" => "hidden",
				"class" => "",
				"heading" => "Extra Class",
				"param_name" => "class",
				"value" => ""
			),	
			array(
				"type" => "textfield",
				"holder" => "hidden",
				"class" => "",
				"heading" => "Slider Speed",
				"param_name" => "slider_speed",
				"value" => "",
				"description" => esc_attr__("Please insert slider speed here. Ex: 5000", 'doro')
			),	
			array(
				"type" => "textfield",
				"holder" => "hidden",
				"class" => "",
				"heading" => "Auto Slideshow",
				"param_name" => "slider_slideshow",
				"value" => "",
				"description" => esc_attr__("Please insert slide speed here. Ex: false", 'doro')
			),				
        ),
        "js_view" => 'VcColumnView'
) );
class WPBakeryShortCode_WR_VC_Skill extends WPBakeryShortCode {}
vc_map( array(
        "name" => "Doro Slider Image/Video ", "Doro",
        "base" => "wr_vc_skill",
        "content_element" => true,
		"icon" => "icon-doro",
        "as_child" => array('only' => 'wr_vc_skills'), // Use only|except attributes to limit parent (separate multiple values with comma)
        "params" => array(					
			array(
				"type" => "attach_image",
				"holder" => "hidden",
				"class" => "",
				"heading" => "Slider's Image",
				"param_name" => "image",
				"description" => "",
				"admin_label" => true,
			),	
			array(
				"type" => "textarea",
				"holder" => "hidden",
				"class" => "",
				"heading" => "Slider's Video",
				"param_name" => "video",
				"value" => "",
				"description" => esc_attr__("Please insert mp4 video Add URL here. Ex: http://Doro.net/demo/wp/doro/background.mp4", 'doro')
			),				
			array(
				"type" => "textfield",
				"holder" => "hidden",
				"class" => "",
				"heading" => "Title Text",
				"param_name" => "title",
				"value" => "",
				"description" => "",
				"admin_label" => true,
			),	
			array(
				"type" => "textfield",
				"holder" => "hidden",
				"class" => "",
				"heading" => "Image URL",
				"param_name" => "button_url",
				"value" => "",
				"description" => "",
				
			),			
			array(
				"type" => "dropdown",
				"holder" => "hidden",
				"class" => "",
				"heading" => "Image URL Target",
				"param_name" => "button_target",
				"value" => array(
					"Self" => "_self",
					"Blank" => "_blank",
					"Parent" => "_parent",	
					"Top" => "_top"	
				),
				"description" => "",
			),				
			array(
				"type" => "colorpicker",
				"holder" => "hidden",
				"class" => "",
				"heading" => "Title Color",
				"param_name" => "color",
				"value" => ""
			),	
			
			array(
				"type" => "dropdown",
				"holder" => "hidden",
				"class" => "",
				"heading" => "Title Text Transform",
				"param_name" => "text_transform",
				"value" => array(
				    "None" => "",
					"Uppercase" => "uppercase",
					"Lowercase" => "lowercase",
					"Capitalize" => "capitalize",
				),
				"description" => ""
			),			
			array(
				"type" => "textfield",
				"holder" => "hidden",
				"class" => "",
				"heading" => "Font Size",
				"param_name" => "font_size",
				"value" => ""
			),		
			array(
				"type" => "dropdown",
				"holder" => "hidden",
				"class" => "",
				"heading" => "Font Weight",
				"param_name" => "font_weight",
				"value" => array(
				    "" => "",
					"Default" => "normal",
					"Lighter" => "lighter",
					"Thin 100" => "100",
					"Extra-Light 200" => "200",
					"Light 300" => "300",
					"Regular 400" => "400",
					"Medium 500" => "500",
					"Semi-Bold 600" => "600",
					"Bold 700" => "700",
					"Extra-Bold 800" => "800",
					"Ultra-Bold 900" => "900",
				)

			),				
			array(
				"type" => "textfield",
				"holder" => "hidden",
				"class" => "",
				"heading" => "Font Line Height",
				"param_name" => "line_height",
				"value" => ""
			),	
			array(
				"type" => "dropdown",
				"holder" => "hidden",
				"class" => "",
				"heading" => "Text Align",
				"param_name" => "text_align",
				"value" => array(
				    "" => "",
					"Left" => "left",
					"Right" => "right",
					"Center" => "center",
					"Justify" => "justify",
					
				),
				"description" => ""
			),		
        )
) );

// Gallery Block
class WPBakeryShortCode_WR_VC_Masonry_Gallery  extends WPBakeryShortCode {}
//Register "container" content element. It will hold all your inner (child) content elements
vc_map( array(
        "name" => "Doro Image Gallery", "doro",
        "base" => "wr_vc_masonry_gallery",
        "content_element" => true,
		"category" => 'by Doro',
		"icon" => "icon-doro",
        "params" => array(
			
			array(
				"type" => "textfield",
				"holder" => "hidden",
				"class" => "",
				"heading" => "CSS Class",
				"param_name" => "class",
				"value" => "",
				"description" => "",
			),
			
			array(
				"type" => "dropdown",
				"holder" => "hidden",
				"class" => "",
				"heading" => esc_html__('Load More Button', 'doro'),
				"param_name" => "doro_load_more_button",
				"value" => array(
					"Disable" => "st1",
					"Enable" => "st2",
				),
				"description" => "Enable/ Disable Load More Button.",
			),
			
			array(
				"type" => "textfield",
				"holder" => "hidden",
				"class" => "",
				"heading" => esc_html__('Post Load', 'doro'),
				"param_name" => "postload",
				"value" => "",
				"description" => esc_html__('Number of posts to show before load more button. Required.', 'doro'),
				"dependency" => Array('element' => "doro_load_more_button", 'value' => array('st2')),
				"admin_label" => true,
				
			),			
			array(
				"type" => "dropdown",
				"holder" => "hidden",
				"class" => "",
				"heading" => esc_html__('Gallery Column', 'doro'),
				"param_name" => "doro_gallery_column",
				"value" => array(
					"3 Column" => "st1",
					"4 Column" => "st3",
					"2 Column" => "st2",
					"1 Column" => "st4",
				),
				"description" => "",
			),			
			array(
				"type" => "attach_images",
				"holder" => "hidden",
				"class" => "",
				"heading" => "Upload Images",
				"param_name" => "image",
				"description" => "",
				"admin_label" => true,
			),
			
		),
        
) );

// Contact Info Block
vc_map( array(
		"name" => "Doro Contact Info",
		"base" => "wr_vc_contact_info",
		"category" => 'by Doro',
		"icon" => "icon-doro",
		"allowed_container_element" => 'vc_row',
		"params" => array(
			array(
				"type" => "textfield",
				"holder" => "hidden",
				"class" => "",
				"heading" => "Extra Class",
				"param_name" => "class",
				"value" => ""
			),			
			array(
				"type" => "textarea",
				"holder" => "hidden",
				"class" => "",
				"heading" => "Address Location",
				"param_name" => "address_title",
				"value" => "",
				"description" => esc_attr__("Please insert address location here. ", 'doro'),
				"admin_label" => true,
			),	
			array(
				"type" => "textarea",
				"holder" => "hidden",
				"class" => "",
				"heading" => "Phone Number",
				"param_name" => "con_phone",
				"value" => "",
				"admin_label" => true,	
			),				
			array(
				"type" => "textfield",
				"holder" => "hidden",
				"class" => "",
				"heading" => "Contact Mail Address 1",
				"param_name" => "con_mail1",
				"value" => "",
				"admin_label" => true,
			),	
			array(
				"type" => "textfield",
				"holder" => "hidden",
				"class" => "",
				"heading" => "Contact Mail Address 2",
				"param_name" => "con_mail2",
				"value" => "",
				"admin_label" => true,
			),	
			array(
				"type" => "textfield",
				"holder" => "hidden",
				"class" => "",
				"heading" => "Contact Mail Address 3",
				"param_name" => "con_mail3",
				"value" => "",
				"admin_label" => true,
			),	
			
		)
) );

// Contact Form Block
vc_map( array(
		"name" => "Doro Contact Form",
		"base" => "wr_vc_contact_form",
		"category" => 'by Doro',
		"icon" => "icon-doro",
		"allowed_contaidoro_element" => 'vc_row',
		"params" => array(
			array(
				"type" => "textfield",
				"holder" => "hidden",
				"class" => "",
				"heading" => "Extra Class",
				"param_name" => "class",
				"value" => ""
			),						
			array(
				"type" => "textfield",
				"holder" => "hidden",
				"class" => "",
				"heading" => "Contact Form ID",
				"param_name" => "contactfromid",
				"value" => "",
				"description" => __("Please insert contact form id number in format: 5", 'doro'),
				"admin_label" => true,
			),					  
		)
) );
// Google Map
vc_map( array(
		"name" => "Doro Google Map",
		"base" => "wr_vc_map",
		"category" => 'by Doro',
		"icon" => "icon-doro",
		"allowed_container_element" => 'vc_row',
		"params" => array(

			array(
				"type" => "textfield",
				"holder" => "hidden",
				"class" => "",
				"heading" => "Latitude, Longitude",
				"param_name" => "latitude",
				"value" => "",
				"description" => "Ex: 48.859003, 2.345275",
				"admin_label" => true,
				
			),
			
			array(
				"type" => "textfield",
				"holder" => "hidden",
				"class" => "",
				"heading" => "Address",
				"param_name" => "address",
				"value" => "",
				"description" => "Ex: 27th Brooklyn New York, NY 10065",
				"admin_label" => true,
				
			),
			
			array(
				"type" => "attach_image",
				"holder" => "hidden",
				"class" => "",
				"heading" => "Upload Location Marker",
				"param_name" => "image",
				"description" => "",
				"admin_label" => true,
			),			
			
		)
) );


?>