@extends('layouts.app')


@section('content')
<div class="page-content">
	<div class="container-fluid">
		<div class="row">
			<div class="col-12">
				<div class="page-title-box d-sm-flex align-items-center justify-content-between">
					<h4 class="mb-sm-0 font-size-18">Create Availability</h4>

					<div class="page-title-right">
						<ol class="breadcrumb m-0">
							<li class="breadcrumb-item"><a href="{{route('availabilities.index')}}">Availabilities</a></li>
							<li class="breadcrumb-item active">Create Availability</a></li>
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

						<h4 class="card-title">Availability Information </h4>
						<!-- <p class="card-title-desc">Fill all information below</p> -->
						<!-- novalidate -->
						<form class="needs-validation" method="POST" action="{{route('availabilities.store')}}" novalidate>
							@csrf

							<div class="form-group row mb-4">
								<label for="availability_type"  class="col-form-label col-lg-2">Availability Type<span class="text-danger">*</span> </label>
								<select id="availability_type" name="availability_type" class="form-select col-lg-10" required>
									<option value="">Select Availability Type</option>
									<option value="weekdays">Weekdays</option>
									<option value="weekends">Weekends</option>
									<option value="specific_days">Specific Days</option>
								</select>
							</div>
							<div class="form-group row mb-4">
								<label for="times_available"  class="col-form-label col-lg-2">Times Available<span class="text-danger">*E.g 4 days a week</span> </label>
								<textarea id="times_available" name="times_available" class="form-control col-lg-10" required></textarea>
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



