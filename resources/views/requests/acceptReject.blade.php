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
					<h4 class="mb-sm-0 font-size-18">Accept / Reject Request</h4>

					<div class="page-title-right">
						<ol class="breadcrumb m-0">
							<li class="breadcrumb-item"><a href="{{route('requests.index')}}">Requests</a></li>
							<li class="breadcrumb-item active">Accept / Reject Request</li>
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

						<h4 class="card-title">Request Details</h4>
						<!-- <p class="card-title-desc">Fill all information below</p> -->
						<!-- novalidate -->
						<form class="needs-validation" method="POST" action="{{route('requests.acceptRejectRequest', $request->id)}}" novalidate enctype="multipart/form-data">
							@csrf

							<div class="form-group row mb-4">
								<label for="schoolname">Mentor Name</label>
                                <input type="text" class="form-control" id="schoolname" value="{{$request->mentor->user->name}}" disabled>

							</div>
                            <div class="form-group row mb-4">
								<label for="schoolname">School Name</label>
                                <input type="text" class="form-control" id="schoolname" value="{{$request->school->school_name}}" disabled>
							</div>
							<!-- <!-hidden input with school id--> 
							

							<!--school_club_activity-->
							<div class="form-group row mb-4">
								<label for="school_club_activity">School Club Activity</label>
                                <input type="text" class="form-control" id="school_club_activity" value="{{$request->schoolClubActivity->clubActivity->activities_name}}" disabled>
							</div>

							<!--details in text-area-->
							<div class="form-group row mb-4">
								<label for="details">Details</label>
								<textarea class="form-control" name="details" id="details" rows="3" required disabled>{{$request->details}}</textarea>
							</div>

							<!--proposed date and time-->
							<div class="form-group row mb-4">
								<label for="proposed_date">Proposed Date</label>
								<input type="datetime-local" class="form-control" name="proposed_date_time" id="proposed_date"  value="{{date('Y-m-d\TH:i', strtotime($request->proposed_date_time))}}">
							</div>
                            <!--dropdown to select accept or reject-->
                            <div class="form-group row mb-4">
                                <label for="status">Status</label>
                                <select class="form-control select2" name="status_id" id="status_id" required>
										<option>Select</option>
                                        <option value="accept">Accept</option>
                                         <option value="reject">Reject</option>
									</select>
                                <!-- <select class="form-control" name="status" id="status">
                                    <option value="accept">Accept</option>
                                    <option value="reject">Reject</option>
                                </select> -->
                            </div>
                            <!--hidden div to show if reject is selected, with text area to set reason-->
                            <div class="form-group row mb-4" id="reject_reason_div" style="display:none;">
                                <label for="reject_reason">Reason</label>
                                <textarea class="form-control" name="reject_reason" id="reject_reason" rows="3" required></textarea>
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
    $(document).ready(function(){
        $('#status_id').change(function(){
            if($(this).val() == 'reject'){
                $('#reject_reason_div').show();
            }else{
                $('#reject_reason_div').hide();
            }
        });
    });
</script>




@endpush

