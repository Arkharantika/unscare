<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Models\UserData;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $Role = Auth::user()->role;
        $Check = UserData::where('id_user',Auth::user()->id)->first();

        if($Check == null){
            $user = Auth::user();        
        return view('dataawal', compact('user'));
        }

        $user = Auth::user();
        $complete = UserData::where('id_user',$user->id)->get()->first();
        return view('home', compact('complete','user'));
    }
}
