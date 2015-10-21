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
                    <div class="pure-u-1 pure-u-md-1-2" style="margin: auto;padding: 5px 0px;">
                        <div style="border-bottom: 1px solid rgba(235,235,235,0.8);padding: 5px 10px 0px;">
                            <p class="bold" style=""><a href="javascript:;" class="mark-read">Mark all as read</a> <i class="fa fa-circle-o-notch loader fa-spin fg-gray" style="display:none;padding: 0 4px;"></i></p>    
                        </div>
                        <ul class="notifications-dropdown">
                        <?php
                        if($notifications){
                            echo $notifications;
                        }
                        else{
                            echo '<p>No notifications :(</p>';
                        }
                        ?>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </body>
    <script src="<?php echo asset_url(); ?>js/jquery-2.1.3.min.js"></script>
    <script src="<?php echo asset_url(); ?>js/main.js"></script>
    <script src="<?php echo asset_url(); ?>js/index.js"></script>
</html>