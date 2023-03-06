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
                            <li class="breadcrumb-item "><a href="javascript: void(0);">Clubs List</a></li>
                        </ol>
                    </div>

                </div>
            </div>
        </div>
        <!-- end page title -->
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <div class="row mb-2">
                            <div class="col-sm-4">
                               <h4 class="card-title">Total Clubs : {{$clubs->count()}}</h4>
                                <!-- <div class="search-box me-2 mb-2 d-inline-block">
                                    <div class="position-relative">
                                        <input type="text" class="form-control" placeholder="Search...">
                                        <i class="bx bx-search-alt search-icon"></i>
                                    </div>
                                </div> -->
                            </div>
                            <div class="col-sm-8">
                                <div class="text-sm-end">
                                    @can('club.create')
                                        <a href="{{ route('clubs.create') }}" class="btn btn-success btn-rounded waves-effect waves-light mb-2 me-2"><i class="mdi mdi-plus me-1"></i> Add New Club</a>
                                    @endcan
                                </div>
                            </div><!-- end col-->
                        </div>

                        <div class="table-responsive">
                            <table class="table align-middle table-nowrap table-check" id="s-datatable">
                                <thead class="table-light">
                                    <tr>
                                        <th class="align-middle">ID</th>
                                        <th class="align-middle">Name</th>
                                        <th class="align-middle">Description</th>
                                        <th class="align-middle">School Clubs</th>
                                        @if (Auth::user()->role == 'matron')
                                        <th class="align-middle">Activation/Deactivation</th>
                                        @endif
                                        
                                        <!-- <th class="align-middle">View Details</th> -->
                                        <th class="align-middle">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($clubs as $club)
                                    <tr>                                     
                                        <td>{{ $club->id }}</td>
                                        <td>
                                            @if ($club->logo)
                                                <img src="{{ asset('assets/images/clubs/'.$club->logo) }}" alt="" height="30">
                                            @else
                                            <img src="{{ asset('assets/images/companies/img-1.png') }}" alt="" height="30">
                                            @endif
                                           {{ $club->club_name }}
                                        </td>
                                        <td>
                                        {{ $club->description }}
                                        </td>
                                        <td>
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
                                                                @if($school_club->school->logo)
                                                                <img src="{{ asset('assets/images/school/'.$school_club->school->logo) }}" alt="" class="rounded-circle avatar-xs">
                                                                @else
                                                                <div class="avatar-xs">
                                                                    <span class="avatar-title rounded-circle bg-danger text-white font-size-16">
                                                                        +
                                                                    </span>
                                                                </div>
                                                                @endif
                                                                
                                                            </a>
                                                        </div>
                                                    @endif
                                                @endforeach
                                                @endif
            
                                            </div>
                                        </td>

                                        @if (Auth::user()->role == 'matron')
                                        <td>
                                            <!-- check if request is accepted -->
                                            
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
                                                <a class="btn btn-success" href="{{ route('clubs.assign', $club->id) }}"><i class="mdi mdi-plus-outline me-1"></i>Assign School Club</a>
                                            @else
                                                <a class="btn btn-primary" href="{{ route('clubs.deactivate', $club->id) }}"><i class="mdi mdi-minus-outline me-1"></i>Remove School Club</a>
                                            @endif
                                        
                                        </td>
                                        @endif
                                            

                                        <td>
                                            <div class="d-flex gap-3">
                                                @can('club.edit')  
                                                    <a href="{{ route('clubs.edit', $club->id) }}" class="text-success"><i class="mdi mdi-pencil font-size-18"></i></a>
                                                @endcan
                                                @can('club.delete')
                                                    <a href="{{ route('clubs.destroy', $club->id) }}" class="text-danger"><i class="mdi mdi-delete font-size-18"></i></a>
                                                @endcan
                                                <!-- <a href="javascript:void(0);" class="text-danger"><i class="mdi mdi-delete font-size-18"></i></a> -->
                                            </div>
                                        </td>
                                    </tr>
                                    @endforeach


                                    
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
    </div> 
  </div>
@endsection
@push('js')
<script src="{{ asset('assets/libs/datatables.net/js/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('assets/libs/datatables.net-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
@endpush



