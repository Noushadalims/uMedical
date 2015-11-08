<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Remove extends CI_Controller {

	public function __construct() {        
    	parent::__construct();
    	$this->load->model("removing");
	}

	public function index(){

	}

	public function investigation($id){
		$this->removing->investigation($id);
	}

	public function visitor_record($id){		
		$this->removing->visitorRecord($id);
	}

	public function doctor(){
		
	}

	public function user(){
		
	}

	public function removeVisitorInvestigation($visitorId, $patentId, $invId){
		$this->removing->removeVisitorInv($visitorId, $patentId, $invId);
	}

}
