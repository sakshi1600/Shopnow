<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class RegisterModel extends CI_Model {



	public function insertrecords($data){

		
		$this->db->insert('register',$data);
		return true;
	}


public function getRegister(){
	// $this->load->database(); Used Auto Load in Config


//Chain query with Active Records
	$q =  $this->db->where('delete_status',0)
					->get("register");//Select Query

	return $q->result_array();

	//print_r($result);
	}

	public function getCnt() 
{



    
	$select =   array(
                '',
                'count(member.id) as Total'
            );  
        $this->db->select($select);
        $this->db->from('member');
        $this->db->join('family','family.id = member.head_id');
        $this->db->group_by('family.id');
        $cnt = $this->db->get();
       return $cnt->result_array();

	
}


	public function displayrecordsById($id)
	{
	$query=$this->db->query("select * from family where id='".$id."'");
	return $query->result();
	}
	// /*Update*/
	// function update_head($first_name,$last_name,$email,$id)
	// {
	// $query=$this->db->query("update family SET first_name='$first_name',last_name='$last_name',email='$email' where id='$id'");
	// }


	public function editHead($id){

		$query = $this->db->get_where('family', ['id' => $id]);

		return $query->row();

	

	}



	public function state_editHead($state_id){

		$query = $this->db->get_where('state', ['state' => $state_id]);

		return $query->row();

	}


	public function updateHead($data, $id){

		$this->db->where('id',$id)
				->update('family', $data);

	}
	public function getFam(){
	// $this->load->database(); Used Auto Load in Config


//Chain query with Active Records
	$q =  $this->db->where('delete_status',0)
					->get("family");//Select Query

	

	return $q->result_array();

	}

	public function d_update($data, $id){
			$this->db->where('id',$id)->update('family',$data);

	}
}
?>