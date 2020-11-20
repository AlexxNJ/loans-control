@extends('layouts.app')
@section('title')
    Inicio |
@endsection
@section('content')
<div class="container">
    <div class="row">
        <div class="col-xl-2">
            <!--begin::Tiles Widget-->
            <div class="card card-custom bg-danger gutter-b" style="height: 130px">
                <!--begin::Body-->
                <div class="card-body d-flex flex-column p-0">
                    <!--begin::Stats-->
                    <div class="flex-grow-1 card-spacer-x pt-6">
                        <div class="text-inverse-danger font-weight-bold">Mi Billetera</div>
                        <br>
                        <div class="text-inverse-danger font-weight-bolder font-size-h3">${{ number_format($wallets[0]->quantity,2) }}</div>
                    </div>
                    <!--end::Stats-->
                </div>
                <!--end::Body-->
            </div>
            <!--end::Tiles Widget-->
        </div>
        <div class="col-xl-2">
            <!--begin::Tiles Widget-->
            <div class="card card-custom bg-success gutter-b" style="height: 130px">
                <!--begin::Body-->
                <div class="card-body d-flex flex-column p-0">
                    <!--begin::Stats-->
                    <div class="flex-grow-1 card-spacer-x pt-6">
                        <div class="text-inverse-danger font-weight-bold">Prestamos Billetera</div>
                        <div class="text-inverse-danger font-weight-bolder font-size-h3">${{ number_format($loans_of_wallets,2) }}</div>
                    </div>
                    <!--end::Stats-->
                </div>
                <!--end::Body-->
            </div>
            <!--end::Tiles Widget-->
        </div>
        <div class="col-xl-2">
            <!--begin::Tiles Widget-->
            <div class="card card-custom bg-info gutter-b" style="height: 130px">
                <!--begin::Body-->
                <div class="card-body d-flex flex-column p-0">
                    <!--begin::Stats-->
                    <div class="flex-grow-1 card-spacer-x pt-6">
                        <div class="text-inverse-danger font-weight-bold">Billetera Disponible</div>
                        <div class="text-inverse-danger font-weight-bolder font-size-h3">${{ number_format($loans_of_wallets - $wallets[0]->quantity,2) }}</div>
                    </div>
                    <!--end::Stats-->
                </div>
                <!--end::Body-->
            </div>
            <!--end::Tiles Widget-->
        </div>
        <div class="col-xl-2">
            <!--begin::Tiles Widget-->
            <div class="card card-custom bg-primary gutter-b" style="height: 130px">
                <!--begin::Body-->
                <div class="card-body d-flex flex-column p-0">
                    <!--begin::Stats-->
                    <div class="flex-grow-1 card-spacer-x pt-6">
                        <div class="text-inverse-danger font-weight-bold">Pagos/Intereses</div>
                        <br>
                        <div class="text-inverse-danger font-weight-bolder font-size-h3">${{ number_format($payments,2) }}</div>
                    </div>
                    <!--end::Stats-->
                </div>
                <!--end::Body-->
            </div>
            <!--end::Tiles Widget-->
        </div>
        <div class="col-xl-2">
            <!--begin::Tiles Widget-->
            <div class="card card-custom bg-success gutter-b" style="height: 130px">
                <!--begin::Body-->
                <div class="card-body d-flex flex-column p-0">
                    <!--begin::Stats-->
                    <div class="flex-grow-1 card-spacer-x pt-6">
                        <div class="text-inverse-danger font-weight-bold">Prestamos Intereses</div>
                        <div class="text-inverse-danger font-weight-bolder font-size-h3">${{ number_format($loans_of_interests,2) }}</div>
                    </div>
                    <!--end::Stats-->
                </div>
                <!--end::Body-->
            </div>
            <!--end::Tiles Widget-->
        </div>
        <div class="col-xl-2">
            <!--begin::Tiles Widget-->
            <div class="card card-custom bg-warning gutter-b" style="height: 130px">
                <!--begin::Body-->
                <div class="card-body d-flex flex-column p-0">
                    <!--begin::Stats-->
                    <div class="flex-grow-1 card-spacer-x pt-6">
                        <div class="text-inverse-danger font-weight-bold">Intereses Disponibles</div>
                        <div class="text-inverse-danger font-weight-bolder font-size-h3">${{ number_format($available_interests,2) }}</div>
                    </div>
                    <!--end::Stats-->
                </div>
                <!--end::Body-->
            </div>
            <!--end::Tiles Widget-->
        </div>
    </div>
    <div class="row">
        {{-- <div class="col-xl-4">
            <!--begin::Engage Widget-->
            <div class="card card-custom card-stretch gutter-b">
                <div class="card-body d-flex p-0">
                    <div class="flex-grow-1 bg-primary p-8 card-rounded flex-grow-1 bgi-no-repeat" style="background-position: calc(100% + 0.5rem) bottom; background-size: auto 70%; background-image: url({{ asset('media/svg/loans/billetera.svg') }})">
                        <h4 class="text-inverse-danger mt-2 font-weight-bolder">Mi Billetera</h4>
                        @foreach ($wallets as $wallet)
                            <p class="text-inverse-danger my-6">$ {{ $wallet->quantity }} MXN
                            <br /></p>
                        @endforeach
                        <a href="{{ route('wallets.index') }}" class="btn btn-warning font-weight-bold py-2 px-6">Ver Más</a>
                    </div>
                </div>
            </div>
            <!--end::Engage Widget-->
        </div> --}}
        <div class="col-xl-4">
            <!--begin::Engage Widget-->
            <div class="card card-custom card-stretch gutter-b">
                <div class="card-body d-flex p-0">
                    <div class="flex-grow-1 bg-danger p-8 card-rounded flex-grow-1 bgi-no-repeat" style="background-position: calc(100% + 0.5rem) bottom; background-size: auto 70%; background-image: url({{ asset('media/svg/loans/prestamo.svg') }})">
                        <h4 class="text-inverse-danger mt-2 font-weight-bolder">Prestamos</h4>
                        <p class="text-inverse-danger my-6">$ {{ number_format($loans,2) }} MXN
                        <br /></p>
                        <a href="{{ route('loans.index') }}" class="btn btn-warning font-weight-bold py-2 px-6">Ver Más</a>
                    </div>
                </div>
            </div>
            <!--end::Engage Widget-->
        </div>
        {{-- <div class="col-xl-4">
            <!--begin::Engage Widget-->
            <div class="card card-custom card-stretch gutter-b">
                <div class="card-body d-flex p-0">
                    <div class="flex-grow-1 bg-info p-8 card-rounded flex-grow-1 bgi-no-repeat" style="background-position: calc(100% + 0.5rem) bottom; background-size: auto 70%; background-image: url({{ asset('media/svg/loans/pagos.svg') }})">
                        <h4 class="text-inverse-danger mt-2 font-weight-bolder">Pagos</h4>
                            <p class="text-inverse-danger my-6">$ {{ $payments }} MXN
                            <br /></p>
                        
                        <a href="{{ route('payments.index') }}" class="btn btn-success font-weight-bold py-2 px-6">Ver Más</a>
                    </div>
                </div>
            </div>
            <!--end::Engage Widget-->
        </div> --}}
        <div class="col-xl-4">
            <!--begin::Engage Widget-->
            <div class="card card-custom card-stretch gutter-b">
                <div class="card-body d-flex p-0">
                    <div class="flex-grow-1 bg-light-success p-8 card-rounded flex-grow-1 bgi-no-repeat" style="background-position: calc(100% + 0.5rem) bottom; background-size: auto 70%; background-image: url({{ asset('media/svg/loans/clientes.svg') }})">
                        <h4 class="text-success mt-2 font-weight-bolder">Clientes</h4>
                        <p class="text-success my-6">Total: {{ $totalCustomers }}
                        <br /></p>
                        <a href="{{ route('customers.index') }}" class="btn btn-success font-weight-bold py-2 px-6">Ver Más</a>
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
                        <p class="text-inverse-danger my-6">$ {{ number_format($expenses,2) }} MXN
                        <br /></p>
                        <a href="{{ route('expenses.index') }}" class="btn btn-danger font-weight-bold py-2 px-6">Ver Más</a>
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
                        <p class="text-dark-50 my-6">$ {{ number_format($incomes,2) }} MXN
                        <br /></p>
                        <a href="{{ route('incomes.index') }}" class="btn btn-danger font-weight-bold py-2 px-6">Ver Más</a>
                    </div>
                </div>
            </div>
            <!--end::Engage Widget-->
        </div>
    </div>
</div>
@endsection
