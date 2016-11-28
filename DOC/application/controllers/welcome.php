<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Welcome extends CI_Controller {

   function __construct(){
   	parent ::__construct();
	$this->load->library('simple_html_dom');
	$this->load->helper('common_helper');
	$this->load->model('cric_model','cric');
   }
				
	public function index()
	{

		$html ='';
		// $url  = 'http://synd.cricbuzz.com/j2me/1.0/livematches.xml';
		// $html = get_content($url);
		// $html =str_get_html($html);
        
        $data['liveGame'] = $this->cric->getLiveGameList();
			$data['html']=$html;
			
		$this->elements['middle']='index';			
		$this->elements_data['middle'] = $data;			    
		$this->templatelayout->get_header();
		$this->templatelayout->get_seo();
		$this->layout->setLayout('layout');
		$this->layout->multiple_view($this->elements,$this->elements_data);
			
	}
	
	public function series_details($series_slug){
		$data['series_details'] = $this->cric->getSeriesDetails($series_slug);
		if(count($data['series_details'])== 0){
			redirect('page-not-found');
		}
		$data['series_schedule'] = $this->cric->getSeriesSchedule($series_slug);
		
		$this->elements['middle']='series_schedule';			
		$this->elements_data['middle'] = $data;			    
		$this->templatelayout->get_header();
		$title = 'Cric Star - '.$data['series_details']['s_name']; 
		$this->templatelayout->get_seo($title);
		$this->layout->setLayout('layout');
		$this->layout->multiple_view($this->elements,$this->elements_data);
		
	}
	
	
	public function play_details(){
		$game_slug = $this->uri->segment(2,0);
		$data['game_details'] = $this->cric->getGameDetails($game_slug);
		  	if(count($data['game_details'])== 0){
				redirect('page-not-found');
			}
			
			//echo $url  = $data['game_details']['play_data_link'].'commentary.xml';
			if($data['game_details']['play_start_date']==date('Y-m-d')){
				$path = $data['game_details']['play_data_link'];
				$path = rtrim($path,'/');
				$path_arr = explode('/', $path);
				$path_arr = array_slice($path_arr,-3,3,TRUE);
				$url_str ='';
				foreach($path_arr as $p){
					$url_str .=$p.'/';
				}
				
				$url  = 'http://synd.cricbuzz.com/dinamalar/data/'.$url_str.'scores.xml';
				$html = get_content($url);
				if($html==''){
					redirect('page-not-found');	
				}
				$html =str_get_html($html);
				
				$data['html']=$html->find('scorecard',0);
				$html =$html->find('scorecard',0);
				$data['title'] = (count($html->find('currentscores'))>0)? "Bat: ".strtoupper($html->find('currentscores',0)->find('batteamname',0)->xmltext):'';
				$data['title'] .= (count($html->find('currentscores'))>0)? " ".$html->find('currentscores',0)->find('batteamruns',0)->xmltext."/":'';
				$data['title'] .= (count($html->find('currentscores'))>0)? $html->find('currentscores',0)->find('batteamwkts',0)->xmltext." ":'';
				if(count($html->find('currentscores'))>0){
       	  	 			foreach($html->find('currentscores',0)->find('batsman') as $bat){
       	  	 				$data['title'] .= " ".$bat->find('name',0)->xmltext;
							$data['title'] .= ": ".$bat->find('runs',0)->xmltext;
							$data['title'] .= " (".$bat->find('balls-faced',0)->xmltext."), ";
       	  	 			}
						$data['title'] =rtrim($data['title'],", ");
				}
				
				$data['title'] .= (count($html->find('currentscores'))>0)? " / Ball: ".strtoupper($html->find('currentscores',0)->find('bwlteamname',0)->xmltext):'';
				$data['title'] .= (count($html->find('currentscores'))>0)? " ".$html->find('currentscores',0)->find('batteamovers',0)->xmltext." Overs ":'';
				
				
				if(count($html->find('currentscores'))>0){
       	  	 			 foreach($html->find('currentscores',0)->find('bowler') as $ball){
       	  	 				$data['title'] .= " ".$ball->find('name',0)->xmltext;
							$data['title'] .= " ".$ball->find('overs',0)->xmltext."/".$ball->find('wickets',0)->xmltext.", ";		 	
       	  	 			 }
						$data['title'] =rtrim($data['title'],", ");
				}
				
				if($data['title']==''){
					$data['title'] = ($html->find('match',0)->find('gamedesc',0)->xmltext).' at '.($html->find('match',0)->find('venue',0)->xmltext);
				}
				//echo $data['title'];
			   $this->load->view('game_summery1',$data);
				
			}else{
				$url  = $data['game_details']['play_data_link'].'scorecard.xml';
				$html = get_content($url);
				if($html==''){
					redirect('page-not-found');	
				}
				$html =str_get_html($html);
				if($data['game_details']['play_start_date']==date('Y-m-d')){
					$data['html']=$html->find('scorecard',0);
				}else{
					$data['html']=$html->find('scrcard',0);	
				}
				
				
				$this->elements['middle']='game_summery';			
				$this->elements_data['middle'] = $data;			    
				$this->templatelayout->get_header();
				$title = 'Cric Star - '.$data['game_details']['play_name']; 
				$this->templatelayout->get_seo($title);
				$this->layout->setLayout('layout');
				$this->layout->multiple_view($this->elements,$this->elements_data);
			}
			
			
			
			
		
		
			
	}

public function play_details1(){
		$game_slug = 'icc-cricket-world-cup-2015-21st-match-pool-b-ind-uae';
		$data['game_details'] = $this->cric->getGameDetails($game_slug);
		  	
			$url  =  SERVER_ABSOLUTE_PATH.'DOC/ind_uae.xml';
				
			
			$html =file_get_html($url);
			
			$data['html']=$html->find('scorecard',0);
			
		
			   $this->load->view('game_summery1',$data);
			
	}
	
	public function game_scorecard(){
		$game_id = $this->uri->segment(2,0);
		$this->db->where('encripted_id',$game_id);
		$query = $this->db->get('cric_game');
		if($query->num_rows()>0){
			$record =$query->row_array();
			$url  = $record['play_data_link'].'scorecard.xml';
			$html = get_content($url);
			$html =str_get_html($html);
			$data['html']=$html;
			
			$this->load->view('game_scorecard',$data);
		}else{
			echo "404";
		}
		
			
	}
	
	
	public function news(){
		$this->db->order_by('news_id','desc');
		$this->db->limit(12,0);
		$query = $this->db->get('cric_news');
		
		$data['news_record'] =$query->result_array();
		$this->elements['middle']='news';			
		$this->elements_data['middle'] = $data;			    
		$this->templatelayout->get_header();
		$title = 'Cric Star - News'; 
		$this->templatelayout->get_seo($title);
		$this->layout->setLayout('layout');
		$this->layout->multiple_view($this->elements,$this->elements_data);
		
	}
	public function ajaxNews(){
		if($this->session->userdata('ajaxNewsCount')==''){
			$this->session->set_userdata('ajaxNewsCount',24);
		}else{
			$this->session->set_userdata('ajaxNewsCount', $this->session->userdata('ajaxNewsCount')+12);
		}
		echo $offset = $this->session->userdata('ajaxNewsCount');
		echo "<br/>";
		$this->db->order_by('news_id','desc');
		$this->db->limit(12,$offset);
		$query = $this->db->get('cric_news');
		if($query->num_rows()>0){
			$data=$query->result_array();
			foreach($data as $d){
				echo '<div class="newsDetails">';
	   	 			echo '<h3>'.stripslashes($d['news_title']).'</h3>';
	   	 			echo '<p>'.stripslashes($d['news_description']).'</p>';
	   	 			
	   	 		echo '</div>';
			}
		}
	}
	
	
	
	public function page_not_found(){
		
		// $q=$this->db->query('SELECT g.*,s.s_season,s.start_date as series_start_date from cric_game as g left join cric_series as s on g.series_id=s.id where g.play_id=18');
		// $data=$q->row_array();
		// pr($data,0);
		// $link = $this->get_game_link($data);
		echo '<h1>404</h1>';
	}
	
	
	
	// synd.cricbuzz.com/j2me/1.0/match/2014/2014-15_AUS_IND/AUS_IND_DEC17_DEC21/scorecard.xml
	public function get_game_link($game_data){
		$url = "http://synd.cricbuzz.com/j2me/1.0/match/";
		$url .= date('Y', strtotime($game_data['series_start_date'])).'/';
	    $url .= strtoupper($game_data['s_season'].'_'.$game_data['first_team_name'].'_'.$game_data['last_team_name'].'/');
		$url .= strtoupper($game_data['first_team_name'].'_'.$game_data['last_team_name'].'_');
		$url .= strtoupper(date('Md',strtotime($game_data['play_start_date'])));
		if($game_data['play_start_date'] != $game_data['play_end_date']){
			$url .= '_'.strtoupper(date('Md',strtotime($game_data['play_end_date'])));
		}
		echo $url;	
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */