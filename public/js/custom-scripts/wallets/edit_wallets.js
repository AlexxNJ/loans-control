$('.table-wallets tr td .wallet').click(function(){
    let wallet_id = $(this).parents('tr').find('td').eq(0).html();
    let quantity = $(this).parents('tr').find('span').html();
    
    $('#wallet_id').val(wallet_id)
    $('#quantity').val(quantity)
})

$('.guardaDatos').click(function(){
    $('.div-alert').empty()
    let csrf = $('#csrf_token').val()
    let wallet_id = $('#wallet_id').val()
    let quantity = $('#quantity').val()

    $.ajax({
        type:'PUT',
        url:`wallets/${wallet_id}`,
        data:{_token:csrf,quantity},
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