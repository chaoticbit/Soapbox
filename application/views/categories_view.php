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
            <div class="bg-white txt-right" style="width: 100%;height: 50px;padding: 8px 10px;position: fixed;bottom: 0;right: 0;z-index: 55;background: #fff;box-shadow: 10px 0 15px rgba(0,0,0,0.7);">
                <p class="flt-left"><b>Select the categories of your liking.</b></p>
                <p class="margin0 flt-right btn-update"><button>UPDATE</button></p>
            </div>
            <div class="pure-g">
                <?php 
                $string = '';
                foreach($categories_alphabetical as $category){
                    if($category['uid']==$userid){
                        echo '<div class="category pure-u-1 pure-u-md-1-4 pointer active" data-id="' . $category['srno'] . '">';
                        echo '<div class="category-bg scale" style="background-image: url(\'' .  asset_url() . $category['imagepath'] . '\');"></div>';
                        //echo '<div class="category-defocus" style="background: linear-gradient(45deg,#46bddb 20%,#4889f8 40%,#9372bf 100%)"></div>';
                        echo '<div class="category-defocus" style="background: rgba(0,0,0,0.9);"></div>';
                        echo '<h5 class="category-title fg-white txt-center"><i class="fa fa-check-circle"></i> ' . $category['name'] . '</h5>';
                        if($category['count']==1){
                            echo '<p class="txt-center fg-white">' . $category['count'] . ' thread</p>';
                        }
                        else{
                            echo '<p class="txt-center fg-white">' . $category['count'] . ' threads</p>';
                        }
                        $string.= $category['srno'] . ',';
                    }
                    else{
                        echo '<div class="category pure-u-1 pure-u-md-1-4 pointer" data-id="' . $category['srno'] . '">';
                        echo '<div class="category-bg" style="background-image: url(\'' .  asset_url() . $category['imagepath'] . '\');"></div>';
                        echo '<div class="category-defocus"></div>';
                        echo '<h5 class="category-title fg-white hidden txt-center"><i class="fa fa-check-circle hidden"></i> ' . $category['name'] . '</h5>';
                        if($category['count']==1){
                            echo '<p class="txt-center fg-white hidden">' . $category['count'] . ' thread</p>';
                        }
                        else{
                            echo '<p class="txt-center fg-white hidden">' . $category['count'] . ' threads</p>';
                        }
                    }
                    echo '</div>';
                }
                ?>
                <div class="pure-u-1" style="height: 50px;"></div>
            </div>
        </div>
        <input type="hidden" id="selected-categories" value="<?php echo $string; ?>" />
    </body>
    <script src="<?php echo asset_url(); ?>js/jquery-2.1.3.min.js"></script>
    <script src="<?php echo asset_url(); ?>js/main.js"></script>
    <script src="<?php echo asset_url(); ?>js/categories.js"></script>
</html>