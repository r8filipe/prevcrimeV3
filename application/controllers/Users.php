<?php
/**
 * Created by PhpStorm.
 * User: Henrique
 * Date: 20/04/2016
 * Time: 01:18
 */

class Users extends My_Controller{
    public function __construct(){
        parent::__construct();
        $this->load->model('users_model');
        $this->load->helper('url_helper');
        $this->load->helper('url');
        $this->load->helper('form');
    }
    
    public function index(){

        $this->load->library('parser');
        $this->load->helper('url');
        $this->is_logged_in();

        if (!empty($this->auth_role)) {
            $data['users'] = $this->users_model->get_users();
            $data['title'] = 'Users archive';

            $this->parser->parse('templates/header', $data);
            $this->parser->parse('users/users', $data);
            $this->load->view('templates/footer');
        } else {
            $this->setup_login_form();
            $this->load->view('auth/login');
        }
    }

    public function details($user){
        $this->load->library('parser');
        $this->load->helper('url');
        $this->is_logged_in();
        if (!empty($this->auth_role)) {
            $data['user'] = $this->users_model->get_users($user);
            $data['title'] = 'User '.$user['id'];

            $this->parser->parse('templates/header', $data);
            $this->parser->parse('users/details', $data);
            $this->load->view('templates/footer');
        } else {
            $this->setup_login_form();
            $this->load->view('auth/login');
        }
    }

    public function createUser(){
        $this->load->library('parser');
        $this->load->helper('url');
        $this->is_logged_in();
        if (!empty($this->auth_role)) {
            $data['title'] = 'Create User';

            $this->parser->parse('templates/header', $data);
            $this->parser->parse('users/createUser', $data);
            $this->load->view('templates/footer');
        } else {
            $this->setup_login_form();
            $this->load->view('auth/login');
        }
    }
}