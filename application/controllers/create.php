<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Create extends CI_Controller {

		public function __construct() {        
    	parent::__construct();
    	$this->load->model("Saving");
    	$this->Saving->createVisitorId();
    	$this->Saving->createPatentId();

    		if(!$this->session->userdata('logged_in'))
		   {
		     redirect('login', 'refresh');
		   }
	 	}

	 	
	


	public function index(){
		
	}

	public function doctor(){
		$session_data="";
		if($this->session->userdata('logged_in')){
			$session_data = $this->session->userdata('logged_in');
		}
		$data = Array("sessionData"=>$session_data);
		$this->load->view('create_doctor',$data);
	}

	public function investigation(){
		$session_data="";
		if($this->session->userdata('logged_in')){
			$session_data = $this->session->userdata('logged_in');
		}
		$data = Array("sessionData"=>$session_data);
		$this->load->view('create_inv',$data);
	}

	public function user(){
		$session_data="";
		if($this->session->userdata('logged_in')){
			$session_data = $this->session->userdata('logged_in');
		}
		$data = Array("sessionData"=>$session_data);
		$this->load->view('create_user',$data);
	}

	public function visitor(){
		$session_data="";
		if($this->session->userdata('logged_in')){
			$session_data = $this->session->userdata('logged_in');
		}
		$data = Array("sessionData"=>$session_data);
		$this->load->view('create_visitor',$data);	
	}

	public function backUp(){

	}
}


                                 
                                 
                                 