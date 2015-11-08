<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
session_start(); 
class Home extends CI_Controller {


	public function __construct()
	 {
	   parent::__construct();



	   if(!$this->session->userdata('logged_in'))
		   {
		     redirect('login', 'refresh');
		   }
	 	}

	 	/*$session_data="";
		if($this->session->userdata('logged_in')){
			$session_data = $this->session->userdata('logged_in');
		}*/



	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -  
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in 
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see http://codeigniter.com/user_guide/general/urls.html
	 */
	public function index()
	{
		$session_data="";
		if($this->session->userdata('logged_in')){
			$session_data = $this->session->userdata('logged_in');
		}
		$data = Array("sessionData"=>$session_data);
		$this->load->view('home',$data);
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */