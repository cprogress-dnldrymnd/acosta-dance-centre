<?php
/*
Plugin Name: Doro Plugin
Plugin URI: http://webredox.net
Description: Declares a plugin that will create Page Settins, VC addons & Custom Post Type
Version: 2.7
Author: webRedox
Author URI: http://webredox.net
License: GPLv2
*/
define('DORO_VERSION', '2.7');
define('DORO_PLUGIN_PATH',		plugin_dir_path(__FILE__));
define('DORO_URL', plugins_url('', __FILE__));
function doro_register_metabox_list() {
require (DORO_PLUGIN_PATH .'/plugin-update-checker/plugin-update-checker.php');
$myUpdateChecker = Puc_v4_Factory::buildUpdateChecker(
	'http://webredox.net/demo/wp/doro/pluginupdate/details.json',
	__FILE__, //Full path to the main plugin file or functions.php.
	'doro-plugin'
);
include (DORO_PLUGIN_PATH .'metaboxes.php');
}
add_action('init', 'doro_register_metabox_list');
include (DORO_PLUGIN_PATH .'meta-box-group.php');
include (DORO_PLUGIN_PATH .'meta-box-show-hide.php');
include (DORO_PLUGIN_PATH .'meta-box-tooltip.php');
include (DORO_PLUGIN_PATH .'meta-box-conditional-logic.php');
include (DORO_PLUGIN_PATH .'page-links-to.php');
include (DORO_PLUGIN_PATH .'elmentor-widgets.php');
function doro_unregister_elementor() {
	include (DORO_PLUGIN_PATH .'elmentor-bn-widgets.php');
}
add_action('init', 'doro_unregister_elementor');

global $doro_options;


if( ! function_exists( 'portfolio_post_types' ) ) {
    function portfolio_post_types() {
        register_post_type(
            'portfolio',
            array(
                'labels' => array(
                    'name'          => __( 'Portfolios', 'portfolio' ),
                    'singular_name' => __( 'Portfolio', 'portfolio' ),
                    'add_new'       => __( 'Add New', 'portfolio' ),
                    'add_new_item'  => __( 'Add New Portfolio', 'portfolio' ),
                    'edit'          => __( 'Edit', 'portfolio' ),
                    'edit_item'     => __( 'Edit Portfolio', 'portfolio' ),
                    'new_item'      => __( 'New Portfolio', 'portfolio' ),
                    'view'          => __( 'View Portfolio', 'portfolio' ),
                    'view_item'     => __( 'View Portfolio', 'portfolio' ),
                    'search_items'  => __( 'Search Portfolio', 'portfolio' ),
                    'not_found'     => __( 'No Portfolio item found', 'portfolio' ),
                    'not_found_in_trash' => __( 'No portfolio item found in Trash', 'portfolio' ),
                    'parent'        => __( 'Parent Portfolio', 'portfolio' ),
                ),
                
                'description'       => __( 'Create a Portfolio.', 'portfolio' ),
                'public'            => true,
                'show_ui'           => true,
                'show_in_menu'          => true,
                'publicly_queryable'    => true,
				'capability_type' => 'post',
                'exclude_from_search'   => true,
                'menu_position'         => 6,
                'hierarchical'      => false,
                'query_var'         => true,
				'menu_icon' => 'dashicons-portfolio',
                'supports'  => array (
                    'title', //Text input field to create a post title.
                    'editor',
                    'thumbnail', 
                )
            )
        );
register_taxonomy('portfolio_category', 'portfolio', array('hierarchical' => true, 'label' => 'Portfolio Categories', 'singular_name' => 'Category', "rewrite" => true, "query_var" => true));
    }
}
add_action( 'init', 'portfolio_post_types' ); // register post type
register_taxonomy_for_object_type('category', 'custom-type');

