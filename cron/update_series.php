<?php


	   require_once 'simple_html_dom.php';
	   include('cron_function.php');  
	 
	   
	   // for every 3 monthes
	   
	   function update_series(){
	   	
		
	   	$url  = 'http://synd.cricbuzz.com/dinamalar/data/series-schedule.xml';
		$html = get_content($url);
		$html =str_get_html($html);
		if($html){
			$schedule = $html->find('schedule');
			//echo count($schedule[0]->find('series'));
			//die;
			//echo "<pre>";
			//print_r($schedule[0]);
			//die;
			foreach($schedule[0]->find('series') as $ser){
				$series_title  = $ser->find('title');
				$series_title =$series_title[0]->xmltext;
				$start_date = $ser->find('match',0);
				$start_date =$start_date->find('startdate');
				$start_date = trim($start_date[0]->xmltext);
				$start_date_arr = explode(' ', $start_date);
				$start_date = $start_date_arr[2].'-'.$start_date_arr['0'].'-'.$start_date_arr[1];
				
				$end_date = $ser->find('match', end(array_keys($ser->find('match')))) ;
				$end_date = $end_date->find('enddate');
				$end_date = trim($end_date[0]->xmltext);
				$end_date_arr = explode(' ', $end_date);
				$end_date = $end_date_arr[2].'-'.$end_date_arr['0'].'-'.$end_date_arr[1];
				
				$team1 = $ser->find('match',0)->find('team1');
				$team1 =$team1[0]->xmltext;
				$str ="select * from cric_team where team_name='".$team1."'";
				$team1_data = row_array($str);
				$team1 = $team1_data['team_s_name'];
				
				$team2 = $ser->find('match',0)->find('team2');
				$team2 =$team2[0]->xmltext;
				$str ="select * from cric_team where team_name='".$team2."'";
				$team2_data = row_array($str);
				$team2 = $team2_data['team_s_name'];
				
				$season = $start_date_arr[2];
				if($start_date_arr[2]!=$end_date_arr[2]){
					$season =$start_date_arr[2].'-'.substr($end_date_arr[2], 2,2);
				}
				
				$query='SELECT * FROM cric_series WHERE s_name="'.$series_title.'" ';
				if(num_rows($query)==0){
					$insert_arr=array(
					   's_name' =>trim(addslashes($series_title)),
					   'series_slug' => url_title(strtolower(trim($series_title))),
					   's_first_team_name'=>trim(addslashes($team1)),
					   's_last_team_name'=>trim(addslashes($team2)),
					   'start_date'=>$start_date,
					   'end_date'=>$end_date,
					   's_season'=>$season
					);
					$ser_id =insertData('cric_series',$insert_arr);
					echo "<pre>";
					print_r($insert_arr);
					echo '</pre>';
				
				
					foreach($ser->find('match') as $mat){
						$series_id = $ser_id;
						$play_name = $mat->find('desc');
						$play_name = $play_name[0]->xmltext;
					
						
						
						$team1 = $mat->find('team1');
						$team1 =trim($team1[0]->xmltext);
						$q2 = "SELECT team_s_name FROM cric_team WHERE team_name LIKE '%".$team1."%'";
						IF(num_rows($q2)>0){
							$r2 = row_array($q2);
							$team1 =$r2['team_s_name'];
						}
						//$team1 = $this->getFieldValue('cric_team','team_s_name',array('team_name'=>$team1));
						
						$team2 = $mat->find('team2');
						$team2 =trim($team2[0]->xmltext);
						//$team2 = $this->getFieldValue('cric_team','team_s_name',array('team_name'=>$team2));
						$q3 = "SELECT team_s_name FROM cric_team WHERE team_name LIKE '%".$team2."%'";
						IF(num_rows($q3)>0){
							$r3 = row_array($q3);
							$team2 =$r3['team_s_name'];
						}
						
						
						$gmt_time = $mat->find('starttimeGMT');
						$gmt_time = $gmt_time[0]->xmltext;
						
						$ist_time = $mat->find('starttimeIST');
						$ist_time = $ist_time[0]->xmltext;
						
						
						$start_date =$mat->find('startdate');
						$start_date = trim($start_date[0]->xmltext);
						$start_date_arr = explode(' ', $start_date);
						$start_date = $start_date_arr[2].'-'.$start_date_arr['0'].'-'.$start_date_arr[1];
						
						
						$end_date = $mat->find('enddate');
						$end_date = trim($end_date[0]->xmltext);
						$end_date_arr = explode(' ', $end_date);
						$end_date = $end_date_arr[2].'-'.$end_date_arr['0'].'-'.$end_date_arr[1];
						
						$play_ground = $mat->find('venue');
						$play_ground = $play_ground[0]->xmltext;
					   
					   $game_insert_arr = array(
					   						'series_id'=>$series_id,
					   						'play_name'=>$play_name,
					   						'play_slug'=>url_title(strtolower(trim($series_title.'-'.$play_name.'-'.$team1.'-'.$team2))),
					   						'first_team_name'=>$team1,
					   						'last_team_name'=>$team2,
					   						'play_ground'=>$play_ground,
					   						'play_start_date'=>$start_date,
											'play_end_date'=>$end_date,
											'gmt_time'=>$gmt_time,
											'ist_time'=>$ist_time
					   							);	
					  /**/echo "<pre>";
					  print_r($game_insert_arr);
					  echo '</pre>';
					  
					 	insertData('cric_game',$game_insert_arr);
					}
				}
			}
		}
	   }

    //for every day
       // run mysql connect 
   mysqlConnect();
   // end //
   
//update_game();
update_series();
updateCronDate('Serise');
