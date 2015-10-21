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
                        <div style="padding: 30px 10px 10px;">
                            <h5 style="position: relative;">
                                <input type="text" class="search-all-input-mobile" placeholder="Search" value="" style="" />
                                <i class="fa fa-times-circle fg-grayLight clear-text"></i>
                            </h5>
                        </div>
                    </div>
                    <div class="pure-u-1" style="padding: 10px;">
                        <div class="pure-g tab-container">
                            <div class="pure-u-1">
                                <p class="featured-tags-title active flt-left txt-center" data-ref="stmli" style="">threads</p>
                                <p class="featured-tags-title flt-left txt-center" data-ref="spmli" style="">people</p>
                                <p class="featured-tags-title flt-left txt-center" data-ref="stgmli" style="">tags</p>
                            </div>
                            <div class="stmli pure-u-1"></div>
                            <div class="spmli pure-u-1" style="display:none;"></div>
                            <div class="stgmli pure-u-1" style="display: none;"></div>
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

