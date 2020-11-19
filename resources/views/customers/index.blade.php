@extends('layouts.app')
@section('title')
    Clientes |
@endsection
@section('content')
<!--begin::Card-->
<div class="card card-custom">
    <div class="card-header">
        <div class="card-title">
            <h3 class="card-label">Clientes
        </div>
        <div class="card-toolbar">
            <button type="button" class="btn btn-success" data-toggle="modal" data-target="#createCustomer">
                <i class="flaticon2-plus"></i>Nuevo
            </button>
        </div>
    </div>
    <div class="card-body">
        <table class="table mb-5 table-customers">
            <input type="hidden" class="form-control" id="csrf_token_index" value="{{ csrf_token() }}"/>
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Nombre</th>
                    <th scope="col">Telefono</th>
                    <th scope="col">Email</th>
                    <th scope="col">Estatus</th>
                    <th scope="col">Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($customers as $customer)
                <tr>
                    <td>{{ $customer->id }}</td>
                    <td>{{ $customer->name }}</td>
                    <td>{{ $customer->phone_number }}</td>
                    <td>{{ $customer->email }}</td>
                    <td>
                        <span class="label label-inline label-light-{{ $customer->status == 'activo' ? 'success' : 'danger' }} font-weight-bold">{{ $customer->status }}</span>
                    </td>
                    <td>
                        
                        <button type="button" class="btn btn-icon btn-primary customer" data-toggle="modal" data-target="#editCustomer">
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
@include('partials.customers.modal_create')
@include('partials.customers.modal_edit')
@push('scripts')
    <script src="{{ asset('js/custom-scripts/customers/create_customers.js') }}"></script>
    <script src="{{ asset('js/custom-scripts/customers/edit_customers.js') }}"></script>
    <script src="{{ asset('js/custom-scripts/customers/delete_customers.js') }}"></script>
@endpush
@endsection