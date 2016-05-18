<?php
/**
 * Created by PhpStorm.
 * User: Henrique
 * Date: 17/05/2016
 * Time: 01:02
 */
class Categories_model extends CI_Model
{

    public function __construct(){
        $this->load->database();
    }

    public function get_categories(){
        $this->db->select('id, category');
        $this->db->from('categories');
        $query = $this->db->get();
        return $query->result_array();
    }

    public function insert($data)
    {
        $this->db->insert('categories', $data);
    }

    public function edit_category($id, $data)
    {
        $this->db->where('id', $id);
        $this->db->update('categories', $data);
    }
}