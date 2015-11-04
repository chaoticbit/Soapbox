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
        <link rel="stylesheet" href="<?php echo asset_url(); ?>css/profile.css" />
    </head>
    <body>
        <?php echo '<script>document.title = "' . $pinfo['name'] . '";</script>'; ?>
        <div class="pure-g">
            <?php include 'headbar.php'; ?>
            <div class="search-wrapper"></div>
            <?php 
                if($pinfo['coverpath']==''){
                    echo '<div class="bg-img" style="background: url(\'' . asset_url() . 'images/default-cover.jpg' . '\') repeat;">';
                }
                else{
                    echo '<div class="bg-img" style="background-image: url(\'' . userdata_url($pinfo['uid'], $pinfo['coverpath']) . '\');background-position:' . $pinfo['covercoordinates'] . '">';
                }
            ?>
                <div class="loader-bg" style="background:rgba(0,0,0,0.7);display: none;">
                    <i class="fa fa-circle-o-notch fa-spin center-icon cam"></i>
                </div>
                <input type="hidden" class="dupfilename" name="dupfilename" />
            </div>
            <?php
            if($pinfo['username'] == $username){
                echo '<button class="change-cover"><i class="fa fa-camera fa-fw"></i> Change cover</button>';
                echo '<div class="tips-cover" style="display:none;"><i class="fa fa-caret-right fa-2x fg-lightBlue top-caret"></i><div class="bg-lightBlue tip pure-u-1"><p class="fg-white bold txt-center margin0" style="font-size: 10pt;">Cover photo above 1200x400</p></div></div>';
                echo '<button class="save-cover bg-cyan" style="">Reposition and Save</button>';
                echo '<button class="cancel-cover bg-gray" style="top: 130px;width: 170.27px;">Cancel</button>';
                echo '<input type="file" accept="image/*" class="cover-image" name="cover-image" style="display:none;"/>';
            }
            ?>            
            <div class="container">
                <div class="pure-g" style="margin-top: 50px;box-shadow: 0px 0px 1px 1px rgba(63,63,63,0.1);z-index: 100 !important;position: relative;">
                    <div class="pure-u-1 bg-white" style="">
                        <div class="pure-g">
                            <div class="pure-u-1">
                                <div class="profile-avatar" style="background-image: url('<?php echo userdata_url($pinfo['uid'], $pinfo['avatarpath']); ?>');"></div>
                            </div>
                            <div class="pure-u-1 sinfo">
                                <h2 class="txt-center"><?php echo $pinfo['name']; ?></h2>
                                <?php if($pinfo['about']!=''){
                                    echo '<p class="txt-center serif-italic" style="font-size: 15pt;">&#8220;' . $pinfo['about']. ' &#8221;</p>';
                                }
                                ?>
                                <ul class="txt-center pstat">
                                    <li><span>Threads<br><?php echo $thread_count; ?></span></li>
                                    <li><span>Replies<br><?php echo $reply_count; ?></span></li>
                                </ul>
                            </div>
                            <div class="pure-u-1 pcontent" style="padding: 20px 40px;">
                                <div class="pure-g">
                                    <div class="pure-u-1 pure-u-md-1-5"></div>
                                    <div class="pure-u-1 pure-u-md-3-5">
                                        <p class="featured-tags-title">top threads</p>
                                        <div class="pure-g">
                                            <div class="pure-u-1 featured-threads" style="padding: 10px 0px;">
                                                <ul>
                                                <?php
                                                if($top_threads){
                                                    foreach($top_threads as $item){
                                                        echo '<li>';
                                                        foreach($item['userinfo'] as $usr){
                                                            $avatarpath = $usr['avatarpath'];
                                                            $name = $usr['fname'] . ' ' . $usr['lname'];
                                                            $username = $usr['username'];
                                                        }
                                                        echo '<div class="round-count"><span class="star"><i class="fa fa-star fg-yellow"></i></span><span class="upvotecnt">' . $item['upvotes'] .'</span></div>';
                                                        echo '<div class="desc">';
                                                        if(strlen($item['title'])>35){
                                                            echo '<p class="thread-title margin0"><a href="' . base_url() . 'Thread/' . $item['srno'] . '">' . substr($item['title'],0,35) . '...</a></p>';
                                                        }
                                                        else{
                                                            echo '<p class="thread-title margin0"><a href="' . base_url() . 'Thread/' . $item['srno'] . '">' . $item['title'] . '</a></p>';
                                                        }
                                                        echo '<p class="thread-user margin0"><a href="' . $username . '">' . $name . '</a></p>';
                                                        echo '</div>';
                                                        echo '</li>';
                                                    }
                                                }
                                                ?>
                                                </ul>
                                            </div>
                                        </div>
                                        <p class="featured-tags-title">top replies</p>
                                        <div class="pure-g">
                                            <div class="pure-u-1 featured-threads" style="padding: 10px 0px;">
                                                <ul>
                                                <?php
                                                if($top_replies){
                                                    foreach($top_replies as $item){
                                                        echo '<li>';
                                                        foreach($item['userinfo'] as $usr){
                                                            $avatarpath = $usr['avatarpath'];
                                                            $name = $usr['fname'] . ' ' . $usr['lname'];
                                                            $username = $usr['username'];
                                                        }
                                                        echo '<div class="round-count"><span class="star"><i class="fa fa-comments fg-green"></i></span><span class="upvotecnt">' . $item['upvotes'] .'</span></div>';
                                                        echo '<div class="desc">';
                                                        if(strlen($item['description']) > 35){
                                                            echo '<p class="thread-title margin0"><a href="' . base_url() . 'Thread/' . $item['tid'] . '/#r' . $item['srno'] . '">' . substr(strip_tags($item['description']),0,35) . '...</a></p>';
                                                        }
                                                        else{
                                                            echo '<p class="thread-title margin0"><a href="' . base_url() . 'Thread/' . $item['tid'] . '/#r' . $item['srno'] . '">' . strip_tags($item['description']) . '</a></p>';
                                                        }
                                                        echo '<p class="thread-user margin0"><a href="' . $username . '">' . $name . '</a></p>';
                                                        echo '</div>';
                                                        echo '</li>';
                                                    }
                                                }
                                                ?>
                                                </ul>
                                            </div>
                                        </div>
                                        <p class="featured-tags-title">personal info</p>
                                        <div class="pure-g">
                                            <div class="pure-u-1" style="padding: 10px 0px;">
                                                <?php
                                                foreach($get_personal_info as $item){
                                                    echo '<div class="pure-u-1">';
                                                    echo '<div class="pure-u-md-1-4 pure-u-8-24">';
                                                    echo '<p class="bold margin0 fg-grayDarker" style="padding: 10px 0;font-size: 13px;">GENDER</p>';
                                                    echo '</div>';
                                                    echo '<div class="pure-u-md-1-2 pure-u-16-24">';
                                                    if ($item['gender'] == 'm') {
                                                        echo '<p class="bold margin0 fg-gray" style="padding: 10px 0;font-size: 13px;">Male</p>';
                                                    } else {
                                                        echo '<p class="bold margin0 fg-gray" style="padding: 10px 0;font-size: 13px;">Female</p>';
                                                    }
                                                    echo'</div>';
                                                    echo '</div>';
                                                    echo '<div class="pure-u-1">';
                                                    echo '<div class="pure-u-md-1-4 pure-u-8-24">';
                                                    echo '<p class="bold margin0 fg-grayDarker" style="padding: 10px 0;font-size: 13px;">EMAIL</p>';
                                                    echo '</div>';
                                                    echo '<div class="pure-u-md-1-2 pure-u-16-24">';
                                                    echo '<p class="bold margin0 fg-gray" style="padding: 10px 0;font-size: 13px;">' . $item['email'] . '</p>';
                                                    echo '</div>';
                                                    echo '</div>';
                                                    if ($item['hometown'] != "") {
                                                        echo '<div class="pure-u-1">';
                                                        echo '<div class="pure-u-md-1-4 pure-u-8-24">';
                                                        echo '<p class="bold margin0 fg-grayDarker" style="padding: 10px 0;font-size: 13px;">HOMETOWN</p>';
                                                        echo '</div>';
                                                        echo '<div class="pure-u-md-1-2 pure-u-16-24">';
                                                        echo '<p class="bold margin0 fg-gray" style="padding: 10px 0;font-size: 13px;">' . $item['hometown'] . '</p>';
                                                        echo '</div>';
                                                        echo '</div>';
                                                    }
                                                    if ($item['city'] != "") {
                                                        echo '<div class="pure-u-1">';
                                                        echo '<div class="pure-u-md-1-4 pure-u-8-24">';
                                                        echo '<p class="bold margin0 fg-grayDarker" style="padding: 10px 0;font-size: 13px;">CURRENT CITY</p>';
                                                        echo '</div>';
                                                        echo '<div class="pure-u-md-1-2 pure-u-16-24">';
                                                        echo '<p class="bold margin0 fg-gray" style="padding: 10px 0;font-size: 13px;">' . $item['city'] . '</p>';
                                                        echo '</div>';
                                                        echo '</div>';
                                                    }
                                                    if ($item['profession'] != "") {
                                                        echo '<div class="pure-u-1">';
                                                        echo '<div class="pure-u-md-1-4 pure-u-8-24">';
                                                        echo '<p class="bold margin0 fg-grayDarker" style="padding: 10px 0;font-size: 13px;">PROFESSION</p>';
                                                        echo '</div>';
                                                        echo '<div class="pure-u-md-1-2 pure-u-16-24">';
                                                        echo '<p class="bold margin0 fg-gray" style="padding: 10px 0;font-size: 13px;">' . $item['profession'] . '</p>';
                                                        echo '</div>';
                                                        echo '</div>';
                                                    }
                                                    if ($item['education'] != "") {
                                                        echo '<div class="pure-u-1">';
                                                        echo '<div class="pure-u-md-1-4 pure-u-8-24">';
                                                        echo '<p class="bold margin0 fg-grayDarker" style="padding: 10px 0;font-size: 13px;">EDUCATION</p>';
                                                        echo '</div>';
                                                        echo '<div class="pure-u-md-1-2 pure-u-16-24">';
                                                        echo '<p class="bold margin0 fg-gray" style="padding: 10px 0;font-size: 13px;">' . $item['education'] . '</p>';
                                                        echo '</div>';
                                                        echo '</div>';
                                                    }
                                                    if ($item['college'] != "") {
                                                        echo '<div class="pure-u-1">';
                                                        echo '<div class="pure-u-md-1-4 pure-u-8-24">';
                                                        echo '<p class="bold margin0 fg-grayDarker" style="padding: 10px 0;font-size: 13px;">COLLEGE</p>';
                                                        echo '</div>';
                                                        echo '<div class="pure-u-md-1-2 pure-u-16-24">';
                                                        echo '<p class="bold margin0 fg-gray" style="padding: 10px 0;font-size: 13px;">' . $item['college'] . '</p>';
                                                        echo '</div>';
                                                        echo '</div>';
                                                    }
                                                    if ($item['school'] != "") {
                                                        echo '<div class="pure-u-1">';
                                                        echo '<div class="pure-u-md-1-4 pure-u-8-24">';
                                                        echo '<p class="bold margin0 fg-grayDarker" style="padding: 10px 0;font-size: 13px;">SCHOOL</p>';
                                                        echo '</div>';
                                                        echo '<div class="pure-u-md-1-2 pure-u-16-24">';
                                                        echo '<p class="bold margin0 fg-gray" style="padding: 10px 0;font-size: 13px;">' . $item['school'] . '</p>';
                                                        echo '</div>';
                                                        echo '</div>';
                                                    }
                                                }
                                                ?>
                                            </div>
                                        </div>
                                        <div class="pure-u-1" style="padding: 0 20px 0 0px;">
                                            <p class="featured-tags-title">timeline</p>
                                            <div class="pure-g">
                                                <div class="pure-u-1" style="padding: 10px 0px;">
                                                    <ul class="timeline">
                                                        <?php
                                                            if($timeline){
                                                                echo $timeline;
                                                            }
                                                        ?>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="pure-u-1" style="padding: 0 20px 0 0px;">
                                            <p class="featured-tags-title">Hidden Threads</p>
                                            <div class="pure-g">
                                                <div class="pure-u-1" style="padding: 10px 0px;">
                                                    <ul class="hdnul">
                                                        <?php
                                                        if($get_hidden_threads){
                                                            foreach($get_hidden_threads as $hdnthread){
                                                                echo '<li>';
                                                                echo '<div class="pure-g">';
                                                                echo '<div class="pure-u-1-6 pure-u-md-1-12">';
                                                                echo '<div class="avatar" style="background-image: url(' . base_url() . 'userdata/' .$hdnthread['uid'] .'/'. $hdnthread['avatarpath'] . ');"></div>';
                                                                echo '</div>';
                                                                echo '<div class="pure-u-5-6 pure-u-md-11-12">';
                                                                echo '<i class="fa fa-times flt-right unhindebtn fg-gray pointer" title="Unhide thread" data-opt="unhide_thread" data-tid="' . $hdnthread['srno']  .'"></i>';
                                                                echo '<p class="txt-left margin0" style=""><a href="' . base_url() . $hdnthread['username'] . '">' . $hdnthread['name'] . '</a> <br>' . $hdnthread['title'] .'</p>';
                                                                echo '</div>';
                                                                echo '</div>';
                                                                echo '</li>';
                                                            }
                                                        }
                                                        else{
                                                            echo '<li><div class="pure-g"><div class="pure-u-1"><p class="margin0">No hidden threads</p></div></div></li>';
                                                        }
                                                        ?>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="pure-u-1 pure-u-md-1-5"></div>
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
    <script src="<?php echo asset_url(); ?>js/profile.js"></script>
</html>