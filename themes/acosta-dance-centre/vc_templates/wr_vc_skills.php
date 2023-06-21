<?php
$args = array(
    	'class'=>'',		
    	'slider_speed'=>'5000',		
    	'slider_slideshow'=>'true',		
);
$html = "";
extract(shortcode_atts($args, $atts));
$html .= '<div class="sec-slider '.$class.'" >'; 
    $html .= '<aside id="doro-hero" class="js-fullheight">';
        $html .= '<div class="flexslider js-fullheight" data-slider-speed="'.$slider_speed.'" data-slider-slideshow="'.$slider_slideshow.'">';
            $html .= '<ul class="slides">';
		        $html .= do_shortcode($content);
	        $html .='</ul>';
	    $html .='</div>';
	$html .='</aside>';
$html .= '</div>';

wp_enqueue_script( 'flexslider-min' );	
wp_enqueue_script( 'flexslider-script' );	
echo $html;