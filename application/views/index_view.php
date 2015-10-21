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
<!--        <link rel="stylesheet" href="<?php echo asset_url(); ?>css/responsive.css" />-->
        <link rel="stylesheet" href="<?php echo asset_url(); ?>css/medium-editor.css" />
        <link rel="stylesheet" href="<?php echo asset_url(); ?>css/index.css" />
    </head>
    <body>
        <div class="beeper-wrapper">
            <audio id="beep" controls preload="auto" style="display: none;">
<!--                <source src="ping.mp3" type="audio/mp3">
                <source src="ping.mp4" type="audio/mp4">-->
            </audio>
            <ul>
            </ul>
        </div>
        <div class="headbar" style="background-color: #2d2e32;">
            <div class="pure-g" style="height: 100%;">
                <div class="pure-u-1-6 headlogo" style="">
                    <div class="logo pointer">
                        <h4 class="margin0 light fg-white"><b>SOAP</b>BOX</h4>
                    </div>
                </div>
                <div class="pure-u-1 pure-u-md-5-6 ">
                    <div class="pure-u-1 pure-u-md-19-24">
                        <div class="pure-u-1 pure-u-md-2-3" style="padding: 6px 10px 6px 10px;">
                            <a href="javascript:;" class="fa fa-navicon toggleSidebar"></a>
                            <input type="text" class="search" placeholder="SEARCH" />
                            <div class="searchparentdropdown" style="display: none;">
                            <div class="dropdownarrow"></div>
                            <div class="pure-u-1 searchdropdown dropdown fg-gray">
                                <ul>
                                    <li class="heading">Threads</li>
                                    <li><a href="#">Steve Jobs iPod</a></li>
                                    <li><a href="#">Steve Jobs iPod</a></li>
                                    <li class="heading">Users</li>
                                    <li class="srchusersli">
                                        <a href="#">
                                            <div class="searchthumbpic" style="background: url('<?php echo asset_url(); ?>images/avatar_atharva.jpg') no-repeat;"></div>
                                            <span>Atharva Dandekar</span>
                                        </a>
                                    </li>
                                    <li class="srchusersli">
                                        <a href="#">
                                            <div class="searchthumbpic" style="background: url('<?php echo asset_url(); ?>images/avatar_mihir.jpg') no-repeat;"></div>
                                            <span>Mihir Karandikar</span>
                                        </a>
                                    </li>
                                    <li class="heading">Tags</li>
                                    <li class="srchtagli">
                                        <a href="#"><div class="featured-tag">iPod</div></a>
                                        <a href="#"><div class="featured-tag">iOS</div></a>
                                        <a href="#"><div class="featured-tag">SteveJobs</div></a>
                                    </li>
                                </ul>
                            </div>
                            </div>
                        </div>
                        <div class="pure-u-7-24 interactives" style="padding: 3px 0px 5px 15px;">
                            <ul class="navli">
                                <li><i class="fa fa-th-large head-nav-icon" aria-hidden="false"></i></li>
                                <li><i class="fa fa-book head-nav-icon"></i></li>
                                <li><i class="fa fa-bell head-nav-icon" aria-hidden="false"></i></li>
                                <li><i class="fa fa-pencil head-nav-icon newThreadNavIcon"></i></li>
                            </ul>
                            <div class="categoryparentdropdown" style="display: none;">
                                <div class="dropdownarrow" style="margin: 38px 0 0 326px;"></div>
                                <div class="pure-u-1 categorydropdown dropdown fg-gray" style="margin-top: 10px;width: 260px;">
                                    <ul>
                                        <li class="">
                                            <a href="#">
                                                <div class="categorythumbpic" style="background: url('categories/books.jpg') no-repeat;"></div>
                                                <span>BOOKS</span>
    <!--                                            <span><i class="fa fa-plus-square-o fg-gray flt-right" style="font-size: 20px;line-height: 2;"></i></span>-->
                                            </a>
                                        </li>
                                        <li class="">
                                            <a href="#">
                                                <div class="categorythumbpic" style="background: url('categories/cooking.jpg') no-repeat;"></div>
                                                <span>COOKING</span>
                                            </a>
                                        </li>
                                        <li class="">
                                            <a href="#">
                                                <div class="categorythumbpic" style="background: url('categories/technology.jpg') no-repeat;"></div>
                                                <span>technology</span>
                                            </a>
                                        </li>
                                        <li class="">
                                            <a href="#">
                                                <div class="categorythumbpic" style="background: url('categories/program.jpg') no-repeat;"></div>
                                                <span>programming</span>
                                            </a>
                                        </li>
                                        <li class="">
                                            <a href="#">
                                                <div class="categorythumbpic" style="background: url('categories/tvseries.jpg') no-repeat;"></div>
                                                <span>tv shows</span>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="notifyparentdropdown" style="display: none;">
                                <div class="dropdownarrow" style="margin: 38px 0 0 439px;"></div>
                                <div class="pure-u-1 notificationdropdown dropdown fg-gray" style="margin-top: 10px;width: 260px;">
                                    <ul>
                                        <li class="">
                                            <a href="#">
                                                <div class="thumbpic" style="background: url('<?php echo asset_url(); ?>images/avatar_mihir.jpg') no-repeat;"></div>
                                                <span>Mihir Karandikar left a reply on your thread</span>
                                            </a>
                                        </li>
                                        <li class="">
                                            <a href="#">
                                                <div class="thumbpic" style="background: url('<?php echo asset_url(); ?>images/avatar_mihir.jpg') no-repeat;"></div>
                                                <span>Mihir Karandikar left a reply on your thread</span>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="pure-u-1-5 headlast" style="width: 20.45%;">
                        <div class="headbarlast isdroppable" aria-hidden="false">
                            <div class="avatar flt-left"></div>
                            <h6 class="margin0 flt-left">ATHARVA</h6>
                            <i class="fa fa-chevron-down fg-white flt-left"></i>
                        </div>
                        <div class="pure-u-1 setgdropdown dropdown" style="margin-top: 0px;display:none;height: auto;background:#fff;position: relative;box-shadow: 0px 1px 3px #ccc;">
                            <ul class="setul">
                                <li class="pure-u-1">
                                    <a href="#">
                                        <h6 class="fg-gray"><i class="fa fa-male fa-fw fg-grayDark"></i> <span>Atharva Dandekar</span></h6>
                                    </a>
                                </li>
                                <li class="pure-u-1">
                                    <a href="#">
                                        <h6 class="fg-gray"><i class="fa fa-cog fa-fw fg-grayDark"></i> <span>Settings</span></h6>
                                    </a>
                                </li>                            
                                <li class="pure-u-1">
                                    <a href="#">
                                        <h6 class="fg-gray"><i class="fa fa-plus-square fa-fw fg-grayDark"></i> <span>Help</span></h6>
                                    </a>
                                </li>                            
                                <li class="pure-u-1">
                                    <a href="#">
                                        <h6 class="fg-gray"><i class="fa fa-wrench fa-fw fg-grayDark"></i> <span>Report</span></h6>
                                    </a>
                                </li>                            
                                <li class="pure-u-1">
                                    <a href="Logout">
                                        <h6 class="fg-gray"><i class="fa fa-sign-out fa-fw fg-grayDark"></i> <span>Logout</span></h6>
                                    </a>
                                </li>                            
                            </ul>
                        </div>
                    </div>
                </div>
            </div>            
        </div>
        <div class="filler"></div>
        <div class="container">
            <div class="pure-g">
                <div class="pure-u-1" style="">
                    <div class="pure-g">
                        <div class="pure-u-1 pure-u-md-3-4 leftPane" style="padding-left: 70px;">
                            <div class="Wrapper" style="padding: 20px 10px;">
                                <div class="pure-g" style="padding-bottom: 20px;">
                                    <div class="pure-u-1 pure-u-md-1-2 newThreadBtnDiv">
                                        <button class="ghost-button cyan">create new thread</button>
                                    </div>
                                    <div class="pure-u-1 pure-u-md-1-2 newQuesBtnDiv">
                                        <button class="ghost-button darkCyan">Ask new question ?</button>
                                    </div>
                                </div>
                                <div class="pure-g editableWrapper hidden" style="padding-bottom: 20px;">
                                    <div class="pure-u-1">
                                        <span class="flt-right"><span style="padding: 7px;vertical-align: sub;">Attach an Image</span><i class="fa fa-camera head-nav-icon flt-right imageAttach" aria-hidden="false"></i></span>
                                        <div class="avatar flt-left" style="background: url('<?php echo asset_url(); ?>images/avatar_atharva.jpg') no-repeat;"></div>
                                        <p class="margin0 eOwnerName"><a href="#" class="fg-grayDark">Atharva Dandekar</a></p>
                                        <div class="pure-u-1 eTitle">
                                            <input type="text" name="eTitle" placeholder="Thread title" />
                                        </div>
                                        <div class="editable flt-left" data-text="Write Something"></div>
                                        <div class="pure-u-1-6 flt-right"><button class="ghost-button cyan btnPost">POST</button></div>
                                        <div class="pure-u-1-6 flt-right" style="padding-right: 10px;"><button class="ghost-button gray btnCancelPost">CANCEL</button></div>
                                    </div>
                                </div>
                                <div class="pure-g">
                                    <div class="pure-u-1" style="border-top: 1px solid rgba(235,235,235,0.7);">
                                        <div class="pure-u-1 threadParent">
                                            <div class="pure-u-1 threadOwner">
                                                <small><i class="fa fa-chevron-down fa-fw flt-right fg-gray pointer toggleThreadOptions" aria-hidden="false"></i></small>
                                                <div class="pure-u-md-1-5 bg-white flt-right threadOptions" style="display: none;">
                                                    <ul>
                                                        <li><a href="#"><i class="fa fa-binoculars fa-fw"></i> Track this thread</a></li>
                                                        <li><a href="#"><i class="fa fa-book fa-fw"></i> Add to Reading list</a></li>
                                                        <li><a href="#"><i class="fa fa-trash fa-fw"></i> Delete this thread</a></li>
                                                        <li><a href="#"><i class="fa fa-ban fa-fw"></i> Report Spam</a></li>
                                                    </ul>
                                                </div>
                                                <div class="avatar flt-left" style="background: url('<?php echo asset_url(); ?>images/avatar_atharva.jpg') no-repeat;"></div>
                                                <p class="margin0 tOwnerName"><a href="#" class="fg-grayDark">Atharva Dandekar</a></p>
                                                <small class="fg-gray tTimestamp margin0"><i class="fa fa-clock-o fg-gray"></i> 15 minutes ago</small>
                                            </div>   
                                            <div class="pure-u-1 threadBody">
                                                <div class="threadAttachment" style="background: url('<?php echo asset_url(); ?>images/steve.jpg') no-repeat;"></div>
                                                <div class="threadTitle">
                                                    <p class="margin0 tTitle fg-grayDarker">Crazy One's</p>
                                                </div>
                                                <div class="threadContent fg-grayDark">
                                                    "Here's to the crazy ones. The misfits. The rebels. The troublemakers. The round pegs in the square holes. The ones who see things differently. They're not fond of rules. And they have no respect for the status quo. You can quote them, disagree with them, glorify or vilify them. About the only thing you can't do is ignore them. Because they change things. They push the human race forward. And while some may see them as the crazy ones, we see genius. Because the people who are crazy enough to think they can change the world, are the ones who do."
                                                </div>
                                            </div>
                                            <div class="pure-u-1 threadStats">
                                                <div class="stat"><small class="fa fa-heart fg-gray statIcon"></small> 27 Upvotes</div>
                                                <div class="stat"><small class="fa fa-comments fg-gray statIcon"></small> 13 Replies</div>
                                                <div class="stat"><small class="fa fa-eye fg-gray statIcon"></small> 35 Views</div>
                                            </div>
                                        </div>
                                        <div class="pure-u-1 threadParent">
                                            <div class="pure-u-1 threadOwner">
                                                <small><i class="fa fa-chevron-down fa-fw flt-right fg-gray pointer toggleThreadOptions" aria-hidden="false"></i></small>
                                                <div class="pure-u-1-5 bg-white flt-right threadOptions" style="display: none;">
                                                    <ul>
                                                        <li><a href="#"><i class="fa fa-minus-circle fa-fw"></i> Hide this thread</a></li>
                                                        <li><a href="#"><i class="fa fa-binoculars fa-fw"></i> Track this thread</a></li>
                                                        <li><a href="#"><i class="fa fa-book fa-fw"></i> Add to Reading list</a></li>
                                                        <li><a href="#"><i class="fa fa-ban fa-fw"></i> Report Spam</a></li>
                                                    </ul>
                                                </div>
                                                <div class="avatar flt-left" style="background: url('<?php echo asset_url(); ?>images/avatar_mihir.jpg') no-repeat;"></div>
                                                <p class="margin0 tOwnerName"><a href="#" class="fg-grayDark">Mihir Karandikar</a></p>
                                                <small class="fg-gray tTimestamp margin0"><i class="fa fa-clock-o fg-gray"></i> 10 minutes ago</small>
                                            </div>   
                                            <div class="pure-u-1 threadBody">                                                
                                                <div class="threadTitle">
                                                    <p class="margin0 tTitle fg-grayDarker">PM Modi crosses the political Rubicon: What his praise for Raje, Chouhan means</p>
                                                </div>
                                                <div class="threadContent fg-grayDark">
                                                    Prime Minister Narendra Modi broke his silence on Vasundhara Raje and Shivraj Singh Chouhan – whose resignations were demanded vociferously by the Congress by disrupting parliament - at a Bihar election rally. He gave both of them a ringing endorsement for their respective states' economic performance. Modi said Raje and Chouhan had raised Rajasthan and Madhya Pradesh from "Bimaru" status, and promised the same in Bihar if his party is elected to power. He did not go around giving Raje and Chouhan clean chits for anything they may or may not have done in their states on Lalitgate or Vyapam, but it is unlikely that he would have showered praise on these powerful Chief Ministers without an underlying political intent.
                                                </div>
                                            </div>
                                            <div class="pure-u-1 threadStats">
                                                <div class="stat"><small class="fa fa-heart fg-gray statIcon"></small> 27 Upvotes</div>
                                                <div class="stat"><small class="fa fa-comments fg-gray statIcon"></small> 13 Replies</div>
                                                <div class="stat"><small class="fa fa-eye fg-gray statIcon"></small> 35 Views</div>
                                            </div>
                                        </div>
                                        <div class="pure-u-1 threadParent">
                                            <div class="pure-u-1 threadOwner">
                                                <small><i class="fa fa-chevron-down fa-fw flt-right fg-gray pointer toggleThreadOptions" aria-hidden="false"></i></small>
                                                <div class="pure-u-1-5 bg-white flt-right threadOptions" style="display: none;">
                                                    <ul>
                                                        <li><a href="#"><i class="fa fa-minus-circle fa-fw"></i> Hide this thread</a></li>
                                                        <li><a href="#"><i class="fa fa-binoculars fa-fw"></i> Track this thread</a></li>
                                                        <li><a href="#"><i class="fa fa-book fa-fw"></i> Add to Reading list</a></li>
                                                        <li><a href="#"><i class="fa fa-ban fa-fw"></i> Report Spam</a></li>
                                                    </ul>
                                                </div>
                                                <div class="avatar flt-left" style="background: url('<?php echo asset_url(); ?>images/avatar_chinmay.jpg') no-repeat;"></div>
                                                <p class="margin0 tOwnerName"><a href="#" class="fg-grayDark">Chinmay Joshi</a></p>
                                                <small class="fg-gray tTimestamp margin0"><i class="fa fa-clock-o fg-gray"></i> 10 minutes ago</small>
                                            </div>   
                                            <div class="pure-u-1 threadBody">    
                                                <div class="threadAttachment" style="background: url('<?php echo asset_url(); ?>images/testBB.jpg') no-repeat;"></div>
                                                <div class="threadTitle">
                                                    <p class="margin0 tTitle fg-grayDarker">Breaking Bad Season 6 is just a rumor!</p>
                                                </div>
                                                <div class="threadContent fg-grayDark">
                                                    Arrgghh. Disappointment! How did you feel when you came to know it was a rumor? I felt pretty sad. But now I feel okay, knowing that Breaking Bad ended perfectly in season 5.TvS
                                                </div>
                                            </div>
                                            <div class="pure-u-1 threadStats">
                                                <div class="stat"><small class="fa fa-heart fg-gray statIcon"></small> 27 Upvotes</div>
                                                <div class="stat"><small class="fa fa-comments fg-gray statIcon"></small> 13 Replies</div>
                                                <div class="stat"><small class="fa fa-eye fg-gray statIcon"></small> 35 Views</div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="pure-u-1-4 rightPane">
                            <div class="full-span" style="padding-top: 13px; ">
                                <div class="full-span featured-tags-title">
                                    <p class="margin0 bold">featured tags</p>
                                </div>
                                <div class="full-span" style="padding: 0 20px;">
                                    <a class="featured-tag tagfx" href="#" rel="external">iOS</a>
                                    <a class="featured-tag tagfx" href="#" rel="external">breakingbad</a>
                                    <a class="featured-tag tagfx" href="#" rel="external">iOS</a>
                                    <a class="featured-tag tagfx" href="#" rel="external">breakingbad</a>
                                    <a class="featured-tag tagfx" href="#" rel="external">creativity</a>
                                    <a class="featured-tag tagfx" href="#" rel="external">imagination</a>
                                    <a class="featured-tag tagfx" href="#" rel="external">dreams</a>
                                    <a class="featured-tag tagfx" href="#" rel="external">creativity</a>
                                    <a class="featured-tag tagfx" href="#" rel="external">imagination</a>
                                    <a class="featured-tag tagfx" href="#" rel="external">dreams</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <script src="<?php echo asset_url(); ?>js/jquery-2.1.3.min.js"></script>
        <script src="<?php echo asset_url(); ?>js/index.js"></script>
        <script src="<?php echo asset_url(); ?>js/medium-editor.js"></script>
        
    </body>
</html>