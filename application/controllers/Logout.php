<?php defined('BASEPATH') OR exit('No direct script access allowed');
class Logout extends CI_Controller {

    public function index(){
        $this->session->unset_userdata('userid');
        $this->session->unset_userdata('username');
        $this->session->unset_userdata('fname');
        $this->session->unset_userdata('lname');
        $this->session->unset_userdata('avatarpath');
        session_destroy();
        redirect(base_url(),'refresh');
    }
}
?>