<?php

namespace App\Http\Controllers;

use App\Team;
use Illuminate\Http\Request;
use App\Http\Requests\CreateTeam;
use App\Http\Requests\EditTeam;
use Illuminate\Support\Facades\Auth;

class TeamController extends Controller
{
    public function showCreateForm()
    {
        return view('teams/create');
    }

    public function create(CreateTeam $request)
    {
        $team = new Team();
        $team->title = $request->title;
        Auth::user()->teams()->save($team);
        return redirect()->route('home');
    }

    public function showEditForm()
    {
        return view('teams/edit');
    }

    public function edit(EditTeam $request)
    {
        $team = Auth::user()->teams()->first();
        $team->title = $request->title;
        $team->save();
        return redirect()->route('home');
    }
}
