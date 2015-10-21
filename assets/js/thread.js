$(document).ready(function () {
    if(window.location.hash){
        var r = window.location.hash;
        $('html,body').animate({scrollTop: $(r).offset().top},1300,function(){
            $(r).addClass('highlight-bg').delay(700).queue(function(){$(r).removeClass('highlight-bg');}).dequeue();
        });
    };
  $('.toggle-editor').click(function(){
        $(this).closest('.new-thread-button').slideUp();
        $('.editable-wrapper').slideDown(function(){
            $('.editable').focus();
        });      
        
    });
    $('.untoggle-editor').click(function(){
        $('.editable-wrapper').slideUp();
        $('.new-thread-button').slideDown(function(){
            $('.editable').html('');
            $('.duptarea').val('');
        });    
//        window.globalDraftFlag = false;
    });
    $('.editable').on('input', function () {
        $('.duptarea').val($(this).html());
    });
    var editor = new MediumEditor('.editable', {
        buttonLabels: 'fontawesome',
        buttons: ['bold', 'italic', 'underline', 'quote', 'anchor', 'pre', 'indent', 'unorderedlist'],
        disablePlaceholders: true,
        targetBlank: true,
        externalInteraction: true,
        imageDragging: false,
        cleanPastedHTML: false
    });
    
    $(document).on('click', '.toggle-comments', function(){
        if($(this).attr('data-status')==='collapse'){
            $(this).html('Expand <i class="fa fa-angle-down"></i>');
            $(this).attr('data-status', 'expand');
            $(this).closest('.reply').find('.reply-comments').hide();
            return;
        }
        if($(this).attr('data-status')==='expand'){
            $(this).html('Collapse <i class="fa fa-angle-up"></i>');
            $(this).attr('data-status', 'collapse');
            $(this).closest('.reply').find('.reply-comments').show();
            return;
        }
    });

    $('.thumbnail').on('click',function(){   
        var img = $('.thumbnail').attr('data-image');
        $('<div class="image-theatre-wrapper">\n\
            <div class="area-photo"><i class="fa fa-times fg-gray close-image-theatre pointer" style="font-size: 17px;z-index:99999;position: absolute;right:20px;top:10px;"></i>\n\
                <div class="theatre-photo-container">\n\
                    <img src="" class="theatre-photo" />\n\
                </div>\n\
            </div>\n\
        </div>').insertAfter('.container');
        $('.image-theatre-wrapper').show();
        $(".theatre-photo").attr("src", img).load(function() {
                $(".theatre-photo-container").fadeTo(100,9,function(){
                    var h_d = $('.theatre-photo').height();
                    var h_p = $('.theatre-photo').parent().height();
                    var margin = (h_p - h_d) / 2;
                    var scale = (window.innerHeight)/h_p;
                    $('.theatre-photo').addClass('scaleUp');
                    $('.theatre-photo').css({transform: 'scale(' + scale + ')'});
                    $('.theatre-photo').css("margin-top", margin+'px');
                });          
                
            });
    });

    $(window).scroll(function(){
        if($('.image-theatre-wrapper').length > 0){
            $('.theatre-photo').css({transform:'scale(0.5)',transition:'all 1s ease-out',transformOrigin:'center top 0'});
            $('.image-theatre-wrapper').fadeTo(300,0,function(){
                $(this).remove();
            });            
        } 
    });
    $(document).on('keydown',function(e){
        if($('.image-theatre-wrapper').length > 0){
            if(e.keyCode === 27){
                $('.theatre-photo').css({transform:'scale(0.5)',transition:'all 1s ease-out',transformOrigin:'center top 0'});
                $('.image-theatre-wrapper').fadeTo(300,0,function(){
                    $(this).remove();
                });            
            }
        } 
        if($('.modal-wrapper').length > 0){
            if(e.keyCode === 27){
                $('.modal-wrapper').fadeOut(100,function(){ $('.modal-wrapper').remove();});
                $('body').removeClass('offscroll');
            }
        }
    });
    $(document).on('click','.close-image-theatre',function(){
        $('.theatre-photo').css({transform:'scale(0.5)',transition:'all 1s ease-out',transformOrigin:'center top 0'});
        $('.image-theatre-wrapper').fadeTo(300,0,function(){
                $(this).remove();
        }); 
    });
    $(document).on('click','.theatre-photo',function(){
        $('.theatre-photo').css({transform:'scale(0.5)',transition:'all 1s ease-out',transformOrigin:'center top 0'});
        $('.image-theatre-wrapper').fadeTo(300,0,function(){
                $(this).remove();
        }); 
    });

    $(document).on('click', '#upvote-thread', function(){
        var baseurl = $.trim($('#baseurl').val());
        var tid = $(this).attr('data-tid');
        var elem = $(this);
        $.ajax({
            type: 'post',
            url: baseurl+'Ajax_Controller/upvote_thread/',
            dataType : "json",
            data: {tid: tid},
            cache: false,
            beforeSend: function(){

            },
            success: function(result){                
                if(result.response === "false"){
                    alert('Something went wrong. Please try again later.');
                }
                else{
                    $(elem).parent().html('<p id="rm-upvote-thread" class="margin0 bg-cyan fg-white bold pointer" data-tid="'+tid+'"><i class="fa fa-star"></i> You have upvoted</p>');
                    if(result.count==1){
                        if(screen.width>480){
                            $('.upvotes-to-thread').html(result.count+' Upvote');
                        }
                        else{
                            $('.upvotes-to-thread').html('<i class="fa fa-star-o"></i> '+result.count);
                        }
                    }
                    else{
                        if(screen.width>480){
                            $('.upvotes-to-thread').html(result.count+' Upvotes');
                        }
                        else{
                            $('.upvotes-to-thread').html('<i class="fa fa-star-o"></i> '+result.count);
                        }
                    }
                    $(".upvotes-to-thread").addClass("highlight-bg").delay(1000).queue(function(next){
                        $(this).removeClass("highlight-bg");
                        next();
                    });
                }
            }
        });        
    });
    $(document).on('click', '#rm-upvote-thread', function(){
        var baseurl = $.trim($('#baseurl').val());
        var tid = $(this).attr('data-tid');
        var elem = $(this);
        $.ajax({
            type: 'post',
            url: baseurl+'Ajax_Controller/rm_upvote_thread/',
            dataType : "json",
            data: {tid: tid},
            cache: false,
            beforeSend: function(){

            },
            success: function(result){                
                if(result.response === "false"){
                    alert('Something went wrong. Please try again later.');
                }
                else{
                    $(elem).parent().html('<p id="upvote-thread" class="margin0 bg-grayLighter fg-grayLight bold pointer" data-tid="'+tid+'"><i class="fa fa-star"></i> Upvote this thread!</p>');
                    if(result.count==1){
                        if(screen.width>480){
                            $('.upvotes-to-thread').html(result.count+' Upvote');
                        }
                        else{
                            $('.upvotes-to-thread').html('<i class="fa fa-star-o"></i> '+result.count);
                        }
                    }
                    else{
                        if(screen.width>480){
                            $('.upvotes-to-thread').html(result.count+' Upvotes');
                        }
                        else{
                            $('.upvotes-to-thread').html('<i class="fa fa-star-o"></i> '+result.count);
                        }
                    }
                    $(".upvotes-to-thread").addClass("highlight-bg").delay(1000).queue(function(next){
                        $(this).removeClass("highlight-bg");
                        next();
                    });
                }
            }
        });        
    });
    function regex_escape(str) {
        return str.replace(new RegExp('[.\\\\+*?\\[\\^\\]$(){}=!<>|:;\\-\']', 'g'), '\\$&');
    }
    $(document).on('click','.btn-post',function(){
        var desc = $('.duptarea').val();
        desc = regex_escape(desc);
        var baseurl = $.trim($('#baseurl').val());
        var tid = $('li.thread').attr('data-tid');

        $.ajax({
            type: 'post',
            url: baseurl + 'Ajax_Controller/reply_thread',
            dataType: 'json',
            data:{tid:tid,desc:desc},
            cache:false,
            beforeSend:function(){
                
            },
            success:function(result){
                if(result.response === 'true'){
                    $('.editable-wrapper').slideUp();
                        $('.new-thread-button').slideDown(function(){
                        $('.editable').html('');
                        $('.duptarea').val('');
                    });    
                    if($('.reply').length > 0){
                        $(result.content).insertBefore('li.reply:first');
                    }
                    else{
                        $(result.content).insertAfter('.replies > ul');
                    }
                    $('li.reply:first').addClass("highlight-bg").delay(1000).queue(function(next){
                        $(this).removeClass("highlight-bg");
                        next();
                    });
                }
                else{
                    alert('Something went wrong!');
                }
            }
        });
    });
    
    $(document).on('keydown', '.reply-comment-input', function(e){
        if(e.keyCode !== 13){
            return;
        }
        
        var comment = regex_escape($(this).val());
        if($.trim(comment)===""){
            return;
        }
        
        var ele = $(this);
        var rid = $(this).closest('.reply').attr('data-rid');
        var baseurl = $.trim($('#baseurl').val());
        
        $(this).attr('disabled','disabled');
        $.ajax({
            url: baseurl + 'Ajax_Controller/add_comment',
            type: 'POST',
            cache: false,
            data: {comment: comment, rid: rid},
            success: function(result){
                if(result.response==="false"){
                    alert('Something went wrong.');
                    return;
                }
                $(ele).val('');
                $(ele).removeAttr('disabled');
                if((($(ele).closest('.reply').find('.comments > li')).length)===0){
                    ($(ele).closest('.reply').find('.comments')).append(result.content);
                }
                else{
                    $(result.content).insertBefore($(ele).closest('.reply').find('.comments > li:first'));
                }
            }
        });
    });
    $(document).on('click', '#upvote-reply', function(){
        
        var baseurl = $.trim($('#baseurl').val());
        var rid = $(this).closest('.reply').attr('data-rid');
        var elem = $(this);
        
        $.ajax({
            type: 'post',
            url: baseurl+'Ajax_Controller/upvote_reply/',
            dataType : "json",
            data: {rid: rid},
            cache: false,
            beforeSend: function(){

            },
            success: function(result){                
                if(result.response === "false"){
                    alert('Something went wrong. Please try again later.');
                    return;
                }
                else{
                    $(elem).text('You upvoted');
                    $(elem).attr('id', 'rm-upvote-reply');
                    $(elem).closest('.pure-g').find('.reply-upvote-count').html('<i class="fa fa-fw fa-star-o"></i> '+result.count);
                }
            }
        });        
    });
    $(document).on('click', '#rm-upvote-reply', function(){
        
        var baseurl = $.trim($('#baseurl').val());
        var rid = $(this).closest('.reply').attr('data-rid');
        var elem = $(this);
        
        $.ajax({
            type: 'post',
            url: baseurl+'Ajax_Controller/rm_upvote_reply/',
            dataType : "json",
            data: {rid: rid},
            cache: false,
            beforeSend: function(){

            },
            success: function(result){                
                if(result.response === "false"){
                    alert('Something went wrong. Please try again later.');
                    return;
                }
                else{
                    $(elem).text('Upvote');
                    $(elem).attr('id', 'upvote-reply');
                    $(elem).closest('.pure-g').find('.reply-upvote-count').html('<i class="fa fa-fw fa-star-o"></i> '+result.count);
                }
            }
        });        
    });
    
    $(document).on('click', '.reply-remove', function(){
        
        var baseurl = $.trim($('#baseurl').val());
        var rid = $(this).closest('.reply').attr('data-rid');
        var elem = $(this);
        if(!confirm('Are you sure you want to delete?')){
            return;
        }
        $.ajax({
            type: 'post',
            url: baseurl+'Ajax_Controller/remove_reply/',
            dataType : "json",
            data: {rid: rid},
            cache: false,
            beforeSend: function(){

            },
            success: function(result){                
                if(result.response === "false"){
                    alert('Something went wrong. Please try again later.');
                    return;
                }
                else{
                    $(elem).closest('.reply').fadeOut(function(){
                        $(elem).closest('.reply').remove();
                    });
                }
            }
        });
    });
    
    $(document).on('click', '.comment-remove', function(){
        
        var baseurl = $.trim($('#baseurl').val());
        var rrid = $(this).closest('.reply-comment').attr('data-rrid');
        var elem = $(this);
        if(!confirm('Are you sure you want to delete?')){
            return;
        }
        $.ajax({
            type: 'post',
            url: baseurl+'Ajax_Controller/remove_comment/',
            dataType : "json",
            data: {rrid: rrid},
            cache: false,
            beforeSend: function(){

            },
            success: function(result){                
                if(result.response === "false"){
                    alert('Something went wrong. Please try again later.');
                    return;
                }
                else{
                    $(elem).closest('.reply-comment').fadeOut(function(){
                        $(elem).closest('.reply-comment').remove();
                    });
                }
            }
        });
    });
    
    
    $('.upvotes-to-thread').on('click',function(){
        var baseurl = $.trim($('#baseurl').val());
        var tid = $(this).closest('li.thread').attr('data-tid');
        
        $.ajax({
            type: 'post',
            url: baseurl+'Ajax_Controller/people_upvoted',
            dataType : "json",
            data: {tid: tid},
            cache: false,
            beforeSend: function(){

            },
            success: function(result){                
                if(result.response === "false"){
                    alert('Something went wrong. Please try again later.');
                    return;
                }
                else{
                    $('<div class="modal-wrapper">\n\
                        <div class="pure-g">\n\
                        <div class="pure-u-1 pure-u-md-1-3 bg-white modal-content" style="margin-top: 50px;position: relative;">\n\n\
                        <span class="close-modal pointer" style="right: 10px;top: 10px;position:absolute;"><i class="fa fa-remove fg-grayLighter"></i></span>\n\
                        <h5 class="fg-grayLight" style="padding: 10px;border-bottom: 1px solid rgba(0,0,0,0.05);">Upvotes</h5>\n\
                        <ul class="modal-ul"></ul>\n\
                        </div>\n\
                        </div>\n\
                        </div>').insertAfter('.container').addClass('pop-in');
                        
                    $('body').addClass('offscroll');
                    $('.modal-content ul').html(result.content);
                }
            }
        });   
    });
    
    $('.views-to-thread').on('click',function(){
        var baseurl = $.trim($('#baseurl').val());
        var tid = $(this).closest('li.thread').attr('data-tid');
        
        $.ajax({
            type: 'post',
            url: baseurl+'Ajax_Controller/viewers',
            dataType : "json",
            data: {tid: tid},
            cache: false,
            beforeSend: function(){

            },
            success: function(result){                
                if(result.response === "false"){
                    alert('Something went wrong. Please try again later.');
                    return;
                }
                else{
                    $('<div class="modal-wrapper">\n\
                        <div class="pure-g">\n\
                        <div class="pure-u-1 pure-u-md-1-3 bg-white modal-content" style="margin-top: 50px;position: relative;">\n\n\
                        <span class="close-modal pointer" style="right: 10px;top: 10px;position:absolute;"><i class="fa fa-remove fg-grayLighter"></i></span>\n\
                        <h5 class="fg-grayLight" style="padding: 10px;border-bottom: 1px solid rgba(0,0,0,0.05);">Views</h5>\n\
                        <ul class="modal-ul"></ul>\n\
                        </div>\n\
                        </div>\n\
                        </div>').insertAfter('.container').addClass('pop-in');
                        
                    $('body').addClass('offscroll');
                    $('.modal-content ul').html(result.content);
                }
            }
        });   
    });
    $(document).on('click','.close-modal',function(){
       $('.modal-wrapper').fadeOut(100,function(){
           $(this).remove();
       });
    });
    
    $(document).on('click', '.mark-correct', function(){
        
        var baseurl = $.trim($('#baseurl').val());
        var rid = $(this).closest('.reply').attr('data-rid');
        var elem = $(this);
        
        $.ajax({
            type: 'post',
            url: baseurl+'Ajax_Controller/mark_correct/',
            dataType : "json",
            data: {rid: rid},
            cache: false,
            beforeSend: function(){

            },
            success: function(result){
                if(result.response === "false"){
                    alert('Something went wrong. Please try again later.');
                    return;
                }
                else{
                    $(elem).html('<i class="fa fa-check-circle"></i> Correct');
                    $(elem).removeClass();
                    $(elem).addClass('fg-green pointer remove-correct');
                }
            }
        });        
    });
    
    $(document).on('click', '.remove-correct', function(){
        
        var baseurl = $.trim($('#baseurl').val());
        var rid = $(this).closest('.reply').attr('data-rid');
        var elem = $(this);
        
        $.ajax({
            type: 'post',
            url: baseurl+'Ajax_Controller/remove_correct/',
            dataType : "json",
            data: {rid: rid},
            cache: false,
            beforeSend: function(){

            },
            success: function(result){
                if(result.response === "false"){
                    alert('Something went wrong. Please try again later.');
                    return;
                }
                else{
                    $(elem).html('Mark correct');
                    $(elem).removeClass();
                    $(elem).addClass('fg-grayLight pointer mark-correct');
                }
            }
        });        
    });
    
    
});