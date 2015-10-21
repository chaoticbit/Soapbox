<?php defined('BASEPATH') OR exit('No direct script access allowed');
class Readinglist_model extends CI_Model{
    
    public function fetch_thread($data,$uid){
        $query = $this->db->query("SELECT * FROM readinglist WHERE tid = " . (int)$data);
        if($query->num_rows() > 0){
            $query = $this->db->query("SELECT useraccounts.username, CONCAT(extendedinfo.fname, ' ', extendedinfo.lname) as name, extendedinfo.avatarpath, thread.srno, thread.timestamp, thread.title, thread.imagepath, thread.coordinates, thread.description, thread.uid, category.name as cname FROM thread, category, extendedinfo,readinglist,useraccounts WHERE thread.uid=extendedinfo.uid AND useraccounts.srno = thread.uid AND category.srno = thread.cid AND readinglist.tid =" . (int)$data . " AND readinglist.tid = thread.srno AND readinglist.uid = " . (int)$uid);
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
                return $result;
            }
            return false;
        }
        return false;
    }
    
    public function read_list_mobile($data){
        $query = $this->db->query("SELECT * FROM readinglist WHERE uid = " . (int)$data);
        if($query->num_rows() > 0){
            $query = $this->db->query("SELECT useraccounts.username, CONCAT(extendedinfo.fname, ' ', extendedinfo.lname) as name, extendedinfo.avatarpath, thread.srno, thread.timestamp, thread.title, thread.imagepath, thread.coordinates, thread.description, thread.uid, category.name as cname FROM thread, category, extendedinfo,readinglist,useraccounts WHERE thread.uid=extendedinfo.uid AND useraccounts.srno = thread.uid AND category.srno = thread.cid AND readinglist.tid = thread.srno AND readinglist.uid = " . (int)$data . " ORDER BY readinglist.timestamp DESC");
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
                return $result;
            }
            return false;
        }
        return false;
    }
    public function get_second_row($data){
        $query = $this->db->query("SELECT thread.title, thread.srno FROM thread, category, extendedinfo,readinglist,useraccounts WHERE thread.uid=extendedinfo.uid AND useraccounts.srno = thread.uid AND category.srno = thread.cid AND readinglist.tid = thread.srno AND readinglist.uid = " . (int)$data . " ORDER BY readinglist.timestamp DESC");
        $result = $query->row_array(1);
        return $result;
    }
}