<?php

function get_content($url,$proxy='') 
{ 
	$ch = curl_init(); 
	
	curl_setopt ($ch, CURLOPT_URL, $url); 
	curl_setopt($ch, CURLOPT_PROXY, $proxy);
	curl_setopt ($ch, CURLOPT_HEADER, 0); 
	
	ob_start(); 
	
	curl_exec ($ch); 
	curl_close ($ch); 
	$string = ob_get_contents(); 
	
	
	ob_end_clean(); 
	
	return $string; 

}
			
if(!function_exists('pr')){
	function pr($arr=array(),$continue=1){
		if(is_array($arr)){
			echo '<pre>';
			print_r($arr);
			echo '</pre>';
		}else{
			echo '<pre>';
			echo $arr;
			echo '</pre>';
		}
		if($continue==1){
			die;
		}
		
	}
}

function getGameUri($url){
   $uri = $url;
   $uri = str_replace(API_URL.'j2me/1.0/match','',$uri);
   $uri = strtolower($uri);
   return $uri;
}
