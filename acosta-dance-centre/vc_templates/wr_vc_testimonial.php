<?php

$args = array(
		'button_text'=>'twitter',
		'button_url'=>'',
		'button_target'=>'',
		
);

extract(shortcode_atts($args, $atts));

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

		if($button_text != ""){
		$html .= '<span><a href="'.$button_url.'" target="'.$link_target_opt.'"><i class="ti-'.$button_text.'"></i></a></span> ';
		}

echo $html;