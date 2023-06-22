<!-- Menu -->

<aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">
    <div class="app-brand demo">
        <a href="/" class="app-brand-link">
            <img src="{{ asset('assets/images/logo.png') }}" alt="Logo" width="60">
            <span class="menu-text fw-bolder fs-4 ms-2">Transindo</span>
        </a>

        <a href="javascript:void(0);" class="layout-menu-toggle menu-link text-large ms-auto d-block d-xl-none">
            <i class="bx bx-chevron-left bx-sm align-middle"></i>
        </a>
    </div>

    <div class="menu-inner-shadow"></div>

    <ul class="menu-inner py-1">
        <!-- Dashboard -->
        

        <!-- Layouts -->
        @if (Auth::user())
            <li
                class="menu-item {{ Route::is('order.*') || Route::is('checkin.*') || Route::is('rekap.*') || Route::is('intern.*') || Route::is('role.*') ? 'active open' : '' }}">
                <a href="javascript:void(0);" class="menu-link menu-toggle">
                    <i class="menu-icon tf-icons bx bxs-user-check"></i>
                    <div data-i18n="Layouts">Menu Admin </div>
                </a>

                <ul class="menu-sub">
                    @if (Auth::user())
                        <li class="menu-item {{ Route::is('order.*') ? 'active' : '' }}">
                            <a href="{{ route('order.customer') }}" class="menu-link active">
                                <div>Customer</div>
                            </a>
                        </li>


                        <li class="menu-item {{ Route::is('checkin.*') ? 'active' : '' }}">
                            <a href="{{ route('checkin.customer') }}" class="menu-link active">
                                <div>Check-In</div>
                            </a>
                        </li>
                       
                    
                    @endif
                </ul>
            </li>
        @endif
        <!-- / Kegiatan -->
       

    </ul>
</aside>
<!-- / Menu -->
