$(document).ready(function () {

    window.globalDraftFlag = false;
    var is_chrome = navigator.userAgent.indexOf('Chrome') > -1;
    var is_explorer = navigator.userAgent.indexOf('MSIE') > -1;
    var is_firefox = navigator.userAgent.indexOf('Firefox') > -1;
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
    
    //addDNDListener(document.getElementById('editable'));    
    if (screen.width < 480) {
        $('blockquote').css('margin','0');
    }
    var th;
    $('.thread-desc').each(function(){
        $(this).find('a').attr('target','_blank');
        var tid = $(this).closest('.thread').attr('data-tid');
        var baseurl = $.trim($('#baseurl').val());
        th = $(this).height();    
        var elem = $(this);
        if(th >= '200'){
            $('<div class="pure-u-1">\n\
               <p><a href="'+baseurl+'Thread/'+tid+'">Read more</a></p>\n\
               </div>').insertAfter(elem); 
        }
    });
    
    
    var editor = new MediumEditor('.editable', {
        placeholder:false,
        imageDragging: false,
        fileDragging: false,
        sticky:true,
        autoLink:false,
        toolbar:{
            buttonLabels: 'fontawesome',
            buttons: ['bold', 'italic', 'underline', 'anchor', 'quote','h3','h4','h5','h6','pre','unorderedlist','orderedlist'],
            targetBlank: true,
            externalInteraction: true,
            cleanPastedHTML: false
        }
    });
    $('.editable').on('input', function () {
        $('.duptarea').val($(this).html());
    });
    $('.toggle-editor').click(function(){
        $(this).closest('.new-thread-button').slideUp();
        $('.editable-wrapper').slideDown();        
        $('.editable-wrapper').find('.thread-title-input').focus();
    });   
    
    $('.thread-title-input').bind('input',function(){
        if($(this).val().length > 1){
            window.globalDraftFlag = true;
            if($(this).val().length >= 100){
                $(this).css('background','rgba(229,20,0,0.25)');
                $(this).val($(this).val().slice(0, 100));
                return false;
            }
            else{
                $(this).css('background','');
            }
        }
        else{
            window.globalDraftFlag = false;
        }
    });
    $('.untoggle-editor').click(function(){
        askConfirm();
        $('.editable-wrapper').slideUp();
        $('.new-thread-button').slideDown(function(){
            $('.thread-title-input').val('');
            $('.editable').html('');
            $('.duptarea').val('');
            $('.tags').val('');
            $('.tags').attr('data-cnt','0');
            $('.dupfilename').val('');
            $('.tag-input-div .tag').remove();  
            $('.thread-image-preview').css('background','');
            $('.thread-image-preview').css('display', 'none');
        });    
        window.globalDraftFlag = false;
    }); 
    
    /*UPLOAD IMAGE*/
    
    $(document).on('click', '.upload_image_toggle', function(){
        $('.thread-image').click();
    });
    $('.thread-image').change(function(){
        $('.thread-image-preview-wrapper').show();
        var w = $('.image-upload-progress').parent().width();
        $('.image-upload-progress').css('width',w +'px');
        uploadFile();
    }); 
    
    $('.upload_descimage_toggle').click(function(){
        $('.desc-image').click();
    });
    $('.desc-image').change(function(){
        uploadImages();
    });  
    
    function regex_escape(str) {
        return str.replace(new RegExp('[.\\\\+*?\\[\\^\\]$(){}=!<>|:;\\-\']', 'g'), '\\$&');
    }
    
    $(document).on('click','.tag-autocomplete-dropdown > ul > li > a',function(){
        addtags($.trim($(this).text()));
        $('.thread-tags-input').focus();
        $('.tag-autocomplete-dropdown').hide();
    });
    
    function addtags(tag){
        var value = $('.tags').val();
        var cnt = $('.tags').attr('data-cnt');
        if (cnt !== '5') {
            if (value !== "") {
                var array = $('.tags').val().split(",");
                if ($.inArray(tag, array) === -1) {
                    $('<a href="#" class="tag" style="float: left;transform: translate(0,25%);" id="tag-' + tag.replace(/[^a-zA-Z0-9]/g, "") + '">' + tag.replace(/[^a-zA-Z0-9]/g, "") + '</a>').insertBefore($('.thread-tags-input'));
                    $('.tags').attr('data-cnt', cnt);
                    $('.tags').val(value + ',' + tag.replace(/[^a-zA-Z0-9]/g, ""));
                    $('.thread-tags-input').focus();
                    $('.thread-tags-input').val('');
                    cnt++;
                    $('.tags').attr('data-cnt', cnt);
                }
                else {
                    //
                }
            }
            else {
                $('<a href="#" class="tag" style="float: left;transform: translate(0,25%);" id="tag-' + tag.replace(/[^a-zA-Z0-9]/g, "") + '">' + tag.replace(/[^a-zA-Z0-9]/g, "") + '</a>').insertBefore($('.thread-tags-input'));
                $('.tags').val(tag.replace(/[^a-zA-Z0-9]/g, ""));
                $('.thread-tags-input').focus();
                $('.thread-tags-input').val('');
                cnt++;
                $('.tags').attr('data-cnt', cnt);
            }
            $('.tag-autocomplete-dropdown').hide();
        }
        else
            $('.thread-tags-input').val('');
    }
    $('.thread-tags-input').bind('input',function(){
        $(this).val($(this).val().replace(/\s/g, ''));
        $(this).val($(this).val().replace(/[^a-zA-Z0-9]/g, ""));
        var baseurl = $('#baseurl').val();
        var val = $.trim($(this).val());
        if ($.trim(val) === '') {
            $('.tag-autocomplete-dropdown').hide();
            $('.tag-autocomplete-dropdown > ul').html('');
            return;
        }
        else{
            $('.tag-autocomplete-dropdown').show();
            $.ajax({
                type: 'post',
                url: baseurl + "Ajax_Controller/autocomplete_tags",
                dataType : "json",
                data: {key: val},
                cache: false,
                success: function(result){
                    $('.tag-autocomplete-dropdown > ul').html(result.content);
                }
            });
        }
    });
     $('.thread-tags-input').bind('keydown', function (e) {
        var $listItems = $('.tag-autocomplete-dropdown > ul > li');
        var key = e.keyCode, $selected = $listItems.filter('.selected'), $current;
        if (key !== 40 && key !== 38 && key !== 13 && key !== 27 && key !== 8) {
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
            if ($(this).val() !== "") {
                addtags($(this).val());
            }
            return false;
        }
        else if (key === 27) {
            //
        }
        else if (key === 8 && $(this).val() === "") {
            var array = $('.tags').val().split(",");
            var cnt = $('.tags').attr('data-cnt');
            var newstr = "";
            $('.thread-tags-input').parent().find('#tag-' + regex_escape(array[array.length - 1])).remove();
            for (var i = 0; i < array.length - 1; i++) {
                if (i === 0) {
                    newstr = newstr + array[i];
                }
                else {
                    newstr = newstr + "," + array[i];
                }
            }
            cnt--;
            $('.tags').attr('data-cnt', cnt);
            $('.tags').val(newstr);
            return false;
        }
        $current.addClass('selected');
        $(this).val($current.text());
//        if (e.keyCode === 13) {
//            if ($(this).val() !== "") {
//                addtags($(this).val(), 'desktop-enter');
//            }
//            return false;
//        }
//        if (e.keyCode === 8 && $(this).val() === "") {
//            var array = $('.tags').val().split(",");
//            var cnt = $('.tags').attr('data-cnt');
//            var newstr = "";
//            $('.thread-tags-input').parent().find('#tag-' + regex_escape(array[array.length - 1])).remove();
//            for (var i = 0; i < array.length - 1; i++) {
//                if (i === 0) {
//                    newstr = newstr + array[i];
//                }
//                else {
//                    newstr = newstr + "," + array[i];
//                }
//            }
//            cnt--;
//            $('.tags').attr('data-cnt', cnt);
//            $('.tags').val(newstr);
//            return false;
//        }
    });    
    
    
    function addDNDListener(obj){
        obj.addEventListener('dragover',function(e){
            e.preventDefault();
            e.stopPropagation();
//            $('.editable-wrapper').css({borderColor: '#ccc'});            
        },false);
        obj.addEventListener('dragenter',function(e){
            e.preventDefault();
            e.stopPropagation();
        },false);
        obj.addEventListener('dragleave',function(e){
            e.preventDefault();
            e.stopPropagation();
//            $('.editable-wrapper').css({borderColor:'#fff'});
        },false);
        obj.addEventListener('drop',function(e){
            e.preventDefault();
            e.stopPropagation();            	
            var filelist = e.dataTransfer.files;
            if(filelist.length > 1){
//                $('.editable').css('cursor','no-drop');
//                $('.editable-wrapper').css({borderColor:'#fff'});
                return;
            }
            var file = filelist[0];            
            if(file.type === 'image/jpeg' || file.type === 'image/jpg' || file.type === 'image/png' || file.type === 'image/JPEG' || file.type === 'image/JPG' || file.type === 'image/PNG'){
//                $('.thread-image-preview-wrapper').show();
//                var w = $('.image-upload-progress').parent().width();
//                $('.image-upload-progress').css('width',w +'px');
                uploadFileDragDrop(file);
            }
            else{
                $('.editable').css({borderColor:'#fff'});
                return;
            }
        },false);
    }
    
    function updateTextArea() {
        $(".duptarea").val($(".editable").html());    
    }

    function htmlEncode(value) {
        return $('<div/>').text(value).html();
    }
    function insertElementAtCursor(elm) {
    var sel, range, html;
        if (window.getSelection) {
            sel = document.getSelection();
            if (sel.getRangeAt && sel.rangeCount) {
                range = sel.getRangeAt(0);
                range.deleteContents();
                range.insertNode(elm);
                placeCaretAfterNode(elm);
                updateTextArea();
            }
        }
    }
    
    function placeCaretAfterNode(node) {
        if (typeof window.getSelection != "undefined") {
            var range = document.createRange();
            range.setStartAfter(node);
            range.collapse(true);
            var selection = window.getSelection();
            selection.removeAllRanges();
            selection.addRange(range);
        }
    }
    
    function uploadFile(){
        if(!$('.thread-image').prop('files')[0]){
            window.globalDraftFlag = false;
            return false;
        }
        $('.round-progress-wrap').show();
        var file = $('.thread-image').prop('files')[0];
        var progress = document.getElementById("image-upload-progress");
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
                progress.value = (loaded/total) * 100;
                if(loaded <= total){
                    blob = file.slice(loaded,loaded+step);
                    reader.readAsBinaryString(blob);
                }else{
                    loaded = total;
                }
            },false);
            
        xhr.open("POST", baseurl+"Ajax_Controller/upload_image/"+filename+"/"+new Date().getTime() + "/" + total);
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
                        $('.upload_image_toggle').addClass('tilt remove-image');
                        $('.upload_image_toggle').removeClass('upload_image_toggle');
                        $('.thread-image-preview').css('background-image', 'url(' + result.image + ')');
                        $('.thread-image-preview').css('display', 'block');
                        $('.dupfilename').val(result.image);
                        $('.editable-wrapper').css({borderColor:'#fff'});
                        window.globalDraftFlag = true;
                    }
                });
            }
        };
        };
        var blob = file.slice(start,step);
        reader.readAsBinaryString(blob); 
    }
    
    function uploadImages(){
        if(!$('.desc-image').prop('files')[0]){
            window.globalDraftFlag = false;
            return false;
        }
        //$('.round-progress-wrap').show();
        var file = $('.desc-image').prop('files')[0];
        //var progress = document.getElementById("image-upload-progress");
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
            
        xhr.open("POST", baseurl+"Ajax_Controller/upload_image/"+filename+"/"+new Date().getTime() + "/" + total);
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
                        var arr = $('.dupimages').val();
                        if(arr === ''){
                            $('.dupimages').val(result.image);
                        }
                        else{
                            $('.dupimages').val($('.dupimages').val() + ',' + result.image);
                        }
                        var div = document.createElement('div');
                        div.className = 'relative';
                        var cross = document.createElement('i');
                        cross.setAttribute('data-path',result.image);
                        cross.className = 'fa fa-times fg-white remove-desc-image';
                        var img = document.createElement("img");
                        img.setAttribute("src", baseurl + result.image);
                        div.appendChild(cross);
                        div.appendChild(img);
                        $(".editable").focus();
                        insertElementAtCursor(div);
                        window.globalDraftFlag = true;
                    }
                });
            }
        };
        };
        var blob = file.slice(start,step);
        reader.readAsBinaryString(blob); 
    }
    
