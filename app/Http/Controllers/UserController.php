<?php

namespace App\Http\Controllers;

use App\Models\Gender;
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rules\Password;

class UserController extends Controller
{
    public function showProfile(){

        $user = Auth::user();
        $genders = Gender::all();

        return view('profile')->with(compact('user','genders'));
    }

    public function saveProfile(Request $request){

        $userid = Auth::id();
        $user = User::find($userid);

        $request->validate([
            'first_name' => 'required|max:25|alpha',
            'last_name' => 'required|max:25|alpha',
            'email' => 'required|email',
            'gender' => 'required',
            'display_picture' => 'mimes:png,jpg,jpeg',
        ]);
        if($request->password){
            $request->validate([
                'password' => ['required',
                            'confirmed',
                            'alpha_num',
                            Password::min(8)->numbers()]
            ]);
            $user->password = bcrypt($request->password);
        }

        $user->first_name = $request->first_name;
        $user->last_name = $request->last_name;
        $user->email = $request->email;
        $user->gender_id = $request->gender;

        if($request->display_picture){
            $user->display_picture = $request->file('display_picture')->getClientOriginalName();
            Storage::putFileAs('/public/images', $request->display_picture, $request->file('display_picture')->getClientOriginalName());
        }

        $user->save();

        return view('saved');
    }


    public function showAdmin(){

        $users = User::all();

        return view('admin')->with(compact('users'));
    }

    public function showUpdate(Request $request){

        $user = User::find($request->id);
        $roles = Role::all();

        return view('update')->with(compact('user','roles'));
    }

    public function update(Request $request){
        $user = User::find($request->id);
        $user->role_id = $request->role;
        $user->save();

        return redirect('/admin');
    }

    public function delete(Request $request){

        $user = User::find($request->id);
        $user->delete();

        return back();
    }
}
