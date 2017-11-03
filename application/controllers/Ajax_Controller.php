<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Ajax_Controller extends CI_Controller{

    public function checkUsername(){
        $username = $this->security->xss_clean($this->input->post('uname'));
        $this->load->model('Ajax_model');
        $result = $this->Ajax_model->checkUsername($username);
        header('Access-Control-Allow-Origin: *');
        header("Content-Type: application/json");

        if($result == true){
            $data = array('response'=>'true');
            echo json_encode($data);
        }
        else{
            $data = array('response'=>'false');
            echo json_encode($data);
        }
    }

    public function email_exists(){
        $email = $this->security->xss_clean($this->input->post('email'));
        $this->load->model('Ajax_model');
        $result = $this->Ajax_model->email_exists($email);
        header('Access-Control-Allow-Origin: *');
        header("Content-Type: application/json");
        if($result){
            $data = array('response'=>'true');
            echo json_encode($data);
        }
        else{
            $data = array('response'=>'false');
            echo json_encode($data);
        }
    }

    public function upload_image($fileName,$nocache,$total){
        //$filename = "upload/".$_GET['fileName'];
        $filename = "userdata/" . $this->session->userdata('userid') . '/' .$fileName;
        // $xmlstr = $GLOBALS['HTTP_RAW_POST_DATA'];
        // if(empty($xmlstr)){
        $xmlstr = file_get_contents('php://input');
        // }
        $is_ok = false;
        while(!$is_ok){
            $file = fopen($filename,"ab");

            if(flock($file,LOCK_EX)){
                    fwrite($file,$xmlstr);
                    flock($file,LOCK_UN);
                    fclose($file);
                    $is_ok = true;
            }else{
                    fclose($file);
                    sleep(3);
            }
        }
        $filesize = filesize($filename);
        if($filesize == $total){
            $data = $filename;
            echo json_encode($data);
        }
    }

    public function upload_image_ios($fileName,$total){
        $filename = "userdata/" . $this->session->userdata('userid') . '/' .$fileName;
        $xmlstr = file_get_contents('php://input');

        $is_ok = false;
        while(!$is_ok){
            $file = fopen($filename,"ab");

            if(flock($file,LOCK_EX)){
                    fwrite($file,$xmlstr);
                    flock($file,LOCK_UN);
                    fclose($file);
                    $is_ok = true;
            }else{
                    fclose($file);
                    sleep(3);
            }
        }
        $filesize = filesize($filename);
        $basename = rand(1, 999999) . '' . time();
        $extension = pathinfo($filename,PATHINFO_EXTENSION);
        $newname = "userdata/" . $this->session->userdata('userid') . '/' . $basename .'.'.$extension;
        rename($filename, $newname);
        if($filesize == $total){
            echo json_encode($newname);
        }
    }

    public function rename_image(){
        $filename = $this->input->post('filename');
        $basename = rand(1, 999999) . '' . time();
        $extension = pathinfo($filename,PATHINFO_EXTENSION);
        $newname = "userdata/" . $this->session->userdata('userid') . '/' . $basename .'.'.$extension;
        rename($filename, $newname);
        $data = array('image'=>$newname);
        echo json_encode($data);
    }

    public function post_thread(){
        $data['title'] = $this->security->xss_clean($this->input->post('title'));
        $data['desc'] = $this->input->post('desc');
        $data['filename'] = trim($this->input->post('filename'));
        $data['coordinates'] = trim($this->input->post('coordinates'));
        $data['category'] = $this->security->xss_clean($this->input->post('category'));
        $data['tags'] = $this->input->post('tags');
        $data['uid'] = $this->session->userdata('userid');
        if($data['filename']===''){
            $data['filename'] = '';
            $data['coordinates'] = '';
        }
        else{
            $filename = explode('/', $data['filename']);
            $data['filename'] = $filename[2];
        }

        $this->load->model('Ajax_model');
        $result = $this->Ajax_model->post_thread($data);

        header('Access-Control-Allow-Origin: *');
        header("Content-Type: application/json");
        if($result){
            $data = array('response'=>'true', 'content'=>$result);
            echo json_encode($data);
        }
        else{
            $data = array('response'=>'false');
            echo json_encode($data);
        }
    }

    public function remove_image(){
        $filename = $this->security->xss_clean($this->input->post('filename'));
        if (strpos($filename, 'userdata/' . $this->session->userdata('userid')) !== false) {
            unlink($filename);
            header('Access-Control-Allow-Origin: *');
            header("Content-Type: application/json");
            $data = array('response'=>'true');
            echo json_encode($data);
        }
    }
    public function quick_search(){
        $data = $this->security->xss_clean($this->input->post('key'));

        $this->load->model('Ajax_model');

        $result = $this->Ajax_model->quick_search($data);
        if(!$result){
            $result = '<p class="margin0" style="padding: 0 10px 10px;">Couldn\'t find anything :(</p>';
        }
        $data = array("content"=>$result);
        header('Access-Control-Allow-Origin: *');
        header("Content-Type: application/json");
        echo json_encode($data);
    }

    public function thread_options($param){
        $data['tid'] = $this->security->xss_clean($this->input->post('tid'));
        $data['uid'] = $this->session->userdata('userid');
        $data['opt'] = $param;
        $this->load->model('Ajax_model');
        $result = $this->Ajax_model->thread_options($data);
        if(!$result){
            $data = array("response"=>"false");
        }
        $data = $result;
        header('Access-Control-Allow-Origin: *');
        header("Content-Type: application/json");
        echo json_encode($data);
    }

    public function update_categories(){
        $data['cid'] = $this->security->xss_clean($this->input->post('array'));
        $data['cid'] = rtrim($data['cid'],",");
        $data['uid'] = $this->session->userdata('userid');
        $this->load->model('Ajax_model');
        $result = $this->Ajax_model->update_categories($data);
        if($result){
            $data = array('response'=>'true');
        }
        else{
            $data = array('response'=>'false');
        }
        header('Access-Control-Allow-Origin: *');
        header("Content-Type: application/json");
        echo json_encode($data);
    }

    public function update_category(){
        $data['cid'] = $this->security->xss_clean($this->input->post('cid'));
        $data['action'] = $this->security->xss_clean($this->input->post('action'));
        $data['uid'] = $this->session->userdata('userid');
        $this->load->model('Ajax_model');
        $result = $this->Ajax_model->update_category($data);

        if($result){
            $data = array("response"=>$result);
        }
        else{
            $data = array("response"=>"false");
        }
        header("Access-Control-Allow-Origin: *");
        header("Content-Type: application/json");
        echo json_encode($data);
    }

    public function load_more_thread(){
        $data['lmt'] = $this->security->xss_clean($this->input->post('lmt'));
        $data['uid'] = $this->session->userdata('userid');
        $data['opt'] = $this->security->xss_clean($this->input->post('opt'));
        $data['optval'] = $this->security->xss_clean($this->input->post('optval'));
        $data['optcat'] = $this->security->xss_clean($this->input->post('optcat'));

        $this->load->model('Ajax_model');
        $result = $this->Ajax_model->load_more_thread($data);

        if(!$result){
            $data = array('response'=>'false','content'=>'<div class="pure-u-1 no-content-note">
                    <h3 class="light txt-center" style="padding: 20px;">That\'s all we could find :(</h3>
                    </div>');
        }
        else{
            $data = array('response'=>'true','content'=>$result);
        }
        //$data = array("content"=>$result);
        header('Access-Control-Allow-Origin: *');
        header("Content-Type: application/json");
        echo json_encode($data);
    }

    public function search_all(){
        $data['param'] = $this->security->xss_clean($this->input->post('key'));
        $this->load->model('Ajax_model');
        $result = $this->Ajax_model->search_all($data);

        if(!$result){
            $result = '<p class="margin0" style="padding: 0 10px 10px;">Couldn\'t find anything :(</p>';
        }
        $data = array("content"=>$result);
        header('Access-Control-Allow-Origin: *');
        header("Content-Type: application/json");
        echo json_encode($data);
    }

    public function search_people(){
        $data['param'] = $this->security->xss_clean($this->input->post('key'));
        $this->load->model('Ajax_model');
        $result = $this->Ajax_model->search_people($data);

        if(!$result){
            $result = '<p class="margin0" style="padding: 0 10px 10px;">Couldn\'t find anything :(</p>';
        }
        $data = array("content"=>$result);
        header('Access-Control-Allow-Origin: *');
        header("Content-Type: application/json");
        echo json_encode($data);
    }

    public function search_tags() {
        $data['param'] = $this->security->xss_clean($this->input->post('key'));
        $this->load->model('Ajax_model');
        $result = $this->Ajax_model->search_tags($data);

        if(!$result){
            $result = '<p class="margin0" style="padding: 0 10px 10px;">Couldn\'t find anything :(</p>';
        }
        $data = array("content"=>$result);
        header('Access-Control-Allow-Origin: *');
        header("Content-Type: application/json");
        echo json_encode($data);
    }

    public function search_by_category(){
        $data['param'] = $this->security->xss_clean($this->input->post('key'));
        $data['cid'] = $this->security->xss_clean($this->input->post('cid'));
        $this->load->model('Ajax_model');
        $result = $this->Ajax_model->search_by_category($data);

        if(!$result){
            $result = '<p class="margin0" style="padding: 0 10px 10px;">Couldn\'t find anything :(</p>';
        }
        $data = array("content"=>$result);
        header('Access-Control-Allow-Origin: *');
        header("Content-Type: application/json");
        echo json_encode($data);
    }

    public function fetch_list_thread(){
        $data['tid'] = $this->security->xss_clean($this->input->post('tid'));
        $data['uid'] = $this->session->userdata('userid');
        $this->load->model('Ajax_model');
        $result = $this->Ajax_model->fetch_list_thread($data);

        if(!$result){
            $result = '<p class="margin0" style="padding: 0 10px 10px;">Couldn\'t find anything :(</p>';
        }
        $data = array("content"=>$result);
        header('Access-Control-Allow-Origin: *');
        header("Content-Type: application/json");
        echo json_encode($data);
    }

    public function fetch_list_thread_next(){
        $data['tid'] = $this->security->xss_clean($this->input->post('tid'));
        $data['nextsrno'] = $this->security->xss_clean($this->input->post('nextsrno'));
        $data['uid'] = $this->session->userdata('userid');
        $this->load->model('Ajax_model');
        $result = $this->Ajax_model->fetch_list_thread_next($data);

        if(!$result){
            $result = '<p class="margin0" style="padding: 0 10px 10px;">Couldn\'t find anything :(</p>';
        }
        $data = array("content"=>$result);
        header('Access-Control-Allow-Origin: *');
        header("Content-Type: application/json");
        echo json_encode($data);
    }

    public function upvote_thread(){
        $data['tid'] = $this->security->xss_clean($this->input->post('tid'));
        $data['uid'] = $this->session->userdata('userid');
        $this->load->model('Ajax_model');
        $result = $this->Ajax_model->upvote_thread($data);

        if($result){
            $data = array("response"=>"true", "count"=>$result);
        }
        else{
            $data = array("response"=>"false");
        }
        header('Access-Control-Allow-Origin: *');
        header("Content-Type: application/json");
        echo json_encode($data);

    }

    public function rm_upvote_thread(){
        $data['tid'] = $this->security->xss_clean($this->input->post('tid'));
        $data['uid'] = $this->session->userdata('userid');
        $this->load->model('Ajax_model');
        $result = $this->Ajax_model->rm_upvote_thread($data);

        if($result>=0){
            $data = array("response"=>"true", "count"=>$result);
        }
        else{
            $data = array("response"=>"false");
        }
        header('Access-Control-Allow-Origin: *');
        header("Content-Type: application/json");
        echo json_encode($data);

    }

    public function reply_thread(){
        $data['tid'] = $this->security->xss_clean($this->input->post('tid'));
        $data['desc'] = $this->input->post('desc');
        $data['uid'] = $this->session->userdata('userid');
        $data['username'] = $this->session->userdata('username');
        $data['name'] = $this->session->userdata('fname') . ' ' . $this->session->userdata('lname');
        $data['avatarpath'] = $this->session->userdata('avatarpath');

        $this->load->model('Ajax_model');
        $result = $this->Ajax_model->reply_thread($data);

        if($result>=0){
            $data = array("response"=>"true", "content"=>$result);
        }
        else{
            $data = array("response"=>"false");
        }
        header('Access-Control-Allow-Origin: *');
        header("Content-Type: application/json");
        echo json_encode($data);
    }

    public function add_comment(){
        $data['comment'] = $this->security->xss_clean($this->input->post('comment'));
        $data['rid'] = $this->security->xss_clean($this->input->post('rid'));
        $data['uid'] = $this->session->userdata('userid');

        $this->load->model('Ajax_model');
        $result = $this->Ajax_model->add_comment($data);

        if($result){
            $data = array("response"=>"true", "content"=>$result);
        }
        else{
            $data = array("response"=>"false");
        }
        header('Access-Control-Allow-Origin: *');
        header("Content-Type: application/json");
        echo json_encode($data);
    }

    public function upvote_reply(){
        $data['rid'] = $this->security->xss_clean($this->input->post('rid'));
        $data['uid'] = $this->session->userdata('userid');
        $this->load->model('Ajax_model');
        $result = $this->Ajax_model->upvote_reply($data);

        if($result){
            $data = array("response"=>"true", "count"=>$result);
        }
        else{
            $data = array("response"=>"false");
        }
        header('Access-Control-Allow-Origin: *');
        header("Content-Type: application/json");
        echo json_encode($data);

    }

    public function rm_upvote_reply(){
        $data['rid'] = $this->security->xss_clean($this->input->post('rid'));
        $data['uid'] = $this->session->userdata('userid');
        $this->load->model('Ajax_model');
        $result = $this->Ajax_model->rm_upvote_reply($data);

        if($result>=0){
            $data = array("response"=>"true", "count"=>$result);
        }
        else{
            $data = array("response"=>"false");
        }
        header('Access-Control-Allow-Origin: *');
        header("Content-Type: application/json");
        echo json_encode($data);
    }

    public function search_threads_mobile(){
        $data['uid'] = $this->session->userdata('userid');
        $data['param'] = $this->security->xss_clean($this->input->post('key'));
        $this->load->model('Ajax_model');
        $result = $this->Ajax_model->search_threads_mobile($data);
        $result1 = $this->Ajax_model->search_people_mobile($data);
        $result2 = $this->Ajax_model->search_tags_mobile($data);

        if(!$result){
            $result = '<p class="margin0" style="padding: 0 10px 10px;">Couldn\'t find anything :(</p>';
        }
        if(!$result1){
            $result1 = '<p class="margin0" style="padding: 0 10px 10px;">Couldn\'t find anything :(</p>';
        }
        if(!$result2){
            $result2 = '<p class="margin0" style="padding: 0 10px 10px;">Couldn\'t find anything :(</p>';
        }
        $data = array("content"=>$result,'content1'=>$result1,'content2'=>$result2);
        header('Access-Control-Allow-Origin: *');
        header("Content-Type: application/json");
        echo json_encode($data);
    }

    function post_thread_mobile() {
        $data['title'] = $this->security->xss_clean($this->input->post('title'));
        $data['desc'] = $this->security->xss_clean($this->input->post('desc'));
        $data['filename'] = trim($this->input->post('filename'));
        $data['coordinates'] = trim($this->input->post('coordinates'));
        $data['category'] = $this->security->xss_clean($this->input->post('category'));
        $data['tags'] = $this->input->post('tags');
        $data['uid'] = $this->session->userdata('userid');
        if($data['filename']===''){
            $data['filename'] = '';
            $data['coordinates'] = '';
        }
        else{
            $filename = explode('/', $data['filename']);
            $data['filename'] = $filename[2];
        }

        $this->load->model('Ajax_model');
        $result = $this->Ajax_model->post_thread_mobile($data);

        header('Access-Control-Allow-Origin: *');
        header("Content-Type: application/json");
        if($result){
            $data = array('response'=>'true', 'content'=>$result);
            echo json_encode($data);
        }
        else{
            $data = array('response'=>'false');
            echo json_encode($data);
        }
    }

    public function remove_reply(){
        $data['rid'] = $this->security->xss_clean($this->input->post('rid'));
        $data['uid'] = $this->session->userdata('userid');
        $this->load->model('Ajax_model');
        $result = $this->Ajax_model->remove_reply($data);

        if($result){
            $data = array("response"=>"true");
        }
        else{
            $data = array("response"=>"false");
        }
        header('Access-Control-Allow-Origin: *');
        header("Content-Type: application/json");
        echo json_encode($data);
    }

    public function wait_for_notification(){
        $data['uid'] = $this->session->userdata('userid');
        $this->load->model('Ajax_model');
        $result = $this->Ajax_model->wait_for_notification($data);
        $cnt = $this->Ajax_model->get_notification_count($data);

        if(!$result){
            $data = array("response"=>"false");
        }
        else{
            $data = array("response"=>"true","content"=>$result,"cnt"=>$cnt);
        }
        header('Access-Control-Allow-Origin: *');
        header("Content-Type: application/json");
        echo json_encode($data);
    }

    public function reset_notifications(){
        $data['uid'] = $this->session->userdata('userid');
        $this->load->model('Ajax_model');
        $result = $this->Ajax_model->reset_notifications($data);
    }

    public function mark_read(){
        $data['uid'] = $this->session->userdata('userid');
        $this->load->model('Ajax_model');
        $result = $this->Ajax_model->mark_read($data);
    }
    public function pull_notifications(){
        $data = $this->session->userdata('userid');
        $this->load->model('Ajax_model');
        $result = $this->Ajax_model->pull_notifications($data);

        if(!$result){
            $data = array("response"=>"false");
        }
        else{
            $data = array("response"=>"true","content"=>$result);
        }
        header('Access-Control-Allow-Origin: *');
        header("Content-Type: application/json");
        echo json_encode($data);
    }

    public function people_upvoted(){
        $data['tid'] = $this->security->xss_clean($this->input->post('tid'));
        $this->load->model('Ajax_model');
        $result = $this->Ajax_model->people_upvoted($data);

        if(!$result){
            $data = array("response"=>"false");
        }
        else{
            $data = array("response"=>"true","content"=>$result);
        }
        header('Access-Control-Allow-Origin: *');
        header("Content-Type: application/json");
        echo json_encode($data);
    }

    public function viewers(){
        $data['tid'] = $this->security->xss_clean($this->input->post('tid'));
        $this->load->model('Ajax_model');
        $result = $this->Ajax_model->viewers($data);

        if(!$result){
            $data = array("response"=>"false");
        }
        else{
            $data = array("response"=>"true","content"=>$result);
        }
        header('Access-Control-Allow-Origin: *');
        header("Content-Type: application/json");
        echo json_encode($data);
    }

    public function remove_comment(){
        $data['rrid'] = $this->security->xss_clean($this->input->post('rrid'));
        $data['uid'] = $this->session->userdata('userid');
        $this->load->model('Ajax_model');
        $result = $this->Ajax_model->remove_comment($data);

        if($result){
            $data = array("response"=>"true");
        }
        else{
            $data = array("response"=>"false");
        }
        header('Access-Control-Allow-Origin: *');
        header("Content-Type: application/json");
        echo json_encode($data);
    }

    public function mark_correct(){
        $data['rid'] = $this->security->xss_clean($this->input->post('rid'));
        $data['uid'] = $this->session->userdata('userid');
        $this->load->model('Ajax_model');
        $result = $this->Ajax_model->mark_correct($data);

        if($result){
            $data = array("response"=>"true");
        }
        else{
            $data = array("response"=>"false");
        }
        header('Access-Control-Allow-Origin: *');
        header("Content-Type: application/json");
        echo json_encode($data);

    }

    public function remove_correct(){
        $data['rid'] = $this->security->xss_clean($this->input->post('rid'));
        $data['uid'] = $this->session->userdata('userid');
        $this->load->model('Ajax_model');
        $result = $this->Ajax_model->remove_correct($data);

        if($result){
            $data = array("response"=>"true");
        }
        else{
            $data = array("response"=>"false");
        }
        header('Access-Control-Allow-Origin: *');
        header("Content-Type: application/json");
        echo json_encode($data);

    }
    public function validate_reset_request(){
        $data['username'] = $this->security->xss_clean($this->input->post('username'));
        $this->load->model('Ajax_model');
        $result = $this->Ajax_model->validate_reset_request($data);

        if($result){
            $data = array("response"=>"true", "content"=>$result);
        }
        else{
            $data = array("response"=>"false");
        }
        header('Access-Control-Allow-Origin: *');
        header("Content-Type: application/json");
        echo json_encode($data);
    }
    public function verify_answer(){
        $data['username'] = $this->security->xss_clean($this->input->post('username'));
        $data['answer'] = $this->security->xss_clean($this->input->post('answer'));
        $this->load->model('Ajax_model');
        $result = $this->Ajax_model->verify_answer($data);

        if($result){
            $data = array("response"=>"true", "content"=>$result);
        }
        else{
            $data = array("response"=>"false");
        }
        header('Access-Control-Allow-Origin: *');
        header("Content-Type: application/json");
        echo json_encode($data);
    }
    public function upload_cover_image($fileName,$nocache,$total){
        $filename = "userdata/" . $this->session->userdata('userid') . '/' .$fileName;
        $xmlstr = $GLOBALS['HTTP_RAW_POST_DATA'];
        if(empty($xmlstr)){
             $xmlstr = file_get_contents('php://input');
        }
        $is_ok = false;
        while(!$is_ok){
            $file = fopen($filename,"ab");

            if(flock($file,LOCK_EX)){
                    fwrite($file,$xmlstr);
                    flock($file,LOCK_UN);
                    fclose($file);
                    $is_ok = true;
            }else{
                    fclose($file);
                    sleep(3);
            }
        }
        $filesize = filesize($filename);
        if($filesize == $total){
            $data = $filename;
            echo json_encode($data);
        }
    }

    public function save_cover_image() {
        $data['filename'] = trim($this->input->post('filename'));
        $filename = explode('/', $data['filename']);
        $data['filename'] = $filename[2];
        $data['coordinates'] = $this->security->xss_clean($this->input->post('coordinates'));
        $data['uid'] = $this->session->userdata('userid');

        $this->load->model('Ajax_model');
        $result = $this->Ajax_model->save_cover_image($data);

        if($result){
            $data = array("response"=>"true");
        }
        else{
            $data = array("response"=>"false");
        }
        header('Access-Control-Allow-Origin: *');
        header("Content-Type: application/json");
        echo json_encode($data);
    }
    public function remove_cover_image(){
        $filename = $this->security->xss_clean($this->input->post('filename'));
        if (strpos($filename, 'userdata/' . $this->session->userdata('userid')) !== false) {
            unlink($filename);
            header('Access-Control-Allow-Origin: *');
            header("Content-Type: application/json");
            $data = array('response'=>'true');
            echo json_encode($data);
        }
    }

    public function send_mail(){
        $emailto = $this->security->xss_clean($this->input->post('emailto'));
        $message = $this->security->xss_clean($this->input->post('msg'));
        $config = Array(
            'protocol' => 'smtp',
            'smtp_host' => 'ssl://smtp.googlemail.com',
            'smtp_port' => 465,
            'smtp_user' => 'dandekar.atharva@gmail.com', // change it to yours
            'smtp_pass' => '', // change it to yours
            'mailtype' => 'html',
            'charset' => 'iso-8859-1',
            'wordwrap' => TRUE
        );

        $this->load->library('email', $config);
        $this->email->set_newline("\r\n");
        $this->email->from('dandekar.atharva@gmail.com'); // change it to yours
        $this->email->to($emailto);// change it to yours
        $this->email->subject('Soapbox Support Team');
        $this->email->message($message);
        if($this->email->send()){
            $data = array('response'=>'true');
        }
        else{
            $data = array('response'=>$this->email->print_debugger());
        }
        header('Access-Control-Allow-Origin: *');
        header("Content-Type: application/json");
        echo json_encode($data);
    }

    public function edit_thread(){
        $data['tid'] = $this->security->xss_clean($this->input->post('tid'));
        $data['title'] = $this->security->xss_clean($this->input->post('title'));
        $data['desc'] = $this->security->xss_clean($this->input->post('desc'));
        $data['coordinates'] = $this->security->xss_clean($this->input->post('coordinates'));

        $this->load->model('Ajax_model');
        $this->Ajax_model->edit_thread($data);
        $result = $this->Ajax_model->pull_t_desc($data);
        if($result){
            $data = array("response"=>"true","title"=>$result['title'],"desc"=>$result['description'],"coordinates"=>$result['coordinates']);
        }
        else{
            $data = array("response"=>"false");
        }
        header('Access-Control-Allow-Origin: *');
        header("Content-Type: application/json");
        echo json_encode($data);
    }
    public function pull_t_desc(){
        $data['tid'] = $this->security->xss_clean($this->input->post('tid'));

        $this->load->model('Ajax_model');
        $result = $this->Ajax_model->pull_t_desc($data);
        if($result){
            $data = array("response"=>"true","title"=>$result['title'],"desc"=>$result['description'],"coordinates"=>$result['coordinates']);
        }
        else{
            $data = array("response"=>"false");
        }
        header('Access-Control-Allow-Origin: *');
        header("Content-Type: application/json");
        echo json_encode($data);
    }
    public function edit_history(){
        $data['tid'] = $this->security->xss_clean($this->input->post('tid'));

        $this->load->model('Ajax_model');
        $result = $this->Ajax_model->edit_history($data);
        if($result){
            $data = array("response"=>"true","content"=>$result);
        }
        else{
            $data = array("response"=>"false");
        }
        header('Access-Control-Allow-Origin: *');
        header("Content-Type: application/json");
        echo json_encode($data);
    }

    public function autocomplete_tags(){
        $data['key'] = $this->security->xss_clean($this->input->post('key'));

        $this->load->model('Ajax_model');
        $result = $this->Ajax_model->autocomplete_tags($data);
        $data = array("content"=>$result);
        header('Access-Control-Allow-Origin: *');
        header("Content-Type: application/json");
        echo json_encode($data);
    }

    public function get_real_views(){
        $data['tid'] = $this->security->xss_clean($this->input->post('tid'));
        $this->load->model('Ajax_model');
        $result = $this->Ajax_model->get_real_views($data);
        $data = array("response"=>"true", "content"=>$result);
        header('Access-Control-Allow-Origin: *');
        header("Content-Type: application/json");
        echo json_encode($data);
    }
}
