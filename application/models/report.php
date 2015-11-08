<?php
Class Report extends CI_Model
{

   function __construct()
    {
        parent::__construct();
        $this->load->Model('jsonprocessor');
    }

   public function todaysReports(){
      if($this->session->userdata('logged_in')){
        $session_data = $this->session->userdata('logged_in');
      }
      $this->db->like('visited_date',date("Y-m-d"));
      if($session_data['access_rights']!=10){
        $this->db->where('user_id',$session_data['userid']);
      }
      
      $dataArray = Array();
      $query = $this->db->get('visitor_record');
      if($query->num_rows() > 0){
        foreach ($query->result() as $row)
        {
                $patentDetails=$this->jsonprocessor->patentDetails($row->patent_id);
                $invoiceArray=$this->jsonprocessor->invoiceAmount($row->visitor_id);
                $discountArray = $this->jsonprocessor->getDiscountInfo($row->visitor_id);
                $CounsultingCharges = $this->jsonprocessor->getCounsultingCharges($row->doctor_id);
                $patentName = $patentDetails['patentTitle'].".".$patentDetails['patentFirstName']." ".$patentDetails['patentLastName'];
                $dataArray[] = array(
                    "visitorId"=>$row->visitor_id,
                    "patentId"=>$row->patent_id,
                    "patentName"=>$patentName,
                    "gender"=>$patentDetails['patentGender'],
                    "age"=>$patentDetails['patentAge'],
                    "address"=>$patentDetails['patentAddress'],
                    "maritalStatus"=>$patentDetails['patentMaritalStatus'],
                    "contactNo"=>$patentDetails['patentMobile'],
                    "discountAmount"=>$discountArray['discountAmount'],
                    "invoiceAmount"=>$invoiceArray['InvSumAmount'],
                    "CounsultingCharges"=>$CounsultingCharges,
                    "registrationDate"=>$row->visited_date
                    );
        }
        
      }

      return($dataArray);
      
   }

   public function customReports($StartDate, $EndDate, $BillerId){
      if($this->session->userdata('logged_in')){
        $session_data = $this->session->userdata('logged_in');
      }

      if($StartDate=="" && $EndDate==""){
        $this->db->limit(10);
      }

      if($StartDate==''){
           $this->db->where('visited_date <', date('Y-m-d H:i:s'));
      }else{
          $StartDate = $StartDate." 00:00:00";
           $this->db->where('visited_date >', $StartDate); 
      }

      if($EndDate==''){
           $this->db->where('visited_date <', date('Y-m-d H:i:s'));
      }else{
          $EndDate = $EndDate." 24:00:00";
          $this->db->where('visited_date <', $EndDate); 
      }
      
      if($BillerId=="All"){
        $this->db->order_by('visited_date','desc');
        
      }else {
        $this->db->where('user_id', $BillerId); 
      }


      $dataArray = Array();
      $query = $this->db->get('visitor_record');
      if($query->num_rows() > 0){
        foreach ($query->result() as $row)
        {
                $patentDetails=$this->jsonprocessor->patentDetails($row->patent_id);
                $invoiceArray=$this->jsonprocessor->invoiceAmount($row->visitor_id);
                $discountArray = $this->jsonprocessor->getDiscountInfo($row->visitor_id);
                $CounsultingCharges = $this->jsonprocessor->getCounsultingCharges($row->doctor_id);
                $patentName = $patentDetails['patentTitle'].".".$patentDetails['patentFirstName']." ".$patentDetails['patentLastName'];
                $dataArray[] = array(
                    "visitorId"=>$row->visitor_id,
                    "patentId"=>$row->patent_id,
                    "patentName"=>$patentName,
                    "gender"=>$patentDetails['patentGender'],
                    "age"=>$patentDetails['patentAge'],
                    "address"=>$patentDetails['patentAddress'],
                    "maritalStatus"=>$patentDetails['patentMaritalStatus'],
                    "contactNo"=>$patentDetails['patentMobile'],
                    "discountAmount"=>$discountArray['discountAmount'],
                    "invoiceAmount"=>$invoiceArray['InvSumAmount'],
                    "CounsultingCharges"=>$CounsultingCharges,
                    "registrationDate"=>$row->visited_date,
                    "billerId"=>$row->user_id
                    );
        }
        
      }

      return($dataArray);
      
   }

}
