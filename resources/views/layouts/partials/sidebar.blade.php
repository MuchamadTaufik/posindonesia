<div class="sidebar" data-background-color="dark">
   <div class="sidebar-logo">
   <!-- Logo Header -->
   <div class="logo-header" data-background-color="dark">
      <a href="{{ route('home') }}" class="logo">
         <span class="text-white">POS INDONESIA</span>
      </a>
      <div class="nav-toggle">
         <button class="btn btn-toggle toggle-sidebar">
            <i class="gg-menu-right"></i>
         </button>
         <button class="btn btn-toggle sidenav-toggler">
            <i class="gg-menu-left"></i>
         </button>
      </div>
      <button class="topbar-toggler more">
         <i class="gg-more-vertical-alt"></i>
      </button>
   </div>
   <!-- End Logo Header -->
   </div>
   <div class="sidebar-wrapper scrollbar scrollbar-inner">
      <div class="sidebar-content">
         <ul class="nav nav-secondary">
         <li class="nav-item">
            <a href="{{ route('home') }}" class="collapsed">
               <i class="fas fa-home"></i>
               <p>Dashboard</p>
            </a>
         </li>
         @can('isStaff')
            <li class="nav-section">
               <span class="sidebar-mini-icon">
                  <i class="fa fa-ellipsis-h"></i>
               </span>
               <h4 class="text-section">Components</h4>
            </li>
            <li class="nav-item {{ Route::is('category-produk*') ? 'active' : '' }}">
               <a href="{{ route('category-produk') }}">
                  <i class="fas fa-list"></i>
                  <p>Kategori Produk</p>
               </a>
            </li>
            <li class="nav-item {{ Route::is('category-daerah*') ? 'active' : '' }}">
               <a href="{{ route('category-daerah') }}">
                  <i class="fas fa-list"></i>
                  <p>Kategori Daerah</p>
               </a>
            </li>
         @endcan
         <li class="nav-section">
            <span class="sidebar-mini-icon">
               <i class="fa fa-ellipsis-h"></i>
            </span>
            <h4 class="text-section">Data</h4>
         </li>
         @can('isStaff')
            <li class="nav-item {{ Route::is('produk.masuk*') ? 'active' : '' }}">
               <a href="{{ route('produk.masuk') }}">
                  <i class="fas fa-layer-group"></i>
                  <p>Produk Masuk</p>
               </a>
            </li>
            <li class="nav-item {{ Route::is('produk.keluar*') ? 'active' : '' }}">
               <a href="{{ route('produk.keluar') }}">
                  <i class="fas fa-th-list"></i>
                  <p>Produk Keluar</p>
               </a>
            </li>
         @endcan
         @can('isKepala')
            <li class="nav-item {{ Route::is('pengguna*') ? 'active' : '' }}">
               <a href="{{ route('pengguna') }}">
                  <i class="fas fa-users"></i>
                  <p>Daftar Pengguna</p>
               </a>
            </li>
         @endcan
         <li class="nav-item {{ Route::is('laporan*') ? 'active' : '' }}">
            <a href="{{ route('laporan') }}">
               <i class="fas fa-file"></i>
               <p>Laporan</p>
            </a>
         </li>
      </div>
   </div>
</div>