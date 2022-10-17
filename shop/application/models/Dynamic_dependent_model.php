

<?php 

class Dynamic_dependent_model extends CI_Model{
	function fetch_state(){
		$this->db->order_by('state', 'ASC');
		$query = $this->db->get('state');
		return $query->result();
	}

	function fetch_city($state_id)
	{
		$this->db->where('state_id', $state_id);
		$this->db->order_by('city','ASC');
		$query = $this->db->get('city');
		$output =  '<option value="">Select State</option>';

		foreach($query->result as $row)
		{
			$output .='<option value="'.$row->id.'">'.$row->city.'</option>';
		}	

		return $output;
	}
}




?>