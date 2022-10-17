<?php

defined('BASEPATH') OR exit('No direct script access allowed');


class HeadController extends CI_Controller {

 public function __construct(){

	 	parent::__construct();
	
	 	$this->load->model('HeadModel');

	 	//$this->load->library('form_validation');

	 	
	 }



	public function create(){
		
		$this->load->view('head');

				
	}


	

	 public function index(){
			$state = $this->db->get("state")->result();
      $this->load->view('head', array('state' => $state )); 
	  }


	  public function headAjax($id) { 
	  	$postData = $this->input->post();
       $result = $this->db->where("state_id",$id)->get("city")->result();
       echo json_encode($result);
   }


public function savedata()
{
	$agedate = date("Y-m-d", strtotime("-21 years"));
	if($this->input->post('date')< $agedate){

//print_r($_POST);exit;
	if ($this->input->post()) 
	{
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
 		$data['fname']=$this->input->post('fname');

 		$data['lname']=$this->input->post('lname');

 		$data['date']=$this->input->post('date');

 		$data['mob_no']=$this->input->post('mob_no');

 	// $data = array('upload_data' => $this->upload->data());

 		$data['gender']=$this->input->post('gender');

 		$data['status']=$this->input->post('status');

 		$data['w_date']=$this->input->post('w_date');

 		$data['address']=$this->input->post('address');
 		$data['state_id']=$this->input->post('state');
 		$data['city_id']=$this->input->post('city');

 		$data['pin']=$this->input->post('pin');

 		$data['hobbies']=implode(', ', $this->input->post('hobbies'));

		$data['profile_image']=$ori_filename;


			//print_r($data);exit;

			$response=$this->HeadModel->saverecords($data);

			if ($response==true) 
			{
				//echo "Record Save Successfully";
	 			$data['family'] = $this->HeadModel->getFamily();
			echo '<script language="javascript">';
  		echo 'alert("Successfully Registered"); location.href="../HeadController/load"';
  		echo '</script>';
		        // redirect('HeadController/load'); 
 			}
			else
			{
				echo "Error In Insertion";
			}
	
		}
	}
}

else{
		echo '<script language="javascript">';
  		echo 'alert("Date Not Valid"); location.href="../Head/" ';
  		echo '</script>';
}
}

public function count($fid)
 {

 	$arr['member'] = $this->HeadModel->getCnt($fid);
 

//print_r($arr);exit;
	
	  $this->load->view('head_view',$arr['member']);
	 
	 
}





public function load()
{
			$data['member'] = $this->HeadModel->getCnt();	
	$data['family'] = $this->HeadModel->getFamily();
//print_r($data['member'] );exit;

	    $this->load->view('head_view',$data);
	    //$this->load->view('mem_count',$data);

}

	// *******************************Edit****************************

	public function edit($id){

		

$this->load->model("HeadModel");


	  $data['state'] = $this->db->get("state")->result();
     

	  $data['city'] = $this->db->get("city")->result();




	$data['family'] = $this->HeadModel->editHead($id);
	$this->load->view('update_head', $data);

	//print_r($state);


}


  public function updateheadAjax($id) { 
       $result = $this->db->where("state_id",$id)->get("city")->result();
       echo json_encode($result);
   }

	// *******************************UPDATE****************************




public function update($id)
{
		
		//print_r($_POST);exit;

	extract($_FILES);



	 			$ori_filename = $_FILES['profile_image']['name'];

			$new_name = time()."".str_replace(' ','-', $ori_filename) ;

			
			 $config['upload_path']   = './images/';
        $config['allowed_types'] = 'png|jpg';
        $config['file_name'] = $_FILES['profile_image']['name']; 

		$this->load->library('upload', $config);





            
        	$profile_image = $this->upload->data('file_name');

if(empty($ori_filename)){
	


        	
	 		$data['fname']=$this->input->post('fname');

	 		$data['lname']=$this->input->post('lname');

	 		$data['date']=$this->input->post('date');

	 		$data['mob_no']=$this->input->post('mob_no');

	 	// $data = array('upload_data' => $this->upload->data());

	 		$data['gender']=$this->input->post('gender');

	 		$data['status']=$this->input->post('status');

	 				if($data['status']==1)
			{
			    $weddingdate=$this->input->post('w_date');
			}
			else{
			    $weddingdate=0;
			}

	 		$data['w_date']=$weddingdate;

	 		$data['address']=$this->input->post('address');
	 		$data['state_id']=$this->input->post('state');
	 		$data['city_id']=$this->input->post('city');

	 		$data['pin']=$this->input->post('pin');

	 		$data['hobbies']=implode(', ', $this->input->post('hobbies'));
	 		//$data['profile_image']=$this->input->post('profile_image');
		
		$data['family'] = $this->HeadModel->updateHead($data,$id);

	

	 			   
	 			   		echo '<script language="javascript">';
  		echo 'alert("Successfully Updated"); location.href="../load"';
  		echo '</script>';

	 			  

    
	 		



}

else{		$data['fname']=$this->input->post('fname');

	 		$data['lname']=$this->input->post('lname');

	 		$data['date']=$this->input->post('date');

	 		$data['mob_no']=$this->input->post('mob_no');

	 	// $data = array('upload_data' => $this->upload->data());

	 		$data['gender']=$this->input->post('gender');

	 		$data['status']=$this->input->post('status');

	 		$data['w_date']=$this->input->post('w_date');

	 		$data['address']=$this->input->post('address');
	 		$data['state_id']=$this->input->post('state');
	 		$data['city_id']=$this->input->post('city');

	 		$data['pin']=$this->input->post('pin');

	 		$data['hobbies']=implode(', ', $this->input->post('hobbies'));

			$data['profile_image']=$ori_filename;



		$data['family'] = $this->HeadModel->updateHead($data,$id);

	

	 			
	 			   
	 			   		echo '<script language="javascript">';
  		echo 'alert("Successfully Updated"); location.href="../load"';
  		echo '</script>';

}



}

public function delete($id){

	 		$data['delete_status']=1;


	$this->load->model('HeadModel');
	$data['family'] = $this->HeadModel->d_update($data, $id);

 redirect('HeadController/load'); 

}




 

}

?>