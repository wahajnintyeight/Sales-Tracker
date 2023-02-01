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
        $organizationGoals = $kpi->organizationGoal->where('is_completed', 0); //Fetch all goals for Organization
        // dd($organizationGoals);
        $entries = collect();


        $goalStartDate = 0;
        $goalEndDate = 0;

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
            $goalStartDate = $goal->goal_start_date;
            $goalEndDate = $goal->deadline;
            $index = $index + 1;
        }

        $current = Carbon::createFromFormat('Y-m-d', $goalStartDate);
        $goalEndDate = Carbon::createFromFormat('Y-m-d', $goalEndDate);
        // dd($current);
        $goalIndex = 0;
        $goalDateRange = array($current); //, count($dates), 0);
        while ($current <= $goalEndDate) {
            $dates[] = clone $current;
            $current->addDay();
            $goalDateRange[$goalIndex] = $current->format('d-m');
            $goalIndex++;
        }
        // dd($dates[2]->day);
        // print_r($goalDateRange);
        // dd($goalDateRange);
        // dd($dates);
        // Fetch month-based
        $monthNum = Carbon::now()->month;
        $yearNum = Carbon::now()->year;

        // Calls in current month
        $callsEachDay = array(0);
        $callsDates = array(0);
        $callsIndex = 0;

        // Pitches in current month
        $pitchesEachDay = array(0);
        $pitchesDates = array(0);
        $pitchesIndex = 0;


        // $i = 0;
        // $entriesInMonth = OrganizationEntry::where(DB::raw('MONTH(performed_on)'), $monthNum)->where(DB::raw('YEAR(performed_on)'), $yearNum)->get();
        // $entriesInMonth = OrganizationEntry::where(DB::raw('MONTH(performed_on)'), $monthNum)->where(DB::raw('YEAR(performed_on)'), $yearNum)->groupBy('performed_on')->selectRaw('performed_on, sum(calls) as calls, sum(pitches) as pitches')->get();
        $entriesInMonth = OrganizationEntry::groupBy('performed_on')->selectRaw('performed_on, sum(calls) as calls, sum(pitches) as pitches')->get();
        // dd($entriesInMonth);
        // Fetch monthly data (current month)
        foreach ($entriesInMonth as $em) {
            $totalCallsMadeMonth += $em->calls;
            $totalPitchesMadeMonth += $em->pitches;


            $callsEachDay[$callsIndex] = $em->calls;
            $callsDates[$callsIndex] = $em->performed_on;


            $callsIndex++;

            // Pitches
            $pitchesEachDay[$pitchesIndex] = $em->pitches;
            $pitchesDates[$pitchesIndex] = $em->performed_on;
            $pitchesIndex++;
        }

        $dateRangeInd = 0;

        $callsPerDays = array_fill(0, count($goalDateRange), 0);
        $pitchesPerDays = array_fill(0, count($goalDateRange), 0);

        $entries = [];
        // dd($dates[0]->day);
        foreach ($dates as $ind => $date) {
            // $entries[$date->format('Y-m-d')] = 0;
            foreach ($callsDates as $key => $loggedEntry) {
                if ($date->isSameDay($loggedEntry)) {
                    $callsPerDays[$ind] = $callsEachDay[$key];
                } else {

                }
            }
            //pitches
            // dd($pitchesDates);
            foreach ($pitchesDates as $key2 => $loggedEntry) {
                if ($date->isSameDay($loggedEntry)) {
                    $pitchesPerDays[$ind] = $pitchesEachDay[$key2];
                } else {

                }
            }
        }
        // dd($callsPerDays,$goalDateRange);
        if (count($entriesInMonth) > 0) {
            $avgEntr = ($totalCallsMadeMonth + $totalPitchesMadeMonth) / count($entriesInMonth);
            // dd($entriesInMonth);
        } else {
            $avgEntr = 0;
        }
        // dd($goalDateRange);
        $cards = [
            'entries' => $entries,
            'avgEntries' => $avgEntr,
            'totalCallsMadeMonth' => $totalCallsMadeMonth,
            'callsEachDay' => $callsPerDays,
            'callsDates' => $goalDateRange,
            'pitchesEachDay' => $pitchesPerDays,
            'pitchesDates' => $goalDateRange,
            'totalPitchesMadeMonth' => $totalPitchesMadeMonth,
            'goals' => $organizationGoals,
            'recentGoal' => $organizationGoals[count($organizationGoals) - 1],
            'totalCallsMade' => $totalCallsMade,
            'totalPitchesMade' => $totalPitchesMade
        ];
        // dd($cards);
        return $cards;
        // dd($entries, $organizationGoals[count($organizationGoals) - 1], $totalCallsMade);
    }
}