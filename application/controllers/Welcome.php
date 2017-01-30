<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
    function __construct(){
   	parent ::__construct();
	$this->load->helper('common_helper');
	$this->load->helper('url');
    require "simple_html_dom.php";
   }
	public function index()
	{
        $url  = API_URL.'j2me/1.0/livematches.xml';
		$html = get_content($url);
        $html =str_get_html($html);
		$this->load->view('index',['games'=>$html]);
	}
    
    public function schedule()
	{
        $url  = API_URL.'dinamalar/data/series-schedule.xml';
		$html = get_content($url);
        $html =str_get_html($html);
		$this->load->view('schedule',['schedule'=>$html]);
	}
    public function match_center(){
        
        $uri = $this->uri->segment(2).'/'.$this->uri->segment(3).'/'.$this->uri->segment(4);
        $uri = strtoupper($uri);
        $url = API_URL.'dinamalar/data/'.$uri.'/scores.xml';
        $html = get_content($url);
       // echo $html;die;
        $html =simplexml_load_string($html);
        
       //echo "<pre>";
       //print_r($html);die;
		$this->load->view('match_center',['details'=>$html]);
        
    }
	
	
	public function ranking(){
        $type = $this->uri->segment(2);
		switch($type){
			case "team":
				$url =	"http://m.cricbuzz.com/cricket-stats/iccrankings/teams";
				break;
			case "batting":
				$url =	"http://m.cricbuzz.com/cricket-stats/iccrankings/batting";
				break;
			case "bowling":
				$url =	"http://m.cricbuzz.com/cricket-stats/iccrankings/bowling";
				break;
			case "allrounders":
				$url =	"http://m.cricbuzz.com/cricket-stats/iccrankings/allrounders";
				break;
			default:
				die('Wrong Rank Type');
			break;
		}
		$html = get_content($url);
		//echo $html;die;
        $html =str_get_html($html);
        $html = $html->find('body',0);
      
		$this->load->view('ranking',['details'=>$html]);
        
    }
	
	public function player_detals(){
		$player_id = $this->uri->segment(2);
		$player_name = url_title($this->uri->segment(3));
		$url = "http://m.cricbuzz.com/cricket-stats/player/".$player_id."/".$player_name;
		$html = get_content($url);
		$html =str_get_html($html);
        $html = $html->find('body',0);
      
		$this->load->view('player_details',['details'=>$html]);
	}
    
    public function news()
	{
        $this->load->library('Yahoocricket');
		$news = $this->yahoocricket->getNews();
		//echo "<pre>";
		//print_r($news);
		$this->load->view('news',['lists'=>$news->item]);
	}
	
	public function teams()
	{
        $this->load->library('Yahoocricket');
		$teams = $this->yahoocricket->getTeam();
		//echo "<pre>";
		//print_r($teams->Team);die;
		$this->load->view('teams',['lists'=>$teams]);
	}
    
	public function player_details(){
        $this->load->library('Yahoocricket');
        $player_id = $this->uri->segment(3);
        $content = $this->yahoocricket->getPlayerDetails($player_id);
    }
    
    public function player_images(){
        $this->load->library('Yahoocricket');
        $player_id = $this->uri->segment(3);
        $content = $this->yahoocricket->getPlayerDetails($player_id);
        $content = $content->query->results->PlayerProfile->PersonalDetails->PlayerLargeImgName;
        echo json_encode(['image'=>$content]);
    }
    
    public function team_details(){
        $this->load->library('Yahoocricket');
        $team_id = $this->uri->segment(2);
        $content = $this->yahoocricket->getTeamDetails($team_id);
        $content = $content->query->results->TeamProfile;
        $this->load->view('team_details',['details'=>$content]);
    }
}
