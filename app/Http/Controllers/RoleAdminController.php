<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;

class RoleAdminController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        return view('home', compact('user'));
    }
}
