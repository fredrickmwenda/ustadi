@extends('layouts.app')

@section('content')
<div class="page-content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                    <h4 class="mb-sm-0 font-size-18">Mentors List </h4>

                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="javascript: void(0);">users</a></li>
                            <li class="breadcrumb-item active">Mentors List</li>
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
                                <a href="{{route('mentors.create')}}" type="button" class="btn btn-success btn-rounded waves-effect waves-light mb-2 me-2"><i class="mdi mdi-plus me-1"></i> Add New Mentor</a>
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
                                      <th class="align-middle">Mentor Name </th>
                                      <th class="align-middle">Phone Number </th>
                                      <th  class="align-middle">Location </th>
                                      <th class="align-middle">Availability </th>
                                      <th class="align-middle">specializations </th>
                                      <th class="align-middle">Approval Status </th>
                                      <th class="align-middle">View Details</th>
                                      <th class="align-middle">Action</th>
                                  </tr>
                              </thead>
                              <tbody>
                                @foreach ($mentors as $key => $mentor)
                                  <tr>
                                      <td>
                                          <div class="form-check font-size-16">
                                              <input class="form-check-input" type="checkbox" id="orderidcheck01">
                                              <label class="form-check-label" for="orderidcheck01"></label>
                                          </div>
                                        </td>
                                      <td>{{$key+1}}</td>
                                      <td>
                                        @if ($mentor->user->profile_image)
                                        <img src="{{asset('storage/'.$mentor->user->profile_image)}}" alt="" class="avatar-xs rounded-circle me-2" height="10px" width="10px">
                                        @else
                                        <img src="{{asset('assets/images/users/avatar-1.jpg')}}" alt="" class="avatar-xs rounded-circle me-2" height="10px" width="10px">
                                        @endif
                                        {{$mentor->user->name}}       
                                      </td>
                                      <td>
                                          <a href="tel:{{$mentor->user->phone}}" class="text-body fw-bold">{{$mentor->user->phone}}</a>
                                      </td>
                                      <td>
                                            {{$mentor->location->name}}
                                      </td>
                                      <td>
                                         {{$mentor->availability}}      
                                      </td>
                                        <td>
                                            @if (!$mentor->specializations == null)
                                            @foreach (json_decode($mentor->specializations) as $specialization)
                                            <span class="badge bg-soft-success text-success mb-1">{{$specialization}}</span>
                                            @endforeach
                                            @else
                                            <span class="badge bg-soft-success text-success mb-1">No Specializations</span>
                                            @endif
                                        </td>
                                        <td>
                                            @if ($mentor->approval_status == "approved")
                                            <span class="badge bg-soft-success text-success mb-1">{{$mentor->approval_status}}</span>
                                            @else
                                            @if (auth()->user()->role == "admin" || auth()->user()->role == "coordinator")
                                            <!--open a modal to approve the mentor-->
                                            <button type="button" class="btn btn-sm btn-warning btn-rounded mb-1" type="button" data-bs-toggle="modal" data-bs-target=".approveMentorModal" data-bs-mentor-id="{{$mentor->id}}">Approve</button>
                                            @else
                                            <span class="badge bg-soft-warning text-warning mb-1">{{$mentor->approval_status}}</span>
                                            @endif
                                            @endif

                                      <td>
                                          <!-- Button trigger modal -->
                                          <button type="button" class="btn btn-primary btn-sm btn-rounded" data-bs-toggle="modal" data-bs-target=".orderdetailsModal">
                                              View Details
                                          </button>
                                      </td>
                                      <td>
                                          <div class="d-flex gap-3">
                                              <a href="{{route('mentors.edit', $mentor->id)}}" class="text-success"><i class="mdi mdi-pencil font-size-18"></i></a>
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
<!-- aPPROVE OR REJECT MENTOR MODAL -->
<div class="modal fade approveMentorModal"  tabindex="-1" role="dialog" aria-labelledby="approveMentorModal" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">

                <div class="modal-header">
                    <h5 class="modal-title" id="approveMentorModal">Approve Mentor</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
               
                <!--pass the mentor id to the route-->
                <!-- <form id="approveMentorForm" method="POST">
                    @csrf -->
                <div class="modal-body">
                    <p>Are you sure you want to approve this mentor?</p>
                    <p class="mb-0">This action cannot be undone.</p>
                    <p class="mb-2">Mentor Name: <span class="text-primary" id="mentorName"></span></p>
                    <p class = "mb-2">Mentor Email: <span class="text-primary" id="mentorEmail"></span></p>
                    <p class = "mb-2">Mentor Phone: <span class="text-primary" id="mentorPhone"></span></p>
                    <p class = "mb-2">Mentor Specializations: <span class="text-primary" id="mentorSpecializations"></span></p>
                    <p class = "mb-2">Mentor Approval Status: <span class="text-primary" id="mentorApprovalStatus"></span></p>
                    <p class = "mb-2">Mentor Location: <span class="text-primary" id="mentorLocation"></span></p>
                    <input type="hidden" name="mentor_id" id="mentor_id">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary"  id = "approveMentorBtn">Approve</button>
            </div>
            <!-- </form> -->
        </div>
    </div>