add_filter('widget_title', 'do_shortcode');
add_shortcode('span', 'wpse_shortcode_span');
function wpse_shortcode_span( $attr, $content ){ return '<span>'. $content . '</span>'; }
add_shortcode('br', 'wpse_shortcode_br');
function wpse_shortcode_br( $attr ){ return '<br>'; }
function doro_social_media_icons( $doro_contactmethods ) {
    // Add social media
    
    $doro_contactmethods['twitter'] = 'Twitter';
    $doro_contactmethods['facebook'] = 'Facebook';
    $doro_contactmethods['instagram'] = 'Instagram';
    $doro_contactmethods['tumblr'] = 'Tumblr';
    $doro_contactmethods['pinterest'] = 'Pinterest';
    $doro_contactmethods['youtube'] = 'Youtube';

    return $doro_contactmethods;
}
add_filter('user_contactmethods','doro_social_media_icons',10,1);
/* ==========================================
   Add featured image column to admin panel post list page
========================================== */
add_filter('manage_posts_columns', 'add_img_column');
add_filter('manage_posts_custom_column', 'manage_img_column', 10, 2);

function add_img_column($columns) {
	$columns['img'] = 'Thumbnail';
	return $columns;
}

function manage_img_column($column_name, $post_id) {
	if( $column_name == 'img' ) {
		echo get_the_post_thumbnail( $post_id, array( 80, 60) ); return true; // 80, 60 is for image size.
	}
}

// Change columns order
add_filter('manage_posts_columns', 'column_order');
function column_order($columns) {
  $n_columns = array();
  $move = 'img'; // what to move
  $before = 'title'; // move before this
  foreach($columns as $key => $value) {
    if ($key==$before){
      $n_columns[$move] = $move;
    }
      $n_columns[$key] = $value;
  }
  return $n_columns;
}

// Set columns width
function set_column_width() { ?>
	<style type="text/css">
		/*	Class ".column-img" is for image column */
		.edit-php .fixed .column-img { 
			width: 100px;
		}
	</style>
<?php }
add_action( 'admin_enqueue_scripts', 'set_column_width' );
/**
*
*
*
 * Allow shortcodes in widgets
 * @since v1.0
 */
add_filter('widget_text', 'do_shortcode');

if( !function_exists('symple_fix_shortcodes') ) {
	function symple_fix_shortcodes($content){   
		$array = array (
			'<p>['		=> '[', 
			']</p>'		=> ']', 
			']<br />'	=> ']'
		);
		$content = strtr($content, $array);
		return $content;
	}
	add_filter('the_content', 'symple_fix_shortcodes');
}

// Section Title Shortcode (Visual)
if(! function_exists('wr_vc_section_title_shortcode')){
	function wr_vc_section_title_shortcode($atts, $content = null){
		extract(shortcode_atts( array(
			'class'=>'',
			'id'=>'',
			'title'=>'',
			'title2'=>'',
			'color'=>'',
			'color2'=>'',
			'font_size'=>'',
			'font_size2'=>'',
			'font_weight'=>'',
			'font_weight2'=>'',
			'line_height'=>'',
			'text_align'=>'',
			'text_transform'=>'',			
			'float'=>'',					
			'margin'=>'',					
			'padding'=>'',	
			'margin2'=>'',					
			'padding2'=>'',							
			'animate'=>'',							
			'featyretype'=>'',							
			), $atts) );				
		$html='';					
		    $html .='<div class="sec-title animate-box '.$class.' '.$float.'" data-animate-effect="fadeInLeft">';
				if($title != '' || $title2 != '') {	
					if($title2 != '') {	
					    $html .='<span class="heading-meta" style="';
						if($margin2 != '') { $html .='margin:'.$margin2.';';} 
						if($padding2 != '') { $html .='padding:'.$padding2.';';}
						if($color2 != '') { $html .='color:'.$color2.';';}  				
						if($font_size2 != '') { $html .='font-size:'.$font_size2.';';}  
						if($font_weight2 != '') { $html .='font-weight:'.$font_weight2.';';} 
				        $html .='">'.$title2.'</span>';  
					} if($title != '') {	
					    if($featyretype == "st2"){
					    $html .='<h3 class="doro-about-heading" style="';
						if($margin != '') { $html .='margin:'.$margin.';';} 
						if($padding != '') { $html .='padding:'.$padding.';';}  				
						if($color != '') { $html .='color:'.$color.';';}  				
						if($font_size != '') { $html .='font-size:'.$font_size.';';}  				
						if($font_weight != '') { $html .='font-weight:'.$font_weight.';';}  				
						if($line_height != '') { $html .='line-height:'.$line_height.';';}  				
						if($text_align != '') { $html .='text-align:'.$text_align.';';}  				
						if($text_transform != '') { $html .='text-transform:'.$text_transform.';';}
						$html .='">'.$title.'</h3>';
						} else {
					    $html .='<h2 class="doro-heading" style="';
						if($margin != '') { $html .='margin:'.$margin.';';} 
						if($padding != '') { $html .='padding:'.$padding.';';}  				
						if($color != '') { $html .='color:'.$color.';';}  				
						if($font_size != '') { $html .='font-size:'.$font_size.';';}  				
						if($font_weight != '') { $html .='font-weight:'.$font_weight.';';}  				
						if($line_height != '') { $html .='line-height:'.$line_height.';';}  				
						if($text_align != '') { $html .='text-align:'.$text_align.';';}  				
						if($text_transform != '') { $html .='text-transform:'.$text_transform.';';} 				
						$html .='">'.$title.'</h2>';	
						}
					} 
				}														
			$html .='</div>';                
		return $html;
	}
	add_shortcode('wr_vc_section_title', 'wr_vc_section_title_shortcode');
}

