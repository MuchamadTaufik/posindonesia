@extends('layouts.main')

@section('container')
   <div class="page-inner">
      <div class="row">
         <div class="col-md-12">
            <div class="card">
               <div class="card-header">
                  <div class="card-title">Form Ubah Kategori Daerah</div>
               </div>
               <div class="card-body">
                  <form action="{{ route('category-daerah.update', $categoryDaerah->id) }}" method="POST">
                     @method('put')
                     @csrf
                        <div class="row">                           
                           <div class="col-md-6">
                              <div class="form-group">
                                    <label for="name">Nama Kategori Daerah</label>
                                    <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" placeholder="Masukan Nama Kategori Daerah..." value="{{ old('name', $categoryDaerah->name) }}"/>
                                    @error('name')
                                       <div class="invalid-feedback">
                                          {{ $message }}
                                       </div>
                                    @enderror
                              </div>
                           </div>
                           <div class="col-md-6">
                              <div class="form-group">
                                    <label for="code">Code Daerah</label>
                                    <input type="text" class="form-control @error('code') is-invalid @enderror" id="code" name="code" placeholder="Masukan Kode Daerah..." value="{{ old('code', $categoryDaerah->code) }}"/>
                                    @error('code')
                                       <div class="invalid-feedback">
                                          {{ $message }}
                                       </div>
                                    @enderror
                              </div>
                           </div>
                        </div>
                        <div class="card-action">
                           <button type="submit" class="btn btn-success">Simpan</button>
                           <a href="{{ route('category-daerah') }}" class="btn btn-danger">Kembali</a>
                        </div>
                  </form>
               </div>
            </div>
         </div>
      </div>
   </div>
@endsection