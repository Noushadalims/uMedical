<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Json extends CI_Controller {

	public function __construct() {        
    	parent::__construct();
    	$this->load->model("jsonprocessor");
	}

	public function index($id){

		echo $id;

	}

	public function visitorRecord($visitorId = NULL){
		if(isset($visitorId)){
			$this->jsonprocessor->visitorRecord($visitorId);
		}else{
			echo "Boss Put Some thing";
		}
		
	}

	public function InvestigationEntry(){

		// Non-consecutive number keys are OK for PHP
		// but not for a JavaScript array
		 $arr = array('a' => 1, 'b' => 2, 'c' => 3, 'd' => 4, 'e' => 5);
   echo json_encode($arr);



		// [["Afghanistan",32,13],["Albania",32,12]]
	}

}