<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
 
class Login extends CI_Controller {
 
 function __construct()
 {
   parent::__construct();
   $this->load->model('authentication');

 }
 
 function index()
 {
   $this->load->view('login');
 }

 function validateUser(){

 	$username = $this->input->post('username');
 	$password = $this->input->post('password');
 	
 	$this->authentication->validateUser($username, $password);
 }

 
function logout(){
  $clearSession = $this->session->sess_destroy();
}

function changePassword(){
      $oldPassword = $this->input->post('oldPassword');
      $newPassword = $this->input->post('newPassword');
}


 
}