@extends('layouts.app')

@push('css')
    <!-- select2 css -->
	<link href="{{asset('assets/libs/select2/css/select2.min.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('assets/css/styles.css')}}" rel="stylesheet" type="text/css" />

@endpush
@section('content')
<div class="page-content">
    <div class="container-fluid">

        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                    <h4 class="mb-sm-0 font-size-18"> User Profile</h4>

                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="javascript: void(0);">Users</a></li>
                            <li class="breadcrumb-item active">Profile</li>
                        </ol>
                    </div>

                </div>
            </div>
        </div>
        <!-- end page title -->

        <div class="row">
            <div class="card mb-5 mb-xl-10">
                <div class="card-body pt-9 pb-0">
                    <div class="d-flex flex-wrap flex-sm-nowrap ">
                        <div class="me-7 mb-4">
                            <!--Profile picture-->
                            <div class="symbol symbol-100px symbol-lg-160px symbol-fixed position-relative">
                                @if($user->profile_photo)
                                <img src="{{ asset('storage/'.$user->profile_photo) }}" alt="image" />
                                @else
                                <img src="{{ asset('assets/images/users/avatar-1.jpg') }}" alt="image" />
                                @endif
                                @if (session()->has('user_id'))
                                    <div class="position-absolute translate-middle bottom-0 start-100 mb-6 bg-success rounded-circle border border-4 border-body h-20px w-20px"></div>
                                @else
                                    <div class="position-absolute translate-middle bottom-0 start-100 mb-6 bg-danger rounded-circle border border-4 border-body h-20px w-20px"></div>
                                @endif
                            </div>
                        </div>

                        <div class="flex-grow-1">
                            <div class="d-flex justify-content-between align-items-start flex-wrap mb-2">
                                <div class="d-flex flex-column">
                                    <div class="d-flex align-items-center mb-2">
                                        <a href="#" class="text-gray-900 text-hover-primary fs-2 fw-bold me-1">{{ $user->name }}</a>
                                        <span class="badge badge-light-success fw-bolder fs-8 px-4 py-2" style="color: black;">Active</span>
                                    </div>

                                    <div class="d-flex flex-wrap fw-semibold fs-6 mb-4 pe-2">
                                        <a href="#" class="d-flex align-items-center text-gray-400 text-hover-primary me-5 mb-2">
                                            <!--get rounded small user icon-->
                                            <span class="me-1">
                                                <i class="bx bx-user fs-7"></i>
                                            </span>
                                            {{$user->role }}
                                        </a>

                                        @if($user->role_id == 4)
                                           @php
                                           $mentor = App\Models\Mentor::where('user_id', $user->id)->first();
                                           @endphp
                                           <!-- check if mentor approval_status is approved -->

                                            @if($mentor)
                                           <!-- mentor location is not null -->
                                                @if($mentor->approval_status == 'approved' && $mentor->location != null)
                                                <!--show mentor location-->
                                                    <a href="#" class="d-flex align-items-center text-gray-400 text-hover-primary me-5 mb-2">
                                                        <!--get rounded small location icon-->
                                                        <span class="symbol symbol-20px me-3">
                                                            <i class="bi bi-geo-alt fs-7"></i>
                                                        </span>
                                                        {{ $mentor->location->name }}
                                                    </a>
                                                @endif
                                            @endif
                                        @endif

                                        <a href="#" class="d-flex align-items-center text-gray-400 text-hover-primary me-5 mb-2">
                                            <!--get rounded small email icon-->
                                            <span class="me-1">
                                                <i class="bx bx-envelope fs-7"></i>
                                            </span>
                                            {{ $user->email }}
                                        </a>

                                    </div>
                                </div>
                            </div>
                            <div class="d-flex flex-wrap flex-stack">
                                <!--phone number-->
                                <span class="fw-bolder text-gray-400 me-2">
                                    Phone: {{ $user->phone }}
                                </span>
                            </div>
                        </div>
                        

                    </div>
                    <ul class="nav nav-tabs nav-stretch nav-line-tabs nav-line-tabs-2x border-transparent fs-5 fw-bold" id="myTab" role="tablist">
                        <li class="nav-item mb-2">
                            <a class="nav-link text-active-primary ms-0 me-10 active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Profile Overview</a>
                        </li>
                        <li class="nav-item mb-2">
                            <a class="nav-link text-active-primary ms-0 me-10"  id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">Edit Profile </a>
                        </li>
                        @if($user->role_id == 4)
                            @php
                            $mentor = App\Models\Mentor::where('user_id', $user->id)->first();
                            @endphp

                            @if($mentor)
                                @if($mentor->approval_status == 'approved')
                                    <li class="nav-item">
                                        <a class="nav-link text-active-primary ms-0 me-10" id="available-tab" data-toggle="tab" href="#available" role="tab" aria-controls="available" aria-selected="false">Availability & Specialization</a>
                                    </li>
                                @endif
                            @endif
                        @endif

                        <li class="nav-item mb-2">
                            <a class="nav-link" id="contact-tab" data-toggle="tab" href="#contact" role="tab" aria-controls="contact" aria-selected="false">Change Password </a>
                        </li>

                    </ul>
                    <div class="tab-content mt-10" id="myTabContent">
                        <div class="tab-pane fade " id="home" role="tabpanel" aria-labelledby="home-tab">
                            <div class="card mb-5 mb-xl-10">
                                <div class="card-header cursor-pointer">
                                    <div class="card-title m-0">
                                        <h3 class="fw-bold m-0"style="font-size: 16px;">Profile Details</h3>
                                    
                                    </div>
                                   
                                    
                                </div>
                                <div class="card-body p-9">
                                    <div class="row mb-7">
                                        <label class="col-lg-4 fw-semibold text-muted">Full Name</label>
                                        <div class="col-lg-8">                    
                                            <span class="fw-bold fs-6 text-gray-800">{{ $user->name }}</span>          
                                        </div>
                                </div>
                                    <div class="row mb-7">
                                        <label class="col-lg-4 fw-semibold text-muted">Email</label>
                                        <div class="col-lg-8">                    
                                                <span class="fw-bold fs-6 text-gray-800">{{ $user->email }}</span>          
                                        </div>
                                    </div>

                                    <div class="row mb-7">
                                        <label class="col-lg-4 fw-semibold text-muted">Phone Number</label>
                                        <div class="col-lg-8">                    
                                            <span class="fw-bold fs-6 text-gray-800">{{ $user->phone }}</span>          
                                        </div>
                                    </div>

                                    <div class="row mb-7">
                                        <label class="col-lg-4 fw-semibold text-muted">Role</label>
                                        <div class="col-lg-8">                    
                                            <span class="fw-bold fs-6 text-gray-800">{{ $user->role }}</span>          
                                        </div>
                                    </div>

                                    @if($user->role_id == 4)
                                        @php
                                        $mentor = App\Models\Mentor::where('user_id', $user->id)->first();
                                        @endphp

                                        @if($mentor)
                                            @if($mentor->approval_status == 'approved')
                                                <div class="row mb-7">
                                                    <label class="col-lg-4 fw-semibold text-muted">Specialization</label>
                                                    <div class="col-lg-8">                    
                                                        <span class="fw-bold fs-6 text-gray-800">{{ $mentor->specialization }}</span>          
                                                    </div>
                                                </div>

                                                <div class="row mb-7">
                                                    <label class="col-lg-4 fw-semibold text-muted">Location</label>
                                                    <div class="col-lg-8">                    
                                                        <span class="fw-bold fs-6 text-gray-800">{{ $mentor->location->name }}</span>          
                                                    </div>
                                                </div>
                                            @endif
                                        @endif
                                    @endif

                                </div>                       

                            </div>
                        </div>

                        <div class="tab-pane fade active show" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                            <div class="card card-custom">
                                <div class="card-header">
                                    <div class="card-title m-0">
                                        <h3 class="fw-bold m-0">Edit Profile</h3>
                                    </div>
                                </div>
                                <form id="changePassword">
                                    @csrf
                                    <div class="card-body">
                                        <div class="row mb-3">
                                            <label class="col-lg-4 col-form-label required fw-bold fs-6">Profile Picture</label>
                                            <div class="col-lg-8">
                                            <!-- style="background-image: url('https:preview.keenthemes.com/keen/themes/metronic8/demo6/assets/media/svg/avatars/300-1.jpg')" -->
                                                <div class="image-input image-input-outline" >
                                                @if($user->avatar)
                                                    <div class="image-input-wrapper w-125px h-125px" style="background-image: url('{{ asset('storage/'.$user->avatar) }}')"></div>
                                                @else
                                                    <div class="image-input-wrapper w-125px h-125px" style="background-image: url(' {{ asset('assets/images/users/avatar-1.png') }} ')"></div>
                                                @endif
                                                    <label class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow" data-kt-image-input-action="change" data-bs-toggle="tooltip" aria-label="Change avatar" data-bs-original-title="Change avatar" data-kt-initialized="1">
                                                        <i class="bx bx-pencil b"></i>
                                                        
                                                        <input type="file" name="avatar" accept=".png, .jpg, .jpeg">
                                                        <input type="hidden" name="avatar_remove">
                                                    </label>
                                                    <!-- <span class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow" data-kt-image-input-action="cancel" data-bs-toggle="tooltip" aria-label="Cancel avatar" data-bs-original-title="Cancel avatar" data-kt-initialized="1">
                                                        <i class="bx bx-x fs-2"></i>
                                                    </span> -->
                                                    <span class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow" data-kt-image-input-action="remove" data-bs-toggle="tooltip" aria-label="Remove avatar" data-bs-original-title="Remove avatar" data-kt-initialized="1">
                                                        <!--remove icon-->
                                                        <i class="bx bx-x fs-2"></i>
                                                    </span>
                                                </div>
                                                <div class="form-text">Allowed file types:  png, jpg, jpeg.</div>
                                            </div>
                                        </div>
                                        <div class="row mb-3">
                                            <label class="col-lg-4 col-form-label required fw-bold fs-6">Name</label>
                                            <div class="col-lg-8">
                                                <input class="form-control form-control-lg form-control-solid" type="text" name="name" value="{{ $user->name }}" />
                                            </div>
                                        </div>
                                        <div class="row mb-3">
                                            <label class="col-lg-4 col-form-label required fw-bold fs-6">Email</label>
                                            <div class="col-lg-8">
                                                <input class="form-control form-control-lg form-control-solid" type="email" name="email" value="{{ $user->email }}" />
                                            </div>
                                        </div>

                                        <div class="row mb-3">
                                            <label class="col-lg-4 col-form-label required fw-bold fs-6">Phone</label>
                                            <div class="col-lg-8">
                                                <input class="form-control form-control-lg form-control-solid" type="text" name="phone" value="{{ $user->phone }}" />
                                            </div>
                                        </div>             
                                    </div>
                                    <div class="card-footer d-flex justify-content-end py-6 px-9">
                                        <button type="submit" class="btn btn-primary" id="kt_account_profile_details_submit" id="changePasswordBtn">Save Changes</button>
                                        <button type="reset" class="btn btn-light btn-active-light-primary me-2">Cancel</button>                             
                                    </div>
                                </form>
                            </div>
                        </div>

                        <div class="tab-pane fade" id="available" role="tabpanel" aria-labelledby="available-tab">
                            <div class="card card-custom">
                                <div class="card-header">
                                    <div class="card-title m-0">
                                        <h3 class="fw-bold m-0">Mentor Availability & Specialization</h3>
                                    </div>
                                </div>
                                @php
                                    $mentor = App\Models\Mentor::where('user_id', $user->id)->first();
                                @endphp
                                @if($mentor)
                                <form class="form" method="POST" action="{{ route('mentors.profile', $mentor->id) }}">
                                    @csrf
                                    <div class="card-body">
                                        <div class="row mb-6">
                                            <label class="col-lg-4 col-form-label required fw-bold fs-6">Availability *Set Days Available, Separated By Comma </label>
                                            <div class="col-lg-8">
                                                <textarea class="form-control" id="availability" name="availability" rows="5"></textarea>
                                                
                                            </div>
                                        </div>

                                        <div class="row mb-6">
                                            <label class="col-lg-4 col-form-label required fw-bold fs-6">Specialization</label>
                                            <div class="col-lg-8">
                                                <textarea class="form-control" id="specializations" name="specializations" rows="5"></textarea>
                                            </div>
                                        </div>
                                        <div class="row mb-6">
                                            <label class="col-lg-4 col-form-label required fw-bold fs-6">Location</label>
                                            <div class="col-lg-8">
                                                <select class="form-control select2" name="location_id" id="location_id" required>
                                                    <option>Select</option>
                                                    @foreach($locations as $location)
                                                        <option value="{{$location->id}}">{{$location->name}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card-footer d-flex justify-content-end py-6 px-9">
                                        <button type="submit" class="btn btn-primary" id="kt_account_profile_details_submit">Save Changes</button>
                                        <button type="reset" class="btn btn-light btn-active-light-primary me-2">Cancel</button>                             
                                    </div>
                                </form>
                                @endif
                            </div>
                        </div>
                        <div class="tab-pane fade " id="contact" role="tabpanel" aria-labelledby="contact-tab">
                            <div class="card card-custom">
                                <div class="card-header">
                                    <div class="card-title m-0">
                                        <h3 class="fw-bold m-0">Change Password</h3>
                                    </div>
                                </div>
                                <form id="changePassword" class="form" >
                                    @csrf
                                    <div class="card-body">
                                        <div class="row mb-3">
                                            <label class="col-lg-4 col-form-label required fw-bold fs-6">Current Password</label>
                                            <div class="col-lg-8">
                                                <input class="form-control form-control-lg form-control-solid" type="password" name="current_password" />
                                            </div>
                                        </div>
                                        <div class="row mb-3">
                                            <label class="col-lg-4 col-form-label required fw-bold fs-6">New Password</label>
                                            <div class="col-lg-8">
                                                <input class="form-control form-control-lg form-control-solid" type="password" name="new_password" />
                                            </div>
                                        </div>
                                        <div class="row mb-3">
                                            <label class="col-lg-4 col-form-label required fw-bold fs-6">Confirm Password</label>
                                            <div class="col-lg-8">
                                                <input class="form-control form-control-lg form-control-solid" type="password" name="confirm_password" />
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card-footer d-flex justify-content-end py-6 px-9">
                                        <button type="submit" class="btn btn-primary" id="changePasswordBtn">Save Changes</button>
                                        <button type="reset" class="btn btn-light btn-active-light-primary me-2">Cancel</button>                             
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                
                </div>
            </div>


        </div>
    </div> 
</div>

@endsection


@push('js')
<script>
    $.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
    });
    // submit the change password form
    $('#changePassword').submit(function(e) {
        e.preventDefault();
        //get the form data values
        var currentPassword = $('#current_password').val();
        console.log(currentPassword);
        var newPassword = $('#new_password').val();
        console.log(newPassword);   
        var confirmPassword = $('#confirm_password').val();
        console.log(confirmPassword);
        // check that current password, new password and confirm password are not empty
        if (currentPassword == '' || newPassword == '' || confirmPassword == '') {
            console.log('Please fill all fields');
            // use toast from sweetalert
            Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: 'All fields are required!',
            })
        } 
        // check that new password and confirm password are equal
        else if (newPassword != confirmPassword) {
            console.log('Passwords do not match');
            // use toast from sweetalert
            Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: 'Passwords do not match!',
            })
        }
            else {
                console.log('All good');
                // check that current password is correct
                //include the token
                var token = $('input[name=_token]').val();
                
                $.ajax({
                    url: "{{ route('change.password') }}", // url where to submit the request                 
                    type: 'POST',

                    data: {
                        old_password: currentPassword,
                        new_password: newPassword,
                        confirm_password: confirmPassword,
                        _token: token,
                    }, // data to submit
                   //dataType: 'json', // what type of data do we expect back from the server

                    success: function(data) {
                        console.log(data);
                        if (data.success) {
                            console.log(data.success);
                            Swal.fire({
                                icon: 'success',
                                title: 'Success',
                                text: 'Password changed successfully!',
                            })
                            // toast({
                            //     type: 'success',
                            //     title: 'Password Changed Successfully'
                            // })
                            // toastr.success("Password changed successfully");
                             $('#changePassword').trigger("reset");
                            
                        }
                        else {
                            console.log(data.error);
                            Swal.fire({
                                icon: 'error',
                                title: 'Oops...',
                                text: 'Current password is incorrect!',
                            })
                        }
                    },

                    error: function(reject) {
                        console.log(reject);
                        Swal.fire({
                            icon: 'error',
                            title: 'Oops...',
                            text: 'Something went wrong!',
                        })
                    }
                });             
            }
        }
       
    );

    //call function submitForm() when the submit button is clicked
    $('#changePasswordBtn').click(function(e) {
        e.preventDefault();
        //call the function to change the password
        $('#changePassword').submit();
    });


</script>
<!-- <script>
    $(".select2").select2();
</script> -->
<script src="{{ asset('assets/libs/select2/js/select2.min.js')}}"></script>
</script><script src="{{ asset('assets/js/scripts.js') }}"></script>
@endpush