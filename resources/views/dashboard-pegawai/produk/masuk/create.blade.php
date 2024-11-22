@extends('layouts.main')

@section('container')
   <div class="page-inner">
      <div class="row">
         <div class="col-md-12">
            <div class="card">
               <div class="card-header">
                  <div class="card-title">Form Tambah Produk Masuk</div>
               </div>
               <div class="card-body">
                  <form action="{{ route('produk.masuk.store') }}" method="POST">
                     @csrf
                        <div class="row">                           
                           <div class="col-md-6">
                              <div class="form-group">
                                    <label for="user_id">Staff Penginput</label>
                                    <input type="hidden" class="form-control @error('user_id') is-invalid @enderror" id="user_id" name="user_id" value="{{ auth()->user()->id }}" readonly/>
                                    <input type="text" class="form-control" value="{{ auth()->user()->name }}" readonly/>
                                    @error('user_id')
                                       <div class="invalid-feedback">
                                          {{ $message }}
                                       </div>
                                    @enderror
                              </div>
                           </div>
                           <div class="col-md-6">
                              <div class="form-group">
                                    <label for="category_produk_id">Kategori Produk</label>
                                    <select class="form-control @error('category_produk_id') is-invalid @enderror" id="category_select" name="category_produk_id" required value="{{ old('category_produk_id') }}">
                                       <option value="" disabled selected>Pilih Kategori</option>
                                       @foreach($categoryProduk as $data)
                                          <option value="{{ $data->id }}" {{ (old('category_produk_id') ?? '') == $data->id ? 'selected' : '' }}>
                                             {{ $data->name }}
                                          </option>
                                       @endforeach
                                    </select>
                                    @error('category_produk_id')
                                       <div class="invalid-feedback">
                                          {{ $message }}
                                       </div>
                                    @enderror
                              </div>
                           </div>
                           <div class="col-md-6">
                              <div class="form-group">
                                    <label for="category_daerah_id">Kategori Daerah</label>
                                    <select class="form-control @error('category_daerah_id') is-invalid @enderror" id="category_select" name="category_daerah_id" required value="{{ old('category_daerah_id') }}">
                                       <option value="" disabled selected>Pilih Kategori</option>
                                       @foreach($categoryDaerah as $data)
                                          <option value="{{ $data->id }}" {{ (old('category_daerah_id') ?? '') == $data->id ? 'selected' : '' }}>
                                             {{ $data->name }}
                                          </option>
                                       @endforeach
                                    </select>
                                    @error('category_daerah_id')
                                       <div class="invalid-feedback">
                                          {{ $message }}
                                       </div>
                                    @enderror
                              </div>
                           </div>
                           <div class="col-md-6">
                              <div class="form-group">
                                    <label for="name">Nama Produk</label>
                                    <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" placeholder="Masukan Nama Produk..." value="{{ old('name') }}" required/>
                                    @error('name')
                                       <div class="invalid-feedback">
                                          {{ $message }}
                                       </div>
                                    @enderror
                              </div>
                           </div>
                           <div class="col-md-6">
                              <div class="form-group">
                                    <label for="total_dikirim">Total Produk</label>
                                    <input type="number" class="form-control @error('total_dikirim') is-invalid @enderror" id="total_dikirim" name="total_dikirim" placeholder="Masukan Total Produk..." value="{{ old('total_dikirim') }}" required/>
                                    @error('total_dikirim')
                                       <div class="invalid-feedback">
                                          {{ $message }}
                                       </div>
                                    @enderror
                              </div>
                           </div>
                           <div class="col-md-6">
                              <div class="form-group">
                                    <label for="waktu_masuk">Tanggal Masuk</label>
                                    <input type="date" class="form-control @error('waktu_masuk') is-invalid @enderror" id="waktu_masuk" name="waktu_masuk" placeholder="Masukan Total Produk..." value="{{ old('waktu_masuk') }}" required/>
                                    @error('waktu_masuk')
                                       <div class="invalid-feedback">
                                          {{ $message }}
                                       </div>
                                    @enderror
                              </div>
                           </div>
                        </div>
                        <div class="card-action">
                           <button type="submit" class="btn btn-success">Simpan</button>
                           <a href="{{ route('produk.masuk') }}" class="btn btn-danger">Kembali</a>
                        </div>
                  </form>
               </div>
            </div>
         </div>
      </div>
   </div>
@endsection