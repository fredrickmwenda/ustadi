@extends('layouts.app')

@push('css')
	<link href="{{asset('assets/libs/select2/css/select2.min.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('assets/libs/dropzone/min/dropzone.min.css')}}" rel="stylesheet" type="text/css" />
@endpush

@section('content')
<div class="page-content">
	<div class="container-fluid">
		<div class="row">
			<div class="col-12">
				<div class="page-title-box d-sm-flex align-items-center justify-content-between">
					<h4 class="mb-sm-0 font-size-18">Create Request</h4>

					<div class="page-title-right">
						<ol class="breadcrumb m-0">
							<li class="breadcrumb-item"><a href="{{route('requests.index')}}">Requests</a></li>
							<li class="breadcrumb-item active">Create Request</li>
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

						<h4 class="card-title">Request Information</h4>
						<!-- <p class="card-title-desc">Fill all information below</p> -->
						<!-- novalidate -->
						<form class="needs-validation" method="POST" action="{{route('requests.store')}}" enctype="multipart/form-data">
							@csrf

							<div class="form-group row mb-4">
								<label for="schoolname">Mentor Name</label>
								<input type="text" class="form-control" id="mentor_name" name="mentor_name" placeholder="Enter Mentor Name" required>
							</div>
							<!-- <!-hidden input with school id--> 
							
							@if(auth()->user()->hasRole ('admin'))
								<div class="form-group row mb-4">
									<label for="schoolname">School Name</label>
									<select class="form-control select2" name="school_id" id="school_id" required>
										<option>Select</option>
										@foreach($schools as $school)
											<option value="{{$school->id}}">{{$school->name}}</option>
										@endforeach
									</select>
								</div>
							@else
							<input type="hidden" name="school_id" value="{{$schools->id}}">
							@endif

							<!--school_club_activity-->
							<div class="form-group row mb-4">
								<label for="school_club_activity">School Club Activity</label>
								<select class="form-control select2" name="school_club_activity_id" id="school_club_activity" required>
									<option>Select</option>
									@foreach($school_club_activities as $school_club_activity)
										<option value="{{$school_club_activity->id}}">{{$school_club_activity->school_club_activity}}</option>
									@endforeach
								</select>
							</div>

							<!--details in text-area-->
							<div class="form-group row mb-4">
								<label for="details">Details</label>
								<textarea class="form-control" name="details" id="details" rows="3" required></textarea>
							</div>

							<!--proposed date and time-->
							<div class="form-group row mb-4">
								<label for="proposed_date">Proposed Date</label>
								<input type="datetime-local" class="form-control" name="proposed_date_time" id="proposed_date" required readonly>
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
<script>
// <!--get the selected school_club_activity and getits proposed_date_time-->
	$(document).ready(function(){
		$('#school_club_activity').on('change', function(){
			var school_club_activity_id = $(this).val();
			if(school_club_activity_id){
				$.ajax({
					type: "GET",
					// url is school-club-activities/{id}/get-proposed-date-time
					url: "/school-club-activities/"+school_club_activity_id+"/get-proposed-date-time",
					success: function(res){
						if(res){
							console.log(res);
							$("#proposed_date").empty();
							$("#proposed_date").val(res.proposed_date_time);
						}else{
							$("#proposed_date").empty();
						}
					}
				});
			}else{
				$("#proposed_date").empty();
			}
		});
	});

</script>




@endpush

