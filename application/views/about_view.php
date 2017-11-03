<!DOCTYPE html>
<html>
    <head>
        <title>About Soapbox</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0 user-scalable=no">
        <link rel="stylesheet" href="<?php echo asset_url(); ?>css/font-awesome.min.css" />
        <link rel="stylesheet" href="<?php echo asset_url(); ?>css/main.css" />
        <link rel="stylesheet" href="<?php echo asset_url(); ?>css/grids.css" />
        <link rel="stylesheet" href="<?php echo asset_url(); ?>css/grids-responsive.css" />
        <link rel="stylesheet" href="<?php echo asset_url(); ?>css/responsive.css" />
        <link rel="stylesheet" href="<?php echo asset_url(); ?>css/about.css" />
        <link rel="stylesheet" href="<?php echo asset_url(); ?>css/jquery.fullpage.css" />
    </head>
    <body>
        <input type="hidden" name="baseurl" id="baseurl" value="<?php echo base_url(); ?>" />
<!--        <div class="headbar">
            <div style="display: table-row">
                <div style="display: table-cell;padding-left: 20px;">
                    <h5 class="fg-white margin0 light logo">Soapbox</h5>
                </div>
            </div>
        </div>-->
        <div class="signup-filler"></div>
        <div class="pure-g" id="pagepiling">
            <div class="pure-u-1 section intro">
                <div class="pure-g">
                    <div class="pure-u-1">
                        <h1 class="fg-white txt-center"><span class="bold">SOAP</span><span class="light">BOX</span></h1>
                    </div>
                    <div class="pure-u-1">
                        <p class="fg-white subtitle txt-center">Question Everything</p>
                    </div>
                </div>
            </div>
            <div class="pure-u-1 section intro-second">
                <div class="pure-g">
                    <div class="pure-u-1">
                        <h1 class="fg-white txt-center"><span class="bold">SOAP</span><span class="light">BOX</span></h1>
                    </div>
                    <div class="pure-u-1">
                        <p class="fg-white subtitle txt-center">Question Everything</p>
                    </div>
                </div>
            </div>
            <div class="pure-u-1 section intro-third">
                <div class="pure-g">
                    <div class="pure-u-1">
                        <h1 class="fg-white txt-center"><span class="bold">SOAP</span><span class="light">BOX</span></h1>
                    </div>
                    <div class="pure-u-1">
                        <p class="fg-white subtitle txt-center">Question Everything</p>
                    </div>
                </div>
            </div>
        </div>
        <a href="javascript:;" class="prev" style="position: fixed;top: 10px;left: 10px;">Previous</a>
        <a href="javascript:;" class="next" style="position: fixed;top: 30px;left: 10px;">Next</a>
        <div class="overlay"></div>
    </body>
    <script src="<?php echo asset_url(); ?>js/jquery-2.1.3.min.js" type="text/javascript"></script>
    <script src="<?php echo asset_url(); ?>js/about.js" type="text/javascript"></script>    
    <script src="<?php echo asset_url(); ?>js/jquery.fullpage.min.js" type="text/javascript"></script>    
</html>