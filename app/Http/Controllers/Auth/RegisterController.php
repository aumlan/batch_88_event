<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\Models\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Http\Request;
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
            'phone' => ['required'],
            'whatsapp' => ['required'],
            'school' => ['required'],
            'batch' => ['required'],
            'thana' => ['required'],
            'upazila' => ['required'],
            'picture' => ['required']

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
////        $request = request();
////
////        $profileImage = $request->file('picture');
//
//        if (request()->hasFile('picture')){
//            $file = request()->file('picture')->getClientOriginalName();
//            dd($file);
//            $nom_image = time();
//            $file->move(public_path().'/images/',$nom_image);
//        }
//
//        dd(request()->file('picture')->getClientOriginalName());
//
//        if (request()->hasFile('picture')){
//            $avatar = request()->file('picture');
//            dd($avatar);
//        }
//
//
//        $extension = $data->picture->getClientOriginalExtension();
//        $avatar_name  = time() . '.' . $extension;
//        $data->picture->move(base_path('images/users/'), $avatar_name);

        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'phone' => $data['phone'],
            'whatsapp' => $data['whatsapp'],
            'school' => $data['school'],
            'batch' => $data['batch'],
            'thana' => $data['thana'],
            'upazila' => $data['upazila'],
            'picture' => $data['picture'],
            'password' => Hash::make($data['password']),
        ]);
    }
}
