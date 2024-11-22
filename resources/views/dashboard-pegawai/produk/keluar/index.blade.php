@extends('layouts.main')

@section('container')
   <div class="page-inner">
      <div class="row">
      <div class="col-md-12">
         <div class="card">
            <div class="card-header">
               <div class="d-flex align-items-center">
                  <h4 class="card-title">Produk Keluar</h4>
                  <a href="{{ route('produk.keluar.create') }}" class="btn btn-primary btn-round ms-auto">
                     <i class="fa fa-plus"></i>
                     Catat Produk Keluar
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
                        <th>Staff Penginput</th>
                        <th>Jumlah keluar</th>
                        <th>Tanggal Keluar</th>
                        <th>Daerah Pengiriman</th>
                        <th>Kode Daerah</th>
                        <th style="width: 10%">Action</th>
                     </tr>
                  </thead>
                  <tbody>
                     @if ($catatanKeluar->isEmpty())
                        <tr>
                           <td colspan="9" class="text-center">Data belum tersedia</td>
                        </tr>
                     @else
                     @foreach ($catatanKeluar as $data)
                        
                        <tr>
                           <td>{{ $loop->iteration }}.</td>
                           <td>{{ $data->produk->name }}</td>
                           <td>{{ $data->produk->item_code }}</td>
                           <td>{{ $data->user->name }}</td>
                           <td>{{ $data->total_keluar }}</td>
                           <td>{{ $data->waktu_keluar }}</td>
                           <td>{{ $data->categoryDaerah->name}}</td>
                           <td>{{ $data->categoryDaerah->code}}</td>
                           <td>
                              <div class="form-button-action">
                                 <a href="{{ route('produk.keluar.edit', $data->id) }}" type="button" data-bs-toggle="tooltip" title="" class="btn btn-link btn-primary btn-lg" data-original-title="Edit Task">
                                    <i class="fa fa-edit"></i>
                                 </a>
                                    <form action="{{ route('produk.keluar.delete', $data->id) }}" method="POST">
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