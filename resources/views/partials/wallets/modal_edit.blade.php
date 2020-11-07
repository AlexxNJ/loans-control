<!-- Modal-->
<div class="modal fade" id="editWallet" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="editWallet" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Editar Billetera</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <i aria-hidden="true" class="ki ki-close"></i>
                </button>
            </div>
            <div class="modal-body">
                <div class="div-alert"></div>
                <input type="hidden" class="form-control" id="csrf_token" value="{{ csrf_token() }}"/>
                <input type="hidden" class="form-control" id="wallet_id"/>
                
                <div class="form-group">
                    <label>Monto
                    <span class="text-danger">*</span></label>
                    <input type="text" class="form-control" id="quantity"/>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-light-primary font-weight-bold" data-dismiss="modal">Cerrar</button>
                <button type="button" class="btn btn-primary font-weight-bold guardaDatos">Guardar</button>
            </div>
        </div>
    </div>
</div>