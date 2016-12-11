<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class FeaturedPlayerModel extends CI_Model {

    function getAllFeaturedPlayers() {
		   $this->db->select('*')->from('featured_players');
        $query = $this->db->get();
        return $query->result_array();

    }

    function addFeaturedPlayer($data){
    	return $this->db->insert('featured_players', $data);
    }

    function updateFeaturedPlayer($id,$data){
		$this->db->where('id', $id);
		$this->db->update('featured_players', $data);
	}

    function deleteFeaturedPlayer($id){
        $this->db->where('id', $id);
        $this->db->delete('featured_players');
    }
}