<?php

$args = array(
    	'class'=>'',
		'image'=>'',
		'title'=>'',
		'title2'=>'',
		'button_url'=>'',
		'button_target'=>'',			
);
extract(shortcode_atts($args, $atts));

$html = "";

	if(is_numeric($image)) {
		$doro_image = wp_get_attachment_url( $image );
		$doro_title = get_the_title( $image );
	}else {
		$doro_image = $image;
		$doro_title = $image;
	}	
	
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

	$html .='<div class="sec-team '.$class.' ">'; 
		$html .='<div class="team">'; 
			if(is_numeric($image)) {
			$html .= '<img src="'.esc_url($doro_image).'" class="img-fluid" alt="'.esc_attr($doro_title).'" />';
			}
		    
			$html .= '<div class="desc">';    
			    $html .= '<div class="con">';  
				if($title != '') {	
			       $html .= '<h3>';  
				   if($button_url != '') {	
			       $html .= '<a href="'.$button_url.'"  target="'.$link_target_opt.'">';  
			       $html .= ''.$title.'';  
			       $html .= '</a>';  
				   } else {
				   $html .= ''.$title.'';     
				   }
			       $html .= '</h3> ';  
				}  if($title2 != '') {	 
			       $html .= ' <span>'.$title2.'</span>';  
				}
					$html .= '<p class="icon"> ';
						$html .= do_shortcode($content);
					$html .= '</p>';
		        $html .= '</div>';
		    $html .= '</div>';
		$html .= '</div>';
	$html .= '</div>';

echo $html;