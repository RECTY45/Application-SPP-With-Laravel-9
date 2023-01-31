    <aside class="sidebar">
        <div class="sidebar-start">
            <div class="sidebar-head">
                <a href="/" class="logo-wrapper" title="Dashboard">
                    <span class="sr-only">Dashboard</span>
                    <span class="sidebar-user-img" aria-hidden="true">
                        <picture><img src="{{ asset('assets/img/avatar/logo.png') }}" alt="User name"></picture>
                    </span>
                    <div class="logo-text">
                        <span class="logo-title">E-SPP</span>
                        <span class="logo-subtitle">Dashboard</span>
                    </div>
                </a>
                <button class="sidebar-toggle transparent-btn" title="Menu" type="button">
                    <span class="sr-only">Toggle menu</span>
                    <span class="icon menu-toggle" aria-hidden="true"></span>
                </button>
            </div>
            <div class="sidebar-body">
                <ul class="sidebar-body-menu">
                    <li>
                        <a class="{{ request()->routeIs('dashboard.index') ? 'active' : '' }}"
                            href="{{ route('dashboard.index') }}"><span class="icon category"
                                aria-hidden="true"></span>Dashboard</a>
                    </li>
                    <li>
                </ul>
                <span class="system-menu__title">Kelola Data Master</span>
                @if (auth()->user()->level === 'admin')
                    <ul class="sidebar-body-menu ">
                        <span class="category__btn transparent-btn show-cat-btn cat-sub-menu"" title="Open list">
                            <span class="sr-only">Open List</span>
                        </span>
                        <li>
                            <a class="{{ request()->routeIs('siswa.index','siswa.create') ? 'active' : '' }}"
                                href="{{ route('siswa.index') }}"><span class="icon radio "
                                    aria-hidden="true"></span>Kelola Data Siswa</a>
                        </li>
                        <li>
                            <a class="{{ request()->routeIs('petugas.index','petugas.create','petugas.edit') ? 'active' : '' }}"
                                href="{{ route('petugas.index') }}"><span class="icon user-3"
                                    aria-hidden="true"></span>Kelola Data Petugas</a>
                        </li>
                        <li>
                            <a class="{{ request()->routeIs('kelas.index') ? 'active' : '' }}"
                                href="{{ route('kelas.index') }}"><span class="icon home"
                                    aria-hidden="true"></span>Kelola Data Kelas</a>
                        </li>
                        <li>
                            <a class="{{ request()->routeIs('spp.index') ? 'active' : '' }}"
                                href="{{ route('spp.index') }}"><span class="icon money"
                                    aria-hidden="true"></span>Kelola Data SPP</a>
                        </li>
                        <li>
                            <a href="##"><span class="icon pay" aria-hidden="true"></span>Entri Pembayaran</a>
                        </li>
                        <li>
                            <a href="##"><span class="icon report" aria-hidden="true"></span>Generate Laporan</a>
                        </li>
                        <li>
                            <a href="##"><span class="icon paper" aria-hidden="true"></span>History Pembayaran</a>
                        </li>
                    </ul>
                @endif

                @if (auth()->user()->level === 'petugas')
                    <ul class="sidebar-body-menu ">
                        <span class="category__btn transparent-btn show-cat-btn cat-sub-menu"" title="Open list">
                            <span class="sr-only">Open List</span>
                        </span>
                        <li>
                            <a href="##"><span class="icon edit" aria-hidden="true"></span>Entri Pembayaran</a>
                        </li>
                        <li>
                            <a href="##"><span class="icon paper" aria-hidden="true"></span>History Pembayaran</a>
                        </li>
                    </ul>
                @endif
            </div>
        </div>
    </aside>
