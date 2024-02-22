<!-- ========== Topbar Start ========== -->
<div class="navbar-custom">
    <div class="topbar">
        <div class="topbar-menu d-flex align-items-center gap-lg-2 gap-1">

            <!-- Brand Logo -->
            <div class="logo-box">
                <!-- Brand Logo Light -->
                <a href="index.html" class="logo-light">
                    <img src="{{asset('admin/assets/images/logo-light.png')}}" alt="logo" class="logo-lg" height="22">
                    <img src="{{asset('admin/assets/images/logo-sm.png')}}" alt="small logo" class="logo-sm" height="22">
                </a>

                <!-- Brand Logo Dark -->
                <a href="index.html" class="logo-dark">
                    <img src="{{asset('admin/assets/images/logo-dark.png')}}" alt="dark logo" class="logo-lg" height="22">
                    <img src="{{asset('admin/assets/images/logo-sm.png')}}" alt="small logo" class="logo-sm" height="22">
                </a>
            </div>

            <!-- Sidebar Menu Toggle Button -->
            <button class="button-toggle-menu">
                <i class="mdi mdi-menu"></i>
            </button>
        </div>

        <ul class="topbar-menu d-flex align-items-center gap-4">

            @if(Request::is('agent/home'))
                <li class="d-none d-md-inline-block">
                    <form id="toggleStatusForm" action="{{ route('status.toggle') }}" method="POST">
                        @csrf
                        <button type="submit" id="changeStatusBtn" class="btn btn-primary">
                            @if(auth()->user()->status && auth()->user()->status->status === 'not_available')
                                Disponible
                            @else
                                Non disponible
                            @endif
                        </button>
                    </form>
                </li>
            @endif

            <li class="d-none d-md-inline-block">
                <a class="nav-link" href="" data-bs-toggle="fullscreen">
                    <i class="mdi mdi-fullscreen font-size-24"></i>
                </a>
            </li>
            <li class="dropdown notification-list">
                <a class="nav-link dropdown-toggle waves-effect waves-light arrow-none" data-bs-toggle="dropdown" href="#" role="button" aria-haspopup="false" aria-expanded="false">
                    <i class="mdi mdi-bell font-size-24"></i>
                    <span class="badge bg-danger rounded-circle noti-icon-badge">{{ $notifications->count() }}</span>
                </a>
                <div class="dropdown-menu dropdown-menu-end dropdown-menu-animated dropdown-lg py-0">
                    <div class="p-2 border-top-0 border-start-0 border-end-0 border-dashed border">
                        <div class="row align-items-center">
                            <div class="col">
                                <h6 class="m-0 font-size-16 fw-semibold">Notification</h6>
                            </div>
                            <div class="col-auto">
                                <a href="#" class="text-dark text-decoration-underline">
                                    <small>Clear All</small>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="px-1" style="max-height: 300px;" data-simplebar>
                        @forelse($notifications as $notification)
                            <a href="javascript:void(0);" class="dropdown-item p-0 notify-item card shadow-none mb-1">
                                <div class="card-body">
                                    <span class="float-end noti-close-btn text-muted"><i class="mdi mdi-close"></i></span>
                                    <div class="d-flex align-items-center">
                                        <div class="flex-shrink-0">
                                            <div class="notify-icon bg-primary">
                                                <i class="mdi mdi-comment-account-outline"></i>
                                            </div>
                                        </div>
                                        <div class="flex-grow-1 ms-2">
                                            <p class="noti-item-subtitle text-muted mb-1" style="white-space: normal;">{{ $notification->message }}</p>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        @empty
                            <p class="text-muted font-size-13 fw-normal mt-2">Aucune notification</p>
                        @endforelse
                    </div>
                </div>
            </li>

            <li class="nav-link" id="theme-mode">
                <i class="bx bx-moon font-size-24"></i>
            </li>

            <li class="dropdown">
                @if(Auth::check())
                <a class="nav-link dropdown-toggle nav-user me-0 waves-effect waves-light" data-bs-toggle="dropdown" href="#" role="button" aria-haspopup="false" aria-expanded="false">
                    @if($user->photo)
                        <img src="{{ asset('storage/' . $user->photo) }}" alt="user-image" class="rounded-circle">
                    @endif
                    <span class="ms-1 d-none d-md-inline-block">
                         <i class="mdi mdi-chevron-down"></i>
                    {{ Auth::user()->name }}
                    </span>
                </a>
                @else
                    <script>window.location.href = "{{ route('welcome') }}";</script>
                @endif
                <div class="dropdown-menu dropdown-menu-end profile-dropdown ">
                    <!-- item-->
                    <div class="dropdown-header noti-title">
                        <h6 class="text-overflow m-0">Bienvenue !</h6>
                    </div>

                    <div class="dropdown-divider"></div>

                    <!-- item-->
                    <a href="#" class="dropdown-item notify-item" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                        <i class="fe-log-out"></i>
                        <span>Déconnexion</span>
                    </a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>

                </div>
            </li>

        </ul>
    </div>
</div>

<script src="{{ asset('js/app.js') }}"></script>


<!-- ========== Topbar End ========== -->
