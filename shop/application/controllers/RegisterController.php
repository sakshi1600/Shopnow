<?php

	defined('BASEPATH') OR exit('No direct script access allowed');

	class RegisterController extends CI_Controller 
	{

 		public function __construct()
 		{

		 	parent::__construct();
			$this->load->model('RegisterModel');
			//$this->load->library('form_validation');

	 	
		}



public function index()
	{
		$this->load->view('register');
	}

public function insertdata()
{
		//print_r($_POST);exit;

	if ($this->input->post()) 
	{

		 $pass=md5($this->input->post('psw'));
     $passw=md5($this->input->post('psw_repeat'));

     //print_r($pass);
     //print_r($passw); exit;


		extract($_FILES);
		$ori_filename = $_FILES['profile_image']['name'];
	$new_name = time()."".str_replace(' ','-', $ori_filename) ;
	$config['upload_path']   = './images/';
    $config['allowed_types'] = 'png|jpg';
    $config['file_name'] = $new_name;
    $this->load->library('upload', $config);
		{
	  		$profile_image = $this->upload->data('file_name');

	  		$data['id']=$this->input->post('id');
	 		$data['name']=$this->input->post('name');
			$data['email']=$this->input->post('email');
			$data['mob']=$this->input->post('mob');
			$data['psw']=$pass;
			$data['psw_repeat']=$passw;
			$data['profile_image']=$ori_filename;
			$response=$this->RegisterModel->insertrecords($data);

			if ($response==true) 
				{
					//echo "Record Save Successfully";
		 			$data['register'] = $this->RegisterModel->getRegister();
					
			        redirect('Login'); 
	 			}
				else
				{
					echo "Error In Insertion";
				}
		}
	}
}



public function load()
{
		
	$data['register'] = $this->RegisterModel->getRegister();
//print_r($data['register'] );exit;

	    $this->load->view('h_view',$data);
	    //$this->load->view('mem_count',$data);

}
}



?>