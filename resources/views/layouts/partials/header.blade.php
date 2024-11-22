<nav class="navbar navbar-header navbar-header-transparent navbar-expand-lg border-bottom">
   <div class="container-fluid">

      <ul class="navbar-nav topbar-nav ms-md-auto align-items-center">
         <li class="nav-item topbar-icon dropdown hidden-caret">
            <a class="nav-link dropdown-toggle" href="#" id="notifDropdown" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
               <i class="fa fa-bell"></i>
            </a>
            <ul class="dropdown-menu notif-box animated fadeIn" aria-labelledby="notifDropdown">
               <li>
                  <div class="dropdown-title">
                     Notification
                  </div>
               </li>
               <li>
                  @php
                     $userLogs = $logs->where('user_id', Auth::user()->id)->sortByDesc('created_at')->take(5);
                  @endphp
                  @foreach ($userLogs as $log)
                     @if ($log->user_id == Auth::user()->id)
                        <div class="notif-scroll scrollbar-outer">
                           <div class="notif-center">
                           <a href="#">
                              <div class="notif-icon notif-success">
                                 <i class="fa fa-comment"></i>
                              </div>
                              <div class="notif-content">
                                 <span class="block">
                                    {{ $log->event }}
                                 </span>
                                 <span class="time">{{ \Carbon\Carbon::parse($log->created_at)->locale('id')->timezone('Asia/Jakarta')->isoFormat('dddd, D MMMM Y, [Jam] HH:mm [WIB]') }}</span>
                              </div>
                           </a>
                           </div>
                        </div>
                     @endif
                  @endforeach
               </li>
               <li>
                  <a class="see-all" href="{{ route('notification') }}"
                     >See all notifications<i class="fa fa-angle-right"></i>
                  </a>
               </li>
            </ul>
         </li>

         <li class="nav-item topbar-user dropdown hidden-caret">
            <a class="dropdown-toggle profile-pic" data-bs-toggle="dropdown" href="#" aria-expanded="false">
            <div class="avatar-sm">
               <img src="/assets/img/profile.jpg"alt="..." class="avatar-img rounded-circle"/>
            </div>
            <span class="profile-username">
               <span class="op-7">Hi,</span>
               <span class="fw-bold">{{ auth()->user()->name }}</span>
            </span>
            </a>
            <ul class="dropdown-menu dropdown-user animated fadeIn">
            <div class="dropdown-user-scroll scrollbar-outer">
               <li>
                  <div class="user-box">
                     <div class="avatar-lg">
                        <img src="assets/img/profile.jpg" alt="image profile" class="avatar-img rounded"/>
                     </div>
                     <div class="u-text">
                        <h4>{{ auth()->user()->name }}</h4>
                        <p class="text-muted">{{ auth()->user()->email }}</p>
                        <form action="{{ route('logout') }}" method="POST">
                           @csrf
                           <button type="submit" class="btn btn-xs btn-secondary btn-sm">Logout</button>
                        </form>
                     </div>
                  </div>
               </li>
            </div>
            </ul>
         </li>
      </ul>
   </div>
</nav>