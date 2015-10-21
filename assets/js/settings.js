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
    });
    
    $('.fa-camera').click(function(){
        $('#avatar-file').click();
    });
    $('.toggle-disable').click(function(){
        var elem = $(this).closest('li').find('.settings-input-text');
        if($(elem).attr('disabled')==="disabled"){
            $(elem).removeAttr('disabled');
            $(elem).focus().val($(elem).val());
        }    
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
        validate('.txt-about', /^[A-Za-z0-9 !.,&()?]+$/);
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
        if(validate('.txt-email',  /^(?:[a-z0-9!#$%&'*+/=?^_`{|}~-]+(?:\.[a-z0-9!#$%&'*+/=?^_`{|}~-]+)*|"(?:[\x01-\x08\x0b\x0c\x0e-\x1f\x21\x23-\x5b\x5d-\x7f]|\\[\x01-\x09\x0b\x0c\x0e-\x7f])*")@(?:(?:[a-z0-9](?:[a-z0-9-]*[a-z0-9])?\.)+[a-z0-9](?:[a-z0-9-]*[a-z0-9])?|\[(?:(?:25[0-5]|2[0-4][0-9]|[01]?[0-9][0-9]?)\.){3}(?:25[0-5]|2[0-4][0-9]|[01]?[0-9][0-9]?|[a-z0-9-]*[a-z0-9]:(?:[\x01-\x08\x0b\x0c\x0e-\x1f\x21-\x5a\x53-\x7f]|\\[\x01-\x09\x0b\x0c\x0e-\x7f])+)\])$/, 1)===1){
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
});
