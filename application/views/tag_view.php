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
                                    <div class="pure-u-1 no-content-note" style="padding: 20px 0 0 20px;">
                                        <p class="margin0 fg-grayLight"><small>posts tagged as</small></p>
                                        <h3 class="light"><?php echo $param; ?></h3>
                                    </div>
                                    <?php
                                    if(!$threads){
                                        echo '<div class="pure-u-1 no-content-note">';
                                        echo '<h3 class="fg-grayLight light txt-center" style="padding: 20px;">No threads found</h3>';
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
                                            echo '<p><a href="' . base_url() . $thread['username'] . '">' . $thread['fname'] . ' ' . $thread['lname'] . '</a><br /><small><a href="javascript:;" class="fg-grayDark link">' . $thread['cname'] . '</a><span class="dot-center"></span>' . time_elapsed($thread['timestamp']) . '</small></p>';
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
                                                echo '<div class="pure-u-1 thumbnail pointer" style="background-image: url(\'' . userdata_url($thread['uid'], $thread['imagepath']) . '\');background-position:' . $thread['coordinates'] . '"></div>';
                                            }
                                            echo '<div class="pure-u-1 pointer ttitle" style="padding: 10px 0;">';
                                            echo '<a href="' . base_url() . 'Thread/' . $thread['srno'] . '"><h3 class="black" style="color: rgba(0,0,0,0.8);">' . $thread['title'] . '</h3><a/>';
                                            echo '</div>';
                                            if($thread['description']!='<p><br></p>'){
                                                echo '<div class="pure-u-1 pointer thread-desc">';
                                                echo '<a href="' . base_url() . 'Thread/' . $thread['srno'] . '">';
                                                $desc = str_replace('<;','&lt;',$thread['description']);
                                                $desc = str_replace('>;','&gt;',$desc);
                                                $desc = preg_replace('/(<[^>]+) style=".*?"/i', '$1', $desc);
                                                echo $desc;
                                                echo '</a>';
                                                echo '</div>';
                                            }
                                            if($thread['tags']){
                                                echo '<div class="pure-u-1" style="padding: 10px 0;">';
                                                foreach($thread['tags'] as $tag){
                                                    echo '<a href="' . base_url() .'Tag/'. $tag['name'] . '" class="tag">' . $tag['name'] . '</a>';
                                                }
                                                echo '</div>';
                                            }
                                            echo '<div class="pure-u-1 thread-stats">';
                                            echo '<p class="flt-left fg-grayLight"><span style="padding-right: 20px;">' . $thread['upvotes'] . ' Upvotes</span><span style="padding-right: 20px;">' . $thread['replies'] . ' Replies</span> ' . $thread['views'] . ' Views</p>';
                                            echo '</div>';
                                            echo '</div>';
                                            echo '</li>';
                                        }
                                        echo '</ul>';
                                        if($thread['numrows']>=10){
                                            echo '<div class="pure-u-1" style="border-top: 1px solid rgba(100,100,100,0.1);">';
                                            echo '<i class="fa fa-2x loader fg-cyan fa-circle-o-notch fa-spin" style="display:none;margin: 20px auto;"></i>';
                                            echo '<div class="load-more" data-opt="tag" data-opt-val="' . $param . '">';
                                            echo '<a href="javascript:;">load more</a>';
                                            echo '<input type="hidden" class="lmt" value="' . $thread['timestamp'] . '"/>';
                                            echo '</div>';
                                            echo '</div>';
                                        }
                                    }
                                    ?>
                                </div>
                            </div>
                            <div class="pure-u-1 pure-u-md-8-24 rightPane" style="background-color: #FbFbFb;box-shadow: -1px 0 1px -2px rgba(0,0,0,0.9);">
                                <div class="pure-g">
                                    <div class="pure-u-1">
                                        <div style="padding: 20px;">
                                            <p class="featured-tags-title">related tags</p>
                                        </div>
                                        <div style="padding: 0px 20px;">
                                            <?php
                                            if($randomtags){
                                                foreach($randomtags as $randomtag){
                                                    echo '<a href="' . base_url() . 'Tag/' . $randomtag['name'] . '" class="tag">' . $randomtag['name'] . '</a>';
                                                }
                                            }
                                            ?>
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