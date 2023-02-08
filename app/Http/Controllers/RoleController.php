<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $roles = Role::all();
        return view('roles.index', compact('roles'));
   
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $permisions = Permission::all();
        $permission_groups = User::getPermissionGroup();
        return view('roles.create', compact('permisions', 'permission_groups'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|unique:roles|max:100',
        ]);

        // $request->validate([
        //     'name' => 'unique:roles|max:100',
        // ]);
        //dd($request->name);
        $role = Role::create(['name' => $request->name]);
        $permissions = $request->input('permissions');
        
        //store permission id
        // foreach ($permissions as $permission) {
        //     $role->givePermissionTo($permission);
        //     //assign permission to role
        //     $permission = Permission::findById($permission);
        //     $permission->assignRole($role);
        //     //sync permission to role
        //     $role->syncPermissions($permissions);
        // }
        
        if (!empty($permissions)) {
            $role->syncPermissions($permissions);
        }

        //redirect to role list with success message
        return redirect()->route('roles.index')
            ->with('success', 'Role created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $role = Role::find($id);
        $permisions = Permission::all();
 
        $permission_groups = User::getPermissionGroup();
        // foreach ($permission_groups as $key => $value) {
        //     dd($value->group_name);
        // }
        // foreach ($permission_groups as $key => $value) {
        //     dd($value->group_name);
        //     $permission_groups[$key]['permissions'] = $role->permissions()->where('group', $value['group'])->get();

        // }
        return view('roles.edit', compact('role', 'permisions', 'permission_groups'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|max:100|unique:roles,name,' . $id
        ],[
            'name.requried' => 'Please give a role name'
        ]);
        $role = Role::find($id);
        $role->name = $request->name;
        $role->save();
        $permissions = $request->input('permissions');
        if (!empty($permissions)) {
            $role->syncPermissions($permissions);
        }
        return redirect()->route('roles.index')
        ->with('success', 'Role created successfully.');
       
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $role = Role::find($id);
        // dd($role);
        $role->permissions()->detach();
        //delete role
        $role->delete();

        return redirect()->route('roles.index')
        ->with('success', 'Role deleted successfully.');
    }

    //Delete 
}
