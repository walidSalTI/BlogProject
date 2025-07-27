<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
class AuthController extends Controller
{
    public function showLogin(){
        if (Auth::check()) {    
        return redirect()->route('posts.index');
    }
        return view('login');
    }
    public function authLogin(Request $request){
        $credentials = $request->validate([
            'email'=> 'required|email',
            'password'=> 'required|min:8'
        ]);
        if(Auth::attempt($credentials)){
            $request->session()->regenerate();
            return redirect()->intended('posts.index');
        }
        return back();
    }
    public function showRegister(){
        return view('register');
    }
    public function storeRegister(Request $request){
            $request->validate([
            'name'=> 'required',
            'email'=>'required|email|unique:users,email',
            'password'=>'required|confirmed|min:8',
        ]);
        $user = User::create([
            'name'=> $request->name,
            'email'=> $request->email,
            'password'=> Hash::make($request->password),
        ]);
        $user->profile()->create([
            'bio'=>'default bio',
            'posts'=>0,
        ]);
        return redirect()->route('login');
    }
}
