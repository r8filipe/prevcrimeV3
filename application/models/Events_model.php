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
        if(isset($_SESSION['events_filters'])){
            $filters = $_SESSION['events_filters'];
            //Verifies if there are date filters to apply to the events table 
            if(isset($filters['date_range'])){
                $range = $filters['date_range'];
                $this->db->where('date BETWEEN "'. date('yyyy-mm-dd', strtotime($range['begin'])). '" and "'. date('yyyy-mm-dd', strtotime($range['end'])).'"');
            }
            //Apply more filters here...
            
        }
        if ($slug === FALSE) {
            $query = $this->db->get();
            return $query->result_array();
        }

        $this->db->where('events.id', $slug);
        $query = $this->db->get();
        return $query->result_array();
    }

    public function insert($data){
        $this->db->insert('events', $data);
    }

    public function edit_event($id, $data){
        $this->db->where('id', $id);
        $this->db->update('events', $data);
    }

    public function uploadPhoto($data){

        $this->db->insert('photos', $data);
    }
}