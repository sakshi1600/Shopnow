<?php

	defined('BASEPATH') OR exit('No direct script access allowed');

	class LoginController extends CI_Controller 
	{

 		public function __construct()
 		{

		 	parent::__construct();
			$this->load->model('LoginModel');
			//$this->load->library('form_validation');

	 	
		}



public function index()
	{
		$this->load->view('login');

	}

public function insertdata()
{
		//print_r($_POST);exit;

	if ($this->input->post()) 
	{
		
	  		$pass=md5($this->input->post('psw'));

	  	
	 		
			$email=$this->input->post('email');
		
			$password=$pass;
			
			$response=$this->LoginModel->insertrecords($email,$password);

			

			if ($response==true) 
				{
					//print_r($response);exit;
					$this->session->set_userdata($response);

	
					//echo "Record Save Successfully";exit;
		 			$data['login'] = $this->LoginModel->getRegister();
					echo '<script language="javascript">';
	  				echo 'alert("Login Successfully"); location.href="../HomeController/home"';
	  				echo '</script>';
			        // redirect('HeadController/load'); 
	 			}
				else
				{
				echo '<script language="javascript">';
	  				echo 'alert("Email Or Password Not Match")';
	  				echo '</script>';
			       redirect('Login'); 
				}
		}
	}




public function load()
{
		
	$data['login'] = $this->LoginModel->getRegister();
//print_r($data['register'] );exit;

	    $this->load->view('h_view',$data);
	    //$this->load->view('mem_count',$data);

}
    public function logout()
    {
        $this->session->sess_destroy();
        redirect('Login');
    }

}




?>