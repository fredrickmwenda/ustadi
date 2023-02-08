@extends('layouts.app')

@push('css')
    <!-- select2 css -->
	<link href="{{asset('assets/libs/select2/css/select2.min.css')}}" rel="stylesheet" type="text/css" />
@endpush

@section('content')
<div class="page-content">
	<div class="container-fluid">
		<div class="row">
			<div class="col-12">
				<div class="page-title-box d-sm-flex align-items-center justify-content-between">
					<h4 class="mb-sm-0 font-size-18">Edit School</h4>

					<div class="page-title-right">
						<ol class="breadcrumb m-0">
							<li class="breadcrumb-item"><a href="{{route('schools.index')}}">Schools</a></li>
							<li class="breadcrumb-item active">Edit School</li>
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

						<h4 class="card-title">Edit School</h4>
						<!-- <p class="card-title-desc">Fill all information below</p> -->
						<!-- novalidate -->
						<form class="needs-validation" method="POST" action="{{route('schools.update', $school->id)}}" novalidate>
							@csrf

							<div class="form-group row mb-4">
								<label for="school_name">School Name <span class="text-danger">*</span></label>
								<input id="school_name" name="school_name" type="text" class="form-control" value="{{$school->school_name}}" required>
							</div>

							<div class="form-group row mb-4">
								<label for="school_phone">Phone</label>
								<input id="school_phone" name="phone" type="text" class="form-control" value="{{$school->phone}}" required>
							</div>

							<div class="form-group row mb-4">
								<label for="school_county">County <span class="text-danger">*</span></label>
                                <select class="form-control select2" name="county_id" required>
                                    <option value="">Select County</option>
                                    @foreach($counties as $county)
                                        <option value="{{$county->id}}" {{ $county->id == $school->county_id ? 'selected' : '' }}>{{$county->name}}</option>
                                    @endforeach
                                </select>
							</div>

							<div class="form-group row mb-4">
								<label for="school_email">Email</label>
                                <input id="school_email" name="email" type="email" class="form-control" value="{{$school->email}}" required>
							</div>

                            <div class="form-group row mb-4">
                                <label for="school_motto">School Motto</label>
                                <textarea class="form-control" name="motto" id="school_motto" rows="3">{{$school->motto}}</textarea>
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

