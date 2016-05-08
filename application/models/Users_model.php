<?php
/**
 * Created by PhpStorm.
 * User: Henrique
 * Date: 20/04/2016
 * Time: 01:38
 */

class Users_model extends CI_Model
{

    public function __construct()
    {
        $this->load->database();
    }

    public function get_users($slug = FALSE)
    {
        $this->db->select('*');
        $this->db->from('users');

        if ($slug === FALSE) {
            $query = $this->db->get();
            return $query->result_array();
        }

        $this->db->where('user_id', $slug);
        $query = $this->db->get();
        return $query->result_array();
    }

    public function edit_user($id, $data){
        $this->db->where('user_id', $id);
        $this->db->update('users', $data);
    }
}