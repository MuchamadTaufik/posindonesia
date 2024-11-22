@extends('layouts.main')

@section('container')
   <div class="page-inner">
      <div class="row">
      <div class="col-md-12">
         <div class="card">
            <div class="card-header">
               <div class="d-flex align-items-center">
                  <h4 class="card-title">Notification</h4>
               </div>
            </div>
            <div class="table-responsive">
               <table id="add-row" class="display table table-striped table-hover">
                  <thead>
                     <tr>
                        <th>No.</th>
                        <th>Title</th>
                        <th>Deskripsi</th>
                        <th>Tanggal</th>
                        <th style="width: 10%">Action</th>
                     </tr>
                  </thead>
                  <tbody>
                     @php
                        $userLogs = $logs->where('user_id', Auth::user()->id)->sortByDesc('created_at');
                     @endphp

                     @if($userLogs->count() > 0)
                        @foreach ($userLogs as $data)
                        <tr>
                           <td>{{ $loop->iteration }}.</td>
                           <td>{{ $data->event }}</td>
                           <td>{{ $data->extra }}</td>
                           <td>{{ \Carbon\Carbon::parse($data->created_at)->locale('id')->timezone('Asia/Jakarta')->isoFormat('dddd, D MMMM Y, [Jam] HH:mm [WIB]') }}</td>
                           <td>
                              <div class="form-button-action">
                                    <form action="{{ route('notification.delete', $data->id) }}" method="POST">
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
                     @else
                     <tr>
                        <td colspan="9" class="text-center">Data belum tersedia</td>
                     </tr>
                     @endif
                  </tbody>
               </table>
            </div>
         </div>
      </div>
      </div>
   </div>
@endsection