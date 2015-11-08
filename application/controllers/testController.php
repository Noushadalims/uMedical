<?php

class TestController extends CI_Controller{
	public function index(){
		$this->load->model("testmodel");
		echo $this->testmodel->testContent();
	}

	public function test(){
		echo date('Y-m-d H:i:s');
	}
}