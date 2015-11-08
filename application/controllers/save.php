<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Save extends CI_Controller {

	public function __construct() {        
    	parent::__construct();
    	$this->load->model("Saving");
	}

	public function index(){

	}

	public function investigation(){
			$InvestigationName= $this->input->post('InvestigationName');
			$InvestigationFee= $this->input->post('InvestigationFee');
			$InvestigationAvailability= $this->input->post('InvestigationAvailability');
			$InvestigationSummary= $this->input->post('InvestigationSummary');
			$this->Saving->investigations($InvestigationName,$InvestigationFee,$InvestigationAvailability,$InvestigationSummary);
	}

	public function updateInvestigation(){
			$InvestigationId= $this->input->post('InvestigationId');
			$InvestigationName= $this->input->post('InvestigationName');
			$InvestigationFee= $this->input->post('InvestigationFee');
			$InvestigationAvailability= $this->input->post('InvestigationAvailability');
			$InvestigationSummary= $this->input->post('InvestigationSummary');
			$this->Saving->investigations($InvestigationName,$InvestigationFee,$InvestigationAvailability,$InvestigationSummary);
	}

	public function visitor_record(){
			
			
			$patentTitle = $this->input->post('patentTitle');
			$patentFirstName = $this->input->post('patentFirstName');
			$patentLastName = $this->input->post('patentLastName');
			$patentAge = $this->input->post('patentAge');
			$patentGender = $this->input->post('patentGender');
			$patentMartialStatus = $this->input->post('patentMartialStatus');
			$ReferenceName = $this->input->post('ReferenceName');
			$ReferenceDiscount = $this->input->post('ReferenceDiscount');
			$patentAddress = $this->input->post('patentAddress');
			$patentCity = $this->input->post('patentCity');
			$patentState = $this->input->post('patentState');
			$patentPinCode = $this->input->post('patentPinCode');
			$patentCountry = $this->input->post('patentCountry');
			$patentPhoneNo = $this->input->post('patentPhoneNo');
			$patentMobileNo = $this->input->post('patentMobileNo');
			$patentId = $this->input->post('searchPatentId');
			$investigationId = $this->input->post('investigation_id');
			$doctorId = $this->input->post('doctorRefId');
			$this->Saving->visitor_record($patentId, $doctorId, $patentTitle, $patentFirstName, $patentLastName, $patentAge, $patentGender, $patentMartialStatus,$ReferenceName, $ReferenceDiscount, $patentAddress, $patentCity, $patentState, $patentPinCode, $patentCountry, $patentPhoneNo, $patentMobileNo, $investigationId);
			
			

			

			

	}

	public function doctor(){

			$DoctorFirstName= $this->input->post('DoctorFirstName');
			$DoctorLastName= $this->input->post('DoctorLastName');
			$DoctorMobileNo= $this->input->post('DoctorMobileNo');
			$DoctorPhoneNo= $this->input->post('DoctorPhoneNo');
			$DoctorAddress= $this->input->post('DoctorAddress');
			$DoctorCity= $this->input->post('DoctorCity');
			$DoctorPinCode= $this->input->post('DoctorPinCode');
			$DoctorState= $this->input->post('DoctorState');
			$DoctorSpecialist= $this->input->post('DoctorSpecialist');
			$DoctorComments= $this->input->post('DoctorComments');
			$ConsultationCharges = $this->input->post('DoctorFees');
			$this->Saving->doctor($DoctorFirstName,$DoctorLastName,$DoctorMobileNo,$DoctorPhoneNo,$DoctorAddress,$DoctorCity,$DoctorPinCode,$DoctorState,$DoctorSpecialist,$DoctorComments,$ConsultationCharges); 
	}

	public function user(){

			echo $UserName= $this->input->post('UserName');
			echo $UserPassword= $this->input->post('UserPassword');
			echo $UserPreference= $this->input->post('UserPreference');
			echo $UserSummary= $this->input->post('UserSummary');
			$this->Saving->User($UserName,$UserPassword,$UserPreference,$UserSummary);

	}

	public function testCall(){
		echo "I'm ok from model";
	}

}


                                 
                                 
                                 