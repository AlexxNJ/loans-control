<!-- Modal-->
<div class="modal fade" id="createExpense" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="createExpense" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Crear Gasto</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <i aria-hidden="true" class="ki ki-close"></i>
                </button>
            </div>
            <div class="modal-body">
                <div class="div-alert"></div>
                <input type="hidden" class="form-control" id="csrf" value="{{ csrf_token() }}"/>
                
                <div class="form-group">
                    <label>Fecha</label>
                    <input type="text" class="form-control .c_datepicker" id="c_datepicker" readonly="readonly" value="{{ date('m/d/Y') }}" />
                </div>
                <div class="form-group">
                    <label>Monto</label>
                    <input type="text" class="form-control" id="c_amount"/>
                </div>
                <div class="form-group">
                    <label>Descripción</label> 
                    <input type="text" class="form-control" id="c_description"/>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-light-primary font-weight-bold" data-dismiss="modal">Cerrar</button>
                <button type="button" class="btn btn-primary font-weight-bold crearIngreso">Guardar</button>
            </div>
        </div>
    </div>
</div>