<?php

defined('BASEPATH') OR exit('No direct script access allowed');


class PasswordController extends CI_Controller {

 public function __construct(){

	 	parent::__construct();
	
	 	$this->load->model('PasswordModel');

	 	//$this->load->library('form_validation');

	 	
	 }



	public function password(){
		
		$this->load->view('password');

			
}


public function update()


{
		$password=md5($this->input->post('password'));

	 		$data['psw']=md5($this->input->post('n_password'));

	 		$data['psw_repeat']=md5($this->input->post('c_password'));

	 		
		
		$data= $this->PasswordModel->updatePassword($data);
		//print_r($data);exit;

	

	 			   
	 			   		echo '<script language="javascript">';
  		echo 'alert("Password Updated"); location.href="../Login"';
  		echo '</script>';

	 			  

    
	 		



}
	}
?>