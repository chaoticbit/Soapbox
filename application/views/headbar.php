            <input type="hidden" class="hdnUserId" value="<?php echo $userid; ?>" />
            <input type="hidden" name="asset-url" value="<?php echo asset_url(); ?>" />
            <input type="hidden" id="baseurl" value="<?php echo base_url(); ?>" />
            <nav class="headbar pure-u-1" style="z-index: 999999;box-shadow: 0 1px 0px 0px rgba(0, 0, 0, .1);">
                <div class="pure-g">
                    <div class="pure-u-1-5 logo" style="background-image: url('<?php echo asset_url(); ?>images/logo.png');">
                        <h5 class="fg-black pointer noselect" onclick="window.location.href='<?php echo base_url(); ?>';">Soapbox</h5>
                    </div>
                    <div class="pure-u-1 pure-u-md-4-5 md45-headbar">
                        <div class="pure-g">
                            <div class="pure-u-1 pure-u-md-1-2" style="padding-top: 9px;position: relative;">
                                <!-- <a href="javascript:;" class="toggle-sidebar flt-left"><i class="fa fa-navicon fg-white"></i></a> -->
                                <a id="trigger-overlay" class="toggle-sidebar nav-toggle flt-left" aria-expanded="false" href="javascript:;"><span></span></a>
                                <input type="text" class="search" tabindex="-1" placeholder="Search Soapbox" autocomplete="off" autocorrect="off" spellcheck="false" />
                                <i class="fa fa-search fg-white search-prop"></i>
                                <div class="search-dropdown">
<!--                                <small style="font-size: 11px;padding-left: 20px;font-family: 'Open Sans Bold';">Recent Searches</small>-->
                                <ul>                                    
                                    
