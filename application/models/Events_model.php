<?php

class Events_model extends CI_Model
{

    public function __construct()
    {
        $this->load->database();
    }

    public function get_events($slug = FALSE)
    {
        $this->db->select('events.id, lat, long, obs, sub_categories.occurrence, categories.category, local_type_id, address, events.created_at, icon');
        $this->db->from('events');
        $this->db->join('sub_categories', 'sub_categories.id = events.sub_category_id');
        $this->db->join('categories', 'categories.id = sub_categories.category_id');
        //Verifies if there are filters to apply to the events table 
        if (is_array($slug)) {
            if(isset($slug['begin_date']) && isset($slug['end_date'])) {
                $this->db->where('events.created_at BETWEEN "' . date('Y-m-d', strtotime($slug['begin_date'])) . '" and "' . date('Y-m-d', strtotime($slug['end_date'])) . '"');
            }
            if(isset($slug['category'])) {
                $this->db->where('categories.id =' . $slug['category']);
            }
            $query = $this->db->get();
            return $query->result_array();
        } else if ($slug === FALSE) {
            $query = $this->db->get();
            return $query->result_array();
        } else {
            $this->db->where('events.id', $slug);
            $query = $this->db->get();
            return $query->result_array();
        }


    }


    public function get_events_by_categories()
    {
        $this->db->select('categories.category, count(*) as num');
        $this->db->from('events');
        $this->db->join('sub_categories', 'sub_categories.id = events.sub_category_id');
        $this->db->join('categories', 'categories.id = sub_categories.category_id');
        $this->db->group_by('categories.category');

        $query = $this->db->get();
        return $query->result_array();
    }

    public function insert($data)
    {
        $this->db->insert('events', $data);
    }

    public function edit_event($id, $data)
    {
        $this->db->where('id', $id);
        $this->db->update('events', $data);
    }

    public function uploadPhoto($data)
    {

        $this->db->insert('photos', $data);
    }
}