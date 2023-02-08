
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
					<h4 class="mb-sm-0 font-size-18">Create School Club Activity</h4>

					<div class="page-title-right">
						<ol class="breadcrumb m-0">
							<li class="breadcrumb-item"><a href="{{route('school-club-activities.index')}}">ClubActivities</a></li>
							<li class="breadcrumb-item active">Create School Club Activity</li>
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

						<h4 class="card-title">ClubActivity Information</h4>
						<!-- <p class="card-title-desc">Fill all information below</p> -->
						<!-- novalidate -->
						<form class="needs-validation" method="POST" action="{{route('school-club-activities.store')}}" novalidate>
							@csrf

							<div class="form-group row mb-4">
								<label for="activities_name">School ClubActivity Name</label>
								<input id="school_club_activity" name="school_club_activity" type="text" class="col-form-label "  required>
							</div>

							<div class="form-group row mb-4">
								<label for="clubActivity_description" >Description</label>
								<textarea id="clubActivity_description" name="description" type="text" required></textarea>
							</div>
							<div class="form-group row mb-4">
								<label for="clubs" class="col-form-label col-lg-2">School Club</label>
								<select class="form-control col-lg-10 select2" name="school_club_id" id="clubs" required>
									<option>Select</option>
									@foreach($school_clubs as $school_club)
										<option value="{{$school_club->id}}">{{$school_club->club->club_name}}</option>
									@endforeach
								</select>
							</div>

							<div class="form-group row mb-4">
								<label for="activities_type" class="col-form-label col-lg-2">Club Activity </label>
								<select class="form-control col-lg-10 select2" name="club_activity_id" id="activities_type" required>
									<option>Select</option>
									@foreach($club_activities as $activities_type)
										<option value="{{$activities_type->id}}">{{$activities_type->activities_name}}</option>
									@endforeach
								</select>
							</div>

							<!--proposed date and time-->
							<div class="form-group row mb-4">
								<label for="proposed_date" class="col-form-label col-lg-2">Proposed Date</label>
								<!-- type  is date and time -->
								<input id="proposed_date" name="proposed_date_time" type="datetime-local" class="col-form-label col-lg-10" required>
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

        <!-- dropzone plugin -->
        <script src="{{ asset('assets/libs/dropzone/min/dropzone.min.js')}}"></script>
		<script>
		    $(".select2").select2();
		</script>

@endpush

