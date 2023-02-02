@extends('user.dashboard.layouts.app')
@section('content')
    <div class="content">
        <!-- BEGIN: Top Bar -->
        @include('user.dashboard.layouts.topbar')
        <!-- END: Top Bar -->
        <div class="grid grid-cols-12 gap-6">
            <!-- BEGIN: General Report -->
            {{-- Personalized Cards -1 --}}
            <div class="col-span-12 mt-8">

                <div class="grid grid-cols-12 gap-6 mt-5">
                    {{-- Name --}}
                    <div class="col-span-12 sm:col-span-6 xl:col-span-3 intro-y">
                        <div class="report-box zoom-in">
                            <div class="box p-5">
                                <div class="flex">
                                    <i data-feather="target" class="report-box__icon text-primary"></i>
                                    <span class="m-1 p-2">
                                        Welcome!
                                    </span>
                                </div>
                                <div class="text-2xl font-medium leading-8 mt-6">{{ Auth::user()->name }}</div>
                                <div class="text-base text-slate-500 mt-1">
                                    {{ Auth::user()->email }}
                                </div>

                            </div>
                        </div>
                    </div>
                    {{-- Current Month --}}
                    <div class="col-span-12 sm:col-span-6 xl:col-span-3 intro-y">
                        <div class="report-box zoom-in">
                            <div class="box p-5">
                                <div class="flex">
                                    <i data-feather="clock" class="report-box__icon text-primary"></i>
                                    <span class="m-1 p-2">
                                        Current Month
                                    </span>

                                </div>
                                <div class="text-2xl font-medium leading-8 mt-6">
                                    {{ Carbon\Carbon::now()->format('F') }}
                                </div>
                                <div class="text-base text-slate-500 mt-1">
                                    {{ Carbon\Carbon::now()->format('Y') }}
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-span-12 sm:col-span-6 xl:col-span-3 intro-y">
                        <div class="report-box zoom-in">
                            <div class="box p-5">
                                <div class="flex">
                                    <i data-feather="briefcase" class="report-box__icon text-primary"></i>
                                    <span class="m-1 p-2">
                                        Total Pitches Made in {{ Carbon\Carbon::now()->format('F') }}
                                    </span>
                                </div>
                                @if (isset($cardInfo['totalPitchesMadeMonth']))
                                    <div class="text-2xl font-medium leading-8 mt-6">
                                        {{ $cardInfo['totalPitchesMadeMonth'] }}
                                    </div>
                                    <div class="container" style="margin-top:1.71rem"></div>
                                @else
                                    <div class="text-2xl font-medium leading-8 mt-6">
                                        0
                                    </div>
                                    <div class="container" style="margin-top:1.71rem"></div>
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="col-span-12 sm:col-span-6 xl:col-span-3 intro-y">
                        <div class="report-box zoom-in">
                            <div class="box p-5">
                                <div class="flex">
                                    <i data-feather="phone-call" class="report-box__icon text-primary"></i>
                                    <span class="m-1 p-2">
                                        Total Calls Made in {{ Carbon\Carbon::now()->format('F') }}
                                    </span>

                                </div>
                                @if (isset($cardInfo['totalCallsMadeMonth']))
                                    <div class="text-2xl font-medium leading-8 mt-6">
                                        {{ $cardInfo['totalCallsMadeMonth'] }}
                                    </div>
                                    <div class="container" style="margin-top:1.71rem"></div>
                                    {{-- <div class="text-base text-slate-500 mt-1">

                            </div> --}}
                                @else
                                    <div class="text-2xl font-medium leading-8 mt-6">
                                        0
                                    </div>
                                    <div class="container" style="margin-top:1.71rem"></div>
                                    {{-- <div class="text-base text-slate-500 mt-1">

                            </div> --}}
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            {{-- End Personalized Cards - 1 --}}
            {{-- Cards -2 --}}
            <div class="col-span-12 mt-8">
                <div class="intro-y flex items-center h-10">
                    <h2 class="text-lg font-medium truncate mr-5 ml-6">
                        General Report
                    </h2>
                    {{-- <span href="" class="ml-auto flex items-center text-primary"> --}}
                    {{-- </span> --}}
                </div>
                <?php $index = 0; ?>
                <div class="grid grid-cols-12 gap-6 mt-5">
                    @if (count($cardInfo['goals']) > 0)
                        @foreach ($cardInfo['goals'] as $goal)
                            {{-- GAUGE 1 --}}
                            <div class="col-span-12 sm:col-span-12 xl:col-span-4 intro-y box p-5 zoom-in z-0">
                                {{-- <div class="report-box "> --}}
                                <div class="w-full">
                                    <canvas width=350 height=190 class="justify-center"
                                        id="fup-calls-gauge{{ $goal->id }}"
                                        style=" display: block;
                                        margin: 0 auto;"></canvas>
                                    <div id="preview-textfield"></div>
                                    <span class="block mx-auto m-2 font-medium text-center p-2">FUP</span>
                                </div>
                                {{-- </div> --}}
                            </div>
                            <div class="col-span-12 sm:col-span-12 xl:col-span-4 intro-y box p-5 zoom-in z-0">
                                <div class="w-full z-50">
                                    {{-- <div class="flex"> --}}
                                    {{-- CHART --}}
                                    {{-- <div class="w-1/2"> --}}
                                    <canvas id="daily-entry-chat{{ $goal->id }}"></canvas>
                                    <div id="preview-textfield"></div>
                                    <span class="block mx-auto m-2 font-medium text-center p-2">Daily
                                        Average
                                        Entries</span>
                                    {{-- </div> --}}
                                    {{-- </div> --}}
                                </div>
                            </div>
                            {{-- GAUGE 2 --}}
                            <div class="col-span-12 sm:col-span-12 xl:col-span-4 intro-y box p-5 zoom-in z-0">
                                {{-- <div class="report-box "> --}}
                                <div class="w-full">
                                    <canvas width=350 height=190 class="justify-center" id="calls-gauge{{ $goal->id }}"
                                        style=" display: block;
                                        margin: 0 auto;"></canvas>
                                    <div id="preview-textfield"></div>
                                    <span class="block mx-auto m-2 font-medium text-center p-2">NAP</span>
                                </div>
                                {{-- </div> --}}
                            </div>
                            <div class="col-span-12 sm:col-span-12 xl:col-span-12 intro-y box p-5 zoom-in z-0">
                                <div class="report-box ">
                                    <div class=" flex">
                                        <div style="z-index: 9999 !important" class="w-3/5 ">
                                            <div class="">
                                                <div style="z-index: 9999 !important" class="ml-2 flex ">
                                                    <i data-feather="target" class="report-box__icon text-primary"></i>
                                                    <span class="m-1 p-2">
                                                        {{ $goal->name }}
                                                    </span>
                                                </div>
                                                {{-- PITCHES --}}
                                                @if (isset($cardInfo['entryData'][$index]))
                                                    <div class="text-2xl font-medium leading-8 mt-6">
                                                        <div class="flex">
                                                            <span class="m-1 p-2"><i data-feather="briefcase"
                                                                    class="report-box__icon text-primary"></i>
                                                            </span>
                                                            @if ($goal->pitches >= $cardInfo['entryData'][$index]->total_pitches)
                                                                <span class="m-1 p-2">
                                                                    {{ $goal->pitches - $cardInfo['entryData'][$index]->total_pitches }}
                                                                    pitches
                                                                    to
                                                                    go!
                                                                    <span
                                                                        class="text-base text-slate-500">({{ $cardInfo['entryData'][$index]->total_pitches }}
                                                                        Made)
                                                                    </span>
                                                                </span>
                                                            @else
                                                                <span class="m-1 p-2">
                                                                    0 left. Good job!
                                                                </span>
                                                            @endif
                                                        </div>
                                                    </div>
                                                @else
                                                    <div class="text-2xl font-medium leading-8 mt-6">
                                                        <div class="flex">
                                                            <span class="m-1 p-2"><i data-feather="briefcase"
                                                                    class="report-box__icon text-primary"></i>
                                                            </span>
                                                            <span class="m-1 p-2">
                                                                {{ $goal->pitches }} pitches to go!
                                                                <span class="text-base text-slate-500">( 0
                                                                    Made)
                                                                </span>
                                                            </span>
                                                        </div>
                                                    </div>
                                                    <div class="text-base text-slate-500 mt-1">
                                                    </div>
                                                @endif
                                                {{-- PITCHES END --}}
                                                {{-- CALLS --}}
                                                @if (isset($cardInfo['entryData'][$index]))
                                                    <div class="text-2xl font-medium leading-8 mt-6">
                                                        <div class="flex">
                                                            <span class="m-1 p-2">
                                                                <i data-feather="phone-call"
                                                                    class="report-box__icon text-primary"></i>
                                                            </span>
                                                            @if ($goal->calls >= $cardInfo['entryData'][$index]->total_calls)
                                                                <span class="m-1 p-2">
                                                                    {{ $goal->calls - $cardInfo['entryData'][$index]->total_calls }}
                                                                    calls to
                                                                    go! <span
                                                                        class="text-base text-slate-500">({{ $cardInfo['entryData'][$index]->total_calls }}
                                                                        Made)</span>
                                                                </span>
                                                            @else
                                                                <span class="m-1 p-2">
                                                                    0 left
                                                                    <span
                                                                        class="text-base text-slate-500">({{ $cardInfo['entryData'][$index]->total_calls }}
                                                                        Made)</span>
                                                                </span>
                                                            @endif
                                                        </div>
                                                    </div>
                                                @else
                                                    <div class="text-2xl font-medium leading-8 mt-6">
                                                        <div class="flex">
                                                            <span class="m-1 p-2">
                                                                <i data-feather="phone-call"
                                                                    class="report-box__icon text-primary"></i>
                                                            </span>
                                                            <span class="m-1 p-2">
                                                                {{ $goal->calls }} calls to go
                                                                <span class="text-base text-slate-500">(0
                                                                    Made)</span>
                                                            </span>
                                                        </div>
                                                    </div>
                                                @endif
                                                <div class="w-72 mt-4">
                                                    <div class="text-end">
                                                        <div class="mb-1 text-md font-medium p-2 dark:text-white"
                                                            style="text-align: end">
                                                            Incentive: ${{ $goal->incentive }}</div>
                                                    </div>
                                                    <div class="w-full bg-indigo rounded-lg"
                                                        style="background:linear-gradient(18deg, rgba(230,230,230,1) 0%, rgba(217,217,217,1) 100%);">
                                                        <div class="bg-blue-600  rounded-lg text-xs font-medium text-blue-100 text-center p-2 leading-none"
                                                            style="width:{{ abs((Carbon\Carbon::parse($goal->deadline)->diffInDays(Carbon\Carbon::now()) / count($cardInfo['callsDates'][$index])) * 100 - 100) }}%;background:linear-gradient(-90deg, rgba(149,210,67,1) 0%, rgba(38,170,58,1) 100%);padding:20px">
                                                            <span
                                                                style="z-index: 2000; position: absolute;left:90px;bottom:53px"
                                                                class="mb-2">

                                                                Remaining Days:
                                                                {{-- {{}} --}}
                                                                {{ Carbon\Carbon::parse($goal->deadline)->diffInDays(Carbon\Carbon::now()) }}
                                                            </span>
                                                        </div>
                                                    </div>
                                                </div>
                                                {{-- CALLS END --}}
                                                <div class="text-2xl font-medium leading-8 mt-6"></div>
                                                <div class="text-base text-slate-500 mt-1">Deadline:
                                                    {{ Carbon\Carbon::createFromFormat('Y-m-d', $goal->deadline)->format('jS M Y') }}
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @php $index++; @endphp
                        @endforeach
                    @else
                        <div class="col-span-12 sm:col-span-12 xl:col-span-12 intro-y box p-5 zoom-in z-0">
                            <div class="report-box ">
                                <div class=" flex">
                                    <div style="z-index: 9999 !important" class="w-3/5 ">

                                        <div class="">

                                            <div style="z-index: 9999 !important" class="ml-2 flex ">
                                                <i data-feather="target" class="report-box__icon text-primary"></i>
                                                <span class="m-1 p-2">
                                                    {{ $goal->name }}
                                                </span>
                                            </div>
                                            {{-- PITCHES --}}
                                            @if (isset($cardInfo['totalPitchesMade'][$index]))
                                                <div class="text-2xl font-medium leading-8 mt-6">
                                                    <div class="flex">
                                                        <span class="m-1 p-2"><i data-feather="briefcase"
                                                                class="report-box__icon text-primary"></i>
                                                        </span>
                                                        @if ($goal->pitches >= $cardInfo['totalPitchesMade'][$index])
                                                            <span class="m-1 p-2">
                                                                {{ $goal->pitches - $cardInfo['totalPitchesMade'][$index] }}
                                                                pitches
                                                                to
                                                                go!
                                                                <span
                                                                    class="text-base text-slate-500">({{ $cardInfo['totalPitchesMade'][$index] }}
                                                                    Made)
                                                                </span>
                                                            </span>
                                                        @else
                                                            <span class="m-1 p-2">
                                                                0 left. Good job!
                                                            </span>
                                                        @endif
                                                    </div>
                                                </div>
                                            @else
                                                <div class="text-2xl font-medium leading-8 mt-6">
                                                    <div class="flex">
                                                        <span class="m-1 p-2"><i data-feather="briefcase"
                                                                class="report-box__icon text-primary"></i>
                                                        </span>
                                                        <span class="m-1 p-2">
                                                            {{ $goal->pitches }} pitches to go!
                                                            <span class="text-base text-slate-500">( 0
                                                                Made)
                                                            </span>
                                                        </span>
                                                    </div>
                                                </div>
                                                <div class="text-base text-slate-500 mt-1">
                                                </div>
                                            @endif
                                            {{-- PITCHES END --}}
                                            {{-- CALLS --}}
                                            @if (isset($cardInfo['totalCallsMade'][$index]))
                                                <div class="text-2xl font-medium leading-8 mt-6">
                                                    <div class="flex">
                                                        <span class="m-1 p-2">
                                                            <i data-feather="phone-call"
                                                                class="report-box__icon text-primary"></i>
                                                        </span>
                                                        @if ($goal->calls >= $cardInfo['totalCallsMade'][$index])
                                                            <span class="m-1 p-2">
                                                                {{ $goal->calls - $cardInfo['totalCallsMade'][$index] }}
                                                                calls to
                                                                go! <span
                                                                    class="text-base text-slate-500">({{ $cardInfo['totalCallsMade'][$index] }}
                                                                    Made)</span>
                                                            </span>
                                                        @else
                                                            <span class="m-1 p-2">
                                                                0 left
                                                                <span
                                                                    class="text-base text-slate-500">({{ $cardInfo['totalCallsMade'][$index] }}
                                                                    Made)</span>
                                                            </span>
                                                        @endif
                                                    </div>
                                                </div>
                                            @else
                                                <div class="text-2xl font-medium leading-8 mt-6">
                                                    <div class="flex">
                                                        <span class="m-1 p-2">
                                                            <i data-feather="phone-call"
                                                                class="report-box__icon text-primary"></i>
                                                        </span>
                                                        <span class="m-1 p-2">
                                                            N/A
                                                            <span class="text-base text-slate-500">(0
                                                                Made)</span>
                                                        </span>
                                                    </div>
                                                </div>
                                            @endif
                                            {{-- CALLS END --}}
                                            <div class="text-2xl font-medium leading-8 mt-6"></div>
                                            <div class="text-base text-slate-500 mt-1">Deadline:
                                                -- / -- / --
                                            </div>
                                        </div>

                                    </div>
                                    <div class="w-full z-50">
                                        <div class="flex">
                                            <div class="w-1/2">
                                                <canvas id="myChart"></canvas>
                                                <div id="preview-textfield"></div>
                                                <span class="block mx-auto m-2 font-medium text-center p-2">Daily
                                                    Average
                                                    Entries</span>
                                            </div>

                                            <div class="w-1/2">
                                                <canvas width=350 height=190 class="justify-center"
                                                    id="calls-gauge"></canvas>
                                                <div id="preview-textfield"></div>
                                                <span class="block mx-auto m-2 font-medium text-center p-2">Calls</span>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                    @endif
                </div>
            </div>
            {{-- End Cards - 2 --}}
        </div>



    </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <style>
        #canvas-preview {
            display: block;
            margin: 0 auto;
            width: 250px !important;
        }

        #calls-gauge {
            display: block;
            margin: 0 auto;
        }
    </style>
@endsection
