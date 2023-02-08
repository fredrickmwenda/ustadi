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
					<h4 class="mb-sm-0 font-size-18">Create Matron</h4>

					<div class="page-title-right">
						<ol class="breadcrumb m-0">
							<li class="breadcrumb-item"><a href="{{route('matrons.index')}}">Matrons</a></li>
							<li class="breadcrumb-item active">Create Matron</li>
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

						<h4 class="card-title">Matron Information </h4>
						<!-- <p class="card-title-desc">Fill all information below</p> -->
						<!-- novalidate -->
						<form class="needs-validation" method="POST" action="{{route('matrons.store')}}" novalidate>
							@csrf

							<div class="form-group row mb-4">
								<label for="matron_name" class="col-form-label col-lg-2">Matron Name<span class="text-danger">*</span></label>
								<select id="matron_name" name="user_id" class="form-control col-lg-10 select2" required>
									<option value="">Select Matron</option>
                                    @foreach($users as $user)
                                        <option value="{{$user->id}}">{{$user->name}}</option>
                                    @endforeach
                                </select>
							</div>
							<div class="form-group row mb-4">
								<label for="school_name" class="col-form-label col-lg-2">School Name<span class="text-danger">*</span></label>
								<select id="school_name" name="school_id" class="form-control col-lg-10 select2" required>
                                    <option value="">Select School</option>
                                    @foreach($schools as $school)
                                        <option value="{{$school->id}}">{{$school->school_name}}</option>
                                    @endforeach
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




