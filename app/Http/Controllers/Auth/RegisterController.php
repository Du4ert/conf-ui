<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

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
    protected function redirectTo()
    {
        return route('home');
    }

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
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
            'first_name' => 'required|string|min:2',
            'first_name_en' => 'required|string|min:2',
            'last_name' => 'required|string|min:2',
            'last_name_en' => 'required|string|min:2',
            'middle_name' => 'nullable|string|max:100',
            'middle_name_en' => 'nullable|string|max:100',
            'organization_title' => 'required|string|max:300',
            'organization_title' => 'required|string|max:300',            
            'job_title' => 'nullable|string|max:300',
            'job_title_en' => 'nullable|string|max:300',
            'rank_title' => 'nullable|string|max:300',
            'rank_title_en' => 'nullable|string|max:300',
            'pay_status' => 'nullable|boolean',
            'accepted_status' => 'nullable|boolean',
            'vavilov_article' => 'nullable|boolean',
            'school_participation' => 'nullable|boolean',
            'young_scientist' => 'nullable|boolean',
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
        return User::create([
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'first_name' => $data['first_name'],
            'first_name_en' => $data['first_name_en'],
            'last_name' => $data['last_name'],
            'last_name_en' => $data['last_name_en'],
            'middle_name' => $data['middle_name'],
            'middle_name_en' => $data['middle_name_en'],
            'organization_title' => $data['organization_title'],
            'organization_title_en' => $data['organization_title_en'],
            'job_title' => $data['job_title'] ?? null,
            'job_title_en' => $data['job_title_en'] ?? null,
            'rank_title' => $data['rank_title'] ?? null,
            'rank_title_en' => $data['rank_title_en'] ?? null,
            'pay_status' => $data['pay_status'] ?? false,
            'accepted_status' => $data['accepted_status'] ?? false,
            'vavilov_article' => $data['vavilov_article'] ?? false,
            'school_participation' => $data['school_participation'] ?? false,
            'young_scientist' => $data['young_scientist'] ?? false,

        ]);
    }
}
