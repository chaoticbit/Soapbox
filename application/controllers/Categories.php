<?php defined('BASEPATH') OR exit('No direct script access allowed');
class Categories extends CI_Controller {
    function _remap($param) {
        $this->index($param);
    }
    public function index($param){
        if(!is_logged_in()){
            redirect(base_url().'Login','location');
        }
        
        $this->load->model('Signup_model');        
        if(!$this->Signup_model->userinfo_exists($this->session->userdata('userid'))){
            redirect('Signup', 'location');
        }
        else{
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
            if($param == 'm'){
                $this->load->view('categories_mobile_view',$data);
            }
            else{
                $this->load->view('categories_view',$data);
            }
        }        
    }   
}