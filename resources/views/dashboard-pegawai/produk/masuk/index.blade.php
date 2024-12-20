@extends('layouts.main')

@section('container')
   <div class="page-inner">
      <div class="row">
      <div class="col-md-12">
         <div class="card">
            <div class="card-header">
               <div class="d-flex align-items-center">
                  <h4 class="card-title">Produk Masuk</h4>
                  <a href="{{ route('produk.masuk.create') }}" class="btn btn-primary btn-round ms-auto">
                     <i class="fa fa-plus"></i>
                     Tambah Produk
                  </a>
               </div>
            </div>
            <div class="table-responsive">
               <table id="add-row" class="display table table-striped table-hover">
                  <thead>
                     <tr>
                        <th>No.</th>
                        <th>Code Produk</th>
                        <th>Nama Produk</th>
                        <th>Nomor IDO</th>
                        <th>Serial Number Awal</th>
                        <th>Serial Number Akhir</th>
                        <th>Staff Penginput</th>
                        <th>Category Produk</th>
                        <th>Jumlah Dikirim</th>
                        <th>Tanggal Masuk</th>
                        <th style="width: 10%">Action</th>
                     </tr>
                  </thead>
                  <tbody>
                     @if ($produk->isEmpty())
                        <tr>
                           <td colspan="11" class="text-center">Data belum tersedia</td>
                        </tr>
                     @else
                     @foreach ($produk as $data)
                        
                        <tr>
                           <td>{{ $loop->iteration }}.</td>
                           <td>{{ $data->item_code }}</td>
                           <td>{{ $data->name }}</td>
                           <td>{{ $data->nomor_ido }}</td>
                           <td>{{ $data->serial_number_awal }}</td>
                           <td>{{ $data->serial_number_akhir }}</td>
                           <td>{{ $data->user->name }}</td>
                           <td>{{ $data->categoryProduk->name}}</td>
                           <td>{{ $data->total_dikirim }}</td>
                           <td>{{ $data->waktu_masuk }}</td>
                           <td>
                              <div class="form-button-action">
                                 <a href="{{ route('produk.masuk.edit', $data->id) }}" type="button" data-bs-toggle="tooltip" title="" class="btn btn-link btn-primary btn-lg" data-original-title="Edit Task">
                                    <i class="fa fa-edit"></i>
                                 </a>
                                    <form action="{{ route('produk.masuk.delete', $data->id) }}" method="POST">
                                       @csrf
                                       @method('delete')
                                       <button type="submit" data-bs-toggle="tooltip" title="" class="btn btn-link btn-danger" data-original-title="Remove" onclick="return confirm('Apakah yakin ingin menghapus data?')">
                                             <i class="fa fa-times"></i>
                                       </button>
                                    </form>
                              </div>
                           </td>
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