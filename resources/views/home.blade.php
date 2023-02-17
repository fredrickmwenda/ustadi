@extends('layouts.app')

@push('css')
<link rel="stylesheet" href="{{ asset('assets/libs/fullcalendar/fullcalendar.min.css') }}" />
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/qtip2/3.0.3/basic/jquery.qtip.min.css">
<!-- <link rel="stylesheet" href="{{ asset('assets/libs/apexcharts/apexcharts.min.css') }}" /> -->
@endpush

@section('content')
<!-- <div class="main-content"> -->

    <div class="page-content">
        <div class="container-fluid">

            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0 font-size-18">Dashboard</h4>

                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <!-- <li class="breadcrumb-item"><a href="javascript: void(0);">Dashboards</a></li> -->
                                <li class="breadcrumb-item active">Dashboard</li>
                            </ol>
                        </div>

                    </div>
                </div>
            </div>
            <!-- end page title -->

            <div class ="row">
                <div class="col-xl-12">
                @if (Auth::check())
                    @if (Auth::user()->role_id == 1 || Auth::user()->role_id == 3)
                    <div class="row">
                        <div class="col-md-3">
                            <div class="card mini-stats-wid">
                                <div class="card-body">
                                    <div class="media">
                                        <div class="media-body">
                                            <p class="text-muted fw-medium">Schools</p>
                                            <h4 class="mb-0">{{ $schools }}</h4>
                                        </div>

                                        <div class="mini-stat-icon avatar-sm rounded-circle bg-primary align-self-center">
                                            <span class="avatar-title">
                                                <i class="bx bx-building font-size-24"></i>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="card mini-stats-wid">
                                <div class="card-body">
                                    <div class="media">
                                        <div class="media-body">
                                            <p class="text-muted fw-medium">Clubs</p>
                                            <h4 class="mb-0">{{ $clubs }}</h4>
                                        </div>

                                        <div class="avatar-sm rounded-circle bg-primary align-self-center mini-stat-icon">
                                            <span class="avatar-title rounded-circle bg-primary">
                                                <i class="bx bx-certification font-size-24"></i>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="card mini-stats-wid">
                                <div class="card-body">
                                    <div class="media">
                                        <div class="media-body">
                                            <p class="text-muted fw-medium">Requests</p>
                                            <h4 class="mb-0">{{ $requests }}</h4>
                                        </div>

                                        <div class="avatar-sm rounded-circle bg-primary align-self-center mini-stat-icon">
                                            <span class="avatar-title rounded-circle bg-primary">
                                                <i class="bx bx-git-pull-request font-size-24"></i>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="card mini-stats-wid">
                                <div class="card-body">
                                    <div class="media">
                                        <div class="media-body">
                                            <p class="text-muted fw-medium">Users</p>
                                            <h4 class="mb-0">{{ $users }}</h4>
                                        </div>

                                        <div class="avatar-sm rounded-circle bg-primary align-self-center mini-stat-icon">
                                            <span class="avatar-title rounded-circle bg-primary">
                                                <i class="bx bx-user font-size-24"></i>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endif
                    @if (Auth::user()->role_id == 4)
                    @php
                        $matron = App\Models\Matron::where('user_id', Auth::user()->id)->first();
                        $school_id = $matron->school_id;
                        $students = App\Models\SchoolClub::where('school_id', $school_id)->count('students_count');
                        $school_requests = App\Models\Request::where('school_id', $school_id)->count();
                        $school_clubs = App\Models\SchoolClub::where('school_id', $school_id)->count();
                    @endphp

                    <div class="row">
                        <div class="col-md-3">
                            <div class="card mini-stats-wid">
                                <div class="card-body">
                                    <div class="media">
                                        <div class="media-body">
                                            <p class="text-muted fw-medium">Students</p>
                                            <h4 class="mb-0">{{ $students }}</h4>
                                        </div>

                                        <div class="mini-stat-icon avatar-sm rounded-circle bg-primary align-self-center">
                                            <span class="avatar-title">
                                                <i class="bx bx-user font-size-24"></i>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="card mini-stats-wid">
                                <div class="card-body">
                                    <div class="media">
                                        <div class="media-body">
                                            <p class="text-muted fw-medium">Requests</p>
                                            <h4 class="mb-0">{{ $school_requests }}</h4>
                                        </div>

                                        <div class="avatar-sm rounded-circle bg-primary align-self-center mini-stat-icon">
                                            <span class="avatar-title rounded-circle bg-primary">
                                                <i class="bx bx-git-pull-request font-size-24"></i>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="card mini-stats-wid">
                                <div class="card-body">
                                    <div class="media">
                                        <div class="media-body">
                                            <p class="text-muted fw-medium">Resources</p>
                                            <h4 class="mb-0">{{ $resources }}</h4>
                                        </div>

                                        <div class="avatar-sm rounded-circle bg-primary align-self-center mini-stat-icon">
                                            <span class="avatar-title rounded-circle bg-primary">
                                                <i class="bx bx-book font-size-24"></i>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="card mini-stats-wid">
                                <div class="card-body">
                                    <div class="media">
                                        <div class="media-body">
                                            <p class="text-muted fw-medium">School Clubs</p>
                                            <h4 class="mb-0">{{ $school_clubs }}</h4>
                                        </div>

                                        <div class="avatar-sm rounded-circle bg-primary align-self-center mini-stat-icon">
                                            <span class="avatar-title rounded-circle bg-primary">
                                                <i class="bx bx-certification font-size-24"></i>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endif

                    @if (Auth::user()->role_id == 2)
                    @php
                        $specializations = App\Models\Mentor::where('user_id', Auth::user()->id)->first();
                        $mentor_requests = App\Models\Request::where('mentor_id', $specializations->id)->where('accepted', 1)->count();
                        $mentor_resources = App\Models\Resource::where('from_id', $specializations->id)->count();
                        $mentor_schools = App\Models\Request::where('mentor_id', $specializations->id)->where('accepted', 1)->distinct('school_id')->count('school_id');
                       
                        
                        $specializations = explode(',', $specializations->specialization);
                        $specializations = count($specializations);
                    @endphp
                    <div class="row">
                        <div class="col-md-3">
                            <div class="card mini-stats-wid">
                                <div class="card-body">
                                    <div class="media">
                                        <div class="media-body">
                                            <p class="text-muted fw-medium">Schools Mentored</p>
                                            <h4 class="mb-0">{{ $mentor_schools }}</h4>
                                        </div>

                                        <div class="mini-stat-icon avatar-sm rounded-circle bg-primary align-self-center">
                                            <span class="avatar-title">
                                                <i class="bx bx-building font-size-24"></i>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="card mini-stats-wid">
                                <div class="card-body">
                                    <div class="media">
                                        <div class="media-body">
                                            <p class="text-muted fw-medium">Requests Accepted</p>
                                            <h4 class="mb-0">{{ $mentor_requests }}</h4>
                                        </div>

                                        <div class="avatar-sm rounded-circle bg-primary align-self-center mini-stat-icon">
                                            <span class="avatar-title rounded-circle bg-primary">
                                                <i class="bx bx-git-pull-request font-size-24"></i>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="card mini-stats-wid">
                                <div class="card-body">
                                    <div class="media">
                                        <div class="media-body">
                                            <p class="text-muted fw-medium">Resources</p>
                                            <h4 class="mb-0">{{ $mentor_resources }}</h4>
                                        </div>

                                        <div class="avatar-sm rounded-circle bg-primary align-self-center mini-stat-icon">
                                            <span class="avatar-title rounded-circle bg-primary">
                                                <i class="bx bx-book font-size-24"></i>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="card mini-stats-wid">
                                <div class="card-body">
                                    <div class="media">
                                        <div class="media-body">
                                            <p class="text-muted fw-medium">Specializations</p>
                                            <h4 class="mb-0">{{ $specializations }}</h4>
                                        </div>

                                        <div class="avatar-sm rounded-circle bg-primary align-self-center mini-stat-icon">
                                            <span class="avatar-title rounded-circle bg-primary">
                                                <i class="bx bx-purchase-tag-alt font-size-24"></i>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endif
                @endif

                </div>
            </div>

            <div class="row">
                <div class="col-xl-6">
                    <div class="card">
                        <!--Admin and cordinator, will see sessions-->
                        @if (Auth::user()->role_id == 1 || Auth::user()->role_id == 3)
                        <div class="card-body">
                            <div class="d-sm-flex flex-wrap">
                                <h4 class="card-title mb-4">Sessions</h4>
                                <!-- <div class="ms-auto">
                                    <ul class="nav nav-pills">
                                        <li class="nav-item">
                                            <a class="nav-link" href="#">Week</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="#">Month</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link active" href="#">Year</a>
                                        </li>
                                    </ul>
                                </div> -->
                            </div>
                            
                            <div id="sessions-chart"></div>
                            <!-- <div id="sessions-chart" class="apex-charts" dir="ltr"></div> -->
                        </div>
                        @endif
                        <!--Matron will see availability of mentors-->
                        <!-- @if (Auth::user()->role_id == 4)
                        <div class="card-body">
                            <div class="d-sm-flex flex-wrap">
                                <h4 class="card-title mb-4">Mentor Availability</h4>
                                <div class="ms-auto">
                                    <ul class="nav nav-pills">
                                        <li class="nav-item">
                                            <a class="nav-link" href="#">Week</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="#">Month</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link active" href="#">Year</a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            
                            <div id="stacked-column-chart" class="apex-charts" dir="ltr"></div>
                        </div>
                        @endif -->

                        @if (Auth::user()->role_id == 2 || Auth::user()->role_id == 4)
                        <div class="card-body">
                            <div class="d-sm-flex flex-wrap">
                                <h4 class="card-title mb-4">Mentor Requests</h4>
                                <!-- <div class="ms-auto">
                                    <ul class="nav nav-pills">
                                        <li class="nav-item">
                                            <a class="nav-link" href="#">Week</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="#">Month</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link active" href="#">Year</a>
                                        </li>
                                    </ul>
                                </div> -->
                            </div>
                            <div id="mentor-requests-chart" class="apex-charts" dir="ltr"></div>
                            <!-- <div id="stacked-column-chart" class="apex-charts" dir="ltr"></div> -->
                        </div>
                        @endif


                    </div>
                </div>
                <div class="col-lg-6 col-xl-6">
                    @if (Auth::user()->role_id == 2)
                    <!--for admin and cordinator, show calendars for all mentors-->
                    <!--for mentor, show calendar for themselves-->
                    <div class="card card-custom card-stretch gutter-b">
                        <div class="card-body pt-4">
                            <div class="fc fc-ltr fc-unthemed" id="ktCalendar">
                            </div>
                        </div>						
                    </div>
                    @endif
                    @if (Auth::user()->role_id == 4)
                    <!--for matron, show mentor requests for the school-->
                    <div class="card">
                        <div class="card-body">
                            <div class="d-sm-flex flex-wrap">
                                <h4 class="card-title mb-4">School Club Activities</h4>
                                <!-- <div class="ms-auto">
                                    <ul class="nav nav-pills">
                                        <li class="nav-item">
                                            <a class="nav-link" href="#">Week</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="#">Month</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link active" href="#">Year</a>
                                        </li>
                                    </ul>
                                </div> -->
                            </div>
                                
                            <div id="school-club-activities-chart" class="apex-charts" dir="ltr"></div>
                        </div>
                    </div>
                    @endif
                    @if (Auth::user()->role_id == 1 || Auth::user()->role_id == 3)
                    <div class="card">
                        <div class="card-body" style="position: relative;">
                            <h4 class="card-title mb-4">Schedules</h4>
                            <ul class="verti-timeline list-unstyled">
                                @foreach($current_month_schedules as $schedule)
                                    @if(Carbon\Carbon::parse($schedule->start)->isToday())
                                    <li class="event-list active">
                                        <div class="event-timeline-dot">
                                            <i class="bx bx-right-arrow-circle font-size-18"></i>
                                        </div>
                                        <div class="media">
                                            <div class="me-3">
                                                <h5 class="font-size-14">{{ Carbon\Carbon::parse($schedule->start)->format('M j, g:i A') }}<i class="bx bx-right-arrow-alt font-size-16 text-primary align-middle ms-2"></i></h5>
                                            </div>
                                            <div class="media-body">
                                                <div>
                                                    <span style="font-style: inherit;font-weight: bold;">{{$schedule->mentor->user->name}}</span>-
                                                    {{$schedule->title}}
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                    @else
                                    <li class="event-list">
                                        <div class="event-timeline-dot">
                                            <i class="bx bx-right-arrow-circle font-size-18"></i>
                                        </div>
                                        <div class="media">
                                            <div class="me-3">
                                                <h5 class="font-size-14">{{ Carbon\Carbon::parse($schedule->start)->format('M j, g:i A') }}<i class="bx bx-right-arrow-alt font-size-16 text-primary align-middle ms-2"></i></h5>
                                            </div>
                                            <div class="media-body">
                                                <div>
                                                    <span style="font-style: inherit;font-weight: bold;">{{$schedule->mentor->user->name}}</span>-
                                                    {{$schedule->title}}
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                    @endif

                                @endforeach
                                <!-- <li class="event-list">
                                    <div class="event-timeline-dot">
                                        <i class="bx bx-right-arrow-circle font-size-18"></i>
                                    </div>
                                    <div class="media">
                                        <div class="me-3">
                                            <h5 class="font-size-14">17 Nov <i class="bx bx-right-arrow-alt font-size-16 text-primary align-middle ms-2"></i></h5>
                                        </div>
                                        <div class="media-body">
                                            <div>
                                                Everyone realizes why a new common language would be desirable... <a href="#">Read more</a>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                                <li class="event-list active">
                                    <div class="event-timeline-dot">
                                        <i class="bx bxs-right-arrow-circle font-size-18 bx-fade-right"></i>
                                    </div>
                                    <div class="media">
                                        <div class="me-3">
                                            <h5 class="font-size-14">15 Nov <i class="bx bx-right-arrow-alt font-size-16 text-primary align-middle ms-2"></i></h5>
                                        </div>
                                        <div class="media-body">
                                            <div>
                                                Joined the group “Boardsmanship Forum”
                                            </div>
                                        </div>
                                    </div>
                                </li>
                                <li class="event-list">
                                    <div class="event-timeline-dot">
                                        <i class="bx bx-right-arrow-circle font-size-18"></i>
                                    </div>
                                    <div class="media">
                                        <div class="me-3">
                                            <h5 class="font-size-14">12 Nov <i class="bx bx-right-arrow-alt font-size-16 text-primary align-middle ms-2"></i></h5>
                                        </div>
                                        <div class="media-body">
                                            <div>
                                                Responded to need “In-Kind Opportunity”
                                            </div>
                                        </div>
                                    </div>
                                </li>
                                <li class="event-list">
                                    <div class="event-timeline-dot">
                                        <i class="bx bx-right-arrow-circle font-size-18"></i>
                                    </div>
                                    <div class="media">
                                        <div class="me-3">
                                            <h5 class="font-size-14">12 Nov <i class="bx bx-right-arrow-alt font-size-16 text-primary align-middle ms-2"></i></h5>
                                        </div>
                                        <div class="media-body">
                                            <div>
                                                Responded to need “In-Kind Opportunity”
                                            </div>
                                        </div>
                                    </div>
                                </li> -->
                            </ul>
                            <div class="text-center mt-4"><a href="{{route('schedules.index')}}" class="btn btn-primary waves-effect waves-light btn-sm">View More <i class="mdi mdi-arrow-right ms-1"></i></a></div>
                        </div>
                    </div>

                    @endif

                    
                    
                </div>
            </div>
            <!-- check if collection $top_mentors is not empty -->
            @if(!$top_mentors->isEmpty())
            <div class="row">
                <div class="col-lg-12">
                    <div class="d-flex">
                        <h4 class="card-title mb-4 flex-grow-1">Top Mentors</h4>
                        <div>
                            @can('mentor.list')
                            <a href="{{route('mentors.index')}}" class="btn btn-primary btn-sm">View All <i class="bx bx-right-arrow-alt"></i></a>
                            @endcan
                        </div>
                    </div>
                </div>
                @foreach($top_mentors as $mentor)
                <div class="col-lg-2">
                    <div class="card">
                        <div class="card-body p-4">
                            <div class="text-center mb-3">
                                @if(isset($mentor->user->profile_picture))
                                <!--get from public folder-->
                                <img src="{{asset('assets/images/profile/'.$mentor->user->profile_picture)}}" alt="" class="avatar-sm" height="15px" width="15px">
                                @else
                                <img src="{{asset('assets/images/companies/img-6.png')}}" alt="" class="avatar-sm" height="15px" width="15px">
                                @endif
                                <a href="job-details.html" class="text-body">
                                    <h5 class="mt-4 mb-2 font-size-15">{{$mentor->user->name}}</h5>
                                </a>
                                <!-- <p class="mb-0 text-muted">Themesbrand</p> -->
                            </div>

                            <div class="d-flex">
                                <!--set mentor location-->
                                @if(isset($mentor->location ))
                                <p class="mb-0 flex-grow-1 text-muted"><i class="bx bx-map text-body"></i> {{$mentor->location->name}}</p>
                                @else
                                <p class="mb-0 flex-grow-1 text-muted"><i class="bx bx-map text-body"></i> N/A</p>
                                @endif
                            
                            </div>
                        </div>
                    </div><!--end card-->
                </div>
                @endforeach
            </div>
            @endif

            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title mb-4">Latest Activities</h4>
                            <div class="table-responsive">
                                <table class="table align-middle table-nowrap mb-0">
                                    <thead class="table-light">
                                        <tr>
                                            <th style="width: 20px;">
                                                <div class="form-check font-size-16 align-middle">
                                                    <input class="form-check-input" type="checkbox" id="transactionCheck01">
                                                    <label class="form-check-label" for="transactionCheck01"></label>
                                                </div>
                                            </th>
                                            <th class="align-middle">ID</th>
                                            <th class="align-middle">School</th>
                                            <th class="align-middle">Club</th>
                                            <!-- <th class="align-middle">Mentor Name</th> -->
                                            <th class="align-middle">Club Activity</th>
                                            <th class="align-middle">Proposed Date</th>
                                            <th class="align-middle">View Details</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($school_club_activities as $key => $school_club_activity)
                                        <tr>
                                            <td>
                                                <div class="form-check font-size-16">
                                                    <input class="form-check-input" type="checkbox" id="transactionCheck02">
                                                    <label class="form-check-label" for="transactionCheck02"></label>
                                                </div>
                                            </td>
                                            <td>{{$key+1}}</td>
                                            <td>{{$school_club_activity->schoolClub->school->school_name}}</td>
                                            <td>
                                                {{$school_club_activity->schoolClub->club->club_name}}
                                            </td>
                                            <!-- <td>
                                                
                                            </td> -->
                                            <td>
                                                {{$school_club_activity->clubActivity->activities_name}}
                                            </td>
                                            <td>
                                                <!-- get it from request table -->
                                                {{$school_club_activity->proposed_date_time}}
                                            </td>
                                            <td>
                                                <!-- Button trigger modal -->
                                                <button type="button" class="btn btn-primary btn-sm btn-rounded waves-effect waves-light" data-bs-toggle="modal" data-bs-target=".transaction-detailModal">
                                                    View Details
                                                </button>
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                            <!-- end table-responsive -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<!-- End Page-content -->



