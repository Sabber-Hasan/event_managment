<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function index()
    {
        // $allUser = User::all();
        // $allUser = User::paginate(10);
        //$allUser = User::with('profile')->paginate(10);
        // dd($allUser);
        //return "<h1>admin</h1>";
        if (Auth::user()->role === 'admin'){
            return view('admin.dashboard');
        }
        if (Auth::user()->role === 'user'){
            return view('user.dashboard');
        }
        
    }
}