<!--                                    <li>
                                        <a href="javascript:;" style="">
                                            <div class="avatar flt-left" style="display: inline-block;height: 35px;background-image: url('<?php echo asset_url() ?>images/avatar_atharva.jpg');"></div>
                                            <span style="float: left;padding: 4px 0 6px 0;margin-left: 10px;">Atharva Dandekar</span>
                                        </a>
                                    </li>-->
                                </ul>
                                    <div class="search-all">
                                        <i class="fa fa-search fa-fw"></i> Search all
                                    </div>                                 
                                </div>
                            </div>
                            <div class="pure-u-1-2">
                                <div class="pure-g">
                                    <div class="pure-u-1-2 nav-actions">
                                        <ul>
                                            <li onclick="window.location.href ='<?php echo base_url(); ?>'" title="Home">
                                                <i class="fa fa-home fa-fw"></i>
                                            </li>                                            
                                            <li class="toggle-dropdown" title="Categories">
                                                <i class="fa fa-exchange fa-fw"></i>
                                                <ul class="nav-dropdown">
                                                    <div class="overflow-wrap">
                                                        <li style="padding: 5px 10px;border-bottom: 1px solid #ccc;">
                                                            <div class="pure-g">
                                                                <div class="pure-u-1-2">
                                                                    <p class="margin0 txt-left"><small><b><a id="order-categories" href="javascript:;">Order by following</a></b></small></p>
                                                                </div>
                                                                <div class="pure-u-1-2">
                                                                    <p class="margin0 txt-right"><small><b><a href="<?php echo base_url() ?>Categories">Open all categories</a></b></small></p>
                                                                </div>
                                                            </div>
                                                        </li>
                                                        <div class="order-alphabetical">
                                                        <?php
                                                        foreach ($categories_alphabetical as $category) {
                                                            echo '<li>';
                                                            echo '<div class="pure-g">';
                                                            echo '<div class="pure-u-1-3">';
                                                            echo '<div class="category-thumbnail" style="background-image: url(\'' . asset_url() . $category['imagepath'] . '\');"></div>';
                                                            echo '</div>';
                                                            echo '<div class="pure-u-2-3">';
                                                            echo '<p class="txt-left margin0">' . $category['name'] . ' ';
                                                            if($category['uid']==$userid){
                                                                echo '<i class="fa fa-check fg-green"></i></p>';
                                                                echo '<p class="txt-left margin0"><a href="javascript:;" class="update-cat" data-id="' . $category['srno'] . '" data-action="Unfollow">Unfollow</a> <i style="margin-left: 5px;display:none;" class="loader fa fa-circle-o-notch fa-spin"></i></p>';
                                                            }
                                                            else{
                                                                echo '<i></i></p>';
                                                                echo '<p class="txt-left margin0"><a href="javascript:;" class="update-cat" data-id="' . $category['srno'] . '" data-action="Follow">Follow</a> <i style="margin-left: 5px;display:none;" class="loader fa fa-circle-o-notch fa-spin"></i></p>';
                                                            }
                                                            echo '</div>';
                                                            echo '</div>';
                                                            echo '</li>';
                                                        }
                                                        ?>
                                                        </div>
                                                        <div class="order-following hidden">
                                                        <?php
                                                        foreach ($categories_following as $category) {
                                                            echo '<li>';
                                                            echo '<div class="pure-g">';
                                                            echo '<div class="pure-u-1-3">';
                                                            echo '<div class="category-thumbnail" style="background-image: url(\'' . asset_url() . $category['imagepath'] . '\');"></div>';
                                                            echo '</div>';
                                                            echo '<div class="pure-u-2-3">';
                                                            echo '<p class="txt-left margin0">' . $category['name'] . ' ';
                                                            if($category['uid']==$userid){
                                                                echo '<i class="fa fa-check fg-green"></i></p>';
                                                                echo '<p class="txt-left margin0"><a href="javascript:;" class="update-cat" data-id="' . $category['srno'] . '" data-action="Unfollow">Unfollow</a> <i style="margin-left: 5px;display:none;" class="loader fa fa-circle-o-notch fa-spin"></i></p>';
                                                            }
                                                            else{
                                                                echo '<i></i></p>';
                                                                echo '<p class="txt-left margin0"><a href="javascript:;" class="update-cat" data-id="' . $category['srno'] . '" data-action="Follow">Follow</a> <i style="margin-left: 5px;display:none;" class="loader fa fa-circle-o-notch fa-spin"></i></p>';
                                                            }
                                                            echo '</div>';
                                                            echo '</div>';
                                                            echo '</li>';
                                                        }
                                                        ?>
                                                        </div>                                                        
                                                        <!--                                                        
                                                        <div class="pure-g">
                                                            <div class="pure-u-1-3">
                                                                <div class="category-thumbnail" style="background-image: url('<?php echo asset_url() ?>categories/tvseries.jpg');"></div>
                                                            </div>
                                                            <div class="pure-u-2-3">
                                                                <p class="txt-left margin0">TV Shows <i class="fa fa-check fg-green"></i></p>
                                                                <p class="txt-left margin0"><a href="javascript:;">Unfollow</a></p>
                                                            </div>
                                                        </div>
                                                        -->
                                                    </div>
                                                </ul>                                                
                                            </li>
                                            <li class="toggle-dropdown">
                                                <i class="fa fa-history fa-fw" title="Reading List"></i>
                                                <ul class="nav-dropdown readinglist-dropdown">
                                                    <div class="overflow-wrap">
                                                        <li style="padding: 5px 10px;border-bottom: 1px solid #ccc;" class="headli">
                                                            <div class="pure-g">
                                                                <div class="pure-u-1-2">
                                                                    <?php
                                                                    if($readinglist){
                                                                        echo '<p class="margin0 txt-left"><small><b><a href="javascript:;">Mark all as read</a></b></small></p>';
                                                                        
                                                                    }
                                                                    else{
                                                                        echo '<p class="margin0 txt-left"><small class="fg-grayLight"><b>Mark all as read</b></small></p>';
                                                                    }
                                                                    ?>
                                                                </div>
                                                                <div class="pure-u-1-2">
                                                                    <p class="margin0 txt-right"><small><b><a href="<?php echo base_url(); ?>Readinglist/">Open Reading Mode</a></b></small></p>
                                                                </div>
                                                            </div>
                                                        </li>
                                                        <?php
                                                        if($readinglist){
                                                            foreach($readinglist as $item){
                                                                echo '<li class="jarl' . $item['srno'] . '">';
                                                                echo '<div class="pure-g">';
                                                                echo '<div class="pure-u-1">';
                                                                echo '<a href="' . base_url() .'Readinglist/' . $item['srno'] . '" style="display: block;"><p class="txt-left margin0"><small><b>' . $item['title'] . '</b></small></p></a>';
                                                                echo '</div>';
                                                                echo '</div>';
                                                                echo '</li>';
                                                            }
                                                        }
                                                        else{
                                                                echo '<li>';
                                                                echo '<div class="pure-g">';
                                                                echo '<div class="pure-u-1">';
                                                                echo '<p class="txt-left margin0"><small>There are no threads in your reading list.</small></p>';
                                                                echo '</div>';
                                                                echo '</div>';
                                                                echo '</li>';
                                                        }
                                                        ?>
                                                    </div>
                                                </ul>                                                
                                            </li>
                                            <li class="toggle-dropdown">
                                                <i class="fa fa-bell fa-fw" title="Notifications"></i>
                                                <span class="bubble"><?php if($nocount != '0') { echo $nocount; } else { echo ''; }?></span>
                                                <ul class="nav-dropdown notifications-dropdown">
                                                    <div class="overflow-wrap">
                                                        <li style="padding: 5px 10px;border-bottom: 1px solid #ccc;" class="fixedli">
                                                            <div class="pure-g">
                                                                <div class="pure-u-1-2">
                                                                    <p class="margin0 txt-left"><small><b><a href="javascript:;" class="mark-read">Mark all as read</a></b> <i class="fa fa-circle-o-notch loader fa-spin fg-gray" style="display:none;padding: 0 4px;"></i></small></p>
                                                                </div>
                                                                <div class="pure-u-1-2">
                                                                    <p class="margin0 txt-right"><small><b><a href="javascript:;">See all notifications</a></b></small></p>
                                                                </div>
                                                            </div>
                                                        </li>
                                                        <?php
                                                            if($notifications){
                                                                echo $notifications;
                                                            }
                                                            else{
                                                                echo '<p>No notifications :(</p>';
                                                            }
                                                        ?>
