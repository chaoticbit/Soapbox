$(document).ready(function () {
    // $(function () {
    //     var prevScroll = 0,
    //             curDir = 'down',
    //             prevDir = 'up';

    //     $(window).scroll(function () {
    //         if ($(this).scrollTop() >= prevScroll) {
    //             curDir = 'down';
    //             if (curDir != prevDir) {
    //                 $('.headbar').stop();
    //                 $('.headbar').animate({top: '-50px'}, 300);
    //                 prevDir = curDir;
    //             }
    //         } else {
    //             curDir = 'up';
    //             if (curDir != prevDir) {
    //                 $('.headbar').stop();
    //                 $('.headbar').animate({top: '0px'}, 300);
    //                 prevDir = curDir;
    //             }
    //         }
    //         prevScroll = $(this).scrollTop();
    //     });
    // });
        
    if (screen.width < 480 || screen.width < 800) {
        var h = screen.height;
        $('.sidebar .pure-u-3-4').css('height', h + 'px');
        $('.toggle-sidebar').on('click', function () {
            if ($(this).attr('aria-expanded') === 'false') {
                $('.sidebarwrapper').fadeIn(function () {
                    $('.toggle-sidebar').addClass('active');
                    $('.bubble-mobile').hide();                        
                    $('.sidebar').animate({left: '0%'}, function () {                        
                        $('.toggle-sidebar').attr('aria-expanded', 'true');
                        $('body').addClass('offscroll');
                        document.ontouchmove = function (event) {
                            event.preventDefault();
                        };
                    });
                });
            }
            else {
                $('.toggle-sidebar').removeClass('active');
                $('.sidebar').animate({left: '-100%'}, function () {
                    $('.bubble-mobile').show();
                    $('.toggle-sidebar').attr('aria-expanded', 'false');
                    $('.sidebarwrapper').hide();
                    $('body').removeClass('offscroll');
                    document.ontouchmove = function () {
                    };
                });
            }
        });
    }

    $('body').attr('ondragstart', 'return false');
    $('body').attr('draggable', 'false');
    $('body').attr('ondragenter', 'event.dataTransfer.dropEffect=\'none\'; event.stopPropagation(); event.preventDefault();');
    $('body').attr('ondragenter', '');
    $('body').attr('ondragover', 'event.dataTransfer.dropEffect=\'none\';event.stopPropagation(); event.preventDefault();');
    $('body').attr('ondrop', 'event.dataTransfer.dropEffect=\'none\';event.stopPropagation(); event.preventDefault();');


    $('.toggle-dropdown').click(function (e) {
        $(this).find('.nav-dropdown').show();
        e.stopPropagation();
    });
    $('.nav-dropdown *').click(function (e) {
        e.stopPropagation();
    });
    $('.toggle-options').click(function () {
        $(this).parent().find('.options-dropdown').show();
    });
    $(document).on('click touchstart', function () {
        $('.nav-dropdown').hide();
    });
    $(document).mouseup(function (e)
    {
        var container = $('.nav-dropdown');
        if (!container.is(e.target) && container.has(e.target).length === 0)
        {
            container.hide();
        }
    });
    $(document).on('mouseup touchstart', function (e) {
        var search_container = $(".search-dropdown");
        if (!search_container.is(e.target) && search_container.has(e.target).length === 0)
        {
            search_container.hide();
            $(".search-wrapper").hide();
            $('body').removeClass('offscroll');
        }
        var options_container = $('.thread-options-dropdown-parent');
        if (!options_container.is(e.target) && options_container.has(e.target).length === 0)
        {
            options_container.hide();
            $('.toggle-thread-options').removeClass('fg-grayDark').addClass('fg-grayLight');
        }
    });
    $('.search').on('click', function () {
        $('.search-wrapper,.search-dropdown').show();
        //$('.container').addClass('blur');
        $('body').addClass('offscroll');
    });

    $('.search').on('input', function () {
        $(this).val($(this).val().replace(/^[!@#$%^&*()-+_='";:,.<>?/[\]{}']/g, ''));
        $('.search-wrapper,.search-dropdown').show();
        $('body').addClass('offscroll');
        var baseurl = $('#baseurl').val();
        var val = $.trim($(this).val());
        if ($.trim(val) === '') {
            $('.search-dropdown > ul').html('');
            return;
        }
        else {
            if (val.charAt(0) !== '>' && val.charAt(0) !== '<') {
                $.ajax({
                    type: 'post',
                    url: baseurl + 'Ajax_Controller/quick_search',
                    dataType: 'json',
                    data: {key: val},
                    cache: false,
                    beforeSend: function () {

                    },
                    success: function (result) {
                        $('.search-dropdown > ul').html(result.content);
                    }
                });
            }
        }
    });

    $('.search').on('keydown', function (e) {
        var $listItems = $('.search-dropdown > ul > li');
        var key = e.keyCode, $selected = $listItems.filter('.selected'), $current;
        if (key !== 40 && key !== 38 && key !== 13 && key !== 27) {
            return;
        }
        $listItems.removeClass('selected');
        if (key === 40) {
            if (!$selected.length || $selected.is(':last-child')) {
                $current = $listItems.eq(0);
            }
            else
                $current = $selected.next();
        }
        else if (key === 38) {
            if (!$selected.length || $selected.is(':first-child')) {
                $current = $listItems.last();
            }
            else
                $current = $selected.prev();
        }
        else if (key === 13) {
            var link = $selected.find('a').attr('href');
            if(link == null){
                var baseurl = $('#baseurl').val();
                window.location.href = baseurl + 'Search/' + $(this).val();
            }
            else{
                window.location.href = link;
            }
        }
        else if (key === 27) {
            $(".search-dropdown,.search-wrapper").hide();
            $(this).val('');
            $('body').removeClass('offscroll');
        }
        $current.addClass('selected');
    });

    $('.search-all').click(function () {
        var url = $('#baseurl').val() + 'Search/' + $('.search').val();
        window.location.href = url;
    });

    $('#order-categories').click(function () {
        if ($('.order-alphabetical').hasClass('hidden')) {
            $('.order-following').addClass('hidden');
            $('.order-alphabetical').removeClass('hidden');
            $(this).text('Order by following');
            return;
        }
        if ($('.order-following').hasClass('hidden')) {
            $('.order-alphabetical').addClass('hidden');
            $('.order-following').removeClass('hidden');
            $(this).text('Order by alphabets');
            return;
        }
    });

    $('.update-cat').click(function () {
        var baseurl = $.trim($('#baseurl').val());
        var cid = $.trim($(this).data('id'));
        var action = $.trim($(this).data('action'));
        var elem = $(this);
        $.ajax({
            type: 'post',
            url: baseurl + 'Ajax_Controller/update_category',
            dataType: 'json',
            data: {cid: cid, action: action},
            cache: false,
            beforeSend: function () {
                $(elem).parent().find('.loader').show();
            },
            success: function (result) {
                if (result.response === "false") {
                    alert('Something went wrong. Please try again later.');
                    return;
                }
                else {
                    $(elem).parent().find('.loader').hide();
                    elem.text(result.response);
                    elem.data('action', result.response);
                    if (result.response === "Unfollow") {
                        elem.parent().parent().find('i').addClass('fa fa-check fg-green');
                    }
                    if (result.response === "Follow") {
                        elem.parent().parent().find('i').removeClass('fa fa-check fg-green');
                    }
                }
            }
        });
    });
    $(document).on('click', '.load-more', function () {
        var lmt = $('.lmt').val();
        var baseurl = $.trim($('#baseurl').val());
        var opt = $(this).attr('data-opt');
        var optval = $(this).attr('data-opt-val');
        var optcat = $(this).attr('data-opt-cat');
        $.ajax({
            type: 'POST',
            url: baseurl + 'Ajax_Controller/load_more_thread',
            dataType: "json",
            data: {lmt: lmt, opt: opt, optval: optval,optcat:optcat},
            cache: false,
            beforeSend: function () {
                $('.load-more').hide();
                $('.loader').css('display', 'table');
            },
            success: function (result) {
                if (result.response === 'true') {
                    $('.lmt').remove();
                    $('.loader').hide();
                    $('.load-more').show();
                    $(result.content).insertAfter('li.thread:last').fadeIn("slow");
                }
                else {
                    $('.loader').hide();
                    $('.load-more').parent().fadeOut("fast", function () {
                        $('.load-more').remove();
                    });
                    $(result.content).insertAfter('li.thread:last');
                    window.scrollTo(0,document.body.scrollHeight);
                }
            }
        });
    });

    $(document).on('click', '.toggle-thread-options', function (e) {
        e.preventDefault();
        e.stopPropagation();
        $(this).closest('li.thread').find('.thread-options-dropdown-parent').show();
        $(this).closest('li.reply').find('.thread-options-dropdown-parent').show();
        $(this).removeClass('fg-grayLight').addClass('fg-grayDark');
    });
    
    $(document).on('click','.rstoggle',function(){
        var baseurl = $.trim($('#baseurl').val());
        var tid = $(this).closest('.thread').attr('data-tid');
        var opt = $(this).attr('data-opt');         
        var elem = $(this);
        if(opt=="hide_thread"){
            if(!confirm('Are you sure you want to hide?')){
                return;
            }
        }
        $.ajax({
            type: 'post',
            url: baseurl+'Ajax_Controller/thread_options/' + opt,
            dataType : "json",
            data: {tid: tid},
            cache: false,
            beforeSend: function(){

            },
            success: function(result){                
                if(result.response !== "false"){
                    if(result.opt === 'hide_thread'){
                        var tid = $(elem).closest('.thread').attr('data-tid');
                        $(elem).closest('.thread').fadeOut(function(){
                            $('<div class="pure-u-1 report-spam unhide-box">\n\
                            <p class="margin0">Your thread has been hidden. Do you want to unhide it ? <a href="javascript:;" class="flt-right unhindebtn" data-tid="' + tid + '" data-opt="unhide_thread">UNHIDE</a> <a href="javascript:;" onclick="$(this).parent().parent().remove();" class="flt-right">IGNORE</a></p>\n\
                            </div>').insertBefore($(elem).closest('.thread'));
                            return;
                        });
                        if(window.location.href.split('/')[4] === 'Thread'){
                            window.location.href = baseurl; 
                        }
                    }
                }
                else{
                    alert('Something went wrong. Please try again later.');
                }
            }
        });      
//       $(this).closest('li.thread > .pure-g').fadeOut(); 
//       $('<div class="pure-u-1 report-spam">\n\
//        <p class="bold" style="padding: 10px 0 0 2px;">Why don\'t you want to see this thread? <i class="fa fa-times fg-grayLight flt-right close-report-spam pointer"></i></p>\n\
//        <ul>\n\
//            <li>\n\
//                <p><input type="radio" name="rs" data-opt="annoy" /> It\'s annoying or not interesting</p>\n\
//            </li>\n\
//            <li>\n\
//                <p><input type="radio" name="rs" data-opt="hide_thread" /> I don\'t like it and want to hide it</p>\n\
//            </li>\n\
//            <li>\n\
//                <p><input type="radio" name="rs" data-opt="annoy2" /> I think it shouldn\'t be on Soapbox</p>\n\
//            </li>\n\
//            <li>\n\
//                <p><input type="radio" name="rs" data-opt="spam" /> It\'s spam</p>\n\
//            </li>\n\
//        </ul>\n\
//        <button class="rptspam-btn">continue</button>\n\
//        </div>').appendTo($(this).closest('li.thread'));
        
    });
    
//    $(document).on('click','.close-report-spam',function(){        
//        $(this).parent().closest('li.thread').find('.pure-g').fadeIn();
//        $(this).closest('.report-spam').fadeOut();
//    });
//    $(document).on('click', '.rptspam-btn', function(){
//        var baseurl = $.trim($('#baseurl').val());
//        var tid = $(this).closest('.thread').attr('data-tid');
//        var opt = $(this).closest('.report-spam').find('input:checked').attr('data-opt');         
//        var elem = $(this);
//        $.ajax({
//            type: 'post',
//            url: baseurl+'Ajax_Controller/thread_options/' + opt,
//            dataType : "json",
//            data: {tid: tid},
//            cache: false,
//            beforeSend: function(){
//
//            },
//            success: function(result){                
//                if(result.response !== "false"){
//                    if(result.opt === 'hide_thread'){
//                        var tid = $(elem).closest('.thread').attr('data-tid');
//                        $(elem).closest('.thread').fadeOut(function(){
//                            $('<div class="pure-u-1 report-spam unhide-box">\n\
//                            <p class="margin0">Your thread has been hidden. Do you want to unhide it ? <a href="javascript:;" class="flt-right unhindebtn" data-tid="' + tid + '" data-opt="unhide_thread">UNHIDE</a> <a href="javascript:;" onclick="$(this).parent().parent().remove();" class="flt-right">IGNORE</a></p>\n\
//                            </div>').insertBefore($(elem).closest('.thread'));
//                            return;
//                        });
//                    }
//                }
//                else{
//                    alert('Something went wrong. Please try again later.');
//                }
//            }
//        });        
//    });
  
    $(document).on('click','.unhindebtn',function(){
        var baseurl = $.trim($('#baseurl').val());
        var tid = $(this).attr('data-tid');
        var opt = $(this).attr('data-opt');         
        var elem = $(this);
        
        if(window.location.href !== 'http://localhost/Soapbox/'){
            if(!confirm('Are you sure you want to unhide?')){
                return;
            }
        }
        
        $.ajax({
            type: 'post',
            url: baseurl+'Ajax_Controller/thread_options/' + opt,
            dataType : "json",
            data: {tid: tid},
            cache: false,
            beforeSend: function(){

            },
            success: function(result){                
                if(result.response !== "false"){
                    if(result.opt === 'unhide_thread'){
                        if(window.location.href === 'http://localhost/Soapbox/'){
                            $('.report-spam').hide();
                            $('.unhide-box').remove();
                            $('li.thread[data-tid="' + tid + '"],li.thread[data-tid="' + tid + '"] > .pure-g').fadeIn();
                        }
                        else{
                            $(elem).closest('li').fadeOut(function(){
                                $(this).remove();
                            });
                        }
                    }
                }
                else{
                    alert('Something went wrong. Please try again later.');
                }
            }
        });   
    });
    
$(document).on('click', '.thread-options-dropdown > ul > li:not(".rstoggle,.edit-toggle")', function(){
        var baseurl = $.trim($('#baseurl').val());
        var tid = $(this).closest('.thread').attr('data-tid');
        var opt = $(this).attr('data-opt');         
        var elem = $(this);
        
        if(opt=="delete_thread"){
            if(!confirm('Are you sure you want to delete?')){
                return;
            }
        }
        $.ajax({
            type: 'post',
            url: baseurl+'Ajax_Controller/thread_options/' + opt,
            dataType : "json",
            data: {tid: tid},
            cache: false,
            beforeSend: function(){
                $(elem).find('i').removeClass().addClass('fa fa-circle-o-notch fa-fw fa-spin');
            },
            success: function(result){                
                if(result.response !== "false"){
                    if(result.opt === 'delete_thread'){
                        if(window.location.href.split('/')[4] === 'Thread'){
                            window.location.href = baseurl;
                        }
                        else{
                            $(elem).closest('.thread').fadeOut(function(){
                                $(elem).closest('.thread').remove();
                                return;
                            });
                        }
                    }
                    if(result.opt === 'remove_from_list'){
                        var title = $('.threadul').find('[data-tid="' + tid + '"] h3').text();
                        $('<li class="jarl' + tid + '"><div class="pure-g"><div class="pure-u-1"><a href="' + baseurl + 'Readinglist/' + tid + '" style="display: block;"><p class="txt-left margin0"><small><b>' + title + '</b></small></p></a></div></div></li>').insertAfter('.readinglist-dropdown .headli');
                    }
                    if(result.opt === 'add_to_list'){
                        $('.readinglist-dropdown').find('.jarl'+tid+'').remove();
                    }
                    if($(elem).hasClass('fg-green')){
                        $(elem).removeClass().addClass('bg-white fg-gray');
                    }
                    else{
                        $(elem).removeClass().addClass('fg-green');
                    }
                    $(elem).attr('data-opt',result.opt);
                    $(elem).html(result.link);
                }
                else{
                    alert('Something went wrong. Please try again later.');
                }
            }
        });        
    });
    
    $('.mark-read').on('click',function(){
        var baseurl = $.trim($('#baseurl').val());
        if($('.notifications-dropdown li').hasClass('active-notif')){
            $.ajax({
                type: 'post',
                url: baseurl+'Ajax_Controller/mark_read',
                cache: false,
                beforeSend: function(){
                    $(this).parent().find('.loader').show();
                },
                success: function(){                
                    $(this).parent().find('.loader').hide();
                    $('.notifications-dropdown li').removeClass('active-notif');
                    if(screen.width < 480){
                        $('.bubble-mobile').html('');
                        $('.bubble-mobile-float').html('');
                    }
                    else{
                        $('.bubble').html('');
                    }
                }
            });  
        }
        else
            return;
    });
    
    function waitForNotification (){
        var t;
        var baseurl = $('#baseurl').val();
        $.ajax({
           url: baseurl + 'Ajax_Controller/wait_for_notification',
           type: 'POST',
           dataType:'json',
           success: function(result){
               if(result.response === 'true'){
                    clearInterval(t);
                        if(screen.width < 480){
                            document.getElementById("beep").play();
                            var cnt = $('.bubble-mobile').html();
                            var cnt1 = parseInt(result.cnt);
                            if(cnt!==''){
                                var total = parseInt(cnt) + cnt1;
                                $('.bubble-mobile').html(total);
                                $('.bubble-mobile-float').html(total);
                            }
                            else{
                                $('.bubble-mobile').html(cnt1);
                                $('.bubble-mobile-float').html(cnt1);
                            }
                        }
                        else{
                            $('.beeper-wrapper > ul').show();
                            document.getElementById("beep").play();
                            $('body').find('.beeper-wrapper > ul').append(result.content);
                            $('.beeper-wrapper > ul > li:first').fadeOut(6000,function(){$(this).remove();});
                            document.title = "(" + result.cnt + ") New Notification";
                            var cnt = $('.bubble').html();
                            var cnt1 = parseInt(result.cnt);
                            if(cnt!==''){
                                var total = parseInt(cnt) + cnt1;
                                $('.bubble').html(total);
                            }
                            else{
                                $('.bubble').html(cnt1);
                            }
                            $.ajax({
                                url: baseurl + 'Ajax_Controller/pull_notifications',
                                type: 'POST',
                                cache:false,
                                success:function(result){
                                    $('.notifications-dropdown li:not(:first)').remove();
                                    $(result.content).insertAfter('.fixedli');
                                }
                            });
                        }    
                        $.ajax({
                            url: baseurl + 'Ajax_Controller/reset_notifications',
                            type: 'POST',
                            cache:false
                        });
               }
               t = setTimeout(function(){
                    waitForNotification();
               },5000);
           }
        });
    };
    (function () {
        var baseurl = $('#baseurl').val();
        var link = document.createElement('link');
//        link.type = 'image/x-icon';
        link.rel = 'shortcut icon';
        link.href = baseurl+'assets/images/logo.png';
        document.getElementsByTagName('head')[0].appendChild(link);
    }());    
    waitForNotification();
});