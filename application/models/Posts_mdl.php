<?php 

class Posts_mdl extends CI_Model{
    public function insert_post_data($img_ext){
        $data = array(
            'title' => $this->input->post('title'),
            'content' => $this->input->post('post_content'),
            'img' => $img_ext
        );

        $this->db->insert('posts', $data);
        return $this->db->insert_id();
    }

    public function get_post($post_id = ''){
        if($post_id){
            $this->db->where('id', $post_id);
        }

        $result = $this->db->get('posts');
        return $result->num_rows() > 0 ? $result : false;
    }

    public function delete_post($post_id){
        $this->db->where('id', $post_id);
        $this->db->delete('posts');
    }
}