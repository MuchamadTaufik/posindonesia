@extends('layouts.main')

@section('container')
   <div class="page-inner">
      <div class="row">
      <div class="col-md-12">
         <div class="card">
            <div class="card-header">
               <div class="d-flex align-items-center">
                  <h4 class="card-title">Laporan Produk</h4>
                  <a href="" class="btn btn-primary btn-round ms-auto">
                     <i class="fa fa-download"></i>
                     Download
                  </a>
               </div>
            </div>
            <div class="table-responsive">
               <table id="add-row" class="display table table-striped table-hover">
                  <thead>
                     <tr>
                        <th>No.</th>
                        <th>Nama Produk</th>
                        <th>Code Produk</th>
                        <th>Kategori Produk</th>
                        <th>Staff Penginput</th>
                        <th>Nomor IDO</th>
                        <th>Serial Number Awal</th>
                        <th>Serial Number Akhir</th>
                        <th>Jumlah dikirim</th>
                        <th>Jumlah keluar</th>
                        <th>Jumlah Sisa Barang</th>
                        <th>Tanggal Masuk</th>
                        <th>Tanggal Keluar</th>
                        <th>Daerah Pengiriman</th>
                        <th>Kode Daerah</th>
                     </tr>
                  </thead>
                  <tbody>
                     @if ($catatanKeluar->isEmpty())
                        <tr>
                           <td colspan="8" class="text-center">Data belum tersedia</td>
                        </tr>
                     @else
                     @foreach ($catatanKeluar as $data)
                        
                        <tr>
                           <td>{{ $loop->iteration }}.</td>
                           <td>{{ $data->produk->name }}</td>
                           <td>{{ $data->produk->item_code }}</td>
                           <td>{{ $data->produk->categoryProduk->name }}</td>
                           <td>{{ $data->user->name }}</td>
                           <td>{{ $data->produk->nomor_ido }}</td>
                           <td>{{ $data->produk->serial_number_awal }}</td>
                           <td>{{ $data->produk->serial_number_akhir }}</td>
                           <td>{{ $data->produk->total_dikirim }}</td>
                           <td>{{ $data->total_keluar }}</td>
                           <td>{{ $data->produk->total_produk }}</td>
                           <td>{{ $data->waktu_keluar }}</td>
                           <td>{{ $data->produk->waktu_masuk }}</td>
                           <td>{{ $data->categoryDaerah->name}}</td>
                           <td>{{ $data->categoryDaerah->code}}</td>
                        </tr>
                        @endforeach
                        @endif
                  </tbody>
               </table>
            </div>
         </div>
      </div>
      </div>
   </div>
@endsection