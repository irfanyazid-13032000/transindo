<!-- Menu -->

<aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">
    <div class="app-brand demo">
        <a href="/" class="app-brand-link">
            <img src="{{ asset('assets/images/logo.png') }}" alt="Logo" width="60">
            <span class="menu-text fw-bolder fs-4 ms-2">Lokpro Media</span>
        </a>

        <a href="javascript:void(0);" class="layout-menu-toggle menu-link text-large ms-auto d-block d-xl-none">
            <i class="bx bx-chevron-left bx-sm align-middle"></i>
        </a>
    </div>

    <div class="menu-inner-shadow"></div>

    <ul class="menu-inner py-1">
        <!-- Dashboard -->
        <li class="menu-item @if (request()->is('/')) active @endif">
            <a href="/" class="menu-link">
                <i class="menu-icon tf-icons bx bx-home-circle"></i>
                <div data-i18n="Analytics">Dashboard</div>
            </a>
        </li>

        <!-- Layouts -->
        @if (Auth::user()->role === 'Admin' || Auth::user()->role === 'HRD' )
        <li class="menu-item @if (request()->is('intern') || request()->is('divisi') || request()->is('absensi')) active @endif">
            <a href="javascript:void(0);" class="menu-link menu-toggle">
                <i class="menu-icon tf-icons bx bxs-user-check"></i>
                <div data-i18n="Layouts">Management </div>
            </a>

            <ul class="menu-sub">
                @if (Auth::user()->role === 'Admin')
                <li class="menu-item">
                    <a href="{{ route('users.index') }}" class="menu-link active">
                        <div>User Management</div>
                    </a>
                </li>
                    <li class="menu-item">
                        <a href="{{ route('intern.index') }}" class="menu-link active ">
                            <div>Data Anggota Magang</div>
                        </a>
                    </li>
                    <li class="menu-item">
                        <a href="{{ route('divisi.index') }}" class="menu-link">
                            <div>Divisi Magang</div>
                        </a>
                    </li>
                    <li class="menu-item">
                        <a href="{{ route('absensi.index') }}" class="menu-link">
                            <div>Data Absensi</div>
                        </a>
                    </li>
                    <li class="menu-item">
                        <a href="{{ route('absensi.show', Auth::user()->email) }}" class="menu-link">
                            <div>Absensi</div>
                        </a>
                    </li>
                @elseif (Auth::user()->role === 'HRD')
                    <li class="menu-item">
                        <a href="{{ route('intern.index') }}" class="menu-link active ">
                            <div>Data Anggota Magang</div>
                        </a>
                    </li>
                    <li class="menu-item">
                        <a href="{{ route('divisi.index') }}" class="menu-link">
                            <div>Divisi Magang</div>
                        </a>
                    </li>
                    <li class="menu-item">
                        <a href="{{ route('absensi.show', Auth::user()->email) }}" class="menu-link">
                            <div>Absensi</div>
                        </a>
                    </li>
                @else
                    <li class="menu-item">
                        <a href="{{ route('absensi.show', Auth::user()->email) }}" class="menu-link">
                            <div>Absensi</div>
                        </a>
                    </li>
                @endif
            </ul>
        </li>
       @endif
    <!-- / Kegiatan -->
    <li class="menu-item @if (request()->is('intern') || request()->is('divisi') || request()->is('absensi')) active @endif">
        <a href="javascript:void(0);" class="menu-link menu-toggle">
            <i class="menu-icon tf-icons bx bxs-user-badge"></i>
            <div data-i18n="Layouts">Activity</div>
        </a>

        <ul class="menu-sub">
           
                <li class="menu-item">
                    <a href="{{ route('absensi.show', Auth::user()->email) }}" class="menu-link">
                        <div>Absensi</div>
                    </a>
                </li>
                <li class="menu-item">
                    <a href="{{ route('sertifikat.show', Auth::user()->email) }}" class="menu-link">
                        <div>Cetak Sertifikat   </div>
                    </a>
                </li>
            
        </ul>
    </li>
   
    </ul>
</aside>
<!-- / Menu -->
