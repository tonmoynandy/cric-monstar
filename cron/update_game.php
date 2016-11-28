<?php


	   require_once 'simple_html_dom.php';
	   include('cron_function.php');  
	 
	   
	  
	function update_game(){
		
		$url  = 'http://synd.cricbuzz.com/j2me/1.0/livematches.xml';
		$html = get_content($url);
		$html =str_get_html($html);
		if($html){
			foreach($html->find('match') as $match){
				$series_name = trim(stripslashes($match->attr['srs']));
				$play_name = trim(stripslashes($match->attr['mnum']));
				$match_type = trim(stripslashes($match->attr['type']));
				$season_arr = explode(',', $series_name);
				
				//$season_name = trim($season_arr[end( array_keys($season_arr) )]);
				 $sea_index = @end( array_keys($season_arr) );
				$season_name = trim($season_arr[0]);
				$match_data_path = trim($match->attr['datapath']);
				$match_ground = '';
				if(array_key_exists('grnd', $match->attr)){
					$match_ground = trim(stripslashes($match->attr['grnd']));
				}
				$first_team ='';$sec_team='';
				if(count($match->find('Tm'))>0){
				   $first_team = strtoupper(trim(stripslashes($match->find('Tm',0)->attr['sname'])));
				   $sec_team  = strtoupper(trim(stripslashes($match->find('Tm',1)->attr['sname'])));
				}echo $first_team.'<><><>'.$sec_team.'<br/>';
				$start_date ='';$end_date ='';
				if(count($match->find('Tme'))>0){
					$start_date = date('Y-m-d', strtotime( $match->find('Tme',0)->attr['dt'] ));
					$end_date = date('Y-m-d', strtotime( $match->find('Tme',0)->attr['enddt'] ));
				}
				
				
				$ser_query='SELECT * FROM cric_series WHERE s_name = "'.$series_name.'"';
				if(num_rows($ser_query)>0){
					   
						$record = row_array($ser_query);
						$ser_id = $record['id'];
				
				
					    $query1='SELECT * FROM cric_game WHERE series_id = "'.$ser_id.'" and play_name LIKE "%'.$play_name.'%"';
						$game_insert = array(
												'series_id'=>$ser_id,
												'play_name'=>$play_name,
												'play_slug'=>url_title(strtolower(trim($series_name.'-'.$play_name.'-'.$first_team.'-'.$sec_team))),
												'play_type' => $match_type,
												'play_data_link' =>$match_data_path,
												'first_team_name'=>$first_team,
												'last_team_name'=>$sec_team,
												'play_start_date'=>$start_date,
												'play_end_date'=>$end_date
												);
						if(num_rows($query1)>0){
							$record1= row_array($query1);
							$play_id = $record1['play_id']; 
							
						    $where= array('play_id'=>$play_id);
							$last_id = updateData('cric_game',$where,$game_insert);
							
						}else{
							insertData('cric_game',$game_insert);
						}
				}else{
					$serise_dtials= array(
										"s_name"=>trim($series_name),
										"series_slug"=>url_title(strtolower(trim($series_name))),
										"start_date"=>date("Y-m-d",strtotime("-10 days")),
										"end_date"=>date("Y-m-d",strtotime("+10 days")),
											);
					$last_s_id = insertData('cric_series',$serise_dtials);
					$game_insert = array(
												'series_id'=>$last_s_id,
												'play_name'=>$play_name,
												'play_slug'=>url_title(strtolower(trim($series_name.'-'.$play_name.'-'.$first_team.'-'.$sec_team))),
												'play_type' => $match_type,
												'play_data_link' =>$match_data_path,
												'play_ground'=> $match_ground,
												'first_team_name'=>$first_team,
												'last_team_name'=>$sec_team,
												'play_start_date'=>$start_date,
												'play_end_date'=>$end_date
												);
					insertData('cric_game',$game_insert);
				}
				
				$path = $match_data_path;
				$path = rtrim($path,'/');
				$path_arr = explode('/', $path);
				$path_arr = array_slice($path_arr,-3,3,TRUE);
				$url_str ='';
				foreach($path_arr as $p){
					$url_str .=$p.'/';
				}
				
				$url  = 'http://synd.cricbuzz.com/dinamalar/data/'.$url_str.'scores.xml';
				$html = get_content($url);
				$game_slug = url_title(strtolower(trim($series_name.'-'.$play_name.'-'.$first_team.'-'.$sec_team)));
				file_put_contents('../game/'.$game_slug.'.xml', $html);
				echo $play_name.'<><>'.$match_ground.'<><>'.$match_type.'<br/>';			   
			}
		}
	}

   // run mysql connect 
   mysqlConnect();
   // end //
   
//update_game();
update_game();
updateCronDate('Game');



