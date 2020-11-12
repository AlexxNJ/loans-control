$('.table-loans tr td .btn-delete').click(function(){
    let customer_id = $(this).parents('tr').find('td').eq(0).html();
    let date = $(this).parents('tr').find('td').eq(2).html();
    let csrf_token = $('#csrf_token_index').val()
    $.ajax({
        type:'DELETE',
        url:`loans/${customer_id}`,
        data:{_token:csrf_token,date},
        success:function(data){
            if(data == 'success'){
                location.reload()
            }
        }
    })

}) 