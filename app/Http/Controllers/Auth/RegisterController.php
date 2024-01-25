<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
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
            'birthday' => ['required', 'date'],
            'last_name' => ['required', 'string', 'max:255'],
            'phone' => ['required', 'string', 'max:10'],
            'email_confirmation' => ['required', 'string', 'email', 'max:255', 'same:email'],
            'password_confirmation' => ['required', 'string', 'min:8', 'same:password'],
            'dni' => ['required', 'string', 'max:9'],
            'address' => ['required', 'string', 'max:255'],
            'postal_code' => ['required', 'string', 'max:5'],
            'username' => ['required', 'string', 'max:255'],
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
            'nombre' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'fecha_nacimiento' => $data['birthday'],
            'apellidos' => $data['last_name'],
            'telefono' => $data['phone'],
            'dni' => $data['dni'],
            'direccion' => $data['address'],
            'codigo_postal' => $data['postal_code'],
            'usuario' => $data['username'],            
            
        ]);
    }
}
