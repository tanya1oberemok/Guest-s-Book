<?php

namespace App\Http\Controllers;

use App\Models\Group;
use App\Models\User;
use Illuminate\Http\Request;

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
        $users = User::all();

        return view('home',['users' => $users]);
    }

    public function create()
    {
        $groups = Group::all();

        return view('users.create_users', ['groups' => $groups]);
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|max:255',
            'email' => 'required',
            'password' => 'required',
            'group_id' => 'required',
            'avatar' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $imageName = $request->avatar->getClientOriginalName();
        $request->file('avatar')->move('images', $imageName);
        $validatedData['avatar'] = $imageName;

        User::create($validatedData);

        return redirect()->route('home');
    }

    public function show(User $user)
    {
        $groups = Group::all();
        return view('users.update_users', [
            'user' => $user,
            'groups' => $groups
        ]);
    }

    public function edit(Request $request, User $user)
    {
        $user->update($request->all());

        return redirect()->route('home');
    }
}
