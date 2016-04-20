<?php

class Photos_model extends CI_Model
{

    public function __construct()
    {
        $this->load->database();
    }

    public function get_events($slug = FALSE)
    {
        $this->db->select('events.id, lat, long, sub_categories.occurrence, categories.category, local_type_id, address, events.created_at');
        $this->db->from('events');
        $this->db->join('sub_categories', 'sub_categories.id = events.sub_category_id');
        $this->db->join('categories', 'categories.id = sub_categories.category_id');
        if ($slug === FALSE) {
            $query = $this->db->get();
            return $query->result_array();
        }

        $this->db->where('events.id', $slug);
        $query = $this->db->get();
        return $query->result_array();
    }

    public function insert($data)
    {
        $this->db->insert('photos', $data);
    }

    public function getPhotos($slug = FALSE)
    {
        $query = $this->db->get_where('photos', array('event_id' => $slug));
        return $query->result_array();
    }
}