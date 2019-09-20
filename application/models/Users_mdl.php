<?php

class Users_mdl extends CI_Model{
    public function get_user($user_id = ''){
        if($user_id){
            $this->db->where('id', $user_id);
        }
        $result = $this->db->get('users');
        return $result->num_rows() > 0 ? $result : false;
    }

    public function is_loggin(){
    }

    public function get_user_with_identity_password($identity, $password = ''){
        if($password){
            $this->db->where('password', $password);
        }
        $this->db->where('email', $identity);
        return $this->get_user();
    }

}