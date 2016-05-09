<?php
/**
 * Created by PhpStorm.
 * User: Henrique
 * Date: 07/05/2016
 * Time: 17:32
 */
class Language_switch extends CI_Controller
{
    public function __construct() {
        parent::__construct();
        $this->load->helper('url');
    }

    function switchLanguage($language = "") {
        $language = ($language != "") ? $language : "english";
        $this->session->set_userdata('language', $language);
        redirect(base_url());
    }
}