<!-- set Your Specialization and Availability Modal -->
    <!-- subscribeModal -->
    <!--if the user has role meentor, check if he has set his specialization and availability-->
    @if(Auth::user()->role == 'mentor')
    @php
    $mentor = App\Models\Mentor::where('user_id', Auth::user()->id)->first();
    @endphp
    @if($mentor->specializations == null || $mentor->availability == null)
    <div class="modal fade" id="subscribeModal" tabindex="-1" aria-labelledby="subscribeModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header border-bottom-0">
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="text-center mb-4">
                        <div class="avatar-md mx-auto mb-4">
                            <div class="avatar-title bg-light rounded-circle text-primary h1">
                                <i class="mdi mdi-email-open"></i>
                            </div>
                        </div>

                        <div class="row justify-content-center">
                            <div class="col-xl-10">
                                <h4 class="text-primary">Set Specialization & Availability</h4>
                                <p class="text-muted font-size-14 mb-4">Please set your specialization and availability to get more school requests.</p>

                                <div class="input-group bg-light rounded">
                                    <!--go route profile-->
                                    <a href="{{ route('profile') }}
                                    " class="btn btn-primary" type="button" id="button-addon2">
                                        <i class="bx bxs-paper-plane"></i>
                                    </a>                                               
                                </div>
                                
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endif
    @endif

