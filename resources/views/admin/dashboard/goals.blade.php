@extends('admin.dashboard.layouts.app')
@section('content')
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/dt/dt-1.10.22/datatables.min.css" />

    <div class="content">
        @include('admin.dashboard.layouts.topbar')
        <div class="col-span-12 mt-6">
            <div class="intro-y box mb-4">
                <div
                    class="flex flex-col sm:flex-row items-center p-5 border-b border-slate-200/60 dark:border-darkmode-400">
                    <h2 class="text-lg font-medium truncate mr-5">
                        Add Goal
                    </h2>
                </div>
                <form action="{{ route('admin.goals.add') }}" class="m-2" method="post">
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
                    {{-- Oranization Field Row - 1 --}}
                    <section class="org-kpi">
                        <div id="input" class="p-3 org-kpi">
                            <div class="grid grid-cols-12 gap-2">
                                <div class="col-span-4">
                                    <label for="regular-form-1" class="form-label">Select Title</label>
                                    <input type="text" class="form-control col-span-4" name="title"
                                        placeholder="Enter a Goal Title" aria-label="default input inline 1">
                                </div>
                                <div class="col-span-4">
                                    <label for="regular-form-1" class="form-label">Select Incentive</label>
                                    <input type="text" class="form-control col-span-4" name="incentive"
                                        placeholder="Enter the Reward (i.e $500)" aria-label="default input inline 2">
                                </div>
                                <div class="col-span-4">
                                    <label for="regular-form-1" class="form-label">Select Deadline</label>
                                    <input type="text" class="form-control datepicker block col-span-4" name="deadline"
                                        placeholder="Goal Deadline" aria-label="default input inline 3"
                                        data-single-mode="true">

                                </div>
                            </div>
                        </div>
                        {{-- Oranization Field Row - 2 --}}
                        <div id="input" class="p-3 org-kpi">
                            <div class="grid grid-cols-12 gap-2">
                                <div class="col-span-4">
                                    <label for="regular-form-1" class="form-label">Select Calls</label>
                                    <input type="text" class="form-control col-span-4" name="org_calls"
                                        placeholder="Number of Calls to Complete the Goal"
                                        aria-label="default input inline 1">
                                </div>
                                <div class="col-span-4">
                                    <label for="regular-form-1" class="form-label">Select Pitches</label>
                                    <input type="text" class="form-control col-span-4" name="org_pitches"
                                        placeholder="Number of Pitches to Complete the Goal"
                                        aria-label="default input inline 2">
                                </div>
                                <div class="col-span-4">
                                    <label for="regular-form-1" class="form-label">Select Start Date</label>
                                    <input type="text" class="form-control datepicker block col-span-4"
                                        name="org_goal_start_date" placeholder="Select Starting Date for the Goal"
                                        data-single-mode="true" aria-label="default input inline 2">
                                </div>
                            </div>
                        </div>
                        <div id="input" class="p-3 org-kpi">
                            <div class="grid grid-cols-12 gap-2">
                                <div class="col-span-6">
                                    <label for="regular-form-1" class="form-label">Organizations to be
                                        Reached</label>
                                    <input type="text" class="form-control col-span-4" name="org_reached"
                                        placeholder="Number of Organizations to Reach" aria-label="default input inline 1">
                                </div>
                                <div class="col-span-6">
                                    <label for="regular-form-1" class="form-label">Fixed Appointment</label>
                                    <input type="text" class="form-control col-span-4" name="org_fixed_appointment"
                                        placeholder="Number of Appointments to Fix" aria-label="default input inline 2">
                                </div>
                            </div>
                        </div>
                        <input type="hidden" name="created_by" value="{{ Auth::user()->id }}">
                        {{-- Oranization Field Row - 3 --}}
                        <div id="input" class="p-3 org-kpi">

                            <label for="regular-form-1" class="form-label">Select Description</label>
                            <textarea placeholder="Describe the Goal" type="text" name="description" class="form-control text-left">
                        </textarea>
                        </div>
                    </section>
                    {{-- End --}}
                    <section class="adv-kpi" style="display: none">
                        {{-- Advertising Field Row - 1 --}}
                        <div id="input" class="p-3">
                            <div class="grid grid-cols-12 gap-2">
                                <div class="col-span-6">
                                    <label for="regular-form-1" class="form-label">Select Calls</label>
                                    <input type="text" class="form-control col-span-4" name="calls"
                                        placeholder="Select Calls" aria-label="default input inline 1">
                                </div>
                                <div class="col-span-6">
                                    <label for="regular-form-1" class="form-label">Select Acceptance Criteria</label>
                                    <input type="text" class="form-control col-span-4" name="organizations_reached"
                                        placeholder="Select Pitches" aria-label="default input inline 2">
                                </div>
                            </div>
                        </div>
                    </section>
                    {{-- END --}}
                    <div id="input" class="p-3">
                        <div class="preview">
                            <div>
                                <input class="btn btn-primary" type="submit" value="Create">
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <hr>
            {{-- GOAL LIST --}}
            <div class="intro-y block sm:flex items-center p-5 h-10 mt-6">
                <h2 class="text-lg font-medium truncate mr-5">
                    Goal List
                </h2>

            </div>
            <div class="intro-y overflow-auto lg:overflow-visible mt-8 sm:mt-0">
                <table class="table table-report sm:mt-2" id="myTable">
                    <thead>
                        <tr>
                            <th class="whitespace-nowrap">#</th>
                            <th class="whitespace-nowrap">NAME</th>
                            <th class=" whitespace-nowrap">DESCRIPTION</th>
                            <th class=" whitespace-nowrap">INCENTIVE</th>
                            <th class=" whitespace-nowrap">CALLS</th>
                            <th class=" whitespace-nowrap">PITCHES</th>
                            <th class=" whitespace-nowrap">DEADLINE</th>
                            <th class=" whitespace-nowrap">REGISTERED ON</th>
                            <th class=" whitespace-nowrap">ACTIONS</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($goals as $key => $goal)
                            <tr class="intro-x w-full">
                                <td class="w-10">
                                    {{ $key + 1 }}
                                </td>
                                <td class="w-22">
                                    <a href="" class="font-medium whitespace-nowrap">{{ $goal->name }}</a>
                                </td>
                                <td class="w-22">
                                    <a href=""
                                        class="font-medium whitespace-nowrap">{{ mb_strimwidth($goal->description, 0, 40, '...') }}</a>
                                </td>
                                <td class="w-16">
                                    <a href="" class="font-medium whitespace-nowrap">${{ $goal->incentive }}</a>
                                </td>
                                <td class="w-16">
                                    <a href="" class="font-medium whitespace-nowrap">{{ $goal->calls }}</a>
                                </td>
                                <td class="w-16">
                                    <a href=""
                                        class="font-medium whitespace-nowrap">{{ $goal->organizations_reached }}</a>
                                </td>
                                <td class="w-22">
                                    <a href="" class="font-medium whitespace-nowrap">{{ $goal->deadline }}</a>
                                </td>

                                <td class="w-22">
                                    <a href="" class="font-medium whitespace-nowrap">{{ $goal->created_at }}</a>
                                </td>
                                <td class="w-28">
                                    <div class="flex  items-center">
                                        <a class="flex bg btn btn-warning  mr-3" href=""> <i
                                                data-feather="check-square" class="w-4 h-4 mr-1"></i> Edit </a>
                                        <a class="flex mr-3 btn btn-danger" data-tw-toggle="modal"
                                            data-tw-target="#delete-modal-preview-{{ $key }}"
                                            href="javascript:;">
                                            <i data-feather="trash-2" class="w-4 h-4 mr-1"></i> Delete </a>
                                        {{-- <a class="flex mr-3 btn btn-primary" href="javascript:;" data-tw-toggle="modal"
                                            data-tw-target="#team-modal-preview-{{ $key }}"> <i
                                                data-feather="activity" class="w-4 h-4 mr-1"></i> Add Activity </a> --}}
                                    </div>
                                </td>
                                <div id="delete-modal-preview-{{ $key }}" class="modal" tabindex="-1"
                                    aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <form action="{{ route('admin.goals.delete') }}" method="post">
                                                @csrf
                                                @method('POST')
                                                <div class="modal-body">
                                                    <div class="p-5 text-center"> <i data-feather="x-circle"
                                                            class="w-16 h-16 text-danger mx-auto mt-3"></i>
                                                        <div class="text-3xl mt-5">Are you sure?</div>
                                                        <div class="text-slate-500 mt-2"> Are you sure you want to delete
                                                            this goal?</div>
                                                    </div>
                                                    <input type="hidden" name="goal_id" value="{{ $goal->id }}">
                                                    <div class="px-5 pb-8 text-center"> <button type="button"
                                                            data-tw-dismiss="modal"
                                                            class="btn btn-outline-secondary w-24 mr-1">Cancel</button>
                                                        <input type="submit" class="btn btn-danger w-20" value="Delete">
                                                    </div>
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
                        {{ $goals->links() }}
                    </ul>
                </nav>

            </div>
        </div>
    </div>
    <script>
        const selectMetric = document.querySelector('select[name="kpi_id"]');
        const orgKpi = document.querySelectorAll('.org-kpi');
        const advKpi = document.querySelectorAll('.adv-kpi');

        selectMetric.addEventListener('change', function() {
            if (this.value === "1") {
                // console.log("Yea")
                orgKpi.forEach(el => {
                    el.style.display = 'block';
                    el.style.animation = 'slideDown 0.5s';
                });
                // hiding adv section
                advKpi.forEach(el => {
                    el.style.display = 'none';
                    el.style.animation = 'slideUp 0.5s';
                });
            } else {
                orgKpi.forEach(el => {
                    el.style.display = 'none';
                    el.style.animation = 'slideUp 0.5s';
                });
                // showing adv section
                advKpi.forEach(el => {
                    el.style.display = 'block';
                    el.style.animation = 'slideDown 0.5s';
                });
            }
        });
    </script>
    <style>
        @keyframes slideDown {
            from {
                transform: translateY(-100%);
            }

            to {
                transform: translateY(0);
            }
        }

        @keyframes slideUp {
            from {
                transform: translateY(0);
            }

            to {
                transform: translateY(-100%);
            }
        }
    </style>
@endsection
