<!-- Modal-->
<div class="modal fade" id="createLoan" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="createLoan" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Generar Prestamo</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <i aria-hidden="true" class="ki ki-close"></i> 
                </button>
            </div>
            <div class="modal-body">
                <div class="div-alert"></div>
                <input type="hidden" class="form-control" id="csrf_token" value="{{ csrf_token() }}"/>
                <input type="hidden" class="form-control" id="loan_id"/>
                <input type="hidden" class="form-control" id="array_loans">
                <div class="row">
                    <div class="col-xl-6">
                        <div class="alert alert-success mb-5 p-5" role="alert">
                            <h4 class="alert-heading">Dinero disponible de billetera</h4>
                            <h3>$ <span id="available_wallet">{{ $sum_loans_wallets - $wallets[0]->quantity }}</span> MXN</h3>
                        </div>
                    </div>
                    <div class="col-xl-6">
                        <div class="alert alert-info mb-5 p-5" role="alert">
                            <h4 class="alert-heading">Dinero disponible de intereses</h4>
                            <h3>$ <span id="available_interests">{{ $available_interests }}</span> MXN</h3>
                        </div>
                    </div>
                </div>
                <div class="separator separator-solid separator-border-2"></div>
                <br>
                <div class="alert-no-money"></div>
                <div class="form-group row">
                    <div class="col-lg-6">
                     <label>Cliente a prestar:</label>
                     <select class="form-control select2" id="select_customer" name="param">
                        @foreach ($customers as $customer)
                            <option value="{{ $customer->id }}">{{ $customer->name }}</option>
                        @endforeach 
                    </select>
                    </div>
                    <div class="col-lg-6">
                     <label>Monto a prestar:</label>
                     <div class="input-group">
                        <div class="input-group-prepend"><span class="input-group-text"><i class="la la-dollar-sign"></i></span></div>
                        <input type="text" class="form-control amount" placeholder=""/>
                    </div>
                    </div>
                   </div>
                   <div class="form-group row">
                    <div class="col-lg-6">
                        <label>Fecha de prestamo:</label>
                        <input type="text" class="form-control .datepicker" id="kt_datepicker_1_modal" readonly="readonly" value="{{ date('m/d/Y') }}" />
                    </div>
                    <div class="col-lg-6">
                        <label>Porcentaje de intereses:</label>
                        <div class="input-group">
                           <div class="input-group-prepend"><span class="input-group-text"><i class="la la-percent"></i></span></div>
                           <input type="text" class="form-control" id="interest_percentage" value="10"/>
                       </div>
                    </div>
                   </div>
                   <div class="form-group row">
                    <div class="col-lg-6">
                        <label>Esquema de pago:</label>
                        <select class="form-control select2" id="select_escheme" name="param">
                           <option value="diario">Diario</option>
                           <option value="semanal">Semanal</option>
                           <option value="mensual">Mensual</option>
                           <option value="unico">Unico pago</option>
                           <option value="N/A">N/A</option>
                        </select>
                    </div>
                    <div class="col-lg-6">
                        <label>Notas adicionales:</label>
                        <textarea class="form-control" id="notes" rows="3"></textarea>
                    </div>
                   </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-light-primary font-weight-bold" data-dismiss="modal">Cerrar</button>
                <button type="button" class="btn btn-primary font-weight-bold guardaPrestamo">Guardar</button>
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