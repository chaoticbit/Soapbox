function search(){
    if($.trim($('.search-all-input').val())!==''){
   var baseurl = $('#baseurl').val();
    $.ajax({
        type: 'post',
        url: baseurl + 'Ajax_Controller/search_all',
        dataType: 'json',
        data: {key: $('.search-all-input').val()},
        cache: false,
        beforeSend: function () {

        },
        success: function (result) {
            $('.search--all-container').html(result.content);
        }
    });   
   }
}
$(document).ready(function(){ 
   var baseurl = $('#baseurl').val();
   $('.search--all-container').html('');
   $('.search-all-input').focus().val($('.search-all-input').val());
   search();
   $('.category-type-toggle').on('click',function(){
      $(this).find('.search-by-category-container').fadeToggle("fast");
   });
   $('.search-by-type > ul > li').click(function(){
      $('.search-by-type').find('.active').removeClass('active');
      $(this).addClass('active');
   });
   
   $('.search-all-input').bind('input',function(){
        var baseurl = $('#baseurl').val();
        var val = $.trim($(this).val());
        if($.trim(val)===''){
            $('.search--all-container').html('');
            history.pushState('','',baseurl + 'Search/');
            return;
        } 
        else{
            $.ajax({
                type: 'post',
                url: baseurl + 'Ajax_Controller/search_all',
                dataType: 'json',
                data: {key: val},
                cache: false,
                beforeSend: function () {

                },
                success: function (result) {
                    history.pushState('','',val);
                    $('.search--all-container').html(result.content);
                }
            });
        }
   });
   $('.s-all').bind('click',function(){
        search();
   });
   $('.s-ppl').bind('click',function(){
        $.ajax({
            type: 'post',
            url: baseurl + 'Ajax_Controller/search_people',
            dataType: 'json',
            data:{key: $.trim($('.search-all-input').val())},
            cache:false,
            beforeSend:function(){
                
            },
            success:function(result){
                $('.search--all-container').html(result.content);
            }
        });
   });
   $('.s-tags').bind('click',function(){
        $.ajax({
            type: 'post',
            url: baseurl + 'Ajax_Controller/search_tags',
            dataType: 'json',
            data:{key: $.trim($('.search-all-input').val())},
            cache:false,
            beforeSend:function(){
                
            },
            success:function(result){
                $('.search--all-container').html(result.content);
            }
        });
   });
   
   $('.search-by-category-container > li').bind('click',function(){
        $.ajax({
            type: 'post',
            url: baseurl + 'Ajax_Controller/search_by_category',
            dataType: 'json',
            data:{key: $.trim($('.search-all-input').val()),cid:$(this).attr('data-cid')},
            cache:false,
            beforeSend:function(){
                
            },
            success:function(result){
                $('.search--all-container').html(result.content);
            }
        });       
   });
   
   $('.tab-container p.featured-tags-title').on('click',function(){
        if($(this).attr('data-ref') === 'stmli'){
            $('p[data-ref="spmli"]').removeClass('active');
            $('p[data-ref="stgmli"]').removeClass('active');
            $(this).addClass('active');
            $('.spmli,.stgmli').hide();
            $('.stmli').show();
        }
        else if($(this).attr('data-ref') === 'spmli'){
            $('p[data-ref="stmli"]').removeClass('active');
            $('p[data-ref="stgmli"]').removeClass('active');
            $(this).addClass('active');
            $('.stmli,.stgmli').hide();
            $('.spmli').show();
        }
        else if($(this).attr('data-ref') === 'stgmli'){
            $('p[data-ref="stmli"]').removeClass('active');
            $('p[data-ref="spmli"]').removeClass('active');
            $(this).addClass('active');            
            $('.stmli,.spmli').hide();
            $('.stgmli').show();
        }
   });
   
   $('.search-all-input-mobile').bind('input',function(){
       var baseurl = $('#baseurl').val();
       if($.trim($(this).val())===''){
            $('.clear-text').hide();
            $('.stmli,.spmli,.stgmli').html('');
            return;
        } 
        else{
            $('.clear-text').show();
            $.ajax({
                type: 'post',
                url: baseurl + 'Ajax_Controller/search_threads_mobile',
                dataType: 'json',
                data:{key: $.trim($('.search-all-input-mobile').val())},
                cache:false,
                beforeSend:function(){
                    if($('p.featured-tags-title[data-ref="stmli"]').hasClass('active')){
                        $('.stmli').html('<div class="txt-center" style="padding: 30px 0;"><i class="fa fa-circle-o-notch fa-spin fg-grayDark txt-center" style=""></i></div>');
                    }
                    else if($('p.featured-tags-title[data-ref="spmli"]').hasClass('active')){
                        $('.spmli').html('<div class="txt-center" style="padding: 30px 0;"><i class="fa fa-circle-o-notch fa-spin fg-grayDark txt-center" style=""></i></div>');
                    }
                    else if($('p.featured-tags-title[data-ref="stgmli"]').hasClass('active')){
                        $('.stgmli').html('<div class="txt-center" style="padding: 30px 0;"><i class="fa fa-circle-o-notch fa-spin fg-grayDark txt-center" style=""></i></div>');
                    }
                },
                success:function(result){
                    $('.stmli').html(result.content);
                    $('.spmli').html(result.content1);
                    $('.stgmli').html(result.content2);
                }           
           });
       }
   });
   $('.clear-text').click(function(){
        $('.search-all-input-mobile').val('');
        $('.stmli,.spmli,.stgmli').html('');
        $(this).hide();
        $('.search-all-input-mobile').focus();
   });
});