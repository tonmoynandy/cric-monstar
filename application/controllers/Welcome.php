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
        $html =str_get_html($html);
		$this->load->view('match_center',['details'=>$html]);
        
    }
    
}
