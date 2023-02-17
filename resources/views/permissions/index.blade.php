
@extends('layouts.app')


@section('content')
<div class="page-content">
	<div class="container-fluid">
	    <div class="row">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                    <h4 class="mb-sm-0 font-size-18">Permissions List</h4>

                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="javascript: void(0);">Permissions</a></li>
                            <li class="breadcrumb-item active">Permissions List</li>
                        </ol>
                    </div>

                </div>
            </div>
        </div>
        <!-- end page title -->

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <div class="row mb-2">
                            <div class="col-sm-4">
                                <div class="search-box me-2 mb-2 d-inline-block">
                                    <div class="position-relative">
                                        <input type="text" class="form-control" placeholder="Search...">
                                        <i class="bx bx-search-alt search-icon"></i>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-8">
                                <div class="text-sm-end">
									@can('permission.create')
                                    <a href="{{ route('permissions.create') }}" class="btn btn-success btn-rounded waves-effect waves-light mb-2 me-2"><i class="mdi mdi-plus me-1"></i> Add New Permission</a>
									@endcan
                                </div>
                            </div><!-- end col-->
                        </div>
						<div class="pt-20">
							<div class="row">
								<div class="col-sm-12">
									<!-- <div class="custom-control custom-checkbox">
										<input type="checkbox" class="custom-control-input checkAll" id="selectAll">
										<label class="custom-control-label checkAll" for="selectAll">{{ __('Permissions') }}</label>
									</div> -->
									<h4 class="card-title mt-4"> Permissions </h4>
									<hr style="margin-top: 0rem!important;">
									@php 
									$i = 1;
									@endphp
									@foreach ($permission_groups as $group)
										<div class="row">
											<div class="col-3">
												<div class="form-check">
													<!-- <input type="checkbox" class="form-check-input" id="{{ $i }}Management" value="{{ $group->group_name }}" onclick="checkPermissionByGroup('role-{{ $i }}-management-checkbox', this)"> -->
													<label class="form-check-label" for="checkPermission" style="font-size: 18px;">{{ $group->group_name }}</label>
												</div>
											</div>
											<div class="col-9 role-{{ $i }}-management-checkbox">
												@php
													$permissions = App\Models\User::getpermissionsByGroupName($group->group_name);
													$j = 1;
												@endphp
												@foreach ($permissions as $permission)
													<div class="form-check">
										
														<!-- <input type="checkbox" class="form-check-input" name="permissions[]" id="checkPermission{{ $permission->id }}" value="{{ $permission->name }}"> -->
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
					</div>
				</div>
			</div>
		</div> 
	</div> 
</div>
@endsection



