<?php

class Doro_AfterSetupTheme{
		
	static function return_thme_option($string,$str=null){
		global $doro;
		if($str!=null)
		return isset($doro[''.$string.''][''.$str.'']) ? $doro[''.$string.''][''.$str.''] : null;
		else
		return isset($doro[''.$string.'']) ? $doro[''.$string.''] : null;
	}	
	
}
?>