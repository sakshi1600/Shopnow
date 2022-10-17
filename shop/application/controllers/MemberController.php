<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MemberController extends CI_Controller {

 public function __construct(){

	 	parent::__construct();

	 	$this->load->library('form_validation');

	 	$this->load->model('MemberModel');
	 	$this->load->helper(array('form', 'url', 'file'));
	 }



	 public function add($fid)

{

	 	//print_r($fid);exit;
	

	 	$data['family'] = $this->MemberModel->addmod($fid);

//print_r($data);exit;

		
		$this->load->view('add_member', $data);

				
	}


public function mem_load()
{

	$data['family'] = $this->MemberModel->getFamily();
	$data['member'] = $this->MemberModel->getMember();
//print_r($data['family']);exit;

	    $this->load->view('member_view',$data);

}
public function m_load($fid)
{

	$data['fami'] = $this->MemberModel->Family($fid);
	$data['mem'] = $this->MemberModel->Member($fid);
//print_r($data['family']);exit;

	    $this->load->view('fam_member_view',$data);

}

 public function savedata(){


     //print_r($_POST);

 	
	 	if ($this->input->post()) 

	 	{


	 		extract($_FILES);



	 			$ori_filename = $_FILES['file']['name'];

			$new_name = time()."".str_replace(' ','-', $ori_filename) ;

			
			 $config['upload_path']   = './images/';
        $config['allowed_types'] = 'png|jpg';
        $config['file_name'] = $new_name;

		$this->load->library('upload', $config);
{


            
        	$file = $this->upload->data('file_name');



        	$data['id']=$this->input->post('id');
    

        	$data['head_id']=$this->input->post('head_id');
    
        

        	$data['relation']=$this->input->post('relation');

	 		$data['fname']=$this->input->post('fname');

	 		$data['lname']=$this->input->post('lname');

	 		$data['b_date']=$this->input->post('b_date');


	 	
	 		$data['status']=$this->input->post('status');

	 		$data['wdate']=$this->input->post('wdate');

	 		$data['education']=$this->input->post('education');
	 		
			$data['file']=$ori_filename;



	 		//print_r($data);exit;



	 		$response=$this->MemberModel->saverecords($data);

	 		if ($response==true) {
	 			//echo "Record Save Successfully";
	 	
	 			$fid=$this->input->post('head_id');
	 			$data['member'] = $this->MemberModel->getMember();

	 			//print_r($fid);exit;

	 			 echo '<script language="javascript">';
        echo 'alert("Successfully Registered")'; 
      
        echo '</script>';
        redirect('MemberController/m_load/'.$fid);

	 			      
	 			  

    
	 		}
	 		else{
	 			echo "Error In Insertion";
	 		}
	 		
	 	}

	 }




}

// public function count($fid)
// {

// 	$data['member'] = $this->MemberModel->getCnt($fid);


// //print_r($data); exit;
	
// 	    $this->load->view('head_view',$data);
	 
	 
// }



	public function edit($id){



		
		
	$data['member'] = $this->MemberModel->editMember($id);
	$this->load->view('update_member', $data);

	//print_r($state);


}

	// *******************************UPDATE****************************




public function update($id)
{
		

	extract($_FILES);



	 			$ori_filename = $_FILES['file']['name'];

			$new_name = time()."".str_replace(' ','-', $ori_filename) ;

			
			 $config['upload_path']   = './images/';
        $config['allowed_types'] = 'png|jpg';
        $config['file_name'] = $_FILES['file']['name']; 

		$this->load->library('upload', $config);





            
        	$file = $this->upload->data('file_name');



if(empty($ori_filename)){
	

			$data['relation']=$this->input->post('relation');
        	
	 		$data['fname']=$this->input->post('fname');

	 		$data['lname']=$this->input->post('lname');

	 		$data['b_date']=$this->input->post('b_date');


	 		$data['status']=$this->input->post('status');

	 		if($data['status']==1)
			{
			    $weddingdate=$this->input->post('wdate');
			}
			else{
			    $weddingdate=0;
			}

	 		$data['wdate']=$weddingdate;

	 		$data['education']=$this->input->post('education');
	 	
	 		$data['file']=$this->input->post('file');

	 		
		
		$data['member'] = $this->MemberModel->updateMember($data,$id);

	
$fid=$this->input->post('head_id');
	 			 
	 			   		echo '<script language="javascript">';
  		echo 'alert("Successfully Updated")'; 
  		echo '</script>';
 redirect('MemberController/m_load/'.$fid);
    
	 		



}

else{			$data['relation']=$this->input->post('relation');
        	
	 		$data['fname']=$this->input->post('fname');

	 		$data['lname']=$this->input->post('lname');

	 		$data['b_date']=$this->input->post('b_date');


	 		$data['status']=$this->input->post('status');

	 		$data['wdate']=$this->input->post('wdate');

	 		$data['education']=$this->input->post('education');

	 	

			$data['file']=$ori_filename;


		$data['member'] = $this->MemberModel->updateMember($data,$id);

	

	 			 $fid=$this->input->post('head_id');

	 			   		echo '<script language="javascript">';
  		echo 'alert("Successfully Updated")';
  		echo '</script>';
  		 redirect('MemberController/m_load/'.$fid);


}



}


public function delete($id){

	 		$data['delete_status']=1;


	
	$data['member'] = $this->MemberModel->d_update($data, $id);

redirect('MemberController/mem_load'); 
}

}
?>