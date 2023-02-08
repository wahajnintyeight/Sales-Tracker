@extends('user.dashboard.layouts.app')
@section('content')
    <link href="https://unpkg.com/tailwindcss@0.3.0/dist/tailwind.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/dt/dt-1.10.22/datatables.min.css" />
    <div class="content">
        @include('user.dashboard.layouts.topbar')
        <div class="col-span-12 mt-6">
            <div class="intro-y box mb-4">
                <div
                    class="flex flex-col sm:flex-row items-center p-5 border-b border-slate-200/60 dark:border-darkmode-400">
                    <h2 class="text-lg font-medium truncate mr-5">
                        Add Daily Entry
                    </h2>
                </div>
                <form action="{{ route('user.entry.add') }}" class="m-2" method="post">
                    @csrf
                    @method('POST')
                    <div id="input" class="p-3">
                        <div class="col-span-12">
                            <label for="regular-form-1" class="form-label">Select Metric</label>
                            <select data-placeholder="Select Metric" class="tom-select w-full form-control col-span-4"
                                name="kpi_id">
                                @foreach ($kpis as $kpi)
                                    @if ($kpi->name == 'Organization')
                                        <option value="{{ $kpi->id }}" selected>
                                            {{ $kpi->name }}
                                        </option>
                                    @else
                                        <option value="{{ $kpi->id }}">
                                            {{ $kpi->name }}
                                        </option>
                                    @endif
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div id="input" class="p-3">
                        <div class="col-span-12">
                            <label for="regular-form-1" class="form-label">Select Goal</label>
                            <select data-placeholder="Select Metric" class="tom-select w-full form-control col-span-4"
                                name="goal_id">
                                @foreach ($goals as $goal)
                                    <option value="{{ $goal->id }}">
                                        {{ $goal->name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    {{-- Oranization Field Row - 1 --}}
                    <section class="org-kpi">
                        {{-- Oranization Field Row - 2 --}}
                        <div id="input" class="p-3 org-kpi">
                            <div class="grid xl:grid-cols-3 lg:grid-cols-3 xs:grid-cols-12 sm:grid-cols-12 gap-3">
                                <div class="lg:col-span-4 xs:col-span-12 sm:col-span-12">
                                    <label for="regular-form-1" class="form-label">Enter Calls</label>
                                    <input type="text" class="form-control" name="org_calls" placeholder="Select Calls"
                                        aria-label="default input inline 1">
                                </div>
                                <div class="lg:col-span-4 xs:col-span-12 sm:col-span-12">
                                    <label for="regular-form-1" class="form-label">Enter the Number of Organizations
                                        Reached</label>
                                    <input type="text" class="form-control" name="org_organizations_reached"
                                        placeholder="Enter the Number" aria-label="default input inline 2">
                                </div>
                                <div class="lg:col-span-4 xs:col-span-12 sm:col-span-12">
                                    <label for="regular-form-1" class="form-label">Performed On</label>
                                    <input type="text" class="form-control datepicker block" name="performed_on"
                                        placeholder="Select Deadline" aria-label="default input inline 3"
                                        data-single-mode="true">
                                </div>
                            </div>
                        </div>
                        <div id="input" class="p-3 org-kpi">
                            <div class="grid grid-cols-12 gap-2">
                                <div class="col-span-6 sm:col-span-12">
                                    <label for="regular-form-1" class="form-label">Enter the Number of Fixed Appointments
                                    </label>
                                    <input type="text" class="form-control col-span-4 sm:col-span-12"
                                        name="org_fixed_appointments" placeholder="Enter the Number"
                                        aria-label="default input inline 2">
                                </div>
                                <div class="col-span-6 sm:col-span-12">
                                    <label for="regular-form-1" class="form-label">Enter the Number of Actual Appointments
                                    </label>
                                    <input type="text" class="form-control col-span-4 sm:col-span-12"
                                        name="org_actual_appointments" placeholder="Enter the Number"
                                        aria-label="default input inline 2">
                                </div>
                            </div>
                        </div>
                        <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
                    </section>
                    {{-- End --}}
                    <section class="adv-kpi" style="display: none">
                        {{-- Advertising Field Row - 1 --}}
                        <div id="input" class="p-3">
                            <div class="grid grid-cols-12 gap-2">
                                <div class="col-span-6 sm:col-span-12">
                                    <label for="regular-form-1" class="form-label">Select Calls</label>
                                    <input type="text" class="form-control col-span-4" name="adv_calls"
                                        placeholder="Select Calls" aria-label="default input inline 1">
                                </div>
                                <div class="col-span-6 sm:col-span-12">
                                    <label for="regular-form-1" class="form-label">Select Acceptance Criteria</label>
                                    <input type="text" class="form-control col-span-4" name="adv_pitches"
                                        placeholder="Select Pitches" aria-label="default input inline 2">
                                </div>
                            </div>
                        </div>
                    </section>
                    {{-- END --}}
                    <div id="input" class="p-3">
                        <div class="preview">
                            <div>
                                <input class="btn btn-primary" type="submit" value="Add">
                            </div>
                        </div>
                    </div>
                </form>
                <br>
                <div
                    class="flex flex-col sm:flex-row items-center p-5 border-b border-slate-200/60 dark:border-darkmode-400">
                    <h2 class="text-lg font-medium truncate mr-5">
                        Add 2FUP Entry
                    </h2>
                </div>
                <form action="{{ route('user.entryfup.add') }}" class="m-2" method="post">
                    @csrf
                    @method('POST')
                    <div id="input" class="p-3">
                        <div class="col-span-12">
                            <label for="regular-form-1" class="form-label">Select Metric</label>
                            <select data-placeholder="Select Metric" class="tom-select w-full form-control col-span-4"
                                name="kpi_id">
                                @foreach ($kpis as $kpi)
                                    @if ($kpi->name == 'Organization')
                                        <option value="{{ $kpi->id }}" selected>
                                            {{ $kpi->name }}
                                        </option>
                                    @else
                                        <option value="{{ $kpi->id }}">
                                            {{ $kpi->name }}
                                        </option>
                                    @endif
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div id="input" class="p-3">
                        <div class="col-span-12">
                            <label for="regular-form-1" class="form-label">Select Goal</label>
                            <select data-placeholder="Select Metric" class="tom-select w-full form-control col-span-4"
                                name="goal_id">
                                @foreach ($goals as $goal)
                                    <option value="{{ $goal->id }}">
                                        {{ $goal->name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    {{-- Oranization Field Row - 1 --}}
                    <section class="org-kpi">
                        {{-- Oranization Field Row - 2 --}}
                        <div id="input" class="p-3 org-kpi">
                            <div class="grid grid-cols-12 gap-2">
                                <div class="col-span-4">
                                    <label for="regular-form-1" class="form-label">Enter Calls</label>
                                    <input type="text" class="form-control col-span-4" name="org_calls"
                                        placeholder="Select Calls" aria-label="default input inline 1">
                                </div>
                                <div class="col-span-4">
                                    <label for="regular-form-1" class="form-label">Enter Pitches</label>
                                    <input type="text" class="form-control col-span-4" name="org_pitches"
                                        placeholder="Select Pitches" aria-label="default input inline 2">
                                </div>
                                <div class="col-span-4">
                                    <label for="regular-form-1" class="form-label">Performed On</label>
                                    <input type="text" class="form-control datepicker block col-span-4"
                                        name="performed_on" placeholder="Select Deadline"
                                        aria-label="default input inline 3" data-single-mode="true">
                                </div>
                            </div>
                        </div>
                        <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
                    </section>
                    {{-- End --}}
                    <section class="adv-kpi" style="display: none">
                        {{-- Advertising Field Row - 1 --}}
                        <div id="input" class="p-3">
                            <div class="grid grid-cols-12 gap-2">
                                <div class="col-span-6">
                                    <label for="regular-form-1" class="form-label">Select Calls</label>
                                    <input type="text" class="form-control col-span-4" name="adv_calls"
                                        placeholder="Select Calls" aria-label="default input inline 1">
                                </div>
                                <div class="col-span-6">
                                    <label for="regular-form-1" class="form-label">Select Acceptance Criteria</label>
                                    <input type="text" class="form-control col-span-4" name="adv_pitches"
                                        placeholder="Select Pitches" aria-label="default input inline 2">
                                </div>
                            </div>
                        </div>
                    </section>
                    {{-- END --}}
                    <div id="input" class="p-3">
                        <div class="preview">
                            <div>
                                <input class="btn btn-primary" type="submit" value="Add">
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <hr>
            <div class="intro-y block sm:flex items-center h-10">
                <h2 class="text-lg font-medium truncate mr-5 mt-10">
                    Entries List
                </h2>
            </div>
            <div class="intro-y overflow-auto lg:overflow-visible mt-8 sm:mt-0">
                <table class="table table-report sm:mt-2" id="myTable">
                    <thead>
                        <tr>
                            <th class="whitespace-nowrap">#</th>
                            <th class="whitespace-nowrap">GOAL NAME</th>
                            <th class="whitespace-nowrap">CALLS MADE</th>
                            <th class="whitespace-nowrap">ORGANIZATIONS REACHED</th>
                            <th class="whitespace-nowrap">PERFORMED ON</th>
                            <th class="whitespace-nowrap">ACTIONS</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($entries as $key => $entry)
                            <tr class="intro-x">
                                <td class="w-4">
                                    <div class="flex">
                                        <div class="w-10 h-10 image-fit zoom-in">
                                            <i data-feather="user"></i>
                                        </div>
                                    </div>
                                </td>
                                <td class="w-5">
                                    <a href=""
                                        class="font-medium whitespace-nowrap">{{ $entry->organizationGoal->name }}</a>
                                </td>
                                <td class="w-5">
                                    <a href="" class="font-medium whitespace-nowrap">{{ $entry->calls }}</a>
                                </td>
                                <td class="w-12">{{ $entry->organizations_reached }}</td>
                                <td class="w-40">
                                    {{ $entry->performed_on }}
                                </td>
                                <td class="table-report__action w-64">
                                    <div class="flex  items-center">
                                        <div class="text-center p-1">
                                            <a href="javascript:;" data-tw-toggle="modal"
                                                data-tw-target="#update-modal-preview-{{ $key }}"
                                                class="btn bg btn-warning m-1">
                                                <i data-feather="check-square" class="w-4 h-4 mr-1"></i>
                                                Edit
                                            </a>
                                        </div>
                                        <div class="text-center p-1">
                                            <a href="javascript:;" data-tw-toggle="modal"
                                                data-tw-target="#delete-modal-preview-{{ $key }}"
                                                class="btn btn-danger m-1">
                                                <i data-feather="trash-2" class="w-4 h-4 mr-1"></i>
                                                Delete
                                            </a>
                                        </div>

                                    </div>
                                </td>
                                <div id="team-modal-preview-{{ $key }}" class="modal" tabindex="-1"
                                    aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <form action="{{ route('admin.teams.assign.user') }}" method="post">
                                                @csrf
                                                @method('POST')
                                                <div class="modal-body">
                                                    <div class="w-full">
                                                        <label for="modal-form-6" class="form-label">Select
                                                            Team</label>
                                                        <input type="hidden" name="user_id"
                                                            value="{{ $entry->id }}">
                                                        <div>
                                                            <div class="mt-2"> <select
                                                                    data-placeholder="Select your favorite actors"
                                                                    class="tom-select w-full" name="team_id">
                                                                    @foreach ($entries as $entry)
                                                                        <option value="{{ $entry->id }}">
                                                                            {{ $entry->name }}
                                                                        </option>
                                                                    @endforeach
                                                                </select> </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="modal-footer"> <button type="button" data-tw-dismiss="modal"
                                                        class="btn btn-outline-secondary w-20 mr-1">Cancel</button>
                                                    <input type="submit" class="btn btn-primary w-20" value="Add">
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <div class="intro-y flex flex-wrap sm:flex-row sm:flex-nowrap items-center mt-3">
                <nav class="w-full sm:w-auto sm:mr-auto mt-4">
                    <ul class="pagination">
                        {{ $entries->links() }}
                    </ul>
                </nav>
            </div>
        </div>
    </div>
    {{-- <script src="{{ asset('dashboard-dist/dist/js/datatable.min.js') }}" type="text/javascript"></script> --}}
    {{-- <script type="text/javascript" src="https://cdn.datatables.net/v/dt/dt-1.13.1/datatables.min.js"></script> --}}
@endsection
