<!-- Modal-->
<div class="modal fade" id="createCustomer" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="createCustomer" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Crear cliente</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <i aria-hidden="true" class="ki ki-close"></i>
                </button>
            </div>
            <div class="modal-body">
                <div class="div-alert"></div>
                <input type="hidden" class="form-control" id="csrf" value="{{ csrf_token() }}"/>
                <div class="form-group">
                    <label>Nombre
                    <span class="text-danger">*</span></label>
                    <input type="text" class="form-control" id="c_name"/>
                </div>
                <div class="form-group">
                    <label>Telefono</label>
                    <input type="text" class="form-control" id="c_phone_number"/>
                </div>
                <div class="form-group">
                    <label>Email</label> 
                    <input type="text" class="form-control" id="c_email"/>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-light-primary font-weight-bold" data-dismiss="modal">Cerrar</button>
                <button type="button" class="btn btn-primary font-weight-bold crearUsuario">Guardar</button>
            </div>
        </div>
    </div>
</div>