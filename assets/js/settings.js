$(document).ready(function(){

    //avatar defocus panel
    $('.avatar-settings').on('mouseover', function () {
        $('.avatar-defocus').show();
    });
    $('.avatar-settings').on('mouseout', function () {
        $('.avatar-defocus').hide();
    });
    
    function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function (e) {
                $('.avatar-settings').removeAttr('style');
                $('.avatar-settings').css('opacity', '0');
                $('.avatar-settings').css('background-image', 'url(' + e.target.result + ')').animate({opacity: '1'});
            };
            reader.readAsDataURL(input.files[0]);
        }
    }

    $('input[name="file"]').change(function () {
        readURL(this);
        $(this).closest('.pure-g').find('button').removeAttr('disabled');
    });
    
    $('.fa-camera').click(function(){
        $('#avatar-file').click();
    });
    $('.toggle-disable').click(function(){
        var elem = $(this).closest('li').find('.settings-input-text');
        if($(elem).attr('disabled')==="disabled"){
            $(this).closest('.pure-g').find('button').removeAttr('disabled');
            $(elem).removeAttr('disabled');
            $(elem).focus().val($(elem).val());
        }    
    });
    $('input[type="radio"]').click(function(){
        $(this).closest('.pure-g').find('button').removeAttr('disabled');
    });
    $('#newpwd').click(function(){
        $('.txt-newpwd').val("");
        $('.txt-conpwd').val("");
        $('#conpwd').show();
    });
    function regex_escape(str) {
        return str.replace(new RegExp('[.\\\\+*?\\[\\^\\]$(){}=!<>|:;\\-\']', 'g'), '\\$&');
    }

    function validate(input, regex) {
        var val = $.trim($(input).val());
        if (val === "") {
            $(input).parent().find('i').removeClass();
            return 0;
        }        
        if (!regex.test(val)) {
            $(input).parent().find('i').removeClass();
            $(input).parent().find('i').addClass('fa fa-times-circle fg-red');
            return 0;
        }
        else {
            $(input).parent().find('i').removeClass();
            $(input).parent().find('i').addClass('fa fa-check-circle fg-green');
            return 1;
        }
    }
    $('.txt-fname').bind('input', function () {
        validate('.txt-fname', /^[A-Za-z]+$/);
    });
    $('.txt-lname').bind('input', function () {
        validate('.txt-lname', /^[A-Za-z]+$/);
    });    
    $('.txt-about').bind('input', function () {
        validate('.txt-about', /^[A-Za-z0-9 !':;".,&()?]+$/);
    });
    $('.txt-hometown').bind('input', function () {
        validate('.txt-hometown', /^[A-Za-z ]+$/);
    });
    $('.txt-city').bind('input', function () {
        validate('.txt-city', /^[A-Za-z ]+$/);
    });
    $('.txt-profession').bind('input', function () {
        validate('.txt-profession', /^[A-Za-z .,']+$/);
    });
    $('.txt-education').bind('input', function () {
        validate('.txt-education', /^[A-Za-z .,']+$/);
    });
    $('.txt-college').bind('input', function () {
        validate('.txt-college', /^[A-Za-z ,.']+$/);
    });
    $('.txt-school').bind('input', function () {
        validate('.txt-school', /^[A-Za-z ,.']+$/);
    });
    $('.txt-newpwd').bind('input', function () {
        $('.txt-conpwd').val("");
        $('.txt-conpwd').parent().find('i').removeClass();
        validate('.txt-newpwd', /^[a-zA-Z0-9!@#$%^&*]{8,30}$/);
    });    
    $('.txt-conpwd').bind('input', function () {
        if($(this).val()===$('.txt-newpwd').val() && $.trim($(this).val())!==""){
            $(this).parent().find('i').removeClass();
            $(this).parent().find('i').addClass('fa fa-check-circle fg-green');
        }
        else{
            $(this).parent().find('i').removeClass();
            $(this).parent().find('i').addClass('fa fa-times-circle fg-red');            
        }
    });
    $('.txt-email').bind('input', function () {
        if(validate('.txt-email',  /^[a-zA-Z0-9_.+-]+@[a-zA-Z0-9-]+\.[a-zA-Z0-9-.]+$/, 1)===1){
            var val = $.trim($(this).val());
            var baseurl = $.trim($('#baseurl').val());
            $.ajax({
                type: 'post',
                url: baseurl+'Ajax_Controller/email_exists',
                dataType: "json",
                data: {email: val},
                cache: false,
                success: function(result){
                    if(result.response==="false"){
                        $('.txt-email').parent().find('i').removeClass();
                        $('.txt-email').parent().find('i').addClass('fa fa-check-circle fg-green');
                        return;
                    }
                    if(result.response==="true"){
                        $('.txt-email').parent().find('i').removeClass();
                        $('.txt-email').parent().find('i').addClass('fa fa-times-circle fg-red');
                        return;
                    }
                }
            });
        }
    });
    
    $(".txt-username").bind('input', function () {

        //replace spaces
        $(this).val($(this).val().replace(/\s/g, '_'));

        //trim val
        var username = $.trim($(this).val());
        
        //get url
        var baseurl = $.trim($('#baseurl').val());

        //regex check
        if (/^[a-z][a-zA-Z0-9_.]{0,24}$/.test(username)) {
            if (username.length < 5) {
                $('.txt-username').parent().find('i').removeClass();
                $('.txt-username').parent().find('i').hide();
            }
            //check db
            if (username.length >= 5) {
                $.ajax({
                    type: 'POST',
                    url: baseurl+"Ajax_Controller/checkUsername",
                    dataType: "json",
                    data: {uname: username},
                    cache: false,
                    beforeSend: function () {
                        $('.txt-username').parent().find('i').removeClass();
                        $('.txt-username').parent().find('i').addClass('fa fa-circle-o-notch fa-spin fg-blue');
                        $('.txt-username').parent().find('i').show();
                    },
                    complete: function () {
                    },
                    success: function (result) {
                        if (result.response === 'false') {
                            $('.txt-username').parent().find('i').removeClass();
                            $('.txt-username').parent().find('i').addClass('fa fa-check-circle fg-green');
                        }
                        else if (result.response === 'true') {
                            $('.txt-username').parent().find('i').removeClass();
                            $('.txt-username').parent().find('i').addClass('fa fa-times-circle fg-red');
                        }
                        $('.txt-username').parent().find('i').show();
                    }});
            }
        }
        else {
            if (username === "") {
                $('.txt-username').parent().find('i').removeClass();
                $('.txt-username').parent().find('i').hide();
                return;
            }
            $('.txt-username').parent().find('i').removeClass();
            $('.txt-username').parent().find('i').addClass('fa fa-times-circle fg-red');
            $('.txt-username').parent().find('i').show();
        }
    });
    
    $(document).on('keydown',function(e){         
        if($('.modal-wrapper').length > 0){
            if(e.keyCode === 27){
                $('.modal-wrapper').fadeOut(100,function(){ $('.modal-wrapper').removeClass('pop-in');});
                $('body').removeClass('offscroll');
            }
        }        
    });
    $(document).on('click','.close-modal',function(){
       $('.modal-wrapper').fadeOut(100,function(){
           $(this).removeClass('pop-in');
       });
    });
    $('.delete-ac').on('click',function(){
        $('.modal-wrapper').show().addClass('pop-in');
//        $('<div class="modal-wrapper">\n\
//            <div class="pure-g">\n\
//                <div class="pure-u-1 pure-u-md-1-3 bg-white modal-content" style="padding: 10px;margin-top: 50px;position: relative;">\n\
//                    <span class="close-modal pointer" style="right: 10px;top: 10px;position:absolute;"><i class="fa fa-remove fg-grayLighter"></i></span>\n\
//                    <h4 class="fg-grayLight light" style="padding: 10px 0;border-bottom: 1px solid rgba(0,0,0,0.05);">Delete Account</h4>\n\
//                    <p class="fg-gray"><small>Deleting your account will erase your profile and remove your threads, replies and comments etc. from most things you\'ve shared on Soapbox. Some information may still be visible to others.</small></p>\n\
//                    \n\
//                </div>\n\
//            </div>\n\
//        </div>').insertAfter('.container').addClass('pop-in');
                        
        $('body').addClass('offscroll');
    });
});
