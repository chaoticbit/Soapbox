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
        <link rel="stylesheet" href="<?php echo asset_url(); ?>css/thread.css" />
    </head>
    <body>
        <div class="pure-g">
            <?php include 'headbar.php'; ?>
            <div class="filler"></div>            
            <div class="search-wrapper"></div>
            <div class="container">
                <div class="pure-g">
                    <div class="pure-u-1 pure-u-md-1-5"></div>
                    <div class="pure-u-1 pure-u-md-3-5">
                        <ul style="border-bottom: 1px solid rgba(235,235,235,0.5);">
                            <li class="pure-u-1 thread" data-tid="<?php echo $thread['srno'] ?>">
                                <div class="pure-g">
                                    <div class="pure-u-1">
                                        <ul>
                                            <li class="pure-u-1">
                                                <div class="pure-g">
                                                    <div class="pure-u-1" style="margin-bottom: 10px;">
                                                        <ul>
                                                            <li>
                                                                <div class="avatar" style="background-image: url('<?php echo userdata_url($thread['uid'], $thread['avatarpath']); ?>');"></div>
                                                            </li>
                                                            <li style="padding-left: 10px;">
                                                                <p><a href="<?php echo base_url() . $thread['username']; ?>"><?php echo $thread['name']; ?></a><br /><small><a href="javascript:;" class="fg-grayDark link"><?php echo $thread['cname']; ?></a><span class="dot-center"></span><span title="<?php echo $thread['timestamp']; ?>"><?php echo time_elapsed($thread['timestamp']); ?></span><span title="<?php echo $thread['timestamp']; ?>"><?php if($thread['edit']=="1"){echo '<span class="dot-center edit-history link"></span> <a href="javascript:;" class="edit-history fg-grayDark link">Edited</a>';} ?></span></small></p>
                                                            </li>
                                                            <li class="flt-right">
                                                                <i class="fa fa-chevron-down fg-grayLighter pointer toggle-thread-options"></i>
                                                                <div class="thread-options-dropdown-parent" style="display: none;position: relative;">
                                                                    <div class="dropdown thread-options-dropdown" style="right: 0;">
                                                                        <ul>
                                                                            <?php
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
                                                                            if($userid==$thread['uid']){
                                                                                echo '<li class="bg-white fg-gray" data-opt="delete_thread"><a href="javascript:;"><i class="fa fa-trash fa-fw"></i> Delete this thread</a></li>';
                                                                                echo '<li class="bg-white fg-gray edit-toggle" data-opt="edit_thread"><a href="javascript:;"><i class="fa fa-edit fa-fw"></i> Edit this thread</a></li>';
                                                                            }
                                                                            if($userid!=$thread['uid']){
                                                                                echo '<li class="bg-white fg-gray rstoggle" data-opt="hide_thread"><a href="javascript:;"><i class="fa fa-ban fa-fw"></i> Hide this thread</a></li>';
                                                                            }
                                                                            ?>
                                                                        </ul>
                                                                    </div>
                                                                </div>                                            
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </li>
                                        </ul>
                                    </div>
                                    <?php
                                    if($thread['imagepath']){
                                        echo '<div class="pure-u-1 thumbnail pointer" data-image="' . userdata_url($thread['uid'], $thread['imagepath']) . '" style="background-image: url(\'' . userdata_url($thread['uid'], $thread['imagepath']) . '\');background-position:' . $thread['coordinates'] . '"></div>';
                                    }
                                    ?>
                                    <div class="pure-u-1 ttitle" style="padding: 10px 0;">
                                        <h2 class="black" style="color: rgba(0,0,0,0.8);"><?php echo $thread['title'] ?></h2>
                                    </div>
                                    <div class="pure-u-1 thread-desc">
                                        <?php 
                                        $desc = str_replace('<;','&lt;',$thread['description']);
                                        $desc = str_replace('>;','&gt;',$desc);
                                        $desc = preg_replace('/(<[^>]+) style=".*?"/i', '$1', $desc);
                                        echo $desc;
                                        ?>
                                    </div>
                                    <textarea class="duptarea-edit hidden" value=""></textarea>
                                    <?php
                                    if($thread['tags']){
                                        echo '<div class="pure-u-1 div-tags" style="padding: 10px 0;">';
                                        foreach($thread['tags'] as $tag){
                                            echo '<a href="' . base_url() . 'Tag/' . $tag['name'] . '" class="tag">' . $tag['name'] . '</a>';
                                        }
                                        echo '</div>';                                                                            
                                    }
                                    ?>
                                    <div class="pure-u-1 thread-stats">
                                        <div class="pure-g">
                                            <div class="inner-thread-stats">
                                                <div class="pure-u-1 pure-u-md-1-2">
                                                    <?php
                                                    if($thread['up_flag']){
                                                        echo '<p class="upvote-action"><span id="rm-upvote-thread" class="margin0 bg-cyan fg-white bold pointer" data-tid="' . $thread['srno'] . '" data-uid="' . $thread['uid']. '"><i class="fa fa-star"></i> You have upvoted</span> ';
                                                    }
                                                    else{
                                                        echo '<p class="upvote-action"><span id="upvote-thread" class="margin0 bg-grayLighter fg-grayLight bold pointer" data-tid="' . $thread['srno'] . '" data-uid="' . $thread['uid']. '"><i class="fa fa-star"></i> Upvote this thread</span> ';
                                                    }
                                                    ?>
                                                    <i style="margin-left: 5px;display:none;" class="loader fa fa-circle-o-notch fa-spin"></i></p>
                                                </div>
                                                <div class="pure-u-1 pure-u-md-1-2">
                                                    <p class="fg-grayLight stats-span stats-desktop" style="text-align: right;"><span class="pointer upvotes-to-thread"><?php echo ($thread['upvotes'] > 1 || $thread['upvotes']==0) ? $thread['upvotes'] . ' Upvotes' : $thread['upvotes'] . ' Upvote' ?></span><span><?php echo ($thread['replies'] > 1 || $thread['replies']==0) ? $thread['replies'] . ' Replies' : $thread['replies'] . ' Reply' ?></span><span class="pointer views-to-thread"><?php echo ($thread['views'] > 1 || $thread['views']==0) ? $thread['views'] . ' Views' : $thread['views'] . ' View' ?></span></p>
                                                    <p class="fg-grayLight stats-span stats-mobile txt-center" style="display: none;"><span class="pointer upvotes-to-thread"><i class="fa fa-star-o"></i> <?php echo $thread['upvotes']; ?></span> <span><i class="fa fa-comment-o"></i> <?php echo $thread['replies']; ?></span> <span class="pointer views-to-thread"><i class="fa fa-rss"></i> <?php echo $thread['views']; ?></span></p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>                                    
                                </div>
                            </li>
                        </ul>
                        <div class="pure-g reply-post-box">
                            <div class="pure-u-1 new-thread-button">
                                <ul>
                                    <li>
                                        <span class="serif fg-grayLight toggle-editor">Write a response...</span>
                                    </li>
                                </ul>
                            </div>
                            <div class="pure-u-1 editable-wrapper" id="editable-wrapper" style="border-bottom: 1px solid rgba(235,235,235,0.3);">
                                <div class="pure-g">
                                    <div class="pure-u-1" style="margin-bottom: 10px;">
                                        <ul>
                                            <li style="display: inline-block;vertical-align: middle;">
                                                <div class="avatar" style="background-image: url('<?php echo userdata_url($userid, $avatarpath); ?>');"></div>
                                            </li>
                                            <li style="display: inline-block;vertical-align: middle;padding-left: 10px;">
                                                <p><a href="javascript:;"><?php echo $fname . ' ' . $lname; ?></a><br /><small>drafting now<span class="dot">.</span><span class="dot">.</span><span class="dot">.</span></small></p>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="pure-u-1">
                                    <div class="editable" id="editable" data-text="Start writing here..."></div>                                               
                                    <textarea class="duptarea hidden"></textarea>
                                </div>
                                <div class="pure-g" style="padding: 5px 0;">
                                    <div class="pure-u-1 pure-u-md-1-2"></div>
                                    <div class="pure-u-1 pure-u-md-1-2 txt-right">
                                        <i style="margin: 2px 5px;display:none;" class="loader fa fa-circle-o-notch fa-spin"></i>
                                        <small class="fg-grayLight untoggle-editor pointer" style="margin-right: 10px;">Cancel</small>
                                        <button class="btn-post">REPLY</button>
                                    </div>
                                </div>
                            </div>
                            <?php
                            echo '<div class="pure-u-1 replies">';
                            if($replies){
                                echo '<div class="pure-u-1" style="padding: 15px 20px;">';
                                echo '<p class="bold" style="border-bottom: 1px solid rgba(0,0,0,0.05);padding-bottom: 5px;">REPLIES</p>';
                                echo '</div>';
                            }                            
                            echo '<ul>';                            
                            if($replies){
                                foreach($replies as $reply){
                                    echo '<li class="pure-u-1 reply" id="r' . $reply['srno'] . '" data-rid="' . $reply['srno'] . '">';
                                    echo '<div class="pure-g">';
                                    echo '<div class="pure-u-1 reply-owner">';
                                    echo '<ul>';
                                    echo '<li>';
                                    echo '<div class="avatar" style="background-image: url(\'' . userdata_url($reply['uid'], $reply['avatarpath']) . '\');"></div>';
                                    echo '</li>';
                                    echo '<li style="padding-left: 10px;">';
                                    echo '<p><a href="' . base_url() . $reply['username'] . '">' . $reply['name'] . '</a><br /><small title="' . $reply['timestamp'] . '"><span style="margin-right: 5px;">' . time_elapsed($reply['timestamp']) . '</span> ';
                                    if($thread['uid']==$userid){
                                        if($reply['correct']==1){
                                            echo '<span class="fg-green pointer remove-correct"><i class="fa fa-check-circle"></i> Correct</span>';
                                        } 
                                        else{
                                            echo '<span class="fg-grayLight pointer mark-correct">Mark correct</span>';
                                        }
                                    }
                                    else{
                                        if($reply['correct']==1){
                                            echo '<span class="fg-green"><i class="fa fa-check-circle"></i> Correct</span>';
                                        } 
                                    }                                    
                                    echo '</small></p>';
                                    echo '</li>';
                                    if($reply['uid']==$userid || $thread['uid']==$userid){
                                        echo '<li class="flt-right">';
                                        echo '<i class="fa fa-remove pointer reply-remove"></i>';
                                        echo '</li>';
                                    }
                                    echo '</ul>';
                                    echo '</div>';
                                    echo '<div class="pure-u-1 reply-desc thread-desc">';
                                    echo $reply['description'];                                    
                                    echo '</div>';
                                    echo '<div class="pure-u-1">';
                                    echo '<div class="pure-g">';
                                    echo '<div class="pure-u-1-4">';
                                    echo '<p>';
                                    if($reply['upvote_flag']){
                                        echo '<a id="rm-upvote-reply" href="javascript:;">You upvoted!</a> <i style="display:none;margin-left: 5px;" class="loader fa fa-circle-o-notch fa-spin"></i></p>';
                                    }
                                    else{
                                        echo '<a id="upvote-reply" href="javascript:;">Upvote</a> <i style="display:none;margin-left: 5px;" class="loader fa fa-circle-o-notch fa-spin"></i></p>';
                                    }
                                    echo '</div>';
                                    echo '<div class="pure-u-3-4">';
                                    echo '<p class="txt-right">';
                                    if($reply['upvotes']){
                                        echo '<span style="margin-right: 5px;" class="reply-upvote-count fg-grayLight"><i class="fa fa-fw fa-star-o"></i> ' . $reply['upvotes'] . '</span> ';
                                    }
                                    else{
                                        echo '<span style="margin-right: 5px;" class="reply-upvote-count fg-grayLight"><i class="fa fa-fw fa-star-o"></i> 0</span> ';
                                    }
                                    if($reply['comments']){
                                        echo '<span style="margin-right: 5px;" class="reply-comment-count fg-grayLight"><i class="fa fa-fw fa-comments-o"></i> ' . count($reply['comments']) . '</span> ';
                                    }
                                    else{
                                        echo '<span style="margin-right: 5px;" class="reply-comment-count fg-grayLight"><i class="fa fa-fw fa-comments-o"></i> 0</span> ';
                                    }
                                    echo '<a class="toggle-comments" href="javascript:;" data-status="expand">Expand <i class="fa fa-angle-down"></i></a>';                                    
                                    echo '</p>';
                                    echo '</div>';
                                    echo '</div>';
                                    echo '<div class="pure-u-1 reply-comments" style="display: none;padding-left: 20px;">';
                                    echo '<div class="pure-g">';
                                    echo '<div class="pure-u-1">';
                                    echo '<input type="text" class="reply-comment-input" placeholder="add a comment" />';
                                    echo '<ul class="comments">';                                    
                                    if($reply['comments']){

                                        foreach($reply['comments'] as $comment){
                                            echo '<li class="reply-comment" data-rrid="' . $comment['srno'] . '">';
                                            echo '<span>';
                                            echo $comment['description'] . ' –<a href="javascript:;">' . $comment['name'] . '</a> ' . time_elapsed($comment['timestamp']);
                                            echo '</span>';
                                            if($userid==$comment['uid']){
                                                echo '<i class="fa fa-remove pointer comment-remove"></i>';
                                            }
                                            echo '</li>';
                                        }
                                    }
                                    echo '</ul>';                                    
                                    echo '</div>';
                                    echo '</div>';
                                    echo '</div>';
                                    echo '</div>';
                                    echo '</li>';
                                }
                            }
                            echo '</ul>';
                            echo '</div>';                            
                            ?>
                        </div>
                    </div>
                    <div class="pure-u-1 pure-u-md-1-5"></div>
                </div>
            </div>
        </div>
    </body>
    <script src="<?php echo asset_url(); ?>js/jquery-2.1.3.min.js"></script>
    <script src="https://cdn.socket.io/socket.io-1.4.5.js"></script>
    <script src="<?php echo asset_url(); ?>js/main.js"></script>
    <script src="<?php echo asset_url(); ?>js/thread.js"></script>
    <script src="<?php echo asset_url(); ?>js/medium-editor.js"></script>    
</html>
