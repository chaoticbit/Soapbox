<?php defined('BASEPATH') OR exit('No direct script access allowed');
class Signup extends CI_Controller{
    public function index(){
        
        if(!is_logged_in()){
            redirect(base_url().'Login','location');
        }
        
        $this->load->model('Signup_model');
        if($this->Signup_model->userinfo_exists($this->session->userdata('userid'))){
            redirect(base_url(), 'location');
        }
        
        $data['username'] = $this->session->userdata('username');
        $this->load->model('Signup_model');
        $data['categories'] = $this->Signup_model->get_categories();
        $this->load->view('signup_view', $data);
    }        

    public function validate(){
        
        $data = array();
        $data['fname'] = $this->security->xss_clean($this->input->post('fname'));
        $data['lname'] = $this->security->xss_clean($this->input->post('lname'));
        $data['email'] = $this->security->xss_clean($this->input->post('email'));
        $data['gender'] = $this->security->xss_clean($this->input->post('gender'));
        $data['about'] = $this->security->xss_clean($this->input->post('about'));
        $data['question'] = $this->security->xss_clean($this->input->post('question'));
        $data['answer'] = $this->security->xss_clean($this->input->post('answer'));
        $data['hometown'] = $this->security->xss_clean($this->input->post('hometown'));
        $data['city'] = $this->security->xss_clean($this->input->post('city'));
        $data['profession'] = $this->security->xss_clean($this->input->post('profession'));
        $data['education'] = $this->security->xss_clean($this->input->post('education'));
        $data['college'] = $this->security->xss_clean($this->input->post('college'));
        $data['school'] = $this->security->xss_clean($this->input->post('school'));
        $data['categories'] = $this->security->xss_clean($this->input->post('categories'));
        $data['uid'] = $this->session->userdata('userid');
        
        $config['upload_path'] = './userdata/' . $this->session->userdata('userid') . '/';
        $config['allowed_types'] = 'jpg|jpeg|png|JPG|JPEG|PNG';
        $config['overwrite'] = FALSE;
        $this->load->library('upload', $config);
        if(!$this->upload->do_upload('file')){
            if($data['gender']=="male"){
                copy(FCPATH . 'assets/images/avatar_male.png' , FCPATH . 'userdata/' . $data['uid'] . '/avatar_male.png');
                $data['imagepath'] = "avatar_male.png";
            }
            else if($data['gender']=="female"){
                copy(FCPATH . 'assets/images/avatar_female.png' , FCPATH . 'userdata/' . $data['uid'] . '/avatar_female.png');
                $data['imagepath'] = "avatar_female.png";
            }
        }
        else{
            $upload_data = $this->upload->data();
            $data['imagepath'] = $upload_data['file_name'];
        }
        
        $this->load->model('Signup_model');
        $this->Signup_model->populate($data);
        $this->session->set_userdata('fname', $data['fname']);
        $this->session->set_userdata('lname', $data['lname']);
        $this->session->set_userdata('avatarpath', $data['imagepath']);
        redirect(base_url(), 'location');
    }
}