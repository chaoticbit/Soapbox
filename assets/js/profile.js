$(document).ready(function(){
    
    $(function () {
        var prevScroll = 0,
                curDir = 'down',
                prevDir = 'up';

        $(window).scroll(function () {
            if ($(this).scrollTop() >= prevScroll) {
                curDir = 'down';
                if (curDir != prevDir) {
                    $('.headbar').stop();
                    $('.headbar').animate({top: '0px'}, 300);
                    prevDir = curDir;
                }
            } else {
                curDir = 'up';
                if (curDir != prevDir) {
                    $('.headbar').stop();
                    $('.headbar').animate({top: '0px'}, 300);
                    prevDir = curDir;
                }
            }
            prevScroll = $(this).scrollTop();
        });
    });
        window.globalDraftFlag = false;
        var is_chrome = navigator.userAgent.indexOf('Chrome') > -1;
        var is_safari = navigator.userAgent.indexOf("Safari") > -1;
        if ((is_chrome)&&(is_safari)) {is_safari=false;}    
        askConfirm = function() {
            if(window.globalDraftFlag) {
                return "You haven't finished your post yet. Do you want to leave without finishing?";
            }
        };
        if (is_safari) {
            window.onunload = function(e){
                if(window.globalDraftFlag) {
                    alert("You haven't finished your post yet. Do you want to leave without finishing?");
                }
            };
        }
        else{
            window.onbeforeunload = askConfirm; 
        }
    if(screen.width > 480){
        $(window).on('scroll',function() {
                var distanceScrolled = $(this).scrollTop();
                $('.bg-img').css('-webkit-filter', 'blur('+distanceScrolled/20+'px)');

        });
        $('.featured-threads > ul > li').hover(function(){
           $(this).find('.star').removeClass('transDown').addClass('transUp');
           $(this).find('.upvotecnt').removeClass('transDown').addClass('transUp');
        },function(){
           $(this).find('.upvotecnt').removeClass('transUp').addClass('transDown');
           $(this).find('.star').removeClass('transUp').addClass('transDown');
        });
        
        $('.bg-img,.change-cover').hover(function(){
            $('.change-cover').show();
        },function(){
            $('.change-cover').hide();
        });
        $('.change-cover').hover(function(){
            $('.tips-cover').show();
        },function(){
            $('.tips-cover').hide();
        });
        $('.change-cover').click(function(){
            $('.cover-image').click();
        });
        
        $('.cover-image').change(function(){
            uploadFile();
        });

        function uploadFile(){
            if(!$('.cover-image').prop('files')[0]){
                window.globalDraftFlag = false;
                return false;
            }
            //$('.round-progress-wrap').show();
            var _URL = window.URL;
            var file = $('.cover-image').prop('files')[0];
            var img = new Image(); 
            img.src = _URL.createObjectURL(file);
            img.onload = function () {
                if(this.width <= 1200 && this.height <= 400){
                    alert('Image too low');
                    return false;
                }
                else{
                    $('.loader-bg').show();
                    var loaded = 0;
                    var step = 1024*1024;
                    var total = file.size;
                    var start = 0;

                    var baseurl = $.trim($('#baseurl').val());
                    var reader = new FileReader();
                    var filename = file.name.replace(/[-_%&^$#@"'><!()]/g,'');
                    reader.onload = function(e){
                        var xhr = new XMLHttpRequest();
                        var upload = xhr.upload;
                        upload.addEventListener('load',function(){
                            loaded += step;
                            //progress.value = (loaded/total) * 100;
                            if(loaded <= total){
                                blob = file.slice(loaded,loaded+step);
                                reader.readAsBinaryString(blob);
                            }else{
                                loaded = total;
                            }
                        },false);

                    xhr.open("POST", baseurl+"Ajax_Controller/upload_cover_image/"+filename+"/"+new Date().getTime() + "/" + total);
                    xhr.overrideMimeType("application/octet-stream");
                    xhr.sendAsBinary(e.target.result);
                    xhr.onreadystatechange = function(){
                        if(xhr.readyState == 4 && xhr.status == 200){
                            var result = JSON.parse(xhr.responseText);
                            $.ajax({
                                type: 'post',
                                url: baseurl + "Ajax_Controller/rename_image",
                                dataType : "json",
                                data: {filename: result},
                                cache: false,
                                success: function(result){
                                    $('.loader-bg').hide();
                                    $('.bg-img').css('background','');
                                    $('.bg-img').css('background-image', 'url(' + result.image + ')');
                                    $('.bg-img').find('.dupfilename').val(result.image);
                                    $('.bg-img').css('cursor','move');
                                    $('.change-cover').hide();
                                    $('.save-cover').show();
                                    $('.cancel-cover').show();
                                    reposition();
                                    window.globalDraftFlag = true;
                                }
                            });
                        }
                    };
                    };
                    var blob = file.slice(start,step);
                    reader.readAsBinaryString(blob); 
                }
            };        
        }
        
        function reposition(){
            $(".bg-img").on('mousedown mouseup', function (e) {

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
                //$(this).css('border', '1px solid #1ba1e2');
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
    
        $(document).on('click','.save-cover',function(){
            var filename = $('.bg-img').find('.dupfilename').val();
            var baseurl = $.trim($('#baseurl').val());
            var coordinates = $('.bg-img').css('background-position');
            $.ajax({
                type: 'post',
                url: baseurl+'Ajax_Controller/save_cover_image',
                dataType : "json",
                data: {filename: filename,coordinates: coordinates},
                cache: false,
                beforeSend: function(){

                },
                success: function(result){
                    if(result.response === "true"){
                        location.reload();
//                        window.globalDraftFlag = false;
//                        $('.save-cover').hide();
//                        $('.cancel-cover').hide();
//                        $('.change-cover').show();
//                        $(".bg-img").on('mousedown mouseup', function (e) {
//                            e.preventDefault();
//                            e.stopPropagation();
//                        });
                    }
                }
            });
        });
        $(document).on('click','.cancel-cover',function(){
            window.globalDraftFlag = false;
            var filename = $('.bg-img').find('.dupfilename').val();
            var baseurl = $.trim($('#baseurl').val());
            $.ajax({
                type: 'post',
                url: baseurl+'Ajax_Controller/remove_cover_image',
                dataType : "json",
                data: {filename: filename},
                cache: false,
                beforeSend: function(){

                },
                success: function(result){
                    if(result.response === "true"){
                        window.location.reload();
                    }
                }
            });
        });
    }
    else if(screen.width < 480){
        
    }
    $('.loadMoreTimeline').click(function(){
        var t = $('#hdnTimelineT').val();
        var uname = $(this).attr('data-uname');
        var ele = $(this);
        
    });
});
window.onload = function(){
    if(!XMLHttpRequest.prototype.sendAsBinary){
    XMLHttpRequest.prototype.sendAsBinary = function(datastr) {  
            function byteValue(x) {  
                return x.charCodeAt(0) & 0xff;  
            }  
            var ords = Array.prototype.map.call(datastr, byteValue);  
            var ui8a = new Uint8Array(ords);  
            try{
                this.send(ui8a);
            }catch(e){
                this.send(ui8a.buffer);
            }  
    };  
    }
};