<!--                                                        <li>
                                                            <div class="pure-g">
                                                                <div class="pure-u-1-8">
                                                                    <div class="avatar" style="background-image: url('<?php echo asset_url() ?>images/avatar_mihir.jpg');"></div>
                                                                </div>
                                                                <div class="pure-u-7-8" style="padding-left: 10px;">
                                                                    <p class="txt-left margin0">Mihir Karandikar left a comment on your thread "How to upgrade apache?"</p>
                                                                </div>
                                                            </div>
                                                        </li> -->
                                                    </div>
                                                </ul>
                                            </li>
                                            <li onclick="window.location.href ='<?php echo base_url() . $username; ?>'" title="Profile">
                                                <i class="fa fa-user fa-fw"></i>
                                            </li>                                            
                                        </ul>
                                    </div>
                                    <div class="pure-u-1-2 nav-info">
                                        <ul class="flt-right toggle-dropdown">
                                            <li>
                                                <div class="avatar" style="background-image: url('<?php echo userdata_url($userid, $avatarpath); ?>');"></div>
                                            </li>
                                            <li>
                                                <span style="font-size: 10pt;"><?php echo $fname . ' ' . $lname; ?></span>
                                            </li>
                                            <li>
                                                <ul class="nav-dropdown navinfo">
                                                    <div class="overflow-wrap">
                                                        <ul>
                                                            <li><a class="fg-gray" href="<?php echo base_url(); ?>Settings" style="display:block;"><p class="margin0 fg-gray"><i class="fa fa-cog fa-fw"></i> Settings</p></a></li>
                                                            <li><a class="fg-gray" style="display:block;" href="<?php echo base_url(); ?>Logout"><p class="margin0 fg-gray"><i class="fa fa-sign-out fa-fw"></i> Logout</p></a></li>
                                                        </ul>
                                                    </div>
                                                </ul>                                                
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </nav>
            <nav class="headbar-mobile pure-u-1" style="z-index: 999999;box-shadow: 0 1px 2px 0px rgba(0, 0, 0, .2);">
                <span class="bubble-mobile"><?php if($nocount != '0') { echo $nocount; } else { echo '';} ?></span>
                <a class="toggle-sidebar nav-toggle flt-left" style="width: 10%;padding: 25px 15px;" aria-expanded="false" href="javascript:;"><span></span></a>                    
                <span class="flt-left fg-black txt-center" style="width: 80%;line-height: 50px;font-size: 21px;padding: 0px;"><span onclick="window.location.href ='<?php echo base_url(); ?>'">Soapbox</span></span>
                <a class="flt-left pointer txt-left" style="width: 10%;" href="<?php echo base_url();?>Search/refms1"><i class="fa fa-search fg-black fa-fw" style="line-height: 45px;padding: 1px 0px 1px 0;font-size: 21px;"></i></a>                    
            </nav>            
            <div class="sidebarwrapper">
                <div class="sidebar">
                    <div class="pure-g">
                        <div class="pure-u-3-4" style="background: #000;">
                            <ul>
                                <li onclick="window.location.href ='<?php echo base_url(); ?>'"><a href="javascript:;"><i class="fa fa-home fa-fw"></i> Home</a></li>
                                <li><a href="<?php echo base_url();?>Categories/m"><i class="fa fa-exchange fa-fw"></i> Categories</a></li>
                                <li><a href="<?php echo base_url(); ?>Readinglist/m"><i class="fa fa-history fa-fw"></i> Reading List</a></li>
                                <li><a href="<?php echo base_url(); ?>Notifications"><i class="fa fa-bell fa-fw"></i> Notifications <span class="bubble-mobile-float flt-right"><?php if($nocount != '0') { echo $nocount; } else{ echo '';} ?></span></a></li>
                                <li><a href="<?php echo base_url() . $username;?>"><i class="fa fa-user fa-fw"></i> Profile</a></li>
                                <li><a href="<?php echo base_url(); ?>Settings"><i class="fa fa-cog fa-fw"></i> Settings</a></li>
                                <li><a href="<?php echo base_url(); ?>Logout"><i class="fa fa-sign-out fa-fw"></i> Logout</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="beeper-wrapper">
                <audio id="beep" controls preload="auto" style="display: none;">
                    <source src="<?php echo asset_url() . 'ping.mp3'; ?>" type="audio/mp3">
                </audio>
                <ul>
<!--                    <li class="beeper">
                        <a href="">
                            <div class="pure-g">
                                <div class="pure-u-1-8">
                                    <div class="avatar" style="background-image: url('<?php echo asset_url() ?>images/avatar_mihir.jpg');"></div>
                                </div>
                                <div class="pure-u-7-8" style="padding-left: 10px;">
                                    <i class="fa fa-times fg-white flt-right close-beeper"></i>
                                    <p class="txt-left margin0 fg-white">Mihir Karandikar left a reply on your thread Awesome Song"</p>
                                </div>
                            </div>
                        </a>
                    </li>-->
                </ul>
            </div>