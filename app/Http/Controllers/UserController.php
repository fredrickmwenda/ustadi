<?php

namespace App\Http\Controllers;

use App\Models\Cordinator;
use App\Models\Location;
use App\Models\Matron;
use App\Models\Mentor;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::all();
        $roles = Role::all();
        return view('users.index', compact('users', 'roles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $roles = Role::all();
        return view('users.create', compact('roles'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'phone' =>  $request->phone != null ? 'unique:users|max:100' : '',
            'password' => 'required|string|min:6|confirmed',
            'role_id' => 'required|integer|exists:roles,id',
        ]);

        if($request->role_id == 1){
            $role = "admin";

        }
        else if($request->role_id == 2){
            $role = "mentor";
        }
        else if($request->role_id == 3){
            $role = "coordinator";
        }
        else if($request->role_id == 4){
            $role = "matron";
        }
        else{
            return redirect()->back()->with('message', 'The Role Name of the User hasnt been Set');
        }

        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->phone = $request->phone;
        $user->password = Hash::make($request->password);
        $user->role= $role;
        $user->role_id = $request->role_id;

        $user->save();
        //get thre role of the user
        $role = Role::find($request->role_id);
        $user->assignRole($role->name);

        $created_user = User::where('email', $request->email)->first();

        if($role == 'matron'){          
            Matron::create([
                'user_id' => $created_user->id,
                'school_id' => $request->school_id,
            ]);
        }
        if($role == 'mentor'){
            Mentor::create([
                'user_id' => $created_user->id,
                'location_id' => $request->location,
                'status' => 'pending',
                'approval_status' => 'pending',
            ]);
           
        }

        if($role == 'coordinator'){
            Cordinator::create([
                'user_id' => $created_user->id,
            ]);       
        }
        return redirect()->route('users.index')->with('success', 'User created successfully');
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
        $user = User::find($id);
        $roles = Role::all();
        return view('users.edit', compact('user', 'roles'));
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
        $this->validate($request, [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,'.$id,
            'phone' => 'sometimes|unique:users, phone,'.$id,
        ]);

        $user = User::find($id);
        $user->first_name = $request->first_name;
        $user->email = $request->email;
        if($request->password) {
            $user->password = Hash::make($request->password);
        }
        $user->phone = $request->phone;

        //detach all  user previous roles and assign new roles
        $user->roles()->detach();
        $role = Role::find($request->role_id);
        // dd($request->role_id);
        $user->assignRole($role->name);
    
        $user->role = $role->name;

        $user->role_id = $request->role_id;

        $user->save();
        
        return redirect()->route('users.index')->with('success', 'User updated successfully!');
    }

    public function profile()
    {
        $user = Auth::user();
        $locations = Location::all();
        return view('users.profile', compact('user', 'locations'));
    }

    public function update_profile(Request $request)
    {
        // dd($request->all());
        $this->validate($request, [
            'name' => 'sometimes|string|max:255',
            'email' => 'sometimes|string|email|max:255|unique:users,email,'.Auth::user()->id,
            'phone' => 'sometimes|unique:users,phone,'.Auth::user()->id,
            
        ]);
        // dd($request->all());
        $user = User::find(Auth::user()->id);
        $user->name = $request->name;
        $user->email = $request->email;
        $user->phone = $request->phone;
        // if($request->password) {
        //     $user->password = Hash::make($request->password);
        // }

        if ($request->hasFile('profile_picture')) {
            $image = $request->file('profile_picture');
            $name = time().'.'.$image->getClientOriginalExtension();
            //save image to public folder
            $destinationPath = public_path('/assets/images/profile');
            $image->move($destinationPath, $name);
            //check if there is an old image
            if (!empty(Auth::user()->avatar)) {
                //delete old image
                $old_image = public_path('/assets/images/profile/'.Auth::user()->avatar);
                if (file_exists($old_image)) {
                    unlink($old_image);
                }

            }
 

            $user->profile_picture= $name;
        }
        $user->save();
        return redirect()->route('profile')->with('success', 'Profile updated successfully!');
    }

    public function changePassword(Request $request)
    {
      
      $this->validate($request, [
        'old_password' => 'required',
        'new_password' => 'required|min:6',
      ]);
  
      $user = User::find(Auth::user()->id);
      if (Hash::check($request->old_password, $user->password)) {
        # code...
        $user->password = Hash::make($request->new_password);
        $user->save();
        //return redirect()->back()->with('success', 'Password changed successfully.');
        return response()->json(['success' => 'Password changed successfully.']);
      } else {
        return response()->json(['error' => 'Old password is incorrect.']);
      }
  
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
