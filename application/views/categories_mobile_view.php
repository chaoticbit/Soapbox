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
        <link rel="stylesheet" href="<?php echo asset_url(); ?>css/categories.css" />
        <link rel="stylesheet" href="<?php echo asset_url(); ?>css/index.css" />
    </head>
    <body>
        <?php include 'headbar.php'; ?>
        <div class="filler"></div>            
        <div class="search-wrapper"></div>
        <div class="container">
            <div class="pure-g">
                <div class="pure-u-1">
                    <ul class="cmul" style="display: block;padding: 20px 10px;">
                    <?php
                    foreach ($categories_alphabetical as $category) {
                        echo '<li>';
                        echo '<div class="pure-g">';
                        echo '<div class="pure-u-1">';
                        echo '<div class="pure-u-1-3">';
                        echo '<div class="category-thumbnail" style="background-image: url(\'' . asset_url() . $category['imagepath'] . '\');"></div>';
                        echo '</div>';
                        echo '<div class="pure-u-2-3" style="">';
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
                        echo '</div>';
                        echo '</li>';
                    }
                    ?>
                    </ul>
                </div>
            </div>
        </div>
    </body>
    <script src="<?php echo asset_url(); ?>js/jquery-2.1.3.min.js"></script>
    <script src="<?php echo asset_url(); ?>js/main.js"></script>
    <script src="<?php echo asset_url(); ?>js/categories.js"></script>
</html>