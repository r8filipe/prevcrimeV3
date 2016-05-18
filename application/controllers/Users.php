<?php

/**
 * Created by PhpStorm.
 * User: Henrique
 * Date: 20/04/2016
 * Time: 01:18
 */
class Users extends My_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('users_model');
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
            $data['users'] = $this->users_model->get_users();

            $this->parser->parse('templates/header', $data);
            $this->parser->parse('users/users', $data);
            $this->load->view('templates/footer');
        } else {
            $this->setup_login_form();
            $this->load->view('auth/login');
        }
    }

    public function details($user)
    {
        $this->load->library('parser');
        $this->load->helper('url');
        $this->is_logged_in();
        if (!empty($this->auth_role)) {
            $data['user'] = $this->users_model->get_users($user);
            $data['user'][0]['banned'] = $data['user'][0]['banned'] == 0 ? 'Não' : 'Sim';

            $this->parser->parse('templates/header', $data);
            $this->parser->parse('users/details', $data);
            $this->load->view('templates/footer');
        } else {
            $this->setup_login_form();
            $this->load->view('auth/login');
        }
    }

    public function info()
    {
        $this->load->library('parser');
        $this->load->helper('url');
        $this->is_logged_in();
        if (!empty($this->auth_role)) {
            $data['user'] = $this->users_model->get_users($this->auth_user_id);

            $this->parser->parse('templates/header', $data);
            $this->parser->parse('users/editUser', $data);
            $this->load->view('templates/footer');
        } else {
            $this->setup_login_form();
            $this->load->view('auth/login');
        }
    }

    public function createUser()
    {
        $this->load->library('parser');
        $this->load->helper('url');
        $this->load->helper('form');
        $this->load->library('form_validation');
        $data['title'] = 'Novo Utilizador';
        $this->is_logged_in();

        $this->form_validation->set_rules('username', 'username', 'required');

        if (!empty($this->auth_role)) {
            if ($this->form_validation->run() === FALSE) {
                $this->load->view('templates/header', $data);
                $this->load->view('users/createUser');
                $this->load->view('templates/footer');
            } else {
                $this->users_model->insert();
                $data['users'] = $this->users_model->get_users();
                $this->parser->parse('templates/header', $data);
                $this->parser->parse('users/users', $data);
                $this->load->view('templates/footer');
            }
        } else {
            $this->setup_login_form();
            $this->load->view('auth/login');
        }
    }

    public function editUser()
    {
        $this->load->library('parser');
        $this->load->helper('url');
        $this->is_logged_in();
        if (!empty($this->auth_role)) {
            $id = $this->input->post('user_id');
            $data = array('username' => strtolower($this->input->post('username')),
                'passwd' => $this->authentication->hash_passwd($this->input->post('password'))
            );
            $this->users_model->edit_user($id, $data);

            $data['users'] = $this->users_model->get_users();
            $this->parser->parse('templates/header', $data);
            $this->parser->parse('users/users', $data);
            $this->load->view('templates/footer');
        } else {
            $this->setup_login_form();
            $this->load->view('auth/login');
        }
    }
}