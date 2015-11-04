$(document).ready(function(){     
   $('.list > li').click(function(){
      var baseurl = $('#baseurl').val();
      var tid = $(this).attr('data-tid') ;
      var ele = $(this);
      if($(this).hasClass('active')){
          return;
      }
      $.ajax({
            type: 'post',
            url: baseurl + 'Ajax_Controller/fetch_list_thread',
            dataType: 'json',
            cache: false,
            data: {tid:tid},
            beforeSend : function(){
                
            },
            success: function(result){
                $('.list > li').removeClass('active');
                $(ele).addClass('active');
                $('.readingparent').html(result.content);
                history.pushState('','',tid);
            }
      });
   });
   $(document).on('click','.nxt-thread-toggle',function(){
      var baseurl = $('#baseurl').val();
      var tid = $(this).attr('data-tid') ;
      var nextsrno = $(this).attr('data-next') ;
      var ele = $(this);
      $.ajax({
            type: 'post',
            url: baseurl + 'Ajax_Controller/fetch_list_thread_next',
            dataType: 'json',
            cache: false,
            data: {tid:tid,nextsrno:nextsrno},
            beforeSend : function(){
                
            },
            success: function(result){
                $('.readingparent').html(result.content);
            }
      });
   });
});


