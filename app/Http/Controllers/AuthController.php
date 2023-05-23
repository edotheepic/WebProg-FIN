<?php

namespace App\Http\Controllers;

use App\Models\Gender;
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rules\Password;

class AuthController extends Controller
{
    public function showLogin(){
        return view('login');
    }

    public function showRegister(){
        $roles = Role::all();
        $genders = Gender::all();
        return view('register')->with(compact('roles','genders'));
    }

    public function login(Request $request){
        $validate = $request->validate([
            'email' => 'required',
            'password' => 'required'
        ]);

        if (Auth::attempt($validate)) {
            Session::put('loginsession', $validate);

            return redirect('/home');
        }
        return redirect()->back()->withErrors("Wrong Email/Password. Please Check Again.");
    }

    public function register(Request $request){
        $request->validate([
            'first_name' => 'required|max:25|alpha',
            'last_name' => 'required|max:25|alpha',
            'email' => 'required|email',
            'role' => 'required',
            'gender' => 'required',
            'display_picture' => 'required|mimes:png,jpg,jpeg',
            'password' => ['required',
                            'confirmed',
                            'alpha_num',
                            Password::min(8)->numbers()]
        ]);

        User::create([
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'email' => $request->email,
            'role_id' => $request->role,
            'gender_id' => $request->gender,
            'display_picture' => $request->file('display_picture')->getClientOriginalName(),
            'password' => bcrypt($request->password)
        ]);

        Storage::putFileAs('/public/images', $request->display_picture, $request->file('display_picture')->getClientOriginalName());

        return redirect('/login');
    }

    public function logout(){
        Auth::logout();
        Session::forget('loginsession');
        return view('logout');
    }
}