// Section Content Shortcode (Visual)
if(! function_exists('wr_vc_section_text_shortcode')){
	function wr_vc_section_text_shortcode($atts, $content = null){
		extract(shortcode_atts( array(
			'class'=>'',
			'id'=>'',			
			'float'=>'',						
			'margin2'=>'',					
			'padding2'=>'',													
			'animate'=>'',													
			), $atts) );				
		$html='';		
		    $html .='<div class="sec-text animate-box '.$class.' '.$float.'" data-animate-effect="fadeInLeft" style="';
					if($margin2 != '') { $html .='margin:'.$margin2.';';} 
					if($padding2 != '') { $html .='padding:'.$padding2.';';}  				
			    $html .='">';
					if($content != '') {	
					$html .='<p>'.$content.'</p>';
					}				
			$html .='</div>';                
		return $html;
	}
	add_shortcode('wr_vc_section_text', 'wr_vc_section_text_shortcode');
}

// Section Image Shortcode (Visual)

if(! function_exists('wr_vc_section_image_shortcode')){
	function wr_vc_section_image_shortcode($atts, $content = null){
		extract(shortcode_atts( array(
			'class'=>'',
			'id'=>'',
			'width'=>'',
			'height'=>'',
			'margin'=>'',
			'padding'=>'',			
			'position'=>'',			
			'float'=>'',			
			'top'=>'',
			'bottom'=>'',
			'right'=>'',
			'left'=>'',
			'img_url'=>'',
			'link_url'=>'',
			'link_target'=>'',			
			'featyretype'=>'',
			'zindex'=>'',
			'animate'=>'',

			), $atts) );

		$html='';
			
			if(is_numeric($img_url)) {
				$doro_back_image = wp_get_attachment_url( $img_url );
				$doro_image_title = get_the_title( $img_url );
			} else {
				$doro_back_image = $img_url;
				$doro_image_title = $img_url;
			}			

			    $html .='<div class="sec-image '.$class.'">';	
                if($featyretype == "st2"){
					if($link_url != '') {	
						$html .='<a href="'.$link_url.'"';
							if($link_target != '') { $html .='target="'.$link_target.'"';}						
						$html .='>';
					}
					$html .='<img class="img-fluid mb-30 animate-box fadeInLeft animated" data-animate-effect="fadeInLeft" src="'.esc_url($doro_back_image).'" ';
						$html .='style="';
						if($width != '') { $html .='width:'.$width.';';}  				
						if($height != '') { $html .='height:'.$height.';';}  				
						if($float != '') { $html .='float:'.$float.';';}  				
						if($position != '') { $html .='position:'.$position.';';}  				
						if($top != '') { $html .='top:'.$top.';';}  				
						if($bottom != '') { $html .='bottom:'.$bottom.';';}  				
						if($right != '') { $html .='right:'.$right.';';}  				
						if($left != '') { $html .='left:'.$left.';';}  				
						if($zindex != '') { $html .='z-index:'.$zindex.';';}  				
						if($margin != '') { $html .='margin:'.$margin.';';} 
						if($padding != '') { $html .='padding:'.$padding.';';}
						$html .='"';
					$html .=' alt="'.esc_attr($doro_image_title).'" />';
					if($link_url != '') {
						$html .='</a>';
					}						
				} else {
					if($link_url != '') {	
						$html .='<a href="'.$link_url.'"';
							if($link_target != '') { $html .='target="'.$link_target.'"';}						
						$html .='>';
					}	
				    $html .='<img src="'.esc_url($doro_back_image).'" ';
					    $html .='style="';
						if($width != '') { $html .='width:'.$width.';';}  				
						if($height != '') { $html .='height:'.$height.';';}  				
						if($float != '') { $html .='float:'.$float.';';}  				
						if($position != '') { $html .='position:'.$position.';';}  				
						if($top != '') { $html .='top:'.$top.';';}  				
						if($bottom != '') { $html .='bottom:'.$bottom.';';}  				
						if($right != '') { $html .='right:'.$right.';';}  				
						if($left != '') { $html .='left:'.$left.';';}  				
						if($zindex != '') { $html .='z-index:'.$zindex.';';}  				
						if($margin != '') { $html .='margin:'.$margin.';';} 
						if($padding != '') { $html .='padding:'.$padding.';';}
						$html .='"';
					$html .=' alt="'.esc_attr($doro_image_title).'" class="img-responsive"/>';
					if($link_url != '') {
						$html .='</a>';
					}	
				}	
				$html .='</div>';			
                
		return $html;
	}
	add_shortcode('wr_vc_section_image', 'wr_vc_section_image_shortcode');
}

