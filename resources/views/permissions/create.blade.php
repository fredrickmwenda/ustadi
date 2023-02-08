
@extends('layouts.app')


@section('content')
<div class="page-content">
	<div class="container-fluid">
		<div class="row">
			<div class="col-12">
				<div class="page-title-box d-sm-flex align-items-center justify-content-between">
					<h4 class="mb-sm-0 font-size-18">Create Role</h4>

					<div class="page-title-right">
						<ol class="breadcrumb m-0">
						    <li class="breadcrumb-item"><a href="{{route('roles.index')}}">Roles & Permissions</a></li>
							<li class="breadcrumb-item active">Create Role</li>
						</ol>
					</div>

				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-lg-12">
				<div class="card">
					<div class="card-body">
						<h4 class="card-title mb-4">Create New Role</h4>
						<form   method="post" action="{{ route('roles.store') }}">
						@csrf
						<div class="pt-20">
							<div class="form-group">
								<label for="name" class="card-title">{{ __('Role Name') }}</label>
								<input type="text" required class="form-control" name="name" placeholder="Enter role name">
							</div>
							<div class="row">
								<div class="col-sm-12">
									<!-- <div class="custom-control custom-checkbox">
										<input type="checkbox" class="custom-control-input checkAll" id="selectAll">
										<label class="custom-control-label checkAll" for="selectAll">{{ __('Permissions') }}</label>
									</div> -->
									<h4 class="card-title mt-4"> Permissions </h4>
									<hr style="margin-top: 0rem!important;">
									@php $i = 1; @endphp
									@foreach ($permission_groups as $group)
										<div class="row">
											<div class="col-3">
												<div class="form-check">
													<input type="checkbox" class="form-check-input" id="{{ $i }}Management" value="{{ $group->group_name }}" onclick="checkPermissionByGroup('role-{{ $i }}-management-checkbox', this)">
													<label class="form-check-label" for="checkPermission">{{ $group->group_name }}</label>
												</div>
											</div>
											<div class="col-9 role-{{ $i }}-management-checkbox">
												@php
													$permissions = App\Models\User::getpermissionsByGroupName($group->group_name);
													$j = 1;
												@endphp
												@foreach ($permissions as $permission)
													<div class="form-check">
										
														<input type="checkbox" class="form-check-input" name="permissions[]" id="checkPermission{{ $permission->id }}" value="{{ $permission->name }}">
														<label class="form-check-label" for="checkPermission{{ $permission->id }}">{{ $permission->name }}</label>
													</div>
													@php  $j++; @endphp
												@endforeach
												<br>
											</div>
										</div>
										@php  $i++; @endphp
									@endforeach
								</div>
							</div>	
						</div>
						<div class="row">
							<div class="col-lg-10">
								<button type="submit" class="btn btn-primary">Create Role</button>
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



