<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Search extends CI_Controller {

	public function index(){
		
	}

	public function visitor(){
		$session_data="";
		if($this->session->userdata('logged_in')){
			$session_data = $this->session->userdata('logged_in');
		}
		$data = Array("sessionData"=>$session_data);
		$this->load->view('search_visitor',$data);
	}

}


                                 
                                 
                                 