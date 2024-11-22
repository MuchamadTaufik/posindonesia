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
         <li class="nav-section">
            <span class="sidebar-mini-icon">
               <i class="fa fa-ellipsis-h"></i>
            </span>
            <h4 class="text-section">Data</h4>
         </li>
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
         <li class="nav-item">
            <a data-bs-toggle="collapse" href="#forms">
               <i class="fas fa-pen-square"></i>
               <p>Laporan</p>
               <span class="caret"></span>
            </a>
            <div class="collapse" id="forms">
               <ul class="nav nav-collapse">
                  <li>
                  <a href="forms/forms.html">
                     <span class="sub-item">Basic Form</span>
                  </a>
                  </li>
               </ul>
            </div>
         </li>
         <li class="nav-item">
            <a data-bs-toggle="collapse" href="#tables">
               <i class="fas fa-table"></i>
               <p>History Pengiriman</p>
               <span class="caret"></span>
            </a>
            <div class="collapse" id="tables">
               <ul class="nav nav-collapse">
                  <li>
                  <a href="tables/tables.html">
                     <span class="sub-item">Basic Table</span>
                  </a>
                  </li>
                  <li>
                  <a href="tables/datatables.html">
                     <span class="sub-item">Datatables</span>
                  </a>
                  </li>
               </ul>
            </div>
         </li>
      </div>
   </div>
</div>