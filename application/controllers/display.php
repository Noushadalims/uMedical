<?php 

class Display extends CI_Controller {

	public function __construct() {        
    	parent::__construct();
	}

	public function index(){
		
	}

	public function bill($visitorId=null){

		$data=array("visitorId"=>$visitorId);
			
		$this->load->view('bill',$data);
	}

	public function recentvisitor(){
			$session_data="";
			if($this->session->userdata('logged_in')){
				$session_data = $this->session->userdata('logged_in');
			}

			$this->load->model("Query");
			$data = array("sessionData"=>$session_data,"recentVisitorData"=>$this->Query->getRecentVisitors());		
		$this->load->view('recentvisitor',$data);
	}

}


                                 
                                 
                                 