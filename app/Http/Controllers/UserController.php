<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        // $allUser = User::all();
        // $allUser = User::paginate(10);
        //$allUser = User::with('profile')->paginate(10);
        // dd($allUser);
        return "<h1>admin</h1>";
        //return view('admin.dashboard');
    }
}
