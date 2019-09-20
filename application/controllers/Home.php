<?php

class Home extends CI_Controller{
    public function index(){
        $this->_view("index");
    }

    private function _view($page, $header_data = "", $page_data = ""){
        $path = "home/";
        $this->load->view($path . "inc/header", $header_data);
        $this->load->view($path . "pages/" . $page, $page_data);
        $this->load->view($path . "inc/footer");
    }
}