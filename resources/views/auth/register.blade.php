@extends('layouts.auth')

@section('content')
<div class="account-pages my-5 pt-sm-5">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8 col-lg-6 col-xl-5">
                <div class="card overflow-hidden">
                    <div class="bg-primary bg-soft">
                        <div class="row">
                            <div class="col-7">
                                <div class="text-primary p-4">
                                    <h5 class="text-primary">Register</h5>
                                    <p>Get your free Ustadi account now.</p>
                                </div>
                            </div>
                            <div class="col-5 align-self-end">
                                <img src="assets/images/profile-img.png" alt="" class="img-fluid">
                            </div>
                        </div>
                    </div>
                    <div class="card-body pt-0"> 
                        <div>
                            <a href="#">
                                <div class="avatar-md profile-user-wid mb-4">
                                    <span class="avatar-title rounded-circle bg-light">
                                        <img src="assets/images/logo.svg" alt="" class="rounded-circle" height="34">
                                    </span>
                                </div>
                            </a>
                        </div>
                        <div class="p-2">
                            @if ($errors->any())
                                <div class="alert alert-danger">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif
                            <form class="needs-validation"  action="{{ route('register') }}" method="POST" novalidate>
                                @csrf 
                                <div class="mb-3">
                                    <label for="useremail" class="form-label">Email</label>
                                    <input type="email" class="form-control" id="email" name="email" placeholder="Enter email" required>  
                                    <div class="invalid-feedback">
                                        Please Enter Email
                                    </div>      
                                </div>
        
                                <div class="mb-3">
                                    <label for="username" class="form-label">Username</label>
                                    <input type="text" class="form-control" id="name" name="name" placeholder="Enter username" required>
                                    <div class="invalid-feedback">
                                        Please Enter Username
                                    </div>  
                                </div>
        
                                <div class="mb-3">
                                    <label for="userpassword" class="form-label">Password</label>
                                    <input type="password" class="form-control" id="password" name="password" placeholder="Enter password" required>
                                    <div class="invalid-feedback">
                                        Please Enter Password
                                    </div>       
                                </div>
                                <!--confirmpassword-->
                                <div class="mb-3">
                                    <label for="userpassword" class="form-label">Confirm Password</label>
                                    <input type="password" class="form-control" id="confirm-password"  name="password_confirmation" placeholder="Enter password" required>
                                    <div class="invalid-feedback">
                                        Please Confirm Password
                                    </div>
                                </div>
                                <!--role select, the roles are mentor and matron-->
                                <div class="mb-3">
                                    <label for="userpassword" class="form-label">Role</label>
                                    <select class="form-control" id="role" name="role">
                                        <option>Select User Type</option>
                                        <option value="mentor">Mentor</option>
                                        <option value="matron">Matron</option>
                                        <option value="admin">User</option>
                                    </select>
                                    <div class="invalid-feedback">
                                        Please Select Role
                                    </div>
                                </div>

                                <!--if mentor is selected, show the location field with 47 kenyan counties-->
                                <div class="mb-3" id="location" style="display: none;">
                                    <label for="userpassword" class="form-label">County</label>
                                    <select class="form-control" id="location" name="location">
                                        <option >Select County</option>
                                        @php
                                          $locations = \App\Models\Location::get();
                                        @endphp
                                        @foreach($locations as $location)
                                        <option value="{{$location->id}}">{{$location->name}}</option>
                                        @endforeach
                                        

                                    </select>
                                    <div class="invalid-feedback">
                                        Please Select Location
                                    </div>
                                </div>

                                <!--if matron is selected, show the schools from the database-->
                                <div class="mb-3" id="school" style="display: none;">
                                    @php
                                        $schools = DB::table('schools')->get();
                                    @endphp
                                    <label for="userpassword" class="form-label">School</label>
                                    <select class="form-control" id="school" name="school_id">
                                        @foreach ($schools as $school)
                                            <option value="{{$school->id}}">{{$school->school_name}}</option>
                                        @endforeach
                                    </select>
                                    <div class="invalid-feedback">
                                        Please Select School
                                    </div>
                                </div>

            
                                <div class="mt-4 d-grid">
                                    <button class="btn btn-primary waves-effect waves-light" type="submit">Register</button>
                                </div>

                                <!-- <div class="mt-4 text-center">
                                    <h5 class="font-size-14 mb-3">Sign up using</h5>
    
                                    <ul class="list-inline">
                                        <li class="list-inline-item">
                                            <a href="javascript::void()" class="social-list-item bg-primary text-white border-primary">
                                                <i class="mdi mdi-facebook"></i>
                                            </a>
                                        </li>
                                        <li class="list-inline-item">
                                            <a href="javascript::void()" class="social-list-item bg-info text-white border-info">
                                                <i class="mdi mdi-twitter"></i>
                                            </a>
                                        </li>
                                        <li class="list-inline-item">
                                            <a href="javascript::void()" class="social-list-item bg-danger text-white border-danger">
                                                <i class="mdi mdi-google"></i>
                                            </a>
                                        </li>
                                    </ul>
                                </div> -->
        
                                <div class="mt-4 text-center">
                                    <p class="mb-0">By registering you agree to the Ustadi <a href="#" class="text-primary">Terms of Use</a></p>
                                </div>
                            </form>
                        </div>
    
                    </div>
                </div>
                <div class="mt-5 text-center">
                    
                    <div>
                        <p>Already have an account ? <a href="{{ route('login') }}" class="fw-medium text-primary"> Login</a> </p>
                        <p>© <script>document.write(new Date().getFullYear())</script> Ustadi.</p>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>
@endsection

@push('js')

<script>
    $(document).ready(function(){
        $('#role').change(function(){
            console.log()
            var role = $(this).val();
            console.log(role);
            if(role == 'mentor'){
                $('#location').show();
                $('#school').hide();
            }else if(role == 'matron'){
                $('#school').show();
                $('#location').hide();
            }else{
                $('#location').hide();
                $('#school').hide();
            }
        });
    });
</script>
@endpush
