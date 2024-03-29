@extends('layouts.app')

@section('content')
<div class="page-content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                    <h4 class="mb-sm-0 font-size-18">Locations List </h4>

                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="javascript: void(0);">Locations</a></li>
                            <li class="breadcrumb-item active">Location List</li>
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
                        <!-- <div class="row mb-2">
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
                                    <a href="{{ route('matrons.create') }}" class="btn btn-success btn-rounded waves-effect waves-light mb-2 me-2"><i class="mdi mdi-plus me-1"></i> Add New Matron</a>
                                    
                                </div>
                            </div>
                        </div> -->

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
                                      <th class="align-middle">Name</th>
                                      <th class="align-middle">Type</th>
                                      <!-- <th class="align-middle">Email</th>
                                      <th class="align-middle">School </th>
                                      <th class="align-middle">View Details</th>
                                      <th class="align-middle">Action</th> -->
                                  </tr>
                              </thead>
                              <tbody>
                                @foreach($locations as $key => $location)
                                  <tr>
                                      <td>
                                          <div class="form-check font-size-16">
                                              <input class="form-check-input" type="checkbox" id="orderidcheck01">
                                              <label class="form-check-label" for="orderidcheck01"></label>
                                          </div>
                                      </td>
                                      <td>{{ $key + 1 }}</td>
                                      <td>
                                          {{ $location->name }}
                                      </td>
                                      <td>
                                          {{ $location->type}}
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

<!-- end modal -->
@endsection



