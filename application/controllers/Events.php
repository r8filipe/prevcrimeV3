<?php

class Events extends My_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('events_model');
        $this->load->helper('url_helper');
        $this->load->helper('url');
        $this->load->helper('form');
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
    
    public function details($event){
        $this->load->library('parser');
        $this->load->helper('url');
        $this->is_logged_in();
        if (!empty($this->auth_role)) {
            $data['event'] = $this->events_model->get_events($event);
            $data['title'] = 'Evento '.$event['id'];
            
            $this->parser->parse('templates/header', $data);
            $this->parser->parse('events/details', $data);
            $this->load->view('templates/footer');
        } else {
            $this->setup_login_form();
            $this->load->view('auth/login');
        }
    }
}