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
        // dd($cardInfo);
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
        $entries->pitches = $request->org_actual_appointments == null ? 0 : $request->org_actual_appointments;
        $entries->fixed_apt = $request->org_fixed_appointments == null ? 0 : $request->org_fixed_appointments;
        $entries->organizations_reached = $request->org_organizations_reached == null ? 0 : $request->org_organizations_reached;
        $entries->organization_goal_id = $request->goal_id;

        $entries->save();
        return redirect()->back();
    }

    public function addFUPEntry(Request $request)
    {
        // dd($request);
        $entries = new OrganizationEntry();
        $entries->calls = $request->org_calls;
        // $entries
        $entries->user_id = $request->user_id;
        $entries->is_fup = 1;
        $entries->organizations_reached = $request->org_pitches;
        $entries->organization_goal_id = $request->goal_id;

        $entries->save();
        return redirect()->back();
    }

    public function viewCardsInfo()
    {
        // $goal = OrganizationGoal::all()->entries()->latest()->first();
        // $entries = OrganizationEntry::where('user_id', Auth::user()->id)->get();
        $cards = [
            'entries' => [],
            'avgEntries' => 0,
            'totalCallsMadeMonth' => 0,
            'callsEachDay' => [0, 0],
            'callsDates' => [],
            'pitchesEachDay' => 0,
            'goalIDs' => [0],
            'pitchesDates' => [],
            'totalPitchesMadeMonth' => 0,
            'organizationsReachedEachDay' => 0,
            'goals' => [],
            'recentGoal' => 0,
            'totalCallsMade' => 0,
            'entryData' => [],
            'fupEntryData' => 0,
            'totalPitchesMade' => 0
        ];
        $kpi = KPI::find(1); //FETCH Organization KPI
        if ($kpi != null) { //If KPI exists 


            $organizationGoals = $kpi->organizationGoal->where('is_completed', 0); //Fetch all goals for Organization
            if (count($organizationGoals) > 0) { //if user has at least one goal 
                $entries = collect();
                $goalStartDate = 0;
                $goalEndDate = 0;
                // dd("hh");
                $totalCallsMadeMonth = 0;
                $totalPitchesMadeMonth = 0;

                $totalCallsMade = array(0);
                $totalPitchesMade = array(0);
                $index = 0;
                $entryData = OrganizationEntry::where('user_id', Auth::user()->id)->select('organization_goal_id', DB::raw('SUM(calls) as total_calls'), DB::raw('SUM(organizations_reached) as total_organizations_reached'), DB::raw('SUM(pitches) as total_pitches'), DB::raw('SUM(fixed_apt) as appointments_fixed'))
                    ->groupBy('organization_goal_id')
                    ->get();
                $fupEntryData = OrganizationEntry::where('is_fup', 1)->where('user_id', Auth::user()->id)->select('organization_goal_id', DB::raw('SUM(calls) as total_calls'), DB::raw('SUM(organizations_reached) as total_organizations_reached'), DB::raw('SUM(fixed_apt) as appointments_fixed'))
                    ->groupBy('organization_goal_id')
                    ->get();
                $goalIDs = array(0);
                if (count($entryData) > 0) {
                    foreach ($organizationGoals as $i => $goal) {
                        $goalStartDate = $goal->goal_start_date;
                        $goalEndDate = $goal->deadline;


                        $current = Carbon::createFromFormat('Y-m-d', $goalStartDate);
                        $goalEndDate = Carbon::createFromFormat('Y-m-d', $goalEndDate);
                        // dd($current);
                        $goalIndex = 0;
                        // $goalDateRange = array($current); //, count($dates), 0);
                        while ($current <= $goalEndDate) {
                            $dates[$i][] = clone $current;
                            $goalDateRange[$i][$goalIndex] = $current->format('d-m');
                            $current->addDay();
                            $goalIndex++;
                        }

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



                        // Organizations in current month
                        $organizationsReachedEachDay = array(0);
                        $organizationsReachedDates = array(0);
                        $orgRchdIndex = 0;

                        // Appointments fixed in current month
                        $appointmentsFixedEachDay = array(0);
                        $appointmentsFixedDates = array(0);
                        $aptFixedIndex = 0;

                        // $entriesInMonth = OrganizationEntry::where(DB::raw('MONTH(performed_on)'), $monthNum)->where(DB::raw('YEAR(performed_on)'), $yearNum)->get();
                        // $entriesInMonth = OrganizationEntry::where(DB::raw('MONTH(performed_on)'), $monthNum)->where(DB::raw('YEAR(performed_on)'), $yearNum)->groupBy('performed_on')->selectRaw('performed_on, sum(calls) as calls, sum(organizations_reached) as organizations_reached')->get();
                        $entriesInMonth = OrganizationEntry::groupBy('performed_on')->selectRaw('performed_on, sum(calls) as calls, sum(organizations_reached) as organizations_reached, sum(pitches) as pitches, sum(fixed_apt) as appointments_fixed, sum(fixed_apt) as appointments_fixed')->get(); // dd($entriesInMonth);
                        // Fetch monthly data (current month)
                        foreach ($entriesInMonth as $em) {
                            $totalCallsMadeMonth += $em->calls;
                            $totalPitchesMadeMonth += $em->organizations_reached;

                            // Calls
                            $callsEachDay[$callsIndex] = $em->calls;
                            $callsDates[$callsIndex] = $em->performed_on;
                            $callsIndex++;

                            // Pitches
                            $pitchesEachDay[$pitchesIndex] = $em->pitches;
                            $pitchesDates[$pitchesIndex] = $em->performed_on;
                            $pitchesIndex++;

                            // Organizations Reached
                            $organizationsReachedEachDay[$orgRchdIndex] = $em->organizations_reached;
                            $organizationsReachedDates[$orgRchdIndex] = $em->performed_on;
                            $orgRchdIndex++;

                            // Appointments Fixed
                            $appointmentsFixedEachDay[$aptFixedIndex] = $em->appointments_fixed;
                            $appointmentsFixedDates[$aptFixedIndex] = $em->performed_on;
                            $aptFixedIndex++;

                        }


                        // $callsPerDays = array_fill(0, count($goalDateRange[$i]), 0);
                        // $pitchesPerDays = array_fill(0, count($goalDateRange[$i]), 0);
                        $temp_callsPerDays = array_fill(0, count($goalDateRange[$i]), 0);
                        $temp_orgRchdPerDays = array_fill(0, count($goalDateRange[$i]), 0);
                        $temp_pitchesPerDays = array_fill(0, count($goalDateRange[$i]), 0);
                        $temp_appointmentFixedPerDays = array_fill(0, count($goalDateRange[$i]), 0);
                        $entries = [];

                        foreach ($dates[$i] as $ind => $date) {
                            // $entries[$date->format('Y-m-d')] = 0;
                            foreach ($callsDates as $key => $loggedEntry) {
                                if ($date->isSameDay($loggedEntry)) {
                                    $temp_callsPerDays[$ind] = $callsEachDay[$key];
                                }
                            }
                            // pitches made
                            foreach ($pitchesDates as $key2 => $loggedEntry) {
                                if ($date->isSameDay($loggedEntry)) {
                                    $temp_pitchesPerDays[$ind] = $pitchesEachDay[$key2];
                                }
                            }
                            //organizations_reached
                            foreach ($organizationsReachedDates as $key3 => $loggedEntry) {
                                if ($date->isSameDay($loggedEntry)) {
                                    $temp_orgRchdPerDays[$ind] = $organizationsReachedEachDay[$key3];
                                }
                            }
                            //appointments fixed
                            foreach ($appointmentsFixedDates as $key4 => $loggedEntry) {
                                if ($date->isSameDay($loggedEntry)) {
                                    $temp_appointmentFixedPerDays[$ind] = $appointmentsFixedEachDay[$key4];
                                }
                            }
                        }

                        if (count($entriesInMonth) > 0) {
                            $avgEntr = ($totalCallsMadeMonth + $totalPitchesMadeMonth) / count($entriesInMonth);

                        } else {
                            $avgEntr = 0;
                        }
                        $callsPerDays[$i] = $temp_callsPerDays;
                        $pitchesPerDays[$i] = $temp_pitchesPerDays;
                        $organizationReachedPerDays[$i] = $temp_orgRchdPerDays;
                        $fixedAppointmentPerDays[$i] = $temp_appointmentFixedPerDays;
                        $goalIDs[$i] = $goal->id;
                    }

                    $cards = [
                        'entries' => $entries,
                        'avgEntries' => $avgEntr,
                        'totalCallsMadeMonth' => $totalCallsMadeMonth,
                        'callsEachDay' => $callsPerDays,
                        'callsDates' => $goalDateRange,
                        'pitchesEachDay' => $pitchesPerDays,
                        'organizationsReachedEachDay' => $organizationReachedPerDays,
                        'goalIDs' => $goalIDs,
                        'pitchesDates' => $goalDateRange,
                        'appointmentsFixed' => $fixedAppointmentPerDays,
                        'totalPitchesMadeMonth' => $totalPitchesMadeMonth,
                        'goals' => $organizationGoals,
                        'recentGoal' => $organizationGoals[count($organizationGoals) - 1],
                        'totalCallsMade' => $totalCallsMade,
                        'entryData' => $entryData,
                        'fupEntryData' => $fupEntryData,
                        'totalPitchesMade' => $totalPitchesMade
                    ];
                    // dd($cards['pitchesPerDay']);
                } else {
                    $cards['goals'] = $organizationGoals;
                    $cards['goalsOnly'] = true;

                    $cards['goalIDs'] = $goalIDs;
                    // dd($cards);
                    // $cards['onlyGoals'] = 
                    // $cards['goal']
                }
            }
        }
        // dd($cards['appointmentsFixed']);
        // dd($cards['pitchesEachDay']);
        return $cards;

    }
}