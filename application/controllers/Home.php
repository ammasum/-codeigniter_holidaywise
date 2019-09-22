<?php

class Home extends CI_Controller{
    public function __construct(){
        parent::__construct();
        $this->lang->load('home_url', 'english');
    }

    public function index(){
        $this->_view("index");
    }

    private function _view($page, $data = ''){
        $path = "home/";
        $this->load->view($path . "inc/header", $data);
        $this->load->view($path . "pages/" . $page, $data);
        $this->load->view($path . "inc/footer");
    }
}