<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
 
class Login extends CI_Controller {
 
 function __construct()
 {
   parent::__construct();

 }
 
 function index()
 {
   $this->load->view('login');
 }

   public function logout(){
      $clearSession = $this->session->sess_destroy();

      echo $clearSession;
   }
 
}