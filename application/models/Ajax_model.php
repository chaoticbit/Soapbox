<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Ajax_model extends CI_Model {
   
    public function checkUsername($username){
        $query = $this->db->query("SELECT username FROM useraccounts WHERE username='$username'");
        if($query->num_rows() > 0){
            return true;
        }
        else{            
            return false;
        }        
    }
    public function email_exists($email){
        $query = $this->db->query("SELECT * FROM extendedinfo WHERE email='$email'");
        if($query->num_rows()>0){
            return true;
        }
        else{
            return false;
        }
    }
    public function post_thread($data){
        
        $query = $this->db->query("INSERT INTO thread(title,description,imagepath,coordinates,cid,uid) VALUES('" . $data['title'] . "','" . safeThreadContent($data['desc']) . "'," . $this->db->escape($data['filename']) . "," . $this->db->escape($data['coordinates']) . "," . (int)$data['category'] . "," . (int)$data['uid'] . ")");
        $query_ = $this->db->query("SELECT thread.srno, thread.uid, thread.timestamp, thread.imagepath, thread.title, thread.description, thread.coordinates, extendedinfo.fname, extendedinfo.lname, extendedinfo.avatarpath, category.name as cname FROM thread, extendedinfo, category WHERE thread.uid = " . (int)$data['uid'] . " AND thread.uid=extendedinfo.uid AND thread.cid=category.srno ORDER BY timestamp DESC LIMIT 1");
        if($query_->num_rows() > 0){
            $result = $query_->row_array();
            $query = $this->db->query("INSERT INTO trackthread values(" . (int)$result['srno'] . "," . (int)$result['uid'] . ")");
            $query = $this->db->query("INSERT INTO weightage(tid, timestamp) values(" . (int)$result['srno'] . ", '" . $result['timestamp'] ."')");
            if($data['tags']!=""){
                $orig = $this->db->db_debug;
                $this->db->db_debug = FALSE;                
                $array = explode(',', $data['tags']);
                
                foreach($array as $element){
                    $element = preg_replace('/[^A-Za-z0-9\-]/', '', $element);
                    $query = $this->db->query("INSERT INTO tags VALUES('$element')");
                    $query = $this->db->query("INSERT INTO thread_tags VALUES('" . $element . "'," . (int)$result['srno'] . ")");
                } 
                
                $this->db->db_debug = $orig;
            }
            $response ='<li class="pure-u-1 thread" data-tid="' . $result['srno'] . '">';
            $response.='<div class="pure-g">';
            $response.='<div class="pure-u-1" style="margin-bottom: 10px;">';
            $response.='<ul>';
            $response.='<li>';
            $response.='<div class="avatar" style="background-image: url(\'' . userdata_url($result['uid'], $result['avatarpath']) . '\');"></div>';
            $response.='</li>';
            $response.='<li style="padding-left: 10px;">';
            $response.='<p><a href="javascript:;">' . $result['fname'] . ' ' . $result['lname'] . '</a><br /><small><a href="javascript:;" class="fg-grayDark link">' . $result['cname'] . '</a><span class="dot-center"></span>' . time_elapsed($result['timestamp']) . '</small></p>';
            $response.='</li>';
            $response.='<li class="flt-right">';
            $response.='<i class="fa fa-chevron-down fg-grayLighter pointer toggle-thread-options"></i>';
            $response.='<div class="thread-options-dropdown-parent" style="display: none;position: relative;">';
            $response.='<div class="dropdown thread-options-dropdown" style="right: 0;">';
            $response.='<ul>';
            $response.='<li class="fg-green" data-opt="untrack_thread"><a href="javascript:;"><i class="fa fa-check fa-fw"></i> Track this thread</a></li>';
            $response.='<li class="fg-gray" data-opt="add_to_list"><a href="#"><i class="fa fa-book fa-fw"></i> Add to reading list</a></li>';
            $response.='<li class="fg-gray" data-opt="delete_thread"><a href="#"><i class="fa fa-trash fa-fw"></i> Delete this thread</a></li>';
            $response.='</ul>';
            $response.='</div>';
            $response.='</div>';                                            
            $response.='</li>';
            $response.='</ul>';
            $response.='</div>';
            if($result['imagepath']!=""){
                $response.='<div class="pure-u-1 thumbnail" style="background-image: url(\'' . userdata_url($result['uid'], $result['imagepath']) . '\');background-position:' . $result['coordinates'] . '"></div>';
            }
            $response.='<div class="pure-u-1 pointer" style="padding: 10px 0;">';
            $response.='<a href="' . base_url() . 'Thread/' . $result['srno'] . '"><h3 class="black" style="color: rgba(0,0,0,0.8);">' . $result['title'] . '</h3></a>';
            $response.='</div>';
            $response.='<div class="pure-u-1 thread-desc">';
            $desc = str_replace('<;','&lt;',$result['description']);
            $desc = str_replace('>;','&gt;',$desc);
            $desc = preg_replace('/(<[^>]+) style=".*?"/i', '$1', $desc);
            $response.= $desc;
            $response.='</div>';
            $response.='<div class="pure-u-1" style="padding: 10px 0;">';
            if($data['tags']!=""){
                foreach($array as $element){
                    $response.='<a href="Tag/' . $element . '" class="tag">' . $element . '</a>';
                }
            }
            $response.='</div>';
            $response.='<div class="pure-u-1 thread-options">';
            //$response.='<p class="flt-left fg-grayLight"><span class="thread-stats-icon" style="background-image: url(\'' . asset_url() . 'images/ico_upvote.png\');">0 Upvotes</span><span style="padding-right: 25px;"> 0 Replies</span> 0 Views</p>';
            $response.='<p class="flt-left fg-grayLight"><span style="padding-right: 20px">0 Upvote</span><span style="padding-right: 20px;"> 0 Reply</span> 0 View</p>';
            $response.='<div class="flt-right pointer">';
            $response.='</div>';
            $response.='</div>';
            $response.='</div>';
            $response.='</li>';
            return $response;
        }
        return false;
    }
    
    public function quick_search($data){
        $response='';
        $query_one = $this->db->query("SELECT thread.srno, thread.uid, thread.title, CONCAT(extendedinfo.fname, ' ', extendedinfo.lname) as name, extendedinfo.avatarpath FROM thread, extendedinfo WHERE (thread.title LIKE '%" . $data . "%' OR thread.description LIKE '%" . $data . "%') AND thread.uid=extendedinfo.uid ORDER BY timestamp DESC LIMIT 4");
        if($query_one->num_rows() > 0){
            $result = $query_one->result_array();
            $response.='<small style="font-size: 11px;width: 100%;padding-left: 20px;font-family: \'Open Sans Bold\';">Threads</small>';
            foreach($result as $item){
                $response.='<li>';
                $response.='<a href="' . base_url() . 'Thread/' . $item['srno'] . '">';
                $response.='<div class="avatar flt-left" style="height: 35px;background-image: url(' . base_url() . 'userdata/' . $item['uid'] . '/' .$item['avatarpath'] .');"></div>';
                $response.='<div style="margin-left: 55px;">';
                $response.='<p class="margin0" style="font-size: 13px;color:inherit !important;">' . $item['title'] . '<br> <span class="fg-grayLight">' . $item['name'] .'</span></p>';
                $response.='</div>';
                $response.='</a>';
                $response.='</li>';
            }
        }
        $query_two = $this->db->query("SELECT useraccounts.username, useraccounts.srno, CONCAT(extendedinfo.fname, ' ', extendedinfo.lname) as name, extendedinfo.avatarpath FROM useraccounts, extendedinfo WHERE CONCAT(extendedinfo.fname, ' ', extendedinfo.lname)  LIKE '%" . $data . "%' AND extendedinfo.uid = useraccounts.srno LIMIT 2");
        if($query_two->num_rows() > 0){
            $result = $query_two->result_array();
            $response.='<small style="float: left;width: 100%;font-size: 11px;padding-left: 20px;font-family: \'Open Sans Bold\';">People</small>';
            foreach($result as $item){
                $response.='<li>';
                $response.='<a href="' . base_url() . $item['username'] . '">';
                $response.='<div class="avatar flt-left" style="display: inline-block;height: 35px;background-image: url(' . base_url() . 'userdata/' . $item['srno'] .'/'. $item['avatarpath'] . ');"></div>';
                $response.='<span style="float: left;padding: 4px 0 6px 0;margin-left: 10px;">' . $item['name'] . '</span>';
                $response.='</a>';
                $response.='</li>';                
            }
        }
        return $response;
//        if($response!=''){
//            return $response;
//        }
//        return false;
    }
     
    public function thread_options($data){
        switch($data['opt'])
        {
            case 'track_thread':    $query = $this->db->query("INSERT INTO trackthread values(" . (int)$data['tid'] . "," . (int)$data['uid'] . ")");        
                                    $query_ = $this->db->query("SELECT * from trackthread WHERE tid = " . (int)$data['tid'] . " AND uid = " . (int)$data['uid']);
                                    if($query_->num_rows()>0){
                                        $data = array('response'=>'true','opt'=>'untrack_thread','link'=>'<a href="javascript:;"><i class="fa fa-check fa-fw"></i> Tracking this thread</a>');
                                        return $data;
                                    }
                                    return false;
                                    break;
            case 'untrack_thread':  $query = $this->db->query("DELETE from trackthread WHERE tid = " . (int)$data['tid'] . " AND uid = " . (int)$data['uid']);
                                    $data = array('response'=>'true','opt'=>'track_thread','link'=>'<a href="javascript:;"><i class="fa fa-binoculars fa-fw"></i> Track this thread</a>');
                                    return $data;
                                    break;
            case 'add_to_list':     $query = $this->db->query("INSERT INTO readinglist(tid, uid) values(" . (int)$data['tid'] . "," . (int)$data['uid'] . ")");
                                    $query_ = $this->db->query("SELECT * from readinglist WHERE tid = " . (int)$data['tid'] . " AND uid = " . (int)$data['uid']);
                                    if($query_->num_rows()>0){
                                        $data = array('response'=>'true','opt'=>'remove_from_list','link'=>'<a href="javascript:;"><i class="fa fa-check fa-fw"></i> Added to reading list</a>');
                                        return $data;
                                    }
                                    return false;
                                    break;
            case 'remove_from_list':$query = $this->db->query("DELETE from readinglist WHERE tid = " . (int)$data['tid'] . " AND uid = " . (int)$data['uid']);
                                    $data = array('response'=>'true','opt'=>'add_to_list','link'=>'<a href="javascript:;"><i class="fa fa-book fa-fw"></i> Add to reading list</a>');
                                    return $data;                 
                                    break;        
            case 'delete_thread':   $query = $this->db->query("SELECT uid, imagepath FROM thread WHERE srno = " . (int)$data['tid']);
                                    if($query->num_rows()>0){
                                        $result = $query->row_array();
                                        if($result['uid'] == $data['uid']){
                                            $query = $this->db->query("DELETE from thread WHERE srno = " . (int)$data['tid'] . " AND uid = " . (int)$data['uid']);
                                            if($result['imagepath']){
                                                unlink(FCPATH . 'userdata/' . $data['uid'] . '/' . $result['imagepath']);
                                            }                                            
                                            $data = array('response'=>'true','opt'=>'delete_thread');
                                            return $data;                  
                                        }
                                        return false;
                                    }
                                    return false;
                                    break;
            case 'hide_thread'  :   $query = $this->db->query("INSERT INTO hidethread values(" . (int)$data['tid'] . "," . (int)$data['uid'] . ")");
                                    $query_ = $this->db->query("SELECT * from hidethread WHERE tid = " . (int)$data['tid'] . " AND uid = " . (int)$data['uid']);
                                    if($query_->num_rows()>0){
                                        $data = array('response'=>'true','opt'=>'hide_thread');
                                        return $data;
                                    }
                                    return false;
                                    break;    
            case 'unhide_thread':   $query = $this->db->query("DELETE from hidethread WHERE tid = " . (int)$data['tid'] . " AND uid = " . (int)$data['uid']);
                                    $data = array('response'=>'true','opt'=>'unhide_thread');
                                    return $data;                 
                                    break;                        
        }           
    }
    
    public function update_categories($data){
        if($data['cid']!=""){
            $orig = $this->db->db_debug;
            $this->db->db_debug = FALSE;                
            $this->db->query("DELETE from category_user WHERE uid = " . (int)$data['uid']);
            $array = explode(',',$data['cid']);
            foreach($array as $item){
                $this->db->query("INSERT INTO category_user values(" . (int)$item . "," . (int)$data['uid']  . ")");
            }
            $this->db->db_debug = $orig;
            return true;
        }
        return false;
    }
    
    public function update_category($data){
        if($data['action']==="Follow"){
            $query = $this->db->query("INSERT INTO category_user VALUES(" . (int)$data['cid'] . ", " . (int)$data['uid'] . ")");
            $query = $this->db->query("SELECT * FROM category_user WHERE cid=" . (int)$data['cid'] . " AND uid=" . (int)$data['uid']);
            if($query->num_rows()>0){
                return "Unfollow";
            }
            return false;
        }
        if($data['action']==="Unfollow"){
            $query = $this->db->query("DELETE FROM category_user WHERE cid=" . (int)$data['cid'] . " AND uid=" . (int)$data['uid']);
            return "Follow";
        }
        return false;
    }

    public function load_more_thread($data){
        $lmt = $data['lmt'];
        $response='';
        if($data['opt']=='index'){
            $query = $this->db->query("SELECT category.name as cname, useraccounts.username, extendedinfo.avatarpath, extendedinfo.fname, extendedinfo.lname, thread.srno, thread.title, thread.description, thread.imagepath, thread.coordinates, thread.timestamp, thread.uid FROM useraccounts, extendedinfo, thread, category_user, category WHERE thread.cid = category.srno and thread.cid = category_user.cid and category_user.uid = " . (int)$data['uid'] . " and extendedinfo.uid = thread.uid and useraccounts.srno = thread.uid and thread.timestamp < '$lmt' ORDER BY timestamp DESC LIMIT 10");
        }
        else if($data['opt']=='search-all'){
            $query_search = $this->db->query("SELECT thread.srno, thread.uid, thread.description, thread.title, thread.timestamp, category.name as cname, CONCAT(extendedinfo.fname, ' ', extendedinfo.lname) as name, extendedinfo.avatarpath FROM thread, extendedinfo, category WHERE (thread.title LIKE '%" . $data['optval'] . "%' OR thread.description LIKE '%" . $data['optval'] . "%') AND thread.uid=extendedinfo.uid and thread.cid = category.srno and thread.timestamp < '$lmt' ORDER BY timestamp DESC LIMIT 10");
        }
        else if($data['opt']=='tag'){
            $query = $this->db->query("SELECT distinct useraccounts.username, extendedinfo.fname, extendedinfo.lname, extendedinfo.avatarpath, thread.srno, thread.timestamp, thread.title, thread.imagepath, thread.coordinates, thread.description, thread.uid, category.name as cname FROM thread, category_user, category, extendedinfo,thread_tags,useraccounts WHERE thread.srno NOT IN (SELECT tid FROM hidethread) AND thread.cid=category_user.cid AND thread.uid=extendedinfo.uid AND useraccounts.srno = thread.uid AND category.srno = thread.cid AND thread_tags.tid = thread.srno AND thread_tags.name = '" . $data['optval'] . "' and thread.timestamp < '$lmt' ORDER BY thread.timestamp DESC LIMIT 10");
        }
        if(isset($query)){
          if($query->num_rows() > 0){
                $result = $query->result_array();
                foreach($result as $item){
                    $tm = $item['timestamp'];
                    $response.='<li class="pure-u-1 thread" data-tid="' . $item['srno'] . '" style="display:none;">';
                    $response.='<div class="pure-g">';
                    $response.='<div class="pure-u-1" style="margin-bottom: 10px;">';
                    $response.='<ul>';
                    $response.='<li>';
                    $response.='<div class="avatar" style="background-image: url(\'' . userdata_url($item['uid'], $item['avatarpath']) . '\');"></div>';
                    $response.='</li>';
                    $response.='<li style="padding-left: 10px;">';
                    $response.='<p><a href="' . base_url() . $item['username'] . '/' . '">' . $item['fname'] . ' ' . $item['lname'] . '</a><br /><small><a href="javascript:;" class="fg-grayDark link">' . $item['cname'] . '</a><span class="dot-center"></span>' . time_elapsed($item['timestamp']) . '</small></p>';
                    $response.='</li>';
                    $response.='<li class="flt-right">';
                    $response.='<i class="fa fa-chevron-down fg-grayLighter pointer toggle-thread-options"></i>';
                    $response.='<div class="thread-options-dropdown-parent" style="display: none;position: relative;">';
                    $response.='<div class="dropdown thread-options-dropdown" style="right: 0;">';
                    $response.='<ul>';
                    $query_track = $this->db->query("SELECT * from trackthread where tid = " . $item['srno'] . " and uid = " . $data['uid']);
                    if($query_track->num_rows() > 0){
                        $response.='<li class="fg-green" data-opt="untrack_thread"><a href="javascript:;"><i class="fa fa-check fa-fw"></i> Tracking this thread</a></li>';
                    }
                    else{
                        $response.='<li class="bg-white fg-gray" data-opt="track_thread"><a href="javascript:;"><i class="fa fa-binoculars fa-fw"></i> Track this thread</a></li>';
                    }
                    $query_readinglist = $this->db->query("SELECT * from readinglist where tid = " . $item['srno'] . " and uid = " . $data['uid']);
                    if($query_readinglist->num_rows() > 0){
                        $response.='<li class="fg-green" data-opt="remove_from_list"><a href="javascript:;"><i class="fa fa-check fa-fw"></i> Added to reading list</a></li>';
                    }
                    else{
                        $response.='<li class="bg-white fg-gray" data-opt="add_to_list"><a href="javascript:;"><i class="fa fa-book fa-fw"></i> Add to reading list</a></li>';
                    }
                    $response.='<li class="bg-white fg-gray" data-opt="delete_thread"><a href="#"><i class="fa fa-trash fa-fw"></i> Delete this thread</a></li>';
                    $response.='<li class="bg-white fg-gray rstoggle"><a href="#"><i class="fa fa-ban fa-fw"></i> Report as spam</a></li>';
                    $response.='</ul>';
                    $response.='</div>';
                    $response.='</div>';                                            
                    $response.='</li>';
                    $response.='</ul>';
                    $response.='</div>';
                    if($item['imagepath']!=""){
                        $response.='<div class="pure-u-1 thumbnail" style="background-image: url(\'' . userdata_url($item['uid'], $item['imagepath']) . '\');background-position:' . $item['coordinates'] . '"></div>';
                    }
                    $response.='<div class="pure-u-1 pointer" style="padding: 10px 0;">';
                    $response.='<a href="' . base_url() . 'Thread/' . $item['srno'] . '"><h3 class="black" style="color: rgba(0,0,0,0.8);">' . $item['title'] . '</h3></a>';
                    $response.='</div>';
                    $response.='<div class="pure-u-1 thread-desc">';
                    $desc = str_replace('<;','&lt;',$item['description']);
                    $desc = str_replace('>;','&gt;',$desc);
                    $desc = preg_replace('/(<[^>]+) style=".*?"/i', '$1', $desc);
                    $response.= $desc;
                    $response.='</div>';
                    $response.='<div class="pure-u-1" style="padding: 10px 0;">';
                    $query_tags = $this->db->query("SELECT * from thread_tags where tid = " . (int)$item['srno']);
                    $tags = $query_tags->result_array();
                    foreach($tags as $tag){
                        $response.='<a href="' . base_url() . 'Tag/' . $tag['name'] . '" class="tag">' . $tag['name'] . '</a>';
                    }
                    $response.='</div>';
                    $response.='<div class="pure-u-1 thread-options">';
                    $query_upvotes = $this->db->query("SELECT * FROM upvotes_to_thread WHERE tid = " . $item['srno']);
                    $upvotes = $query_upvotes->num_rows();
                    $query_replies = $this->db->query("SELECT * FROM reply WHERE tid = " . $item['srno']);
                    $replies = $query_replies->num_rows();
                    $query_views = $this->db->query("SELECT * FROM views WHERE tid = " . $item['srno']);
                    $views = $query_views->num_rows();
                    $response.='<p class="flt-left fg-grayLight"><span style="padding-right: 20px">' . $upvotes . ' Upvotes</span><span style="padding-right: 20px;"> ' . $replies . ' Replies</span> ' . $views . ' Views</p>';
                    $response.='<div class="flt-right pointer">';
                    $response.='</div>';
                    $response.='</div>';
                    $response.='</div>';
                    $response.='</li>';
                }
                $response.='<input type="hidden" class="lmt" value="' . $tm . '"/>';
                return $response;
            }
        }
        else if(isset($query_search)){
            if($query_search->num_rows()>0){
                $result = $query_search->result_array();
                foreach($result as $item){
                $tm = $item['timestamp'];
                $response.='<li class="pure-u-1 thread" data-tid="" style="padding: 0;border-bottom: 1px solid rgba(235,235,235,0.4);">';
                $response.='<div class="pure-g">';
                $response.='<div class="pure-u-1" style="margin-bottom: 0px;">';
                $response.='<ul>';
                $response.='<li>';
                $response.='<div class="avatar" style="background-image: url(' . base_url() . 'userdata/' . $item['uid'] . '/' .$item['avatarpath'] .');"></div>';
                $response.='</li>';
                $response.='<li style="padding-left: 10px;">';
                $response.='<p><a href="javascript:;">' . $item['name'] . '</a><br /><small><a href="javascript:;" class="fg-grayDark link">' . $item['cname'] . '</a><span class="dot-center"></span>' . time_elapsed($item['timestamp']) . '</small></p>';
                $response.='</li>';
                $response.='</ul>';
                $response.='</div>';
                $response.='<div class="pure-u-1 pointer" style="padding: 0px 0;">';
                $response.='<a href="' . base_url() . 'Thread/' . $item['srno'] . '"><h5 class="black" style="color: rgba(0,0,0,0.8);">' . $item['title'] .'</h5></a>';
                $response.='</div>';
                $response.='<div class="pure-u-1 thread-desc">';
                $desc = str_replace('<;','&lt;',$item['description']);
                $desc = str_replace('>;','&gt;',$desc);
                $desc = preg_replace('/(<[^>]+) style=".*?"/i', '$1', $desc);
                $response.= $desc;
                $response.='</div>';
                $query_upvotes = $this->db->query("SELECT * FROM upvotes_to_thread WHERE tid = " . $item['srno']);
                $upvotes = $query_upvotes->num_rows();
                $query_replies = $this->db->query("SELECT * FROM reply WHERE tid = " . $item['srno']);
                $replies = $query_replies->num_rows();
                $query_views = $this->db->query("SELECT * FROM views WHERE tid = " . $item['srno']);
                $views = $query_views->num_rows();
                $query_tags = $this->db->query("SELECT * from thread_tags where tid = " . (int)$item['srno']);
                $response.='<div class="pure-u-1" style="padding: 10px 0;">';
                    $query_tags = $this->db->query("SELECT * from thread_tags where tid = " . (int)$item['srno']);
                    $tags = $query_tags->result_array();
                    foreach($tags as $tag){
                        $response.='<a href="' . base_url() . 'Tag/' . $tag['name'] . '" class="tag">' . $tag['name'] . '</a>';
                    }
                    $response.='</div>';
                $response.='<div class="pure-u-1 thread-options">';
                $response.='<p class="flt-left fg-grayLight"><span style="padding-right: 20px;">' . $upvotes . ' Upvotes</span><span style="padding-right: 20px;">' . $replies . ' Replies</span>' . $views . ' Views</p>';
                $response.='</div>';
                $response.='</div>';
                $response.='</li>';
                }
                $response.='<input type="hidden" class="lmt" value="' . $tm . '"/>';
                return $response;
            } 
        }
            return false;        
    }
    
    public function search_all($data){
        $response = '';
        $query_one = $this->db->query("SELECT useraccounts.username, thread.srno, thread.uid, thread.description, thread.title, thread.timestamp, category.name as cname, CONCAT(extendedinfo.fname, ' ', extendedinfo.lname) as name, extendedinfo.avatarpath FROM thread, extendedinfo, useraccounts, category WHERE (thread.title LIKE '%" . $data['param'] . "%' OR thread.description LIKE '%" . $data['param'] . "%') AND thread.uid=extendedinfo.uid and thread.cid = category.srno and thread.uid = useraccounts.srno ORDER BY timestamp DESC LIMIT 10");
        $query_two= $this->db->query("SELECT tags.name FROM tags WHERE tags.name LIKE '%" . $data['param'] . "%' LIMIT 15");   
        $query_three = $this->db->query("SELECT useraccounts.username, useraccounts.srno, CONCAT(extendedinfo.fname, ' ', extendedinfo.lname) as name, extendedinfo.avatarpath FROM useraccounts, extendedinfo WHERE CONCAT(extendedinfo.fname, ' ', extendedinfo.lname)  LIKE '%" . $data['param'] . "%' AND extendedinfo.uid = useraccounts.srno LIMIT 3");
        if($query_one->num_rows() <= 0 && $query_two->num_rows() <= 0 && $query_three->num_rows() <= 0){
            $response='<div class="pure-u-1"><h4 class="margin0 light txt-center" style="">Couldn\'t find anything :(</h4></div>';
        }
        else{
            if($query_one->num_rows() > 0){
                $result = $query_one->result_array();
                $response.='<div class="pure-u-2-3">';
                $response.='<p class="featured-tags-title" style="border: 0;">Threads</p>';
                $response.='<div style="padding: 10px 0 10px 0;" class="search--threads">';
                $response.='<ul>';
                foreach($result as $item){
                    $tm = $item['timestamp'];
                    $response.='<li class="pure-u-1 thread rtd" data-tid="' . $item['srno'] .'" style="padding: 0;border-bottom: 1px solid rgba(235,235,235,0.4);">';
                    $response.='<div class="pure-g">';
                    $response.='<div class="pure-u-1" style="margin-bottom: 0px;">';
                    $response.='<ul>';
                    $response.='<li>';
                    $response.='<div class="avatar" style="background-image: url(' . base_url() . 'userdata/' . $item['uid'] . '/' .$item['avatarpath'] .');"></div>';
                    $response.='</li>';
                    $response.='<li style="padding-left: 10px;">';
                    $response.='<p><a href="' . base_url() . $item['username'] . '">' . $item['name'] . '</a><br /><small><a href="javascript:;" class="fg-grayDark link">' . $item['cname'] . '</a><span class="dot-center"></span>' . time_elapsed($item['timestamp']) . '</small></p>';
                    $response.='</li>';
                    $response.='</ul>';
                    $response.='</div>';
                    $response.='<div class="pure-u-1 pointer" style="padding: 0px 0;">';
                    $response.='<a href="' . base_url() . 'Thread/' . $item['srno'] . '"><h5 class="black" style="color: rgba(0,0,0,0.8);">' . $item['title'] .'</h5></a>';
                    $response.='</div>';
                    $response.='<div class="pure-u-1 thread-desc">';
                    $desc = str_replace('<;','&lt;',$item['description']);
                    $desc = str_replace('>;','&gt;',$desc);
                    $desc = preg_replace('/(<[^>]+) style=".*?"/i', '$1', $desc);
                    $response.= $desc;
                    $response.='</div>';
                    $query_upvotes = $this->db->query("SELECT * FROM upvotes_to_thread WHERE tid = " . $item['srno']);
                    $upvotes = $query_upvotes->num_rows();
                    $query_replies = $this->db->query("SELECT * FROM reply WHERE tid = " . $item['srno']);
                    $replies = $query_replies->num_rows();
                    $query_views = $this->db->query("SELECT * FROM views WHERE tid = " . $item['srno']);
                    $views = $query_views->num_rows();
                    $query_tags = $this->db->query("SELECT * from thread_tags where tid = " . (int)$item['srno']);
                    $response.='<div class="pure-u-1" style="padding: 10px 0;">';
                        $query_tags = $this->db->query("SELECT * from thread_tags where tid = " . (int)$item['srno']);
                        $tags = $query_tags->result_array();
                        foreach($tags as $tag){
                            $response.='<a href="' . base_url() . 'Tag/' . $tag['name'] . '" class="tag">' . $tag['name'] . '</a>';
                        }
                        $response.='</div>';
                    $response.='<div class="pure-u-1 thread-stats">';
                    $response.='<p class="flt-left fg-grayLight">';
                    if($upvotes==1){
                    $response.='<span style="padding-right: 20px;">' . $upvotes . ' Upvote</span>';
                    }
                    else{
                        $response.='<span style="padding-right: 20px;">' . $upvotes . ' Upvotes</span>';
                    }
                    if($replies==1){
                        $response.='<span style="padding-right: 20px;">' . $replies . ' Reply</span> ';
                    }
                    else{
                        $response.='<span style="padding-right: 20px;">' . $replies . ' Replies</span> ';
                    }
                    if($views==1){
                        $response.= $views . ' View</p>';
                    }
                    else{
                        $response.= $views . ' Views</p>';
                    }                    
                    $response.='</div>';
                    $response.='</div>';
                    $response.='</li>';
                }
                $response.='</ul>';
                if($query_one->num_rows() >=10){
                    $response.='<div class="pure-u-1" style="border-top: 1px solid rgba(100,100,100,0.1);">';
                    $response.='<i class="fa fa-2x loader fg-cyan fa-circle-o-notch fa-spin" style="display:none;margin: 20px auto;"></i>';
                    $response.='<div class="load-more" data-opt="search-all" data-opt-val="' . $data['param'] . '">';
                    $response.='<a href="javascript:;">load more</a>';
                    $response.='<input type="hidden" class="lmt" value="' . $tm . '"/>';
                    $response.='</div>';
                    $response.='</div>';
                }
                $response.='</div>';
                $response.='</div>';
            }
            else{
                $response.='<div class="pure-u-2-3"><h4 class="txt-center margin0 fg-grayLight" style="padding: 0 10px 10px;">Couldn\'t find any threads :(</h4></div>';
            }

            $response.='<div class="pure-u-1-3">';
            $response.='<div class="search--tags" style="padding-left: 10px;margin-bottom: 20px;max-height: 200px;">';
            $response.='<p class="featured-tags-title" style="border: 0;">Tags</p>';
            $response.='<div style="padding: 10px 0 10px 0;">';
            if($query_two->num_rows() > 0){
                $result = $query_two->result_array();
                foreach($result as $item){
                    $response.='<a href="' . base_url() . 'Tag/' . $item['name'] .'" class="tag">' . $item['name'] . '</a>';
                }
            }            
            else{
                $response.='<div class="pure-u-1"><p class="margin0 fg-grayLight" style="">Couldn\'t find any tags :(</p></div>';
            }
            $response.='</div>';
            $response.='</div>';
            $response.='<div class="search--people" style="padding-left: 10px;max-height: 200px;">';
            $response.='<p class="featured-tags-title" style="margin-top: 15px;">People</p>';
            $response.='<div style="padding: 10px 0 10px 0;">';
            $response.='<ul>';

            if($query_three->num_rows() > 0){
                $result = $query_three->result_array();
                foreach($result as $item){
                    $response.='<li style="padding: 10px 0;">';
                    $response.='<a class="fg-gray" href="' . base_url() . $item['username'] . '">';
                    $response.='<div class="pure-g">';
                    $response.='<div class="pure-u-1-6 ">';
                    $response.='<div class="avatar" style="background-image: url(' . base_url() . 'userdata/' . $item['srno'] .'/'. $item['avatarpath'] . ');"></div>';
                    $response.='</div>';
                    $response.='<div class="pure-u-5-6" style="padding-left: 5px;">';
                    $response.='<p class="txt-left margin0" style="line-height: 1.5;">' . $item['name'] . '<br> <span class="fg-gray" style="font-size: 14px;line-height: 2;">' . $item['username'] . '</span></p>';
                    $response.='</div>';
                    $response.='</div>';
                    $response.='</a>';
                    $response.='</li>';
                }
            }        
            else{
                $response.='<div class="pure-u-1"><p class="margin0" style="">Couldn\'t find anything :(</p></div>';
            }
            $response.='</ul>';
            $response.='</div>';
            $response.='</div>';
            $response.='</div>';
        }
        return $response;      
    }
    
    public function search_people($data){
        $response = '';
        $response.='<div class="pure-u-1 search--people" style="padding-left: 10px;">';
        $response.='<p class="featured-tags-title">People</p>';
        $response.='<div style="padding: 10px 0 10px 0;">';
        $response.='<ul>';
                   
        $query_three = $this->db->query("SELECT useraccounts.username, useraccounts.srno, CONCAT(extendedinfo.fname, ' ', extendedinfo.lname) as name, extendedinfo.avatarpath FROM useraccounts, extendedinfo WHERE CONCAT(extendedinfo.fname, ' ', extendedinfo.lname)  LIKE '%" . $data['param'] . "%' AND extendedinfo.uid = useraccounts.srno");
        if($query_three->num_rows() > 0){
            $result = $query_three->result_array();
            foreach($result as $item){
                $response.='<li style="padding: 10px 0;">';
                $response.='<a class="fg-gray" href="' . base_url() . $item['username'] . '">';
                $response.='<div class="pure-g">';
                $response.='<div class="pure-u-1-7">';
                $response.='<div class="avatar" style="background-image: url(' . base_url() . 'userdata/' . $item['srno'] .'/'. $item['avatarpath'] . ');"></div>';
                $response.='</div>';
                $response.='<div class="pure-u-5-6" style="padding-left: 10px;;">';
                $response.='<p class="txt-left margin0" style="line-height: 1.5;">' . $item['name'] . '<br> <span class="fg-gray" style="font-size: 14px;line-height: 2;">' . $item['username'] . '</span></p>';
                $response.='</div>';
                $response.='</div>';
                $response.='</a>';
                $response.='</li>';
            }
        }        
        else{
            $response.='<div class="pure-u-1"><p class="margin0" style="">Couldn\'t find anything :(</p></div>';
        }
        $response.='</ul>';
        $response.='</div>';
        $response.='</div>';
        
        return $response;        
    }
    
    public function search_tags($data){
        $response = '';
        $response.='<div class="pure-u-1 search--tags" style="padding-left: 10px;margin-bottom: 20px;">';
        $response.='<p class="featured-tags-title">Tags</p>';
        $response.='<div style="padding: 10px 0 10px 0;">';
        $query_two= $this->db->query("SELECT tags.name FROM tags WHERE tags.name LIKE '%" . $data['param'] . "%' LIMIT 15");   
        if($query_two->num_rows() > 0){
            $result = $query_two->result_array();
            foreach($result as $item){
                $response.='<a href="' . base_url() . 'Tag/' . $item['name'] .'" class="tag">' . $item['name'] . '</a>';
            }
        }            
        else{
            $response.='<div class="pure-u-1"><p class="margin0" style="">Couldn\'t find anything :(</p></div>';
        }
        $response.='</div>';
        $response.='</div>';
        
        return $response;
    }
    
    public function search_by_category($data){
        $response = '';
        $query_one = $this->db->query("SELECT useraccounts.username, thread.srno, thread.uid, thread.description, thread.title, thread.timestamp, category.name as cname, CONCAT(extendedinfo.fname, ' ', extendedinfo.lname) as name, extendedinfo.avatarpath FROM thread, extendedinfo, useraccounts, category WHERE (thread.title LIKE '%" . $data['param'] . "%' OR thread.description LIKE '%" . $data['param'] . "%') AND thread.uid=extendedinfo.uid and thread.cid = " . $data['cid'] . " and category.srno = thread.cid and thread.uid = useraccounts.srno ORDER BY timestamp DESC LIMIT 10");
        if($query_one->num_rows() > 0){
            $result = $query_one->result_array();
            $response.='<div class="pure-u-2-3">';
            $response.='<p class="featured-tags-title">Threads</p>';
            $response.='<div style="padding: 10px 0 10px 0;" class="search--threads">';
            $response.='<ul>';
            foreach($result as $item){
                $tm = $item['timestamp'];
                $response.='<li class="pure-u-1 thread rtd" data-tid="' . $item['srno'] .'" style="padding: 0;border-bottom: 1px solid rgba(235,235,235,0.4);">';
                $response.='<div class="pure-g">';
                $response.='<div class="pure-u-1" style="margin-bottom: 0px;">';
                $response.='<ul>';
                $response.='<li>';
                $response.='<div class="avatar" style="background-image: url(' . base_url() . 'userdata/' . $item['uid'] . '/' .$item['avatarpath'] .');"></div>';
                $response.='</li>';
                $response.='<li style="padding-left: 10px;">';
                $response.='<p><a href="' . base_url() . $item['username'] . '">' . $item['name'] . '</a><br /><small><a href="javascript:;" class="fg-grayDark link">' . $item['cname'] . '</a><span class="dot-center"></span>' . time_elapsed($item['timestamp']) . '</small></p>';
                $response.='</li>';
                $response.='</ul>';
                $response.='</div>';
                $response.='<div class="pure-u-1 pointer" style="padding: 0px 0;">';
                $response.='<a href="' . base_url() . 'Thread/' . $item['srno'] . '"><h5 class="black" style="color: rgba(0,0,0,0.8);">' . $item['title'] .'</h5></a>';
                $response.='</div>';
                $response.='<div class="pure-u-1 thread-desc">';
                $desc = str_replace('<;','&lt;',$item['description']);
                $desc = str_replace('>;','&gt;',$desc);
                $desc = preg_replace('/(<[^>]+) style=".*?"/i', '$1', $desc);
                $response.= $desc;
                $response.='</div>';
                $query_upvotes = $this->db->query("SELECT * FROM upvotes_to_thread WHERE tid = " . $item['srno']);
                $upvotes = $query_upvotes->num_rows();
                $query_replies = $this->db->query("SELECT * FROM reply WHERE tid = " . $item['srno']);
                $replies = $query_replies->num_rows();
                $query_views = $this->db->query("SELECT * FROM views WHERE tid = " . $item['srno']);
                $views = $query_views->num_rows();
                $response.='<div class="pure-u-1" style="padding: 10px 0;">';
                    $query_tags = $this->db->query("SELECT * from thread_tags where tid = " . (int)$item['srno']);
                    $tags = $query_tags->result_array();
                    foreach($tags as $tag){
                        $response.='<a href="' . base_url() . 'Tag/' . $tag['name'] . '" class="tag">' . $tag['name'] . '</a>';
                    }
                    $response.='</div>';
                $response.='<div class="pure-u-1 thread-stats">';
                $response.='<p class="flt-left fg-grayLight">';
                if($upvotes==1){
                $response.='<span style="padding-right: 20px;">' . $upvotes . ' Upvote</span>';
                }
                else{
                    $response.='<span style="padding-right: 20px;">' . $upvotes . ' Upvotes</span>';
                }
                if($replies==1){
                    $response.='<span style="padding-right: 20px;">' . $replies . ' Reply</span> ';
                }
                else{
                    $response.='<span style="padding-right: 20px;">' . $replies . ' Replies</span> ';
                }
                if($views==1){
                    $response.= $views . ' View</p>';
                }
                else{
                    $response.= $views . ' Views</p>';
                }
                $response.='</div>';
                $response.='</div>';
                $response.='</li>';
            }
            $response.='</ul>';
            if($query_one->num_rows() >=10){
                $response.='<div class="pure-u-1" style="border-top: 1px solid rgba(100,100,100,0.1);">';
                $response.='<i class="fa fa-2x loader fg-cyan fa-circle-o-notch fa-spin" style="display:none;margin: 20px auto;"></i>';
                $response.='<div class="load-more" data-opt="search-by-category" data-opt-cat="'.$data['cid'].'" data-opt-val="' . $data['param'] . '">';
                $response.='<a href="javascript:;">load more</a>';
                $response.='<input type="hidden" class="lmt" value="' . $tm . '"/>';
                $response.='</div>';
                $response.='</div>';
            }
            $response.='</div>';
            $response.='</div>';
        }
        else{
            $response.='<div class="pure-u-2-3"><h4 class="txt-center margin0" style="padding: 0 10px 10px;">Couldn\'t find anything :(</h4></div>';
        }
        return $response;
    }
    
    public function fetch_list_thread($data){
        $response = '';
        $query = $this->db->query("SELECT * FROM readinglist WHERE tid = " . (int)$data['tid']);
        if($query->num_rows() > 0){
            $query = $this->db->query("SELECT useraccounts.username, CONCAT(extendedinfo.fname, ' ', extendedinfo.lname) as name, extendedinfo.avatarpath, thread.srno, thread.timestamp, thread.title, thread.imagepath, thread.coordinates, thread.description, thread.uid, category.name as cname FROM thread, category, extendedinfo,readinglist,useraccounts WHERE thread.uid=extendedinfo.uid AND useraccounts.srno = thread.uid AND category.srno = thread.cid AND readinglist.tid =" . (int)$data['tid'] . " AND readinglist.tid = thread.srno AND readinglist.uid = " . (int)$data['uid']);
            if($query->num_rows() > 0){
                $result = $query->row_array();           
                $response.='<li class="pure-u-1 thread">';
                $response.='<div class="pure-g">';
                $response.='<div class="pure-u-1">';
                $response.='<ul>';
                $response.='<li class="pure-u-1">';
                $response.='<div class="pure-g">';
                $response.='<div class="pure-u-1" style="margin-bottom: 10px;">';
                $response.='<ul>';
                $response.='<li>';
                $response.='<div class="avatar" style="background-image: url(' .userdata_url($result['uid'], $result['avatarpath']) .');"></div>';
                $response.='</li>';
                $response.='<li style="padding-left: 10px;">';
                $response.='<p><a href="javascript:;">' . $result['name']. '</a><br /><small><a href="javascript:;" class="fg-grayDark link">' . $result['cname'].'</a><span class="dot-center"></span>'. time_elapsed($result['timestamp']).'</small></p>';
                $response.='</li>';
                $response.='</ul>';
                $response.='</div>';
                $response.='</div>';
                $response.='</li>';
                $response.='</ul>';
                $response.='</div>';
                if ($result['imagepath']!='') {
                    $response.='<div class="pure-u-1 thumbnail" style="background-image: url(\'' . userdata_url($result['uid'], $result['imagepath']) . '\');background-position:' . $result['coordinates'] . '"></div>';
                }
                $response.='<div class="pure-u-1 ttitle" style="padding: 10px 0;">';
                $response.='<a href="' . base_url() . 'Thread/' . $result['srno'] . '"><h2 class="black" style="color: rgba(0,0,0,0.8);">' . $result['title'] .'</h2></a>';
                $response.='</div>';
                $response.='<div class="pure-u-1 thread-desc">';
                $desc = str_replace('<;','&lt;',$result['description']);
                $desc = str_replace('>;','&gt;',$desc);
                $desc = preg_replace('/(<[^>]+) style=".*?"/i', '$1', $desc);
                $response.= $desc;
                $response.='</div>';
                $response.='<div class="pure-u-1" style="padding: 10px 0;">';
                    $query_tags = $this->db->query("SELECT * from thread_tags where tid = " . (int)$result['srno']);
                    $tags = $query_tags->result_array();
                    foreach($tags as $tag){
                        $response.='<a href="' . base_url() . 'Tag/' . $tag['name'] . '" class="tag">' . $tag['name'] . '</a>';
                    }
                $response.='</div>';
                $query_upvotes = $this->db->query("SELECT * FROM upvotes_to_thread WHERE tid = " . $result['srno']);
                $upvotes = $query_upvotes->num_rows();
                $query_replies = $this->db->query("SELECT * FROM reply WHERE tid = " . $result['srno']);
                $replies = $query_replies->num_rows();
                $query_views = $this->db->query("SELECT * FROM views WHERE tid = " . $result['srno']);
                $views = $query_views->num_rows();
                $response.='<div class="pure-u-1 thread-stats">';
                $response.='<p class="flt-left fg-grayLight">';
                if($upvotes==1){
                $response.='<span style="padding-right: 20px;">' . $upvotes . ' Upvote</span>';
                }
                else{
                    $response.='<span style="padding-right: 20px;">' . $upvotes . ' Upvotes</span>';
                }
                if($replies==1){
                    $response.='<span style="padding-right: 20px;">' . $replies . ' Reply</span> ';
                }
                else{
                    $response.='<span style="padding-right: 20px;">' . $replies . ' Replies</span> ';
                }
                if($views==1){
                    $response.= $views . ' View</p>';
                }
                else{
                    $response.= $views . ' Views</p>';
                }
                $response.='</div>';
                $response.='</div>';
                $response.='</li>';
                return $response;
            }
            return false;
        }
        return false;
    }
    
    public function fetch_list_thread_next($data){
        $response = '';
        $query = $this->db->query("SELECT * FROM readinglist WHERE tid = " . (int)$data['tid']);
        if($query->num_rows() > 0){
            $query = $this->db->query("SELECT useraccounts.username, CONCAT(extendedinfo.fname, ' ', extendedinfo.lname) as name, extendedinfo.avatarpath, thread.srno, thread.timestamp, thread.title, thread.imagepath, thread.coordinates, thread.description, thread.uid, category.name as cname FROM thread, category, extendedinfo,readinglist,useraccounts WHERE thread.uid=extendedinfo.uid AND useraccounts.srno = thread.uid AND category.srno = thread.cid AND readinglist.tid =" . (int)$data['tid'] . " AND readinglist.tid = thread.srno AND readinglist.uid = " . (int)$data['uid']);
            if($query->num_rows() > 0){
                $result = $query->row_array(); 
                $response.='<ul>';
                $response.='<li class="pure-u-1 thread">';
                $response.='<div class="pure-g">';
                $response.='<div class="pure-u-1">';
                $response.='<ul>';
                $response.='<li class="pure-u-1">';
                $response.='<div class="pure-g">';
                $response.='<div class="pure-u-1" style="margin-bottom: 10px;">';
                $response.='<ul>';
                $response.='<li>';
                $response.='<div class="avatar" style="background-image: url(' .userdata_url($result['uid'], $result['avatarpath']) .');"></div>';
                $response.='</li>';
                $response.='<li style="padding-left: 10px;">';
                $response.='<p><a href="javascript:;">' . $result['name']. '</a><br /><small><a href="javascript:;" class="fg-grayDark link">' . $result['cname'].'</a><span class="dot-center"></span>'. time_elapsed($result['timestamp']).'</small></p>';
                $response.='</li>';
                $response.='</ul>';
                $response.='</div>';
                $response.='</div>';
                $response.='</li>';
                $response.='</ul>';
                $response.='</div>';
                if ($result['imagepath']!='') {
                    $response.='<div class="pure-u-1 thumbnail pointer" style="background-image: url(\'' . userdata_url($result['uid'], $result['imagepath']) . '\');background-position:' . $result['coordinates'] . '"></div>';
                }
                $response.='<div class="pure-u-1 ttitle" style="padding: 10px 0;">';
                $response.='<a href="' . base_url() . 'Thread/' . $result['srno'] . '"><h2 class="black" style="color: rgba(0,0,0,0.8);">' . $result['title'] .'</h2></a>';
                $response.='</div>';
                $response.='<div class="pure-u-1 thread-desc">';
                $desc = str_replace('<;','&lt;',$result['description']);
                $desc = str_replace('>;','&gt;',$desc);
                $desc = preg_replace('/(<[^>]+) style=".*?"/i', '$1', $desc);
                $response.= $desc;
                $response.='</div>';
                $response.='<div class="pure-u-1" style="padding: 10px 0;">';
                    $query_tags = $this->db->query("SELECT * from thread_tags where tid = " . (int)$result['srno']);
                    $tags = $query_tags->result_array();
                    foreach($tags as $tag){
                        $response.='<a href="' . base_url(). 'Tag/' . $tag['name'] . '" class="tag">' . $tag['name'] . '</a>';
                    }
                $response.='</div>';
                $query_upvotes = $this->db->query("SELECT * FROM upvotes_to_thread WHERE tid = " . $result['srno']);
                $upvotes = $query_upvotes->num_rows();
                $query_replies = $this->db->query("SELECT * FROM reply WHERE tid = " . $result['srno']);
                $replies = $query_replies->num_rows();
                $query_views = $this->db->query("SELECT * FROM views WHERE tid = " . $result['srno']);
                $views = $query_views->num_rows();
                $response.='<div class="pure-u-1 thread-stats">';
                $response.='<p class="flt-left fg-grayLight"><span class="pointer" style="margin-right: 20px;">' . $upvotes . ' Upvotes</span><span class="pointer" style="margin-right: 20px;">' . $replies . ' Replies</span> <span class="pointer">' . $views . 'Views</span></p>';
                $response.='</div>';
                $response.='</div>';
                $response.='</li>';
                $response.='</ul>';
                $querynext = $this->db->query("SELECT thread.title, thread.srno FROM thread, category, extendedinfo,readinglist,useraccounts WHERE thread.uid=extendedinfo.uid AND useraccounts.srno = thread.uid AND category.srno = thread.cid AND readinglist.tid = thread.srno AND readinglist.uid = " . (int)$data['uid'] . " ORDER BY readinglist.timestamp DESC");
                $result1 = $querynext->row_array($data['nextsrno']);
                $data['nextsrno'] = (int)$data['nextsrno'] + 1;
                $response.='<div class="pure-u-1 nxt-thread-toggle bg-cyan" data-tid="' . $result1['srno'] . '" data-next="' . $data['nextsrno'] .'"><p class="fg-white margin0">' . substr($result1['title'],0,30) . ' <i class="fa fa-angle-right fa-fw flt-right"></i></p></div>';
                return $response;
            }
            return false;
        }
        return false;
    }
    
    public function upvote_thread($data){
        
        $_query = $this->db->query("SELECT * FROM upvotes_to_thread WHERE tid=" . (int)$data['tid'] . " AND uid=" . (int)$data['uid']);
        if($_query->num_rows() > 0){
            return false;
        }
        
        $orig = $this->db->db_debug;
        $this->db->db_debug = FALSE;
        $this->db->query("INSERT INTO upvotes_to_thread(tid, uid) VALUES(" . (int)$data['tid'] . ", " . (int)$data['uid'] . ")");
        $this->db->db_debug = $orig;
        
        $query = $this->db->query("SELECT * FROM upvotes_to_thread WHERE tid=" . (int)$data['tid'] . " AND uid=" . (int)$data['uid']);
        if($query->num_rows() > 0){
            $query_ = $this->db->query("SELECT COUNT(*) as upvotes FROM upvotes_to_thread WHERE tid=" . (int)$data['tid']);
            $result = $query_->row_array();
            return $result['upvotes'];
        }
        return false;
    }
    
    public function rm_upvote_thread($data){
        
        $this->db->query("DELETE FROM upvotes_to_thread WHERE tid=" . (int)$data['tid'] . " AND uid=" . (int)$data['uid']);
        $query_ = $this->db->query("SELECT COUNT(*) as upvotes FROM upvotes_to_thread WHERE tid=" . (int)$data['tid']);
        $result = $query_->row_array();
        return $result['upvotes'];
    }
    
    public function reply_thread($data){
        $response = '';
        $query = $this->db->query("SELECT * FROM thread where srno = " . (int)$data['tid']);
        if($query->num_rows() > 0){
            $this->db->query("INSERT INTO reply(description, tid, uid) values('" . safeThreadContent($data['desc']) . "'," . (int)$data['tid']. "," . (int)$data['uid'] . ")");
            $query_ = $this->db->query("SELECT reply.*, useraccounts.username FROM reply, useraccounts WHERE useraccounts.srno=reply.uid AND reply.uid = " . (int)$data['uid']." and reply.tid = " . (int)$data['tid'] . " ORDER BY timestamp desc LIMIT 1");
            if($query_->num_rows() > 0){
                $reply = $query_->row_array();
                
                $response.='<li class="pure-u-1 reply" data-rid="' . $reply['srno'] . '">';
                $response.='<div class="pure-g">';
                $response.='<div class="pure-u-1 reply-owner">';
                $response.='<ul>';
                $response.='<li>';
                $response.='<div class="avatar" style="background-image: url(\'' . userdata_url($reply['uid'], $data['avatarpath']) . '\');"></div>';
                $response.='</li>';
                $response.='<li style="padding-left: 10px;">';
                $response.='<p><a href="' . base_url() . $reply['username'] . '">' . $data['name'] . '</a><br /><small>' . time_elapsed($reply['timestamp']) . ' ';
                $response.=' <span class="fg-green hidden" style="margin-left: 5px;"><i class="fa fa-check-circle"></i> Correct</span>';
                $response.='</small></p>';
                $response.='</li>';
                $response.='<li class="flt-right">';
                $response.='<i class="fa fa-remove pointer reply-remove"></i>';
                $response.='</li>';
                $response.='</ul>';
                $response.='</div>';
                $response.='<div class="pure-u-1 reply-desc thread-desc">';
                $desc = str_replace('<;','&lt;',$reply['description']);
                $desc = str_replace('>;','&gt;',$desc);
                $desc = preg_replace('/(<[^>]+) style=".*?"/i', '$1', $desc);
                $response.= $desc;
                $response.='</div>';
                $response.='<div class="pure-u-1">';
                $response.='<div class="pure-g">';
                $response.='<div class="pure-u-1-4">';
                $response.='<p>';
                $response.='<a id="upvote-reply" href="javascript:;">Upvote</a> <i style="margin-left: 5px;display:none;" class="loader fa fa-circle-o-notch fa-spin"></i></p>';
                $response.='</div>';
                $response.='<div class="pure-u-3-4">';
                $response.='<p class="txt-right">';
                $response.='<span style="margin-right: 5px;" class="reply-upvote-count fg-grayLight"><i class="fa fa-fw fa-star-o"></i> 0</span> ';
                $response.='<span style="margin-right: 5px;" class="reply-comment-count fg-grayLight"><i class="fa fa-fw fa-comments-o"></i> 0</span> ';
                $response.='<a class="toggle-comments" href="javascript:;" data-status="expand">Expand <i class="fa fa-angle-down"></i></a>';                                    
                $response.='</p>';
                $response.='</div>';
                $response.='</div>';
                $response.='<div class="pure-u-1 reply-comments" style="display: none;padding-left: 20px;">';
                $response.='<div class="pure-g">';
                $response.='<div class="pure-u-1">';
                $response.='<input type="text" class="reply-comment-input" placeholder="add a comment" />';
                $response.='<ul class="comments">';                                    
                $response.='</ul>';                                    
                $response.='</div>';
                $response.='</div>';
                $response.='</div>';
                $response.='</div>';
                $response.='</li>';
                return $response;
            }
            return false;
        }
        return false;
    }
    
    public function add_comment($data){
        $query = $this->db->query("INSERT INTO replies_to_reply(description, rid, uid) VALUES('" . $data['comment'] . "', " . (int)$data['rid'] . ", " . (int)$data['uid'] . ")");
        $query_= $this->db->query("SELECT replies_to_reply.srno, replies_to_reply.description, replies_to_reply.timestamp, replies_to_reply.rid, useraccounts.username, CONCAT(extendedinfo.fname, ' ', extendedinfo.lname) as name FROM replies_to_reply, extendedinfo, useraccounts WHERE replies_to_reply.rid=" . (int)$data['rid'] . " AND replies_to_reply.uid=" . (int)$data['uid'] . " AND replies_to_reply.uid=extendedinfo.uid AND useraccounts.srno=replies_to_reply.uid ORDER BY replies_to_reply.timestamp DESC LIMIT 1");
        if($query_->num_rows() > 0){
            $result = $query_->row_array();
            $response = '<li class="reply-comment" data-rrid="' . $result['srno'] . '">';
            $response.= '<span>';
            $response.= $result['description'] . ' –<a href="' . base_url() . $result['username'] . '">' . $result['name'] . '</a> ' . time_elapsed($result['timestamp']);
            $response.= '</span>';
            $response.= '<i class="fa fa-remove pointer comment-remove"></i>';
            $response.= '</li>';     
            return $response;
        }
        return false;
    }
    public function upvote_reply($data){
        
        $_query = $this->db->query("SELECT * FROM upvotes_to_replies WHERE rid=" . (int)$data['rid'] . " AND uid=" . (int)$data['uid']);
        if($_query->num_rows() > 0){
            return false;
        }
        
        $orig = $this->db->db_debug;
        $this->db->db_debug = FALSE;
        $this->db->query("INSERT INTO upvotes_to_replies(rid, uid) VALUES(" . (int)$data['rid'] . ", " . (int)$data['uid'] . ")");
        $this->db->db_debug = $orig;
        
        $query = $this->db->query("SELECT * FROM upvotes_to_replies WHERE rid=" . (int)$data['rid'] . " AND uid=" . (int)$data['uid']);
        if($query->num_rows() > 0){
            $query_ = $this->db->query("SELECT COUNT(*) as upvotes FROM upvotes_to_replies WHERE rid=" . (int)$data['rid']);
            $result = $query_->row_array();
            return $result['upvotes'];
        }
        return false;
    }
    
    public function rm_upvote_reply($data){
        
        $this->db->query("DELETE FROM upvotes_to_replies WHERE rid=" . (int)$data['rid'] . " AND uid=" . (int)$data['uid']);
        $query_ = $this->db->query("SELECT COUNT(*) as upvotes FROM upvotes_to_replies WHERE rid=" . (int)$data['rid']);
        $result = $query_->row_array();
        return $result['upvotes'];
    }

    public function search_threads_mobile($data){
        $response = '';
        $query_one = $this->db->query("SELECT useraccounts.username, thread.srno, thread.uid, thread.description, thread.title, thread.timestamp, category.name as cname, CONCAT(extendedinfo.fname, ' ', extendedinfo.lname) as name, extendedinfo.avatarpath FROM thread, extendedinfo, useraccounts, category WHERE (thread.title LIKE '%" . $data['param'] . "%' OR thread.description LIKE '%" . $data['param'] . "%') AND thread.uid=extendedinfo.uid and thread.cid = category.srno and thread.uid = useraccounts.srno ORDER BY timestamp DESC LIMIT 10");
        
        if($query_one->num_rows() > 0){
            $result = $query_one->result_array();
            $response.='<ul>';
            foreach($result as $item){
                $tm = $item['timestamp'];
                $response.='<li class="pure-u-1 thread" data-tid="' . $item['srno'] .'" style="padding: 0;border-bottom: 1px solid rgba(235,235,235,0.4);">';
                $response.='<div class="pure-g">';
                $response.='<div class="pure-u-1" style="margin-bottom: 0px;">';
                $response.='<ul>';
                $response.='<li>';
                $response.='<div class="avatar" style="background-image: url(' . base_url() . 'userdata/' . $item['uid'] . '/' .$item['avatarpath'] .');"></div>';
                $response.='</li>';
                $response.='<li style="padding-left: 10px;">';
                $response.='<p><a href="' . base_url() . $item['username'] . '">' . $item['name'] . '</a><br /><small><a href="javascript:;" class="fg-grayDark link">' . $item['cname'] . '</a><span class="dot-center"></span>' . time_elapsed($item['timestamp']) . '</small></p>';
                $response.='</li>';
                $response.='</ul>';
                $response.='</div>';
                $response.='<div class="pure-u-1 pointer" style="padding: 0px 0;">';
                $response.='<a href="' . base_url() . 'Thread/' . $item['srno'] . '"><h5 class="black" style="color: rgba(0,0,0,0.8);">' . $item['title'] .'</h5></a>';
                $response.='</div>';
                $response.='<div class="pure-u-1 thread-desc">';
                $desc = str_replace('<;','&lt;',$item['description']);
                $desc = str_replace('>;','&gt;',$desc);
                $desc = preg_replace('/(<[^>]+) style=".*?"/i', '$1', $desc);
                $response.= $desc;
                $response.='</div>';
                $response.='<div class="pure-u-1">';
                $response.='<p><a href="' . base_url() . 'Thread/' . $item['srno'] . '">See full thread</a></p>';
                $response.='</div>';
                $query_upvotes = $this->db->query("SELECT * FROM upvotes_to_thread WHERE tid = " . $item['srno']);
                $upvotes = $query_upvotes->num_rows();
                $query_replies = $this->db->query("SELECT * FROM reply WHERE tid = " . $item['srno']);
                $replies = $query_replies->num_rows();
                $query_views = $this->db->query("SELECT * FROM views WHERE tid = " . $item['srno']);
                $views = $query_views->num_rows();
                $query_tags = $this->db->query("SELECT * from thread_tags where tid = " . (int)$item['srno']);
                $response.='<div class="pure-u-1" style="padding: 10px 0;">';
                    $query_tags = $this->db->query("SELECT * from thread_tags where tid = " . (int)$item['srno']);
                    $tags = $query_tags->result_array();
                    foreach($tags as $tag){
                        $response.='<a href="' . base_url() . 'Tag/' . $tag['name'] . '" class="tag">' . $tag['name'] . '</a>';
                    }
                    $response.='</div>';
                $response.='<div class="pure-u-1 thread-stats">';
                $response.='<p class="flt-left fg-grayLight"><span style="padding-right: 20px;">' . $upvotes . ' Upvotes</span><span style="padding-right: 20px;">' . $replies . ' Replies</span>' . $views . ' Views</p>';
                $response.='</div>';
                $response.='</div>';
                $response.='</li>';
            }
            $response.='</ul>';
            if($query_one->num_rows() >=10){
                $response.='<div class="pure-u-1" style="border-top: 1px solid rgba(100,100,100,0.1);">';
                $response.='<i class="fa fa-2x loader fg-cyan fa-circle-o-notch fa-spin" style="display:none;margin: 20px auto;"></i>';
                $response.='<div class="load-more" data-opt="search-all" data-opt-val="' . $data['param'] . '">';
                $response.='<a href="javascript:;">load more</a>';
                $response.='<input type="hidden" class="lmt" value="' . $tm . '"/>';
                $response.='</div>';
                $response.='</div>';
            }
        }
        else{
            $response.='<div class="pure-u-1"><h6 class="txt-center margin0" style="padding: 15px 10px 10px;">Couldn\'t find anything :(</h6></div>';
        }
        return $response;
    }
    public function search_people_mobile($data){
        $response = '';
        $response.='<ul>';
        $query_three = $this->db->query("SELECT useraccounts.username, useraccounts.srno, CONCAT(extendedinfo.fname, ' ', extendedinfo.lname) as name, extendedinfo.avatarpath FROM useraccounts, extendedinfo WHERE CONCAT(extendedinfo.fname, ' ', extendedinfo.lname)  LIKE '%" . $data['param'] . "%' AND extendedinfo.uid = useraccounts.srno");
        if($query_three->num_rows() > 0){
            $result = $query_three->result_array();
            foreach($result as $item){
                $response.='<li style="padding: 10px 0;">';
                $response.='<a class="fg-gray" href="' . base_url() . $item['username'] . '">';
                $response.='<div class="pure-g">';
                $response.='<div class="pure-u-1-7">';
                $response.='<div class="avatar" style="background-image: url(' . base_url() . 'userdata/' . $item['srno'] .'/'. $item['avatarpath'] . ');"></div>';
                $response.='</div>';
                $response.='<div class="pure-u-5-6" style="padding-left: 10px;;">';
                $response.='<p class="txt-left margin0" style="line-height: 1.5;">' . $item['name'] . '<br> <span class="fg-gray" style="font-size: 14px;line-height: 2;">' . $item['username'] . '</span></p>';
                $response.='</div>';
                $response.='</div>';
                $response.='</a>';
                $response.='</li>';
            }
        }        
        else{
            $response.='<div class="pure-u-1"><h6 class="txt-center margin0" style="padding: 15px 10px 10px;">Couldn\'t find anything :(</h6></div>';
        }
        $response.='</ul>';
        
        return $response;      
    }
    
    public function search_tags_mobile($data){
        $response = '';
        $response.='<div style="padding: 10px 0 0px 0;">';
        $query_two= $this->db->query("SELECT tags.name FROM tags WHERE tags.name LIKE '%" . $data['param'] . "%' LIMIT 15");   
        if($query_two->num_rows() > 0){
            $result = $query_two->result_array();
            foreach($result as $item){
                $response.='<a href="' . base_url() . 'Tag/' . $item['name'] .'" class="tag">' . $item['name'] . '</a>';
            }
        }            
        else{
            $response.='<div class="pure-u-1"><h6 class="txt-center margin0" style="padding: 5px 10px 10px;">Couldn\'t find anything :(</h6></div>';
        }
        $response.='</div>';        
        return $response;
    }
    
    public function post_thread_mobile($data) {
        $response = '';
        $query = $this->db->query("INSERT INTO thread(title,description,imagepath,coordinates,cid,uid) VALUES(" . $this->db->escape($data['title']) . ",'" . $data['desc'] . "'," . $this->db->escape($data['filename']) . "," . $this->db->escape($data['coordinates']) . "," . (int)$data['category'] . "," . (int)$data['uid'] . ")");
        $query_ = $this->db->query("SELECT thread.srno,thread.uid FROM thread, extendedinfo, category WHERE thread.uid = " . (int)$data['uid'] . " AND thread.uid=extendedinfo.uid AND thread.cid=category.srno ORDER BY timestamp DESC LIMIT 1");
        if($query_->num_rows() > 0){
            $result = $query_->row_array();
            $query = $this->db->query("INSERT INTO trackthread values(" . (int)$result['srno'] . "," . (int)$result['uid'] . ")");
            if($data['tags']!=""){
                $orig = $this->db->db_debug;
                $this->db->db_debug = FALSE;                
                $array = explode(',', $data['tags']);
                
                foreach($array as $element){
                    $query = $this->db->query("INSERT INTO tags VALUES('$element')");
                    $query = $this->db->query("INSERT INTO thread_tags VALUES('" . $element . "'," . (int)$result['srno'] . ")");
                } 
                
                $this->db->db_debug = $orig;
            }
            $response = $result['srno'];
            return $response;
        }
        return false;
    }
    
    public function remove_reply($data){
        $query_= $this->db->query("SELECT thread.uid as tuid, reply.uid as ruid FROM thread, reply WHERE reply.srno=" . (int)$data['rid'] . " AND reply.tid=thread.srno");
        if($query_->num_rows()>0){
            $result = $query_->row_array();
            if($result['ruid']==$data['uid'] || $result['tuid']==$data['uid']){
                $query = $this->db->query("DELETE FROM reply WHERE srno=" . (int)$data['rid']);
                $query_= $this->db->query("SELECT * FROM reply WHERE srno=" . (int)$data['rid'] . " AND uid=" . (int)$data['uid']);
                if($query_->num_rows()>0){
                    return false;
                }
                return true;
            }
            return false;            
        }
        
    }    
    
    public function wait_for_notification($data){
        $response = '';
        $query = $this->db->query("SELECT * FROM notifications WHERE notifications.uid =" . (int)$data['uid'] . " AND sent=0");
        if($query->num_rows() > 0){
            $result = $query->result_array();
            foreach($result as $item){
                if($item['type']=='1'){
                $query_ = $this->db->query("SELECT extendedinfo.uid as euid,extendedinfo.avatarpath,CONCAT(extendedinfo.fname, ' ' ,extendedinfo.lname) as name,reply.tid,reply.srno, thread.title FROM thread, reply, extendedinfo where reply.srno = " . $item['ref']." and reply.tid = thread.srno and reply.uid = extendedinfo.uid");
                $result_ = $query_->row_array();
                    $response.='<li class="beeper">';
                    $response.='<a href="' . base_url() . 'Thread/' . $result_['tid'] . '/' . $item['ref'] . '/#r' . $item['ref'] . '"><div class="pure-g">';
                    $response.='<div class="pure-u-1-4">';
                    $response.='<div class="avatar" style="margin: 2px 0;height:50px;width:50px;background-image: url(\'' . userdata_url($result_['euid'], $result_['avatarpath']) . '\');"></div>';
                    $response.='</div>';
                    $response.='<div class="pure-u-3-4">';
                    $response.='<i class="fa fa-times fg-white flt-right close-beeper"></i>';
                    $response.='<p class="txt-left margin0 bold fg-white" style="font-size: 13px;line-height: 1.3;">' . $result_['name'] . ' left a reply on your thread "' . substr($result_['title'],0,20) . '"</p>';
                    $response.='</div>';
                    $response.='</div>';
                    $response.='</a></li>';
                }
                if($item['type']=='2'){
                $query_ = $this->db->query("SELECT extendedinfo.uid as euid,extendedinfo.avatarpath,CONCAT(extendedinfo.fname ,' ', extendedinfo.lname) as name,reply.description,reply.tid,replies_to_reply.srno,replies_to_reply.rid from thread,reply,replies_to_reply,extendedinfo where replies_to_reply.srno=" . $item['ref'] . " and replies_to_reply.rid = reply.srno and reply.tid = thread.srno and replies_to_reply.uid = extendedinfo.uid");
                $result_ = $query_->row_array();
                    $response.='<li class="beeper">';
                    $response.='<a href="' . base_url() . 'Thread/' . $result_['tid'] . '/' . $item['ref'] . '/#r' . $result_['rid'] . '"><div class="pure-g">';
                    $response.='<div class="pure-u-1-4">';
                    $response.='<div class="avatar" style="margin: 2px 0;height:50px;width:50px;background-image: url(\'' . userdata_url($result_['euid'], $result_['avatarpath']) . '\');"></div>';
                    $response.='</div>';
                    $response.='<div class="pure-u-3-4">';
                    $response.='<i class="fa fa-times fg-white flt-right close-beeper"></i>';
                    $response.='<p class="txt-left margin0 bold fg-white" style="font-size: 13px;line-height: 1.3;">' . $result_['name'] . ' left a comment on your reply "' . substr(strip_tags($result_['description']),0,20) . '"</p>';
                    $response.='</div>';
                    $response.='</div>';
                    $response.='</a></li>';
                }
                if($item['type']=='3'){
                $query_ = $this->db->query("SELECT extendedinfo.uid as euid,extendedinfo.avatarpath,CONCAT(extendedinfo.fname ,' ', extendedinfo.lname) as name,thread.srno,thread.title from thread,extendedinfo,upvotes_to_thread where upvotes_to_thread.srno=" . $item['ref'] . " and thread.srno = upvotes_to_thread.tid and upvotes_to_thread.uid = extendedinfo.uid");
                $result_ = $query_->row_array();                    
                    $response.='<li class="beeper">';
                    $response.='<a href="' . base_url() . 'Thread/' . $result_['srno'] . '/' . $item['ref'] . '"><div class="pure-g">';
                    $response.='<div class="pure-u-1-4">';
                    $response.='<div class="avatar" style="margin: 2px 0;height:50px;width:50px;background-image: url(\'' . userdata_url($result_['euid'], $result_['avatarpath']) . '\');"></div>';
                    $response.='</div>';
                    $response.='<div class="pure-u-3-4">';
                    $response.='<i class="fa fa-times fg-white flt-right close-beeper"></i>';
                    $response.='<p class="txt-left margin0 bold fg-white" style="font-size: 13px;line-height: 1.3;">' . $result_['name'] . ' upvoted "' . substr($result_['title'],0,20) . '"</p>';
                    $response.='</div>';
                    $response.='</div>';
                    $response.='</a></li>';
                }
                if($item['type']=='4'){
                $query_ = $this->db->query("SELECT extendedinfo.uid as euid,extendedinfo.avatarpath, CONCAT(extendedinfo.fname,' ',extendedinfo.lname) as name, reply.description, reply.tid, reply.srno FROM thread, reply, extendedinfo, upvotes_to_replies where upvotes_to_replies.srno = " . $item['ref']." and reply.tid = thread.srno and upvotes_to_replies.rid=reply.srno and upvotes_to_replies.uid = extendedinfo.uid");
                $result_ = $query_->row_array();
                    $response.='<li class="beeper">';
                    $response.='<a href="' . base_url() . 'Thread/' . $result_['tid'] . '/' . $item['ref'] . '/#r' . $item['ref'] . '"><div class="pure-g">';
                    $response.='<div class="pure-u-1-4">';
                    $response.='<div class="avatar" style="margin: 2px 0;height:50px;width:50px;background-image: url(\'' . userdata_url($result_['euid'], $result_['avatarpath']) . '\');"></div>';
                    $response.='</div>';
                    $response.='<div class="pure-u-3-4">';
                    $response.='<i class="fa fa-times fg-white flt-right close-beeper"></i>';
                    $response.='<p class="txt-left margin0 bold fg-white" style="font-size: 13px;line-height: 1.3;">' . $result_['name'] . ' upvoted reply "' . substr(strip_tags($result_['description']),0,30) . '"</p>';
                    $response.='</div>';
                    $response.='</div>';
                    $response.='</a></li>';
                }
                if($item['type']=='5'){
                $query_ = $this->db->query("SELECT extendedinfo.uid as euid,extendedinfo.avatarpath,CONCAT(extendedinfo.fname ,' ', extendedinfo.lname) as name,reply.description,reply.tid,reply.srno FROM thread, reply, extendedinfo where reply.srno = " . $item['ref']." and reply.tid = thread.srno and thread.uid = extendedinfo.uid");
                $result_ = $query_->row_array();                    
                    $response.='<li class="beeper">';
                    $response.='<a href="' . base_url() . 'Thread/' . $result_['tsrno'] . '/' . $item['ref'] . '/#r' . $item['ref'] . '"><div class="pure-g">';
                    $response.='<div class="pure-u-1-4">';
                    $response.='<div class="avatar" style="margin: 2px 0;height:50px;width:50px;background-image: url(\'' . userdata_url($result_['euid'], $result_['avatarpath']) . '\');"></div>';
                    $response.='</div>';
                    $response.='<div class="pure-u-3-4">';
                    $response.='<i class="fa fa-times fg-white flt-right close-beeper"></i>';
                    $response.='<p class="txt-left margin0 bold fg-white" style="font-size: 13px;line-height: 1.3;">' . $result_['name'] . ' marked your reply as correct.</p>';
                    $response.='</div>';
                    $response.='</div>';
                    $response.='</a></li>';
                }
            }
            return $response;
        }
        return false;   
    }
    
    public function get_notification_count($data){
        $query = $this->db->query("SELECT * FROM notifications WHERE notifications.uid =" . (int)$data['uid'] . " AND sent=0");
        $count = $query->num_rows();
        return $count;
    }
    
    public function reset_notifications($data){
        $this->db->query("UPDATE notifications SET sent=1 WHERE uid = " . (int)$data['uid'] . "");
    }
    public function mark_read($data){
        $this->db->query("UPDATE notifications SET readflag=1 WHERE uid = " . (int)$data['uid'] . "");
    }
    
    public function pull_notifications($uid){
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
                    $response.='<div class="pure-u-1-4">';
                    $response.='<div class="avatar" style="background-image: url(\'' . userdata_url($result_['euid'], $result_['avatarpath']) . '\');"></div>';
                    $response.='</div>';
                    $response.='<div class="pure-u-3-4" style="padding-left: 10px;">';
                    $response.='<p class="txt-left margin0">' . $result_['name'] . ' left a reply on your thread "' . substr($result_['title'],0,20) . '"</p>';
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
                    $response.='<div class="pure-u-1-4">';
                    $response.='<div class="avatar" style="background-image: url(\'' . userdata_url($result_['euid'], $result_['avatarpath']) . '\');"></div>';
                    $response.='</div>';
                    $response.='<div class="pure-u-3-4" style="padding-left: 10px;">';
                    $response.='<p class="txt-left margin0">' . $result_['name'] . ' left a comment on your reply "' . substr(strip_tags($result_['description']),0,20) . '"</p>';
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
                    $response.='<div class="pure-u-1-4">';
                    $response.='<div class="avatar" style="background-image: url(\'' . userdata_url($result_['euid'], $result_['avatarpath']) . '\');"></div>';
                    $response.='</div>';
                    $response.='<div class="pure-u-3-4" style="padding-left: 10px;">';
                    $response.='<p class="txt-left margin0">' . $result_['name'] . ' upvoted "' . substr($result_['title'],0,20) . '"</p>';
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
                    $response.='<a href="' . base_url() . 'Thread/' . $result_['tid'] . '/' . $result_['srno'] . '/#r' . $item['ref'] . '"><div class="pure-g">';
                    $response.='<div class="pure-u-1-4">';
                    $response.='<div class="avatar" style="background-image: url(\'' . userdata_url($result_['euid'], $result_['avatarpath']) . '\');"></div>';
                    $response.='</div>';
                    $response.='<div class="pure-u-3-4" style="padding-left: 10px;">';
                    $response.='<p class="txt-left margin0">' . $result_['name'] . ' upvoted reply "' . substr(strip_tags($result_['description']),0,30) . '"</p>';
                    $response.='</div>';
                    $response.='</div>';
                    $response.='</a></li>';
                }
                if($item['type']=='5'){
                $query_ = $this->db->query("SELECT extendedinfo.uid as euid,extendedinfo.avatarpath,CONCAT(extendedinfo.fname ,' ', extendedinfo.lname) as name,reply.description,reply.tid,reply.srno FROM thread, reply, extendedinfo where reply.srno = " . $item['ref']." and reply.tid = thread.srno and thread.uid = extendedinfo.uid");
                $result_ = $query_->row_array();
                    if($item['readflag']!='0'){
                        $response.='<li>';
                    }
                    else{
                        $response.='<li class="active-notif">';
                    }
                    $response.='<a href="' . base_url() . 'Thread/' . $result_['tsrno'] . '/' . $item['ref'] . '/#r' . $item['ref'] . '"><div class="pure-g">';
                    $response.='<div class="pure-u-1-4">';
                    $response.='<div class="avatar" style="background-image: url(\'' . userdata_url($result_['euid'], $result_['avatarpath']) . '\');"></div>';
                    $response.='</div>';
                    $response.='<div class="pure-u-3-4" style="padding-left: 10px;">';
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
    
    public function people_upvoted($data){
        $response = '';
        $query = $this->db->query("SELECT useraccounts.username, extendedinfo.uid,CONCAT(extendedinfo.fname,' ',extendedinfo.lname) as name, extendedinfo.avatarpath from useraccounts, extendedinfo, upvotes_to_thread WHERE upvotes_to_thread.tid = " . (int)$data['tid'] . " and extendedinfo.uid = upvotes_to_thread.uid and useraccounts.srno = extendedinfo.uid");
        if($query->num_rows() > 0){
            $result = $query->result_array();
            foreach($result as $item){
                $response.='<li>';
                $response.='<a href="' . base_url() . $item['username'] . '">';
                $response.='<div class="pure-g">';
                $response.='<div class="pure-u-1-8">';
                $response.='<div class="avatar flt-left" style="background-image: url(\'' . userdata_url($item['uid'], $item['avatarpath']) . '\');"></div>';
                $response.='</div>';
                $response.='<div class="pure-u-7-8" style="padding-left: 10px;">';
                $response.='<p class="margin0 fg-gray">' . $item['name'] . '</p>';
                $response.='</div>';
                $response.='</div>';
                $response.='</a>';
                $response.='</li>';
            }
            return $response;
        }
        return false;
    }
    public function viewers($data){
        $response = '';
        $query = $this->db->query("SELECT useraccounts.username, extendedinfo.uid, CONCAT(extendedinfo.fname,' ',extendedinfo.lname) as name, extendedinfo.avatarpath from useraccounts, extendedinfo, views WHERE views.tid = " . (int)$data['tid']." and extendedinfo.uid = views.uid and useraccounts.srno = extendedinfo.uid");
        if($query->num_rows() > 0){
            $result = $query->result_array();
            foreach($result as $item){
                $response.='<li>';
                $response.='<a href="' . base_url() . $item['username'] . '">';
                $response.='<div class="pure-g">';
                $response.='<div class="pure-u-1-8">';
                $response.='<div class="avatar flt-left" style="background-image: url(\'' . userdata_url($item['uid'], $item['avatarpath']) . '\');"></div>';
                $response.='</div>';
                $response.='<div class="pure-u-7-8" style="padding-left: 10px;">';
                $response.='<p class="margin0 fg-gray">' . $item['name'] . '</p>';
                $response.='</div>';
                $response.='</div>';
                $response.='</a>';
                $response.='</li>';
            }
            return $response;
        }
        return false;
    }

    public function remove_comment($data){
        $query = $this->db->query("DELETE FROM replies_to_reply WHERE srno=" . (int)$data['rrid'] . " AND uid=" . (int)$data['uid']);
        $query_= $this->db->query("SELECT * FROM replies_to_reply WHERE srno=" . (int)$data['rrid'] . " AND uid=" . (int)$data['uid']);
        if($query_->num_rows()>0){
            return false;
        }
        return true;
    }
    
    public function mark_correct($data){
        
        $_query = $this->db->query("SELECT thread.uid FROM thread, reply WHERE reply.srno=" . (int)$data['rid'] . " AND reply.tid=thread.srno");
        if($_query->num_rows() > 0){
            $result = $_query->row_array();
            if($result['uid']==$data['uid']){
                $this->db->query("UPDATE reply SET correct=1 WHERE srno=" . (int)$data['rid']);
                $query = $this->db->query("SELECT correct FROM reply WHERE srno=" . (int)$data['rid']);
                if($query->num_rows() > 0){
                    $result_=$query->row_array();
                    if($result_['correct']==1){
                        return true;
                    }
                    return false;
                }
                return false;
            }
            return false;
        }
        return false;
    }

    public function remove_correct($data){
        
        $_query = $this->db->query("SELECT thread.uid FROM thread, reply WHERE reply.srno=" . (int)$data['rid'] . " AND reply.tid=thread.srno");
        if($_query->num_rows() > 0){
            $result = $_query->row_array();
            if($result['uid']==$data['uid']){
                $this->db->query("UPDATE reply SET correct=0 WHERE srno=" . (int)$data['rid']);
                $query = $this->db->query("SELECT correct FROM reply WHERE srno=" . (int)$data['rid']);
                if($query->num_rows() > 0){
                    $result_=$query->row_array();
                    if($result_['correct']==0){
                        return true;
                    }
                    return false;
                }
                return false;
            }
            return false;
        }
        return false;
    }
    public function validate_reset_request($data) {
        $query = $this->db->query("SELECT question FROM useraccounts, extendedinfo WHERE useraccounts.username = '" . $data['username']."' AND useraccounts.srno=extendedinfo.uid");
        if($query->num_rows() > 0){
            $result = $query->row_array();
            return $result['question'];
        }
        return false;
    }
    public function verify_answer($data){
        $query = $this->db->query("SELECT * FROM extendedinfo,useraccounts WHERE useraccounts.username = '" . $data['username']."' AND useraccounts.srno = extendedinfo.uid AND extendedinfo.answer = '" . $data['answer']."'");
        if($query->num_rows() > 0){
            $result = $query->row_array();
            $response='<div class="pure-u-1 reset-password" style="position: relative;">
                            <div class="tips tips-password" style="display: none;">
                            <i class="fa fa-caret-right fa-2x fg-lightBlue right-caret" style="top: 4px;"></i>
                            <div class="bg-lightBlue tip" style="top: -11px;">
                                <p class="fg-white bold txt-center margin0" style="font-size: 10pt;">Must contain at least 8 characters.</p>
                            </div>
                        </div>
                        <form action="' . base_url() . 'Login/reset_password" name="resetform" method="post" accept-charset="utf-8">
                            <input type="hidden" name="unameconfirm" value="' . $result['username'] . '" />
                            <div style="position: relative;">
                                <input type="password" class="login-credential rst-password" name="new_password" placeholder="password" spellcheck="false" autocapitalize="off" autocorrect="off" autocomplete="off" />
                                <span class="rpwd status-symbol" style="display: none;"><i></i></span>
                            </div>
                            <div style="position: relative;">
                                <input type="password" class="login-credential rst-pwdcon" name="con_password" placeholder="confirm password" spellcheck="false" autocapitalize="off" autocorrect="off" autocomplete="off" />
                                <span class="rcpw status-symbol" style="display: none;"><i></i></span>
                            </div>
                            <div style="position: relative; margin-top: 10px;">
                                <input type="submit" class="btn-general login-submit bg-white fg-grayLight update-pwd-submit" disabled="disabled" name="updatepwd-submit-btn" value="UPDATE" />
                            </div>
                        </form>
                    </div>';
            return $response;
        }
        return false;
    }
    public function save_cover_image($data){
        $this->db->query("UPDATE extendedinfo set coverpath = '" . $data['filename']."',covercoordinates = '" . $data['coordinates']."' WHERE uid = " . (int)$data['uid']. "");
        $query = $this->db->query("SELECT * FROM extendedinfo WHERE coverpath = '" . $data['filename']. "' and uid = " . (int)$data['uid']. "");
        if($query->num_rows() > 0){
            return true;
        }
        return false;
    }
    public function edit_thread($data){
        $this->db->query("UPDATE thread set title='" . $data['title'] . "', description='" . $data['desc']. "',coordinates='" . $data['coordinates']."',edit=1 WHERE srno=" . (int)$data['tid'] . "");
    }
    public function pull_t_desc($data){
        $query = $this->db->query("SELECT * from thread where srno = " . (int)$data['tid']);
        if($query->num_rows() > 0){
            $result = $query->row_array();
            $response['title'] = $result['title'];
            $response['description'] = str_replace('<;','&lt;',$result['description']);
            $response['description'] = str_replace('>;','&gt;',$response['description']);
            $response['coordinates'] = $result['coordinates'];
            return $response;
        }
        return false;
    }
    public function edit_history($data){
        $query = $this->db->query("SELECT threadhistory.title,threadhistory.description,threadhistory.imagepath,threadhistory.coordinates,threadhistory.timestamp as editedtimestamp,threadhistory.uid,threadhistory.tid,thread.timestamp,thread.description as tdesc,useraccounts.username,extendedinfo.avatarpath,CONCAT(extendedinfo.fname,' ',extendedinfo.lname) as name,category.name as cname from threadhistory,useraccounts,extendedinfo,thread,category where threadhistory.tid = " . (int)$data['tid'] . " and threadhistory.tid = thread.srno and threadhistory.cid = category.srno and threadhistory.uid = useraccounts.srno and threadhistory.uid = extendedinfo.uid ORDER by threadhistory.timestamp DESC");
        if($query->num_rows() > 0){
            require_once APPPATH . 'libraries/class.Diff.php';
            $response='';
            $result = $query->result_array();
            foreach($result as $item){
                $response.='<li class="pure-u-1 thread" data-tid="' . $item['tid'] .'" style="padding: 0;border-bottom: 1px solid rgba(235,235,235,0.4);">';
                $response.='<div class="pure-g"><div class="pure-u-1"><p>Edited Time : ' . $item['editedtimestamp'] . '</p></div></div>';
                $response.='<div class="pure-g">';
                $response.='<div class="pure-u-1" style="margin-bottom: 0px;">';
                $response.='<ul>';
                $response.='<li>';
                $response.='<div class="avatar" style="background-image: url(' . base_url() . 'userdata/' . $item['uid'] . '/' .$item['avatarpath'] .');"></div>';
                $response.='</li>';
                $response.='<li style="padding-left: 10px;">';
                $response.='<p><a href="' . base_url() . $item['username'] . '">' . $item['name'] . '</a><br /><small><a href="javascript:;" class="fg-grayDark link">' . $item['cname'] . '</a><span class="dot-center"></span>' . time_elapsed($item['timestamp']) . '</small></p>';
                $response.='</li>';
                $response.='</ul>';
                $response.='</div>';
                $response.='<div class="pure-u-1 pointer" style="padding: 0px 0;">';
                $response.='<a href="' . base_url() . 'Thread/' . $item['tid'] . '"><h5 class="black" style="color: rgba(0,0,0,0.8);">' . $item['title'] .'</h5></a>';
                $response.='</div>';
                $response.='<div class="pure-u-1 thread-desc">';
                $desc = str_replace('<;','&lt;',$item['description']);
                $desc = str_replace('>;','&gt;',$desc);
                $desc = preg_replace('/(<[^>]+) style=".*?"/i', '$1', $desc);
                $response.= Diff::toHTML(Diff::compare($desc, $item['tdesc']));
                $response.='</div>';
                $response.='<div class="pure-u-1">';
                $response.='<p><a href="' . base_url() . 'Thread/' . $item['tid'] . '">See full thread</a></p>';
                $response.='</div>';
                $query_upvotes = $this->db->query("SELECT * FROM upvotes_to_thread WHERE tid = " . $item['tid']);
                $upvotes = $query_upvotes->num_rows();
                $query_replies = $this->db->query("SELECT * FROM reply WHERE tid = " . $item['tid']);
                $replies = $query_replies->num_rows();
                $query_views = $this->db->query("SELECT * FROM views WHERE tid = " . $item['tid']);
                $views = $query_views->num_rows();
                $response.='<div class="pure-u-1 thread-stats">';
                $response.='<p class="flt-left fg-grayLight"><span style="padding-right: 20px;">' . $upvotes . ' Upvotes</span><span style="padding-right: 20px;">' . $replies . ' Replies</span>' . $views . ' Views</p>';
                $response.='</div>';
                $response.='</div>';
                $response.='</li>';
            }
            
            return $response;
        }
        return false;
    }
    public function autocomplete_tags($data){
        $response = '';
        $query = $this->db->query("SELECT name FROM tags WHERE name LIKE '" . $data['key'] . "%'");
        if($query->num_rows() > 0){
            $result = $query->result_array();
            foreach($result as $item){
                $response .= '<li class="bg-white fg-gray"><a href="javascript:;">' . $item['name'] . '</a></li>';
            }
            return $response;
        }
    }
    
    public function get_real_views($data){
        $query = $this->db->query("SELECT COUNT(*) as count FROM views WHERE tid=" . (int)$data['tid']);
        $result = $query->row_array();
        return $result['count'];
    }
}

