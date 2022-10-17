<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MemberModel extends CI_Model {



public function addmod($fid){

	$query= $this->db->get_where('family',['id'=>$fid]);


return $query->row();
		//return $query->result_array();


	}



	public function saverecords($data){

		
		$this->db->insert('member',$data);
		return true;
	}



public function getMember(){
	// $this->load->database(); Used Auto Load in Config


//Chain query with Active Records
	$q =  $this->db->where('delete_status',0)
					->get("member");//Select Query

	

	return $q->result_array();

	//print_r($result);
	}

public function getFamily(){

	$query= $this->db->get_where('family',['delete_status'=>0]);


//return $query->row();
	return $query->result_array();


	}

	public function get_Fam($id){

	$query= $this->db->get_where('family',['id'=>$id]);


return $query->row();
	//return $query->result_array();


	}
public function Family($fid){

	$query= $this->db->get_where('family',['id'=>$fid]);


//return $query->row();
	return $query->result_array();


	}

	public function Member($fid){
	// $this->load->database(); Used Auto Load in Config


//Chain query with Active Records
	$q =  $this->db->get_where('member',['head_id'=>$fid,'delete_status'=>0]);
	// where('head_id',$fid)
	// 				->get("member");//Select Query

	

	return $q->result_array();

	//print_r($result);
	}




	public function editMember($id){

		$query = $this->db->get_where('member', ['id' => $id]);

		return $query->row();

	}

	public function updateMember($data, $id){

		$this->db->where('id',$id)
				->update('member', $data);

	}

	public function d_update($data, $id){
			$this->db->where('id',$id)->update('member',$data);

	}

// 	public function getCnt($fid) 
// {
// $query = $this->db->query("select COUNT(*) AS cnt from member where head_id='".$fid."'");


//     return $query->row();

   
	
// }

}
	?>