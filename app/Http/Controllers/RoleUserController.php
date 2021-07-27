<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;

class RoleUserController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        return view('home', compact('user'));
    }
}
