 
$(document).ready(function(e) {
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

$(".profile_edit_btn").click(function(e){


	$(this).parents(".profile_box").addClass("active");
});

$(".profile_save_btn").click(function(e){


    let id = parseInt($('input[name="user_id"]').val());
    let type = $(this).attr('data-type');
    let fieldValue = $(this).closest('.profile_box').find('input[name="'+type+'"]').val();
    let fieldName = '';
    if (type === 'address') {
        fieldName = 'address';
        fieldValue = $(this).closest('.profile_box').find('textarea[name="'+type+'"]').val();
	}
	// request save data
    let obj  = $(this);
    $.ajax({
        url:app_url+'/profile/update',
        type: 'POST',  // user.destroy
        data: { id: id, type: type , fieldValue:fieldValue },
        success: function(result) {
            if(result.status) {
                $(obj).text('Feature')
            }else {
                $(obj).text('Not Feature');
            }
        }
    });
    $(this).closest('.profile_box').find('.profile_afterEdit').html(fieldValue);
	$(this).parents(".profile_box").removeClass("active");
});





 //end ready
 });


 
 
 
 
 
 

 