// Blog Section 
if(! function_exists('wr_vc_blog_shortcode')){
	function wr_vc_blog_shortcode($atts, $content = null){
		extract(shortcode_atts( array(
			'class'=>'',
            'categoryname'=>'',
            'showpost'=>'',		
	    ), $atts) );			
	$html='';	


	$html .= '<div class="sec-blog doro-blog '.esc_attr($class).'">';		
	    $html .= '<div class="row">';
		
		global $post, $blog_image, $blog_image_alt;
		$paged=(get_query_var('paged'))?get_query_var('paged'):1;
		$loop = new WP_Query( array( 'post_type' => 'post','category_name'=> $categoryname, 'posts_per_page'=> $showpost) ); while ( $loop->have_posts() ) : $loop->the_post();			
			if (has_post_thumbnail( $post->ID ) ):		
			$blog_image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'blog_blog_image' );
			$blog_image_alt = get_post_meta( get_post_thumbnail_id( $post->ID ), '_wp_attachment_image_alt', true);				
				$html .= '<div class="col-md-4 col-sm-4">';
					$html .='<div class="blog-entry animate-box" data-animate-effect="fadeInLeft">';
						$html .='<a href="'.get_the_permalink().'"  class="blog-img"><img src="'.esc_url($blog_image[0]).'" alt="'.esc_attr($blog_image_alt).'"  class="img-fluid" /></a>';
						$html .='<div class="desc">';
							$html .= '<span>'.get_the_date( get_option( 'date_format' ) ).' | '.get_the_category_list(', ').' </span>';
							$html .= '<h3><a href="'.get_the_permalink().'">'.get_the_title().'</a></h3>';
							$html .='<p>';									
								$html .=get_the_excerpt();							
							$html .='</p>';								
						$html .= '</div>';	
					$html .= '</div>';	
				$html .= '</div>';					
				
			endif;			
		endwhile;
		wp_reset_postdata();

	    $html .='</div>';
	$html .='</div>';
	
    return $html;		         				
	}
	add_shortcode('wr_vc_blog', 'wr_vc_blog_shortcode');
}


