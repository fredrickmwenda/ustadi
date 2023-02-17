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
                    <h4 class="mb-sm-0 font-size-18">Request List</h4>

                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="javascript: void(0);">Requests</a></li>
                            <li class="breadcrumb-item active">Request List</li>
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
                               <h4 class="card-title">Total Requests: {{$requests->count()}}</h4>
                                <!-- <div class="search-box me-2 mb-2 d-inline-block">
                                    <div class="position-relative">
                                        <input type="text" class="form-control" placeholder="Search...">
                                        <i class="bx bx-search-alt search-icon"></i>
                                    </div>
                                </div> -->
                            </div>
                            <div class="col-sm-8">
                                <div class="text-sm-end">
                                    @can('request.create')
                                    <a href="{{ route('requests.create') }}" class="btn btn-success btn-rounded waves-effect waves-light mb-2 me-2"><i class="mdi mdi-plus me-1"></i> Add New Request</a>
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
                                        <th class="align-middle">Mentor</th>
                                        <th class="align-middle">School</th>
                                        <th class="align-middle">Club/Activity</th>
                                        <th class="align-middle">Details</th>
                                        <th class="align-middle">Proposed Date/Time</th>
                                        <th class="align-middle">Accepted</th>
                                        <th class="align-middle">View Details</th>
                                        <th class="align-middle">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($requests as $key => $request)
                                    <tr>
                                        <td>
                                            <div class="form-check font-size-16">
                                                <input class="form-check-input" type="checkbox" id="orderidcheck01">
                                                <label class="form-check-label" for="orderidcheck01"></label>
                                            </div>
                                        </td>
                                        
                                        <td>{{ $request->id }}</td>
                                        <td>
                                            {{ $request->mentor->user->name }}
                                        </td>
                                        <td>
                                            {{ $request->school->school_name }}
                                        </td>
                                        <td>
                                            {{ $request->schoolClubActivity->schoolClub->club->club_name }}
                                        </td>
                                        <td>
                                            {{ $request->details }}
                                        </td>
                                        <td>
                                            {{ $request->proposed_date_time }}
                                        </td>
                                        <td>
                                            <!-- check if request is accepted -->
                                            @if ($request->accepted == 1)
                                                <span class="badge bg-success">Accepted</span>
                                            @else
                                                <span class="badge bg-danger">Not Accepted</span>
                                                @if(auth()->user()->role == 'mentor')
                                                    @can('request.accept')
                                                    <a href="{{ route('requests.acceptReject', $request->id) }}" class="btn btn-success btn-sm btn-rounded">Accept/Reject</a>
                                                    @endcan   
                                                @endif
                                            @endif
                                        </td>
                                            
                                        <td>
                                            <!-- Button trigger modal -->
                                            <button type="button" class="btn btn-primary btn-sm btn-rounded" data-bs-toggle="modal" data-bs-target=".orderdetailsModal">
                                                View Details
                                            </button>
                                        </td>
                                        <td>
                                            <div class="d-flex gap-3">
                                                @can('request.edit')
                                                @if($request->accepted == 0)
                                                    <a href="{{ route('requests.edit', $request->id) }}" class="text-success"><i class="mdi mdi-pencil font-size-18"></i></a>
                                                @endif
                                                @endcan
                                                @can('request.delete')
                                                    <a href="{{ route('requests.destroy', $request->id) }}" class="text-danger"><i class="mdi mdi-delete font-size-18"></i></a>
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
        <!-- end row -->
    </div> 
</div>


@endsection

@push('js')
<script src="{{ asset('assets/libs/datatables.net/js/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('assets/libs/datatables.net-bs4/js/dataTables.bootstrap4.min.js') }}"></script>

@endpush