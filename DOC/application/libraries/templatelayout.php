<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');

/**
 * Description of templatelayout
 */
class templatelayout {
     
     var $obj;
    
     public function __construct()
     {
        $this->obj =& get_instance();
     }

     
     public function get_header()
     {
		  $this->header = '';          
		  $this->header['activeSeries'] = array();
		  $str ="SELECT * FROM ".CRIC_SERIES." WHERE start_date <='".date('Y-m-d')."' and end_date >= '".date('Y-m-d')."' ";
		  $query = $this->obj->db->query($str);
		  if($query->num_rows()>0){
		  	$this->header['activeSeries'] = $query->result_array();
		  }
		  $this->header['activeSchedule'] =array();
		  $str ="SELECT * FROM ".CRIC_SERIES." WHERE start_date > '".date('Y-m-d')."'";
		  $query = $this->obj->db->query($str);
		  if($query->num_rows()>0){
		  	$this->header['activeSchedule'] = $query->result_array();
		  }
		  
		  //pr($this->header['activeSeries'],0);
		  //pr($this->header['activeSchedule']);
		  $this->obj->elements['header']='layout/header';
		  $this->obj->elements_data['header'] = $this->header;
     }
     
     
     public function get_seo($title='',$mata_keyword='',$mata_description='')
     {
	  $this->seo = '';
	  if($title==''){ $this->seo['page_title'] ='Cric Star';}
	  else{	$this->seo['page_title'] =$title; }
	  
	  if($mata_keyword==''){ $this->seo['page_mata_keyword'] ='Cricket';}
	  else{	$this->seo['page_mata_keyword'] =$mata_keyword; }
	  
	  if($mata_description==''){ $this->seo['page_mata_description'] ='';}
	  else{	$this->seo['page_mata_description'] =$mata_description; }
	  
	  $this->obj->elements['seo']='layout/seo';
	  $this->obj->elements_data['seo'] = $this->seo;
     }
     
     public function get_sidebar($active = '')
     {
	  $this->sidebar = '';
	  $this->sidebar['active'] = $active;
	  $this->obj->elements['sidebar']='includes/sidebar';
	  $this->obj->elements_data['sidebar'] = $this->sidebar;
     }       
 
     /*
     public  function get_footer()
     {
	  $this->footer = '';
	  $this->obj->elements['footer']='includes/footer';
	  $this->obj->elements_data['footer'] = $this->footer;
     }
     */
	
}
?>