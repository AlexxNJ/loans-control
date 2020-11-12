@extends('layouts.app')
@section('title')
    Prestamos |
@endsection
@section('content')
<!--begin::Card-->
<div class="card card-custom">
    <div class="card-header">
        <div class="card-title">
            <h3 class="card-label">Prestamos
        </div>
        <div class="card-toolbar">
            <button type="button" class="btn btn-success btn-create-loan" data-toggle="modal" data-target="#createLoan">
                <i class="flaticon2-plus"></i>Nuevo
            </button>
        </div>
    </div>
    <div class="card-body">
        <table class="table mb-5 table-loans">
            <input type="hidden" class="form-control" id="csrf_token_index" value="{{ csrf_token() }}"/>
            <thead class="thead-dark">
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Cliente</th>
                    <th scope="col">Fecha</th>
                    <th scope="col">Monto</th>
                    <th scope="col">Intereses a pagar</th>
                    <th scope="col">Tipo de prestamo</th>
                    <th scope="col">Esquema</th>
                    <th scope="col">Notas</th>
                    <th scope="col">Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($loans as $loan)
                <tr>
                    <td>{{ $loan->id }}</td>
                    <td>{{ $loan->name }}</td>
                    <td>{{ date('m/d/Y',strtotime($loan->date)) }}</td>
                    <td>$ <span>{{ $loan->amount }}</span> MXN</td>
                    <td>$ <span>{{ $loan->amount*$loan->interest_percentage }}</span> <input type="hidden" class="interest" value="{{ $loan->interest_percentage }}"> MXN</td>
                    <td>{{ $loan->type_of_loan }}</td>
                    <td>{{ $loan->scheme }}</td>
                    <td>{{ $loan->notes }}</td>
                    <td>
                        
                        <button type="button" class="btn btn-icon btn-primary loans" data-toggle="modal" data-target="#editLoan">
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
@include('partials.loans.modal_create')
@include('partials.loans.modal_edit')
@push('scripts')
    <script src="{{ asset('js/custom-scripts/loans/create_loans.js') }}"></script>
    <script src="{{ asset('js/custom-scripts/loans/edit_loans.js') }}"></script>
    <script src="{{ asset('js/custom-scripts/loans/delete_loans.js') }}"></script>
@endpush
@endsection