<div class="aside-menu-wrapper flex-column-fluid" id="kt_aside_menu_wrapper">
    <!--begin::Menu Container-->
    <div id="kt_aside_menu" class="aside-menu my-4" data-menu-vertical="1" data-menu-scroll="1" data-menu-dropdown-timeout="500">
        <!--begin::Menu Nav-->
        <ul class="menu-nav">
            <li class="menu-item menu-item-active" aria-haspopup="true">
                <a href="{{ route('home') }}" class="menu-link">
                    <i class="menu-icon fas fa-home"></i>
                    <span class="menu-text">Dashboard</span>
                </a>
            </li>
            
            <li class="menu-section">
                <h4 class="menu-text">MENU</h4>
                <i class="menu-icon ki ki-bold-more-hor icon-md"></i>
            </li>
            
            <li class="menu-item" aria-haspopup="true">
                <a href="{{ route('customers.index') }}" class="menu-link">
                    <i class="menu-icon fas fa-users"></i>
                    <span class="menu-text">Clientes</span>
                </a>
            </li>
            <li class="menu-item" aria-haspopup="true">
                <a href="{{ route('wallets.index') }}" class="menu-link">
                    <i class="menu-icon fas fa-wallet"></i>
                    <span class="menu-text">Billetera</span>
                </a>
            </li>
            <li class="menu-item" aria-haspopup="true">
                <a href="{{ route('incomes.index') }}" class="menu-link">
                    <i class="menu-icon fas fa-donate"></i>
                    <span class="menu-text">Ingresos</span>
                </a>
            </li>
            <li class="menu-item" aria-haspopup="true">
                <a href="{{ route('expenses.index') }}" class="menu-link">
                    <i class="menu-icon fas fa-dollar-sign"></i>
                    <span class="menu-text">Gastos</span>
                </a>
            </li>
            <li class="menu-item" aria-haspopup="true">
                <a href="{{ route('loans.index') }}" class="menu-link">
                    <i class="menu-icon fas fa-hand-holding-usd"></i>
                    <span class="menu-text">Prestamos</span>
                </a>
            </li>
            <li class="menu-item" aria-haspopup="true">
                <a href="{{ route('payments.index') }}" class="menu-link">
                    <i class="menu-icon fas fa-dollar-sign"></i>
                    <span class="menu-text">Pagos</span>
                </a>
            </li>
        </ul>
        <!--end::Menu Nav-->
    </div>
    <!--end::Menu Container-->
</div>