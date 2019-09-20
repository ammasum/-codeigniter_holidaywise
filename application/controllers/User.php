<?php
class User extends CI_Controller{
    private $login_error = false;

    public function __construct(){
        parent::__construct();
        $this->load->library('session');
        $this->load->library('auth');
        $this->load->model('users_mdl');
        $this->lang->load('admin_url', 'english');
        $this->load->library('form_validation');
    }

    public function index(){
        
    }

    public function login(){
        if($this->auth->is_loggin()){
            redirect('admin/');
        }
        if($this->input->method() == 'post'){
            $this->form_validation->set_rules('identity', 'Email', 'required');
            $this->form_validation->set_rules('password', 'Email', 'required');
            if($this->form_validation->run()){
                if($user = $this->auth->is_user($this->input->post('identity'), $this->input->post('password'))){
                    $this->auth->login($user->result()[0]);
                    redirect('admin/');
                }else{
                    $this->login_error = '<p>Wornge Email or Password</p>';
                }
            }
        }
        $data['error'] = $this->login_error;
        $this->load->view('admin/pages/user/login', $data);
    }

    public function logout(){
        if($this->auth->is_loggin()){
            $this->auth->logout();
        }
        redirect('user/login');
    }
    
    private function _view(){
        $this->load->view('');
    }
}