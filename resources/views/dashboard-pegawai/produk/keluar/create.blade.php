@extends('layouts.main')

@section('container')
   <div class="page-inner">
      <div class="row">
         <div class="col-md-12">
            <div class="card">
               <div class="card-header">
                  <div class="card-title">Form Tambah Catatan Keluar</div>
               </div>
               <div class="card-body">
                  <form action="{{ route('produk.keluar.store') }}" method="POST">
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
                                 <label for="produk_id">Produk</label>
                                 <select class="form-control @error('produk_id') is-invalid @enderror" id="produk_id" name="produk_id" required>
                                    <option value="" disabled selected>Pilih Kategori</option>
                                       @foreach($produk as $data)
                                          <option value="{{ $data->id }}" data-total="{{ $data->total_produk }}"
                                                {{ (old('produk_id') ?? '') == $data->id ? 'selected' : '' }}>
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
                                    <label>Jumlah Produk Tersedia</label>
                                    <input class="form-control" id="total_produk" value="{{ old('total_produk') }}"
                                       readonly />
                                 </div>
                           </div>
                           <div class="col-md-6">
                              <div class="form-group">
                                    <label for="total_keluar">Jumlah Produk Keluar</label>
                                    <input type="number" class="form-control @error('total_keluar') is-invalid @enderror" id="total_keluar" name="total_keluar" placeholder="Masukan Total Produk Keluar..." value="{{ old('total_keluar') }}" required/>
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
                                    <input type="date" class="form-control @error('waktu_keluar') is-invalid @enderror" id="waktu_keluar" name="waktu_keluar" value="{{ old('waktu_keluar') }}" required/>
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
                                 <select class="form-control @error('category_daerah_id') is-invalid @enderror" id="select" name="category_daerah_id" required value="{{ old('category_daerah_id') }}">
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

   <script>
         document.addEventListener('DOMContentLoaded', function () {
            const produkSelect = document.getElementById('produk_id');
            const totalProdukInput = document.getElementById('total_produk');
            const totalKeluarInput = document.getElementById('total_keluar');
            const form = document.getElementById('productForm');
         
            produkSelect.addEventListener('change', function () {
               const selectedOption = produkSelect.options[produkSelect.selectedIndex];
               const totalProduk = selectedOption.getAttribute('data-total');
               totalProdukInput.value = totalProduk;
            });
         
            form.addEventListener('submit', function (event) {
               const totalProduk = parseInt(totalProdukInput.value, 10);
               const totalKeluar = parseInt(totalKeluarInput.value, 10);
         
               if (totalKeluar > totalProduk) {
                     event.preventDefault();
                     alert('Jumlah produk keluar tidak boleh melebihi jumlah produk yang tersedia.');
               }
            });
         });
      </script>
@endsection