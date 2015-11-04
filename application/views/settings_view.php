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
        <link rel="stylesheet" href="<?php echo asset_url(); ?>css/settings.css" />
    </head>
    <body>
        <div class="pure-g">
            <?php include 'headbar.php'; ?>
            <div class="filler"></div>            
            <div class="search-wrapper"></div>
            <div class="container">
                <div class="pure-g">
                    <div class="pure-u-1 pure-u-md-1-5"></div>
                    <div class="pure-u-1 pure-u-md-3-5" style="margin-top: 20px;padding: 0 10px;">
                        <p class="margin0 fg-grayLight"><small><?php echo $username; ?></small></p>
                        <h3 class="light">Settings</h3>
                        <p class="settings-subtitle bold fg-darkBlue" style="margin: 30px 0 20px 0;">basic settings</p>
                        <?php 
                        $attr = array('enctype'=>'multipart/form-data', 'class'=>'basic-update');
                        echo form_open('Settings/basic_update', $attr);
                        ?>                        
                        <div class="pure-g">
                            <div class="pure-u-1 pure-u-md-1-3" style="padding: 15px 0;">
                                <div class="avatar-settings" style="background-image: url('<?php echo userdata_url($userid, $info['avatarpath']); ?>');">
                                    <div class="avatar-defocus">
                                        <i class="fa fa-camera fg-white fa-2x pointer" style="position: absolute;right: 75px;top: 75px;"></i>
                                    </div>
                                    <input type="file" name="file" id="avatar-file"  accept="image/*" class="hidden" />
                                </div>
                            </div>
                            <div class="pure-u-1 pure-u-md-2-3" style="padding: 15px 0;">
                                <ul class="basic-info">
                                    <li>
                                        <p class="bold">FIRST NAME <a href="javascript:;" class="toggle-disable flt-right">(Change)</a></p>
                                        <input type="text" name="fname" class="settings-input-text txt-fname" placeholder="first name" value="<?php echo $info['fname']; ?>" disabled="disabled" spellcheck="false" autocapitalize="off" autocorrect="off" autocomplete="off" />
                                        <span class="status-symbol"><i></i></span>
                                    </li>
                                    <li>
                                        <p class="bold">LAST NAME <a href="javascript:;" class="toggle-disable flt-right">(Change)</a></p>
                                        <input type="text" name="lname" class="settings-input-text txt-lname" placeholder="last name" value="<?php echo $info['lname']; ?>" disabled="disabled" spellcheck="false" autocapitalize="off" autocorrect="off" autocomplete="off" />
                                        <span class="status-symbol"><i></i></span>
                                    </li>
                                </ul>
                                <button class="settings-save flt-right basic-save" disabled="disabled">Save Changes</button>
                            </div>
                        </div>
                        <?php echo form_close(); ?>
                        <p class="settings-subtitle bold fg-darkBlue" style="margin: 30px 0 20px 0;">account settings</p>
                        <?php
                        $attr = array('class'=>'account-update');
                        echo form_open('Settings/account_update', $attr);
                        ?>
                        <div class="pure-g">
                            <div class="pure-u-1 pure-u-md-1-2 adjust-on-mobile" style="padding-right: 20px;">
                                <ul class="basic-info">
                                    <li>
                                        <p class="bold">PASSWORD <a id="newpwd" href="javascript:;" class="toggle-disable flt-right">(Change)</a></p>
                                        <input type="password" name="npassword" class="settings-input-text txt-newpwd" value="*********" disabled="disabled" spellcheck="false" autocapitalize="off" autocorrect="off" autocomplete="off" />
                                        <span class="status-symbol"><i></i></span>
                                    </li>
                                    <li id="conpwd" style="display: none;">
                                        <p class="bold">CONFIRM PASSWORD</p>
                                        <input type="password" name="cpassword" class="settings-input-text txt-conpwd" value="*********" spellcheck="false" autocapitalize="off" autocorrect="off" autocomplete="off" />
                                        <span class="status-symbol"><i></i></span>
                                    </li>
                                </ul>                                
                            </div>
                            <div class="pure-u-1 pure-u-md-1-2">
                                <ul class="basic-info">
                                    <li>
                                        <p class="bold">EMAIL <a href="javascript:;" class="toggle-disable flt-right">(Change)</a></p>
                                        <input type="email" name="email" class="settings-input-text txt-email" placeholder="email" value="<?php echo $info['email']; ?>" disabled="disabled" spellcheck="false" autocapitalize="off" autocorrect="off" autocomplete="off" />
                                        <span class="status-symbol"><i></i></span>
                                    </li>
                                    <li>
                                        <p class="bold">USERNAME <a href="javascript:;" class="toggle-disable flt-right">(Change)</a></p>
                                        <input type="text" name="username" class="settings-input-text txt-username" placeholder="username" maxlength="25" value="<?php echo $info['username']; ?>" disabled="disabled" spellcheck="false" autocapitalize="off" autocorrect="off" autocomplete="off" />
                                        <span class="status-symbol"><i></i></span>
                                    </li>                                    
                                </ul>
                                <button class="settings-save flt-right account-save" disabled="disabled">Save Changes</button>
                            </div>
                        </div>
                        <?php echo form_close(); ?>
                        <p class="settings-subtitle bold fg-darkBlue" style="margin: 30px 0 20px 0;">general settings</p>
                        <?php
                        $attr = array('class'=>'general-update');
                        echo form_open('Settings/general_update', $attr);
                        ?>                        
                        <div class="pure-g" style="margin-bottom: 30px;">
                            <div class="pure-u-1 pure-u-md-1-2 adjust-on-mobile" style="padding-right: 20px;">
                                <ul class="basic-info">
                                    <li>
                                        <p class="bold">GENDER</p>
                                        <input type="radio" name="gender" value="m" id="male" <?php if($info['gender']=="m"){ echo 'checked="checked"'; } ?> /> <label for="male">Male</label>
                                        <input type="radio" name="gender" value="f" id="female" <?php if($info['gender']=="f"){ echo 'checked="checked"'; } ?> /> <label for="female">Female</label>
                                    </li>
                                    <li>
                                        <p class="bold">HOMETOWN <a href="javascript:;" class="toggle-disable flt-right">(Change)</a></p>
                                        <input type="text" name="hometown" class="settings-input-text txt-hometown" placeholder="hometown" maxlength="30" value="<?php echo $info['hometown']; ?>" disabled="disabled" spellcheck="false" autocapitalize="off" autocorrect="off" autocomplete="off" />
                                        <span class="status-symbol"><i></i></span>
                                    </li>                                    
                                    <li>
                                        <p class="bold">CURRENT CITY <a href="javascript:;" class="toggle-disable flt-right">(Change)</a></p>
                                        <input type="text" name="city" class="settings-input-text txt-city" placeholder="current city" maxlength="30" value="<?php echo $info['city']; ?>" disabled="disabled" spellcheck="false" autocapitalize="off" autocorrect="off" autocomplete="off" />
                                        <span class="status-symbol"><i></i></span>
                                    </li>                                    
                                    <li>
                                        <p class="bold">PROFESSION <a href="javascript:;" class="toggle-disable flt-right">(Change)</a></p>
                                        <input type="text" name="profession" class="settings-input-text txt-profession" placeholder="profession" maxlength="30" value="<?php echo $info['profession']; ?>" disabled="disabled" spellcheck="false" autocapitalize="off" autocorrect="off" autocomplete="off" />
                                        <span class="status-symbol"><i></i></span>
                                    </li>
                                </ul>                                
                            </div>
                            <div class="pure-u-1 pure-u-md-1-2">
                                <ul class="basic-info">
                                    <li>
                                        <p class="bold">ABOUT <a href="javascript:;" class="toggle-disable flt-right">(Change)</a></p>
                                        <input type="text" name="about" class="settings-input-text txt-about" placeholder="about" maxlength="255" value="<?php echo $info['about']; ?>" disabled="disabled" spellcheck="false" autocapitalize="off" autocorrect="off" autocomplete="off" />
                                        <span class="status-symbol"><i></i></span>
                                    </li>
                                    <li>
                                        <p class="bold">EDUCATION <a href="javascript:;" class="toggle-disable flt-right">(Change)</a></p>
                                        <input type="text" name="education" class="settings-input-text txt-education" placeholder="education" maxlength="30" value="<?php echo $info['education']; ?>" disabled="disabled" spellcheck="false" autocapitalize="off" autocorrect="off" autocomplete="off" />
                                        <span class="status-symbol"><i></i></span>
                                    </li>                                    
                                    <li>
                                        <p class="bold">COLLEGE <a href="javascript:;" class="toggle-disable flt-right">(Change)</a></p>
                                        <input type="text" name="college" class="settings-input-text txt-college" placeholder="college" maxlength="30" value="<?php echo $info['college']; ?>" disabled="disabled" spellcheck="false" autocapitalize="off" autocorrect="off" autocomplete="off" />
                                        <span class="status-symbol"><i></i></span>
                                    </li>                                    
                                    <li>
                                        <p class="bold">SCHOOL <a href="javascript:;" class="toggle-disable flt-right">(Change)</a></p>
                                        <input type="text" name="school" class="settings-input-text txt-school" placeholder="school" maxlength="30" value="<?php echo $info['school']; ?>" disabled="disabled" spellcheck="false" autocapitalize="off" autocorrect="off" autocomplete="off" />
                                        <span class="status-symbol"><i></i></span>
                                    </li>                                    
                                </ul>
                                <button class="settings-save flt-right general-save" disabled="disabled">Save Changes</button>
                            </div>
                        </div>
                        <?php echo form_close(); ?>
                        <p class="settings-subtitle bold fg-darkBlue" style="margin: 30px 0 20px 0;">delete account</p>
                        <div class="pure-g" style="margin-bottom: 30px;">
                            <div class="pure-u-1 pure-u-md-3-4" style="padding: 10px 10px 0 10px;">
                                <p>Deleting erases your profile and removes your activity from most things you’ve shared. If you decide to permanently delete your account, you won’t be able to access your account again.</p>
                            </div>
                            <div class="pure-u-1 pure-u-md-1-4" style="padding: 20px 0;">
                                <button class="settings-save delete-ac margin0 flt-right">Delete Your Account</button>
                            </div>
                        </div>    
                    </div>
                    <div class="pure-u-1 pure-u-md-1-5"></div>
                </div>
            </div>
        </div>
        <div class="modal-wrapper">
            <div class="pure-g">
                <div class="pure-u-1 pure-u-md-1-3 bg-white modal-content" style="padding: 10px;margin-top: 50px;position: relative;">
                    <span class="close-modal pointer" style="right: 10px;top: 10px;position:absolute;"><i class="fa fa-remove fg-grayLighter"></i></span>
                    <h4 class="fg-grayLight light" style="padding: 10px 0;border-bottom: 1px solid rgba(0,0,0,0.05);">Delete Account</h4>
                    <p class="fg-gray"><small>Deleting your account will erase your profile and remove your threads, replies and comments etc. from most things you\'ve shared on Soapbox. Some information may still be visible to others.</small></p>
                    <p><small>Please re-enter your password to confirm deletion.<small></p>
                    <?php
                    $attr = array('class'=>'delete_account');
                    echo form_open('Settings/delete_account', $attr);
                    ?>
                    <div class="pure-g">
                        <div class="pure-u-1 txt-right">
                            <ul class="basic-info">
                                <li>
                                    <input type="password" name="dpassword" class="delete-ac-input" placeholder="password goes here" spellcheck="false" autocapitalize="off" autocorrect="off" autocomplete="off" />
                                </li>
                            </ul>
                            <button class="settings-save delete-ac"><i class="fa fa-times fg-white"></i> Delete my account</button>
                        </div>
                    </div>
                    <?php form_close(); ?>
                </div>
            </div>
        </div>'
    </body>
    <script src="<?php echo asset_url(); ?>js/jquery-2.1.3.min.js"></script>
    <script src="<?php echo asset_url(); ?>js/main.js"></script>
    <script src="<?php echo asset_url(); ?>js/settings.js"></script>
    <script src="<?php echo asset_url(); ?>js/medium-editor.js"></script>    
</html>