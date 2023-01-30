<?php

namespace App\Http\Controllers;

use App\Models\KPI;
use App\Models\OrganizationEntry;
use App\Models\OrganizationGoal;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

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



        $totalCallsMadeMonth = 0;
        $totalPitchesMadeMonth = 0;

        $totalCallsMade = array(0);
        $totalPitchesMade = array(0);
        $index = 0;
        foreach ($organizationGoals as $goal) {
            // $entries = $entries->concat(); //Fetch all entries for a goal

            foreach ($goal->entries as $entry) { //fetch all calls made in entries

                $totalCallsMade[$index] = $totalCallsMade[$index] + $entry->calls;
                $totalPitchesMade[$index] = $totalPitchesMade[$index] + $entry->pitches;
            }
            $index = $index + 1;
        }

        // Fetch month-based
        $monthNum = Carbon::now()->month;
        $yearNum = Carbon::now()->year;

        $entriesInMonth = OrganizationEntry::where(DB::raw('MONTH(performed_on)'), $monthNum)->where(DB::raw('YEAR(performed_on)'), $yearNum)->get();
        // Fetch monthly data (current month)
        foreach ($entriesInMonth as $em) {
            $totalCallsMadeMonth += $em->calls;
            $totalPitchesMadeMonth += $em->pitches;
        }

        $cards = [
            'entries' => $entries,
            'totalCallsMadeMonth' => $totalCallsMadeMonth,
            'totalPitchesMadeMonth' => $totalPitchesMadeMonth,
            'goals' => $organizationGoals,
            'totalCallsMade' => $totalCallsMade,
            'totalPitchesMade' => $totalPitchesMade
        ];
        // dd($cards);
        return $cards;
        // dd($entries, $organizationGoals[count($organizationGoals) - 1], $totalCallsMade);
    }
}