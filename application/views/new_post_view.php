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
                <div class="pure-g" id="editable-wrapper">
                    <div class="pure-u-1">
                        <h6 class="bg-grayLighter" style="padding: 15px 10px;">Create new thread</h6>
                    </div>
                    <div class="pure-u-1 thread-image-preview-wrapper" style="display:none;">                                                    
                       <div class="thread-image-preview">
                            <i class="fa fa-times-circle pointer fg-white flt-right remove-image" style="margin: 10px 8px 0 0;text-shadow: 0 0 5px rgba(0,0,0,0.7);" title="Remove image"></i>
                        </div>   
                        <progress class="image-upload-progress" id="image-upload-progress" value="0" max="100"></progress>
                    </div>
                    <div class="pure-u-1" style="padding: 10px;">
                        <input type="text" class="thread-title-input" placeholder="Title" value="" style="font-size: 17pt;" />
                    </div>
                    <div class="pure-u-1" style="padding: 0px 10px;">
                       <div class="editable" id="editable" data-text="Start writing here..."></div>                                               
                       <textarea class="duptarea hidden"></textarea>
                    </div>
                    <div class="pure-u-1 tag-input-div" style="border-top: 1px solid rgba(235,235,235,0.5);padding: 0 10px;">
                        <input type="text" class="thread-tags-input"  placeholder="add tags here.." />
                        <input type="hidden" name="tags" class="tags" data-cnt="0" value="">
                    </div>
                    <div class="pure-u-1" style="padding: 10px 0px;">
                        <select class="thread-input-category margin0 fg-gray" style="padding: 10px;">
                            <option value="0">Select Category</option>
                            <?php
                            foreach ($categories_alphabetical as $category) {
                                echo '<option value="' . $category['srno'] . '">' . $category['name'] . '</option>';
                            }
                            ?>
                        </select>
                    </div>
                    <div class="pure-u-1" style="padding: 0px 10px;">
                        <p><a href="javascript:;" class="fg-darkCyan upload_image_toggle_ios">Add photo</a></p>
                        <input type="file" class="hidden thread-image-ios" accept="image/*" name="file">
                        <input type="hidden" class="dupfilename" />  
                    </div>
                    <div class="pure-u-1" style="padding: 0px 10px;">
                        <a href="<?php echo base_url();?>"><p class="bold fg-grayLight cancel-post-mobile pointer flt-left" style="margin-right: 10px;">CANCEL</p></a>
                        <p class="bold btn-post-mobile pointer flt-right" style="color: #09f;margin-right: 10px;">POST</p>
                        <i class="fa fg-gray fa-circle-o-notch fa-spin fa-fw flt-right post-loader" style="display: none;margin: 9px;"></i>
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