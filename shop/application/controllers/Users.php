<?php 

class Users extends CI_Controller{


	 public function index(){

	 	// $this->load->model('usermodel');Used Auto Load in Config


	 	$data['users'] = $this->usermodel->getUsers();

	 	//print_r($data);


	 	// HELPER
// $this->load->helper('abc');
// test();
	 	
	 $this->load->view('users_list',$data);

	 }

}
?>