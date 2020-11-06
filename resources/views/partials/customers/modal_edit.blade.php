<!-- Modal-->
<div class="modal fade" id="editCustomer" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="editCustomer" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Editar cliente</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <i aria-hidden="true" class="ki ki-close"></i>
                </button>
            </div>
            <div class="modal-body">
                <div class="div-alert"></div>
                <input type="hidden" class="form-control" id="csrf_token" value="{{ csrf_token() }}"/>
                <input type="hidden" class="form-control" id="user_id"/>
                
                <div class="form-group">
                    <label>Nombre
                    <span class="text-danger">*</span></label>
                    <input type="text" class="form-control" id="name"/>
                </div>
                <div class="form-group">
                    <label>Telefono</label>
                    <input type="text" class="form-control" id="phone_number"/>
                </div>
                <div class="form-group">
                    <label>Email</label> 
                    <input type="text" class="form-control" id="email"/>
                </div>
                <div class="form-group">
                    <label>Estatus</label> 
                    <span class="switch switch-outline switch-icon switch-success">
                        <label>
                            <input type="checkbox" name="status" id="status" />
                            <span></span>
                        </label>
                    </span>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-light-primary font-weight-bold" data-dismiss="modal">Cerrar</button>
                <button type="button" class="btn btn-primary font-weight-bold guardaDatos">Guardar</button>
            </div>
        </div>
    </div>
</div>