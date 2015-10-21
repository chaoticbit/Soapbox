<!DOCTYPE html>
<html>
    <head>
        <title>Log-in to SoapBox</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0 user-scalable=no">
        <link rel="stylesheet" href="<?php echo asset_url(); ?>css/font-awesome.min.css" />
        <link rel="stylesheet" href="<?php echo asset_url(); ?>css/main.css" />
        <link rel="stylesheet" href="<?php echo asset_url(); ?>css/grids.css" />
        <link rel="stylesheet" href="<?php echo asset_url(); ?>css/grids-responsive.css" />
        <link rel="stylesheet" href="<?php echo asset_url(); ?>css/responsive.css" />
        <link rel="stylesheet" href="<?php echo asset_url(); ?>css/login.css" />
    </head>
    <body class="bg-blur">
        <input type="hidden" name="baseurl" id="baseurl" value="<?php echo base_url(); ?>" />
        <div class="top-nav hide-mobile">
            <ul class="navbar">
                <li><a href="javascript:;">Upcoming</a></li>
                <li><a href="javascript:;">About</a></li>
                <li><a href="javascript:;">FAQs</a></li>
                <li><a href="javascript:;">Contact</a></li>
                <li><a href="javascript:;">Developers</a></li>
            </ul>
        </div>
        <div class="title txt-center">
            <h1><span class="bold">SOAP</span><span class="light">BOX</span></h1>
        </div>
        <div class="container">
            <p class="subtitle">Question Everything</p>
            <div class="transparent-panel">
                <div class="pure-g">
                    <div class="pure-u-1 pure-u-md-1-2 login-form" style="<?php if(isset($error_signup)) echo 'display: none;' ?>">
                          <?php $attr= array("name"=>"loginform"); echo form_open('Login/process', $attr); ?>
                            <input type="text" class="login-credential <?php if (isset($error)) echo $error; ?>" name="uname" placeholder="username" autofocus spellcheck="false" autocapitalize="off" autocorrect="off" autocomplete="off" />
                            <input type="password" class="login-credential <?php if (isset($error)) echo $error; ?>" name="pword" placeholder="password" spellcheck="false" autocapitalize="off" autocorrect="off" autocomplete="off" />
                            <p class="txt-right flt-right"><a class="reset-pwd" href="javascript:;">Forgot Password?</a></p>
                            <input type="submit" class="btn-general login-submit bg-white fg-grayLight" name="login-submit-btn" value="LOGIN" />
                          <?php echo form_close(); ?>
                        <input type="text" class="login-credential hidden resetPwdUname" name="resetPwdUname" placeholder="username [press enter]" spellcheck="false" autocapitalize="off" autocorrect="off" autocomplete="off" />
                        <p class="light txt-center mobile-filler">Start a conversation, explore your<br />interests, and be in the know.</p>
                        <p class="light txt-center desktop-filler">Start a conversation, explore your interests,<br />and be in the know.</p>
                        <button class="btn-general login-signup bg-crimson fg-white">JOIN SOAPBOX NOW</button>
                    </div>
                    <div class="pure-u-1 pure-u-md-1-2 resetpwd-form" style="display: none;">
                        <div style="position: relative;" class="qa">
                            <div style="position: relative;">
                                <p class="margin0 bold reset-question" style="padding:5px;"></p>
                            </div>
                            <div style="position: relative;">
                                <input type="text" class="login-credential reset-answer" name="answer" maxlength="25" placeholder="ANSWER [press enter]" spellcheck="false" autocapitalize="off" autocorrect="off" autocomplete="off" />
                                <span class="nun status-symbol" style="display: none;"><i></i></span>
                            </div>
                        </div>
                    </div>
<!--                    <input type="hidden" name="uname_resetpwd" />-->
                    <div class="pure-u-1 pure-u-md-1-2 signup-form" style="<?php if(!isset($error_signup)) echo 'display: none;' ?>">
                        <div class="tips tips-username" style="display: none;">
                            <i class="fa fa-caret-right fa-2x fg-lightBlue right-caret" style="top: 8px;"></i>
                            <div class="bg-lightBlue tip" style="top: -5px;">
                                <p class="fg-white bold txt-center margin0" style="font-size: 10pt;">Cannot start with a number or any special character.</p>
                            </div>
                        </div>
                        <div class="tips tips-password" style="display: none;">
                            <i class="fa fa-caret-right fa-2x fg-lightBlue right-caret" style="top: 48px;"></i>
                            <div class="bg-lightBlue tip" style="top: 35px;">
                                <p class="fg-white bold txt-center margin0" style="font-size: 10pt;">Must contain at least 8 characters.</p>
                            </div>
                        </div>
                        <?php $attr = array('name'=>'signupform'); echo form_open('Login/signup', $attr); ?>
                            <div style="position: relative;">
                                <input type="text" class="login-credential signup-username <?php if (isset($error_signup)) echo ' invalid'; ?>" name="nusername" maxlength="25" placeholder="NEW USERNAME" spellcheck="false" autocapitalize="off" autocorrect="off" autocomplete="off" />
                                <span class="nun status-symbol" style="display: none;"><i></i></span>
                            </div>
                            <div style="position: relative;">
                                <input type="password" class="login-credential signup-password <?php if (isset($error_signup)) echo ' invalid'; ?>" name="npassword" placeholder="password" spellcheck="false" autocapitalize="off" autocorrect="off" autocomplete="off" />
                                <span class="pwd status-symbol" style="display: none;"><i></i></span>
                            </div>
                            <div style="position: relative;">
                                <input type="password" class="login-credential signup-pwdcon <?php if (isset($error_signup)) echo ' invalid'; ?>" name="cpassword" placeholder="confirm password" spellcheck="false" autocapitalize="off" autocorrect="off" autocomplete="off" />
                                <span class="cpw status-symbol" style="display: none;"><i></i></span>
                            </div>
                            <div style="position: relative;">
                                <input type="submit" name="signup-submit-btn" disabled class="btn-general signup-submit bg-white fg-grayLight" value="SIGN UP" />
                                <span class="signup-help bold"><a href="javascript:;" class="show-tips">[?]</a></span>
                            </div>
                        <?php echo form_close(); ?>
                        <p class="txt-center margin0" style="padding-top: 5px;"><a href="javascript:;" class="go-back">Go Back</a></p>
                    </div>
                    <div class="pure-u-1 pure-u-md-1-2 info">
                        <p class="bold">It is so easy to use that it's hard to explain</p>
                        <p class="light txt-justify" style="margin-top: 15px;">We made it really, really simple for people to ask any question and get answers from real people with first-hand experience.</p>
                        <p class="bold">You already know how this works</p>
                        <p class="light txt-justify">Choose from the topics of your interest to create a feed of information tuned to your interests. Create a thread to share knowledge.</p>
                        <?php echo '<a href="' . $login_url . '"><button class="btn-general fg-white" style="border-color:#3b5988;margin-top: 5px;background: #3b5988;">LOGIN WITH FACEBOOK</button></a>'; ?>
                    </div>
                </div>
            </div>
        </div>
    </body>
    <script src="<?php echo asset_url(); ?>js/jquery-2.1.3.min.js"></script>
    <script src="<?php echo asset_url(); ?>js/login.js"></script>    
</html>