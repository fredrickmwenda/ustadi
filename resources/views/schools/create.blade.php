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
					<h4 class="mb-sm-0 font-size-18">Create School</h4>

					<div class="page-title-right">
						<ol class="breadcrumb m-0">
							<li class="breadcrumb-item"><a href="{{route('schools.index')}}">Schools</a></li>
							<li class="breadcrumb-item active">Create School</li>
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

						<h4 class="card-title">School Information</h4>
						<!-- <p class="card-title-desc">Fill all information below</p> -->
						<!-- novalidate -->
						<form class="needs-validation" method="POST" action="{{route('schools.store')}}" novalidate enctype="multipart/form-data">
							@csrf

							<div class="form-group row mb-4">
								<label for="schoolname">School Name</label>
								<input id="schoolname" name="school_name" type="text" class="form-control"  required>
							</div>
							<div class="form-group row mb-4">
								<label for="school_county">County</label>
								<select class="form-control select2" name="county_id" id="county_id" required>
									<option>Select</option>
									@foreach($locations as $location)
										<option value="{{$location->id}}">{{$location->name}}</option>
									@endforeach
								</select>
							</div>
							<div class="form-group row mb-4">
								<label for="school_phone">Phone</label>
								<input id="school_phone" name="phone" type="text" class="form-control"  required>
							</div>

							<div class="form-group row mb-4">
								<label for="school_email">Email</label>
								<input id="school_email" name="email" type="email" class="form-control"  required>
							</div>

							<!--text area for school motto-->
							<div class="form-group row mb-4">
								<label for="school_motto">School Motto</label>
								<textarea class="form-control" id="school_motto" name="motto" rows="3"></textarea>
							</div>

							<div class="form-group row mb-4">
								<label class="col-form-label col-lg-2">Add School Logo </label>
								<input class="form-control" type="file" name="logo" />
							</div>



								<!-- </div>
								

								<div class="col-sm-6">
									<div class="mb-3">
										<label class="control-label">Category</label>
										<select class="form-control select2">
											<option>Select</option>
											<option value="FA">Fashion</option>
											<option value="EL">Electronic</option>
										</select>
									</div>
									<div class="mb-3">
										<label class="control-label">Features</label>

										<select class="select2 form-control select2-multiple" multiple="multiple" data-placeholder="Choose ...">
											<option value="WI">Wireless</option>
											<option value="BE">Battery life</option>
											<option value="BA">Bass</option>
										</select>

									</div>
									<div class="mb-3">
										<label for="schooldesc">school Description</label>
										<textarea class="form-control" id="schooldesc" rows="5"></textarea>
									</div>
									
								</div>
							</div> -->
							<!-- <div>
								<h4 class="card-title mb-3">school Images</h4>
								<div class="dropzone mb-4">
									<div class="fallback">
										<input name="file" type="file" multiple />
									</div>

									<div class="dz-message needsclick">
										<div class="mb-3">
											<i class="display-4 text-muted bx bxs-cloud-upload"></i>
										</div>
										
										<h4>Drop files here or click to upload.</h4>
									</div>
								</div>
							</div> -->

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

        <!-- dropzone plugin -->
        <script src="{{ asset('assets/libs/dropzone/min/dropzone.min.js')}}"></script>
		<script>
		    $(".select2").select2();
		</script>

@endpush

