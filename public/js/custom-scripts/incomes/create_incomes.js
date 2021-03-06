$(document).ready(function(){
    let table = $('.table-incomes');
    table.DataTable({
        "lengthMenu":[[5,10,25,50,100],[5,10,25,50,100]],
        crollY: '50vh',
        scrollX: true,
        scrollCollapse: true
    })
})
$('.crearIngreso').click(function(){
    $('.div-alert').empty()
    let csrf = $('#csrf').val()
    let date = $('#c_datepicker').val()
    let amount = $('#c_amount').val()
    let description = $('#c_description').val()

    let valores = {date,amount,description}
    $.ajax({
        type:'POST',
        url:`incomes`,
        data:{_token:csrf,valores},
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