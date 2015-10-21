<?php defined('BASEPATH') OR exit('No direct script access allowed');
class Login extends CI_Controller {
    
    public $user = "";
    public $facebook;
    
    public function index(){
        if(is_logged_in()){
            redirect(base_url(),'location');
        }
        require_once APPPATH . 'libraries/facebook.php';
        $this->facebook = new Facebook(array(
            'appId'  => '897606013651344',
            'secret' => '090d9a500426f917f70c708a67b20d44',
        ));
        $this->user = $this->facebook->getUser();        
        if ($this->user) {
            $access_token = $this->facebook->getAccessToken();
            $param_token = array('access_token' => $access_token);
            $data['user_profile'] = $this->facebook->api('/me?fields=name,first_name,last_name,gender,link,email','GET',$param_token);
            $data['logout_url'] = $this->facebook->getLogoutUrl(array('next' => base_url() . 'Logout'));
            $this->load->model('Login_model');
            $result = $this->Login_model->is_user_from_fb($data['user_profile']['email']);
            if($result){
                $newdata = array("userid"=>$result['srno'], "username"=>$result['username'], "fname"=>$result['fname'], "lname"=>$result['lname'], "avatarpath"=>$result['avatarpath']);
                $this->session->set_userdata($newdata);
                redirect(base_url(), 'location');
//                $this->load->view('index_view_1', $data);
            }
            else{
                $username = $data['user_profile']['first_name'] . "_" . $data['user_profile']['last_name'] . "_" . randomStr();
                $username = substr($username, 0, 25);
                while($this->Login_model->check_username($username)){
                    $username = $data['user_profile']['first_name'] . "_" . $data['user_profile']['last_name'] . "_" . randomStr();
                    $username = substr($username, 0, 25);                    
                }
                $password = randomStr();
                $user['username'] = $username;
                $user['password'] = md5($password);
                $user['fname'] = $data['user_profile']['first_name'];
                $user['lname'] = $data['user_profile']['last_name'];
                $user['gender'] = $data['user_profile']['gender'];
                $user['avatarpath'] = 'https://graph.facebook.com/' . $data['user_profile']['id'] . '/picture?type=large';
                $user['email'] = $data['user_profile']['email'];
                
                $result = $this->Login_model->new_fb_user($user);
                if($result){
                    $newdata = array("userid"=>$result['srno'], "username"=>$result['username'], "fname"=>$result['fname'], "lname"=>$result['lname'], "avatarpath"=>$result['avatarpath']);
                    $this->session->set_userdata($newdata);
                    redirect(base_url(),'location');
                }
            }
            $this->load->view('index_view_1', $data);
        } else {
            // Store users facebook login url
            $data['login_url'] = $this->facebook->getLoginUrl(array('scope' => 'email'));
            $this->load->view('login_view', $data);
        }
    }
    public function process() {
        $this->load->model('Login_model');
        $username = $this->security->xss_clean($this->input->post('uname'));
        $password = $this->security->xss_clean($this->input->post('pword'));
        $result = $this->Login_model->validate($username, md5($password));
        if(!$result) {
            $data['error'] = 'invalid';
            $this->load->view('login_view', $data);
        }
        else{
            $newdata = array("userid"=>$result['userid'], "username"=>$username, "fname"=>$result['fname'], "lname"=>$result['lname'], "avatarpath"=>$result['avatarpath']);
            $this->session->set_userdata($newdata);
            redirect(base_url(),'location');
        }
    }
    public function signup() {
        $nusername = $this->security->xss_clean($this->input->post('nusername'));
        $npassword = $this->security->xss_clean($this->input->post('npassword'));
        $cpassword = $this->security->xss_clean($this->input->post('cpassword'));
        if (!preg_match("/^[a-z][a-zA-Z0-9_.]{5,25}$/", $nusername)) {
            $data['error_signup'] = 'found';
        }
        if (!preg_match("/^[a-zA-Z0-9!@#$%^&*]{8,30}$/", $npassword)) {
            $data['error_signup'] = 'found';
        }
        if ($npassword != $cpassword) {
            $data['error_signup'] = 'found';
        }
        if (!isset($data['error_signup'])) {
            $npassword = md5($npassword);
            $this->load->model('Login_model');
            $srno = $this->Login_model->signup($nusername, $npassword);
            $newdata = array("userid"=>$srno,"username"=>$nusername);
            $this->session->set_userdata($newdata);
            mkdir("userdata/" . $this->session->userdata('userid'), 0700, true);
            chmod("userdata/" . $this->session->userdata('userid'), 0777);
            redirect('Signup', 'location');
        }
        else{
            $this->load->view('login_view', $data);
        }
    }
    public function reset_password(){
        $nusername = $this->security->xss_clean($this->input->post('unameconfirm'));
        $npassword = $this->security->xss_clean($this->input->post('new_password'));
        $cpassword = $this->security->xss_clean($this->input->post('con_password'));
        if (!preg_match("/^[a-z][a-zA-Z0-9_.]{5,25}$/", $nusername)) {
            $data['error_signup'] = 'found';
        }
        if (!preg_match("/^[a-zA-Z0-9!@#$%^&*]{8,30}$/", $npassword)) {
            $data['error_signup'] = 'found';
        }
        if ($npassword != $cpassword) {
            $data['error_signup'] = 'found';
        }
        if (!isset($data['error_signup'])) {
            $data['nusername'] = $nusername;
            $data['npassword'] = md5($npassword);
            $this->load->model('Login_model');
            $result = $this->Login_model->reset_password($data);
            redirect(base_url(), 'location');
        }
        else{
            $this->load->view('login_view', $data);
        }
    }
}