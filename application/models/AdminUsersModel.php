<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class AdminUsersModel extends CI_Model {

    function verify_admin($username,$password) {
		   $this->db->select('adm_id, adm_username, adm_email')->where('adm_username', $username)->where('adm_password', $password)->from('admin_users')->limit(1);
        $query = $this->db->get();
        return $query->result_array();

    }
}