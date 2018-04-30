<!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">

    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">

      <!-- Sidebar user panel (optional) -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="{{ asset('admin/img/user2-160x160.jpg') }}" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p>Alexander Pierce</p>
          <!-- Status -->
          <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <ul class="sidebar-menu" data-widget="tree">
        <li class="header">HEADER</li>
        <!-- Optionally, you can add icons to the links -->
        <li><a href="{{ url('index/admin/dashboard') }}"><i class="fa fa-home"></i> <span>Dashboard</span></a></li>
        <li class="treeview">
          <a href="#"><i class="fa fa-bookmark"></i> <span>Produk</span>
            <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="{{ url('index/admin/produk/haji') }}"><i class="fa fa-link"></i> Haji</a></li>
            <li><a href="{{ url('index/admin/produk/umroh') }}"><i class="fa fa-link"></i> Umroh</a></li>
            <li><a href="{{ url('index/admin/produk/wisata') }}"><i class="fa fa-link"></i> Wisata</a></li>
            <li><a href="{{ url('index/admin/produk/sedekah') }}"><i class="fa fa-link"></i> Sedekah</a></li>
            <li><a href="{{ url('index/admin/produk/tabungan') }}"><i class="fa fa-link"></i> Tabungan</a></li>
          </ul>
        </li>
        <li class="treeview">
          <a href="#"><i class="fa fa-shopping-cart"></i> <span>Transaksi</span>
            <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="{{ url('index/admin/transaksi/haji') }}"><i class="fa fa-link"></i> Haji</a></li>
            <li><a href="#"><i class="fa fa-link"></i> Umroh</a></li>
            <li><a href="#"><i class="fa fa-link"></i> Wisata</a></li>
            <li><a href="#"><i class="fa fa-link"></i> Sedekah</a></li>
            <li><a href="#"><i class="fa fa-link"></i> Bayar Paket</a></li>
            <li><a href="#"><i class="fa fa-link"></i> Top Up Bayar-bayar</a></li>
            <li><a href="#"><i class="fa fa-link"></i> PPOB</a></li>
          </ul>
        </li>
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
        <li class="header">MASTER VOUCHER</li>
        <li><a href="{{ url('index/admin/voucher') }}"><i class="fa fa-ticket"></i> Voucher</a></li>
        <li class="header">MASTER DATA</li>
        <li><a href="{{ url('index/admin/karyawan') }}"><i class="fa fa-user"></i> <span>Karyawan</span></a></li>
        <li><a href="{{ url('index/admin/divisi') }}"><i class="fa fa-building"></i> <span>Divisi</span></a></li>
        <li><a href="{{ url('index/admin/jabatan') }}"><i class="fa fa-briefcase"></i> <span>Jabatan</span></a></li>
        <li class="header">PENGATURAN</li>
        <li><a href="{{ url('index/admin/pengaturan/edit-halaman-bantuan') }}"><i class="fa fa-question-circle"></i> <span>Edit Halaman Bantuan</span></a></li>
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