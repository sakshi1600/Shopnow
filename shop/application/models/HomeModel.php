<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class HomeModel extends CI_Model {



public function getHome() 
{
    $query = $this->db->get_where('family', ['delete_status' => 0]);
    if ($query->num_rows() > 0 )
    {
       $records = $query->result_array();
       $data['count'] = count($records);
       $data['all_records'] = $records;
       return $data;
    }  
}
}
?>