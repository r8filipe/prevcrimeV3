<?php

class Events_model extends CI_Model
{

    public function __construct()
    {
        $this->load->database();
    }

    public function get_events($slug = FALSE)
    {
        if ($slug === FALSE) {
            $this->db->select('*');
            $this->db->from('events');
            $this->db->join('sub_categories', 'sub_categories.id = events. sub_category_id');
            $this->db->join('categories', 'categories.id = sub_categories.category_id');
            $query = $this->db->get();
            return $query->result_array();
        }

        $query = $this->db->get_where('events', array('id' => $slug));
        return $query->row_array();
    }

    public function insert($data){
        $this->db->insert('events', $data);
    }
}