<?php
date_default_timezone_set("GMT");
define('SERVER_ABSOLUTE_PATH',      'C:/xampp/htdocs/cric/');
  define('SERVERTYPE', 'local');
  //define('SERVERTYPE', 'up');
  
  function mysqlConnect(){
  	
  	if(SERVERTYPE == 'local'){
	   		$host = 'localhost';
			$user = 'root';
			//$pass = 'mysql';
			$pass ='';
			$db = 'cricstar';
	}
	else if(SERVERTYPE == 'up'){
		    $host = 'mysql12.000webhost.com';
			$user = 'a3175433_cric';
			$pass = 'a3175433_cric';
			$db = 'a3175433_cric';
	} 
		   	 $con = mysql_connect($host,$user,$pass);
			 mysql_select_db($db,$con);
	   }
	   function insertData($table='',$arr=array()){
	   	  $str ='Insert into '.$table.' set ';
		  foreach($arr as $field=>$data){
		  	 $str .= $field .'="'.$data.'",';
		  }
		  $str =rtrim($str,',');
		  mysql_query($str);
		  return mysql_insert_id();
	   }
	   
	   function updateData($table='',$where=array(),$arr=array()){
	   	  $str ='Update '.$table.' set ';
		  foreach($arr as $field=>$data){
		  	 $str .= $field .'="'.$data.'",';
		  }
		  $str =rtrim($str,',');
		  if(!empty($where)){
		  	$str .= ' where ';
		  	foreach ($where as $field=>$data){
		  		$field_arr = explode('@', $field);
				$field_name ='';$operater ='';
				if(count($field_arr)>1){
					$field_name = $field_arr[1];
					$operater = $field_arr[0];
				}
		  		$str .= $operater.' '.$field.' = "'.$data.'" ';
		  	}
		  }
		  mysql_query($str);
		  
	   }
	   
	   
	   function num_rows($query){
	   	
	   		$num_row =0;
	   	  if($query){
	   	  	 $q = mysql_query($query);
			 $num_row= mysql_num_rows($q);
	   	  }
		  
		  return $num_row;
	   }
	   function row_array($str){
	   	$data= array();
	   	  if($str){
	   	  	  $query =mysql_query($str);
			  //if(num_rows($str)>0)
			  {
				 $data = mysql_fetch_assoc($query); 	
			  }
	   	  }
		  return $data;
	   }
	   function url_title($str){
	   	   $str = str_replace(' ', '-', $str);
		   $str = str_replace('_', '-', $str);
		   $str = str_replace(',', '-', $str);
		   $str = str_replace('--', '-', $str);
		   return $str;
	   }
	   

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
		
	function updateCronDate($type){
		if($type=='Serise'){
			$str = 'Update cric_cron_update set last_update_serise_date = "'.date('Y-m-d H:i:s').'"';
			mysql_query($str);
		}else if($type=='Game'){
			$str = 'Update cric_cron_update set last_update_game_date = "'.date('Y-m-d H:i:s').'"';
			mysql_query($str);
		}
		else if($type=='Score'){
			$str = 'Update cric_cron_update set update_score = "'.date('Y-m-d H:i:s').'"';
			mysql_query($str);
		}
		else if($type=='news'){
			$str = 'Update cric_cron_update set update_news = "'.date('Y-m-d H:i:s').'"';
			mysql_query($str);
		}
	}
	
	
	function pr($array,$flug=1){
		if($flug==0){
			echo "<pre>";
			print_r($array);
			echo "</pre>";
		}else if($flug==1){
			echo "<pre>";
			print_r($array);
			echo "</pre>";
			exit;
		}
	}
