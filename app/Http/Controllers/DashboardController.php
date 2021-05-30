<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class DashboardController extends Controller
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
        $user_id = auth()->user()->id; //Get the ID the Authenticated user
        $user = User::find($user_id);
        // dd($user);
        //$user->listing : accessing the relationship
        return view('dashboard')->with('listings',$user->listing);
    }
}
