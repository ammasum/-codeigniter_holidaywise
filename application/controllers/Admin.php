<?php

class Admin extends CI_Controller{

    public function __construct(){
        parent::__construct();
        $this->load->library('session');
        $this->load->library('auth');
        $this->load->model('users_mdl');
        $this->lang->load('admin_url', 'english');
        $this->load->library('form_validation');

        if(!$this->auth->is_loggin()){
            redirect('user/login');
        }
    }

    public function index(){
        $this->lang->load('admin_url', 'english');
        $this->_view('index');
    }

    public function create_post(){
        if($this->input->method() == 'post'){
            $this->form_validation->set_rules('title', 'Title', 'required');
            $this->form_validation->set_rules('post_content', 'Post Content', 'required');
            if($this->form_validation->run()){
                $file_ext = '';
                if (is_uploaded_file($_FILES['image']['tmp_name'])) {
                    $file_ext = '.' . pathinfo($_FILES['image']['name'], PATHINFO_EXTENSION);
                }
                $this->
            }
        }
        $this->_view('post/create_post');
    }

    public function edit_post($post_id){

    }

    public function delete_post($post_id){

    }

    public function post_list($page){

    }

    private function _view($page, $header_data = "", $page_data =""){
        $path = "admin/";
        $this->load->view($path . "inc/header", $header_data);
        $this->load->view($path . "inc/sidebar", $header_data);
        $this->load->view($path . "pages/" . $page, $page_data);
        $this->load->view($path . "inc/footer", $page_data);
    }

    private function _error($status_code){

    }
}