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
        if(strlen($data['fname'])){
            if (!preg_match("/^[A-Za-z]+$/", $data['fname'])) {
                $data['fname']='';
            }
        }
        $data['lname'] = $this->security->xss_clean($this->input->post('lname'));
        if(strlen($data['lname'])){
            if (!preg_match("/^[A-Za-z]+$/", $data['lname'])) {
                $data['lname']='';
            }
        }
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
        if($data['fname']=='' && $data['lname']=='' && $data['imagepath']==''){
            redirect(base_url() . 'Settings', 'location');
        }
        $this->load->model('Settings_model');
        $result = $this->Settings_model->basic_update($data);
        if($result){
            if($data['fname']){
                $this->session->set_userdata('fname', $data['fname']);
            }
            if($data['lname']){
                $this->session->set_userdata('lname', $data['lname']);
            }
            if($data['imagepath']){
                $this->session->set_userdata('avatarpath', $data['imagepath']);
            }
        }
        redirect(base_url() . 'Settings', 'location');
    }
    
    public function account_update(){
        
        $data['npassword'] = $this->security->xss_clean($this->input->post('npassword'));
        $data['cpassword'] = $this->security->xss_clean($this->input->post('cpassword'));
        if(strlen($data['npassword'])>7){
            if($data['npassword']!=$data['cpassword']){
                $data['npassword']='';
                $data['cpassword']='';
            }
        }
        else{
            $data['npassword']='';
            $data['cpassword']='';
        }
        
        $data['email'] = $this->security->xss_clean($this->input->post('email'));
        if(strlen($data['email'])){
            if (!preg_match("/^[a-zA-Z0-9_.+-]+@[a-zA-Z0-9-]+\.[a-zA-Z0-9-.]+$/", $data['email'])) {
                $data['email']='';
            }
        }
        else{
            $data['email']='';
        }
        
        $data['username'] = $this->security->xss_clean($this->input->post('username'));
        if(strlen($data['username'])>5){
            if (!preg_match("/^[a-z][a-zA-Z0-9_.]{5,25}$/", $data['username'])) {
                $data['username']='';
            }            
        }
        else{
            $data['username']='';
        }
        
        if($data['npassword']=='' && $data['email']=='' && $data['username']==''){
            redirect(base_url() . 'Settings', 'location');
        }
        
        
        $data['uid'] = $this->session->userdata('userid');
        $this->load->model('Settings_model');
        $result = $this->Settings_model->account_update($data);
        if($result){
            if($data['username']){
                $this->session->set_userdata('username', $data['username']);
            }            
        }
        redirect(base_url() . 'Settings', 'location');
    }
    
    public function general_update(){
        $data['gender'] = $this->security->xss_clean($this->input->post('gender'));
        if($data['gender']!='m' && $data['gender']!='f'){
            $data['gender']='';
        }
        $data['hometown'] = $this->security->xss_clean($this->input->post('hometown'));
        if (strlen($data['hometown'])) {
            if (!preg_match("/^[A-Za-z ]+$/", $data['hometown'])) {
                $data['hometown']='';
            }
        }
        else{
            $data['hometown']='';
        }
        $data['city'] = $this->security->xss_clean($this->input->post('city'));
        if (strlen($data['city'])) {
            if (!preg_match("/^[A-Za-z ]+$/", $data['city'])) {
                $data['city']='';
            }
        }
        else{
            $data['city']='';
        }
        $data['profession'] = $this->security->xss_clean($this->input->post('profession'));
        if (strlen($data['profession'])) {
            if (!preg_match("/^[A-Za-z .,']+$/", $data['profession'])) {
                $data['profession']='';
            }
        }
        else{
            $data['profession']='';
        }
        $data['about'] = $this->security->xss_clean($this->input->post('about'));
        if (strlen($data['about'])) {
            if (!preg_match("/^[A-Za-z0-9 !'.,&()?]|\d+$/", $data['about'])) {
                $data['about']='';
            }
        }        
        else{
            $data['about']='';
        }
        $data['education'] = $this->security->xss_clean($this->input->post('education'));
        if (strlen($data['education'])) {
            if (!preg_match("/^[A-Za-z .,']+$/", $data['education'])) {
                $data['education']='';
            }
        }
        else{
            $data['education']='';
        }
        $data['college'] = $this->security->xss_clean($this->input->post('college'));
        if (strlen($data['college'])) {
            if (!preg_match("/^[A-Za-z .,']+$/", $data['college'])) {
                $data['college']='';
            }
        }
        else{
            $data['college']='';
        }
        $data['school'] = $this->security->xss_clean($this->input->post('school'));
        if (strlen($data['school'])) {
            if (!preg_match("/^[A-Za-z .,']+$/", $data['school'])) {
                $data['school']='';
            }
        }
        else{
            $data['school']='';
        }
        $data['uid'] = $this->session->userdata('userid');
        $this->load->model('Settings_model');
        $result = $this->Settings_model->general_update($data);
        redirect(base_url() . 'Settings', 'location');
    }
    
    public function delete_account() {
        $data['password'] = $this->security->xss_clean($this->input->post('dpassword'));
        if(!strlen($data['password'])){
            redirect(base_url() . 'Settings', 'location');
        }
        $data['password'] = md5($data['password']);
        $data['uid'] = $this->session->userdata('userid');
        $this->load->model('Settings_model');
        $result = $this->Settings_model->delete_account($data);
        if($result){
            redirect(base_url() . 'Logout', 'location');
        }
        redirect(base_url() . 'Settings', 'location');
    }
}