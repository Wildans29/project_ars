<!-- Left side column. contains the logo and sidebar -->
<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
        <!-- Sidebar user panel -->
        <div class="user-panel">
            <div class="pull-left image">
                <img src="{{ url(auth()->user()->foto ?? '') }}" class="img-circle img-profil" alt="User Image">
            </div>
            <div class="pull-left info">
                <p>{{ auth()->user()->name }}</p>
                <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
            </div>
        </div>
        
        <!-- /.search form -->
        <!-- sidebar menu: : style can be found in sidebar.less -->
        <ul class="sidebar-menu" data-widget="tree">
            <li>
                <a href="{{ route('dashboard') }}">
                    <i class="fa fa-dashboard"></i> <span>Dashboard</span>
                </a>
            </li>

            @if (auth()->user()->level == 1)
            <li class="header">MASTER</li>
            <li>
                <a href="{{ url('kategori/') }}">
                    <i class="fa fa-cube"></i> <span>Kategori</span>
                </a>
            </li>
            <li>
                <a href="{{ url('produk/') }}">
                    <i class="fa fa-cubes"></i> <span>Produk</span>
                </a>
            </li>
            <li>
                <a href="{{ url('supplier/') }}">
                    <i class="fa fa-truck"></i> <span>Supplier</span>
                </a>
            </li>
            <li>
                <a href="{{ url('/booking/pelanggan/status') }}">
                    <i class="fa fa-cart-arrow-down"></i> <span>Status Booking Service</span>
                </a>
            </li>
            <li class="header">TRANSAKSI</li>
            <li>
                <a href="{{ url('pengeluaran/') }}">
                    <i class="fa fa-money"></i> <span>Pengeluaran</span>
                </a>
            </li>
            <li>
                <a href="{{ route('pembelian.index') }}">
                    <i class="fa fa-download"></i> <span>Pembelian</span>
                </a>
            </li>
            <li>
                <a href="{{ route('penjualan.index') }}">
                    <i class="fa fa-upload"></i> <span>Penjualan</span>
                </a>
            </li>
            {{-- <li>
                <a href="{{ route('transaksi.index') }}">
                    <i class="fa fa-cart-arrow-down"></i> <span>Transaksi Aktif</span>
                </a>
            </li>--}}
            <li> 
                <a href="{{ route('transaksi.baru') }}">
                    <i class="fa fa-cart-arrow-down"></i> <span>Transaksi Baru</span>
                </a>
            </li>
            <li class="header">Data sistem pakar</li>
            <li>
                <a href="{{ url('master/gejala/') }}">
                    <i class="fa fa-book"></i> <span>Gejala</span>
                </a>
            </li>
            <li>
                <a href="{{ url('master/kerusakan/') }}">
                    <i class="fa fa-exclamation-triangle"></i> <span>Kerusakan</span>
                </a>
            </li>
            <li>
                <a href="{{ url('master/aturan/') }}">
                    <i class="fa fa-wrench"></i> <span>Aturan</span>
                </a>
            </li>
            <li>
            <li class="header">REPORT</li>
            <li>
                <a href="{{ route('laporan.index') }}">
                    <i class="fa fa-file-pdf-o"></i> <span>Laporan</span>
                </a>
            </li>
            <li class="header">SYSTEM</li>
            <li>
                <a href="{{ route('user.index') }}">
                    <i class="fa fa-users"></i> <span>User</span>
                </a>
            </li>
            <li>
                <a href="{{ route("setting.index") }}">
                    <i class="fa fa-cogs"></i> <span>Pengaturan</span>
                </a>
            </li>

            
            @elseif (auth()->user()->level == 2)
            <!-- Menu items for level 2 user -->
            <li>
                <a href="{{ url('/booking/pelanggan/status') }}">
                    <i class="fa fa-cart-arrow-down"></i> <span>Status Booking</span>
                </a>
            </li>
            <li>
                <a href="{{ url('/pelanggan/riwayatKonsultasi') }}">
                    <i class="fa fa-bicycle"></i> <span>Riwayat Konsultasi</span>
                </a>
            </li>
            <!-- End of menu items for level 2 user -->
            @endif
        </ul>
    </section>
    <!-- /.sidebar -->
</aside>