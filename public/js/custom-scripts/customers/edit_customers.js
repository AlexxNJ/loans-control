$(document).ready(function(){
    $('.table-customers tr td .customer').click(function(){
        let user_id = $(this).parents('tr').find('td').eq(0).html();
        let name = $(this).parents('tr').find('td').eq(1).html();
        let phone_number = $(this).parents('tr').find('td').eq(2).html();
        let email = $(this).parents('tr').find('td').eq(3).html();
        let status = $(this).parents('tr').find('span').html();
        
        $('#user_id').val(user_id)
        $('#name').val(name)
        $('#phone_number').val(phone_number)
        $('#email').val(email)
        if(status == 'activo'){
            $('#status').prop('checked',true)
        }else{
            $('#status').prop('checked',false)
        }
    })
})

$(".guardaDatos").click(function(){
    $('.div-alert').empty()
    let user_id = $('#user_id').val()
    let name = $('#name').val()
    let phone_number = $('#phone_number').val()
    let email = $('#email').val()
    let status = $('#status').is(':checked')
    let isActive = status == true ? 'activo' : 'inactivo'
    let csrf_token = $('#csrf_token').val()
    let valores = [];
    
    var obj = {name,phone_number,email,isActive}
    valores.push(obj)

    $.ajax({
        type:'PUT',
        url:`customers/${user_id}`,
        data:{_token:csrf_token,valores: JSON.stringify(valores)},
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