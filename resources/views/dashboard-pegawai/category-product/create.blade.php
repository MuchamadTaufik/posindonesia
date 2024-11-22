@extends('layouts.main')

@section('container')
   <div class="page-inner">
      <div class="row">
         <div class="col-md-12">
            <div class="card">
               <div class="card-header">
                  <div class="card-title">Form Tambah Kategori Produk</div>
               </div>
               <div class="card-body">
                  <form action="{{ route('category-produk.store') }}" method="POST">
                     @csrf
                        <div class="row">                           
                           <div class="col-md-12">
                              <div class="form-group">
                                    <label for="name">Nama Kategori Produk</label>
                                    <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" placeholder="Masukan Nama Kategori Produk..." value="{{ old('name') }}"/>
                                    @error('name')
                                       <div class="invalid-feedback">
                                          {{ $message }}
                                       </div>
                                    @enderror
                              </div>
                           </div>
                        </div>
                        <div class="card-action">
                           <button type="submit" class="btn btn-success">Simpan</button>
                           <a href="{{ route('category-produk') }}" class="btn btn-danger">Kembali</a>
                        </div>
                  </form>
               </div>
            </div>
         </div>
      </div>
   </div>
@endsection