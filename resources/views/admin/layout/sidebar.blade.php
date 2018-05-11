<!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">

    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">

      <!-- Sidebar user panel (optional) -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="{{ asset('assets/images/user-1.png') }}" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p>{{ Auth::guard('admin')->user()->get_karyawan->nama }}</p>
          <!-- Status -->
          <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <ul class="sidebar-menu" data-widget="tree">
        <li class="header">HEADER</li>
        <!-- Optionally, you can add icons to the links -->
        <li><a href="{{ url('index/admin/dashboard') }}"><i class="fa fa-home"></i> <span>Dashboard</span></a></li>
        @can('menu produk')
        <li class="treeview">
          <a href="#"><i class="fa fa-bookmark"></i> <span>Produk</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="{{ url('index/admin/produk/wisata') }}"><i class="fa fa-link"></i> Wisata</a></li>
            <li><a href="{{ url('index/admin/produk/sedekah') }}"><i class="fa fa-link"></i> Sedekah</a></li>
            <li><a href="{{ url('index/admin/produk/agen') }}"><i class="fa fa-link"></i> Agen</a></li>
          </ul>
        </li>
        @endcan
        @can('menu paket haji umroh')
        <li><a href="{{ url('index/admin/paket') }}"><i class="fa fa-plane"></i> <span>Paket Haji & Umroh</span></a></li>
        @endcan
        @can('menu transaksi')
        <li class="treeview">
          <a href="#"><i class="fa fa-shopping-cart"></i> <span>Transaksi</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="{{ url('index/admin/transaksi/haji') }}"><i class="fa fa-link"></i> Haji</a></li>
            <li><a href="{{ url('index/admin/transaksi/umroh') }}"><i class="fa fa-link"></i> Umroh</a></li>
            <li><a href="{{ url('index/admin/transaksi/wisata') }}"><i class="fa fa-link"></i> Wisata</a></li>
            <li><a href="{{ url('index/admin/transaksi/sedekah') }}"><i class="fa fa-link"></i> Sedekah</a></li>
            <li><a href="{{ url('index/admin/transaksi/bayar-paket') }}"><i class="fa fa-link"></i> Bayar Paket</a></li>
            <li><a href="{{ url('index/admin/transaksi/top-up') }}"><i class="fa fa-link"></i> Top Up Bayar-bayar</a></li>
            <li><a href="{{ url('index/admin/transaksi/konfirmasi-user') }}"><i class="fa fa-link"></i> Konfirmasi User/Agen</a></li>
            <li><a href="{{ url('index/admin/transaksi/ppob') }}"><i class="fa fa-link"></i> PPOB</a></li>
          </ul>
        </li>
        @endcan
        @can('menu kwitansi')
        <li><a href="{{ url('index/admin/kwitansi') }}"><i class="fa fa-pencil"></i> Kwitansi</a></li>
        @endcan
        @can('menu data user')
        <li class="treeview">
          <a href="#"><i class="fa fa-group"></i> <span>Data User</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="{{ url('index/admin/data-user/user') }}"><i class="fa fa-link"></i> User</a></li>
            <li><a href="{{ url('index/admin/data-user/agen') }}"><i class="fa fa-link"></i> Agen</a></li>
          </ul>
        </li>
        @endcan
        @can('menu voucher')
        <li class="header">MASTER VOUCHER</li>
        <li><a href="{{ url('index/admin/voucher') }}"><i class="fa fa-ticket"></i> <span>Voucher</span></a></li>
        @endcan
        @if(auth()->guard('admin')->user()->can('menu jamaah') || auth()->guard('admin')->user()->can('menu booking') || auth()->guard('admin')->user()->can('menu kloter') || auth()->guard('admin')->user()->can('menu bus') || auth()->guard('admin')->user()->can('menu kamar'))
        <li class="header">MANIFEST</li>
        <li class="treeview">
          <a href="#"><i class="fa fa-plane"></i> <span>Data Booking</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            @can('menu jamaah')
            <li><a href="{{ url('index/admin/data-booking/jamaah') }}"><i class="fa fa-link"></i> Jamaah</a></li>
            @endcan
            @can('menu booking')
            <li><a href="{{ url('index/admin/data-booking/booking') }}"><i class="fa fa-link"></i> Booking</a></li>
            @endcan
          </ul>
        </li>
        @if(auth()->guard('admin')->user()->can('menu kloter') || auth()->guard('admin')->user()->can('menu bus') || auth()->guard('admin')->user()->can('menu kamar'))
        <li class="treeview">
          <a href="#"><i class="fa fa-suitcase"></i> <span>Data Kloter</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            @can('menu kloter')
            <li><a href="{{ url('index/admin/data-kloter/kloter') }}"><i class="fa fa-link"></i> Kloter</a></li>
            @endcan
            @can('menu bus')
            <li><a href="{{ url('index/admin/data-kloter/bus') }}"><i class="fa fa-link"></i> Bus</a></li>
            @endcan
            @can('menu kamar')
            <li><a href="{{ url('index/admin/data-kloter/kamar') }}"><i class="fa fa-link"></i> Kamar</a></li>
            @endcan
          </ul>
        </li>
        @endif
        @endif
        <li class="header">MASTER DATA</li>
        @can('menu karyawan')
        <li><a href="{{ url('index/admin/karyawan') }}"><i class="fa fa-user"></i> <span>Karyawan</span></a></li>
        @endcan
        @can('menu divisi')
        <li><a href="{{ url('index/admin/divisi') }}"><i class="fa fa-building"></i> <span>Divisi</span></a></li>
        @endcan
        @can('menu jabatan')
        <li><a href="{{ url('index/admin/jabatan') }}"><i class="fa fa-briefcase"></i> <span>Jabatan</span></a></li>
        @endcan
        <li class="treeview">
          <a href="#"><i class="fa fa-user-md"></i> <span>Data Admin</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            @can('menu data admin')
            <li><a href="{{ url('index/admin/user/') }}"><i class="fa fa-link"></i> Admin</a></li>
            @endcan
            @can('menu role')
            <li><a href="{{ url('index/admin/role') }}"><i class="fa fa-link"></i> Role</a></li>
            @endcan
            @can('menu permission')
            <li><a href="{{ url('index/admin/permission') }}"><i class="fa fa-link"></i> Permission</a></li>
            @endcan
          </ul>
        </li>
        @if(auth()->guard('admin')->user()->can('menu report admin'))
        <li class="header">REPORT</li>
        <li class="treeview">
          <a href="#"><i class="fa fa-book"></i> <span>Data Report</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            @can('menu report admin')
            <li><a href="{{ url('index/admin/report-admin') }}"><i class="fa fa-link"></i> Admin</a></li>
            @endcan
            @can('menu kas')
            <li><a href="{{ url('index/admin/kas') }}"><i class="fa fa-link"></i> Kas</a></li>
            @endcan
          </ul>
        </li>
        @endif
        @if(auth()->guard('admin')->user()->can('menu edit bantuan') || auth()->guard('admin')->user()->can('menu informasi'))
        <li class="header">PENGATURAN</li>
        @can('menu edit bantuan')
        <li><a href="{{ url('index/admin/pengaturan/edit-halaman-bantuan') }}"><i class="fa fa-question-circle"></i> <span>Edit Halaman Bantuan</span></a></li>
        @endcan
        @can('menu informasi')
        <li><a href="{{ url('index/admin/pengaturan/informasi') }}"><i class="fa fa-info-circle"></i> <span>Informasi</span></a></li>
        @endcan
        @endif
        {{-- <li class="treeview">
          <a href="#"><i class="fa fa-link"></i> <span>Multilevel</span>
            <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="#">Link in level 2</a></li>
            <li><a href="#">Link in level 2</a></li>
          </ul>
        </li> --}}
      </ul>
      <!-- /.sidebar-menu -->
    </section>
    <!-- /.sidebar -->
  </aside>