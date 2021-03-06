$('.table-expenses tr td .expense').click(function(){
    let expense_id = $(this).parents('tr').find('td').eq(0).html();
    let date = $(this).parents('tr').find('td').eq(1).html();
    let amount = $(this).parents('tr').find('span').html();
    let description = $(this).parents('tr').find('td').eq(3).html();

    $('#expense_id').val(expense_id)
    $('#kt_datepicker_1_modal').datepicker('setDate',date);
    $('#amount').val(amount)
    $('#description').val(description)
})

$('.guardaDatos').click(function(){
    $('.div-alert').empty()
    let csrf_token = $('#csrf_token').val()
    let expense_id = $('#expense_id').val()
    let date = $('#kt_datepicker_1_modal').val();
    let amount = $('#amount').val()
    let description = $('#description').val()

    let valores = {date,amount,description}

    $.ajax({
        type:'PUT',
        url:`expenses/${expense_id}`,
        data:{_token:csrf_token,valores},
        success:function(data){
            if(data == 'success'){
                location.reload()
            }else{
                $('.div-alert').append(`<div class="form-group">
                <div class="alert alert-danger" role="alert">
                    A ocurrido un error, intentelo de nuevo.
                </div>
            </div>`);
            }
        }
    })
})