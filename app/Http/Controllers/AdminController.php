<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;

class AdminController extends Controller
{
    public function logout(){
        Auth::logout();
        return Redirect()->route('login')->with('success', 'Admin Logout Successfully');
    }
}
