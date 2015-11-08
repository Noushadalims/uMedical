<?php

class Removing extends CI_Controller {


	public function index(){
		
	}

	public function investigation($id){
		$tableName = "investigation_information";
		$this->db->where('investigation_id', $id);
		$status =$this->db->delete($tableName); 
		if($status){
			echo "Success";
		}else{
			echo "Error";
		}
	}

	public function visitorRecord($id=null){

		$tables = array('investigation_record', 'visitor_record');
		$this->db->where('visitor_id', $id);
		$status = $this->db->delete($tables);

		if($status){
			echo "Success";
		}else{
			echo "Error";
		}
	}

	public function doctor(){

	}

	
	public function user(){

	}

	public function removeVisitorInv($visitorId, $patentId, $invId){
		$this->db->where('visitor_id', $visitorId);
		$this->db->where('patent_id', $patentId);
		$this->db->where('investigation_id', $invId); 
		$tableName = "investigation_record";
		$status =$this->db->delete($tableName); 
		if($status){
			echo "Success";
		}else{
			echo "Error";
		}
	}
}

