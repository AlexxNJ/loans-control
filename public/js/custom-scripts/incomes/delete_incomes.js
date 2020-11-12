$('.table-incomes tr td .btn-delete').click(function(){
    let income_id = $(this).parents('tr').find('td').eq(0).html();
    let csrf_token = $('#csrf_token_index').val()
    $.ajax({
        type:'DELETE',
        url:`incomes/${income_id}`,
        data:{_token:csrf_token},
        success:function(data){
            if(data == 'success'){
                location.reload()
            }
        }
    })

}) 