<?php defined('BASEPATH') OR exit('No direct script access allowed');
class Thread_model extends CI_Model{
    
    public function register_view($data, $userid){
        $orig = $this->db->db_debug;
        $this->db->db_debug = FALSE;
        
        $this->db->query("INSERT INTO views VALUES(" . (int)$data . ", " . (int)$userid  . ")");
        
        $this->db->db_debug = $orig;
    }
    public function register_read($data,$userid){
        $this->db->query("UPDATE notifications SET readflag=1 WHERE ref = " . (int)$data . " and uid = " . (int)$userid . "");
    }
    public function fetch_thread($data){
        $query = $this->db->query("SELECT useraccounts.username, CONCAT(extendedinfo.fname, ' ', extendedinfo.lname) as name, extendedinfo.avatarpath, thread.srno, thread.timestamp, thread.title, thread.imagepath, thread.coordinates, thread.description, thread.uid, thread.edit, category.name as cname FROM thread, category, extendedinfo, useraccounts WHERE thread.uid=extendedinfo.uid AND category.srno=thread.cid AND useraccounts.srno=thread.uid AND thread.srno=" . (int)$data);
        if($query->num_rows() > 0){
            $result = $query->row_array();           
            $query_ = $this->db->query("SELECT thread_tags.name FROM thread_tags WHERE tid=" . (int)$result['srno']);
            if($query_->num_rows()>0){
                $result['tags'] = $query_->result_array();
            }
            else{
                $result['tags'] = false;
            }
            $query_upvotes = $this->db->query("SELECT * FROM upvotes_to_thread WHERE tid = " . (int)$result['srno']);
            $result['upvotes'] = $query_upvotes->num_rows();
            $query_replies = $this->db->query("SELECT * FROM reply WHERE tid = " . (int)$result['srno']);
            $result['replies'] = $query_replies->num_rows();
            $query_views = $this->db->query("SELECT * FROM views WHERE tid = " . (int)$result['srno']);
            $result['views'] = $query_views->num_rows();
            $query_track = $this->db->query("SELECT * from trackthread where tid = " . (int)$result['srno'] . " and uid = " . (int)$this->session->userdata('userid'));
            if ($query_track->num_rows() > 0) {
                $result['track'] = true;
            } else {
                $result['track'] = false;
            }
            $query_readinglist = $this->db->query("SELECT * from readinglist where tid = " . (int)$result['srno'] . " and uid = " . (int)$this->session->userdata('userid'));
            if ($query_readinglist->num_rows() > 0) {
                $result['reading'] = true;
            } else {
                $result['reading'] = false;
            }
            $query_upvote_flag = $this->db->query("SELECT * FROM upvotes_to_thread WHERE tid=" . (int)$result['srno'] . " AND uid=" . (int)$this->session->userdata('userid'));
            if($query_upvote_flag->num_rows() > 0){
                $result['up_flag'] = true;
            }
            else{
                $result['up_flag'] = false;
            }
            return $result;
        }
        return false;
    }
    
    public function fetch_replies($data){
        $query = $this->db->query("SELECT useraccounts.username, CONCAT(extendedinfo.fname, ' ', extendedinfo.lname) as name, extendedinfo.avatarpath, reply.srno, reply.description, reply.timestamp, reply.correct, reply.uid FROM useraccounts, extendedinfo, reply WHERE useraccounts.srno=extendedinfo.uid AND reply.uid=extendedinfo.uid AND reply.tid=" . (int)$data . " ORDER BY reply.correct DESC");
        if($query->num_rows() > 0){
            $result = $query->result_array();
            for($i=0;$i<count($result);$i++){
                
                //upvote flag
                $query__=$this->db->query("SELECT * FROM upvotes_to_replies WHERE rid=" . (int)$result[$i]['srno'] . " AND uid=" . (int)$this->session->userdata('userid'));
                if($query__->num_rows()>0){
                    $result[$i]['upvote_flag'] = true;
                }
                else{
                    $result[$i]['upvote_flag'] = false;
                }
                
                //upvotes
                $query_ = $this->db->query("SELECT COUNT(*) AS upvotes FROM upvotes_to_replies WHERE rid=" . (int)$result[$i]['srno']);
                $count = $query_->row_array();
                $result[$i]['upvotes'] = $count['upvotes'];
                
                //comments
                $_query = $this->db->query("SELECT CONCAT(extendedinfo.fname, ' ', extendedinfo.lname) as name, replies_to_reply.srno, replies_to_reply.description, replies_to_reply.timestamp, replies_to_reply.uid FROM replies_to_reply, extendedinfo WHERE replies_to_reply.uid = extendedinfo.uid AND replies_to_reply.rid=" . (int)$result[$i]['srno']);
                if($_query->num_rows() > 0){
                    $result[$i]['comments'] = $_query->result_array();
                }
                else{
                    $result[$i]['comments'] = '';
                }
            }
            return $result;
        }
        return false;
    }
}