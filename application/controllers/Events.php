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
            $data['events'] = $this->events_model->get_events();
            $data['title'] = 'Events archive';

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
            $data['title'] = 'Events map';


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
            $data['title'] = 'Evento ' . $event;
            $data['photos'] = $this->photos_model->getPhotos($event);
            $this->parser->parse('templates/header', $data);
            $this->parser->parse('events/details', $data);
            $this->load->view('templates/footer');
        } else {
            $this->setup_login_form();
            $this->load->view('auth/login');
        }
    }
}