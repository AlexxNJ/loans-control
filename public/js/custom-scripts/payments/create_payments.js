$(document).ready(function(){
    let table = $('.table-payments');
    table.DataTable({
        "lengthMenu":[[5,10,25,50,100],[5,10,25,50,100]],
        crollY: '50vh',
        scrollX: true,
        scrollCollapse: true
    })
})
$('.guardarPago').click(function(){
    $('.div-alert').empty()
    let csrf = $('#csrf_token').val()
    let customer_id = $('#select_customer').val()
    let amount = $('.amount').val()
    let date = $('#kt_datepicker_1_modal').val()
    let notes = $('#notes').val()
    
    let valores = {customer_id,amount,date,notes}

    $.ajax({
        type:'POST',
        url:`payments`,
        data:{_token:csrf,valores},
        success:function(data){
            //console.log(data);
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