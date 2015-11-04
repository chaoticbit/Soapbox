<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Notifications_model extends CI_Model {
    
public function get_notifications_mobile($uid){
        $response = '';
        $query = $this->db->query("SELECT * FROM notifications WHERE notifications.uid =" . (int)$uid . " ORDER BY readflag,timestamp DESC");
        if($query->num_rows() > 0){
            $result = $query->result_array();
            foreach($result as $item){
                if($item['type']=='1'){//new reply
                $query_ = $this->db->query("SELECT extendedinfo.uid as euid,extendedinfo.avatarpath,CONCAT(extendedinfo.fname, ' ' ,extendedinfo.lname) as name,reply.tid,reply.srno, thread.title FROM thread, reply, extendedinfo where reply.srno = " . $item['ref']." and reply.tid = thread.srno and reply.uid = extendedinfo.uid");
                $result_ = $query_->row_array();
                    if($item['readflag']!='0'){
                        $response.='<li class="notificationli">';
                    }
                    else{
                        $response.='<li class="notificationli active-notif">';
                    }
                    $response.='<a href="' . base_url() . 'Thread/' . $result_['tid'] . '/' . $item['ref'] . '/#r' . $item['ref'] . '"><div class="pure-g">';
                    $response.='<div class="pure-u-1-8">';
                    $response.='<div class="avatar" style="margin: 3px 0;height:60px;width:60px;background-image: url(\'' . userdata_url($result_['euid'], $result_['avatarpath']) . '\');"></div>';
                    $response.='</div>';
                    $response.='<div class="pure-u-7-8" style="padding-left: 30px;">';
                    $response.='<p class="txt-left margin0" style="font-size: 14px;">' . $result_['name'] . ' left a reply on your thread ' . substr($result_['title'],0,20) . '"</p>';
                    $response.='</div>';
                    $response.='</div>';
                    $response.='</a></li>';
                }
                if($item['type']=='2'){//new comment
                $query_ = $this->db->query("SELECT extendedinfo.uid as euid,extendedinfo.avatarpath,CONCAT(extendedinfo.fname ,' ', extendedinfo.lname) as name,reply.description,reply.tid,replies_to_reply.srno,replies_to_reply.rid from thread,reply,replies_to_reply,extendedinfo where replies_to_reply.srno=" . $item['ref'] . " and replies_to_reply.rid = reply.srno and reply.tid = thread.srno and replies_to_reply.uid = extendedinfo.uid");
                $result_ = $query_->row_array();
                    if($item['readflag']!='0'){
                        $response.='<li class="notificationli">';
                    }
                    else{
                        $response.='<li class="notificationli active-notif">';
                    }
                    $response.='<a href="' . base_url() . 'Thread/' . $result_['tid'] . '/' . $item['ref'] . '/#r' . $result_['rid'] . '"><div class="pure-g">';
                    $response.='<div class="pure-u-1-8">';
                    $response.='<div class="avatar" style="margin: 3px 0;height:60px;width:60px;background-image: url(\'' . userdata_url($result_['euid'], $result_['avatarpath']) . '\');"></div>';
                    $response.='</div>';
                    $response.='<div class="pure-u-7-8" style="padding-left: 30px;">';
                    $response.='<p class="txt-left margin0" style="font-size: 14px;">' . $result_['name'] . ' left a comment on your reply ' . substr(strip_tags($result_['description']),0,20) . '"</p>';
                    $response.='</div>';
                    $response.='</div>';
                    $response.='</a></li>';
                }
                if($item['type']=='3'){//upvote to thread
                $query_ = $this->db->query("SELECT extendedinfo.uid as euid,extendedinfo.avatarpath,CONCAT(extendedinfo.fname ,' ', extendedinfo.lname) as name,thread.srno,thread.title from thread,extendedinfo,upvotes_to_thread where upvotes_to_thread.srno=" . $item['ref'] . " and thread.srno = upvotes_to_thread.tid and upvotes_to_thread.uid = extendedinfo.uid");
                $result_ = $query_->row_array();
                    if($item['readflag']!='0'){
                        $response.='<li class="notificationli">';
                    }
                    else{
                        $response.='<li class="notificationli active-notif">';
                    }
                    $response.='<a href="' . base_url() . 'Thread/' . $result_['srno'] . '/' . $item['ref'] . '"><div class="pure-g">';
                    $response.='<div class="pure-u-1-8">';
                    $response.='<div class="avatar" style="margin: 3px 0;height:60px;width:60px;background-image: url(\'' . userdata_url($result_['euid'], $result_['avatarpath']) . '\');"></div>';
                    $response.='</div>';
                    $response.='<div class="pure-u-7-8" style="padding-left: 30px;">';
                    $response.='<p class="txt-left margin0" style="font-size: 14px;">' . $result_['name'] . ' upvoted ' . substr($result_['title'],0,20) . '"</p>';
                    $response.='</div>';
                    $response.='</div>';
                    $response.='</a></li>';
                }
                if($item['type']=='4'){//upvote to reply
                $query_ = $this->db->query("SELECT extendedinfo.uid as euid,extendedinfo.avatarpath, CONCAT(extendedinfo.fname,' ',extendedinfo.lname) as name, reply.description, reply.tid, reply.srno FROM thread, reply, extendedinfo, upvotes_to_replies where upvotes_to_replies.srno = " . $item['ref']." and reply.tid = thread.srno and upvotes_to_replies.rid=reply.srno and upvotes_to_replies.uid = extendedinfo.uid");
                $result_ = $query_->row_array();
                    if($item['readflag']!='0'){
                        $response.='<li class="notificationli">';
                    }
                    else{
                        $response.='<li class="notificationli active-notif">';
                    }
                    $response.='<a href="' . base_url() . 'Thread/' . $result_['tid'] . '/' . $item['ref'] . '/#r' . $item['ref'] . '"><div class="pure-g">';
                    $response.='<div class="pure-u-1-8">';
                    $response.='<div class="avatar" style="margin: 3px 0;height:60px;width:60px;background-image: url(\'' . userdata_url($result_['euid'], $result_['avatarpath']) . '\');"></div>';
                    $response.='</div>';
                    $response.='<div class="pure-u-7-8" style="padding-left: 30px;">';
                    $response.='<p class="txt-left margin0" style="font-size: 14px;">' . $result_['name'] . ' upvoted reply ' . substr(strip_tags($result_['description']),0,30) . '"</p>';
                    $response.='</div>';
                    $response.='</div>';
                    $response.='</a></li>';
                }
                if($item['type']=='5'){//mark correct
                $query_ = $this->db->query("SELECT extendedinfo.uid as euid,extendedinfo.avatarpath,CONCAT(extendedinfo.fname ,' ', extendedinfo.lname) as name,reply.description,reply.tid,reply.srno FROM thread, reply, extendedinfo where reply.srno = " . $item['ref']." and reply.tid = thread.srno and thread.uid = extendedinfo.uid");
                $result_ = $query_->row_array();
                    if($item['readflag']!='0'){
                        $response.='<li class="notificationli">';
                    }
                    else{
                        $response.='<li class="notificationli active-notif">';
                    }
                    $response.='<a href="' . base_url() . 'Thread/' . $result_['tid'] . '/' . $item['ref'] . '/#r' . $item['ref'] . '"><div class="pure-g">';
                    $response.='<div class="pure-u-1-8">';
                    $response.='<div class="avatar" style="margin: 3px 0;height:60px;width:60px;background-image: url(\'' . userdata_url($result_['euid'], $result_['avatarpath']) . '\');"></div>';
                    $response.='</div>';
                    $response.='<div class="pure-u-7-8" style="padding-left: 30px;">';
                    $response.='<p class="txt-left margin0" style="font-size: 14px;">' . $result_['name'] . ' marked your reply as correct."</p>';
                    $response.='</div>';
                    $response.='</div>';
                    $response.='</a></li>';
                }
            }
            return $response;
        }
        return false;   
    }
}