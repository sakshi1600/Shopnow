<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class HomeController extends CI_Controller {

 public function __construct(){

	 	parent::__construct();

	 	$this->load->library('form_validation');

	 	$this->load->model('HomeModel');
	 	$this->load->helper(array('form', 'url', 'file'));
	 }



	public function home(){



			
		
		$this->load->view('home');

				
	}
}
?>