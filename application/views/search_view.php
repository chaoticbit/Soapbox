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
        <link rel="stylesheet" href="<?php echo asset_url(); ?>css/search.css" />
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
                        <div style="padding: 20px 30px;">
                            <h2 class="light">
                                <input type="text" placeholder="Search" class="search-all-input" value="<?php if($param!='index') echo $param; else echo ''; ?>" style="width: 100%;font-family: inherit!important;font-size: inherit;line-height: inherit;border:none;border-bottom: 1px solid rgba(235,235,235,0.7);" />
                            </h2>
                        </div>
                    </div>
                    <div class="pure-u-1">
                        <div style="padding: 10px 30px;">
                            <div class="pure-g">
                                <div class="pure-u-1-4 search-by-type">
                                    <ul>
                                        <li class="active s-all">
                                            <h6 class="light">All</h6>
                                        </li>
                                        <li class="s-ppl">
                                            <h6 class="light">Search by People</h6>
                                        </li>
                                        <li class="s-tags">
                                            <h6 class="light">Search by Tags</h6>
                                        </li>
                                        <li class="category-type-toggle">
                                            <h6 class="light">Search by Category</h6>
                                            <ul class="search-by-category-container">
                                                <?php 
                                                foreach ($categories_alphabetical as $category) {
                                                    echo '<li data-cid="' . $category['srno'] . '">' . $category['name'] . '</li>';
                                                }
                                                ?>
                                            </ul>
                                        </li>
                                    </ul>
                                </div>
                                <div class="pure-u-3-4">
                                    <div class="pure-g search--all-container">
<!--                                        <div class="pure-u-2-3">
                                            <p class="featured-tags-title">Threads</p>
                                            <div style="padding: 10px 0 10px 0;" class="search--threads">
                                                <ul>
                                                    <li class="pure-u-1 thread" data-tid="" style="padding: 0;border-bottom: 1px solid rgba(235,235,235,0.4);">
                                                        <div class="pure-g">
                                                            <div class="pure-u-1" style="margin-bottom: 0px;">
                                                                <ul>
                                                                    <li>
                                                                        <div class="avatar" style="background-image: url('<?php echo base_url() . 'assets/images/avatar_atharva.jpg' ?>');"></div>
                                                                    </li>
                                                                    <li style="padding-left: 10px;">
                                                                        <p><a href="javascript:;">Atharva Dandekar</a><br /><small><a href="javascript:;" class="fg-grayDark link">Music</a><span class="dot-center"></span>15 hours ago</small></p>
                                                                    </li>
                                                                </ul>
                                                            </div>
                                                            <div class="pure-u-1 pointer" style="padding: 0px 0;">
                                                               <h5 class="black" style="color: rgba(0,0,0,0.8);">Here comes the sun Little Darling</h5>
                                                            </div>
                                                            <div class="pure-u-1 pointer thread-desc">
                                                                <p class="serif">Little darling, it's been a long cold lonely winter
                                                                Little darling, it feels like years since it's been here
                                                                Here comes the sun, here comes the sun
                                                                And I say it's all right</p>
                                                            </div>
                                                            <div class="pure-u-1 thread-options">
                                                                <p class="flt-left fg-grayLight"><span style="padding-right: 20px;">13 Upvotes</span><span style="padding-right: 20px;">15 Replies</span>35 Views</p>
                                                            </div>
                                                        </div>
                                                    </li>                                                    
                                                </ul>
                                            </div>
                                        </div>-->
<!--                                        <div class="pure-u-1-3">
                                            <div class="search--tags" style="padding-left: 10px;max-height: 200px;">
                                                <p class="featured-tags-title">Tags</p>
                                                <div style="padding: 10px 0 10px 0;">
                                                    <a href="javascript:;" class="tag">iOS</a>
                                                    <a href="javascript:;" class="tag">Company Cribs</a>
                                                </div>
                                            </div>
                                            <div class="search--people" style="padding-left: 10px;max-height: 200px;">
                                                <p class="featured-tags-title">People</p>
                                                <div style="padding: 10px 0 10px 0;">
                                                    <ul>
                                                        <li>
                                                            <a class="fg-gray" href="javascript:;">
                                                                <div class="pure-g">
                                                                    <div class="pure-u-1-6 ">
                                                                        <div class="avatar" style="background-image: url('<?php echo base_url() . 'assets/images/avatar_atharva.jpg' ?>');"></div>
                                                                    </div>
                                                                    <div class="pure-u-5-6" style="padding-left: 5px;">
                                                                        <p class="txt-left margin0" style="line-height: 1.5;">Atharva Dandekar<br> <span class="fg-gray" style="font-size: 14px;line-height: 2;">sipps7</span></p>
                                                                    </div>
                                                                </div>
                                                            </a>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>-->
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
    <script src="<?php echo asset_url(); ?>js/search.js"></script>  
</html>

