<?php defined('BASEPATH') OR exit('No direct script access allowed');
class Settings extends CI_Controller {
    public function index(){
        
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
            $this->load->model('Settings_model');
            $data['info'] = $this->Settings_model->fetch_info($this->session->userdata('userid'));
            $this->load->model('Index_model');
            $data['categories_alphabetical'] = $this->Index_model->get_categories_alphabetical($this->session->userdata('userid'));
            $data['categories_following'] = $this->Index_model->get_categories_following($this->session->userdata('userid'));
            $data['readinglist'] = $this->Index_model->get_readinglist($this->session->userdata('userid'));          
            $data['notifications'] = $this->Index_model->get_notifications($this->session->userdata('userid'));
            $data['nocount'] = $this->Index_model->notification_count($this->session->userdata('userid'));
            $data['randomtags'] = $this->Index_model->get_tags();
            $this->load->view('settings_view', $data);
        }
    }
    
    public function basic_update(){
        $data['fname'] = $this->security->xss_clean($this->input->post('fname'));
        $data['lname'] = $this->security->xss_clean($this->input->post('lname'));
        $data['uid'] = $this->session->userdata('userid');
        $config['upload_path'] = './userdata/' . $this->session->userdata('userid') . '/';
        $config['allowed_types'] = 'jpg|jpeg|png|JPG|JPEG|PNG';
        $config['overwrite'] = FALSE;
        $this->load->library('upload', $config);
        if($this->upload->do_upload('file')){
            $upload_data = $this->upload->data();
            $data['imagepath'] = $upload_data['file_name'];
        }
        else{
            $data['imagepath']='';
        }
        $this->load->model('Settings_model');
        $result = $this->Settings_model->basic_update($data);
        redirect(base_url() . 'Settings', 'location');
    }
    
    public function account_update(){
        
        $data['npassword'] = $this->security->xss_clean($this->input->post('npassword'));
        $data['cpassword'] = $this->security->xss_clean($this->input->post('cpassword'));
        if(strlen($data['npassword'])>7){
            if($data['npassword']!=$data['cpassword']){
                redirect(base_url() . 'Settings', 'location');
            }
        }
        $data['email'] = $this->security->xss_clean($this->input->post('email'));
        
        if((strlen($data['npassword'])<7) && (strlen($data['email'])<1)){
            redirect(base_url() . 'Settings', 'location');
        }
        
        $data['uid'] = $this->session->userdata('userid');
        $this->load->model('Settings_model');
        $result = $this->Settings_model->account_update($data);
        redirect(base_url() . 'Settings', 'location');
    }
    
    public function general_update(){
        $data['gender'] = $this->security->xss_clean($this->input->post('gender'));
        $data['hometown'] = $this->security->xss_clean($this->input->post('hometown'));
        $data['city'] = $this->security->xss_clean($this->input->post('city'));
        $data['profession'] = $this->security->xss_clean($this->input->post('profession'));
        $data['about'] = $this->security->xss_clean($this->input->post('about'));
        $data['education'] = $this->security->xss_clean($this->input->post('education'));
        $data['college'] = $this->security->xss_clean($this->input->post('college'));
        $data['school'] = $this->security->xss_clean($this->input->post('school'));
        
        $data['uid'] = $this->session->userdata('userid');
        $this->load->model('Settings_model');
        $result = $this->Settings_model->general_update($data);
        redirect(base_url() . 'Settings', 'location');
    }
}