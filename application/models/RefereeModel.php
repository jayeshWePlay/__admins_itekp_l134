<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class RefereeModel extends CI_Model {

    function getAllReferee() {
		   $this->db->select('*')->from('referees');
        $query = $this->db->get();
        return $query->result_array();

    }

    function addReferee($data){
    	return $this->db->insert('referees', $data);
    }

    function updateReferee($id,$data){
		$this->db->where('ref_id', $id);
		$this->db->update('referees', $data);
	}

    function deleteReferee($id){
        $this->db->where('ref_id', $id);
        $this->db->delete('referees');
    }
}