<?php


	   require_once 'simple_html_dom.php';
	   include('cron_function.php');  
	 
	   
	  
	function update_score(){
		
		$date = '';
		$str = "SELECT G.*,S.s_name as series_name  FROM cric_game as G LEFT JOIN cric_series as S ON G.series_id=S.id WHERE G.play_start_date<= '".date('Y-m-d')."' and G.play_end_date >= '".date('Y-m-d')."'  ";
		$query = mysql_query($str);
		
		//foreach($html->find('match') as $match){
		while($html = mysql_fetch_assoc($query)){
				
						$match_data_path = trim($html['play_data_link']);
						$path = $match_data_path;
						$path = rtrim($path,'/');
						$path_arr = explode('/', $path);
						$path_arr = array_slice($path_arr,-3,3,TRUE);
						$url_str ='';
						foreach($path_arr as $p){
							$url_str .=$p.'/';
						}
						
						$url  = 'http://synd.cricbuzz.com/dinamalar/data/'.$url_str.'scores.xml';
						$game_html = get_content($url);
						$series_name = trim(stripslashes($html['series_name']));
						$play_name = trim(stripslashes($html['play_name']));
						$first_team ='';$sec_team='';
					
					   $first_team = strtoupper(trim(stripslashes($html['first_team_name'])));
					   $sec_team  = strtoupper(trim(stripslashes($html['last_team_name'])));
					
						$game_slug = url_title(strtolower(trim($series_name.'-'.$play_name.'-'.$first_team.'-'.$sec_team)));
						echo $game_slug.'<br/>';
						file_put_contents('../game/'.$game_slug.'.xml', $game_html);
				}
			
		
	}

   // run mysql connect 
   mysqlConnect();
   // end //   
   //update_game();
  update_score();
updateCronDate('Score');



