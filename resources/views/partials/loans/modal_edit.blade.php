<!-- Modal-->
<div class="modal fade" id="editLoan" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="editLoan" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Editar Prestamo</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <i aria-hidden="true" class="ki ki-close"></i> 
                </button>
            </div>
            <div class="modal-body">
                <div class="div-alert"></div>
                <input type="hidden" class="form-control" id="csrf" value="{{ csrf_token() }}"/>
                <input type="hidden" class="form-control" id="old_date"/>
                <input type="hidden" class="form-control" id="old_customer_id"/>
                <input type="hidden" class="form-control" id="array_loans">
                <div class="form-group row">
                    <div class="col-lg-6">
                     <label>Cliente a prestar:</label>
                     <select class="form-control select2" id="edit_select_customer" name="param">
                        @foreach ($customers as $customer)
                            <option value="{{ $customer->id }}">{{ $customer->name }}</option>
                        @endforeach 
                    </select>
                    </div>
                    <div class="col-lg-6">
                     <label>Monto a prestar:</label>
                     <div class="input-group">
                        <div class="input-group-prepend"><span class="input-group-text"><i class="la la-dollar-sign"></i></span></div>
                        <input type="text" class="form-control e_amount" readonly/>
                    </div>
                    </div>
                   </div>
                   <div class="form-group row">
                    <div class="col-lg-6">
                        <label>Fecha de prestamo:</label>
                        <input type="text" class="form-control .datepicker" id="datepicker_edit_loan" readonly="readonly"/>
                    </div>
                    <div class="col-lg-6">
                        <label>Porcentaje de intereses:</label>
                        <div class="input-group">
                           <div class="input-group-prepend"><span class="input-group-text"><i class="la la-percent"></i></span></div>
                           <input type="text" class="form-control" id="e_interest_percentage" value="10"/>
                       </div>
                    </div>
                   </div>
                   <div class="form-group row">
                    <div class="col-lg-6">
                        <label>Esquema de pago:</label>
                        <select class="form-control select2" id="edit_select_escheme" name="param">
                           <option value="diario">Diario</option>
                           <option value="semanal">Semanal</option>
                           <option value="mensual">Mensual</option>
                           <option value="unico">Unico pago</option>
                           <option value="N/A">N/A</option>
                        </select>
                    </div>
                    <div class="col-lg-6">
                        <label>Notas adicionales:</label>
                        <textarea class="form-control" id="e_notes" rows="3"></textarea>
                    </div>
                   </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-light-primary font-weight-bold" data-dismiss="modal">Cerrar</button>
                <button type="button" class="btn btn-primary font-weight-bold e_guardaPrestamo">Guardar</button>
            </div>
        </div>
    </div>
</div>
</div>

{{-- <select class="form-control select2" id="select_customer" name="param">
    @foreach ($customers as $customer)
    <option value="{{ $customer->id }}">{{ $customer->name }}</option>
@endforeach 
</select>
--}}