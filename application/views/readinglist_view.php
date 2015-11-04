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
        <link rel="stylesheet" href="<?php echo asset_url(); ?>css/readinglist.css" />
    </head>
    <body>
        <div class="pure-g">
            <?php include 'headbar.php'; ?>
            <div class="progress"></div>
            <div class="filler"></div>            
            <div class="search-wrapper"></div>
            <div class="container">
                <div class="pure-g">
                    <div class="pure-u-1-4 readingpane" style="position: fixed;left: 0;top: 50px;background: #fbfbfb;height: 100%;">
                        <div class="pure-u-1" style="padding: 15px;">
                            <h6 class="light" style="letter-spacing: 1px;">READING LIST</h6>
                        </div>
                        <div class="pure-u-1">
                            <ul class="list">
                                <?php
                                if ($readinglist) {
                                    foreach ($readinglist as $item) {
                                        if ($item['srno'] == $param) {
                                            echo '<li class="active" data-tid="' . $item['srno'] . '">';
                                        } else {
                                            echo '<li class="" data-tid="' . $item['srno'] . '">';
                                        }
                                    if(strlen($item['title']) > 35){
                                        echo '<p>' . substr($item['title'], 0, 35) . '...</p>';
                                    }
                                    else{
                                        echo '<p>' . $item['title'] . '</p>';
                                    }
                                        echo '</li>';
                                    }
                                }
                                else{
                                    echo '<p style="padding: 10px;">You don\'t have anything in your list.</p>';
                                }
                                ?>
                            </ul>
                        </div>                        
                    </div>
                </div>                
                <div class="pure-g">
                    <div class="pure-u-1-4" style="background: #fbfbfb;">
                    </div>
                    <div class="pure-u-1-2">
                        <div class="pure-g readingparent"> 
                            <?php
                            if ($thread) {
                                echo '<ul>';
                                echo '<li class="pure-u-1 thread" data-tid="' . $thread['srno'] . '">';
                                echo '<div class="pure-g">';
                                echo '<div class="pure-u-1">';
                                echo '<ul>';
                                echo '<li class="pure-u-1">';
                                echo '<div class="pure-g">';
                                echo '<div class="pure-u-1" style="margin-bottom: 10px;">';
                                echo '<ul>';
                                echo '<li>';
                                echo '<div class="avatar" style="background-image: url(' . userdata_url($thread['uid'], $thread['avatarpath']) . ');"></div>';
                                echo '</li>';
                                echo '<li style="padding-left: 10px;">';
                                echo '<p><a href="javascript:;">' . $thread['name'] . '</a><br /><small><a href="javascript:;" class="fg-grayDark link">' . $thread['cname'] . '</a><span class="dot-center"></span>' . time_elapsed($thread['timestamp']) . '</small></p>';
                                echo '</li>';
                                echo '</ul>';
                                echo '</div>';
                                echo '</div>';
                                echo '</li>';
                                echo '</ul>';
                                echo '</div>';
                                if ($thread['imagepath'] != '') {
                                    echo '<div class="pure-u-1 thumbnail pointer" style="background-image: url(\'' . userdata_url($thread['uid'], $thread['imagepath']) . '\');background-position:' . $thread['coordinates'] . '"></div>';
                                }
                                echo '<div class="pure-u-1 ttitle" style="padding: 10px 0;">';
                                echo '<a href="' . base_url() . 'Thread/' . $thread['srno'] . '"><h2 class="black" style="color: rgba(0,0,0,0.8);">' . $thread['title'] . '</h2></a>';
                                echo '</div>';
                                echo '<div class="pure-u-1 thread-desc">';
                                $desc = str_replace('<;','&lt;',$thread['description']);
                                $desc = str_replace('>;','&gt;',$desc);
                                $desc = preg_replace('/(<[^>]+) style=".*?"/i', '$1', $desc);
                                echo $desc;
                                echo '</div>';
                                if ($thread['tags']) {
                                    echo '<div class="pure-u-1" style="padding: 10px 0;">';
                                    foreach ($thread['tags'] as $tag) {
                                        echo '<a href="' . base_url() . 'Tag/' . $tag['name'] . '" class="tag">' . $tag['name'] . '</a>';
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
                                echo '</ul>';
                            } 
                            else {
                                echo '<div class="pure-u-1" style="padding: 20px 30px;"><h4 class="light fg-gray">No thread selected</h4></div>';
                            }
                            ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </body>
    <script src="<?php echo asset_url(); ?>js/jquery-2.1.3.min.js"></script>
    <script src="<?php echo asset_url(); ?>js/main.js"></script>  
    <script src="<?php echo asset_url(); ?>js/readinglist.js"></script>  
</html>

