<?php 

class Header_crud extends CI_Controller{


	 public function __construct(){

	 	parent::__construct();


$this->load->database();
	 	//$this->load->view('head_member');
	 	$this->load->model('Headercrud_model');
	 }
	 
	  public function index(){

	  	//$this->load->view('head_member');
	  	//  $this->load->view('files/upload_form');
	  	$state = $this->db->get("state")->result();
      $this->load->view('head', array('state' => $state )); 
	  }


	  public function headAjax($id) { 
       $result = $this->db->where("state_id",$id)->get("city")->result();
       echo json_encode($result);
   }


	 public function savedata(){
  
        //print_r($_POST);	 	
	 	
	 	if ($this->input->post()) {
	 		$data['fname']=$this->input->post('fname');

	 		$data['lname']=$this->input->post('lname');

	 		$data['date']=$this->input->post('date');

	 		$data['mob_no']=$this->input->post('mob_no');

	 	// $data = array('upload_data' => $this->upload->data());

	 		$data['gender']=$this->input->post('gender');

	 		$data['status']=$this->input->post('status');

	 		$data['w_date']=$this->input->post('w_date');

	 		$data['address']=$this->input->post('address');

	 		$data['pin']=$this->input->post('pin');

	 		$data['hobbies']=implode(', ', $this->input->post('hobbies'));


	 		
	 		print_r($data);
	 		$response=$this->Headercrud_model->saverecords($data);

	 		if ($response==true) {
	 			echo "Record Save Successfully";
	 		}
	 		else{
	 			echo "Error In Insertion";
	 		}
	 		
	 	}

	 }

	  public function store() {
        $config['upload_path'] = './images/';
        $config['allowed_types'] = 'gif|jpg|png';
        $config['max_size'] = 2000;
        $config['max_width'] = 1500;
        $config['max_height'] = 1500;

        $this->load->library('upload', $config);

        if (!$this->upload->do_upload('profile_image')) {
            $error = array('error' => $this->upload->display_errors());

            $this->load->view('files/upload_form', $error);
        } else {
            $data = array('image_metadata' => $this->upload->data());

            $this->load->view('files/upload_result', $data);
        }
    }


	
		
	}

?>