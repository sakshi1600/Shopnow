<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class PasswordModel extends CI_Model {



	public function saverecords($data){

		
		$this->db->insert('family',$data);
		return true;
	}
		public function updatePassword($data){

		$this->db->update('register', $data);

	}
}
	?>