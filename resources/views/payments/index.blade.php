@extends('layouts.app')
@section('title')
    Pagos |
@endsection
@section('content')
<!--begin::Card-->
<div class="card card-custom">
    <div class="card-header">
        <div class="card-title">
            <h3 class="card-label">Pagos
        </div>
        <div class="card-toolbar">
            <button type="button" class="btn btn-success btn-create-loan" data-toggle="modal" data-target="#createPayment">
                <i class="flaticon2-plus"></i>Nuevo
            </button>
        </div>
    </div>
    <div class="card-body">
        <table class="table mb-5 table-payments">
            <input type="hidden" class="form-control" id="csrf_token_index" value="{{ csrf_token() }}"/>
            <thead class="thead-dark">
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Fecha</th>
                    <th scope="col">Monto</th>
                    <th scope="col">Cliente</th>
                    <th scope="col">Estatus</th>
                    <th scope="col">Notas</th>
                    <th scope="col">Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($payments as $payment)
                <tr>
                    <td>{{ $payment->id }}</td>
                    <td>{{ date('m/d/Y',strtotime($payment->date)) }}</td>
                    <td>$ <span>{{ $payment->amount }}</span> MXN</td>
                    <td><span class="label label-inline label-light-{{ $payment->name == '' ? 'warning' : '' }} font-weight-bold">{{ $payment->name == '' ? 'SIN CLIENTE' : $payment->name }}</span> <input type="hidden" class="customer_id" value="{{ $payment->customer_id == '' ? 0 : $payment->customer_id }}"></td>
                    <td><span class="label label-inline label-light-{{ $payment->status == 'en-tiempo' ? 'success' : 'danger' }} font-weight-bold">{{ $payment->status == 'en-tiempo' ? 'En Tiempo' : 'Atrasado' }}</span></td>
                    <td>{{ $payment->notes == '' ? '...' : $payment->notes }}</td>
                    <td>
                        
                        <button type="button" class="btn btn-icon btn-primary payment" data-toggle="modal" data-target="#editPayment">
                            <i class="fas fa-pencil-alt"></i>
                        </button>

                        <button type="button" class="btn btn-icon btn-danger btn-delete">
                            <i class="fas fa-trash-alt"></i>
                        </button>
                    </td>
                    
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
<!--end::Card-->
@include('partials.payments.modal_create')
@include('partials.payments.modal_edit')
@push('scripts')
    <script src="{{ asset('js/custom-scripts/payments/create_payments.js') }}"></script>
    <script src="{{ asset('js/custom-scripts/payments/edit_payments.js') }}"></script>
    <script src="{{ asset('js/custom-scripts/payments/delete_payments.js') }}"></script>
@endpush
@endsection