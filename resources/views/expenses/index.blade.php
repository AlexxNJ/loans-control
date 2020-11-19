@extends('layouts.app')
@section('title')
    Gastos |
@endsection
@section('content')
<!--begin::Card-->
<div class="card card-custom">
    <div class="card-header">
        <div class="card-title">
            <h3 class="card-label">Gastos
        </div>
        <div class="card-toolbar">
            <button type="button" class="btn btn-success" data-toggle="modal" data-target="#createExpense">
                <i class="flaticon2-plus"></i>Nuevo
            </button>
        </div>
    </div>
    <div class="card-body">
        <table class="table mb-5 table-expenses">
            <input type="hidden" class="form-control" id="csrf_token_index" value="{{ csrf_token() }}"/>
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Fecha</th>
                    <th scope="col">Cantidad</th>
                    <th scope="col">Descripción</th>
                    <th scope="col">Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($expenses as $expense)
                <tr>
                    <td>{{ $expense->id }}</td>
                    <td>{{ date('m/d/Y',strtotime($expense->date)) }}</td>
                    <td>$ <span>{{ $expense->amount }}</span> MXN</td>
                    <td>{{ $expense->description }}</td>
                    <td>
                        
                        <button type="button" class="btn btn-icon btn-primary expense" data-toggle="modal" data-target="#editExpense">
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
@include('partials.expenses.modal_create')
@include('partials.expenses.modal_edit')
@push('scripts')
<script src="{{ asset('js/custom-scripts/expenses/create_expenses.js') }}"></script>
<script src="{{ asset('js/custom-scripts/expenses/edit_expenses.js') }}"></script>
<script src="{{ asset('js/custom-scripts/expenses/delete_expenses.js') }}"></script>
@endpush
@endsection