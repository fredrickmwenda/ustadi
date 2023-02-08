<div class="navbar-bg"></div>
<nav class="navbar navbar-expand-lg main-navbar">
  <form class="form-inline mr-auto">
    <ul class="navbar-nav mr-3">
      <li><a href="#" data-toggle="sidebar" class="nav-link nav-link-lg"><i class="fas fa-bars"></i></a></li>
      <li><a href="#" data-toggle="search" class="nav-link nav-link-lg d-sm-none"><i class="fas fa-search"></i></a></li>
    </ul>
  </form>
  <ul class="navbar-nav navbar-right">
    <!-- notifications with its icon -->
    @if(Auth::user()->role_id == 1 || Auth::user()->role_id == 3)
    @php
    
    $notifications = App\Http\Controllers\NotificationsController::all();
   
    @endphp

      <div class="dropdown d-none d-lg-inline-block ms-1">
        <button type="button" class="btn header-item noti-icon waves-effect" data-toggle="fullscreen">
            <i class="bx bx-fullscreen"></i>
        </button>
      </div>
    <div class="dropdown d-inline-block">
      <button type="button" class="btn header-item noti-icon waves-effect" id="page-header-notifications-dropdown" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        <i class="bx bx-bell bx-tada"></i>
          <span class="badge bg-danger rounded-pill">3</span>
      </button>
        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-end p-0"
            aria-labelledby="page-header-notifications-dropdown">
            <div class="p-3">
                <div class="row align-items-center">
                    <div class="col">
                        <h6 class="m-0" key="t-notifications"> Notifications </h6>
                    </div>
                    <div class="col-auto">
                        <a href="#!" class="small" key="t-view-all"> View All</a>
                    </div>
                </div>
            </div>
            <div data-simplebar style="max-height: 230px;">
                @foreach (Auth::user()->unreadNotifications->take(5) as $notification)
                <a href="#" class="text-reset notification-item">
                    <div class="media">
                        <div class="avatar-xs me-3">
                            <span class="avatar-title bg-primary rounded-circle font-size-16">
                                <i class="bx bx-cart"></i>
                            </span>
                        </div>
                        <div class="media-body">
                            <h6 class="mt-0 mb-1" key="t-your-order"></h6>
                            <div class="font-size-12 text-muted">
                                <p class="mb-1" key="t-grammer"></p>
                                <p class="mb-0"><i class="mdi mdi-clock-outline"></i></p>
                            </div>
                        </div>
                    </div>
                </a>
                @endforeach
 
            </div>
            <div class="p-2 border-top d-grid">
                <a class="btn btn-sm btn-link font-size-14 text-center" href="javascript:void(0)">
                    <i class="mdi mdi-arrow-right-circle me-1"></i> <span key="t-view-more">View More..</span> 
                </a>
            </div>
        </div>
    </div>

    @endif
    <li class="dropdown"><a href="#" data-toggle="dropdown" class="nav-link dropdown-toggle nav-link-lg nav-link-user">
      @if(Auth::user()->profile_picture)
      <img alt="image" src="{{ asset('assets/images/profile/'. Auth::user()->avatar) }}" class="rounded-circle mr-1">
      @else
      <img alt="image" src="https://ui-avatars.com/api/?size=30&background=random&name={{ Auth::User()->name }}" class="rounded-circle mr-1">
      @endif
      <div class="d-sm-none d-lg-inline-block">{{ __('Hi') }}, {{ Auth::user()->first_name }}</div></a>
      <div class="dropdown-menu dropdown-menu-right">
        <a href="{{ route('profile') }}" class="dropdown-item has-icon">
           
          <i class="far fa-user"></i> {{ __('Profile') }}
        </a>
        <div class="dropdown-divider"></div>
        <a href="{{ Auth::user()->role_id == 1 ? route('logout') : route('logout') }}" class="dropdown-item has-icon text-danger">
          <i class="fas fa-sign-out-alt"></i> {{ __('Logout') }}
        </a>
      </div>
    </li>
  </ul>
</nav>

