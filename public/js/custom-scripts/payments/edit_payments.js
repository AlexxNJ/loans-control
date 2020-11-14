$('.table-payments tr td .payment').click(function(){
    let payment_id = $(this).parents('tr').find('td').eq(0).html();
    let date = $(this).parents('tr').find('td').eq(1).html();
    let amount = $(this).parents('tr').find('span').html();
    let customer_id = $(this).parents('tr').find('.customer_id').val();
    let notes = $(this).parents('tr').find('td').eq(5).html();

    $('#payment_id').val(payment_id)
    $('#datepicker_edit_payment').datepicker('setDate',date);
    $('.e_amount').val(amount)
    $(`#edit_select_customer option[value=${customer_id}]`).attr('selected',true)
    if(notes == '...'){
        $('#e_notes').val('')
    }else{
        $('#e_notes').val(notes)
    }
})


$('.guardarEditarPago').click(function(){
    $('.div-alert').empty()
    let csrf = $('#csrf').val()
    let payment_id = $('#payment_id').val()
    let date = $('#datepicker_edit_payment').val();
    let amount = $('.e_amount').val()
    let customer_id = $(`#edit_select_customer`).val()
    let notes = $('#e_notes').val()

    let valores = {date,amount,customer_id,notes}
    $.ajax({
        type:'PUT',
        url:`payments/${payment_id}`,
        data:{_token:csrf,valores},
        success:function(data){
            console.log(data);
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