$(document).ready(function(){
    let table = $('.table-loans');
    table.DataTable({
        "lengthMenu":[[5,10,25,50,100],[5,10,25,50,100]],
        crollY: '50vh',
        scrollX: true,
        scrollCollapse: true
    })
})
$('.btn-create-loan').click(function(){
    let available_wallet = parseFloat($('#available_wallet').html())
    let available_interests = parseFloat($('#available_interests').html())

    $('.amount').keyup(function(){
        $('.alert-no-money').empty()
        let amount = $(this).val() == '' ? 0 : parseFloat($(this).val())
        let loans = []
        let sum_av_money = available_wallet + available_interests;
        if(amount>available_wallet){
            loans.push(available_wallet)
            $('#available_wallet').html(0)

            let ad_operation = amount - loans[0];
            let subtraction = available_interests - ad_operation;
            $('#available_interests').html(subtraction)
            loans.push(ad_operation)
        }
        else{
            let subtraction = available_wallet - amount;
            $('#available_wallet').html(subtraction)
            $('#available_interests').html(available_interests)
        }
        if(amount>sum_av_money){
            //$('#available_interests').html(0)
            $('.alert-no-money').append(`<div class="form-group">
            <div class="alert alert-danger" role="alert">
                No hay dinero suficiente para el prestamo
            </div>
        </div>`);
        }
        //console.log(loans);
        $("#array_loans").val(JSON.stringify(loans))
    })
})


$('.guardaPrestamo').click(function(){
    $('.div-alert').empty()
    let csrf = $('#csrf_token').val()
    let array_loans = JSON.parse($("#array_loans").val())
    let customer_id = $('#select_customer').val() 
    let amount_loan = []
    let date = $('#kt_datepicker_1_modal').val()
    let interest_percentage = $('#interest_percentage').val() / 100
    let scheme = $('#select_escheme').val()
    let notes = $('#notes').val()
    if(array_loans.length == 0){
        amount_loan.push(parseFloat($('.amount').val()))
        let valores = {customer_id,'array_loans':amount_loan,date,interest_percentage,scheme,notes}
        guardaDatosPrestamo(csrf,valores,['billetera'])
    }else if(array_loans[0] == 0){
        amount_loan.push(array_loans[1])
        let valores = {customer_id,'array_loans':amount_loan,date,interest_percentage,scheme,notes}
        guardaDatosPrestamo(csrf,valores,['intereses'])
    }else{
        let valores = {customer_id,array_loans,date,interest_percentage,scheme,notes}
        guardaDatosPrestamo(csrf,valores,['billetera','intereses'])
    }
    
})


function guardaDatosPrestamo(csrf,valores,tipo_prestamo){
    $.ajax({
        type:'POST',
        url:`loans`,
        data:{_token:csrf,valores,tipo_prestamo},
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
}