// Protfolio Section Shortcode (Visual)
 if(! function_exists('wr_vc_portfolio_body_shortcode')){
	function wr_vc_portfolio_body_shortcode($atts, $content = null){
		extract(shortcode_atts( array(
			'class'=>'',
			'id'=>'',	
			'postcount'=>'',
			'categoryname'=>'',
			'postoffset'=>'',
			'animate'=>'',
			
			), $atts) );
		$html='';
		
        $html .= '<div class="sec-port-vc '.$class.'">';
        $html .= '<div class="row">';

			global $post;			
			$paged=(get_query_var('paged'))?get_query_var('paged'):1;
			$loop = new WP_Query( array( 'post_type' => 'portfolio', 'portfolio_category'=> $categoryname, 'posts_per_page'=> $postcount, 'orderby' => 'post_date', 'showposts' => $postcount, 'offset' => $postoffset ) );			
			while ( $loop->have_posts() ) : $loop->the_post();
			
			$portfolio_category = wp_get_post_terms($post->ID,'portfolio_category');
			$doro_class = ""; 
			$doro_categories = ""; 
			foreach ($portfolio_category as $doro_item) {
				$doro_class.=esc_attr($doro_item->slug . ' ');
				$doro_categories.='<span class="cat-divider">';
				$doro_categories.=esc_attr($doro_item->name . '  ');
				$doro_categories.='</span>';
			}	
			
				$html .= '<div class="col-md-6 animate-box" data-animate-effect="fadeInLeft">';
                    if (has_post_thumbnail( $post->ID ) ):		
				    $doro_image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), '' );
                    $doro_image_alt = get_post_meta( get_post_thumbnail_id( $post->ID ), '_wp_attachment_image_alt', true);
					
					$html .= '<a href="';
					$html .= get_the_permalink();
					$html .= '" class="desc">';	
			            $html .= '<div class="project">';
							$html .='<img src="';
								$html .= $doro_image[0];
							$html .= '"  class="img-fluid" alt="'.esc_attr($doro_image_alt).'" />';
							$html .= '<div class="desc">';
								$html .= '<div class="con">';
									$html .= '<h3>';
										$html .=get_the_title();
									$html .= '</h3>';		
									$html .= '<span>';
										$html .= $doro_categories;							
									$html .= '</span>';							
								$html .= '</div>';	
					        $html .= '</div>';	
					    $html .= '</div>';	
					$html .= '</a>';					
					endif;					
			    $html .= '</div>';										
			
			endwhile;
			wp_reset_query();				
		$html .= '</div>';	
		$html .= '</div>';	
		
		return $html;
	}
	add_shortcode('wr_vc_portfolio', 'wr_vc_portfolio_body_shortcode');
}	

