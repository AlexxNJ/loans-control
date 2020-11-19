@extends('layouts.app')
@section('title')
    Clientes |
@endsection
@section('content')
<!--begin::Card-->
<div class="card card-custom">
    <div class="card-header">
        <div class="card-title">
            <h3 class="card-label">Mi Billetera
        </div>
    </div>
    <div class="card-body">
        <table class="table mb-5 table-wallets">
            <input type="hidden" class="form-control" id="csrf_token_index" value="{{ csrf_token() }}"/>
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Cantidad</th>
                    <th scope="col">Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($wallets as $wallet)
                <tr>
                    <td>{{ $wallet->id }}</td>
                    <td>$ <span>{{ $wallet->quantity }}</span> MXN</td>
                    <td>
                        
                        <button type="button" class="btn btn-icon btn-primary wallet" data-toggle="modal" data-target="#editWallet">
                            <i class="fas fa-pencil-alt"></i>
                        </button>
                    </td>
                    
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
<!--end::Card-->
@include('partials.wallets.modal_edit')
@push('scripts')
<script src="{{ asset('js/custom-scripts/wallets/edit_wallets.js') }}"></script>
@endpush
@endsection