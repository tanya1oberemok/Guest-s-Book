<?php

namespace App\Http\Controllers;

use App\Models\Group;
use Illuminate\Http\Request;

class GroupController extends Controller
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
        $groups = Group::all();

        return view('groups.groups',['groups' => $groups]);
    }

    public function create()
    {
        $groups = Group::all();
        return view('groups.create_groups', ['groups' => $groups]);
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|max:255',
        ]);
        Group::create($validatedData);

        return redirect()->route('groups');
    }

    public function show(Group $group)
    {
        return view('groups.update_groups', ['group' => $group]);
    }

    public function edit(Request $request, Group $group)
    {
        $validatedData = $request->validate([
            'name' => 'required|max:255',
        ]);
        $group->update($validatedData);

        return redirect()->route('groups');
    }
}
