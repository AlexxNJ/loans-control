$('.table-loans tr td .loans').click(function(){
    let customer_id = $(this).parents('tr').find('td').eq(0).html();
    let date =$(this).parents('tr').find('td').eq(2).html();
    let amount = $(this).parents('tr').find('span').html();
    let interest = $(this).parents('tr').find('.interest').val();
    let scheme = $(this).parents('tr').find('td').eq(6).html();
    let notes = $(this).parents('tr').find('td').eq(7).html();

    $(`#edit_select_customer option[value='${customer_id}']`).attr("selected",true)
    $('#datepicker_edit_loan').datepicker('setDate',date);
    $('.e_amount').val(amount)
    $('#e_interest_percentage').val(interest*100)
    $(`#edit_select_escheme option[value='${scheme}']`).attr('selected',true)
    $('#e_notes').val(notes)

    $('#old_customer_id').val(customer_id)
    $('#old_date').val(date)
})

$('.e_guardaPrestamo').click(function(){
    $('.div-alert').empty()
    let csrf = $('#csrf').val()
    let customer_id = $(`#edit_select_customer`).val()
    let old_customer_id = $('#old_customer_id').val()
    let amount = $('.e_amount').val()
    let date = $('#datepicker_edit_loan').val()
    let old_date =$('#old_date').val();
    let interest = $('#e_interest_percentage').val() / 100
    let scheme = $(`#edit_select_escheme`).val()
    let notes = $('#e_notes').val()
    
    let valores = {customer_id,amount,old_date,date,interest,scheme,notes}

    $.ajax({
        type:'PUT',
        url:`loans/${old_customer_id}`,
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