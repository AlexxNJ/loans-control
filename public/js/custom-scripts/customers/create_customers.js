$(".crearUsuario").click(function(){
    $('.div-alert').empty()
    let name = $('#c_name').val()
    let phone_number = $('#c_phone_number').val()
    let email = $('#c_email').val()
    let csrf = $('#csrf').val()

    let valores = {name,phone_number,email}

    $.ajax({
        type:'POST',
        url:`customers`,
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