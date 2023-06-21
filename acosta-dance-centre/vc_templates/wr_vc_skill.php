<?php

$args = array(
		'title'=>'',	
		'color'=>'',
		'font_size'=>'',
		'font_weight'=>'',
		'line_height'=>'',
		'text_align'=>'',
		'text_transform'=>'',			
		'image'=>'',		
		'video'=>'',	
		'button_url'=>'',
		'button_target'=>'',	
);

extract(shortcode_atts($args, $atts));
if(is_numeric($image)) {
            $doro_image = wp_get_attachment_url( $image );
        } else {
            $doro_image = $image;
        }
$html = '';

	$link_target_opt ='';
	if($button_target == "_blank"){
	$link_target_opt .='_blank';
	}
	else if($button_target == "_parent"){
	$link_target_opt .='_parent';
	}
	else if($button_target == "_top"){
	$link_target_opt .='_top';
	}
	else {
	$link_target_opt .='_self';
	}

    if($video != '') {
					
	$html .='<li>';			
		$html .= '<div class="overlay-video">
					<video playsinline autoplay loop muted poster="'.esc_url($doro_image).'">
						<source src="'.esc_url($video).'" type="video/mp4">
					</video>						
				</div> ';
			$html .= '<div class="overlay-color"></div>';
		$html .= '<div class="container-fluid">';
			$html .= '<div class="row">';
				$html .= '<div class="col-md-12 js-fullheight slider-text">';
					$html .= '<div class="slider-text-inner">';
						$html .= '<div class="desc">';
						if($title != '') {	
							$html .='<h1 style="';				
							if($color != '') { $html .='color:'.$color.';';}  				
							if($font_size != '') { $html .='font-size:'.$font_size.';';}  				
							if($font_weight != '') { $html .='font-weight:'.$font_weight.';';}
							if($line_height != '') { $html .='line-height:'.$line_height.';';}
							if($text_align != '') { $html .='text-align:'.$text_align.';';}  				
							if($text_transform != '') { $html .='text-transform:'.$text_transform.';';}
							$html .='">'.$title.'</h1>';													
						}									
						$html .= '</div>';
					$html .= '</div>';
				$html .= '</div>';
			$html .= '</div>';
		$html .= '</div>';
	$html .= '</li>';	
	} else {		
	    if(is_numeric($image)) {		
			$html .='<li style="background-image: url('.$doro_image.');">';	
				if($button_url != ""){
				$html .= '<a href="'.$button_url.'" target="'.$link_target_opt.'">';
				}		
				$html .= '<div class="overlay"></div>';
				$html .= '<div class="container-fluid">';
					$html .= '<div class="row">';
						$html .= '<div class="col-md-12 js-fullheight slider-text">';
							$html .= '<div class="slider-text-inner">';
								$html .= '<div class="desc">';
								if($title != '') {	
									$html .='<h1 style="';				
									if($color != '') { $html .='color:'.$color.';';}  				
									if($font_size != '') { $html .='font-size:'.$font_size.';';}  				
									if($font_weight != '') { $html .='font-weight:'.$font_weight.';';}
									if($line_height != '') { $html .='line-height:'.$line_height.';';}
									if($text_align != '') { $html .='text-align:'.$text_align.';';}  				
									if($text_transform != '') { $html .='text-transform:'.$text_transform.';';}
									$html .='">'.$title.'</h1>';													
								}									
								$html .= '</div>';
							$html .= '</div>';
						$html .= '</div>';
					$html .= '</div>';
				$html .= '</div>';
				if($button_url != ""){
				$html .= '</a>';
				}				
			$html .= '</li>';
	   }
	
	}	
	
echo $html;