</div>





</div>
<!-- <div class="modal fade orderdetailsModal" tabindex="-1" role="dialog" aria-labelledby=orderdetailsModalLabel" aria-hidden="true">
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
</div> -->
<!-- end modal -->
@endsection

@push('js')
<script>
    $(document).ready(function(){
        $('.approveMentorModal').on('show.bs.modal', function (event) {
            var button = $(event.relatedTarget)
        // get mentor_id from data-bs-mentor-id attribute
            var mentor_id = button.data('bs-mentor-id')
            console.log(mentor_id);
            $.ajax({
                type: "GET",
                url: "/mentors/" + mentor_id + "/show",
                success: function (data) {
                    //wait for 3 seconds
                    setTimeout(function(){
                    //     //do what you need here
                    // 
                        console.log(data);
                        //getmentor name from relationship with user by referencing user.name
                        // user is in this fromat user: {id: 4, name: 'ahmed mahrez', email: '
                            //we can use dot notation to access the name
                        $('#mentorName').text(data.mentor.user.name);
                        $('#mentorEmail').text(data.mentor.user.email);
                        $('#mentorPhone').text(data.mentor.user.phone);
                        $('#mentorSpecializations').text(data.mentor.specializations);
                        $('#mentorApprovalStatus').text(data.mentor.approval_status);
                        $('#mentor_id').val(data.mentor.id);
                    }, 2000);
                    // $('#mentorLocation').text(data.location.name);
                },
                error: function (data) {
                    console.log('Error:', data);
                }
            });
        })
    });
    // $('#approveMentorBtn').click(function(){
    //     console.log('clicked');
    //     var mentor_id = $('#mentor_id').val();
    //     console.log(mentor_id);
    // });

</script>
<!--on click approve button, send ajax request to update mentor approval status to approved-->
<script>
    $.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
    });
    $(document).ready(function(){
        $('#approveMentorBtn').on('click', function (event) {
            console.log('clicked');
            // var button = $(event.relatedTarget)
           // get mentor_id from hidden input
            var mentor_id = $('#mentor_id').val();
            console.log(mentor_id);
            $.ajax({
                type: "POST",
                url: "/mentors/" + mentor_id + "/approve",
                
                success: function (response) {
                    console.log (response);
                    //check if the response is a success or error
                    if (response.status == 'success') {
                        $('#approveMentorModal').modal('hide');
                        //if success, show success message
                        toastr.success(response.message);
                        //close modal
                       
                        //reload the page
                        location.reload();
                    } else {
                        $('#approveMentorModal').modal('hide');
                        //if error, show error message
                        toastr.error(response.message);
                        
                    }
                },
                error: function (data) {
                    console.log('Error:', data);
                }
            });
        })
    });
    </script>

@endpush