<!-- </div> -->
@endsection

@push('js')
<script src="{{ asset('assets/libs/moment/min/moment.min.js') }}"></script>
<script src="{{ asset('assets/libs/fullcalendar/fullcalendar.min.js') }}"></script>
<script src="{{ asset('assets/libs/apexcharts/apexcharts.min.js') }}"></script>
<script src="{{ asset('assets/js/pages/dashboard.init.js') }}"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/qtip2/3.0.3/basic/jquery.qtip.min.js"></script>
<script>
$(document).ready(function () {
   
var SITEURL = "{{ url('/') }}";
// console.log(SITEURL);
  
$.ajaxSetup({
    headers: {
    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});
console.log(SITEURL);
var calendar = $('#ktCalendar').fullCalendar(
    {               
        // editable: true,
        // editable: true,
        events: SITEURL + "/events",
        header:{
            left:'prev,next today',
            center:'title',
            right:'month,agendaWeek,agendaDay'
        },
        eventLimit: true,
        // displayEventTime: true,
        eventRender: function (event, element){
            element.qtip({
                content: event.name
            });
        },
        // eventRender: function (event, element, view) {
        //     console.log(event, element);
        //     if (event.allDay === 'true') {
        //         event.allDay = true;
        //     } else {
        //         event.allDay = false;
        //     }
        //     element.qtip({
        //         content: event.event_name
        //     });
        // },
        // selectable: true,
        // selectHelper: true,


        // eventDrop: function (event, delta) {
        //     var event_start = $.fullCalendar.formatDate(event.start_date_time, "Y-MM-DD");
        //     $.ajax({
        //         url: SITEURL + '/calendar-crud-ajax',
        //         data: {
        //             title: event.name,
        //             description: event.description,
        //             start: event_start,
        //             id: event.id,
        //             type: 'edit'
        //         },
        //         type: "POST",
        //         success: function (response) {
        //             displayMessage("Event updated");
        //         }
        //     });
        // },
        // eventClick: function (event) {
        //     var eventDelete = confirm("Are you sure?");
        //     if (eventDelete) {
        //         $.ajax({
        //             type: "POST",
        //             url: SITEURL + '/calendar-crud-ajax',
        //             data: {
        //                 id: event.id,
        //                 type: 'delete'
        //             },
        //             success: function (response) {
        //                 calendar.fullCalendar('removeEvents', event.id);
        //                 displayMessage("Event removed");
        //             }
        //         });
        //     }
        // }
    });
});


                    // selectable: true,
                    // selectHelper: true,
                    // select: function (start_date_time, end_date_time, allDay) {
                    //     var name = prompt('Event Title:');
                    //     if (name) {
                    //         var start_date_time = $.fullCalendar.formatDate(start_date_time, "Y-MM-DD HH:mm:ss");
                    //         var end_date_time = $.fullCalendar.formatDate(end_date_time, "Y-MM-DD HH:mm:ss");
                    //         $.ajax({
                    //             url: SITEURL + "/fullcalenderAjax",
                    //             data: {
                    //                 title: title,
					// 				location: location,
                    //                 start: start,
                    //                 end: end,
                    //                 type: 'add'
                    //             },
                    //             type: "POST",
                    //             success: function (data) {
                    //                 displayMessage("Event Created Successfully");
  
                    //                 calendar.fullCalendar('renderEvent',
                    //                     {
                    //                         id: data.id,
                    //                         title: title,
					// 					    location: location,
                    //                         start: start,
                    //                         end: end,
                    //                         allDay: allDay
                    //                     },true);
  
                    //                 calendar.fullCalendar('unselect');
                    //             }
                    //         });
                    //     }
                    // },
                    // eventDrop: function (event, delta) {
                    //     var start = $.fullCalendar.formatDate(event.start, "Y-MM-DD");
                    //     var end = $.fullCalendar.formatDate(event.end, "Y-MM-DD");
  
                    //     $.ajax({
                    //         url: SITEURL + '/fullcalenderAjax',
                    //         data: {
                    //             title: event.title,
					// 			location: event.location,
                    //             start: start,
                    //             end: end,
                    //             id: event.id,
                    //             type: 'update'
                    //         },
                    //         type: "POST",
                    //         success: function (response) {
                    //             displayMessage("Event Updated Successfully");
                    //         }
                    //     });
                    // },
                    // eventClick: function (event) {
                    //     var deleteMsg = confirm("Do you really want to delete?");
                    //     if (deleteMsg) {
                    //         $.ajax({
                    //             type: "POST",
                    //             url: SITEURL + '/fullcalenderAjax',
                    //             data: {
                    //                     id: event.id,
                    //                     type: 'delete'
                    //             },
                    //             success: function (response) {
                    //                 calendar.fullCalendar('removeEvents', event.id);
                    //                 displayMessage("Event Deleted Successfully");
                    //             }
                    //         });
                    //     }
                    // }
 
                // });
 
//});

function displayMessage(message) {
    toastr.success(message, 'Event');
} 
</script>

<script>
var mentor_requests_data = JSON.parse('<?php echo isset ($mentorData) ? $mentorData : '' ?>');
//get the values from the array
var mentor_requests_data = Object.values(mentor_requests_data);
console.log(mentor_requests_data);
var mentor_requests  = {
    series: [{
        name: 'Mentor Requests',
        data: mentor_requests_data
    }],
    chart: {
        height: 350,
        type: 'area',
        toolbar: {
            show: false,
        }
    },
    dataLabels: {
        enabled: false
    },
    stroke: {
        curve: 'smooth'
    },
    xaxis: {
        categories: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'],
        title: {
            text: 'Months'
        }
        
    },
    yaxis: {
        title: {
            text: 'Number of Requests'
        }
    },

};

var mentor_requests_chart = new ApexCharts(document.querySelector("#mentor-requests-chart"), mentor_requests);
mentor_requests_chart.render();

 var sessions_data = JSON.parse('<?php echo isset ($sessionData) ? $sessionData : '' ?>');
//  {"Jan":[],"Feb":[1],"Mar":[],"Apr":[],"May":[],"Jun":[],"Jul":[],"Aug":[],"Sep":[],"Oct":[],"Nov":[],"Dec":[]}
// the key is the month and the value is the number of sessions
//get the values of the array
var sessions_data = Object.values(sessions_data);
//get the keys of the array
var sessions_months = Object.keys(sessions_data);
console.log(sessions_data);
 var current_sessions_data = JSON.parse('<?php echo isset ($currentSessionsData) ? $currentSessionsData : '' ?>');
//  var all_sessions = @json($all_sessions);
//  sessions-chart is the id of the chart
var sessions_chart = new ApexCharts(document.querySelector("#sessions-chart"), {
    series: [{
        name: 'Sessions',
        //data is the array of sessions s
        data: sessions_data
    }, 
    // {
    //     name: 'Current Sessions',
    //     data: current_sessions_data
    // }
],
    chart: {
        height: 350,
        type: 'area',
        toolbar: {
            show: false,
        }
    },
    dataLabels: {
        enabled: false
    },
    stroke: {
        curve: 'smooth'
    },
    // title: {
    //     text: 'Sessions',
    //     align: 'left'
    // },
    grid: {
        row: {
        colors: ['#f3f3f3', 'transparent'], // takes an array which will be repeated on columns
        opacity: 0.5
        },
    },
    fill: {
        type: 'gradient',
        gradient: {
            shadeIntensity: 1,
            opacityFrom: 0.7,
            opacityTo: 0.9,
            stops: [0, 90, 100]
        }
    },
    xaxis: {
        categories: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'],
        title: {
            text: 'Months'
        }
        
    },
    yaxis: {
        title: {
            text: 'Number of Sessions'
        }
    },
    // tooltip: {
    //     x: {
    //         format: 'dd/MM/yy HH:mm'
    //     },
    // },
});

sessions_chart.render();

// schoolClubActivitiesData
// school-club-activities-chart is the id of the chart
var schoolClubActivitiesData = JSON.parse('<?php echo isset ($schoolClubActivitiesData) ? $schoolClubActivitiesData : '' ?>');
//check if its null
if (schoolClubActivitiesData == null) {
    schoolClubActivitiesData = [];
}
else{
    var schoolClubActivitiesData = Object.values(schoolClubActivitiesData);

}

var schoolClubActivitiesChart = new ApexCharts(document.querySelector("#school-club-activities-chart"), {
    series: [{
        name: 'School Club Activities',
        data: schoolClubActivitiesData
    }],
    chart: {
        height: 350,
        type: 'area',
        toolbar: {
            show: false,
        }
    },
    dataLabels: {
        enabled: false
    },
    stroke: {
        curve: 'smooth'
    },
    xaxis: {
        // use months as labels
        // type: 
        categories: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'],
    },
    tooltip: {
        x: {
            format: 'dd/MM/yy HH:mm'
        },
    },
});

schoolClubActivitiesChart.render();
</script>


  


@endpush()




