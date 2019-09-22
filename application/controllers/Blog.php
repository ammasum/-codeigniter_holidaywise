<?php

class Blog extends CI_Controller{
    public function __construct(){
        parent::__construct();
        $this->lang->load('home_url', 'english');
        $this->load->model('posts_mdl');
        $this->load->helper('home_helper');
    }
    public function index(){
        $posts = $this->posts_mdl->get_post();
        $data['posts'] = $posts;
        $this->_view('blog/index', $data);
    }

    public function post_details($post_id){
        $post = $this->posts_mdl->get_post($post_id);
        if($post){
            $data['post'] = $post->result();
            $this->_view('blog/post_details', $data);
        }else{
            $this->_error(400);
        }
    }

    private function _error($code){

    }

    private function _view($page, $data = ""){
        $path = 'home/';
        $this->load->view($path . 'inc/header', $data);
        $this->load->view($path . 'pages/' . $page, $data);
        $this->load->view($path . 'inc/footer');
    }
}