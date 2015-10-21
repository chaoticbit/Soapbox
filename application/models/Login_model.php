<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Login_model extends CI_Model {

    public function validate($username, $password){
        $result = $this->db->query("SELECT * FROM useraccounts WHERE username='$username' AND password='$password'");
        if($result->num_rows() > 0){
            $row = $result->row_array();
            $query = $this->db->query("SELECT fname, lname, avatarpath from extendedinfo where uid = " . $row['srno']);
            $row_ = $query->row_array();
            $data['userid'] = $row['srno'];
            $data['fname'] = $row_['fname'];
            $data['lname'] = $row_['lname'];
            $data['avatarpath'] = $row_['avatarpath'];
            return $data;
        }
        return false;
    }
    public function signup($nusername, $npassword){
        $this->db->query("INSERT INTO useraccounts(username, password) values('$nusername','$npassword')");
        $result = $this->db->query("SELECT srno FROM useraccounts WHERE username='$nusername'");
        $row = $result->row_array();
        return $row['srno'];
    }
    
    public function reset_password($data){
        $query = $this->db->query("UPDATE useraccounts SET password='" . $data['npassword'] . "' WHERE username='" . $data['nusername'] ."'");
        $query_= $this->db->query("SELECT * FROM useraccounts WHERE username='" . $data['nusername'] . "' AND password='" . $data['npassword'] . "'");
        if($query_->num_rows()>0){
            return true;
        }
        return false;
    }
}