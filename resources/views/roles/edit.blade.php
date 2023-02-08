
@extends('layouts.app')


@section('content')
<div class="page-content">
	<div class="container-fluid">
		<div class="row">
			<div class="col-12">
				<div class="page-title-box d-sm-flex align-items-center justify-content-between">
					<h4 class="mb-sm-0 font-size-18">Edit Role</h4>

					<div class="page-title-right">
						<ol class="breadcrumb m-0">
							<li class="breadcrumb-item"><a href="{{route('roles.index')}}">Roles & Permissions</a></li>
							<li class="breadcrumb-item active">Edit Role</li>
						</ol>
					</div>

				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-lg-12">
				<div class="card">
					<div class="card-body">
						<h4 class="card-title mb-4">Edit  Role</h4>
						<form   method="post" action="{{ route('roles.update', $role->id) }}" enctype="multipart/form-data">
							
							@csrf
							<div class="pt-20">
						<div class="form-group">
							<label for="name">{{ __('Role Name') }}</label>
							<input type="text" required class="form-control" name="name" placeholder="Enter role name" value="{{ $role->name }}">
						</div>
						<div class="row">
							<div class="col-sm-12">
								<div class="custom-control custom-checkbox">
										<input type="checkbox" class="custom-control-input checkAll" id="selectAll">
										<label class="custom-control-label checkAll" for="selectAll">{{ __('Permissions') }}</label>
								</div>
								<hr>
								@php $i = 1; @endphp
								@foreach ($permission_groups as $group)
									<div class="row">
										@php
										   $group_name = $group->group_name;
											$permissions = App\Models\User::getpermissionsByGroupName($group_name);
											$j = 1;
										@endphp
										<div class="col-3">
											<div class="form-check">
												<input type="checkbox" class="form-check-input" id="{{ $i }}Management" value="{{ $group_name }}" onclick="checkPermissionByGroup('role-{{ $i }}-management-checkbox', this)" {{ App\Models\User::roleHasPermissions($role, $permissions) ? 'checked' : '' }}>
												<label class="form-check-label" for="checkPermission">{{ $group_name }}</label>
											</div>
										</div>
										<div class="col-9 role-{{ $i }}-management-checkbox">
											@foreach ($permissions as $permission)
												<div class="form-check">
													<input type="checkbox" class="form-check-input" onclick="checkSinglePermission('role-{{ $i }}-management-checkbox', '{{ $i }}Management', {{ count($permissions) }})" name="permissions[]" {{ $role->hasPermissionTo($permission->name) ? 'checked' : '' }} id="checkPermission{{ $permission->id }}" value="{{ $permission->name }}">
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
								<button type="submit" class="btn btn-primary">Update Role</button>
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


