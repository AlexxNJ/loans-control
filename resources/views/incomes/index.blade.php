@extends('layouts.app')
@section('title')
    Ingresos |
@endsection
@section('content')
<!--begin::Card-->
<div class="card card-custom">
    <div class="card-header">
        <div class="card-title">
            <h3 class="card-label">Ingresos
        </div>
        <div class="card-toolbar">
            <button type="button" class="btn btn-success" data-toggle="modal" data-target="#createIncome">
                <i class="flaticon2-plus"></i>Nuevo
            </button>
        </div>
    </div>
    <div class="card-body">
        <table class="table mb-5 table-incomes">
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
                @foreach ($incomes as $income)
                <tr>
                    <td>{{ $income->id }}</td>
                    <td>{{ date('m/d/Y',strtotime($income->date)) }}</td>
                    <td>$ <span>{{ $income->amount }}</span> MXN</td>
                    <td>{{ $income->description }}</td>
                    <td>
                        
                        <button type="button" class="btn btn-icon btn-primary income" data-toggle="modal" data-target="#editIncome">
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
@include('partials.incomes.modal_create')
@include('partials.incomes.modal_edit')
@push('scripts')
<script src="{{ asset('js/custom-scripts/incomes/create_incomes.js') }}"></script>
<script src="{{ asset('js/custom-scripts/incomes/edit_incomes.js') }}"></script>
<script src="{{ asset('js/custom-scripts/incomes/delete_incomes.js') }}"></script>
@endpush
@endsection