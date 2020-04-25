<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Providers\RouteServiceProvider;
use App\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Yajra\DataTables\DataTables;

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
        $this->middleware('auth');
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
     * @return \App\User
     */
    protected function create(array $data)
    {
            return User::create([
                'name' => $data['name'],
                'email' => $data['email'],
                'password' => Hash::make($data['password']),
                'first_name' => $data['first_name'],
                'last_name' => $data['last_name'],
                'father_name' => $data['father_name'],
                'address' => $data['address'],
                'father_job' => $data['father_job'],
                'mobile_number' => $data['mobile_number'],
                'father_mobile_number' => $data['father_mobile_number'],
                'registery_date' => date("Y-m-d h:i:s"),
                'expiration_date' => null ,
                'grade' => $data['grade'] ,
                'ban_status' => 1 ,
                'user_type' => $data['user_type']
            ]);
    }

    protected function User_list(){
            return view('user_list') ;
    }

    protected function any_data(){
        return DataTables::of(User::where('user_type','admin')->orWhere('user_type','user'))->make(true) ;
    }

    protected function User_detail(User $user){
        return view('user_detail' , compact('user')) ;
    }

    public function user_delete(User $user){
        $user->delete() ;
        return redirect('/user_list') ;
    }


}
