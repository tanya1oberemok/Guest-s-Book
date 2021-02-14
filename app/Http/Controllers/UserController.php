<?php

namespace App\Http\Controllers;

use App\Models\User;

class UserController extends Controller
{

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $users = User::all();

        return view('welcome',['users' => $users]);
    }
}
