<?php

class Events extends My_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('events_model');
        $this->load->model('photos_model');
        $this->load->helper('url_helper');
        $this->load->helper('url');
        $this->load->helper('form');
        $this->load->helper('html');
    }

    public function index()
    {

        $this->load->library('parser');
        $this->load->helper('url');
        $this->is_logged_in();

        if (!empty($this->auth_role)) {
            echo "Teste: ".var_dump($this->input->post('begin_date'));
            if($this->input->post('begin_date')!=null && $this->input->post('end_date')!=null){
                $filters = array('date_range' => array( 'begin' => $_POST['begin_date'],
                                                        'end'   => $_POST['end_date']
                                                      )
                                );
                $this->session->set_userdata('events_filters', $filters);
            }
            $data['events'] = $this->events_model->get_events();

            $this->parser->parse('templates/header', $data);
            $this->parser->parse('events/events', $data);
            $this->load->view('templates/footer');
        } else {
            $this->setup_login_form();
            $this->load->view('auth/login');
        }

    }

    public function getmap()
    {
        $this->load->library('parser');
        $this->load->helper('url');

        $this->is_logged_in();

        if (!empty($this->auth_role)) {
            $data['events'] = $this->events_model->get_events();

            $this->parser->parse('templates/header', $data);
            $this->parser->parse('events/map', $data);
            $this->load->view('templates/footer');
        } else {
            $this->setup_login_form();
            $this->load->view('auth/login');
        }
    }

    public function insert_event_porto()
    {
        for ($i = 0; $i < 20; $i++) {
            $data = array(
                'lat' => floatVal("41" . '.' . '1' . rand(5, 8) . rand(0, 9) . rand(0, 9)),
                'long' => floatVal("-8" . '.' . '6' . rand(0, 5) . rand(0, 9) . rand(0, 9)),
                'sub_category_id' => rand(1, 18),
                'local_type_id' => rand(1, 4),
                'address' => "Rua exemplo nº" . $i,
            );
            $this->events_model->insert($data);
        }
    }


    public function details($event)
    {
        $this->load->library('parser');
        $this->load->helper('url');
        $this->load->helper('html');
        $this->is_logged_in();

        if (!empty($this->auth_role)) {
            $data['event'] = $this->events_model->get_events($event);
            $data['photos'] = $this->photos_model->getPhotos($event);
            $this->parser->parse('templates/header', $data);
            $this->parser->parse('events/details', $data);
            $this->load->view('templates/footer');
        } else {
            $this->setup_login_form();
            $this->load->view('auth/login');
        }
    }

    public function editEvent(){
        $id = $this->input->post('id');
        $data = array('obs' => $this->input->post('obs'));
        $this->events_model->edit_event($id, $data);
        $this->details($id);

    }

    function uploadPhoto(){
        $config['upload_path'] = './images/';
        $config['allowed_types'] = 'gif|jpg|png';
        $config['max_size']	= '2048000';
        $config['max_width']  = '1024';
        $config['max_height']  = '768';
        $id = $this->input->post('event_id');
        $this->load->library('upload', $config);

        if ($this->upload->do_upload()){

            //$data = array('upload_data' => $this->upload->data());
            $image = $this->upload->data();
            $data = array(
                'event_id' => $this->input->post('event_id'),
                'photo' => $image['file_name'],
            );
            $this->events_model->uploadPhoto($data);
            $this->details($id);
        }else{
            $error = array('error' => $this->upload->display_errors());
            var_dump($error);
        }

    }

    public function getstatistics()
    {
        $this->load->library('parser');
        $this->load->helper('url');

        $this->is_logged_in();

        if (!empty($this->auth_role)) {
            $data['events'] = $this->events_model->get_events();

            $this->parser->parse('templates/header', $data);
            $this->parser->parse('statistics/statistics', $data);
            $this->load->view('templates/footer');
        } else {
            $this->setup_login_form();
            $this->load->view('auth/login');
        }
    }
}