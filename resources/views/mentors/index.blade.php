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
                                <h4 class="card-title">Total Mentors: {{$mentors->count()}}</h4>
                                <!-- <div class="search-box me-2 mb-2 d-inline-block">
                                    <div class="position-relative">
                                        <input type="text" class="form-control" placeholder="Search...">
                                        <i class="bx bx-search-alt search-icon"></i>
                                    </div>
                                </div> -->
                            </div>
                            <div class="col-sm-8">
                                <div class="text-sm-end">
                                    @can('mentor.create')
                                    <a href="{{route('mentors.create')}}" type="button" class="btn btn-success btn-rounded waves-effect waves-light mb-2 me-2"><i class="mdi mdi-plus me-1"></i> Add New Mentor</a>
                                    @endcan
                                </div>
                            </div><!-- end col-->
                        </div>

                        <div class="table-responsive">                             
                          <table class="table align-middle table-nowrap table-check"  id="s-datatable">
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
                                            <span class="badge bg-soft-success text-success mb-1">{{$mentor->specializations}}</span>
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
                                            @can('mentor.activate')
                                            <button type="button" class="btn btn-sm btn-warning btn-rounded mb-1" type="button" data-bs-toggle="modal" data-bs-target=".approveMentorModal" data-bs-mentor-id="{{$mentor->id}}">Approve</button>
                                            @endcan
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
                                               @can('mentor.edit')
                                                <a href="{{route('mentors.edit', $mentor->id)}}" class="text-success"><i class="mdi mdi-pencil font-size-18"></i></a>
                                                @endcan
                                                @can('mentor.delete')
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
<!-- aPPROVE OR REJECT MENTOR MODAL -->
<div class="modal fade approveMentorModal"  tabindex="-1" role="dialog" aria-labelledby="approveMentorModal" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">

                <div class="modal-header">
                    <h5 class="modal-title" id="approveMentorModal">Approve Mentor</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
               
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

@endsection

@push('js')
<script src="{{ asset('assets/libs/datatables.net/js/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('assets/libs/datatables.net-bs4/js/dataTables.bootstrap4.min.js') }}"></script>

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



