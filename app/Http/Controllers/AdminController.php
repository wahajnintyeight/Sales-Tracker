<?php

namespace App\Http\Controllers;

use App\Models\Team;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{
    public function viewHome()
    {
        return view('admin.dashboard.index');
    }
    public function viewUsers()
    {
        $users = User::where('role_id', 0)->with('team')->paginate(10);
        // dd($users);
        $teams = Team::all();
        return view('admin.dashboard.users', compact('users', 'teams'));
    }
    public function viewTeams()
    {
        $teams = Team::paginate(10);
        return view('admin.dashboard.teams', compact('teams'));
    }
    public function addUserToTeam(Request $request)
    {
        // dd($request);
        $user = DB::table('users')
            ->where('id', $request->user_id)
            ->update(['team_id' => $request->team_id]);
        //  User::where('id', $request->user_id)->get();
        // dd($user[0]->team_id);
        // $user[0]->team_id = $request->team_id;
        // $user->update();
        return redirect('admin/teams');
    }
}