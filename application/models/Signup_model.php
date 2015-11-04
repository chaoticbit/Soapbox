<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Signup_model extends CI_Model{
    public function get_categories(){
        $query = $this->db->query("SELECT * FROM category");
        if($query->num_rows()>0){
            $result = $query->result_array();
            
            for($i=0;$i<count($result);$i++){
                $query_= $this->db->query("SELECT COUNT(*) as count FROM thread WHERE cid=" . (int)$result[$i]['srno']);
                $result_= $query_->row_array();
                $result[$i]['count'] = $result_['count'];
            }
            return $result;
        }
        return false;
    }
    public function userinfo_exists($uid){
        $query = $this->db->query("SELECT * FROM extendedinfo WHERE uid=$uid");
        if($query->num_rows()>0){
            return true;
        }
        return false;
    }
    public function populate($data){
        $query = $this->db->query("INSERT INTO extendedinfo VALUES(" . $this->db->escape($data['fname']) ."," . $this->db->escape($data['lname']) ."," . $this->db->escape($data['imagepath']) .", '', '', " . $this->db->escape($data['email']) ."," . $this->db->escape($data['gender'][0]) ."," . $this->db->escape($data['about']) ."," .(int)$data['question'] ."," . $this->db->escape($data['answer']) ."," . $this->db->escape($data['hometown']) ."," . $this->db->escape($data['city']) ."," . $this->db->escape($data['profession']) ."," . $this->db->escape($data['education']) ."," . $this->db->escape($data['college']) ."," . $this->db->escape($data['school']) ."," . (int)$data['uid'] . ")");
        $categories = explode(',',$data['categories']);
        foreach ($categories as $category){
            $query = $this->db->query("INSERT INTO category_user VALUES(" . (int)$category . "," . (int)$data['uid'] .")");
        }
    }
}