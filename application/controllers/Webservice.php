<?php

class Webservice extends My_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('events_model');
        $this->load->helper('url_helper');
        $this->load->helper('url');
        $this->load->helper('form');
    }

    public function report()
    {
        $db_debug = $this->db->db_debug; //save setting
        $this->db->db_debug = FALSE; //disable debugging for queries

        $coordenadas = explode(',', $this->input->get('coordenadas'));
        $data['address'] = $this->input->get('address');
        $data['local_type_id'] = $this->input->get('local');
        $data['sub_category_id'] = $this->input->get('event');
        $data['obs'] = $this->input->get('obs');
        $data['lat'] = $coordenadas[0];
        $data['long'] = $coordenadas[1];


        if (!$this->db->insert('events', $data)) {
            $message['status'] = 'FAIL';
            $message['message'] = $this->db->error();
        } else {
            $message['status'] = 'SUCCESS';
            $message['message'] = 'Evento inserido comm sucesso';
            $message['event'] = $this->db->insert_id();
        }

//        $this->db->db_debug = $db_debug; //restore setting
//        return json_encode($message);
        $this->output->set_content_type('application/json')
            ->set_output(json_encode($message));

    }

    public function image($id = NULL)
    {
        $message['status'] = 'FAIL';

        if ($id != NULL) {
            $target_path = "uploads/";
            $target_path = $target_path . basename($_FILES['image']['name']);

            try {
                if (!move_uploaded_file($_FILES['image']['tmp_name'], $target_path)) {
                    throw new Exception('Could not move file');
                } else {
                    $message['status'] = 'SUCCESS';
                }

            } catch (Exception $e) {
                $message['status'] = 'FAIL';

            }

        }
        $this->output->set_content_type('application/json')
            ->set_output(json_encode($message));

    }
}