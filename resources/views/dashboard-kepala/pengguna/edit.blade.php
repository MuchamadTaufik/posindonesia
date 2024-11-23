@extends('layouts.main')

@section('container')
   <div class="page-inner">
      <div class="row">
         <div class="col-md-12">
            <div class="card">
               <div class="card-header">
                  <div class="card-title">Form Ubah Pengguna</div>
               </div>
               <div class="card-body">
                  <form action="{{ route('pengguna.update', $user->id) }}" method="POST">
                     @method('put')
                     @csrf
                     <div class="row">
                        <div class="col-md-6">
                           <div class="form-group">
                              <label for="name">Nama Pengguna</label>
                              <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" placeholder="Masukan Nama..." value="{{ old('name', $user->name) }}" required/>
                              @error('name')
                                 <div class="invalid-feedback">
                                    {{ $message }}
                                 </div>
                              @enderror
                           </div>
                        </div>
                        <div class="col-md-6">
                           <div class="form-group">
                              <label for="email">Email</label>
                              <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email" placeholder="Masukan Email..." value="{{ old('email', $user->email) }}" required/>
                              @error('email')
                                 <div class="invalid-feedback">
                                    {{ $message }}
                                 </div>
                              @enderror
                           </div>
                        </div>
                        <div class="col-md-6">
                           <div class="form-group">
                              <label for="role">Role</label>
                              <select class="form-select" name="role" required style="width: 100%">
                                 <option value="" @if(old('role', $user->role) === null) selected @endif>-- Pilih Role --</option>
                                 <option value="staff" @if(old('role', $user->role) == 'staff') selected @endif>staff</option>
                                 <option value="kepala" @if(old('role', $user->role) == 'kepala') selected @endif>kepala</option>
                              </select>
                              @error('role')
                                 <div class="invalid-feedback">
                                    {{ $message }}
                                 </div>
                              @enderror
                           </div>
                        </div>
                        <div class="col-md-6">
                           <div class="form-group">
                              <label for="password">Password</label>
                              <input class="form-control @error('password') is-invalid @enderror" id="password" type="password" name="password" placeholder="Masukan Password..." >
                              @error('password')
                                 <div class="invalid-feedback">
                                    {{ $message }}
                                 </div>
                              @enderror
                           </div>
                        </div>
                        <div class="col-md-6">
                           <div class="form-group">
                              <label for="password_confirmation">Konfirmasi Password</label>
                              <input class="form-control" id="password_confirmation" type="password" name="password_confirmation" placeholder="Konfirmasi Password..." >
                           </div>
                        </div>
                     </div>
                     <div class="card-action">
                        <button type="submit" class="btn btn-success">Simpan</button>
                        <a href="{{ route('pengguna') }}" class="btn btn-danger">Kembali</a>
                     </div>
                  </form>
               </div>
            </div>
         </div>
      </div>
   </div>
@endsection
