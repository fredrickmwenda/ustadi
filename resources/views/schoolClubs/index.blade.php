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
                    <h4 class="mb-sm-0 font-size-18">Schools Clubs List </h4>

                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="javascript: void(0);">School Clubs</a></li>
                            <li class="breadcrumb-item active">School Clubs List</li>
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
                                <!--total school clubs-->
                                <h4 class="card-title">Total School Clubs: {{$schoolClubs->count()}}</h4>
                                <!-- <div class="search-box me-2 mb-2 d-inline-block"> -->
                                    <!-- <div class="position-relative">
                                        <input type="text" class="form-control" placeholder="Search...">
                                        <i class="bx bx-search-alt search-icon"></i>
                                    </div>
                                </div> -->
                            </div>
                            <div class="col-sm-8">
                                <div class="text-sm-end">
                                    <a href="{{route('clubs.index')}}" type="button" class="btn btn-success btn-rounded waves-effect waves-light mb-2 me-2"><i class="mdi mdi-plus me-1"></i> Add New School Club</a>
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
                                        <th class="align-middle">School Club Name</th>
                                        <th class="align-middle">School Name</th>
                                        <th class="align-middle">Club Name</th>
                                        <th class="align-middle">Location</th>
                                        <th class="align-middle">Approver</th>
                                        <th class="align-middle">Students Count</th>
                                        <th class="align-middle">View Details</th>
                                        <th class="align-middle">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($schoolClubs as $key => $schoolClub)
                                    <tr>
                                        
                                        <td>
                                            <div class="form-check font-size-16">
                                                <input class="form-check-input" type="checkbox" id="schoolidcheck01">
                                                <label class="form-check-label" for="schoolidcheck01"></label>
                                            </div>
                                        </td>
                                        <!-- <td><a href="javascript: void(0);" class="text-body fw-bold">#SK2540</a> </td> -->
                                        <td>{{$key +1}}</td>
                                        <td>
                                            <!--merge school name and school club name-->
                                            {{$schoolClub->school->school_name}} - {{$schoolClub->club->club_name}}
                                        </td>
                                        <td>
                                            
                                            {{$schoolClub->school->school_name}}
                                        </td>
                                        <td>
                                            {{$schoolClub->club->club_name}}
                                        </td>

                                        <td>
                                            {{$schoolClub->school->location->name }}
                                        </td>
                                        <td>
                                            {{$schoolClub->matron->user->name}}
                                              
                                        </td>
                                        <td>
                                            {{$schoolClub->students_count}}
                                        </td>

                                        <td>
                                            <!-- Button trigger modal -->
                                            <button type="button" class="btn btn-primary btn-sm btn-rounded" data-bs-toggle="modal" data-bs-target=".schooldetailsModal" >
                                                View Details
                                            </button>
                                        </td>
                                        <td>
                                            <div class="d-flex gap-3">
                                                <a href="{{ route('school-clubs.edit', $schoolClub->id) }}" class="text-success"><i class="mdi mdi-pencil font-size-18"></i></a>
                                                <a href="javascript:void(0);" class="text-danger"><i class="mdi mdi-delete font-size-18"></i></a>
                                            </div>
                                        </td>
                                    </tr>
                                    @endforeach


                                    
                                </tbody>
                            </table>
                        </div>
                        <!-- <ul class="pagination pagination-rounded justify-content-end mb-2">
                            <li class="page-item disabled">
                                <a class="page-link" href="javascript: void(0);" aria-label="Previous">
                                    <i class="mdi mdi-chevron-left"></i>
                                </a>
                            </li>
                            <li class="page-item active"><a class="page-link" href="javascript: void(0);">1</a></li>
                            <li class="page-item"><a class="page-link" href="javascript: void(0);">2</a></li>
                            <li class="page-item"><a class="page-link" href="javascript: void(0);">3</a></li>
                            <li class="page-item"><a class="page-link" href="javascript: void(0);">4</a></li>
                            <li class="page-item"><a class="page-link" href="javascript: void(0);">5</a></li>
                            <li class="page-item">
                                <a class="page-link" href="javascript: void(0);" aria-label="Next">
                                    <i class="mdi mdi-chevron-right"></i>
                                </a>
                            </li>
                        </ul> -->
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