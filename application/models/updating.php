<?php

class Updating extends CI_Controller {


	public function index(){
		
	}

	public function investigations($InvestigationId,$InvestigationName,$InvestigationFee,$InvestigationAvailability,$InvestigationSummary){
		$tableName = "investigation_information";
		$data = array(
		'investigation_name' => $InvestigationName ,
		'investigation_fee' => $InvestigationFee,
		'summary' => $InvestigationSummary,
		'status' => $InvestigationAvailability
		);
		$whereRef = Array("investigation_id"=>$InvestigationId);
		$this->saveDataToDb($tableName, $data, $whereRef);
			
	}

	public function new_id($columnName,$tableName){
		$queryString="SELECT MAX($columnName) AS `maxid` FROM `$tableName`";
		$query = $maxid = $this->db->query($queryString)->row()->maxid;
		return $query+1;
	}

	public function doctor($DoctorFirstName,$DoctorLastName,$DoctorMobileNo,$DoctorPhoneNo,$DoctorAddress,$DoctorCity,$DoctorPinCode,$DoctorState,$DoctorSpecialist,$DoctorComments){
		$tableName = "doctors_information";
		$id=$this->new_id('doctor_id',$tableName);
		$data = array(
		'doctor_id' => $id ,
		'doctor_firstname' => $DoctorFirstName ,
		'doctor_lastname' => $DoctorLastName,
		'doctor_mobile_no' => $DoctorMobileNo,
		'doctor_phone_no' => $DoctorPhoneNo,
		'doctor_address' => $DoctorAddress ,
		'doctor_city' => $DoctorCity,
		'doctor_pin' => $DoctorPinCode,
		'doctor_state' => $DoctorState,
		'specialist' => $DoctorSpecialist,
		'summary' => $DoctorComments
		);

		$this->saveDataToDb($tableName, $data);

	}

	function saveArrayData($tableName, $data){
		$status = $this->db->insert($tableName, $data); 
		if($status){
			return true;
		}else{
			return false;
		}
	}

	function saveDataToDb($tableName, $data, $whereRef){
		$status = $this->db->update($tableName, $data, $whereRef); 
		if($status){
			return "Success";
		}else{
			return "Error";
		}
	}

	public function password_hash($password){
		$salt = 'shiningStar';
		$hashed_value = md5($salt.$password);
		return $hashed_value;
	}
	
	public function user($UserName,$UserPassword,$UserPreference,$UserSummary){
		$tableName = "user";
		$id=$this->new_id('userid',$tableName);
		$data = array(
		'userid' => $id ,
		'username' => $UserName ,
		'password' => $this->password_hash($UserPassword),
		'summary' => $UserSummary,
		'access_rights' => $UserPreference
		);

		$this->saveDataToDb($tableName, $data);
	}




	public function createVisitorId(){
		$visitorStatus = $this->input->cookie('cookieVisitorId', TRUE);
		if(!$visitorStatus){
			$id=$this->new_id('visitor_id',"visitor");
			$cookie = array(
			    'name'   => 'cookieVisitorId',
			    'value'  => $id,
			    'expire' => '43200'
			);
			$this->input->set_cookie($cookie);
			$data = array('visitor_id' => $id);
			$this->saveDataToDb("visitor", $data);
		}
		
	}

	public function createPatentId(){
		$patentStatus = $this->input->cookie('cookiePatentId', TRUE);
		if(!$patentStatus){
			$id=$this->new_id('patent_id',"patent");
			$cookie = array(
			    'name'   => 'cookiePatentId',
			    'value'  => $id,
			    'expire' => '43200'
			);
			$this->input->set_cookie($cookie);
			$data = array('patent_id' => $id);
			$this->saveDataToDb("patent", $data);
			$patentStatus = $id;
			return $patentStatus;
		}
		return $patentStatus;
	}

	function clearPatentVisitorIds(){

		$cookie_name = 'cookiePatentId';
		unset($_COOKIE[$cookie_name]);
		$res = setcookie($cookie_name, '', time() - 3600);

		$cookie_name = 'cookieVisitorId';
		unset($_COOKIE[$cookie_name]);
		$res = setcookie($cookie_name, '', time() - 3600);

		$this->createVisitorId();
		$this->createPatentId();

	}

