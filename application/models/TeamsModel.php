<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class TeamsModel extends CI_Model {

    function getAllTeams() {
		   $this->db->select('*')->from('team');
        $query = $this->db->get();
        return $query->result_array();

    }

    function editTeam($id) {
           $this->db->select('*')->from('team');
           $this->db->where('tm_id', $id);
        $query = $this->db->get();
        return $query->result_array();

    }

    function addTeam($data){
    	return $this->db->insert('team', $data);
    }

    function updateTeam($id,$data){
		$this->db->where('tm_id', $id);
		$this->db->update('team', $data);
	}

    function deleteTeam($id){
        $this->db->where('tm_id', $id);
        $this->db->delete('team');
    }
}