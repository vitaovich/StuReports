<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;

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
     * Where to redirect users after login / registration.
     *
     * @var string
     */
    protected $redirectTo = '/home';

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
            'student_id' => 'exists:users',
            'email' => 'required|email|max:255|unique:users|isnotset:' . User::where('student_id', '=', $data['student_id'])->first()->id,
            'password' => 'required|min:6|confirmed|isnotset:' . User::where('student_id', '=', $data['student_id'])->first()->id,
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
        $user = User::where('student_id', '=', $data['student_id'])->first();
        $name = $user->name;
        $id = $user->id;
        $group_id = $user->group_id;
        $course_id = $user->course_id;
        $role = $user->role;
        $user->delete();
        return User::create([
            'name' => $name,
            'student_id' => $data['student_id'],
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
            'group_id' => $group_id,
            'course_id' => $course_id,
            'role' => $role,
            'id' => $id
        ]);
    }
}
