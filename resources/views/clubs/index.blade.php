@extends('layouts.app')

@section('content')
  <div class="page-content">
    <div class="container-fluid">

        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                    <h4 class="mb-sm-0 font-size-18">Clubs Grid List </h4>

                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="javascript: void(0);">Clubs</a></li>
                            <li class="breadcrumb-item "><a href="javascript: void(0);">Clubs Grid List</a></li>
                        </ol>
                    </div>

                </div>
            </div>
        </div>
        <!-- end page title -->
        <div class="row mb-2">
            <div class="col-sm-4">
                <div class="search-box me-2 mb-2 d-inline-block">
                    <div class="position-relative">
                        <input type="text" class="form-control" placeholder="Search...">
                        <i class="bx bx-search-alt search-icon"></i>
                    </div>
                </div>
            </div>
            <div class="col-sm-8">
                <div class="text-sm-end">
                    <a href="{{ route('clubs.create') }}" class="btn btn-success btn-rounded waves-effect waves-light mb-2 me-2"><i class="mdi mdi-plus me-1"></i> Add New Club</a>
                    
                </div>
            </div>
            <!-- end col-->
        </div>
        <div class="row">
            @foreach ($clubs as $club)
            <div class="col-xl-4 col-sm-6">
                <div class="card">
                    <div class="card-body">
                        <div class="dropdown" style="float:right">
                            <a class="dropdown-toggle text-muted" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="mdi mdi-dots-horizontal font-size-18"></i>
                            </a>
                            <div class="dropdown-menu dropdown-menu-end">
                                @if (Auth::user()->role == 'matron')
                                    <!--get the school id of the matron-->
                                    <!--check if the school has school_club with the club id-->
                                    <!--if it doesnt, show assign School Club-->
                                    @php
                                        $user_id = Auth::user()->id;
                                        $matron = App\Models\Matron::where('user_id', $user_id)->first();
                                        $school_id = $matron->school_id;
                                        $school_club = App\Models\SchoolClub::where('school_id', $school_id)->where('club_id', $club->id)->first();
                                    @endphp
                                    @if (!$school_club)
                                        <a class="dropdown-item" href="{{ route('clubs.assign', $club->id) }}"><i class="mdi mdi-plus-outline me-1"></i>Assign School Club</a>
                                    @else
                                        <a class="dropdown-item" href="{{ route('clubs.deactivate', $club->id) }}"><i class="mdi mdi-minus-outline me-1"></i>Remove School Club</a>
                                    @endif
                                @endif
                                    
                                <a class="dropdown-item" href="{{ route('clubs.edit', $club->id) }}"><i class="mdi mdi-pencil-outline me-1"></i>Edit</a>
                                <a class="dropdown-item" href="{{ route('clubs.show', $club->id) }}"><i class="mdi mdi-eye-outline me-1"></i>View</a>
                                <a class="dropdown-item" href="{{ route('clubs.destroy', $club->id) }}"><i class="mdi mdi-delete-outline me-1"></i>Delete</a>
                            </div>
                        </div>
                        <div class="media">
                            <div class="avatar-md me-4">
                                <span class="avatar-title rounded-circle bg-light text-danger font-size-16">
                                    @if ($club->logo)
                                        <img src="{{ asset('assets/images/clubs/'.$club->logo) }}" alt="" height="30">
                                    @else
                                    <img src="{{ asset('assets/images/companies/img-1.png') }}" alt="" height="30">
                                    @endif
                                </span>
                            </div>
                            <!--on the right end of the card, have 3 dots when clicked show buttons to edit and delete-->



                            <div class="media-body overflow-hidden">
                                <h5 class="text-truncate font-size-15"><a href="#" class="text-dark">{{ $club->club_name }}</a></h5>
                                <p class="text-muted mb-4">{{ $club->description }}</p>
                                <h5 class="text-truncate font-size-15"><a href="#" class="text-dark">School Clubs </a></h5>
                                <div class="avatar-group">
                                    @php
                                        $school_clubs  = App\Models\SchoolClub::where('club_id', $club->id)->get();
                                    @endphp
                                    
                                    <!--loop through the school clubs, but only show 6-->
                                    @if($school_clubs != null)
                                    @foreach ($school_clubs as $school_club)
                                        @if ($loop->index < 6)
                                            <div class="avatar-group-item">
                                                <a href="javascript: void(0);" class="d-inline-block">
                                                <div class="avatar-xs">
                                                    <span class="avatar-title rounded-circle bg-danger text-white font-size-16">
                                                        +
                                                    </span>
                                                </div>
                                                    <!-- <img src="{{ asset('assets/images/schools/'.$school_club->school->logo) }}" alt="" class="rounded-circle avatar-xs"> -->
                                                </a>
                                            </div>
                                        @endif
                                    @endforeach
                                    @endif
                                    <!-- <div class="avatar-group-item">
                                        <a href="javascript: void(0);" class="d-inline-block">
                                            <img src="assets/images/users/avatar-4.jpg" alt="" class="rounded-circle avatar-xs">
                                        </a>
                                    </div> -->
                                    <!--a  circle with a + sign to create a new club-->
                                    <div class="avatar-group-item">
                                        <a href="{{ route('clubs.create') }}" class="d-inline-block">
                                            <div class="avatar-xs">
                                                <span class="avatar-title rounded-circle bg-danger text-white font-size-16">
                                                    +
                                                </span>
                                            </div>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
            @endforeach 
        </div>
        <!-- end row -->

        <div class="row">
            <div class="col-lg-12">
                <ul class="pagination pagination-rounded justify-content-center mt-2 mb-5">
                    <li class="page-item disabled">
                        <a href="#" class="page-link"><i class="mdi mdi-chevron-left"></i></a>
                    </li>
                    <li class="page-item">
                        <a href="#" class="page-link">1</a>
                    </li>
                    <li class="page-item active">
                        <a href="#" class="page-link">2</a>
                    </li>
                    <li class="page-item">
                        <a href="#" class="page-link">3</a>
                    </li>
                    <li class="page-item">
                        <a href="#" class="page-link">4</a>
                    </li>
                    <li class="page-item">
                        <a href="#" class="page-link">5</a>
                    </li>
                    <li class="page-item">
                        <a href="#" class="page-link"><i class="mdi mdi-chevron-right"></i></a>
                    </li>
                </ul>
            </div>
        </div>
        <!-- end row -->
        
    </div> 
  </div>
@endsection



