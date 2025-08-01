<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
class ProfileController extends Controller
{
    public function index(){
        $user = auth()->user();
        $profile = $user->profile;
        return view('profile.index',compact('user','profile'));
    }
}
