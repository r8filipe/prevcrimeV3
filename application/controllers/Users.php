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

            $this->parser->parse('templates/header', $data);
            $this->parser->parse('users/createUser', $data);
            $this->load->view('templates/footer');
        } else {
            $this->setup_login_form();
            $this->load->view('auth/login');
        }
    }

    public function editUser($id, $username, $email, $role, $ban, $passwd){
        $result = array( 'username'=>$username,
            'email'=>$email,
            'auth_level'=>$role,
            'banned'=>$ban,
            'passwd'=>$passwd);
        $this->Users_model->edit_user( $id , $result );
    }
}