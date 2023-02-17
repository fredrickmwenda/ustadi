@extends('layouts.app')


@section('content')
<div class="page-content">
	<div class="container-fluid">
		<div class="row">
			<div class="col-12">
				<div class="page-title-box d-sm-flex align-items-center justify-content-between">
					<h4 class="mb-sm-0 font-size-18">Edit Schedule</h4>

					<div class="page-title-right">
						<ol class="breadcrumb m-0">
							<li class="breadcrumb-item"><a href="{{ route('schedules.index')}}">Schedules</a></li>
							<li class="breadcrumb-item active">Edit Schedule</li>
						</ol>
					</div>

				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-lg-12">
				<div class="card">
					<div class="card-body">
						<h4 class="card-title mb-4">Edit Schedule</h4>
						<form class="outer-repeater"  method="post" action="{{route('schedules.update', $schedule->id)}}">
							@csrf
							<div data-repeater-list="outer-group" class="outer">
								<div data-repeater-item class="outer">
									<div class="form-group row mb-4">
										<label for="taskname" class="col-form-label col-lg-2">Schedule Name</label>
										<div class="col-lg-10">
											<input id="taskname" name="title" type="text" class="form-control" placeholder="Enter Schedule Name..." value="{{$schedule->title}}">
										</div>
									</div>
									<div class="form-group row mb-4">
										<label class="col-form-label col-lg-2">Schedule Description</label>
										<div class="col-lg-10">
											<textarea class="form-control" rows="3" placeholder="Enter Schedule Description..." name="description">{{$schedule->description}}</textarea>
										</div>
									</div>
									<!--requests in a select box-->
									<div class="form-group row mb-4">
										<label class="col-form-label col-lg-2">Select Request</label>
										<div class="col-lg-10">
											<select class="form-control select2" name="request_id" id="request_id">
												<option>Select Request</option>
												@foreach($requests as $requesti)											
												<option value="{{$requesti->id}}" {{ $requesti->id == $schedule->request_id ? 'selected' : '' }}>{{$requesti->school->school_name}} - {{$requesti->schoolClubActivity->schoolClub->club->club_name}} - {{$requesti->schoolClubActivity->clubActivity->activities_name}}</option>
												@endforeach
											</select>
										</div>
									</div>

									<div class="form-group row mb-4">
										<label class="col-form-label col-lg-2">Schedule Date</label>
										<div class="col-lg-10">
											<div class="input-daterange input-group" >
												<input type="datetime-local" class="form-control" placeholder="Start Date" name="start" id="schedule_time" readonly value="{{$schedule->start}}"/>
											<input type="datetime-local" class="form-control" placeholder="End Date" name="end"  value="{{$schedule->end}}"/>
											</div>
										</div>
									</div>
									
									<div class="inner-repeater mb-4">
										<div data-repeater-list="inner-group" class="inner form-group mb-0 row">
											<label class="col-form-label col-lg-2">Add Schedule Logo </label>
											<div  data-repeater-item class="inner col-lg-10 ms-md-auto">
												<div class="mb-3 row align-items-center">
														<div class="mt-4 mt-md-0">
															<input class="form-control" type="file" name="logo" />
														</div>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-lg-10">
									<button type="submit" class="btn btn-primary">Edit Schedule</button>
								</div>
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
<script>
$(document).ready(function(){
		$('#request_id').on('change', function(){
			var request_id = $(this).val();
			if(request_id){
				$.ajax({
					type: "GET",
					// url is school-club-activities/{id}/get-proposed-date-time
					url: "/requests/"+request_id+"/get-proposed-date-time",
					success: function(res){
						if(res){
							console.log(res);
							$("#schedule_time").empty();
							$("#schedule_time").val(res.proposed_date_time);
						}else{
							$("#schedule_time").empty();
						}
					}
				});
			}else{
				$("#schedule_time").empty();
			}
		});
	});
</script>
@endpush
