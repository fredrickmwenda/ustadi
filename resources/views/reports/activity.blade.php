@extends('layouts.app')
@push('css')
<link href="{{ asset('assets/libs/datatables.net-bs4/css/dataTables.bootstrap4.min.css') }}" rel="stylesheet">
@endpush
@section('content')
<div class="page-content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                    <h4 class="mb-sm-0 font-size-18">Activity Report</h4>

                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="javascript: void(0);">Reports</a></li>
                            <li class="breadcrumb-item active">Activity Report</li>
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
                        <div class="row">
                            <div class="col-lg-12">
                                <form method="get" action="{{ route('reports.activity') }}">
                                <div class="row mb-4">
                                    <div class="col-lg-4">
                                    <div class="form-group row">
                                        <div class="">
                                        {{ __('From:') }}
                                        </div>
                                        <div class="col-lg-10">
                                        <input type="datetime-local" class="form-control" name="from_date" >                          
                                        </div>
                                    </div>
                                    </div>
                                    <div class="col-lg-4">
                                    <div class="form-group row">
                                        <div class="">
                                        {{ __('To:') }}
                                        </div>
                                        <div class="col-lg-10 input-group">
                                        <input type="datetime-local" class="form-control" name="to_date">
                                        </div>
                                    </div>
                                    </div>
                                    <!--field to enter the ro name-->
        
                                    <div class="col-lg-4">
                                    <div class="form-group row">
                                        <!-- <div class="col-lg-12"> -->
                                        <div class="input-group mt-3">
                                            <button class="btn btn-primary" type="submit"><i class="fas fa-search"></i>Filter</button>
                                            <a href="{{ route('reports.activity') }}" class="btn btn-danger ml-2"><i class="fas fa-sync-alt"></i>Clear</a>
                                        </div>
                                        <!-- </div> -->
                                    </div>
                                    </div>
                                </div>
                                </form>
                            </div>
                        </div>
                        


                        <div class="table-responsive">                             
                          <table class="table align-middle table-nowrap table-check" id="activity-datatable">
                              <thead class="table-light">
                                  <tr>
                                      <th class="align-middle">ID</th>
                                      <th class="align-middle">School Name</th>
                                      <th class="align-middle">School Club </th>
                                      <th class="align-middle">Activity Name</th>
                                      <th class="align-middle">Activity Date</th>
                                      <th class="align-middle">Created At</th>
                                  </tr>
                              </thead>
                              <tbody>

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
<script src="{{ asset('assets/libs/datatables.net-responsive/js/dataTables.responsive.min.js') }}"></script>
<script src="{{ asset('assets/libs/datatables.net-responsive-bs4/js/responsive.bootstrap4.min.js') }}"></script>
<script src="{{ asset('assets/libs/datatables.net-buttons/js/dataTables.buttons.min.js') }}"></script>
<script src="{{ asset('assets/libs/datatables.net-buttons-bs4/js/buttons.bootstrap4.min.js') }}"></script>
<script src="{{ asset('assets/libs/datatables.net-buttons/js/buttons.html5.min.js') }}"></script>
<script src="{{ asset('assets/libs/datatables.net-buttons/js/buttons.colVis.min.js') }}"></script>
<script src="{{ asset('assets/libs/datatables.net-buttons/js/buttons.print.min.js') }}"></script>

<script src="{{ asset('assets/libs/pdfmake/build/pdfmake.min.js') }}"></script>
<script src="{{ asset('assets/libs/pdfmake/build/vfs_fonts.js') }}"></script>
<script>
      $(document).ready(function() {
            $("#activity-datatable").DataTable({
                language: {
                    paginate: {
                        previous: "<i class='mdi mdi-chevron-left'>",
                        next: "<i class='mdi mdi-chevron-right'>"
                    }
                },
                drawCallback: function() {
                    $(".dataTables_paginate > .pagination").addClass("pagination-rounded")
                },
                dom: 'Bfrtip',
                buttons: [
                    'copy', 
                    {
                        extend: "csv",
                        title: "Activity Report",
                    },
                    {
                        extend: "excel",
                        title: "Activity Report",
                    },
                    {                
                        extend: "pdf",
                        title: "Activity Report",
                    },
                    {
                        extend: "print",
                        title: "Activity Report",
                    },
                    'colvis'
                ],
                //GET 20 ITEMS PER PAGE
                "pageLength": 20,
                //ORDER BY ID DESC
                responsive: true,
            });
        });
</script>
@endpush



