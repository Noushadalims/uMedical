<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Info extends CI_Controller {

	public function __construct() {        
    	parent::__construct();
    	$this->load->model("Saving");
	}

	public function index(){


		$json = array('siteUrl' => SITE_PATH, 'visitorId' => $this->visitor(), 'patentId' => 3, 'd' => 4, 'e' => 5);

		echo json_encode($json,JSON_PRETTY_PRINT);

	}

	public function visitor(){
		$visitorId=$this->input->cookie('cookieVisitorId', TRUE);
		if(!$visitorId){
			$this->Saving->createVisitorId();
		}
		return $this->input->cookie('cookieVisitorId', TRUE);
	}

	public function inv()
	{
		$keyword = $this->uri->segment(3);
		if($keyword){
			$this->db->limit(5);
			$this->db->where('status !=',0);
			$this->db->like('investigation_name',$keyword); 
			$query = $this->db->get('investigation_information');
			foreach ($query->result() as $row)
			{
			    echo "<li value='$row->investigation_name|$row->investigation_fee|$row->investigation_id'><a href='#' class='investigation-suggest-data'>".$row->investigation_name."</a></li>";
			}	
		}
		
	}

	public function doctorInfo(){
		$keyword = $this->uri->segment(3);
		if($keyword){
			$this->db->limit(5);
			$this->db->where('status !=',0);
			$this->db->like('doctor_firstname',$keyword); 
			$query = $this->db->get('doctors_information');
			foreach ($query->result() as $row)
			{
				$docCharges = $this->getDoctorCharges($row->doctor_id);
			    echo "<li value='$row->doctor_firstname $row->doctor_lastname|$row->doctor_id|$docCharges'><a href='#' class='doctorRef-suggest-data'>".$row->doctor_firstname."</a></li>";
			}	
		}
	}

	public function getDoctorCharges($doctorId){
			$this->db->limit(1);
			$this->db->where('doctor_id =',$doctorId);
			$query = $this->db->get('consulting_info');
			foreach ($query->result() as $row)
			{
			   return $row->consulting_charge;
			}	
	}
}


                                 
                                 
                                 