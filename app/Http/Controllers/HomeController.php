<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Avatar;
use App\User;
use Auth;

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;

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
        return view('home');
    }

    public function profile($username)
    {
        $user = User::where('username', $username)->firstOrFail();

        $avatar = User::where('id', $user->id)->firstOrFail()->avatar;
        
        return view('profile', ["username"=>$username, "user"=>$user, "avatar"=>$avatar ]);
    }

    public function inbox()
    {
        return 1;
    }

}
