<!DOCTYPE html>
<html>
    <head>
        <title>Sign-up to SoapBox</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0 user-scalable=no">
        <link rel="stylesheet" href="<?php echo asset_url(); ?>css/font-awesome.min.css" />
        <link rel="stylesheet" href="<?php echo asset_url(); ?>css/main.css" />
        <link rel="stylesheet" href="<?php echo asset_url(); ?>css/grids.css" />
        <link rel="stylesheet" href="<?php echo asset_url(); ?>css/grids-responsive.css" />
        <link rel="stylesheet" href="<?php echo asset_url(); ?>css/responsive.css" />
        <link rel="stylesheet" href="<?php echo asset_url(); ?>css/signup.css" />
    </head>
    <body class="bg-blur">
        <input type="hidden" name="baseurl" id="baseurl" value="<?php echo base_url(); ?>" />
        <div class="headbar">
            <div style="display: table-row">
                <div style="display: table-cell;padding-left: 20px;">
                    <h5 class="fg-white margin0 light logo">Soapbox</h5>
                </div>
            </div>
        </div>
        <div class="signup-filler"></div>
        <div class="main">
            <div class="container">
                <div class="pure-g" style="overflow: hidden;">
                    <div class="pure-u-1 bg-crimson banner">
                        <p class="light margin0 welcome-note fg-white">Hi there, <?php echo $username; ?></p>
                    </div>
                    <div class="pure-u-1 filler-text">
                        <p class="toggle-center margin0">You are a few steps away from having your own account.</p>
                    </div>
                    <?php
                    if (isset($error_signup)) {
                        echo '<div class="pure-u-1 error-container">';
                        echo '<div class="error">';
                        echo '<p class="margin0 fg-darkRed bold"><i class="fa fa-exclamation-triangle"></i> Snap! Something went wrong. Please check your details again.<i class="fa fa-times flt-right close-error"></i></p>';
                        echo '</div>';
                        echo '</div>';
                    }
                    ?>
                    <!-- STEP 1 -->
                    <div class="padded-subcontainer step-1" style="padding: 20px 20px 20px 20px;">
                        <div class="pure-u-1 pure-u-md-1-4">
                            <div class="avatar">
                                <div class="defocus-panel">
                                    <i class="fa fa-camera fa-2x fg-white margin0 center-icon cam"></i>
                                </div>
                            </div>                            
                        </div>
                        <div class="pure-u-1 pure-u-md-3-4">
                            <div class="pure-g">
                                <div class="pure-u-1 pure-u-md-1-2" style="padding: 0 5px 0 5px;position: relative;">
                                    <input type="text" placeholder="first name" autofocus autocomplete="Off" class="txt-fname" tabindex="1" spellcheck="false" autocorrect="off" autocomplete="off" />
                                    <a href="javascript:;"><span class="status-symbol"><i class="fa fa-asterisk fg-red"></i></span></a>
                                </div>
                                <div class="pure-u-1 pure-u-md-1-2" style="padding: 0 5px 0 5px;position: relative;">
                                    <input type="text" placeholder="last name" autocomplete="Off" class="txt-lname" tabindex="2" spellcheck="false" autocorrect="off" autocomplete="off" />
                                    <a href="javascript:;"><span class="status-symbol"><i class="fa fa-asterisk fg-red"></i></span></a>
                                </div>
                                <div class="pure-u-1 pure-u-md-1-2" style="padding: 0 5px 0 5px;position: relative;">
                                    <input type="text" placeholder="email" autocomplete="Off" class="txt-email" tabindex="3" spellcheck="false" autocapitalize="off" autocorrect="off" autocomplete="off" />
                                    <a href="javascript:;"><span class="status-symbol"><i class="fa fa-asterisk fg-red"></i></span></a>
                                </div>
                                <div class="pure-u-1 pure-u-md-1-2" style="padding: 12px 5px 0 5px;">
                                    <div class="pure-g bg-grayLighter gender-parent">
                                        <div class="pure-u-1-2 txt-center gender male active-male" style="padding: 1px;">
                                            <i class="fa fa-male fg-grayLight obey"></i> Male
                                        </div>
                                        <div class="pure-u-1-2 txt-center gender female" style="padding: 1px;">
                                            <i class="fa fa-female fg-grayLight obey"></i> Female
                                        </div>
                                    </div>
                                </div>
                                <div class="pure-u-1"  style="padding: 0 5px 0 5px;position: relative;">
                                    <input type="text" placeholder="about you" class="txt-about" tabindex="5" autocomplete="off" />
                                    <span class="status-symbol"><i></i></span>
                                </div>
                                <div class="pure-u-1 pure-u-md-1-2" style="padding: 0 5px 0px 5px;position: relative; margin-top: 11px;">
                                    <select class="security-question" tabindex="6">
                                        <option>-Security question-</option>
                                        <option value="0">What was your childhood nickname?</option>
                                        <option value="1">What is your birthplace?</option>
                                        <option value="2">What is the name of your best friend?</option>
                                        <option value="3">What is your first school's name?</option>
                                        <option value="4">Who is your childhood hero?</option>
                                        <option value="5">In what town was your first job?</option>
                                        <option value="6">What is your pet's name?</option>
                                        <option value="7">What is your father's middle name?</option>
                                        <option value="8">What is your favorite food?</option>
                                        <option value="9">Who was your favorite teacher?</option>
                                    </select>
                                </div>
                                <div class="pure-u-1 pure-u-md-1-2" style="padding: 0 5px 0 5px;position: relative;">
                                    <input type="text" placeholder="Answer" autocomplete="Off" class="txt-answer" tabindex="7" spellcheck="false" autocorrect="off" autocomplete="off" />
                                    <a href="javascript:;"><span class="status-symbol"><i class="fa fa-asterisk fg-red"></i></span></a>
                                </div>
                            </div>
                        </div>
                        <div class="pure-u-1-1 pure-u-md-1-8 offset-md-7-8" style="padding: 0 5px 0 5px;">
                            <button class="step-btn step-btn-1 bg-crimson fg-white next" tabindex="8">NEXT</button>
                        </div>
                    </div>
                    <!-- STEP 2 -->
                    <div class="padded-subcontainer step-2" style="display: none;">
                        <div class="pure-g">
                            <div class="pure-u-1 pure-u-md-1-2" style="padding: 0 5px 0 5px;position: relative;">
                                <input type="text" placeholder="hometown" autofocus autocomplete="Off" class="txt-hometown" tabindex="7" maxlength="30" spellcheck="false" autocorrect="off" autocomplete="off" />
                                <span class="status-symbol"><i></i></span>
                            </div>
                            <div class="pure-u-1 pure-u-md-1-2" style="padding: 0 5px 0 5px;position: relative;">
                                <input type="text" placeholder="current city" autocomplete="Off" class="txt-city" tabindex="8" maxlength="30" spellcheck="false" autocorrect="off" autocomplete="off" />
                                <span class="status-symbol"><i></i></span>
                            </div>              
                            <div class="pure-u-1 pure-u-md-1-2" style="padding: 0 5px 0 5px;position: relative;">
                                <input type="text" placeholder="profession" autocomplete="Off" class="txt-profession" tabindex="9" maxlength="30" spellcheck="false" autocorrect="off" autocomplete="off" />
                                <span class="status-symbol"><i></i></span>
                            </div>
                            <div class="pure-u-1 pure-u-md-1-2" style="padding: 0 5px 0 5px;position: relative;">
                                <input type="text" placeholder="education" autocomplete="Off" class="txt-education" tabindex="10" maxlength="30" spellcheck="false" autocorrect="off" autocomplete="off" />
                                <span class="status-symbol"><i></i></span>
                            </div>
                            <div class="pure-u-1 pure-u-md-1-2" style="padding: 0 5px 0 5px;position: relative;">
                                <input type="text" placeholder="college" autocomplete="Off" class="txt-college" tabindex="11" maxlength="30" spellcheck="false" autocorrect="off" autocomplete="off" />
                                <span class="status-symbol"><i></i></span>
                            </div>
                            <div class="pure-u-1 pure-u-md-1-2" style="padding: 0 5px 0 5px;position: relative;">
                                <input type="text" placeholder="school" autocomplete="Off" class="txt-school" tabindex="12" maxlength="30" spellcheck="false" autocorrect="off" autocomplete="off" />
                                <span class="status-symbol"><i></i></span>
                            </div>
                            <div class="pure-u-1-2" style="padding: 0 5px 0 5px;">
                                <button class="step-btn step-btn-2 bg-crimson fg-white back flt-left" style="width: auto;">BACK</button>
                            </div>                            
                            <div class="pure-u-1-2" style="padding: 0 5px 0 5px;">
                                <button class="step-btn step-btn-2 bg-crimson fg-white next flt-right" style="width: auto;" tabindex="13">NEXT</button>
                                <a href="javascript:;" class="flt-right skip-btn-2" style="margin: 17px 10px 5px 0;">Skip</a>
                            </div>
                        </div>
                    </div>
                    <!-- STEP 3 -->
                    <div class="padded-subcontainer step-3" style="display: none;">
                        <div class="pure-g" style="max-height: 280px;overflow-y: auto;">
                            <div class="pure-u-1">
                                <p class="margin0 txt-right"><a href="javascript:;" class="select-all"><i class="fa fa-check"></i> Select all categories</a></p>
                                <?php
                                foreach($categories as $category){
                                    echo '<div class="pure-u-1 pure-u-md-1-4 category">';
                                    echo '<div class="background" style="background-image: url(' . asset_url() . $category['imagepath'] . ');">';
                                    echo '<div class="defocus-panel">';
                                    echo '<i class="fa fa-check-circle fa-3x fg-white margin0 center-icon"></i>';
                                    echo '</div>';
                                    echo '</div>';
                                    echo '<div class="title bg-steel">';
                                    echo '<p class="margin0 txt-center bold fg-white category-name" data-cid="' . $category['srno'] . '">' . $category['name'] . '</p>';
                                    if($category['count']==1){
                                        echo '<p class="txt-center fg-white margin0"><small>' . $category['count'] . ' thread</small></p>';
                                    }   
                                    else{
                                        echo '<p class="txt-center fg-white margin0"><small>' . $category['count'] . ' threads</small></p>';
                                    }
                                    echo '</div>';
                                    echo '</div>';                            
                                }
                                ?>
                            </div>
                        </div>
                        <div class="pure-g">
                            <div class="pure-u-1-2" style="padding: 0 5px 0 5px;">
                                <button class="step-btn step-btn-3 bg-amber fg-white back flt-left" style="width: auto;">BACK</button>
                            </div>
                            <div class="pure-u-1-2" style="padding: 0 5px 0 5px;">
                                <button class="step-btn step-btn-3 bg-amber fg-white next flt-right" style="width: auto;">NEXT</button>
                            </div>                            
                        </div>
                    </div>
                    <!-- STEP 4 -->
                    <div class="padded-subcontainer step-4" style="display: none;">
                        <div class="pure-g">
                            <div class="pure-u-1 pure-u-md-1-4 txt-center checkout-icon">
                                <i class="fa fa-thumbs-o-up fa-5x margin0 fg-white thumbsup"></i>
                            </div>
                            <div class="pure-u-1 pure-u-md-3-4 checkout-message">
                                <h3 class="bold">Awesome!</h3>
                                <p>Make sure you have given us correct information before you proceed. You can always update your information anytime you want.</p>
                            </div>
                        </div>
                        <div class="pure-g">
                            <div class="pure-u-1-2" style="padding: 0 5px 0 5px;">
                                <button class="step-btn step-btn-4 bg-cyan fg-white back flt-left" style="width: auto;">BACK</button>
                            </div>
                            <div class="pure-u-1-2" style="padding: 0 5px 0 5px;">
                                <button class="step-btn step-btn-4 bg-cyan fg-white next flt-right" style="width: auto;" onclick="$('.signupdetailsform').submit();$(this).attr('disabled','disabled');">DONE</button>
                            </div>
                        </div>
                    </div>
                </div>
                <?php 
                $attr = array('enctype'=>'multipart/form-data', 'class'=>'signupdetailsform');
                echo form_open('Signup/validate', $attr);
                ?>
                <input type="file" name="file" accept='image/*' style="display: none;" />
                <input type="hidden" name="fname" />
                <input type="hidden" name="lname" />
                <input type="hidden" name="email" />
                <input type="hidden" name="gender" value="male" />
                <input type="hidden" name="about" />
                <input type="hidden" name="question">
                <input type="hidden" name="answer" />
                <input type="hidden" name="hometown" />
                <input type="hidden" name="city" />
                <input type="hidden" name="profession" />
                <input type="hidden" name="education" />
                <input type="hidden" name="college" />
                <input type="hidden" name="school" />
                <input type="hidden" name="categories" value="" />
                <?php echo form_close(); ?>
                <div class="progress-parent">
                    <div class="bg-crimson progress" style="width:10%;"></div>
                </div>
            </div>
        </div>
    </body>
    <script src="<?php echo asset_url(); ?>js/jquery-2.1.3.min.js" type="text/javascript"></script>
    <script src="<?php echo asset_url(); ?>js/signup.js" type="text/javascript"></script>    
</html>