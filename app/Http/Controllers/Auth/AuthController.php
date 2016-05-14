<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Admin;
use Validator;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\ThrottlesLogins;
use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;

class AuthController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Registration & Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users, as well as the
    | authentication of existing users. By default, this controller uses
    | a simple trait to add these behaviors. Why don't you explore it?
    |
    */

    use AuthenticatesAndRegistersUsers, ThrottlesLogins;

    /**
     * Where to redirect users after login / registration.
     *
     * @var string
     */
    protected $redirectTo = '/';

    /**
     * Create a new authentication controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware($this->guestMiddleware(), ['except' => 'logout']);
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
            'name' => 'required|max:255',
            'email' => 'required|email|max:255|unique:users',
            'password' => 'required|min:6|confirmed',
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return User
     */
    protected function create(array $data)
    {
//        return User::create([
//            'name' => $data['name'],
//            'email' => $data['email'],
//            'user_group' => $data['user_group'],
//            'user_group_description' => $data['user_group_description'],
//            'password' => bcrypt($data['password']),
//        ]);

        $user = new User([
            'name' => $data['name'],
            'email' => $data['email'],
            'user_group' => $data['user_group'],
            'user_group_description' => $data['user_group_description'],
            'password' => bcrypt($data['password']),
        ]);

        $user->save();

        $admin = new Admin([
            'user_id' => $user->id,
            'nama_admin' => $user->name,
        ]);

        $admin->save();


        return $user;
        return $admin;


//        $user = User::create([
//            'name' => $data['name'],
//            'email' => $data['email'],
//            'user_group' => $data['user_group'],
//            'user_group_description' => $data['user_group_description'],
//            'password' => bcrypt($data['password']),
//        ]);
//
//
//        return $user;
    }
}
