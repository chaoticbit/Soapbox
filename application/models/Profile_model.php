<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Profile_model extends CI_Model{
    
    public function validate($username){
        $result = $this->db->query("SELECT * FROM useraccounts WHERE username='$username'");
        if($result->num_rows() > 0){
            $row = $result->row_array();
            $query = $this->db->query("SELECT useraccounts.username,CONCAT(extendedinfo.fname,' ',extendedinfo.lname) as name, extendedinfo.avatarpath,extendedinfo.uid,extendedinfo.coverpath,extendedinfo.covercoordinates,extendedinfo.about from extendedinfo,useraccounts where extendedinfo.uid = " . $row['srno']." and extendedinfo.uid = useraccounts.srno");
            $row_ = $query->row_array();
            return $row_;
        }
        return false;
    }
    public function get_thread_count($uid){
        $query = $this->db->query("SELECT * FROM thread where uid = " . (int)$uid . "");
        $result = $query->num_rows();
        return $result;
    }
    public function get_reply_count($uid){
        $query = $this->db->query("SELECT * FROM reply where uid = " . (int)$uid . "");
        $result = $query->num_rows();
        return $result;
    }
    public function get_timeline($uid){
        $response = '';
        $query = $this->db->query("SELECT * FROM activitylog WHERE uid = " . (int)$uid . " ORDER BY timestamp DESC");
        if($query->num_rows() > 0){
            $result = $query->result_array();
            foreach($result as $item){
                $hdnT = $item['timestamp'];
                if($item['type']=="0"){ //upvotetothread
                    $query_ = $this->db->query("SELECT thread.srno,thread.description FROM thread ,upvotes_to_thread where upvotes_to_thread.srno = " . $item['ref']." and thread.srno = upvotes_to_thread.tid");
                    $result_ = $query_->row_array();
                    $response.='<li>';
                    $response.='<a href="' . base_url() . 'Thread/' . $result_['srno'] . '">';
                    $response.='<i class="fa fa-star bg-red fg-white"></i>';
                    $response.='<span class="date">'.date('d M',strtotime($item['timestamp'])).'</span>';
                    $response.='<div class="content">';
                    $response.='<p><span style="font-size: 10pt !important;">'.$item['description'].'</span></p>';
                    $response.='<small class="fg-gray"><i class="fa fa-fw fa-clock-o fg-gray"></i> '.time_elapsed($item['timestamp']).'</small>';
                    $response.='</div>';
                    $response.='</a>';
                    $response.='</li>';
                }
                if($item['type']=="1"){ //reply
                    $query_ = $this->db->query("SELECT reply.tid,reply.srno FROM thread, reply where reply.srno = " . $item['ref']." and reply.tid = thread.srno");
                    $result_ = $query_->row_array();
                    $response.='<li>';
                    $response.='<a href="' . base_url() . 'Thread/' . $result_['tid'] . '/#r' . $result_['srno'] . '">';
                    $response.='<i class="fa fa-comment bg-green fg-white"></i>';
                    $response.='<span class="date">'.date('d M',strtotime($item['timestamp'])).'</span>';
                    $response.='<div class="content">';
                    $response.='<p><span style="font-size: 10pt !important;">'.$item['description'].'</span></p>';
                    $response.='<small class="fg-gray"><i class="fa fa-fw fa-clock-o fg-gray"></i> '.time_elapsed($item['timestamp']).'</small>';
                    $response.='</div>';
                    $response.='</a>';
                    $response.='</li>';
                }
                if($item['type']=="2"){ //rreply
                    $query_ = $this->db->query("SELECT reply.tid,reply.srno from thread,reply,replies_to_reply where replies_to_reply.srno=" . $item['ref'] . " and replies_to_reply.rid = reply.srno and reply.tid = thread.srno");
                    $result_ = $query_->row_array();
                    $response.='<li>';
                    $response.='<a href="' . base_url() . 'Thread/' . $result_['tid'] . '/#r' . $result_['srno'] . '">';
                    $response.='<i class="fa fa-comments fg-white" style="background-color:#68537C;"></i>';
                    $response.='<span class="date">'.date('d M',strtotime($item['timestamp'])).'</span>';
                    $response.='<div class="content">';
                    $response.='<p><span style="font-size: 10pt !important;">'.$item['description'].'</span></p>';
                    $response.='<small class="fg-gray"><i class="fa fa-fw fa-clock-o fg-gray"></i> '.time_elapsed($item['timestamp']).'</small>';
                    $response.='</div>';
                    $response.='</a>';
                    $response.='</li>';
                }
                if($item['type']=="3"){ //thread
                    $query_ = $this->db->query("SELECT thread.srno from thread where thread.srno=" . $item['ref'] . "") or die(mysql_error());
                    $result_ = $query_->row_array();
                    $response.='<li>';
                    $response.='<a href="' . base_url() . 'Thread/' . $result_['srno'] . '">';
                    $response.='<i class="fa fa-leanpub bg-gray fg-white"></i>';
                    $response.='<span class="date">'.date('d M',strtotime($item['timestamp'])).'</span>';
                    $response.='<div class="content">';
                    $response.='<p><span style="font-size: 10pt !important;">'.$item['description'].'</span></p>';
                    $response.='<small class="fg-gray"><i class="fa fa-fw fa-clock-o fg-gray"></i> '.time_elapsed($item['timestamp']).'</small>';
                    $response.='</div>';
                    $response.='</a>';
                    $response.='</li>';
                }
                if($item['type']=="4"){ //upvotetoreply
                    $query_ = $this->db->query("SELECT reply.tid,reply.srno FROM thread, reply,upvotes_to_replies where upvotes_to_replies.srno = " . $item['ref']." and reply.tid = thread.srno and upvotes_to_replies.rid = reply.srno");
                    $result_ = $query_->row_array();
                    $response.='<li>';
                    $response.='<a href="' . base_url() . 'Thread/' . $result_['tid'] . '/#r' . $result_['srno'] . '">';
                    $response.='<i class="fa fa-heart bg-darkRed fg-white"></i>';
                    $response.='<span class="date">'.date('d M',strtotime($item['timestamp'])).'</span>';
                    $response.='<div class="content">';
                    $response.='<p><span style="font-size: 10pt !important;">'.$item['description'].'</span></p>';
                    $response.='<small class="fg-gray"><i class="fa fa-fw fa-clock-o fg-gray"></i> '.time_elapsed($item['timestamp']).'</small>';
                    $response.='</div>';
                    $response.='</a>';    
                    $response.='</li>';
                } 
            }
            $query_ = $this->db->query("SELECT username, timestamp FROM useraccounts WHERE srno = " . (int)$uid . "");
            $result_ = $query_->row_array();
            $response.='<li class="joined-li">';
            $response.='<a href="' . base_url() . $result_['username'] .'">';
            $response.='<i class="fa fa-user bg-globalColor fg-white"></i>';
            $response.='<div class="content" style="padding-top: 5px;">';
            $response.='<p  class="bold margin0"><span style="font-size: 10pt !important;"><i class="fa fa-fw fa-clock-o fg-gray"></i> Joined Soapbox on </span> <small class="fg-gray"> '.date('d M Y',strtotime($result_['timestamp'])).'</small></p>';
            $response.='</div>';
            $response.='</a>';    
            $response.='</li>';
            return $response;
        }
        return false;
    }
    
    public function get_personal_info($uid){
        $query = $this->db->query("SELECT * FROM extendedinfo WHERE uid = " . (int)$uid . "");
        $result = $query->result_array();
        return $result;
    }
    public function get_top_threads($uid){
        $query = $this->db->query("SELECT thread.srno,thread.title,thread.uid,COUNT(upvotes_to_thread.tid) AS upvotes FROM thread LEFT JOIN upvotes_to_thread ON thread.srno = upvotes_to_thread.tid WHERE thread.uid = " . (int)$uid . " GROUP BY thread.srno ORDER BY upvotes DESC LIMIT 5");
        if($query->num_rows() > 0){
            $result = $query->result_array();
            for($i = 0;$i < count($result);$i++){
                $query_ = $this->db->query("SELECT useraccounts.username,extendedinfo.fname,extendedinfo.lname,extendedinfo.avatarpath FROM extendedinfo,useraccounts WHERE extendedinfo.uid = " . $result[$i]['uid'] . " AND extendedinfo.uid = useraccounts.srno");
                $result[$i]['userinfo'] = $query_->result_array();                
            }
            return $result;
        }
        return false;
    }
    public function get_top_replies($uid){
        $query = $this->db->query("select reply.*, COUNT(upvotes_to_replies.rid) AS upvotes FROM reply LEFT JOIN upvotes_to_replies ON reply.srno = upvotes_to_replies.rid WHERE reply.uid = ". (int)$uid. " GROUP BY reply.srno ORDER BY upvotes DESC LIMIT 5");
        if($query->num_rows() > 0){
            $result = $query->result_array();
            for($i = 0;$i < count($result);$i++){
                $query_ = $this->db->query("SELECT useraccounts.username,extendedinfo.fname,extendedinfo.lname,extendedinfo.avatarpath FROM extendedinfo,useraccounts WHERE extendedinfo.uid = " . $result[$i]['uid'] . " AND extendedinfo.uid = useraccounts.srno");
                $result[$i]['userinfo'] = $query_->result_array();                
            }
            return $result;
        }
        return false;
    }
    public function get_hidden_threads($uid){
        $query = $this->db->query("SELECT useraccounts.username,CONCAT(extendedinfo.fname,' ',extendedinfo.lname) as name,extendedinfo.avatarpath,thread.srno,thread.uid,thread.title FROM useraccounts,extendedinfo,thread,hidethread WHERE hidethread.uid = " . (int)$uid . " AND hidethread.tid = thread.srno AND thread.uid = useraccounts.srno AND thread.uid = extendedinfo.uid");
        if($query->num_rows() > 0){
            $result = $query->result_array();
            return $result;
        }
        return false;
    }
}