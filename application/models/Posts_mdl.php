<?php 

class Posts_mdl extends CI_Model{
    public function insert_post_data($img_ext){
        $data = array(
            'title' => $this->input->post('title'),
            'content' => $this->input->post('post_content'),
            'img' => $img_ext,
            'seo_url' => string_to_url_form($this->input->post('title')),
            'status' => $this->input->post('status')
        );

        $this->db->insert('posts', $data);
        return $this->db->insert_id();
    }

    public function update_post_data($post_id, $img_ext){
        $this->db->where('id', $post_id);
        if($img_ext){
            $this->db->set('img', $img_ext);
        }
        $data = array(
            'title' => $this->input->post('title'),
            'content' => $this->input->post('post_content'),
            'seo_url' => string_to_url_form($this->input->post('title')),
            'status' => $this->input->post('status')
        );
        $this->db->update('posts', $data);
    }

    public function delete_post($post_id){
        $this->db->where('id', $post_id);
        $this->db->delete('posts');
    }

    public function get_post($post_id = ''){
        if($post_id){
            $this->db->where('id', $post_id);
        }

        $result = $this->db->get('posts');
        return $result->num_rows() > 0 ? $result : false;
    }

}