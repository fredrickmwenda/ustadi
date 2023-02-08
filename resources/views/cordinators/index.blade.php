@extends('layouts.app')

@section('content')
<div class="page-content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                    <h4 class="mb-sm-0 font-size-18">Coordinators List </h4>

                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="javascript: void(0);">Coordinators</a></li>
                            <li class="breadcrumb-item active">Coordinators List</li>
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
                                    <a href="{{ route('coordinators.create') }}" class="btn btn-success btn-rounded waves-effect waves-light mb-2 me-2"><i class="mdi mdi-plus me-1"></i> Add New Coordinator</a>
                                    
                                </div>
                            </div><!-- end col-->
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
                                      <th class="align-middle">Name</th>
                                      <th class="align-middle">Phone Number</th>
                                      <th class="align-middle">Email</th>
                                      <th class="align-middle">View Details</th>
                                      <th class="align-middle">Action</th>
                                  </tr>
                              </thead>
                              <tbody>
                                @foreach($cordinators as $key => $coordinator)
                                  <tr>
                                      <td>
                                          <div class="form-check font-size-16">
                                              <input class="form-check-input" type="checkbox" id="orderidcheck01">
                                              <label class="form-check-label" for="orderidcheck01"></label>
                                          </div>
                                      </td>
                                      <td>{{ $key + 1 }}</td>
                                      <td>
                                          {{ $coordinator->user->name }}
                                      </td>
                                      <td>
                                          <a href="tel:{{ $coordinator->user->phone}}" class="text-body fw-bold">{{ $coordinator->user->phone}}</a>
                                      </td>
                                        <td>
                                            <a href="mailto:{{ $coordinator->user->email}}" class="text-body fw-bold">{{ $coordinator->user->email}}</a>
                                        </td>
                                      <td>
                                          <!-- Button trigger modal -->
                                          <button type="button" class="btn btn-primary btn-sm btn-rounded" data-bs-toggle="modal" data-bs-target=".orderdetailsModal">
                                              View Details
                                          </button>
                                      </td>
                                      <td>
                                          <div class="d-flex gap-3">
                                              <!-- <a href="{{ route('coordinators.edit', $coordinator->id) }}"class="text-success"><i class="mdi mdi-pencil font-size-18"></i></a> -->
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



