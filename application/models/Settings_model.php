<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Settings_model extends CI_Model{
    
    public function fetch_info($data){
        $query = $this->db->query("SELECT extendedinfo.*, useraccounts.username FROM extendedinfo, useraccounts WHERE useraccounts.srno=extendedinfo.uid AND uid=" . (int)$data);
        if($query->num_rows()>0){
            $result = $query->row_array();
            return $result;
        }
    }
    public function basic_update($data){
        $sql = "UPDATE extendedinfo SET";
        if($data['fname']){
            $sql.=" fname='" . $data['fname'] . "',";
        }
        if($data['lname']){
            $sql.=" lname='" . $data['lname'] . "',";
        }
        if($data['imagepath']){
            $sql.=" avatarpath='" . $data['imagepath'] . "',";
        }
        $sql=rtrim($sql,",");
        $query = $this->db->query($sql . " WHERE uid=" . (int)$data['uid']);
        return true;
    }
    
    public function account_update($data){
        if(strlen($data['npassword'])>7){
            if($data['npassword']==$data['cpassword']){
                $data['npassword'] = md5($data['npassword']);
                $query = $this->db->query("UPDATE useraccounts SET password='" . $data['npassword'] . "' WHERE srno=" . (int)$data['uid']);
                $query_= $this->db->query("SELECT * FROM useraccounts WHERE password='" . $data['npassword'] . "' AND srno=" . (int)$data['uid']);
                if(!($query_->num_rows()>0)){
                    return false;
                }
            }
            else{
                return false;
            }
        }
        if(strlen($data['email'])){
            $query = $this->db->query("SELECT * FROM extendedinfo WHERE email='" . $data['email'] . "'");
            if($query->num_rows() > 0){
                return false;
            }
            else{
                $query_= $this->db->query("UPDATE extendedinfo SET email='" . $data['email'] ."' WHERE uid=" . (int)$data['uid']);
                $_query= $this->db->query("SELECT * FROM extendedinfo WHERE email='" . $data['email'] . "' AND uid=" . (int)$data['uid']);
                if(!($_query->num_rows()>0)){
                    return false;
                }
            }
        }
        if(strlen($data['username'])){
            $query = $this->db->query("UPDATE useraccounts SET username='" . $data['username'] . "' WHERE srno=" . (int)$data['uid']);
            $query_= $this->db->query("SELECT * FROM useraccounts WHERE username='" . $data['username'] . "' AND srno=" . (int)$data['uid']);
            if(!($query_->num_rows()>0)){
                return false;
            }
        }
        return true;
    }
    
    public function general_update($data){
        $sql = "UPDATE extendedinfo SET ";
        if(strlen($data['gender'])>0){
            if($data['gender']=="m"){
                $sql.="gender='m',";
            }
            else if($data['gender']=="f"){
                $sql.="gender='f',";
            }
            else{
                return false;
            }
        }
        if(strlen($data['hometown'])>0){
            $sql.="hometown='" . $data['hometown'] . "',";
        }
        if(strlen($data['city'])>0){
            $sql.="city='" . $data['city'] . "',";
        }
        if(strlen($data['profession'])>0){
            $sql.="profession='" . mysql_escape_string($data['profession']) . "',";
        }
        if(strlen($data['about'])>0){
            $sql.="about='" . mysql_escape_string($data['about']) . "',";
        }
        if(strlen($data['education'])>0){
            $sql.="education='" . mysql_escape_string($data['education']) . "',";
        }
        if(strlen($data['college'])>0){
            $sql.="college='" . mysql_escape_string($data['college']) . "',";
        }
        if(strlen($data['school'])>0){
            $sql.="school='" . mysql_escape_string($data['school']) . "',";
        }
        $sql = rtrim($sql, ",");
        $sql.=" WHERE uid=" . (int)$data['uid'];
        $this->db->query($sql);
        return true;
    }
    
    public function delete_account($data){
        $query = $this->db->query("SELECT * FROM useraccounts WHERE password='" . mysql_escape_string($data['password']) . "' AND srno=" . (int)$data['uid']);
        if($query->num_rows()>0){
            $query_= $this->db->query("DELETE FROM useraccounts WHERE srno=" . (int)$data['uid']);
            $dir = FCPATH . 'userdata/' . $data['uid'];
            system('/bin/rm -rf ' . escapeshellarg($dir));
            return true;
        }
        return false;
    }
}