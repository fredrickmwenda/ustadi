@extends('layouts.app')


@section('content')
<div class="page-content">
    <div class="container-fluid">

        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                    <h4 class="mb-sm-0 font-size-18">Users List</h4>

                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="javascript: void(0);">Users</a></li>
                            <li class="breadcrumb-item active">Users List</li>
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
                                    <a href="{{ route('users.create') }}" class="btn btn-success btn-rounded waves-effect waves-light mb-2 me-2"><i class="mdi mdi-plus me-1"></i> Add New User</a>
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
                                        <th class="align-middle">Email</th>
                                        <th class="align-middle">Phone</th>
                                        <th class="align-middle">Role</th>
                                        <th class="align-middle">View Details</th>
                                        <th class="align-middle">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        @foreach ($users as $key => $user)
                                        <td>
                                            <div class="form-check font-size-16">
                                                <input class="form-check-input" type="checkbox" id="orderidcheck01">
                                                <label class="form-check-label" for="orderidcheck01"></label>
                                            </div>
                                        </td>
                                        <!-- <td><a href="javascript: void(0);" class="text-body fw-bold">#SK2540</a> </td> -->
                                        <td>{{ $key+1 }}</td>
                                        <td>
                                            @if ($user->profile_picture)
                                            <img src="{{ asset('storage/'.$user->profile_picture) }}" alt="" class="avatar-xs rounded-circle me-2" height="10px" width="10px">
                                            @else
                                            <img src="{{ asset('assets/images/users/avatar-2.jpg') }}" alt="" class="avatar-xs rounded-circle me-2" height="10px" width="10px">
                                            @endif
                                            <a href="javascript: void(0);" class="text-body fw-bold">{{ $user->name }}</a>       
                                        </td>
                                        <td>
                                            <a href="mailto:{{ $user->email }}" class="text-body fw-bold">{{ $user->email }}</a>
                                        </td>
                                        <td>
                                            <a href="tel:{{ $user->phone }}" class="text-body fw-bold">{{ $user->phone }}</a>
                                        </td>
                                        <td>
                                            <span class="badge bg-soft-success text-success font-size-11">{{ $user->role }}</span>
                                        </td>
                                        <td>
                                            <!--for view details we pass the user id to the modal-->
                                            <a href="javascript:void(0);" class="btn btn-primary btn-sm btn-rounded" data-bs-toggle="modal" data-bs-target=".userdetailsModal" data-id="{{ $user->id }}">View Details</a>
                                            <!-- <button type="button" class="btn btn-primary btn-sm btn-rounded" data-bs-toggle="modal" data-bs-target=".orderdetailsModal">
                                                View Details
                                            </button> -->
                                        </td>
                                        <td>
                                            <div class="d-flex gap-3">
                                                <a href="{{ route('users.edit',$user->id) }}" class="text-success"><i class="mdi mdi-pencil font-size-18"></i></a>
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

<div class="modal fade userdetailsModal" tabindex="-1" role="dialog" aria-labelledby="userdetailsModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="orderdetailsModalLabel">User Details</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <!--Use data-id to pass the user id to the modal-->
                @php
                    $user = App\Models\User::find($user->id);
                @endphp
                <!--display user profile picture-->
                @if ($user->profile_picture)
                <img src="{{ asset('storage/'.$user->profile_picture) }}" alt="" class="avatar-md rounded-circle me-2" height="10px" width="10px">
                @else
                <img src="{{ asset('assets/images/users/avatar-2.jpg') }}" alt="" class="avatar-md rounded-circle me-2" height="50px" width="50px">
                @endif            
                <p class="mb-2">Name:<span class="text-primary"> {{ $user->name }}</span></p>
                <p class="mb-4">Email:<span class="text-primary"> {{ $user->email }}</span></p>

                <p class="mb-2">User Phone<span class="text-primary"> {{ $user->phone }}</span></p>
                <p class="mb-4">User Role<span class="text-primary"> {{ $user->role }}</span></p>

                <!-- <div class="table-responsive">
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
                </div> -->
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
@endsection