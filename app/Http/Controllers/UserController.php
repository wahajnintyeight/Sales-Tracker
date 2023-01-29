<?php

namespace App\Http\Controllers;

use App\Models\KPI;
use App\Models\OrganizationEntry;
use App\Models\OrganizationGoal;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function viewDashboard()
    {
        $cardInfo = $this->viewCardsInfo();
        return view('user.dashboard.index', compact('cardInfo'));
    }
    public function viewActivities()
    {
        $entries = OrganizationEntry::paginate(10);
        $goals = OrganizationGoal::all()->sortByDesc("id");
        $kpis = KPI::all();
        return view('user.dashboard.activities', compact('entries', 'kpis', 'goals'));
    }
    public function addEntry(Request $request)
    {
        // dd($request);
        $entries = new OrganizationEntry();
        $entries->calls = $request->org_calls;
        // $entries
        $entries->user_id = $request->user_id;
        $entries->pitches = $request->org_pitches;
        $entries->organization_goal_id = $request->goal_id;

        $entries->save();
        return redirect()->back();
    }
    public function viewCardsInfo()
    {
        // $goal = OrganizationGoal::all()->entries()->latest()->first();
        // $entries = OrganizationEntry::where('user_id', Auth::user()->id)->get();
        $kpi = KPI::find(1); //FETCH Organization KPI
        $organizationGoals = $kpi->organizationGoal; //Fetch all goals for Organization

        $entries = collect();

        $totalCallsMade = 0;
        $totalPitchesMade = 0;

        foreach ($organizationGoals as $goal) {
            $entries = $entries->concat($goal->entries); //Fetch all entries for a goal
        }
        foreach ($entries as $entry) { //fetch all calls made in entries
            $totalCallsMade = $totalCallsMade + $entry->calls;
            $totalPitchesMade = $totalPitchesMade + $entry->pitches;
        }
        $cards = [
            'entries' => $entries,
            'goal' => $organizationGoals[count($organizationGoals) - 1],
            'totalCallsMade' => $totalCallsMade,
            'totalPitchesMade' => $totalPitchesMade
        ];
        return $cards;
        // dd($entries, $organizationGoals[count($organizationGoals) - 1], $totalCallsMade);
    }
}