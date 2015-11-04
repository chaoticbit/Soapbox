$(document).ready(function(){
    $('.category').on('mouseover', function(){
        if(!$(this).hasClass('active')){    
            $(this).find('.category-bg').addClass('scale');
            //$(this).find('.category-defocus').css('background', 'linear-gradient(45deg,#46bddb 20%,#4889f8 40%,#9372bf 100%)');
            $(this).find('.category-defocus').css('background', 'rgba(0,0,0,0.9)');
            $(this).find('.category-title').removeClass('hidden');
            $(this).find('p').removeClass('hidden');
        }
    });
    $('.category').on('mouseout', function(){
        if(!$(this).hasClass('active')){
            $(this).find('.category-bg').removeClass('scale');
            $(this).find('.category-defocus').css('background', 'transparent');
            $(this).find('.category-title').addClass('hidden');
            $(this).find('p').removeClass('hidden');
        }
    });
    $('.category').on('click', function(){
        if($(this).hasClass('active')){
            $(this).removeClass('active');
            $(this).find('.fa-check-circle').addClass('hidden');
            var val = $(this).attr('data-id');
            var array = $('#selected-categories').val().split(",");
            var newstr = "";
            for (var i = 0; i < array.length; i++) {
                if(array[i]===val)
                    continue;
                if (newstr==="") {
                    newstr = newstr + array[i];
                }
                else {
                    newstr = newstr + "," + array[i];
                }
            }
            $('#selected-categories').val(newstr);
        }
        else{
            $(this).addClass('active');
            $(this).find('.fa-check-circle').removeClass('hidden');
            
            var val = $(this).attr('data-id');
            var string = $('#selected-categories').val();
            string = string + val + ',';
            $('#selected-categories').val(string);
        }
    });
$('.btn-update').click(function(){
        var array = $('#selected-categories').val();
        var baseurl = $.trim($('#baseurl').val());
        if(array.length<2){
            alert('You must select at least one category.');
            return;
        }
        $('.btn-update > button').attr('disabled','disabled');
        $.ajax({
            type: 'post',
            url: baseurl + 'Ajax_Controller/update_categories',
            dataType:'json',
            data:{array:array},
            success:function(result){
                if(result.response === 'true'){
                    alert('Categories updated!');
                    $('.btn-update > button').removeAttr('disabled');
                }
            }
        });
        
    });});