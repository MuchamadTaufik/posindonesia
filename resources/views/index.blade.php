@extends('layouts.main')

@section('container')
   <div class="page-inner">
      <div class="d-flex align-items-left align-items-md-center flex-column flex-md-row pt-2 pb-4">
      <div>
         <h3 class="fw-bold mb-3">Dashboard</h3>
         <h6 class="op-7 mb-2">POS INDONESIA</h6>
      </div>
      </div>
      <div class="row">
      <div class="col-sm-6 col-md-3">
         <div class="card card-stats card-round">
            <div class="card-body">
            <div class="row align-items-center">
               <div class="col-icon">
                  <div class="icon-big text-center icon-primary bubble-shadow-small">
                  <i class="fas fa-list"></i>
                  </div>
               </div>
               <div class="col col-stats ms-3 ms-sm-0">
                  <div class="numbers">
                  <p class="card-category">Produk</p>
                  <h4 class="card-title">{{ $categoryProduk }}</h4>
                  </div>
               </div>
            </div>
            </div>
         </div>
      </div>
      <div class="col-sm-6 col-md-3">
         <div class="card card-stats card-round">
            <div class="card-body">
            <div class="row align-items-center">
               <div class="col-icon">
                  <div class="icon-big text-center icon-info bubble-shadow-small">
                     <i class="fas fa-list"></i>
                  </div>
               </div>
               <div class="col col-stats ms-3 ms-sm-0">
                  <div class="numbers">
                  <p class="card-category">Daerah</p>
                  <h4 class="card-title">{{ $categoryDaerah }}</h4>
                  </div>
               </div>
            </div>
            </div>
         </div>
      </div>
      <div class="col-sm-6 col-md-3">
         <div class="card card-stats card-round">
            <div class="card-body">
            <div class="row align-items-center">
               <div class="col-icon">
                  <div class="icon-big text-center icon-success bubble-shadow-small">
                  <i class="fas fa-box"></i>
                  </div>
               </div>
               <div class="col col-stats ms-3 ms-sm-0">
                  <div class="numbers">
                  <p class="card-category">Produk Masuk</p>
                  <h4 class="card-title">{{ $produk }}</h4>
                  </div>
               </div>
            </div>
            </div>
         </div>
      </div>
      <div class="col-sm-6 col-md-3">
         <div class="card card-stats card-round">
            <div class="card-body">
            <div class="row align-items-center">
               <div class="col-icon">
                  <div class="icon-big text-center icon-secondary bubble-shadow-small">
                  <i class="fas fa-box"></i>
                  </div>
               </div>
               <div class="col col-stats ms-3 ms-sm-0">
                  <div class="numbers">
                  <p class="card-category">Produk Keluar</p>
                  <h4 class="card-title">{{ $catatanKeluar }}</h4>
                  </div>
               </div>
            </div>
            </div>
         </div>
      </div>
      </div>
      <div class="row">
         <div class="col-md-8">
            <div class="card card-round">
               <div class="card-header">
               <div class="card-head-row">
                  <div class="card-title">User Statistics</div>
               </div>
               </div>
               <div class="card-body">
               <div class="chart-container" style="min-height: 375px">
                  {!! $statistikChart->container() !!}
               </div>
               <div id="myChartLegend"></div>
               </div>
            </div>
         </div>
         <div class="col-md-4">
            <div class="card card-round">
               <div class="card-body">
                  <div class="card-head-row card-tools-still-right">
                     <div class="card-title">Users</div>
                  </div>
                  <div class="card-list py-4">
                     @foreach ($user as $data)
                        <div class="item-list">
                           <div class="avatar">
                              <img src="assets/img/jm_denis.jpg" alt="..." class="avatar-img rounded-circle"/>
                           </div>
                           <div class="info-user ms-3">
                              <div class="username">{{ $data->name }}</div>
                              <div class="status">{{ $data->email }}</div>
                           </div>
                           <p>{{ $data->role }}</p>
                        </div>
                     @endforeach
                     
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>

   <script src="{{ $statistikChart->cdn() }}"></script>
   {{ $statistikChart->script() }}
@endsection