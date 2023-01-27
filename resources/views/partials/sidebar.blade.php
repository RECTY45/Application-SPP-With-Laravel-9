<aside class="sidebar">
    <div class="sidebar-start">
        <div class="sidebar-head">
            <a href="/" class="logo-wrapper" title="Dashboard">
                <span class="sr-only">Dashboard</span>
                <span class="icon logo" aria-hidden="true"></span>
                <div class="logo-text">
                    <span class="logo-title">{{ auth()->user()->nama_petugas }}</span>
                    <span class="logo-subtitle" style=" margin-left: 6px; background-color: rgb(83, 132, 223); border-radius: 10px;  text-align: center">{{ auth()->user()->level }}</span>
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
                    <a class="active" href="/"><span class="icon home" aria-hidden="true"></span>Dashboard</a>
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
                    <a href="##"><span class="icon user-3" aria-hidden="true"></span>Kelola Data Siswa</a>
                </li>
                <li>
                    <a href="##"><span class="icon user-3" aria-hidden="true"></span>Kelola Data Petugas</a>
                </li>
                <li>
                    <a href="##"><span class="icon home" aria-hidden="true"></span>Kelola Data Kelas</a>
                </li>
                <li>
                    <a href="##"><span class="icon folder" aria-hidden="true"></span>Kelola Data SPP</a>
                </li>
                <li>
                    <a href="##"><span class="icon edit" aria-hidden="true"></span>Entri Pembayaran</a>
                </li>
                <li>
                    <a href="##"><span class="icon paper" aria-hidden="true"></span>Generate Laporan</a>
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
