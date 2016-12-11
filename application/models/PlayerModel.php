<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class PlayerModel extends CI_Model {

    function getAllPlayers() {
		   $this->db->select('*')->from('user_profiles');
        $query = $this->db->get();
        return $query->result_array();

    }

    function addPlayer($data){
    	return $this->db->insert('user_profiles', $data);
    }

    function updatePlayer($id,$data){
		$this->db->where('usr_id', $id);
		$this->db->update('user_profiles', $data);
	}
}