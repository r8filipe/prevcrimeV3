<?php
/**
 * Created by PhpStorm.
 * User: Henrique
 * Date: 17/05/2016
 * Time: 00:57
 */
class Categories extends My_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('categories_model');
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
            $data['categories'] = $this->categories_model->get_categories();

            $this->parser->parse('templates/header', $data);
            $this->parser->parse('categories/categories', $data);
            $this->load->view('templates/footer');
        } else {
            $this->setup_login_form();
            $this->load->view('auth/login');
        }

    }

}