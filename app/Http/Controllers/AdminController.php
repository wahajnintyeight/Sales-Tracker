<?php

namespace App\Http\Controllers;

use App\Models\KPI;
use App\Models\OrganizationEntry;
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
        $mostCallsUser = OrganizationEntry::with('user')
            ->select('user_id', DB::raw('SUM(calls) as total_calls'))
            ->groupBy('user_id')
            ->orderByDesc('total_calls')
            ->first();
        $mostOrgReached = OrganizationEntry::with('user')
            ->select('user_id', DB::raw('SUM(organizations_reached) as org_reached'))
            ->groupBy('user_id')
            ->orderByDesc('org_reached')
            ->first();
        // dd($mostOrgReached);
        $fullName = $mostCallsUser->user->name;
        // dd($mostCallsUser);
        return view('admin.dashboard.index', compact('fullName', 'mostOrgReached'));
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

    public function deleteGoal(Request $req)
    {
        $goal = OrganizationGoal::find($req->input('goal_id'));
        if ($goal) {
            $goal->delete();
        } else {
            return redirect()->back()->with('error', 'Unable to Delete Goal');
        }
        return redirect()->back()->with('message', 'Goal Deleted Successfully');
    }
    public function viewGoals()
    {
        $kpis = KPI::all();
        $goals = OrganizationGoal::orderByDesc('created_at')->paginate(10);
        return view('admin.dashboard.goals', compact('kpis', 'goals'));
    }
    public function deleteTeam(Request $req)
    {
        $team = Team::find($req->input('team_id'));
        if ($team) {
            $team->delete();
        } else {
            return redirect()->back()->with('error', 'Unable to Delete Team');
        }
        return redirect()->back()->with('message', 'Team Deleted Successfully');
    }
    public function addGoals(Request $request)
    {
        // dd($request);
        $goals = new OrganizationGoal();
        $goals->name = $request->title;
        $date = Carbon::createFromFormat('d M, Y', $request->deadline)->format('Y-m-d');
        $goal_start_date = Carbon::createFromFormat('d M, Y', $request->org_goal_start_date)->format('Y-m-d');
        $goals->deadline = $date;
        $goals->created_by = $request->created_by;
        $goals->description = $request->description;
        $goals->k_p_i_id = $request->kpi_id;
        $goals->goal_start_date = $goal_start_date;
        $goals->calls = $request->org_calls == null ? 0 : $request->org_calls;
        $goals->pitches = $request->org_pitches == null ? 0 : $request->org_pitches;
        $goals->organizations_reached = $request->org_reached == null ? 0 : $request->org_reached;
        $goals->fixed_apt = $request->org_fixed_appointment == null ? 0 : $request->org_fixed_appointment;
        $goals->incentive = $request->incentive;
        $goals->save();
        return redirect()->back()->with('message', 'Goal added Successfully');
    }
}