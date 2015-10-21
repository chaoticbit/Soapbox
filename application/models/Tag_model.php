<?php defined('BASEPATH') OR exit('No direct script access allowed');
class Tag_model extends CI_Model{
    
    public function fetch_thread($data){
        $query = $this->db->query("SELECT * FROM tags WHERE name = '" . $data . "'");
        if($query->num_rows() > 0){
            $query = $this->db->query("SELECT distinct useraccounts.username, extendedinfo.fname, extendedinfo.lname, extendedinfo.avatarpath, thread.srno, thread.timestamp, thread.title, thread.imagepath, thread.coordinates, thread.description, thread.uid, category.name as cname FROM thread, category_user, category, extendedinfo, thread_tags, useraccounts WHERE thread.srno NOT IN (SELECT tid FROM hidethread) AND thread.cid=category_user.cid AND thread.uid=extendedinfo.uid AND category.srno = thread.cid AND thread_tags.tid = thread.srno AND useraccounts.srno=thread.uid AND thread_tags.name = '" . $data . "'  ORDER BY thread.timestamp DESC LIMIT 10");
            if($query->num_rows()>0){
                $result = $query->result_array();
                for($i=0;$i<count($result);$i++){
                    $result[$i]['numrows'] = $query->num_rows();
                    $query_ = $this->db->query("SELECT thread_tags.name FROM thread_tags WHERE tid=" . $result[$i]['srno']);
                    $result[$i]['tags'] = $query_->result_array();
                    $query_upvotes = $this->db->query("SELECT * FROM upvotes_to_thread WHERE tid = " . $result[$i]['srno']);
                    $result[$i]['upvotes'] = $query_upvotes->num_rows();
                    $query_replies = $this->db->query("SELECT * FROM reply WHERE tid = " . $result[$i]['srno']);
                    $result[$i]['replies'] = $query_replies->num_rows();
                    $query_views = $this->db->query("SELECT * FROM views WHERE tid = " . $result[$i]['srno']);
                    $result[$i]['views'] = $query_views->num_rows();
                    $query_track = $this->db->query("SELECT * from trackthread where tid = " . $result[$i]['srno'] . " and uid = " . $this->session->userdata('userid'));
                    if($query_track->num_rows() > 0){
                        $result[$i]['track'] = true;
                    }
                    else{
                        $result[$i]['track'] = false;
                    }
                    $query_readinglist = $this->db->query("SELECT * from readinglist where tid = " . $result[$i]['srno'] . " and uid = " . $this->session->userdata('userid'));
                    if($query_readinglist->num_rows() > 0){
                        $result[$i]['reading'] = true;
                    }
                    else{
                        $result[$i]['reading'] = false;
                    }
                }
                return $result;
            }
            return false;
        }
        return false;
    }
}