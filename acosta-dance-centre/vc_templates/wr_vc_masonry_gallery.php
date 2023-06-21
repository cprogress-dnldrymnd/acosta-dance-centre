<?php

$args = array(
	'class'=>'',
	'image'=>'',
	'doro_load_more_button'=>'',
	'postload'=>'6',
	'doro_gallery_column'=>'',
	
);

$html = "";

extract(shortcode_atts($args, $atts));
$ids  = $atts['image'];
$ids  = explode(',', $ids);
	$html='';
	$dot="'";
	$html_column='';
	if($doro_gallery_column == "st2"){
		$html_column='col-6 col-md-6';
	}
	else if($doro_gallery_column == "st3"){
	    $html_column='col-6 col-md-3';
	}
	else if($doro_gallery_column == "st4"){
	    $html_column='col-12 col-md-12';		
	} else {
		$html_column='col-6 col-md-4';
	}
	$html .= '<div class="container-after-gallery sec-gallery '.esc_attr($class).'">';
	$html .= '<div class="row mb-4 isotope-items-wrap  no-hide-last loadmore-wrapper-gallery" data-load-item="'.esc_attr($postload).'">';
			foreach ($ids as $id) {
			$doro_image = wp_get_attachment_image_src($id, '');
			$doro_image_alt = get_the_title( $id, '' );
			$doro_image_cap = wp_get_attachment_caption( $id, '' );
			$html .= '<div class=" '.esc_attr($html_column).' gallery-item isotope-item " >';
			$html .= '<figure><a href="'.esc_url($doro_image[0]).'" class="d-block mb-4" data-caption="'.esc_attr($doro_image_cap).'" data-fancybox="images"> <img src="'.esc_url($doro_image[0]).'" alt="'.esc_attr($doro_image_alt).'" class="img-fluid">
            </a></figure>';
			$html .= '</div>';
			}			
		$html .= '</div>';
		$html .= '</div>';
		if($doro_load_more_button == "st2"){
			if ( is_search( 'post' ) ) {
			}
			else {
				wp_enqueue_script('isotope');
				wp_enqueue_script('imagesloaded');
				wp_enqueue_script('fancyboxs');
				wp_enqueue_script( 'doro-loadmore' );
			}
		}
		else {
			wp_enqueue_script('isotope');
			wp_enqueue_script('imagesloaded');
			wp_enqueue_script('fancyboxs');
		}
		
echo $html;