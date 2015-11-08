<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Reports extends CI_Controller {

	function __construct()
    {
        parent::__construct();
        $this->load->Model('report');
        $this->load->helper('date');
    }

	public function index()
	{
		$this->load->view('login');
	}

	public function investigation()
	{
		$session_data="";
		if($this->session->userdata('logged_in')){
			$session_data = $this->session->userdata('logged_in');
		}
		$data = Array("sessionData"=>$session_data);
		$this->load->view('investigation',$data);
	}

	public function todaysVisitorReport(){
			$session_data="";
			if($this->session->userdata('logged_in')){
				$session_data = $this->session->userdata('logged_in');
			}
		$data = Array("reportData"=>$this->report->todaysReports(),"sessionData"=>$session_data);
		$this->load->view('todaysReport',$data);
	}

	public function customReport(){
		$session_data="";
			if($this->session->userdata('logged_in')){
				$session_data = $this->session->userdata('logged_in');
			}
		$StartDate = $this->input->get('StartDate');
		$EndDate = $this->input->get('EndDate');
		$BillerId = $this->input->get('BillerId');
		$data = Array("reportData"=>$this->report->customReports($StartDate, $EndDate, $BillerId),"sessionData"=>$session_data);
		$this->load->view('customReport',$data);
		
	}
}
