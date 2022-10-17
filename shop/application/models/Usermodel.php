<?php 
class Usermodel extends CI_Model{

	
public function getUsers(){
	// $this->load->database(); Used Auto Load in Config


//Chain query with Active Records
	$q =  $this->db->where('id',2)
					->get("users");//Select Query

	

	return $q->result_array();

	//print_r($result);
	}
}
?>