@extends('layouts.app')


@section('content')
<div class="page-content">
	<div class="container-fluid">
		<div class="row">
			<div class="col-12">
				<div class="page-title-box d-sm-flex align-items-center justify-content-between">
					<h4 class="mb-sm-0 font-size-18">Create ActivityType</h4>

					<div class="page-title-right">
						<ol class="breadcrumb m-0">
							<li class="breadcrumb-item"><a href="{{route('activities-types.index')}}">Activity Types</a></li>
							<li class="breadcrumb-item active">Create ActivityType</a></li>
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

						<h4 class="card-title">ActivityType Information</h4>
						<!-- <p class="card-title-desc">Fill all information below</p> -->
						<!-- novalidate -->
						<form class="needs-validation" method="POST" action="{{route('activities-types.store')}}" novalidate>
							@csrf

							<div class="form-group row mb-4">
								<label for="activity_type_name"  class="col-form-label col-lg-2">ActivityType Name<span class="text-danger">*</span> </label>
								<input id="activity_type_name" name="name" type="text" class="form-control col-lg-10"  required>
							</div>
							<div class="form-group row mb-4">
								<label for="activity_type_description"  class="col-form-label col-lg-3">ActivityType Description<span class="text-danger">*</span> </label>
								<input id="activity_type_description" name="description" type="text" class="form-control col-lg-9"  required>
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