// Icon Section Shortcode (Visual)
if(! function_exists('wr_vc_icon_shortcode')){
	function wr_vc_icon_shortcode($atts, $content = null){
		extract(shortcode_atts( array(
			'class'=>'',
			'title'=>'',
			'color'=>'',
			'icon_color'=>'',
			'font_size'=>'',
			'font_weight'=>'',
			'line_height'=>'',
			'text_transform'=>'',							
			'float'=>'',					
			'margin'=>'',					
			'padding'=>'',	
			'icon_name'=>'',																
			'link_url'=>'',						
			'link_target'=>'',
			'animate'=>'',																					
			), $atts) );
        $html='';
		    $html .='<div class="sec-icon '.$class.' " style="';
				if($margin != '') { $html .='margin:'.$margin.';';} 
				if($padding != '') { $html .='padding:'.$padding.';';} 
			$html .='">'; 

				$html .='<div class="doro-feature animate-box" data-animate-effect="fadeInLeft">'; 			
							
					if($icon_name != '') { 		
						$html .='<div class="doro-icon"> <span class="'.$icon_name.' font-35px" style="';
						    if($icon_color != '') { $html .='color:'.$icon_color.';';}  
						$html .='"></span> </div>'; 
					}	
					$html .='<div class="doro-text">'; 		
						if($link_url != '') { 				
							$html .='<a href="'.$link_url.'" target="'.$link_target.'">';
						}
							if($title != '') {
							$html .='<h3 style="';				
								if($color != '') { $html .='color:'.$color.';';}  				
								if($font_size != '') { $html .='font-size:'.$font_size.';';}  				
								if($font_weight != '') { $html .='font-weight:'.$font_weight.';';}  				
								if($line_height != '') { $html .='line-height:'.$line_height.';';}
								if($text_transform != '') { $html .='text-transform:'.$text_transform.';';}
							$html .='">';
								$html .=''.$title.'';
							$html .='</h3>';
							}	
						if($link_url != '') { 	
							$html .='</a>';					
						} 
						if($content != '') {	            		
							$html .='<p>'.$content.'</p>'; 
						}
					$html .='</div>';				
				$html .='</div>';							
            $html .='</div>';  		
			
		return $html;
	}
	add_shortcode('wr_vc_icon', 'wr_vc_icon_shortcode');
}
// Contact Info (Visual)
if(! function_exists('wr_vc_contact_info_shortcode')){
	function wr_vc_contact_info_shortcode($atts, $content = null){
		extract(shortcode_atts( array(
			'class'=>'',
			'id'=>'',
			'address_title'=>'',
			'con_phone'=>'',
			'con_mail1'=>'',
			'con_mail2'=>'',
			'con_mail3'=>'',			
			'animate'=>'',			
			),  $atts) );
		$html='';
		$html .='<div class="sec-contact-info '.$class.'">';            
		    $html .='<div class="animate-box" data-animate-effect="fadeInLeft">';            

				if($con_phone != '') {
				$html .='<p><i class="et-phone"></i> '.$con_phone.' </p>';
				}				
				if($con_mail1 != '' || $con_mail2 != '' || $con_mail3 != '') {
				$html .='<p><i class="et-envelope"></i> ';
					$html .='<a target="_blank" href="mailto:'.$con_mail1.'">'.$con_mail1.'</a>';
					if($con_mail2 != '') {	
					$html .=' , <a target="_blank" href="mailto:'.$con_mail2.'">'.$con_mail2.'</a>';
					} if($con_mail3 != '') {				
					$html .=' , <a target="_blank" href="mailto:'.$con_mail3.'">'.$con_mail3.'</a>';
					}		
				$html .='</p>'; 			
				}                
				if($address_title != '') {	            		
				$html .='<p><i class="et-map-pin"></i> '.$address_title.'</p>';
				}

           $html .='</div>'; 
        $html .='</div>'; 
        return $html;						
	}
	add_shortcode('wr_vc_contact_info', 'wr_vc_contact_info_shortcode');
}

// Contact Form (Visual)
if(! function_exists('wr_vc_contact_shortcode')){
	function wr_vc_contact_shortcode($atts, $content = null){
		extract(shortcode_atts( array(
			'class'=>'',
			'contactfromid'=>'',
			'animate'=>'',
			), $atts) );

		$html='';	
			$html .='<div class="sec-contact-form '.$class.'">'; 
			    $html .='<div class="custom-form row">'; 	
				$html .='<div class="animate-box" data-animate-effect="fadeInLeft">';   
					$html .=''.do_shortcode('[contact-form-7 id="'.$contactfromid.'" title="Contact Form"]').'';
				$html .='</div>'; 			
				$html .='</div>'; 			
			$html .='</div>'; 				
		return $html;	
	}
	add_shortcode('wr_vc_contact_form', 'wr_vc_contact_shortcode');
}

// Google Map
if(! function_exists('wr_vc_map_shortcode')){
	function wr_vc_map_shortcode($atts, $content = null){
		extract(shortcode_atts( array(
			'class'=>'',
			'id'=>'',
			'image'=>'',
			'latitude'=>'',
			'animate'=>'',
			'address'=>'',

			), $atts) );
		if(is_numeric($image)) {
            $doro_image = wp_get_attachment_url( $image );
        } else {
            $doro_image = $image;
        }		
		$html='';
		$dot="'";
		$html .= '<div class="map-container map-section">
		            <div class="animate-box" data-animate-effect="fadeInLeft">
					    <div id="map-single" class="map" data-latlog="['.$latitude.']" data-popuptext="'.$address.'"  data-popupicon="'.$doro_image.'"></div>	
					</div>
				</div>';		
		
		wp_enqueue_script( 'map-min' );	
        wp_enqueue_script( 'map-script' );		
		return $html;
	}
	add_shortcode('wr_vc_map', 'wr_vc_map_shortcode');
}

?>