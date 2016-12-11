<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class NewsModel extends CI_Model {

    function getAllNews() {
		   $this->db->select('*')->from('news');
        $query = $this->db->get();
        return $query->result_array();

    }

    function addNews($data){
    	return $this->db->insert('news', $data);
    }

    function updateNews($id,$data){
		$this->db->where('news_id', $id);
		$this->db->update('news', $data);
	}
}