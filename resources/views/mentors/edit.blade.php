@extends('layouts.app')

@push('css')
    <!-- select2 css -->
	<link href="{{asset('assets/libs/select2/css/select2.min.css')}}" rel="stylesheet" type="text/css" />

    <!-- dropzone css -->
    <link href="{{asset('assets/libs/dropzone/min/dropzone.min.css')}}" rel="stylesheet" type="text/css" />
@endpush

@section('content')
<div class="page-content">
	<div class="container-fluid">
		<div class="row">
			<div class="col-12">
				<div class="page-title-box d-sm-flex align-items-center justify-content-between">
					<h4 class="mb-sm-0 font-size-18">Edit Mentor</h4>

					<div class="page-title-right">
						<ol class="breadcrumb m-0">
							<li class="breadcrumb-item"><a href="{{route('mentors.index')}}">Mentors</a></li>
							<li class="breadcrumb-item active">Edit Mentor</li>
						</ol>
					</div>

				</div>
			</div>
		</div>                      
		<div class="row">
			<div class="col-12">
				<div class="card">
					<!-- display errors -->
					@if ($errors->any())
						<div class="alert alert-danger">
							<ul>
								@foreach ($errors->all() as $error)
									<li>{{ $error }}</li>
								@endforeach
							</ul>
						</div>
					@endif
					<div class="card-body">

						<h4 class="card-title">Edit Mentor</h4>
						<!-- <p class="card-title-desc">Fill all information below</p> -->
						<!-- novalidate -->
						<form class="needs-validation" method="POST" action="{{route('mentors.update', $mentor->id)}}" novalidate>
							@csrf

							<div class="form-group row mb-4">
								<label for="schoolname">Mentor Name</label>
								<select class="form-control select2" name="user_id" id="user_id" required disabled>
                                    <!--get the user_id of the mentor and display the name of the mentor-->
                                    @foreach($users as $user)
                                        <option value="{{$user->id}}" {{ $user->id == $mentor->user_id ? 'selected' : '' }}>{{$user->name}}</option>
                                    @endforeach
                                </select>
		
							</div>
							<div class="form-group row mb-4">
								<label for="school_county">County</label>
								<select class="form-control select2" name="location_id" id="location_id" required>
                                    <!--get the location_id of the mentor and display the name of the county-->
                                    @foreach($locations as $location)
                                        <option value="{{$location->id}}" {{ $location->id == $mentor->location_id ? 'selected' : '' }}>{{$location->name}}</option>
                                    @endforeach
                                </select>
								</select>
							</div>


							<div class="d-flex flex-wrap gap-2">
								<button type="submit" class="btn btn-primary waves-effect waves-light">Save Changes</button>
								<button type="button" class="btn btn-secondary waves-effect waves-light">Cancel</button>
							</div>
						</form>

					</div>
				</div>


			</div>
		</div>
</div>
</div>
@endsection

@push('js')
        <!-- select 2 plugin -->
    <script src="{{ asset('assets/libs/select2/js/select2.min.js')}}"></script>

    <script>
        $(".select2").select2();
    </script>

@endpush

