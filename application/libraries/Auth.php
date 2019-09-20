<?php

class Auth{
    private $ci;
    public function __construct(){
        $this->ci =& get_instance();
    }
    
    public function login($user){
        $sess_data = array(
            'id' => $user->id,
            'email' => $user->email,
            'is_loggin' => true
        );
        $this->ci->session->set_userdata($sess_data);

    }

    public function logout(){
        $sess_data = array(
            'id' => '',
            'email' => '',
            'is_loggin' => false
        );
        $this->ci->session->set_userdata($sess_data);
    }

    public function is_loggin(){
        return $this->ci->session->userdata('is_loggin') || false;
    }

    public function is_user($identity, $password){
        return $this->ci->users_mdl->get_user_with_identity_password($identity, $password);
    }
}