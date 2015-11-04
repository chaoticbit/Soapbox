<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Profile extends CI_Controller {
    public function __construct() {
            parent::__construct();             
    }
    
    public function index()
    {
        
        $username = end($this->uri->segments);

        if (empty($username)) {
            redirect(base_url(), 'refresh');
        }
        $this->load->model('Profile_model');
        $result = $this->Profile_model->validate($username);
        if (!$result) {
            redirect(base_url(), 'refresh');
        } 
        else {
            $data['pinfo'] = $result;
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
                $data['uname'] = $username;
                $data['thread_count'] = $this->Profile_model->get_thread_count($result['uid']);
                $data['reply_count'] = $this->Profile_model->get_reply_count($result['uid']);
                $data['timeline'] = $this->Profile_model->get_timeline($result['uid']);
                $data['get_personal_info'] = $this->Profile_model->get_personal_info($result['uid']);
                $data['get_hidden_threads'] = $this->Profile_model->get_hidden_threads($result['uid']);
                $data['top_threads'] = $this->Profile_model->get_top_threads($result['uid']);
                $data['top_replies'] = $this->Profile_model->get_top_replies($result['uid']);
                $this->load->view('profile_view', $data);   
            }
        }
    }

    protected function displayPageNotFound() {
        $this->output->set_status_header('404');
        $this->load->view('page_not_found');
    }
}