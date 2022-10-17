<?php 
class Headercrud_model extends CI_Model{

	public function saverecords($data){

		
		$this->db->insert('family',$data);
		return true;
	}
	
}
?>