//    function uploadFileDragDrop(file){        
//        var loaded = 0;
//        var step = 1024*1024;
//        var total = file.size;
//        var start = 0;
//        var progress = document.getElementById('image-upload-progress');
//        var baseurl = $.trim($('#baseurl').val());
//        
//        var reader = new FileReader();
//
//        reader.onload = function(e){
//            var xhr = new XMLHttpRequest();
//            var upload = xhr.upload;
//            upload.addEventListener('load',function(){
//                loaded += step;
//                progress.value = (loaded/total) * 100;
//                if(loaded <= total){
//                   blob = file.slice(loaded,loaded+step);
//                    reader.readAsBinaryString(blob);
//                }else{
//                    loaded = total;
//                }
//            },false);
//        xhr.open("POST", baseurl+"Ajax_Controller/upload_image/"+file.name+"/"+new Date().getTime() + "/" + total);
//        xhr.overrideMimeType("application/octet-stream");
//        xhr.sendAsBinary(e.target.result);
//        xhr.onreadystatechange = function(){
//            if(xhr.readyState == 4 && xhr.status == 200){
//                var result = JSON.parse(xhr.responseText);
//                $.ajax({
//                    type: 'post',
//                    url: baseurl + "Ajax_Controller/rename_image",
//                    dataType : "json",
//                    data: {filename: result},
//                    cache: false,
//                    success: function(result){
//                        //$('.thread-image-preview').css('background-image', 'url(' + result.image + ')');                
//                        document.getElementById('rmimg').setAttribute('data-f',result.image);
//                        var arr = $('.dupfilename').val();
//                        if(arr === ''){
//                            $('.dupfilename').val(result.image);
//                        }
//                        else{
//                            $('.dupfilename').val($('.dupfilename').val() + ',' + result.image);
//                        }
//                        $('.editable-wrapper').css({borderColor:'#fff'});
//                        window.globalDraftFlag = true;
//                    }
//                });
//            }
//        };
//        };
//        var blob = file.slice(start,step);
//        reader.readAsBinaryString(blob); 
//    }
    
    $('.upload_image_toggle_ios').click(function(){ $('.thread-image-ios').click(); });
    $('.thread-image-ios').change(function(){
        if(!$('.thread-image-ios').prop('files')[0]){
            window.globalDraftFlag = false;
            return false;
        }
        $('.thread-image-preview-wrapper').show();
        var w = $('.image-upload-progress').parent().width();
        $('.image-upload-progress').css('width',w +'px');
        var file = $('.thread-image-ios').prop('files')[0];
        var loaded = 0;
        var step = 1024*1024;
        var total = file.size;
        var start = 0;
        var progress = document.getElementById('image-upload-progress');
        var baseurl = $.trim($('#baseurl').val());
        var reader = new FileReader();
        var filename = file.name.replace(/[-_%&^$#@"'><!()]/g,'');
        reader.onload = function(e){
            var xhr = new XMLHttpRequest();
            var upload = xhr.upload;
            upload.addEventListener('load',function(){
                loaded += step;
                progress.value = (loaded/total) * 100;
                if(loaded <= total){
                    blob = file.slice(loaded,loaded+step);
                    reader.readAsBinaryString(blob);
                }else{
                    loaded = total;
                }
            },false);
            
        xhr.open("POST", baseurl+"Ajax_Controller/upload_image_ios/"+filename+"/" + total);
        xhr.overrideMimeType("application/octet-stream");
        xhr.sendAsBinary(e.target.result);
        xhr.onreadystatechange = function(){
            if(xhr.readyState == 4 && xhr.status == 200){
                    var result = JSON.parse(xhr.responseText);                    
                    alert(result);
                    $('.thread-image-preview').css('background-image', 'url(' + result + ')');
                    $('.thread-image-preview').css('display', 'block');
                    $('.dupfilename').val(result);
                    $('.editable-wrapper').css({borderColor:'#fff'});
                    window.globalDraftFlag = true;
            }
        };
        };
        var blob = file.slice(start,step);
        reader.readAsBinaryString(blob); 
    });

    $('.btn-post').click(function(){
        var title = $('.thread-title-input').val();
        var desc = $('.duptarea').val();
        desc = regex_escape(desc);
        var filename = $('.dupfilename').val();
        var coordinates = $('.thread-image-preview').css('background-position');
        var tags = $('.tags').val();
        var category = $('.thread-input-category').val();
        var baseurl = $.trim($('#baseurl').val());
        var elem = $(this);
//        var array = $('.dupimages').val().split(",");
//        var list = $(".editable .relative > i").map(function(){return $(this).attr("data-path");}).get();
//        if(array.toString() === list.toString())
//            alert('adju');
//        else
//            alert('not adju');
//        return;
        if($.trim(title) === ""){
            alert('Title is mandatory.');
            return;
        }
        if($('.thread-input-category').val()==0){
            $(window).scrollTop(0);
            alert('Category is mandetory.');
            return;
        }
        $('.btn-post').attr('disabled', 'disabled');
        $.ajax({
            type: 'post',
            url: baseurl+'Ajax_Controller/post_thread',
            dataType : "json",
            data: {title: title,desc: desc,filename: filename,coordinates: coordinates,tags: tags,category: category},
            cache: false,
            beforeSend: function(){
                $(elem).parent().find('.loader').show();
            },
            success: function(result){
                if(result !== "false"){
                    $(elem).parent().find('.loader').hide();
                    window.globalDraftFlag = false;
                    $(window).scrollTop(0);
                    //$('.progress').animate({width: '100%'},200);
                        $('.editable-wrapper').slideUp(function(){
                            $('.new-thread-button').slideDown(function(){
                                $('.no-content-note').remove();
                                $(result.content).insertBefore('li.thread:first'); 
                                $('li.thread:first').fadeIn();
                            }); 
                        });
                        $('.thread-title-input').val('');
                        $('.editable').html('');
                        $('.duptarea').val('');
                        $('.tags').val('');
                        $('.tags').attr('data-cnt','0');
                        $('.dupfilename').val('');
                        $('.tag-input-div .tag').remove();
                        $('.thread-image-preview').css('background','');
                        $('.thread-image-preview').css('display', 'none');
                        $('.btn-post').removeAttr('disabled');
                        $('.threadul > li:first .thread-desc').find('a').attr('target','_blank');
                      //  $('.progress').css('width','0%');                        
                }
                else{
                    alert('Something went wrong. Please try again later.');
                }
            }
        });
    });
    $('.btn-post-mobile').click(function(){
        var title = $('.thread-title-input').val();
        var desc = $('.duptarea').val();
        desc = regex_escape(desc);
        var filename = $('.dupfilename').val();
        var coordinates = $('.thread-image-preview').css('background-position');
        var tags = $('.tags').val();
        var category = $('.thread-input-category').val();
        var baseurl = $.trim($('#baseurl').val());

        if($.trim(title) === ""){
            alert('Title is mandatory.');
            return;
        }
        if($('.thread-input-category').val()==0){
            $(window).scrollTop(0);
            alert('Category is mandetory.');
            return;
        }
        //$('.btn-post-mobile').attr('disabled', 'disabled');
        $.ajax({
            type: 'post',
            url: baseurl+'Ajax_Controller/post_thread_mobile',
            dataType : "json",
            data: {title: title,desc: desc,filename: filename,coordinates: coordinates,tags: tags,category: category},
            cache: false,
            beforeSend: function(){
                $('.post-loader').show();
            },
            success: function(result){
                if(result !== "false"){
                    window.location.href = baseurl + 'Thread/' + result.content;
                }
                else{
                    alert('Something went wrong. Please try again later.');
                }
            }
        });
    });
    
    $(document).on('click', '.remove-image', function(){
        var elem = $(this);
        var filename = $('.dupfilename').val();
        var baseurl = $.trim($('#baseurl').val());
        $.ajax({
            type :'POST',
            url: baseurl + 'Ajax_Controller/remove_image/',
            dataType: "json",
            data: {filename:filename},
            cache: false,
            success:function(result){
                if(result.response === "true"){
                    $(elem).addClass('upload_image_toggle');
                    $(elem).removeClass('remove-image tilt fg-red');
                    window.globalDraftFlag = false; 
                    $('.thread-image').val("");
                    $('.thread-image-preview-wrapper').hide();
                    $('.thread-image-preview').css('background-image','');
                    $('.dupfilename').val('');
                }
                else{
                    //
                }
            }
        });
    });
    
    $(document).on('click','.remove-desc-image',function(){
        var filename = $(this).attr('data-path');
        var baseurl = $.trim($('#baseurl').val());
        var elem = $(this);
        $.ajax({
            type :'POST',
            url: baseurl + 'Ajax_Controller/remove_image/',
            dataType: "json",
            data: {filename:filename},
            cache: false,
            success:function(result){
                if(result.response === "true"){
                    window.globalDraftFlag = false; 
                    $('.desc-image').val("");
                    $(elem).parent().remove();
                    var array = $('.dupimages').val().split(",");
                    var newstr = "";
                    for (var i = 0; i < array.length - 1; i++) {
                        if (i === 0) {
                            newstr = newstr + array[i];
                        }
                        else {
                            newstr = newstr + "," + array[i];
                        }
                    }
                    $('.dupimages').val(newstr);
                }
                else{
                    //
                }
            }
        });
    });

    $(".thread-image-preview").on('mousedown mouseup', function (e) {

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
    
    $(document).on('click','.report-spam > ul > li',function(){
//        $('.report-spam > ul > li').find('input').attr('checked',false);        
//        $(this).find('input').attr('checked',true);        
    });
    
//    $('.featured-threads > ul > li').hover(function(){
//           $(this).find('.star').removeClass('transDown').addClass('transUp');
//           $(this).find('.upvotecnt').removeClass('transDown').addClass('transUp');
//        },function(){
//           $(this).find('.upvotecnt').removeClass('transUp').addClass('transDown');
//           $(this).find('.star').removeClass('transUp').addClass('transDown');
//    });
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