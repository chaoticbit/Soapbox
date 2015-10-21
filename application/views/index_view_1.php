<!DOCTYPE html>
<html>
    <head>
        <title>Soapbox</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0 user-scalable=no">        
        <link rel="stylesheet" href="<?php echo asset_url(); ?>css/main.css" />
        <link rel="stylesheet" href="<?php echo asset_url(); ?>css/font-awesome.min.css" />
        <link rel="stylesheet" href="<?php echo asset_url(); ?>css/grids.css" />
        <link rel="stylesheet" href="<?php echo asset_url(); ?>css/grids-responsive.css" />
        <link rel="stylesheet" href="<?php echo asset_url(); ?>css/medium-editor.css" />
        <link rel="stylesheet" href="<?php echo asset_url(); ?>css/index.css" />
    </head>
    <body>
            <?php 
//            echo '<a href="' . $logout_url. '">Logout</a>'; 
//            echo "<a href=".$user_profile['link']." target='_blank' ><img src="."https://graph.facebook.com/".$user_profile['id']."/picture?type=large".">"."</a>"."<p class='profile_name'>Welcome ! <em>".$user_profile['name']."</em></p>";
//            echo "<p>First Name : ".$user_profile['first_name']."</p>";
//            echo "<p>Id : ".$user_profile['id']."</p>";
//            echo "<p>Last Name : ".$user_profile['last_name']."</p>";
//            echo "<p>Gender : ".$user_profile['gender']."</p>";
//            echo "<p>email : ".$user_profile['email']."</p>";
//            echo "<p>Facebook URL : "."<a href=".$user_profile['link']." target='_blank'"."> https://www.facebook.com/".$user_profile['id']."</a></p>";
            ?>
        <div class="pure-g">
            <?php include 'headbar.php'; ?>
            <div class="filler"></div>            
            <div class="search-wrapper"></div>
            <div class="container">
                <div class="pure-g">
                    <div class="pure-u-1 pure-u-md-1-6 filler-left">
                        
                    </div>
                    <div class="pure-u-1 pure-u-md-5-6 md56-body">
                        <div class="pure-g">
                            <div class="pure-u-1 pure-u-md-16-24">
                                <div class="pure-g">
                                    <div class="pure-u-1">
                                        <div class="pure-g">
                                            <div class="pure-u-1 new-thread-button">
                                                <ul>
                                                    <li>
                                                        <div class="avatar flt-left" style="background-image: url('<?php echo userdata_url($userid, $avatarpath); ?>');"></div>
                                                    </li>
                                                    <li>
                                                        <span class="serif fg-grayLight toggle-editor" style="padding-left: 10px;">Start writing here...</span>
                                                    </li>
                                                </ul>
                                            </div>
                                            <a href="<?php echo base_url(); ?>Newthread" class="new-post-view">
                                                <div class="pure-u-1">
                                                    <ul>
                                                        <li>
                                                            <div class="avatar flt-left" style="background-image: url('<?php echo userdata_url($userid, $avatarpath); ?>');"></div>
                                                        </li>
                                                        <li>
                                                            <span class="serif fg-grayLight" style="padding-left: 10px;">Start writing here...</span>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </a>
                                            <div class="pure-u-1 editable-wrapper" id="editable-wrapper">
                                                <div class="pure-g">
                                                    <div class="pure-u-1" style="margin-bottom: 10px;">
                                                        <ul>
                                                            <li style="display: inline-block;vertical-align: middle;">
                                                                <div class="avatar" style="background-image: url('<?php echo userdata_url($userid, $avatarpath); ?>');"></div>
                                                            </li>
                                                            <li style="display: inline-block;vertical-align: middle;padding-left: 10px;">
                                                                <p><a href="javascript:;"><?php echo $fname . ' ' . $lname; ?></a><br /><small>drafting now<span class="dot">.</span><span class="dot">.</span><span class="dot">.</span></small></p>
                                                            </li>
                                                            <li class="flt-right" style="display: inline-block;">
                                                                <select class="thread-input-category margin0 fg-gray">
                                                                    <option value="0">Select Category</option>
                                                                    <?php
                                                                    foreach ($categories_alphabetical as $category) {
                                                                        echo '<option value="' . $category['srno'] . '">' . $category['name'] . '</option>';
                                                                    }
                                                                    ?>
                                                                </select>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </div>
                                               <div class="pure-u-1 thread-image-preview-wrapper" style="display:none;">                                                    
                                                   <div class="thread-image-preview">
                                                        <i class="fa fa-times-circle pointer fg-white flt-right remove-image" style="margin: 10px 8px 0 0;text-shadow: 0 0 5px rgba(0,0,0,0.7);" title="Remove image"></i>
                                                    </div>   
                                                    <progress class="image-upload-progress" id="image-upload-progress" value="0" max="100"></progress>
                                                </div>
                                                <div class="pure-u-1">
                                                    <input type="text" class="thread-title-input" placeholder="Title" />
                                                </div>
                                                <div class="pure-u-1">
                                                    <div class="editable" id="editable" data-text="Start writing here..."></div>                                               
                                                    <textarea class="duptarea hidden"></textarea>
                                                </div>
                                                <div class="pure-u-1 tag-input-div" style="border-top: 1px solid rgba(235,235,235,0.5);">
                                                    <input type="text" class="thread-tags-input"  placeholder="add tags here.." />
                                                    <input type="hidden" name="tags" class="tags" data-cnt="0" value="">
                                                </div>
                                                <div class="pure-g" style="padding: 5px 0;">
                                                    <div class="pure-u-1 pure-u-md-1-2">
                                                        <?php 
                                                        if($useragent == 'ios'){
                                                            echo '<p><a href="javascript:;" class="fg-darkCyan upload_image_toggle_ios">Add photo</a></p>';
                                                            echo '<input type="file" class="hidden thread-image-ios" accept="image/*" name="file">';
                                                        }
                                                        else{
                                                            echo '<p><a href="javascript:;" class="fg-darkCyan upload_image_toggle">Add photo</a></p>';
                                                            echo '<input type="file" class="hidden thread-image" accept="image/*" name="file">';
                                                        }
                                                        ?>
                                                        <input type="hidden" class="dupfilename" />                                                        
                                                    </div>
                                                    <div class="pure-u-1 pure-u-md-1-2 txt-right">
                                                        <small class="fg-grayLight untoggle-editor pointer" style="margin-right: 10px;">Cancel</small>
                                                        <button class="btn-post" style="">POST</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <?php
                                    if(!$threads){
                                        echo '<div class="pure-u-1 no-content-note">';
                                        echo '<h3 class="light txt-center" style="padding: 20px;">That\'s all we could find :(</h3>';
                                        echo '</div>';
                                        echo '<ul class="pure-u-1"><li class="hidden thread"></li></ul>';
                                    }
                                    else{
                                        echo '<ul class="pure-u-1">';
                                        foreach($threads as $thread){
                                            echo '<li class="pure-u-1 thread" data-tid="' . $thread['srno'] . '">';
                                            echo '<div class="pure-g">';
                                            echo '<div class="pure-u-1" style="margin-bottom: 10px;">';
                                            echo '<ul>';
                                            echo '<li>';
                                            echo '<div class="avatar" style="background-image: url(\'' . userdata_url($thread['uid'], $thread['avatarpath']) . '\');"></div>';
                                            echo '</li>';
                                            echo '<li style="padding-left: 10px;">';
                                            echo '<p><a href="' . base_url() . $thread['username'] . '">' . $thread['fname'] . ' ' . $thread['lname'] . '</a><br /><small><a href="javascript:;" class="fg-grayDark link">' . $thread['cname'] . '</a><span class="dot-center"></span><span title="' . $thread['timestamp'] . '">' . time_elapsed($thread['timestamp']) . '</span></small></p>';
                                            echo '</li>';
                                            echo '<li class="flt-right">';
                                            echo '<i class="fa fa-chevron-down fg-grayLighter pointer toggle-thread-options"></i>';
                                            echo '<div class="thread-options-dropdown-parent" style="display: none;position: relative;">';
                                            echo '<div class="dropdown thread-options-dropdown" style="right: 0;">';
                                            echo '<ul>';
                                            if($thread['track']){
                                                echo '<li class="fg-green" data-opt="untrack_thread"><a href="javascript:;"><i class="fa fa-check fa-fw"></i> Tracking this thread</a></li>';
                                            }
                                            else{
                                                echo '<li class="bg-white fg-gray" data-opt="track_thread"><a href="javascript:;"><i class="fa fa-binoculars fa-fw"></i> Track this thread</a></li>';
                                            }
                                            if($thread['reading']){
                                                echo '<li class="fg-green" data-opt="remove_from_list"><a href="javascript:;"><i class="fa fa-check fa-fw"></i> Added to reading list</a></li>';
                                            }
                                            else{
                                                echo '<li class="bg-white fg-gray" data-opt="add_to_list"><a href="javascript:;"><i class="fa fa-book fa-fw"></i> Add to reading list</a></li>';
                                            }
                                            echo '<li class="bg-white fg-gray" data-opt="delete_thread"><a href="javascript:;"><i class="fa fa-trash fa-fw"></i> Delete this thread</a></li>';
                                            echo '<li class="bg-white fg-gray rstoggle"><a href="javascript:;"><i class="fa fa-ban fa-fw"></i> Report as spam</a></li>';
                                            echo '</ul>';
                                            echo '</div>';
                                            echo '</div>';                                            
                                            echo '</li>';
                                            echo '</ul>';
                                            echo '</div>';
                                            if($thread['imagepath']!=""){
                                                echo '<div class="pure-u-1 thumbnail" style="background-image: url(\'' . userdata_url($thread['uid'], $thread['imagepath']) . '\');background-position:' . $thread['coordinates'] . '"></div>';
                                            }
                                            echo '<div class="pure-u-1 ttitle" style="padding: 10px 0;">';
                                            echo '<a href="' . base_url() . 'Thread/' . $thread['srno'] . '"><h3 class="black" style="color: rgba(0,0,0,0.8);">' . $thread['title'] . '</h3></a>';
                                            echo '</div>';
                                            if($thread['description']!='<p><br></p>'){
                                                echo '<div class="pure-u-1 thread-desc">';
                                                $desc = str_replace('<;','&lt;',$thread['description']);
                                                $desc = str_replace('>;','&gt;',$desc);
                                                echo $desc;
                                                echo '</div>';
                                            }
                                            if($thread['tags']){
                                                echo '<div class="pure-u-1" style="padding: 10px 0;">';
                                                foreach($thread['tags'] as $tag){
                                                    echo '<a href="Tag/' . $tag['name'] . '" class="tag">' . $tag['name'] . '</a>';
                                                }
                                                echo '</div>';
                                            }
                                            echo '<div class="pure-u-1 thread-stats">';
                                            echo '<p class="flt-left fg-grayLight">';
                                            if($thread['upvotes']==1){
                                                echo '<span style="padding-right: 20px;">' . $thread['upvotes'] . ' Upvote</span>';
                                            }
                                            else{
                                                echo '<span style="padding-right: 20px;">' . $thread['upvotes'] . ' Upvotes</span>';
                                            }
                                            if($thread['replies']==1){
                                                echo '<span style="padding-right: 20px;">' . $thread['replies'] . ' Reply</span> ';
                                            }
                                            else{
                                                echo '<span style="padding-right: 20px;">' . $thread['replies'] . ' Replies</span> ';
                                            }
                                            if($thread['views']==1){
                                                echo $thread['views'] . ' View</p>';
                                            }
                                            else{
                                                echo $thread['views'] . ' Views</p>';
                                            }
                                            echo '</div>';
                                            echo '</div>';
                                            echo '</li>';
                                        }
                                        echo '</ul>';
                                        echo '<div class="pure-u-1" style="border-top: 1px solid rgba(100,100,100,0.1);">';
                                        echo '<i class="fa fa-2x loader fg-cyan fa-circle-o-notch fa-spin" style="display:none;margin: 20px auto;"></i>';
                                        echo '<div class="load-more" data-opt="index" data-opt-val="">';
                                        echo '<a href="javascript:;">load more</a>';
                                        echo '<input type="hidden" class="lmt" value="' . $thread['timestamp'] . '"/>';
                                        echo '</div>';
                                        echo '</div>';
                                    }
                                    ?>
                                </div>
                            </div>
                            <div class="pure-u-1 pure-u-md-8-24 rightPane" style="background-color: #FbFbFb;box-shadow: -1px 0 1px -2px rgba(0,0,0,0.9);">
                                <div class="pure-g">
                                    <div class="pure-u-1">
                                        <div style="padding: 30px 0 10px 20px;">
                                            <p class="featured-tags-title">featured tags</p>
                                        </div>
                                        <div style="padding: 0px 20px;">
                                            <?php
                                            if($randomtags){
                                                foreach($randomtags as $randomtag){
                                                    echo '<a href="' . base_url() . 'Tag/' . $randomtag['name'] . '" class="tag">' . $randomtag['name'] . '</a>';
                                                }
                                            }
                                            else{
                                                echo '<p class="margin0">There are no tags to feature, yet!</p>';
                                            }
                                            ?>
                                        </div>
                                        <div style="padding: 20px;">
                                            <p class="featured-tags-title">Top threads</p>
                                        </div>
                                        <div class="featured-threads">
                                            <ul>
                                            <?php
                                            if($featuredthreads){
                                                foreach($featuredthreads as $ft){
                                                echo '<li>';
                                                foreach($ft['userinfo'] as $usr){
                                                    $avatarpath = $usr['avatarpath'];
                                                    $name = $usr['fname'] . ' ' . $usr['lname'];
                                                    $username = $usr['username'];
                                                }
                                                echo '<div class="round-count"><span class="star"><i class="fa fa-star fg-yellow"></i></span><span class="upvotecnt">' . $ft['upvotes'] .'</span></div>';
                                                echo '<div class="desc">';
                                                if(strlen($ft['title'])>35){
                                                    echo '<p class="thread-title margin0"><a href="' . base_url() . 'Thread/' . $ft['srno'] . '">' . substr($ft['title'],0,35) . '...</a></p>';
                                                }
                                                else{
                                                    echo '<p class="thread-title margin0"><a href="' . base_url() . 'Thread/' . $ft['srno'] . '">' . $ft['title'] . '</a></p>';
                                                }
                                                echo '<p class="thread-user margin0"><a href="' . $username . '">' . $name . '</a></p>';
                                                echo '</div>';
                                                echo '</li>';
                                                }
                                            }
                                            else{
                                                echo '<p class="margin0">There are no threads to feature, yet!</p>';
                                            }
                                            ?>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </body>
    <script src="<?php echo asset_url(); ?>js/jquery-2.1.3.min.js"></script>
    <script src="<?php echo asset_url(); ?>js/main.js"></script>
    <script src="<?php echo asset_url(); ?>js/index.js"></script>
    <script src="<?php echo asset_url(); ?>js/medium-editor.js"></script>
</html>