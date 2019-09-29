<?php

class Admin extends CI_Controller{

    public function __construct(){
        parent::__construct();
        $this->load->library('session');
        $this->load->library('auth');
        $this->lang->load('admin_url', 'english');
        $this->load->library('form_validation');
        $this->load->model('users_mdl');
        $this->load->model('posts_mdl');
        $this->load->helper('admin');

        if(!$this->auth->is_loggin()){
            redirect('user/login');
        }
    }

    public function index(){
        $data["nums_post"] = $this->posts_mdl->count_post();
        $this->_view('index', $data);
    }

    public function create_post(){
        if($this->input->method() == 'post'){
            $this->form_validation->set_rules('title', 'Title', 'required');
            $this->form_validation->set_rules('post_content', 'Post Content', 'required');
            $this->form_validation->set_rules('status', 'Status', 'required|in_list[0,1]');
            if($this->form_validation->run()){
                $img_ext = '';
                if (is_uploaded_file($_FILES['image']['tmp_name'])) {
                    $img_ext = '.' . pathinfo($_FILES['image']['name'], PATHINFO_EXTENSION);
                }
                $post_id = $this->posts_mdl->insert_post_data($img_ext);
                if($img_ext){
                    $this->_post_image_upload($post_id . $img_ext);
                }
                $this->session->set_flashdata('body_message', 'Post Successfully Created');
                redirect('admin/post_list');
            }
        }
        $this->_view('post/create_post');
    }

    public function edit_post($post_id){
        $post = $this->posts_mdl->get_post($post_id);
        if($post){
            $post = $post->result();
            if($this->input->method() == 'post'){
                $this->form_validation->set_rules('title', 'Title', 'required');
                $this->form_validation->set_rules('post_content', 'Post Content', 'required');
                if($this->form_validation->run()){
                    $img_ext = '';
                    if (is_uploaded_file($_FILES['image']['tmp_name'])) {
                        
                        $exist_img_name = $post_id . $post[0]->img;
                        $exist_image = lang('post_img_server') . $exist_img_name;
                        $exist_image_thumb = lang('post_img_thumb_server') . $exist_img_name;
                        $this->_file_delete($exist_image, $exist_image_thumb);

                        $img_ext = '.' . pathinfo($_FILES['image']['name'], PATHINFO_EXTENSION);
                        $this->_post_image_upload($post_id . $img_ext);
                    }
                    $this->posts_mdl->update_post_data($post_id, $img_ext);
                    $this->session->set_flashdata('body_message', 'Post Successfully Updated');
                    redirect('admin/post_list');
                }
            }
            $data['post'] = $post[0];
            $this->_view('post/edit_post', $data);
        }else{
            $this->_error(400);
        }
    }

    public function delete_post($post_id){
        $post = $this->posts_mdl->get_post($post_id);
        if($post){
            $post = $post->result();
            $exist_img_name = $post_id . $post[0]->img;
            $exist_image = lang('post_img_server') . $exist_img_name;
            $exist_image_thumb = lang('post_img_thumb_server') . $exist_img_name;
            $this->_file_delete($exist_image, $exist_image_thumb);
            $this->posts_mdl->delete_post($post_id);
            $this->session->set_flashdata('body_message', 'Post Successfully Delete');
            redirect('admin/post_list');
        }else{
            $this->_error(400);
        }
    }

    public function post_list($page = 0){
        $posts = $this->posts_mdl->get_post();
        $data['posts'] = $posts;
        $this->_view('post/post_list', $data);
    }

    private function _view($page, $data =""){
        $path = "admin/";
        $this->load->view($path . "inc/header", $data);
        $this->load->view($path . "inc/sidebar", $data);
        $this->load->view($path . "pages/" . $page, $data);
        $this->load->view($path . "inc/footer");
    }

    private function _post_image_upload($file_name){
        $config['upload_path'] = './uploads/images/post';
        $config['file_name'] = $file_name;
        $config['allowed_types'] = '*';
        $config['max_size'] = 0;
        $config['max_width'] = 0;
        $config['max_height'] = 0;
        $this->load->library('upload', $config);
        if($this->upload->do_upload('image')){
            $upload_data = $this->upload->data();
            $this->load->library('image_lib');
            $resize_config['source_image'] = $upload_data['full_path'];
            $resize_config['create_thumb'] = true;
            $resize_config['width'] = 120;
		    $resize_config['height'] = 80;
            $resize_config['new_image'] = $upload_data['file_path'] . 'thumb/' . $upload_data['file_name'];
            $this->_image_resize($resize_config);
        }else{
            return false;
        }
    }

    private function _image_resize($data){
        $config = $data;
		$config['image_library'] = 'gd2';
		$config['maintain_ratio'] = true;
		$config['thumb_marker'] = false;
		$this->image_lib->initialize($config);
		if(!$this->image_lib->resize()){
			return false;
		}
		return true;
    }
    
    private function _file_delete(){
		$args = func_num_args();
		for($i = 0; $i < $args; $i++){
			if(file_exists(func_get_arg($i))){
				if(!unlink(func_get_arg($i))){
                    echo "File not deleted. May be Permission problem";
                    return false;
                }
			}else{
                echo "File not exists " . func_get_arg($i);
                return false;
            }
        }
        return true;
	}

    private function _error($status_code){

    }
}