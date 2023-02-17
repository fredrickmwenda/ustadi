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
                    <h4 class="mb-sm-0 font-size-18">Resources List </h4>

                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="javascript: void(0);">Resources</a></li>
                            <li class="breadcrumb-item active">Resources List</li>
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
                            <h4 class="card-title">Total Resources: {{$resources->count()}}</h4>
                                <!-- <div class="search-box me-2 mb-2 d-inline-block">
                                    <div class="position-relative">
                                        <input type="text" class="form-control" placeholder="Search...">
                                        <i class="bx bx-search-alt search-icon"></i>
                                    </div>
                                </div> -->
                            </div>
                            <div class="col-sm-8">
                                <div class="text-sm-end">
                                    @can('resource.create')
                                    <a href="{{ route('resources.create') }}" class="btn btn-success btn-rounded waves-effect waves-light mb-2 me-2"><i class="mdi mdi-plus me-1"></i> Add New Resource</a>
                                    @endcan
                                </div>
                            </div><!-- end col-->
                        </div>

                        <div class="table-responsive">                             
                          <table class="table align-middle table-nowrap table-check" id="s-datatable">
                              <thead class="table-light">
                                  <tr>
                                      <th style="width: 20px;" class="align-middle" id="s-datatable">
                                          <div class="form-check font-size-16">
                                              <input class="form-check-input" type="checkbox" id="checkAll">
                                              <label class="form-check-label" for="checkAll"></label>
                                          </div>
                                      </th>
                                      <th class="align-middle">ID</th>
                                      <th class="align-middle">Name</th>
                                      <th class="align-middle">Description</th>
                                      <th class="align-middle">Type</th>
                                      <th class="align-middle">Author</th>
                                      <!-- <th class="align-middle">Release Date</th> -->
                                      <th class="align-middle">URL</th>
                                       <th class="align-middle">Posted By</th>
                                      <th class="align-middle">View Details</th>
                                      <th class="align-middle">Action</th>
                                  </tr>
                              </thead>
                              <tbody>
                                @foreach($resources as $key => $resource)
                                  <tr>
                                      <td>
                                          <div class="form-check font-size-16">
                                              <input class="form-check-input" type="checkbox" id="orderidcheck01">
                                              <label class="form-check-label" for="orderidcheck01"></label>
                                          </div>
                                      </td>
                                      <td>{{$key + 1}}</td>
                                      <td>
                                        {{$resource->name}}

                                      </td>
                                      <td>
                                      {{ Str::words($resource->description, 5) . '...' }}
                                        
                                      </td>
                                      <td>
                                        {{$resource->type}}
                                      </td>
                                      <td>
                                        {{$resource->author}}
                                      </td>
                                      <td>
                                          <a href="{{$resource->url}}" target="_blank" class="text-primary">{{$resource->url}}</a>
                                      </td>
                                        <td>
                                            {{$resource->mentor->user->name}}
                                        </td>
                                      <td>
                                          <!-- Button trigger modal -->
                                          <button type="button" class="btn btn-primary btn-sm btn-rounded" data-bs-toggle="modal" data-bs-target=".orderdetailsModal">
                                              View Details
                                          </button>
                                      </td>
                                      <td>
                                          <div class="d-flex gap-3">
                                            @can('resource.edit')
                                               <!--check if the user is the creator of the resource-->
                                                @if(Auth::user()->id == $resource->mentor->user->id)
                                                    <a href="{{ route('resources.edit', $resource->id) }}" class="text-success"><i class="mdi mdi-pencil font-size-18"></i></a>
                                                @endif
                                            @endcan
                                            @can('resource.delete')
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
<!-- Modal -->
<div class="modal fade orderdetailsModal" tabindex="-1" role="dialog" aria-labelledby=orderdetailsModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id=orderdetailsModalLabel">Order Details</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <p class="mb-2">Product id: <span class="text-primary">#SK2540</span></p>
                <p class="mb-4">Billing Name: <span class="text-primary">Neal Matthews</span></p>

                <div class="table-responsive">
                    <table class="table align-middle table-nowrap">
                        <thead>
                            <tr>
                            <th scope="col">Product</th>
                            <th scope="col">Product Name</th>
                            <th scope="col">Price</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <th scope="row">
                                    <div>
                                        <img src="assets/images/product/img-7.png" alt="" class="avatar-sm">
                                    </div>
                                </th>
                                <td>
                                    <div>
                                        <h5 class="text-truncate font-size-14">Wireless Headphone (Black)</h5>
                                        <p class="text-muted mb-0">$ 225 x 1</p>
                                    </div>
                                </td>
                                <td>$ 255</td>
                            </tr>
                            <tr>
                                <th scope="row">
                                    <div>
                                        <img src="assets/images/product/img-4.png" alt="" class="avatar-sm">
                                    </div>
                                </th>
                                <td>
                                    <div>
                                        <h5 class="text-truncate font-size-14">Hoodie (Blue)</h5>
                                        <p class="text-muted mb-0">$ 145 x 1</p>
                                    </div>
                                </td>
                                <td>$ 145</td>
                            </tr>
                            <tr>
                                <td colspan="2">
                                    <h6 class="m-0 text-right">Sub Total:</h6>
                                </td>
                                <td>
                                    $ 400
                                </td>
                            </tr>
                            <tr>
                                <td colspan="2">
                                    <h6 class="m-0 text-right">Shipping:</h6>
                                </td>
                                <td>
                                    Free
                                </td>
                            </tr>
                            <tr>
                                <td colspan="2">
                                    <h6 class="m-0 text-right">Total:</h6>
                                </td>
                                <td>
                                    $ 400
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
<!-- end modal -->
@endsection
@push('js')
<script src="{{ asset('assets/libs/datatables.net/js/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('assets/libs/datatables.net-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
@endpush


