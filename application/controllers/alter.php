<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Alter extends CI_Controller {

	public function __construct()
    {
        parent::__construct();
        $this->load->model("jsonprocessor");
        $this->load->model("updating");
    }

	public function index(){
		
	}

	public function investigation($invID=null){
		$session_data="";
		if($this->session->userdata('logged_in')){
			$session_data = $this->session->userdata('logged_in');
		}
		$data = $this->jsonprocessor->investigationInfo($invID);

		$data = Array("sessionData"=>$session_data,$session_data,"invID"=>$invID, "invData"=>$data);
		if($invID){
			$this->load->view('alter_inv',$data);
		}
	}

	public function visitor($visitorId=null){
			$session_data="";
		if($this->session->userdata('logged_in')){
			$session_data = $this->session->userdata('logged_in');
		}

		$data = 0;//$this->jsonprocessor->investigationInfo($invID);

		$data = Array("sessionData"=>$session_data,"searchId"=>$visitorId,"invData"=>$data);
		if($visitorId){
			$this->load->view('alter_visitor',$data);
		}

	}

	public function doctor(){

	}

	public function user(){
		
	}

	public function password(){
		$session_data="";
		if($this->session->userdata('logged_in')){
			$session_data = $this->session->userdata('logged_in');
		}
		$data = Array("sessionData"=>$session_data);
		$this->load->view('change-password',$data);
	}

	public function addAlterInvestigation(){
		$investigationId =  $this->input->post('investigation_id');
		$visitorId = $this->input->post('visitorId');
		$patentId = $this->input->post('patentId');

		$this->updating->visitor_investigation_alter($visitorId, $patentId, $investigationId);

	}

	public function addAlterDoctor(){
		$docRefId = $this->input->post('doctorRefId');
		$visitorId = $this->input->post('visitorId');

		$data = array(
               'doctor_id' => $docRefId
            );

		$this->db->where('visitor_id', $visitorId);
		$this->db->update('visitor_record', $data); 
	}

	public function addReferalDoctor(){
		$ReferenceName = $this->input->post('ReferenceName');
		$ReferenceDiscount = $this->input->post('ReferenceDiscount');
		$visitorId = $this->input->post('visitorId');

		$data = array(
               'discount_discription' => $ReferenceName,
               'discount_amount' => $ReferenceDiscount
            );

		$this->db->where('visitor_id', $visitorId);
		$this->db->update('discount', $data); 
	}

	public function patent_personal_details(){
		$patentId = $this->input->post('patentId');
		$patentTitle = $this->input->post('patentTitle');
		$patentFirstName = $this->input->post('patentFirstName');
		$patentLastName = $this->input->post('patentLastName');
		$patentAge = $this->input->post('patentAge');
		$patentGender = $this->input->post('patentGender');
		$patentMartialStatus = $this->input->post('patentMartialStatus');
		$patentAddress = $this->input->post('patentAddress');
		$patentState = $this->input->post('patentState');
		$patentPinCode = $this->input->post('patentPinCode');
		$patentCountry = $this->input->post('patentCountry');
		$patentPhoneNo = $this->input->post('patentPhoneNo');
		$patentMobileNo = $this->input->post('patentMobileNo');

		$data = array(
               'patientid' => $patentId,
               'title' => $patentTitle,
               'firstname'=>$patentFirstName,
               'lastname'=>$patentLastName,
               'age'=>$patentAge,
               'gender'=>$patentGender,
               'marital_status'=>$patentMartialStatus,
               'address'=>$patentAddress,
               'state'=>$patentState,
               'pin'=>$patentPinCode,
               'country'=>$patentCountry,
               'phone'=>$patentPhoneNo,
               'mobile'=>$patentMobileNo
            );
		//var_dump($data);

		$this->db->where('patientid', $patentId);
		$this->db->update('patient_information', $data); 
	}

}


                                 
                                 
                                 