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
                    <div class="pure-u-1">
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
                                echo '<h2 class="black" style="color: rgba(0,0,0,0.8);">' . $thread['title'] . '</h2>';
                                echo '</div>';
                                echo '<div class="pure-u-1 thread-desc">' . $thread['description'] . '</div>';
                                if ($thread['tags']) {
                                    echo '<div class="pure-u-1" style="padding: 10px 0;">';
                                    foreach ($thread['tags'] as $tag) {
                                        echo '<a href="' . base_url() . 'Tag/' . $tag['name'] . '" class="tag">' . $tag['name'] . '</a>';
                                    }
                                    echo '</div>';
                                }
                                echo '<div class="pure-u-1 thread-stats">';
                                echo '<p class="flt-left fg-grayLight"><span class="pointer" style="margin-right: 20px;">' . $thread['upvotes'] . ' Upvotes</span><span class="pointer" style="margin-right: 20px;">' . $thread['replies'] . ' Replies</span><span class="pointer">' . $thread['views'] . ' Views</span></p>';
                                echo '</div>';
                                echo '</div>';
                                echo '</li>';
                                echo '</ul>';
                                echo '<div class="pure-u-1 nxt-thread-toggle bg-cyan" data-tid="' . $secondthread['srno'] . '" data-next="2"><p class="fg-white margin0">' . substr($secondthread['title'],0,30) . ' <i class="fa fa-angle-right fa-fw flt-right"></i></p></div>';
                            } 
                            else{
                                echo '<div class="pure-u-1"><h4 class="light txt-center">No threads found :(</h4></div>';
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

