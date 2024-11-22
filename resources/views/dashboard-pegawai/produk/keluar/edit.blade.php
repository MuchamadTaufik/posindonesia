@extends('layouts.main')

@section('container')
   <div class="page-inner">
      <div class="row">
         <div class="col-md-12">
            <div class="card">
               <div class="card-header">
                  <div class="card-title">Form Ubah Catatan Keluar</div>
               </div>
               <div class="card-body">
                  <form action="{{ route('produk.keluar.update', $catatanKeluar->id) }}" method="POST" id="productForm">
                     @method('put')
                     @csrf
                     <div class="row">
                        <div class="col-md-6">
                           <div class="form-group">
                              <label for="produk_id">Produk</label>
                              <select class="form-control @error('produk_id') is-invalid @enderror" id="produk_id" name="produk_id" required>
                                 <option value="" disabled>Pilih Produk</option>
                                 @foreach($produk as $data)
                                    <option value="{{ $data->id }}"
                                          {{ old('produk_id', $catatanKeluar->produk_id) == $data->id ? 'selected' : '' }}>
                                          {{ $data->name }}
                                    </option>
                                 @endforeach
                              </select>
                              @error('produk_id')
                                 <div class="invalid-feedback">
                                    {{ $message }}
                                 </div>
                              @enderror
                           </div>
                        </div>
                        <div class="col-md-6">
                           <div class="form-group">
                              <label for="total_keluar">Jumlah Produk Keluar</label>
                              <input type="number" class="form-control @error('total_keluar') is-invalid @enderror" id="total_keluar" name="total_keluar" placeholder="Masukan Total Produk Keluar..." value="{{ old('total_keluar', $catatanKeluar->total_keluar) }}" required/>
                              @error('total_keluar')
                                 <div class="invalid-feedback">
                                    {{ $message }}
                                 </div>
                              @enderror
                           </div>
                        </div>
                        <div class="col-md-6">
                           <div class="form-group">
                              <label for="waktu_keluar">Tanggal Keluar</label>
                              <input type="date" class="form-control @error('waktu_keluar') is-invalid @enderror" id="waktu_keluar" name="waktu_keluar" value="{{ old('waktu_keluar', $catatanKeluar->waktu_keluar) }}" required/>
                              @error('waktu_keluar')
                                 <div class="invalid-feedback">
                                    {{ $message }}
                                 </div>
                              @enderror
                           </div>
                        </div>
                        <div class="col-md-6">
                           <div class="form-group">
                              <label for="category_daerah_id">Daerah Pengiriman</label>
                              <select class="form-control @error('category_daerah_id') is-invalid @enderror" id="select" name="category_daerah_id" required>
                                 <option value="" disabled>Pilih Kategori</option>
                                 @foreach($categoryDaerah as $data)
                                    <option value="{{ $data->id }}" {{ old('category_daerah_id', $catatanKeluar->category_daerah_id) == $data->id ? 'selected' : '' }}>
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
                     </div>
                     <div class="card-action">
                        <button type="submit" class="btn btn-success">Simpan</button>
                        <a href="{{ route('produk.keluar') }}" class="btn btn-danger">Kembali</a>
                     </div>
                  </form>
               </div>
            </div>
         </div>
      </div>
   </div>
@endsection
