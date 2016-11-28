<?php

class Cric_model extends  CI_Model{
	var $tbl_game 	= 	'cric_game';
	var $tbl_series =	'cric_series'; 
	public function getLiveGameList(){
		//$date ='2015-01-15';
		$date = date('Y-m-d');
		$str = "SELECT G.*,S.s_name as series_name  FROM ".$this->tbl_game." as G LEFT JOIN ".$this->tbl_series." as S ON G.series_id=S.id WHERE G.play_start_date<= '".$date."' and G.play_end_date >= '".$date."'  ";
		$query = $this->db->query($str);
		$result = array();
		if($query->num_rows()>0){
			$result = $query->result_array();
		}
		//echo "<pre>";print_r($result);die;
		return $result;
	}
	
	public function getSeriesDetails($series_slug){
		$this->db->where('series_slug',$series_slug);
		$query = $this->db->get(CRIC_SERIES);
		$result = array();
		if($query->num_rows() > 0 ){
			$result = $query->row_array();
		}
		return $result;
	}
	
	public function getSeriesSchedule($series_slug){
		$str = "SELECT G.*,S.s_name as series_name  FROM ".$this->tbl_game." as G LEFT JOIN ".$this->tbl_series." as S ON G.series_id=S.id WHERE S.series_slug='".$series_slug."'";
		$query = $this->db->query($str);
		$record = array();
		if($query->num_rows()>0){
			$record = $query->result_array();
		}
		
		return $record;
	}

   public function getGameDetails($game_slug){
   	 $str = "SELECT G.*, S.s_name,S.series_slug FROM ".$this->tbl_game.' AS G JOIN '.$this->tbl_series.' AS S ON G.series_id=S.id WHERE G.play_slug="'.$game_slug.'" ';
	 $query = $this->db->query($str);
	 $record = array();
	 if($query->num_rows()>0){
	  $record = $query->row_array();
	 }
	 return $record;
   }	

}
