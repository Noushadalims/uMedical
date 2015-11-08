<?php
Class Query extends CI_Model
{

   public function __construct()
    {
        parent::__construct();
        $this->load->model("jsonprocessor");
    }

    public function getRecentVisitors(){
        $this->db->order_by("visitor_id", "desc"); 
    	$query = $this->db->get('visitor_record');
        $dataArray = Array();
		foreach ($query->result() as $row)
		{
            $patentDetails=$this->jsonprocessor->patentDetails($row->patent_id);
            $invoiceArray=$this->jsonprocessor->invoiceAmount($row->visitor_id);
            $discountArray = $this->jsonprocessor->getDiscountInfo($row->visitor_id);
            $patentName = $patentDetails['patentTitle'].".".$patentDetails['patentFirstName']." ".$patentDetails['patentLastName'];
		    $dataArray[] = array(
                "visitorId"=>$row->visitor_id,
                "patentId"=>$row->patent_id,
                "patentName"=>$patentName,
                "gender"=>$patentDetails['patentGender'],
                "address"=>$patentDetails['patentAddress'],
                "contactNo"=>$patentDetails['patentMobile'],
                "discountAmount"=>$discountArray['discountAmount'],
                "invoiceAmount"=>$invoiceArray['InvSumAmount'],
                "registrationDate"=>$row->visited_date
                );
		}
        return $dataArray;
    }
    

}