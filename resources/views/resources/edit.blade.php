@extends('layouts.app')

@section('content') 
<div class="page-content">
	<div class="container-fluid">
	    <div class="row">
			<div class="col-12">
				<div class="page-title-box d-sm-flex align-items-center justify-content-between">
					<h4 class="mb-sm-0 font-size-18">Edit Resource </h4>

					<div class="page-title-right">
						<ol class="breadcrumb m-0">
							<li class="breadcrumb-item"><a href="{{route('resources.index')}}">Resources</a></li>
							<li class="breadcrumb-item active">Edit Resource</li>
						</ol>
					</div>

				</div>
			</div>
		</div>                      
		<div class="row">
			<div class="col-12">
				<div class="card">
					<div class="card-body">

						<h4 class="card-title">Edit Resource </h4>
						<form class="needs-validation" method="POST" action="{{route('resources.update', $resource->id)}}" novalidate>
							@csrf
							<div class="row">
								<div class="col-sm-6">
									<div class="mb-3">
										<label for="resourcename">Resource Name</label>
										<input id="resourcename" name="name" type="text" class="form-control" value="{{$resource->name}}">
										
									</div>
									<div class="mb-3">
										<label for="resourcedesc">Resource Description</label>
										<textarea class="form-control" id="resourcedesc" rows="5"  name="description">{{$resource->description}}</textarea>
									</div>
									<div class="mb-3">
										<label for="url">URL</label>
										<input id="url" name="url" type="text" class="form-control" value="{{$resource->url}}">
									</div>
									
								</div>
								

								<div class="col-sm-6">
									<div class="mb-3">
										<label class="control-label">Type</label>
										<select class="form-control select2" name="type" id="type">
											<!-- <option>Select</option> -->
											<!-- 'pdf', 'video', 'audio', 'image', 'text', 'book', 'link'] -->
                                            <option value="{{$resource->type}}">{{$resource->type}}</option>
											<option value="pdf">PDF</option>
											<option value="video">Video</option>
											<option value="audio">Audio</option>
											<option value="image">Image</option>
											<option value="text">Text</option>
											<option value="book">Book</option>
											<option value="link">Link</option>
										</select>
									</div>

									<div class="mb-3">
										<label for="author">Author</label>
										<input id="author" name="author" type="text" class="form-control" value="{{$resource->author}}">
									</div>
									<div class="mb-3">
										<label for="release_date">Release Date</label>
										<input id="release_date" name="release_date" type="date" class="form-control" value="{{$resource->release_date}}">
									</div>

									
								</div>
							</div>
							<!-- <div>
								<h4 class="card-title mb-3">Product Images</h4>
								<div class="dropzone mb-4">
									<div class="fallback">
										<input name="file" type="file" multiple />
									</div>

									<div class="dz-message needsclick">
										<div class="mb-3">
											<i class="display-4 text-muted bx bxs-cloud-upload"></i>
										</div>
										
										<h4>Drop files here or click to upload.</h4>
									</div>
								</div>
							</div> -->

							<div class="d-flex flex-wrap gap-2">
								<button type="submit" class="btn btn-primary waves-effect waves-light">Save Changes</button>
								<!-- <button type="button" class="btn btn-secondary waves-effect waves-light">Cancel</button> -->
							</div>
						</form>

					</div>
				</div>


			</div>
		</div>
	</div>
</div>
@endsection
