<?php

namespace App\Http\Controllers;

use App\Models\KPI;
use App\Models\OrganizationGoal;
use App\Models\Team;
use App\Models\User;
use Carbon\Carbon;
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
    public function viewGoals()
    {
        $kpis = KPI::all();
        $goals = OrganizationGoal::paginate(10);
        return view('admin.dashboard.goals', compact('kpis', 'goals'));
    }
    public function addGoals(Request $request)
    {
        // dd($request);
        $goals = new OrganizationGoal();
        $goals->name = $request->title;
        $date = Carbon::createFromFormat('d M, Y', $request->deadline)->format('Y-m-d');
        $goals->deadline = $date;
        $goals->created_by = $request->created_by;
        $goals->description = $request->description;
        $goals->k_p_i_id = $request->kpi_id;
        $goals->calls = $request->org_calls;
        $goals->organizations_reached = $request->org_pitches;
        $goals->incentive = $request->incentive;
        $goals->save();
        return redirect()->back();
    }
}