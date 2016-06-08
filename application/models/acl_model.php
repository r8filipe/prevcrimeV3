<?php

/**
 * Created by PhpStorm.
 * User: Filipe
 * Date: 08-06-2016
 * Time: 15:30
 */
class acl_model extends MY_Model
{
    public function __construct()
    {
        $this->load->database();
    }

    public function get_acl_by_user($user)
    {
        $this->db->select('a.ai, ac.category_id, aa.action_id, aa.action_id, aa.action_desc, aa.action_id');
        $this->db->from('acl_actions as aa');
        $this->db->join('acl_categories as ac', 'ac.category_id = aa.category_id');
        $this->db->join('(select ai, action_id from acl where user_id = ' . $user . ') as a', 'a.action_id = aa.action_id', 'left');
        $query = $this->db->get();
        return $query->result_array();
    }

    public function get_acl()
    {
        $this->db->select('ac.category_id, aa.action_id, aa.action_id, aa.action_desc, aa.action_id');
        $this->db->from('acl_actions as aa');
        $this->db->join('acl_categories as ac', 'ac.category_id = aa.category_id');
        $query = $this->db->get();
        return $query->result_array();
    }

    public function get_acl_categories()
    {
        $this->db->select('category_desc, category_id');
        $this->db->from('acl_categories');
        $query = $this->db->get();
        return $query->result_array();
    }

    public function set_acl_user($user_id, $acl_list)
    {
        $this->db->delete('acl', array('user_id' => $user_id));
        foreach ($acl_list as $list) {
            $acl = array('action_id' => $list,
                'user_id' => $user_id);
            $this->db->insert('acl', $acl);
        }


    }
}