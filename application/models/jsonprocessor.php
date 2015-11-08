<?php

class jsonprocessor extends CI_Model {


	public function index(){
		
	}

	public function sumInvestigation(){
		$this->db->select('SUM(type) as score');
		$this->db->where('question_id',1);
		$q=$this->db->get('votes');
		$row=$q->row();
		return $score=$row->score;
	}


	public function visitorRecord($visitorId){
		$visitorDetail = $this->getVisitorDetails($visitorId);
		$patentDetail = $this->patentDetails($visitorDetail["patentId"]);
		$investigationRecord = $this->invoiceAmount($visitorId);
		$discountDiscription = $this->getDiscountInfo($visitorId);
		$totalBillableAmount = floatval($investigationRecord["InvSumAmount"]) - floatval($discountDiscription["discountAmount"]) + floatval($visitorDetail["consultingCharge"]);
		echo json_encode(
			array(
			"visitorId"=>$visitorId,
			"visitorSummary" => $visitorDetail,
			"patentSummary" => $patentDetail,
			"investigationSummary" => $investigationRecord["allInvInfo"],
			"discountSummary" =>$discountDiscription,
			"totalBillableAmount"=>(floatval($investigationRecord["InvSumAmount"]) + floatval($visitorDetail["consultingCharge"])),
			"amountAfterDiscount"=>$totalBillableAmount
			)
		);
	}

	public function invoiceAmount($visitorId){
		return $investigationRecord = $this->investigationRecord($visitorId);
	}

	public function patentDetails($patentId){

		$this->db->where('patientid', $patentId);
		$this->db->limit(1);
		$query = $this->db->get('patient_information');
		foreach ($query->result() as $row)
		{
			$gender = $row->gender;
			if($row->gender=='M'){
				$gender = 'Male';
			}else if($row->gender=='F'){
				$gender = 'Female';
			}else{
				$gender = '0';
			}
		    return  array("patentTitle"=>$row->title,
		    				"patentFirstName"=>$row->firstname,
		    				"patentLastName"=>$row->lastname,
		    				"patentAge"=>$row->age,
		    				"patentGender"=>$gender,
		    				"patentMaritalStatus"=>$row->marital_status,
		    				"patentAddress"=>$row->address,
		    				"patentState"=>$row->state,
		    				"patentPin"=>$row->pin,
		    				"patentContry"=>$row->country,
		    				"patentPhone"=>$row->phone,
		    				"patentMobile"=>$row->mobile,
		    				"patentRegisteredDated"=>$row->registereddated
		    				);
		}

	}

	public function investigationRecord($visitorId){
		$this->db->where('visitor_id', $visitorId);
		$query = $this->db->get('investigation_record');
		$allInvInfo = array();
		$sumAmount = 0;
		foreach ($query->result() as $row)
		{
			$invInfo = $this->investigationInfo($row->investigation_id);
			$allInvInfo[] = array("invId"=>$row->investigation_id,"invInfoName"=>$invInfo["InvestigationName"],"invInfoAnount"=>$invInfo["InvestigationAmount"]);
			$sumAmount = $sumAmount + $invInfo["InvestigationAmount"];
		}
		return array("allInvInfo"=>$allInvInfo,"InvSumAmount"=>$sumAmount);
	}

	public function investigationInfo($investigationId){
		$this->db->where('investigation_id', $investigationId);
		$this->db->limit(1);
		$query = $this->db->get('investigation_information');
		foreach ($query->result() as $row)
		{
		    return  array("InvestigationName"=>$row->investigation_name,"InvestigationAmount"=>$row->investigation_fee, "InvestigationSummary"=>$row->summary, "InvestigationStatus"=>$row->status);
		}
	}

	public function getCounsultingCharges($doctorId){
		$this->db->where('doctor_id', $doctorId);
		$this->db->limit(1);
		$query = $this->db->get('consulting_info');
		foreach ($query->result() as $row)
		{
		    return $row->consulting_charge;
		}
	}

	public function getVisitorDetails($visitorId){
		$this->db->where('visitor_id', $visitorId);
		$this->db->limit(1);
		$query = $this->db->get('visitor_record');
		foreach ($query->result() as $row)
		{
			$doc = $this->getDoctorDetails($row->doctor_id);
			$counsultingCharge = $this->getCounsultingCharges($row->doctor_id);
		    return  array("patentId"=>$row->patent_id,"userId"=>$row->user_id,"visitedDated"=>$row->visited_date,"billno"=>$row->bill_no,"doctorName"=>$doc['DoctorName'],"consultingCharge"=>$counsultingCharge);
		}
	}

	public function getDoctorDetails($doctorId){
			
			$this->db->where('doctor_id',$doctorId);
			$this->db->limit(1);
			$query = $this->db->get('doctors_information');
			foreach ($query->result() as $row)
			{
			   return array("DoctorName"=>$row->doctor_firstname." ".$row->doctor_lastname);
			}	
	}

	public function getDiscountInfo($visitorId){
		$this->db->where('visitor_id', $visitorId);
		$this->db->limit(1);
		$query = $this->db->get('discount');
		foreach ($query->result() as $row)
		{
		    return  array("discountDiscription"=>$row->discount_discription,"discountAmount"=>$row->discount_amount);
		}
	}

}