<header id="page-topbar">
    <div class="navbar-header">
        <div class="d-flex">
            <!-- LOGO -->
            <div class="navbar-brand-box">
                <a href="{{ route('dashboard') }}" class="logo logo-dark">
                    <span class="logo-sm">
                        <!-- <img src="{{ asset('assets/images/logo.svg') }}" alt="" height="22"> -->
                      
                    </span>
                    <span class="logo-lg">
                    <span class="logo-lg-text-light" style="font-size: 22px;">Ustadi</span>
                        <!-- <img src="{{ asset('assets/images/logo-dark.png') }}" alt="" height="17"> -->
                    </span>
                </a>

                <a href="{{ route('dashboard') }}" class="logo logo-light">
                    <span class="logo-sm">
                    
                        <!-- <img src="{{ asset('assets/images/logo-light.svg') }}" alt="" height="22">       -->
                    </span>
                    <span class="logo-lg">
                        
                        <!-- <img src="{{ asset('assets/images/logo-light.png') }}" alt="" height="19"> -->
                    </span>
                </a>
            </div>

            <button type="button" class="btn btn-sm px-3 font-size-16 header-item waves-effect" id="vertical-menu-btn">
                <i class="fa fa-fw fa-bars"></i>
            </button>

            <!-- App Search-->


            <div class="dropdown dropdown-mega d-none d-lg-block ms-2">
                <button type="button" class="btn header-item">
                    <span key="t-megamenu">Ustadi</span>
                    <!-- <i class="mdi mdi-chevron-down"></i>  -->
                </button>
                <!-- <h1>Ustadi</h1> -->
                <!-- <span key="t-megamenu">Mega Menu</span> -->

            </div>
        </div>

        <div class="d-flex">


            <div class="dropdown d-inline-block">


            <div class="dropdown d-none d-lg-inline-block ms-1">
                <button type="button" class="btn header-item noti-icon waves-effect" data-toggle="fullscreen">
                    <i class="bx bx-fullscreen"></i>
                </button>
            </div>
            @if(Auth::user()->role == 'mentor')
            <div class="dropdown d-inline-block">
                <button type="button" class="btn header-item noti-icon waves-effect" id="page-header-notifications-dropdown" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i class="bx bx-bell bx-tada"></i>
                    @php
                        $user = Auth::user()->id;
                        $notifications = App\Models\Notifications::getNotifications($user);
                    @endphp
                    @if(count($notifications) > 0)
                    <span class="badge bg-danger rounded-pill">{{ count($notifications) }}</span>
                    @endif
                </button>
                <div class="dropdown-menu dropdown-menu-lg dropdown-menu-end p-0" aria-labelledby="page-header-notifications-dropdown">
                    <div class="p-3">
                        <div class="row align-items-center">
                            <div class="col">
                                <h6 class="m-0" key="t-notifications">Notifications </h6>
                            </div>
                            <div class="col-auto">
                                <a href="{{route('notifications.mark_all_as_read')}}" class="small" key="t-view-all">Mark All as Read</a>
                            </div>
                        </div>
                    </div>
                    <div data-simplebar="init" style="max-height: 230px;"><div class="simplebar-wrapper" style="margin: 0px;"><div class="simplebar-height-auto-observer-wrapper"><div class="simplebar-height-auto-observer"></div></div><div class="simplebar-mask"><div class="simplebar-offset" style="right: 0px; bottom: 0px;"><div class="simplebar-content-wrapper" style="height: auto; overflow: hidden;"><div class="simplebar-content" style="padding: 0px;">
                    
                        @foreach ($notifications as $notification)
                        <a href="#" class="text-reset notification-item">
                            <div class="media">
                                <div class="avatar-xs me-3">
                                    <span class="avatar-title bg-primary rounded-circle font-size-16">
                                        <i class="bx bx-git-pull-request"></i>
                                    </span>
                                </div>
                                <div class="media-body">
                                    <!-- data  in notification is an array of strings -->
                                    <!--Cannot access offset of type string on string solveve it-->
                                    @php
                                        $data = json_decode($notification->data);
                                    @endphp
                                    <!--get the message from the data array-->
                                    <h6 class="mt-0 mb-1" key="t-your-order">{{ $data->message }}
                                
                                    

                                    </h6>
                                    <div class="font-size-12 text-muted">
                                        <p class="mb-1" key="t-grammer">{{ $data->matron_name}} from {{$data->school_name}} has sent you a request for {{$data->activity_name}}  on {{$data->club_name}}</p>
                                        <p class="mb-0"><i class="mdi mdi-clock-outline"></i> <span key="t-min-ago">{{ Carbon\Carbon::parse($notification->created_at)->diffForHumans() }}</span></p>  
                                    </div>
                                </div>
                            </div>
                        </a>
                        @endforeach
                       
                    </div>
                   </div>
                  </div></div><div class="simplebar-placeholder" style="width: 0px; height: 0px;"></div></div><div class="simplebar-track simplebar-horizontal" style="visibility: hidden;"><div class="simplebar-scrollbar" style="transform: translate3d(0px, 0px, 0px); display: none;"></div></div><div class="simplebar-track simplebar-vertical" style="visibility: hidden;"><div class="simplebar-scrollbar" style="transform: translate3d(0px, 0px, 0px); display: none;"></div></div></div>
                    <div class="p-2 border-top d-grid">
                        <a class="btn btn-sm btn-link font-size-14 text-center" href="{{route('notifications.index')}}">
                            <i class="mdi mdi-arrow-right-circle me-1"></i> <span key="t-view-more">View More..</span> 
                        </a>
                    </div>
                </div>
            </div>
            @endif

            <div class="dropdown d-inline-block">
                <button type="button" class="btn header-item waves-effect" id="page-header-user-dropdown" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    @if(Auth::user()->profile_picture)
                    <img class="rounded-circle header-profile-user" src="{{ asset('assets/images/profile/'.Auth::user()->profile_picture) }}" alt="Header Avatar">
                    @else
                    <img class="rounded-circle header-profile-user" src="{{asset('assets/images/users/avatar-1.jpg')}}" alt="Header Avatar">
                    @endif
                    <span class="d-none d-xl-inline-block ms-1" key="t-henry"> {{ Auth::user()->name }} </span>
                    <i class="mdi mdi-chevron-down d-none d-xl-inline-block"></i>
                </button>
                <div class="dropdown-menu dropdown-menu-end">
                    <!-- item-->
                    <a class="dropdown-item" href="{{ route('profile') }}"><i class="bx bx-user font-size-16 align-middle me-1"></i> <span key="t-profile">Profile</span></a>

                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item text-danger" href="{{ route('user.logout') }}"><i class="bx bx-power-off font-size-16 align-middle me-1 text-danger"></i> <span key="t-logout">Logout</span></a>
                </div>
            </div>



        </div>
    </div>
  </div>
</header>

