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
					<h4 class="mb-sm-0 font-size-18">Assign Club</h4>

					<div class="page-title-right">
						<ol class="breadcrumb m-0">
							<li class="breadcrumb-item"><a href="{{route('clubs.index')}}">Clubs</a></li>
							<li class="breadcrumb-item active">Assign Club</li>
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

						<h4 class="card-title">Assigning Club {{ $club->name }} to {{ $school->school_name }}</h4>
						<!-- <p class="card-title-desc">Fill all information below</p> -->
						<!-- novalidate -->
						<form class="needs-validation" method="POST" action="{{route('clubs.activate', $club->id)}}" enctype="multipart/form-data">
							@csrf
	
							<div class="form-group row mb-4">
								<label for="club_name" class="col-form-label col-lg-2">Club Name <span class="text-danger">*</span></label>
								<div class="col-lg-10">
									<input id="club_name" name="club_name" type="text" class="form-control" placeholder="Enter Club Name..." required readonly value="{{ $club->club_name }}">
								</div>
							</div>
							<div class="form-group row mb-4">
								<label for="number_of_students" class="col-form-label col-lg-2">Number of Students <span class="text-danger">*</span></label>
								<div class="col-lg-10">
								    <input id="number_of_students" name="students_count" type="number" class="form-control" placeholder="Enter Number of Students..." required value="{{ $club->number_of_students }}">
								</div>
							</div>
							<!-- <div class="inner-repeater mb-4">
								<div data-repeater-list="inner-group" class="inner form-group mb-0 row">
									<label class="col-form-label col-lg-2">Add Club Logo </label>
									<div  data-repeater-item class="inner col-lg-10 ms-md-auto">
										<div class="mb-3 row align-items-center">
											<div class="mt-4 mt-md-0">
												<input class="form-control" type="file" name="logo" />
											</div>
										</div>
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



