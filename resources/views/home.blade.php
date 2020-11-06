@extends('layouts.app')
@section('title')
    Inicio |
@endsection
@section('content')
<div class="container">
    <div class="row">
        <div class="col-xl-4">
            <!--begin::Engage Widget-->
            <div class="card card-custom card-stretch gutter-b">
                <div class="card-body d-flex p-0">
                    <div class="flex-grow-1 bg-primary p-8 card-rounded flex-grow-1 bgi-no-repeat" style="background-position: calc(100% + 0.5rem) bottom; background-size: auto 70%; background-image: url({{ asset('media/svg/loans/billetera.svg') }})">
                        <h4 class="text-inverse-danger mt-2 font-weight-bolder">Mi Billetera</h4>
                        @foreach ($wallets as $wallet)
                            <p class="text-inverse-danger my-6">$ {{ $wallet->quantity }} MXN
                            <br /></p>
                        @endforeach
                        <a href="#" class="btn btn-warning font-weight-bold py-2 px-6">Más información</a>
                    </div>
                </div>
            </div>
            <!--end::Engage Widget-->
        </div>
        <div class="col-xl-4">
            <!--begin::Engage Widget-->
            <div class="card card-custom card-stretch gutter-b">
                <div class="card-body d-flex p-0">
                    <div class="flex-grow-1 bg-danger p-8 card-rounded flex-grow-1 bgi-no-repeat" style="background-position: calc(100% + 0.5rem) bottom; background-size: auto 70%; background-image: url({{ asset('media/svg/loans/prestamo.svg') }})">
                        <h4 class="text-inverse-danger mt-2 font-weight-bolder">Prestamos</h4>
                        <p class="text-inverse-danger my-6">$ {{ $loans }} MXN
                        <br /></p>
                        <a href="#" class="btn btn-warning font-weight-bold py-2 px-6">Más información</a>
                    </div>
                </div>
            </div>
            <!--end::Engage Widget-->
        </div>
        <div class="col-xl-4">
            <!--begin::Engage Widget-->
            <div class="card card-custom card-stretch gutter-b">
                <div class="card-body d-flex p-0">
                    <div class="flex-grow-1 bg-info p-8 card-rounded flex-grow-1 bgi-no-repeat" style="background-position: calc(100% + 0.5rem) bottom; background-size: auto 70%; background-image: url({{ asset('media/svg/loans/pagos.svg') }})">
                        <h4 class="text-inverse-danger mt-2 font-weight-bolder">Pagos</h4>
                        @foreach ($totalPayments as $payment)
                            <p class="text-inverse-danger my-6">$ {{ $payment }} MXN
                            <br /></p>
                        @endforeach
                        
                        <a href="#" class="btn btn-success font-weight-bold py-2 px-6">Más información</a>
                    </div>
                </div>
            </div>
            <!--end::Engage Widget-->
        </div>
        <div class="col-xl-4">
            <!--begin::Engage Widget-->
            <div class="card card-custom card-stretch gutter-b">
                <div class="card-body d-flex p-0">
                    <div class="flex-grow-1 bg-light-success p-8 card-rounded flex-grow-1 bgi-no-repeat" style="background-position: calc(100% + 0.5rem) bottom; background-size: auto 70%; background-image: url({{ asset('media/svg/loans/clientes.svg') }})">
                        <h4 class="text-success mt-2 font-weight-bolder">Clientes</h4>
                        <p class="text-success my-6">Total: {{ $totalCustomers }}
                        <br /></p>
                        <a href="{{ route('customers.index') }}" class="btn btn-success font-weight-bold py-2 px-6">Más información</a>
                    </div>
                </div>
            </div>
            <!--end::Engage Widget-->
        </div>
        <div class="col-xl-4">
            <!--begin::Engage Widget-->
            <div class="card card-custom card-stretch gutter-b">
                <div class="card-body d-flex p-0">
                    <div class="flex-grow-1 p-8 card-rounded flex-grow-1 bgi-no-repeat" style="background-color: #1B283F; background-position: calc(100% + 0.5rem) bottom; background-size: auto 70%; background-image: url({{ asset('media/svg/loans/gastos.svg') }})">
                        <h4 class="text-inverse-danger mt-2 font-weight-bolder">Gastos</h4>
                        <p class="text-inverse-danger my-6">$ {{ $expenses }} MXN
                        <br /></p>
                        <a href="#" class="btn btn-danger font-weight-bold py-2 px-6">Más información</a>
                    </div>
                </div>
            </div>
            <!--end::Engage Widget-->
        </div>
        <div class="col-xl-4">
            <!--begin::Engage Widget-->
            <div class="card card-custom card-stretch gutter-b">
                <div class="card-body d-flex p-0">
                    <div class="flex-grow-1 p-8 card-rounded flex-grow-1 bgi-no-repeat" style="background-color: #FFF4DE; background-position: calc(100% + 0.5rem) bottom; background-size: auto 70%; background-image: url({{ asset('media/svg/loans/ingresos.svg') }})">
                        <h4 class="text-danger mt-2 font-weight-bolder">Ingresos</h4>
                        <p class="text-dark-50 my-6">$ {{ $incomes }} MXN
                        <br /></p>
                        <a href="#" class="btn btn-danger font-weight-bold py-2 px-6">Más información</a>
                    </div>
                </div>
            </div>
            <!--end::Engage Widget-->
        </div>
    </div>
</div>
@endsection
