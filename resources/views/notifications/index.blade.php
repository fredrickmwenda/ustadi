@extends('layouts.app')

@push('css')
<link href="{{ asset('assets/libs/datatables.net-bs4/css/dataTables.bootstrap4.min.css') }}" rel="stylesheet">
@endpush

@section('content')
<!--display all notifications, in columns cards that occupy 12 columns-->
<div class="page-content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                    <h4 class="mb-sm-0 font-size-18">Notifications</h4>

                    <!-- <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="javascript: void(0);">users</a></li>
                            <li class="breadcrumb-item active">Mentors List</li>
                        </ol>
                    </div> -->

                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped" id="notification_list">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>{{ __('Title') }}</th>
                                        <th>{{ __('Message') }}</th>
                                        <th>{{ __('Sent') }}</th>
                                        <!-- <th>{{ __('Action') }}</th> -->
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($notifications as $key => $notification)
                                    <tr>
                                        <td>{{ $key + 1 }}</td>
                                        @php
                                            $data = json_decode($notification->data);
                                        @endphp

                                        <td>{{ $notification->title ? $notification->title : 'School Request' }}</td>

                                        <td>{{ $data->matron_name}} a matron from {{$data->school_name}} has sent you a request for {{$data->activity_name}}  on {{$data->club_name}}</td>
                                        <td>{{ Carbon\Carbon::parse($notification->created_at)->diffForHumans() }}</td>
                                        <!-- <td> -->
                                            <!-- <a href="{{ route('notifications.show', $notification->id) }}" class="btn btn-primary btn-sm"><i class="fas fa-eye"></i> {{ __('View') }}</a>
                                            <button class="btn btn-danger btn-sm" type="button" onclick="deleteData({{ $notification->id }})">
                                                <i class="fas fa-trash"></i> {{ __('Delete') }}
                                            </button> -->
                                            <!-- {"customer_name":null,"amount":300,"loan_id":18,"transaction_date":"2023-01-21","transaction_reference":"RAL8UQH5J6","balance":6000} -->
                                        <!-- </td> -->
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
<script src="{{ asset('assets/libs/datatables.net-responsive/js/dataTables.responsive.min.js') }}"></script>
<script src="{{ asset('assets/libs/datatables.net-responsive-bs4/js/responsive.bootstrap4.min.js') }}"></script>
<script>
    $(document).ready(function() {
        $("#notification_list").DataTable({
            language: {
                paginate: {
                    previous: "<i class='mdi mdi-chevron-left'>",
                    next: "<i class='mdi mdi-chevron-right'>"
                }
            },
            drawCallback: function() {
                $(".dataTables_paginate > .pagination").addClass("pagination-rounded")
            },
            //GET 20 ITEMS PER PAGE
            "pageLength": 25,
            //ORDER BY ID DESC
            responsive: true,
        });
    });
</script>
@endpush


