
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
					<h4 class="mb-sm-0 font-size-18">Edit ClubActivity</h4>

					<div class="page-title-right">
						<ol class="breadcrumb m-0">
							<li class="breadcrumb-item"><a href="{{route('clubs-activities.index')}}">ClubActivities</a></li>
							<li class="breadcrumb-item active">Edit ClubActivity</li>
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

						<h4 class="card-title">Edit ClubActivity Information</h4>
						<!-- <p class="card-title-desc">Fill all information below</p> -->
						<!-- novalidate -->
						<form class="needs-validation" method="POST" action="{{route('clubs-activities.update', $clubActivity->id)}}" novalidate>
							@csrf

							<div class="form-group row mb-4">
								<label for="activities_name">ClubActivity Name</label>
								<input id="clubActivityname" name="activities_name" type="text" class="col-form-label "  required value="{{$clubActivity->activities_name}}" readonly>
							</div>

							<div class="form-group row mb-4">
								<label for="clubActivity_description" >Description</label>
								<textarea id="clubActivity_description" name="description" type="text" required>{{$clubActivity->description}}</textarea>
							</div>
							<div class="form-group row mb-4">
								<label for="clubs" class="col-form-label col-lg-2">Club</label>
								<select class="form-control col-lg-10 select2" name="club_id" id="clubs" required>
									<option>Select</option>
									@foreach($clubs as $club)
									<!--get the club id from the clubActivity table and compare it with the club id from the club table-->
										<option value="{{$club->id}}" {{$clubActivity->club_id == $club->id ? 'selected' : ''}}>{{$club->club_name}}</option>
									@endforeach
								</select>
							</div>

							<div class="form-group row mb-4">
								<label for="activities_type" class="col-form-label col-lg-2">ClubActivity Type</label>
								<select class="form-control col-lg-10 select2" name="activity_type_id" id="activities_type" required>
									<option>Select</option>
									@foreach($activity_types as $activities_type)
									<!--get the activity type id from the clubActivity table and compare it with the activity type id from the activity type table-->
										<option value="{{$activities_type->id}}" {{$clubActivity->activity_type_id == $activities_type->id ? 'selected' : ''}}>{{$activities_type->name}}</option>
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

        <!-- dropzone plugin -->
        <script src="{{ asset('assets/libs/dropzone/min/dropzone.min.js')}}"></script>
		<script>
		    $(".select2").select2();
		</script>

@endpush

