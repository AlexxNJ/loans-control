<!-- Modal-->
<div class="modal fade" id="editIncome" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="editIncome" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Editar Ingreso</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <i aria-hidden="true" class="ki ki-close"></i>
                </button>
            </div>
            <div class="modal-body">
                <div class="div-alert"></div>
                <input type="hidden" class="form-control" id="csrf_token" value="{{ csrf_token() }}"/>
                <input type="hidden" class="form-control" id="income_id"/>
                
                <div class="form-group">
                    <label>Fecha</label>
                    <input type="text" class="form-control .datepicker" id="kt_datepicker_1_modal" readonly="readonly" placeholder="Select date" />
                </div>
                <div class="form-group">
                    <label>Cantidad</label>
                    <input type="text" class="form-control" id="amount"/>
                </div>
                <div class="form-group">
                    <label>Descripción</label> 
                    <input type="text" class="form-control" id="description"/>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-light-primary font-weight-bold" data-dismiss="modal">Cerrar</button>
                <button type="button" class="btn btn-primary font-weight-bold guardaDatos">Guardar</button>
            </div>
        </div>
    </div>
</div>