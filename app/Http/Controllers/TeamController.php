<?php

namespace App\Http\Controllers;

use App\Models\Team;
use Illuminate\Http\Request;

class TeamController extends Controller
{
    public function store(Request $request)
    {
        // dd($request);
        $team = new Team();
        $team->name = $request->name;
        // $team->members_count = $request->members;
        $team->save();
        return redirect('admin/teams');
    }
}