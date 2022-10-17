<?php 

class Blog extends CI_Controller{


	 public function index(){

	 	$this->load->model('authenticate');
	 	$data = $this->authenticate->getData();

	 	print_r($data); 
	 	$this->load->view('blog_index');

	 }

	public function add(){
		echo "add function from blog controller";
	}
}
?>