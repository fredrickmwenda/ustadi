@extends('layouts.app')
@push('css')
<link href="{{ asset('assets/libs/datatables.net-bs4/css/dataTables.bootstrap4.min.css') }}" rel="stylesheet">
@endpush
@section('content')
<div class="page-content">
    <div class="container-fluid">

        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                    <h4 class="mb-sm-0 font-size-18">School Club Activities List </h4>

                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="javascript: void(0);">SchoolClubActivities</a></li>Club Activities
                            <li class="breadcrumb-item active">School Club Activities List </li>
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
                            <h4 class="card-title">Total SchoolClubActivities: {{$schoolClubActivities->count()}}</h4>
                                <!-- <div class="search-box me-2 mb-2 d-inline-block">
                                    <div class="position-relative">
                                        <input type="text" class="form-control" placeholder="Search...">
                                        <i class="bx bx-search-alt search-icon"></i>
                                    </div>
                                </div> -->
                            </div>
                            <div class="col-sm-8">
                                <div class="text-sm-end">
                                    @can('school_club_activity.create')
                                    <a href="{{route('school-club-activities.create')}}" type="button" class="btn btn-success btn-rounded waves-effect waves-light mb-2 me-2"><i class="mdi mdi-plus me-1"></i> Add New School ClubActivity</a>
                                    @endcan
                                </div>
                            </div><!-- end col-->
                        </div>

                        <div class="table-responsive">
                            <table class="table align-middle table-nowrap table-check" id="s-datatable">
                                <thead class="table-light">
                                    <tr>
                                        <th style="width: 20px;" class="align-middle">
                                            <div class="form-check font-size-16">
                                                <input class="form-check-input" type="checkbox" id="checkAll">
                                                <label class="form-check-label" for="checkAll"></label>
                                            </div>
                                        </th>
                                        <th class="align-middle">ID</th>
                                        <th class="align-middle">Activity Name </th>
                                        <th class="align-middle">Activity Description </th>
                                        <th class="align-middle">Club Name </th>
                                        <th class="align-middle">Club Activity </th>
                                        <th class="align-middle">Proposed Date and Time </th>
                                        <th class="align-middle">Details </th>
                                        <th class="align-middle">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($schoolClubActivities as $key => $schoolclubActivity)
                                    <tr>                                     
                                        <td>
                                            <div class="form-check font-size-16">
                                                <input class="form-check-input" type="checkbox" id="clubActivityidcheck01">
                                                <label class="form-check-label" for="clubActivityidcheck01"></label>
                                            </div>
                                        </td>
                                        <td>{{$key +1}}</td>
                                        <td>
                                        {{$schoolclubActivity->school_club_activity}}
                                        </td>
                                        <td>
                                            
                                            @php
                                            $description = $schoolclubActivity->description;
                                            $description = explode(" ", $description);
                                            $description = array_slice($description, 0, 3);
                                            $description = implode(" ", $description);
                                            @endphp                                           
                                            {{$description . '...'}}
                                        </td>
                                        <td>
                                         {{$schoolclubActivity->schoolClub->club->club_name}}
                                        </td>

                                        <td>
                                            {{$schoolclubActivity->clubActivity->activities_name}}
                                        </td>

                                        <td>
                                            {{$schoolclubActivity->proposed_date_time}}
                                        </td>

                                        <td>
                                            
                                            <button type="button" class="btn btn-primary btn-sm btn-rounded" data-bs-toggle="modal" data-bs-target=".clubActivitydetailsModal" data-id="{{$schoolclubActivity->id}}">
                                                View Details
                                            </button>
                                        </td>
                                        <td>
                                            <div class="d-flex gap-3">
                                                @can('school_club_activity.edit')
                                                <a href="{{ route('school-club-activities.edit',$schoolclubActivity->id) }}" class="text-success"><i class="mdi mdi-pencil font-size-18"></i></a>
                                                @endcan
                                                @can('school_club_activity.delete')
                                                <a href="javascript:void(0);" class="text-danger"><i class="mdi mdi-delete font-size-18"></i></a>
                                                @endcan
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
        <!-- end row -->
    </div> 
</div>


@endsection
@push('js')
<script src="{{ asset('assets/libs/datatables.net/js/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('assets/libs/datatables.net-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
@endpush