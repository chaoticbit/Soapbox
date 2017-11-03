$(document).ready(function () {   
        
  //   function isElementInViewport (el) {

  //     if (typeof jQuery === "function" && el instanceof jQuery) {
  //         el = el[0];
  //     }

  //     var rect = el.getBoundingClientRect();

  //     return (
  //         rect.top >= 0 &&
  //         rect.left >= 0 &&
  //         rect.bottom <= (window.innerHeight || document.documentElement.clientHeight) && /*or $(window).height() */
  //         rect.right <= (window.innerWidth || document.documentElement.clientWidth) /*or $(window).width() */
  //     );
  // }

  //   if(!isElementInViewport($('.inner-thread-stats'))) {
  //       $('.thread-stats').find('.inner-thread-stats').removeClass('inner-thread-stats').addClass('sticky-thread-stats');
  //       var widthStats = $('.thread-stats').width();  
  //       $('.sticky-thread-stats').css('width', widthStats + 'px');
  //       $(window).scroll(function() {
  //       if($(window).scrollTop() + $(window).height() == $(document).height()) {
  //           window.toBottom = true;
  //           $('.thread-stats').find('.sticky-thread-stats').removeClass('sticky-thread-stats').addClass('inner-thread-stats');
  //       }
  //       else if(!isElementInViewport($('.inner-thread-stats'))){
  //           $('.thread-stats').find('.inner-thread-stats').removeClass('inner-thread-stats').addClass('sticky-thread-stats');
  //           var widthStats = $('.thread-stats').width();  
  //           $('.sticky-thread-stats').css('width', widthStats + 'px');
  //       }
  //   });
  //   }   

    
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
        placeholder:false,
        imageDragging: false,
        fileDragging: false,
        sticky:true,
        autoLink: false,
        toolbar:{
            buttonLabels: 'fontawesome',
            buttons: ['bold', 'italic', 'underline', 'anchor','h3','h4','h5','h6','pre','unorderedlist','orderedlist'],
            targetBlank: true,
            externalInteraction: true,
            cleanPastedHTML: false
        }
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

    scaleUp = function(){
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
    };
    
    $('.thumbnail').bind('click',scaleUp);
    $('.thread-desc img').bind('click',function(){
        var img = $(this).attr('src');
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
        if($('li.thread').hasClass('editableon')){
            if(e.keyCode === 27){
                cancel_edit();
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
        var threadOwnerId = $(this).attr('data-uid');
        var elem = $(this);
        $.ajax({
            type: 'post',
            url: baseurl+'Ajax_Controller/upvote_thread/',
            dataType : "json",
            data: {tid: tid},
            cache: false,
            beforeSend: function(){
                $(elem).parent().find('.loader').show();
            },
            success: function(result){                
                if(result.response === "false"){
                    alert('Something went wrong. Please try again later.');
                }
                else{                    
                    $(elem).parent().find('.loader').hide();
                    $(elem).parent().html('<p><span id="rm-upvote-thread" class="margin0 bg-cyan fg-white bold pointer" data-tid="'+tid+'"><i class="fa fa-star"></i> You have upvoted</span> <i style="margin-left: 5px;display:none;" class="loader fa fa-circle-o-notch fa-spin"></i></p>');
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
                $(elem).parent().find('.loader').show();
            },
            success: function(result){                
                if(result.response === "false"){
                    alert('Something went wrong. Please try again later.');
                }
                else{
                    $(elem).parent().find('.loader').hide();
                    $(elem).parent().html('<p><span id="upvote-thread" class="margin0 bg-grayLighter fg-grayLight bold pointer" data-tid="'+tid+'"><i class="fa fa-star"></i> Upvote this thread!</span> <i style="margin-left: 5px;display:none;" class="loader fa fa-circle-o-notch fa-spin"></i></p>');
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

        if($.trim($('.duptarea').val()) === '' || $.trim($('.duptarea').val()) === '<p><br></p>')
            return;
        $.ajax({
            type: 'post',
            url: baseurl + 'Ajax_Controller/reply_thread',
            dataType: 'json',
            data:{tid:tid,desc:desc},
            cache:false,
            beforeSend:function(){
                $('.btn-post').parent().find('.loader').show();
            },
            success:function(result){
                if(result.response === 'true'){
                    $('.btn-post').parent().find('.loader').hide();
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
                $(elem).parent().find('.loader').show();
            },
            success: function(result){                
                if(result.response === "false"){
                    alert('Something went wrong. Please try again later.');
                    return;
                }
                else{
                    $(elem).parent().find('.loader').hide();
                    $(elem).html('You upvoted');
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
                $(elem).parent().find('.loader').show();
            },
            success: function(result){                
                if(result.response === "false"){
                    alert('Something went wrong. Please try again later.');
                    return;
                }
                else{
                    $(elem).parent().find('.loader').hide();
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
                    alert('0 upvotes');
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
                    alert('0 Views');
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
    
    /* edit thread */
    
    $('.edit-toggle').click(function(){
        $(this).closest('li.thread').addClass('editableon');
        var title = $('.ttitle > h2').text();
        $('.ttitle > h2,.div-tags,.thread-stats').hide();
        $('<input type="text" class="thread-title-input" value="' + title + '" />').insertAfter('.ttitle > h2');
        $('.thread-desc').addClass('editable-thread');
        var editor = new MediumEditor('.editable-thread', {
            placeholder:false,
            imageDragging: false,
            fileDragging: false,
            sticky:true,
            autoLink: false,
            toolbar:{
                buttonLabels: 'fontawesome',
                buttons: ['bold', 'italic', 'underline', 'anchor','h3','h4','h5','h6','pre','unorderedlist','orderedlist'],
                targetBlank: true,
                externalInteraction: true,
                cleanPastedHTML: false
            }
        });
        $('.duptarea-edit').val($('.editable-thread').html());
        $('.editable-thread').on('input', function () {
            $('.duptarea-edit').val($(this).html());
        });
        if($('li.thread').find('.thumbnail').length > 0){
            $('.thumbnail').removeClass('pointer').addClass('reposition');
            $('.thumbnail').unbind('click');
            reposition();
        }
        $('<div class="pure-u-1 edit-options" style="padding: 10px 0;">\n\
                                        <span class="thread-edit-save margin0 bg-cyan fg-white bold pointer">Save Changes</span>\n\
                                        <span class="cancel-edit-thread margin0 bg-gray fg-white bold pointer">Cancel</span>\n\
                                    </div>').insertAfter('li.thread .thread-desc');
        $('.thread-options-dropdown-parent').hide();
    }); 
    $(document).on('click','.thread-edit-save',function(){
        var tid = $('.thread-edit-save').closest('li.thread').attr('data-tid');
        var title = $('.thread-title-input').val();
        var coordinates = $('.thumbnail').css('background-position');
        var desc = $('.duptarea-edit').val();
        desc = regex_escape(desc);
        var baseurl = $.trim($('#baseurl').val());
        
        $.ajax({
            type: 'post',
            url: baseurl+'Ajax_Controller/edit_thread',
            dataType : "json",
            data: {tid: tid,title:title,desc:desc,coordinates:coordinates},
            cache: false,
            beforeSend: function(){
                
            },
            success: function(result){
                if(result.response === "true"){
                    $('.ttitle > h2').html(result.title);
                    $('.ttitle > h2,.div-tags,.thread-stats').show();
                    $('.ttitle input').remove();
                    $('li.thread').removeClass('editableon');
                    $('.edit-options').remove();
                    $('.thread-desc').removeClass('editable');
                    $('.thread-desc').removeAttr('contenteditable data-placeholder data-medium-element role aria-multiline');
                    $('.thread-desc').html(result.desc);
                    $('#medium-editor-anchor-preview-2').remove();
                    $('#medium-editor-toolbar-2').remove();
                    if($('.reposition').length > 0){
                        $('.thumbnail').bind('click',scaleUp);
                        $('.thumbnail').unbind('mousedown mouseup');
                        $('.thumbnail').removeClass('reposition');
                        $('.thumbnail').css('background-position',result.coordinates);
                    }
                }
                else{
                    alert('Something went wrong. Please try again later.');
                    return;
                }
            }
        }); 
        
    });
    
    cancel_edit = function(){
        var tid = $('.cancel-edit-thread').closest('li.thread').attr('data-tid');
        var baseurl = $.trim($('#baseurl').val());
        $.ajax({
            type: 'post',
            url: baseurl+'Ajax_Controller/pull_t_desc',
            dataType : "json",
            data: {tid: tid},
            cache: false,
            beforeSend: function(){
                
            },
            success: function(result){
                if(result.response === "true"){
                    $('.ttitle > h2,.div-tags,.thread-stats').show();
                    $('.ttitle input').remove();
                    $('li.thread').removeClass('editableon');
                    $('.edit-options').remove();
                    $('.thread-desc').removeClass('editable');
                    $('.thread-desc').removeAttr('contenteditable data-placeholder data-medium-element role aria-multiline');
                    $('.thread-desc').html(result.desc)
                    $('#medium-editor-anchor-preview-2').remove();
                    $('#medium-editor-toolbar-2').remove();
                    if($('.reposition').length > 0){
                        $('.thumbnail').bind('click',scaleUp);
                        $('.thumbnail').unbind('mousedown mouseup');
                        $('.thumbnail').removeClass('reposition');
                        $('.thumbnail').css('background-position',result.coordinates);
                    }
                }
                else{
                    alert('Something went wrong. Please try again later.');
                    return;
                }
            }
        }); 
    };
    
    $('.edit-history').on('click',function(){
        var baseurl = $.trim($('#baseurl').val());
        var tid = $(this).closest('li.thread').attr('data-tid');
        
        $.ajax({
            type: 'post',
            url: baseurl+'Ajax_Controller/edit_history',
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
                        <div class="pure-u-1 pure-u-md-1-2 bg-white modal-content modal-content-history" style="margin-top: 50px;position: relative;">\n\n\
                        <span class="close-modal pointer" style="right: 10px;top: 10px;position:absolute;"><i class="fa fa-remove fg-grayLighter"></i></span>\n\
                        <h5 class="fg-grayLight" style="padding: 10px;border-bottom: 1px solid rgba(0,0,0,0.05);">Thread History</h5>\n\
                        <ul class="modal-ul"></ul>\n\
                        </div>\n\
                        </div>\n\
                        </div>').insertAfter('.container').addClass('pop-in');
                    $('.modal-content ul').css('height',window.innerHeight - 70 + 'px');    
                    $('body').addClass('offscroll');
                    $('.modal-content ul').html(result.content);
                }
            }
        });   
    });
    
    
    $(document).on('click','.cancel-edit-thread',cancel_edit);
    
    function reposition(){
        $(".thumbnail").on('mousedown mouseup', function (e) {

        var start = {x: 0, y: 0};
        var move = {x: 0, y: 0};
        var id = $(this).attr('id');
        var origin = {x: 0, y: 0};
        var container = {w: $(this).width(), h: $(this).height()};

        var containerRatio = container.h / container.w;

        var img = new Image;
        img.src = $(this).css('background-image').replace(/url\(|\)$/ig, "");
        var background = {w: img.width, h: img.height};

        var backgroundRatio = background.h / background.w;

        var min = {x: 0, y: 0};
        var max = {x: 0, y: 0};

        if (backgroundRatio < containerRatio) {
            min.y = 0;
            min.x = -((container.h * (1 / backgroundRatio)) - container.w);
        }
        else if (backgroundRatio > containerRatio) {
            min.x = 0;
            min.y = -((container.w * backgroundRatio) - container.h);
        }
        else {
            min.x = 0;
            min.y = 0;
        }
        if (e.type == 'mousedown') {
            $(this).css('border', '1px solid #1ba1e2');
            origin.x = e.clientX;
            origin.y = e.clientY;
            var temp = $(this).css('background-position').split(" ");
            start.x = parseInt(temp[0]);
            start.y = parseInt(temp[1]);
            
            $(this).mousemove(function (e) {
                move.x = start.x + (e.clientX - origin.x);
                move.y = start.y + (e.clientY - origin.y);
                if (move.x <= max.x && move.x >= min.x && move.y <= max.y && move.y >= min.y) {
                    $(this).css('background-position', move.x + 'px ' + move.y + 'px');
                    $("#" + id).val('x:' + move.x + ', y:' + move.y);
                }
                else if (move.x <= max.x && move.x >= min.x) {
                    if (move.y < min.y) {
                        $(this).css('background-position', move.x + 'px ' + min.y + 'px');
                        $("#" + id).val('x:' + move.x + ', y:' + min.y);
                    }
                    else if (move.y > max.y) {
                        $(this).css('background-position', move.x + 'px ' + max.y + 'px');
                        $("#" + id).val('x:' + move.x + ', y:' + max.y);
                    }
                }
                else if (move.y <= max.y && move.y >= min.y) {
                    if (move.x < min.x) {
                        $(this).css('background-position', min.x + 'px ' + move.y + 'px');
                        $("#" + id).val('x:' + min.x + ', y:' + move.y);
                    }
                    else if (move.x > max.x) {
                        $(this).css('background-position', max.x + 'px ' + move.y + 'px');
                        $("#" + id).val('x:' + max.x + ', y:' + move.y);
                    }
                }
                else {
                    //
                }
            });
        }
        else {
            $(this).css('border', 'none');
            $(this).off('mousemove');
            $(document.body).focus();
        }

    });
    }
    if(window.location.hash){
        var r = window.location.hash;
        $('html,body').animate({scrollTop: $(r).offset().top},1300,function(){
            $(r).addClass('highlight-bg').delay(700).queue(function(){$(r).removeClass('highlight-bg');}).dequeue();
        });
    };
    function get_real_views() {
        var baseurl = $.trim($('#baseurl').val());
        var tid = $('li.thread').attr('data-tid');
        $.ajax({
            type: 'post',
            url: baseurl + 'Ajax_Controller/get_real_views',
            dataType: "json",
            data: {tid: tid},
            cache: false,
            success: function (result) {
                if (result.response === "true") {
                    if(result.content==1){
                        $('.stats-desktop').find('.views-to-thread').text(result.content+' View');
                    }
                    else{
                        $('.stats-desktop').find('.views-to-thread').text(result.content+' Views');
                    }
                    $('.stats-mobile').find('.views-to-thread').html('<i class="fa fa-rss"></i> '+result.content);
                }
            }
        });
    }
    get_real_views();
});