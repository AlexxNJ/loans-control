<!-- Modal-->
<div class="modal fade" id="createPayment" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="createPayment" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Generar Pago</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <i aria-hidden="true" class="ki ki-close"></i> 
                </button>
            </div>
            <div class="modal-body">
                <div class="div-alert"></div>
                <input type="hidden" class="form-control" id="csrf_token" value="{{ csrf_token() }}"/>
                <div class="alert-no-money"></div>
                <div class="form-group row">
                    <div class="col-lg-6">
                     <label>Cliente pago:</label>
                     <select class="form-control select2" id="select_customer" name="param">
                        <option label="Label"></option>
                        @foreach ($customers as $customer)
                            <option value="{{ $customer->id }}">{{ $customer->name }}</option>
                        @endforeach 
                    </select>
                    </div>
                    <div class="col-lg-6">
                     <label>Monto a pagar:</label>
                     <div class="input-group">
                        <div class="input-group-prepend"><span class="input-group-text"><i class="la la-dollar-sign"></i></span></div>
                        <input type="text" class="form-control amount" placeholder=""/>
                    </div>
                    </div>
                   </div>
                   <div class="form-group row">
                    <div class="col-lg-6">
                        <label>Fecha pago:</label>
                        <input type="text" class="form-control .datepicker" id="kt_datepicker_1_modal" readonly="readonly" value="{{ date('m/d/Y') }}" />
                    </div>
                    <div class="col-lg-6">
                        <label>Notas adicionales:</label>
                        <textarea class="form-control" id="notes" rows="3"></textarea>
                    </div>
                   </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-light-primary font-weight-bold" data-dismiss="modal">Cerrar</button>
                <button type="button" class="btn btn-primary font-weight-bold guardarPago">Guardar</button>
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