@extends('layouts.app')

@section('content')
<div class="page-content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                    <h4 class="mb-sm-0 font-size-18">Sessions Report</h4>

                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="javascript: void(0);">Reports</a></li>
                            <li class="breadcrumb-item active">Sessions Report</li>
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
                                <form method="get" action="{{ route('reports.sessions') }}">
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
                                        <div class="col-lg-10">
                                        <input type="datetime-local" class="form-control" name="to_date">
                                        </div>
                                    </div>
                                    </div>


        
                                    <div class="col-lg-4">
                                    <div class="form-group row">
                                        <!-- <div class="col-lg-12"> -->
                                        <div class="input-group mt-3">
                                            <button class="btn btn-primary" type="submit"><i class="fas fa-search"></i>Filter</button>
                                            <a href="{{ route('reports.sessions') }}" class="btn btn-danger ml-2"><i class="fas fa-sync-alt"></i>Clear</a>
                                        </div>
                                        <!-- </div> -->
                                    </div>
                                    </div>
                                </div>
                                </form>
                            </div>
                        </div>
                        


                        <div class="table-responsive">                             
                          <table class="table align-middle table-nowrap table-check" id="sessions-datatable">
                              <thead class="table-light">
                                  <tr>
                                      <th class="align-middle">ID</th>
                                      <th class="align-middle">User name</th>
                                      <th class="align-middle">IP Address</th>
                                      <th class="align-middle">User Agent</th>
                                      <th class="align-middle">Activity</th>
                                  </tr>
                              </thead>
                              <tbody>
                                @foreach($sessions as $session)
                                <tr>
                                    
                                    <td>{{$session->id}}</td>
                                    <td>{{$session->name ?? 'N/A'}}</td>
                                    <td>
                                        {{$session->ip_address}}
                                    </td>
                                    <td>
                                        <!--since user agent is too long, we will only show the first 50 characters-->
                                        {{substr($session->user_agent, 0, 50)}}
                                        <!-- {{$session->user_agent}} -->
                                    </td>
                                    <td>
                                        <!--last activity looks like this 1675683249, we will convert it to a human readable format-->
                                        {{date('d-m-Y H:i:s', $session->last_activity)}}                                     
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
            $("#sessions-datatable").DataTable({
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
                        title: "Sessions Report",
                    },
                    {
                        extend: "excel",
                        title: "Sessions Report",
                    },
                    {                
                        extend: "pdf",
                        title: "Sessions Report",
                    },
                    {
                        extend: "print",
                        title: "Sessions Report",
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




