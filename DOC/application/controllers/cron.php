<?php

class Cron extends  CI_Controller
{
	   function __construct(){
		parent ::__construct();
		$this->load->library('simple_html_dom');
		$this->load->helper('common_helper');
	   }
	   
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
				$team1 = $this->getFieldValue('cric_team','team_s_name',array('team_name'=>$team1));
				
				$team2 = $ser->find('match',0)->find('team2');
				$team2 =$team2[0]->xmltext;
				$team2 = $this->getFieldValue('cric_team','team_s_name',array('team_name'=>$team2));
				
				$season = $start_date_arr[2];
				if($start_date_arr[2]!=$end_date_arr[2]){
					$season =$start_date_arr[2].'-'.substr($end_date_arr[2], 2,2);
				}
				$this->db->where('s_name',$series_title);
				$this->db->select('id');
				$query=$this->db->get('cric_series');
				if($query->num_rows()==0){
					$insert_arr=array(
					   's_name' =>trim(addslashes($series_title)),
					   'series_slug' => url_title(strtolower(trim($series_title))),
					   's_first_team_name'=>trim(addslashes($team1)),
					   's_last_team_name'=>trim(addslashes($team2)),
					   'start_date'=>$start_date,
					   'end_date'=>$end_date,
					   's_season'=>$season
					);
					$this->db->insert('cric_series',$insert_arr);
					$ser_id = $this->db->insert_id();
					echo "<pre>";
					print_r($insert_arr);
					echo '</pre>';
				
				
					foreach($ser->find('match') as $mat){
						$series_id = $ser_id;
						$play_name = $mat->find('desc');
						$play_name = $play_name[0]->xmltext;
					
						
						
						$team1 = $mat->find('team1');
						$team1 =trim($team1[0]->xmltext);
						$q2 = $this->db->query("SELECT team_s_name FROM cric_team WHERE team_name LIKE '%".$team1."%'");
						IF($q2->num_rows()>0){
							$r2 = $q2->row_array();
							$team1 =$r2['team_s_name'];
						}
						//$team1 = $this->getFieldValue('cric_team','team_s_name',array('team_name'=>$team1));
						
						$team2 = $mat->find('team2');
						$team2 =trim($team2[0]->xmltext);
						//$team2 = $this->getFieldValue('cric_team','team_s_name',array('team_name'=>$team2));
						$q3 = $this->db->query("SELECT team_s_name FROM cric_team WHERE team_name LIKE '%".$team2."%'");
						IF($q3->num_rows()>0){
							$r3 = $q3->row_array();
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
					  
					 $this->db->insert('cric_game',$game_insert_arr);
					}
				}
			}
		}
	   }

    //for every day
    function test(){
    	$query = $this->db->query('SELECT MAX(id) as max_id from test');
		$q= $query->row_array();
		$update_data= array('id'=>($q['max_id']+1));
		$this->db->update('test',$update_data);
		
    }
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
				$season_name = trim($season_arr[end( array_keys($season_arr) )]);
				$match_data_path = trim($match->attr['datapath']);
				$match_ground = '';
				if(array_key_exists('grnd', $match->attr)){
					$match_ground = trim(stripslashes($match->attr['grnd']));
				}
				$first_team ='';$sec_team='';
				if(count($match->find('Tm'))>0){
				   $first_team = strtoupper(trim(stripslashes($match->find('Tm',0)->attr['name'])));
				   $sec_team  = strtoupper(trim(stripslashes($match->find('Tm',1)->attr['name'])));
				}
				$start_date ='';$end_date ='';
				if(count($match->find('Tme'))>0){
					$start_date = date('Y-m-d', strtotime( $match->find('Tme',0)->attr['dt'] ));
					$end_date = date('Y-m-d', strtotime( $match->find('Tme',0)->attr['enddt'] ));
				}
				
				$this->db->where('s_name',$series_name);
				$this->db->select('id');
				$query=$this->db->get('cric_series');
				if($query->num_rows()>0){
					
						$record = $query->row_array();
						$ser_id = $record['id'];
				
				
						$this->db->where('series_id',$ser_id);
						$this->db->where('play_name',$play_name);
						$query1 = $this->db->get('cric_game');
						if($query1->num_rows()>0){
							$record1= $query1->row_array();
							$play_id = $record1['play_id']; 
							$game_insert = array(
												//'encripted_id' => md5($match->attr['id'].$match->attr['mchdesc'].$match->attr['mnum']),
												'play_slug'=>url_title(strtolower(trim($series_name.'-'.$play_name.'-'.$first_team.'-'.$sec_team))),
												'play_type' => $match_type,
												'play_data_link' =>$match_data_path,
												'first_team_name'=>$first_team,
												'last_team_name'=>$sec_team
												);
						    $this->db->where('play_id',$play_id);
							$last_id = $this->db->update('cric_game',$game_insert);
							
						}
				}
				echo $play_name.'<><>'.$match_ground.'<><>'.$match_type.'<br/>';			   
			}
		}
	}


function getFieldValue($table='',$field='',$where=array()){
	$this->db->where($where);
	$this->db->select($field);
	$query = $this->db->get($table);
	$value ='';
	if($query->num_rows()>0){
		$value = $query->row_array();
		$value = $value[$field];
	}
	return $value;
}

public function updateCron(){
	$this->db->group_by('first_team_name');
	$query1 = $this->db->get('cric_game');
	foreach($query1->result_array() as $row){
		 $team_name = $row['first_team_name'];
		$sort_name ='';
		if(strstr($team_name, ' ')== true){
			$ex_data = explode(' ', $team_name);
			foreach($ex_data as $e){
				$sort_name .=substr($e, 0,1);
			}
		}else{
			$sort_name =substr($team_name, 0,3);
		}
		$insert_arr = array('team_name'=>$team_name,'team_s_name'=>$sort_name);
		$this->db->insert('cric_team',$insert_arr);
	}
}

}
