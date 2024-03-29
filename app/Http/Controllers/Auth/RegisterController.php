<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Matron;
use App\Models\Mentor;
use App\Providers\RouteServiceProvider;
use App\Models\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Spatie\Permission\Models\Role;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\User
     */
    protected function create(array $data)
    {
        // dd($data);
        //check if users _role is matron, if they are then create them in the matrons table and set their role to matron
        // User::create([
        //     'name' => $data['name'],
        //     'email' => $data['email'],
        //     'password' => Hash::make($data['password']),
        //     'role' => $data['role']
        // ]);
        $user = new User();
        $user->name = $data['name'];
        // dd($user->name);
        $user->email = $data['email'];
        
        $user->role = $data['role'];
        if($data['role'] == 'mentor'){
            $user->role_id = 2;
        }
        elseif($data['role'] == 'matron'){
            $user->role_id = 4;
        }
       
        $user->password = Hash::make($data['password']);
        $user->save();

        //get the user id of the user that was just created
        $user = User::where('email', $data['email'])->first();
        $role = Role::find($user->role_id);
        $user->assignRole($role->name);
        if($data['role'] == 'matron'){
             
            Matron::create([
                'user_id' => $user->id,
                'school_id' => $data['school_id'],
            ]);

            // return $matron;
        }
        if($data['role'] == 'mentor'){
            Mentor::create([
                'user_id' => $user->id,
                'location_id' => $data['location'],
                'status' => 'pending',
                'approval_status' => 'pending',
            ]);
           
        }

        return $user;



    }
}
