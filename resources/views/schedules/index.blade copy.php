@extends('layouts.app')


@section('content')
<div class="page-content">
    <div class="container-fluid">

        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                    <h4 class="mb-sm-0 font-size-18">Schedules List </h4>

                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="javascript: void(0);">Schedules</a></li>
                            <li class="breadcrumb-item active">Schedules List</li>
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
                                <div class="search-box me-2 mb-2 d-inline-block">
                                    <div class="position-relative">
                                        <input type="text" class="form-control" placeholder="Search...">
                                        <i class="bx bx-search-alt search-icon"></i>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-8">
                                <div class="text-sm-end">
                                    <a href="{{ route('schedules.create') }}" class="btn btn-success btn-rounded waves-effect waves-light mb-2 me-2"><i class="mdi mdi-plus me-1"></i> Add New Schedule</a>
                                    
                                </div>
                            </div>
                            <!-- end col-->
                        </div>

                        <div class="table-responsive">
                            <table class="table align-middle table-nowrap table-check">
                                <thead class="table-light">
                                    <tr>
                                        <th style="width: 20px;" class="align-middle">
                                            <div class="form-check font-size-16">
                                                <input class="form-check-input" type="checkbox" id="checkAll">
                                                <label class="form-check-label" for="checkAll"></label>
                                            </div>
                                        </th>
                                        <th class="align-middle">ID</th>
                                        <th class="align-middle">Schedule Name</th>
                                        <th class="align-middle">Description</th>
                                        <th class="align-middle">Mentor</th>
                                        <th class="align-middle">Request</th>
                                        <th class="align-middle">School</th>
                                        <th class="align-middle">Start Date</th>
                                        <th class="align-middle">End Date</th>
                                        <th class="align-middle">View Details</th>
                                        <th class="align-middle">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($schedules as $key => $schedule)
                                    <tr>
                                        <td>
                                            <div class="form-check font-size-16">
                                                <input class="form-check-input" type="checkbox" id="scheduleidcheck01">
                                                <label class="form-check-label" for="scheduleidcheck01"></label>
                                            </div>
                                        </td>
                                        <td>{{ $key + 1 }}</td>
                                        <td>
                                            <{{ $schedule->name }}
                                        <td>
                                            {{ $schedule->description }}
                                        </td>
                                        <td>
                                            <a href="javascript: void(0);" class="text-body fw-bold">{{ $schedule->mentor->user->name }}</a>
                                        </td>
                                        <td>
                                            <a href="javascript: void(0);" class="text-body fw-bold">{{ $schedule->request->scholClubActivity->school_club_activity }}</a>
                                        </td>
                                        <td>
                                            <a href="javascript: void(0);" class="text-body fw-bold">{{ $schedule->mentor->school->name }}</a>
                                        </td>
                                        <td>
                                            <!--use carbon to format date-->
                                            {{ $schedule->start_date_time }}
                                        </td>
                                        <td>
                                            <!--use carbon to format date-->
                                            {{ $schedule->end_date_time }}
                                        </td>
                                        <td>
                                            <!-- Button trigger modal -->
                                            <button type="button" class="btn btn-primary btn-sm btn-rounded" data-bs-toggle="modal" data-bs-target=".scheduledetailsModal" data-id="{{ $schedule->id }}">
                                                View Details
                                            </button>
                                        </td>
                                        <td>
                                            <div class="d-flex gap-3">
                                                <a href="{{ route('schedules.edit', $schedule->id)}}" class="text-success"><i class="mdi mdi-pencil font-size-18"></i></a>
                                                <a href="javascript:void(0);" class="text-danger"><i class="mdi mdi-delete font-size-18"></i></a>
                                            </div>
                                        </td>
                                    </tr>
                                    @endforeach  
                                </tbody>
                            </table>
                        </div>
                        <ul class="pagination pagination-rounded justify-content-end mb-2">
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
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <!-- end row -->
    </div> 
</div>

<div class="modal fade scheduledetailsModal" tabindex="-1" role="dialog" aria-labelledby=scheduledetailsModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="scheduledetailsModalLabel">Schedule Details</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            @php
                $schedule = App\Models\Schedule::find($schedule->id);
            @endphp

            <div class="modal-body">

                <p class="mb-2">Schedule Name: <span class="text-primary">{{ $schedule->name }}</span></p>
                <p class="mb-4">Schedule Description: <span class="text-primary">{{ $schedule->description }}</span></p>
                <p class="mb-4">Schedule Mentor: <span class="text-primary">{{ $schedule->mentor->user->name }}</span></p>
                <p class="mb-4">Schedule Request: <span class="text-primary">{{ $schedule->request->name }}</span></p>
                <p class="mb-4">Schedule School: <span class="text-primary">{{ $schedule->school->name }}</span></p>
                <p class="mb-4">Schedule Start Date: <span class="text-primary">{{ $schedule->start_date_time }}</span></p>
                <p class="mb-4">Schedule End Date: <span class="text-primary">{{ $schedule->end_date_time }}</span></p>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
@endsection



