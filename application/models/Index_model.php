<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Index_model extends CI_Model{
    
    public function get_categories_alphabetical($uid){
        $query = $this->db->query("SELECT * FROM category LEFT JOIN category_user ON category.srno=category_user.cid AND category_user.uid=$uid ORDER BY name ASC");
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
    public function get_categories_following($uid){
        $query = $this->db->query("SELECT * FROM category LEFT JOIN category_user ON category.srno=category_user.cid AND category_user.uid=$uid ORDER BY uid DESC");
        if($query->num_rows()>0){
            return $query->result_array();
        }
        return false;
    }    
    public function get_readinglist($uid){
        $query = $this->db->query("SELECT thread.srno, thread.title, extendedinfo.fname, extendedinfo.lname FROM readinglist, thread, extendedinfo WHERE readinglist.tid=thread.srno AND readinglist.uid=$uid AND thread.uid=extendedinfo.uid ORDER BY readinglist.timestamp DESC LIMIT 5");
        if($query->num_rows()>0){
            return $query->result_array();
        }
        return false;
    }
    public function get_tags(){
        $query = $this->db->query("SELECT name FROM tags order by rand() limit 15");
        if($query->num_rows()>0){
            return $query->result_array();
        }
        return false;
    }
    public function get_featured_threads(){
        $query = $this->db->query("SELECT thread.srno, thread.title, thread.uid FROM thread, weightage WHERE thread.srno=weightage.tid and DATE(thread.timestamp) = CURDATE() ORDER BY weight DESC LIMIT 5");
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
    public function populate_feed($uid){
        $query = $this->db->query("SELECT useraccounts.username, extendedinfo.fname, extendedinfo.lname, extendedinfo.avatarpath, thread.srno, thread.timestamp, thread.title, thread.imagepath, thread.coordinates, thread.description, thread.uid, category.name as cname FROM thread, category_user, category, extendedinfo, useraccounts WHERE thread.srno NOT IN (SELECT tid FROM hidethread) AND thread.cid=category_user.cid AND category_user.uid=$uid AND thread.uid=extendedinfo.uid AND category.srno=thread.cid AND useraccounts.srno=thread.uid ORDER BY thread.timestamp DESC LIMIT 10");
        if($query->num_rows()>0){
            $result = $query->result_array();
            for($i=0;$i<count($result);$i++){
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
    
    public function get_notifications($uid){
        $response = '';
        $query = $this->db->query("SELECT * FROM notifications WHERE notifications.uid =" . (int)$uid . " ORDER BY readflag,timestamp DESC");
        if($query->num_rows() > 0){
            $result = $query->result_array();
            foreach($result as $item){
                if($item['type']=='1'){
                $query_ = $this->db->query("SELECT extendedinfo.uid as euid,extendedinfo.avatarpath,CONCAT(extendedinfo.fname, ' ' ,extendedinfo.lname) as name,reply.tid,reply.srno, thread.title FROM thread, reply, extendedinfo where reply.srno = " . $item['ref']." and reply.tid = thread.srno and reply.uid = extendedinfo.uid");
                $result_ = $query_->row_array();
                    if($item['readflag']!='0'){
                        $response.='<li>';
                    }
                    else{
                        $response.='<li class="active-notif">';
                    }
                    $response.='<a href="' . base_url() . 'Thread/' . $result_['tid'] . '/' . $item['ref'] . '/#r' . $item['ref'] . '"><div class="pure-g">';
                    $response.='<div class="pure-u-1-8">';
                    $response.='<div class="avatar" style="background-image: url(\'' . userdata_url($result_['euid'], $result_['avatarpath']) . '\');"></div>';
                    $response.='</div>';
                    $response.='<div class="pure-u-7-8" style="padding-left: 10px;">';
                    $response.='<p class="txt-left margin0">' . $result_['name'] . ' left a reply on your thread "' . substr($result_['title'],0,20) . '..."</p>';
                    $response.='</div>';
                    $response.='</div>';
                    $response.='</a></li>';
                }
                if($item['type']=='2'){
                $query_ = $this->db->query("SELECT extendedinfo.uid as euid,extendedinfo.avatarpath,CONCAT(extendedinfo.fname ,' ', extendedinfo.lname) as name,reply.description,reply.tid,replies_to_reply.srno,replies_to_reply.rid from thread,reply,replies_to_reply,extendedinfo where replies_to_reply.srno=" . $item['ref'] . " and replies_to_reply.rid = reply.srno and reply.tid = thread.srno and replies_to_reply.uid = extendedinfo.uid");
                $result_ = $query_->row_array();
                    if($item['readflag']!='0'){
                        $response.='<li>';
                    }
                    else{
                        $response.='<li class="active-notif">';
                    }
                    $response.='<a href="' . base_url() . 'Thread/' . $result_['tid'] . '/' . $item['ref'] . '/#r' . $result_['rid'] . '"><div class="pure-g">';
                    $response.='<div class="pure-u-1-8">';
                    $response.='<div class="avatar" style="background-image: url(\'' . userdata_url($result_['euid'], $result_['avatarpath']) . '\');"></div>';
                    $response.='</div>';
                    $response.='<div class="pure-u-7-8" style="padding-left: 10px;">';
                    $response.='<p class="txt-left margin0">' . $result_['name'] . ' left a comment on your reply "' . substr(strip_tags($result_['description']),0,20) . '..."</p>';
                    $response.='</div>';
                    $response.='</div>';
                    $response.='</a></li>';
                }
                if($item['type']=='3'){
                $query_ = $this->db->query("SELECT extendedinfo.uid as euid,extendedinfo.avatarpath,CONCAT(extendedinfo.fname ,' ', extendedinfo.lname) as name,thread.srno,thread.title from thread,extendedinfo,upvotes_to_thread where upvotes_to_thread.srno=" . $item['ref'] . " and thread.srno = upvotes_to_thread.tid and upvotes_to_thread.uid = extendedinfo.uid");
                $result_ = $query_->row_array();
                    if($item['readflag']!='0'){
                        $response.='<li>';
                    }
                    else{
                        $response.='<li class="active-notif">';
                    }
                    $response.='<a href="' . base_url() . 'Thread/' . $result_['srno'] . '/' . $item['ref'] . '"><div class="pure-g">';
                    $response.='<div class="pure-u-1-8">';
                    $response.='<div class="avatar" style="background-image: url(\'' . userdata_url($result_['euid'], $result_['avatarpath']) . '\');"></div>';
                    $response.='</div>';
                    $response.='<div class="pure-u-7-8" style="padding-left: 10px;">';
                    $response.='<p class="txt-left margin0">' . $result_['name'] . ' upvoted "' . substr($result_['title'],0,20) . '..."</p>';
                    $response.='</div>';
                    $response.='</div>';
                    $response.='</a></li>';
                }
                if($item['type']=='4'){
                $query_ = $this->db->query("SELECT extendedinfo.uid as euid,extendedinfo.avatarpath, CONCAT(extendedinfo.fname,' ',extendedinfo.lname) as name, reply.description, reply.tid, reply.srno FROM thread, reply, extendedinfo, upvotes_to_replies where upvotes_to_replies.srno = " . $item['ref']." and reply.tid = thread.srno and upvotes_to_replies.rid=reply.srno and upvotes_to_replies.uid = extendedinfo.uid");
                $result_ = $query_->row_array();
                    if($item['readflag']!='0'){
                        $response.='<li>';
                    }
                    else{
                        $response.='<li class="active-notif">';
                    }
                    $response.='<a href="' . base_url() . 'Thread/' . $result_['tid'] . '/' . $item['ref'] . '/#r' . $result_['srno'] . '"><div class="pure-g">';
                    $response.='<div class="pure-u-1-8">';
                    $response.='<div class="avatar" style="background-image: url(\'' . userdata_url($result_['euid'], $result_['avatarpath']) . '\');"></div>';
                    $response.='</div>';
                    $response.='<div class="pure-u-7-8" style="padding-left: 10px;">';
                    $response.='<p class="txt-left margin0">' . $result_['name'] . ' upvoted reply "' . substr(strip_tags($result_['description']),0,30) . '..."</p>';
                    $response.='</div>';
                    $response.='</div>';
                    $response.='</a></li>';
                }
                if($item['type']=='5'){
//search here                    
                $query_ = $this->db->query("SELECT extendedinfo.uid as euid,extendedinfo.avatarpath,CONCAT(extendedinfo.fname ,' ', extendedinfo.lname) as name,reply.description,reply.tid as tsrno,reply.srno FROM thread, reply, extendedinfo where reply.srno = " . $item['ref']." and reply.tid = thread.srno and thread.uid = extendedinfo.uid");
                $result_ = $query_->row_array();
                    if($item['readflag']!='0'){
                        $response.='<li>';
                    }
                    else{
                        $response.='<li class="active-notif">';
                    }
                    $response.='<a href="' . base_url() . 'Thread/' . $result_['tsrno'] . '/' . $item['ref'] . '/#r' . $item['ref'] . '"><div class="pure-g">';
                    $response.='<div class="pure-u-1-8">';
                    $response.='<div class="avatar" style="background-image: url(\'' . userdata_url($result_['euid'], $result_['avatarpath']) . '\');"></div>';
                    $response.='</div>';
                    $response.='<div class="pure-u-7-8" style="padding-left: 10px;">';
                    $response.='<p class="txt-left margin0">' . $result_['name'] . ' marked your reply as correct.</p>';
                    $response.='</div>';
                    $response.='</div>';
                    $response.='</a></li>';
                }
            }
            return $response;
        }
        return false;    
    }
    
    public function notification_count($uid){
        $query = $this->db->query("select * from notifications where uid = " . (int)$uid . " and readflag = 0");
        $count = $query->num_rows();
        return $count;
    }
}