	public function visitor_record($patentId, $doctorId, $patentTitle, $patentFirstName, $patentLastName, $patentAge, $patentGender, $patentMartialStatus,$ReferenceName, $ReferenceDiscount, $patentAddress, $patentCity, $patentState, $patentPinCode, $patentCountry, $patentPhoneNo, $patentMobileNo, $investigationId){
		
		if($patentId=='' || $patentId==' ' || $patentId==null){
			$patentId = $this->input->cookie('cookiePatentId', TRUE);

			$data = array(
			'patientid' =>$patentId,
			'title' => $patentTitle,
			'firstname' => $patentFirstName,
			'lastname' => $patentLastName,
			'age' => $patentAge,
			'gender' => $patentGender,
			'marital_status' => $patentMartialStatus,
			'address' => $patentAddress,
			'state' => $patentState,
			'pin' => $patentPinCode,
			'country' => $patentCountry,
			'phone' =>$patentPhoneNo,
			'mobile' => $patentMobileNo
		);

		$savDb = $this->saveDataToDb("patient_information", $data);	
		}
		
		

		$refSav = $this->referenceSave($patentId,$ReferenceName,$ReferenceDiscount);

		$this->visitor_investigation_record($patentId,$investigationId);
		$userid=$this->session->userdata('logged_in');
		$userid = $userid["userid"];
		$this->visitorPatentRef($patentId, $userid, $doctorId);
		$this->clearPatentVisitorIds();
	}

	public function visitorPatentRef($patentId, $userId, $doctorId){
		$visitor_id = $this->input->cookie('cookieVisitorId', TRUE);
		$billno = $this->new_id('billno',"billing_info");
		$data = array(
			'visitor_id' =>$visitor_id, 
			'patent_id' =>$patentId,
			'user_id' => $userId,
			'bill_no' => $billno,
			'doctor_id'=> $doctorId
		);

		$billref = array("billno"=>$billno);
				$this->saveDataToDb("billing_info", $billref);
		return $this->saveDataToDb("visitor_record", $data);

	}

	public function referenceSave($patentId,$ReferenceName,$ReferenceDiscount){
		$visitor_id = $this->input->cookie('cookieVisitorId', TRUE);
		$data = array(
			'visitor_id' =>$visitor_id, 
			'patent_id' =>$patentId,
			'discount_discription' => $ReferenceName,
			'discount_amount' => $ReferenceDiscount
		);

		return $this->saveDataToDb("discount", $data);	
	}



	public function visitor_investigation_record($patentId,$investigationId){
		$tableName = "investigation_record";
		$savingStatus = true;
		$visitorId = $this->input->cookie('cookieVisitorId', TRUE);
		foreach ($investigationId as $invId) {
			$data = array(
			'visitor_id' => $visitorId,
			'patent_id' => $patentId,
			'investigation_id' => $invId
			);

			$status=$this->saveArrayData($tableName, $data);
			if(!$status){
				$savingStatus = false;
			}

		}
		if($savingStatus){
			return "Success";
		}else{
			return "Error";
		}

	}

		public function visitor_investigation_alter($visitorId, $patentId, $investigationId){
		$this->removeVisitorInvestigation($visitorId, $patentId);
		$tableName = "investigation_record";
		$savingStatus = true;
		foreach ($investigationId as $invId) {
			$data = array(
			'visitor_id' => $visitorId,
			'patent_id' => $patentId,
			'investigation_id' => $invId
			);

			$status=$this->saveArrayData($tableName, $data);
			if(!$status){
				$savingStatus = false;
			}
		}

		if($savingStatus){
			return "Success";
		}else{
			return "Error";
		}

	}


	public function removeVisitorInvestigation($visitorId, $patentId){
		$this->db->delete('investigation_record', array('visitor_id' => $visitorId, 'patent_id'=> $patentId)); 
	}


}

