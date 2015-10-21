<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Thread extends CI_Controller {
    
    public function _remap($param,$param1=null){
        $this->index($param,$param1);
    }

    public function index($param,$param1){
        
        if(!is_logged_in()){
            redirect(base_url().'Login','location');
        }
        
        $this->load->model('Signup_model');
        
        if(!$this->Signup_model->userinfo_exists($this->session->userdata('userid'))){
            redirect('Signup', 'location');
        }
        else{
            $this->load->model('Thread_model');
            $param = $this->security->xss_clean($param);
            $result = $this->Thread_model->fetch_thread($param);
            if(!$result){
                redirect(base_url(), 'refresh');
            }
            foreach($param1 as $item){
                if(!is_null($item)){
                    $this->Thread_model->register_read($item,$this->session->userdata('userid'));
                }
            }
            
            $data['thread'] = $result;
            $this->Thread_model->register_view($param, $this->session->userdata('userid'));
            $data['replies'] = $this->Thread_model->fetch_replies($param);
            $data['username'] = $this->session->userdata('username');
            $data['userid'] = $this->session->userdata('userid');
            $data['fname'] = $this->session->userdata('fname');
            $data['lname'] = $this->session->userdata('lname');
            $data['avatarpath'] = $this->session->userdata('avatarpath');

            $this->load->model('Index_model');
            $data['categories_alphabetical'] = $this->Index_model->get_categories_alphabetical($this->session->userdata('userid'));
            $data['categories_following'] = $this->Index_model->get_categories_following($this->session->userdata('userid'));
            $data['readinglist'] = $this->Index_model->get_readinglist($this->session->userdata('userid'));
            $data['notifications'] = $this->Index_model->get_notifications($this->session->userdata('userid'));
            $data['nocount'] = $this->Index_model->notification_count($this->session->userdata('userid'));
            $this->load->view('thread_view', $data);
        }
    }
}