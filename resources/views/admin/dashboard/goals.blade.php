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
                    {{-- Oranization Field Row - 1  --}}
                    <section class="org-kpi">
                        <div id="input" class="p-3 org-kpi">
                            <div class="grid grid-cols-12 gap-2">
                                <div class="col-span-4">
                                    <label for="regular-form-1" class="form-label">Select Title</label>
                                    <input type="text" class="form-control col-span-4" name="title" placeholder="Title"
                                        aria-label="default input inline 1">
                                </div>
                                <div class="col-span-4">
                                    <label for="regular-form-1" class="form-label">Select Incentive</label>
                                    <input type="text" class="form-control col-span-4" name="incentive"
                                        placeholder="Select Incentive" aria-label="default input inline 2">
                                </div>
                                <div class="col-span-4">
                                    <label for="regular-form-1" class="form-label">Select Deadline</label>
                                    <input type="text" class="form-control datepicker block col-span-4" name="deadline"
                                        placeholder="Select Deadline" aria-label="default input inline 3"
                                        data-single-mode="true">

                                </div>
                            </div>
                        </div>
                        {{-- Oranization Field Row - 2  --}}
                        <div id="input" class="p-3 org-kpi">
                            <div class="grid grid-cols-12 gap-2">
                                <div class="col-span-6">
                                    <label for="regular-form-1" class="form-label">Select Calls</label>
                                    <input type="text" class="form-control col-span-4" name="org_calls"
                                        placeholder="Select Calls" aria-label="default input inline 1">
                                </div>
                                <div class="col-span-6">
                                    <label for="regular-form-1" class="form-label">Select Pitches</label>
                                    <input type="text" class="form-control col-span-4" name="org_pitches"
                                        placeholder="Select Pitches" aria-label="default input inline 2">
                                </div>
                            </div>
                        </div>
                        <input type="hidden" name="created_by" value="{{ Auth::user()->id }}">
                        {{-- Oranization Field Row - 3  --}}
                        <div id="input" class="p-3 org-kpi">

                            <label for="regular-form-1" class="form-label">Select Description</label>
                            <textarea type="text" name="description" class="form-control text-left">
                        </textarea>
                        </div>
                    </section>
                    {{-- End --}}
                    <section class="adv-kpi" style="display: none">
                        {{-- Advertising Field Row - 1  --}}
                        <div id="input" class="p-3">
                            <div class="grid grid-cols-12 gap-2">
                                <div class="col-span-6">
                                    <label for="regular-form-1" class="form-label">Select Calls</label>
                                    <input type="text" class="form-control col-span-4" name="calls"
                                        placeholder="Select Calls" aria-label="default input inline 1">
                                </div>
                                <div class="col-span-6">
                                    <label for="regular-form-1" class="form-label">Select Acceptance Criteria</label>
                                    <input type="text" class="form-control col-span-4" name="pitches"
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
                            <th class=" whitespace-nowrap">METRIC</th>
                            <th class=" whitespace-nowrap">REGISTERED ON</th>
                            <th class=" whitespace-nowrap">ACTIONS</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($goals as $key => $goal)
                            <tr class="intro-x">
                                <td class="w-10">
                                    {{ $key + 1 }}
                                </td>
                                <td class="w-10">
                                    <a href="" class="font-medium whitespace-nowrap">{{ $goal->name }}</a>
                                </td>
                                <td class="w-10">
                                    <a href=""
                                        class="font-medium whitespace-nowrap">{{ mb_strimwidth($goal->description, 0, 40, '...') }}</a>
                                </td>
                                <td class="w-10">
                                    <a href="" class="font-medium whitespace-nowrap">{{ $goal->incentive }}</a>
                                </td>
                                <td class="w-10">
                                    <a href="" class="font-medium whitespace-nowrap">{{ $goal->calls }}</a>
                                </td>
                                <td class="w-10">
                                    <a href="" class="font-medium whitespace-nowrap">{{ $goal->pitches }}</a>
                                </td>
                                <td class="w-10">
                                    <a href="" class="font-medium whitespace-nowrap">{{ $goal->deadline }}</a>
                                </td>
                                <td class="w-10">
                                    <a href="" class="font-medium whitespace-nowrap">{{ $goal->kpi_id }}</a>
                                </td>
                                <td class="w-10">
                                    <a href="" class="font-medium whitespace-nowrap">{{ $goal->created_at }}</a>
                                </td>
                                <td class="table-report__action w-56">
                                    <div class="flex  items-center">
                                        <a class="flex bg btn btn-warning  mr-3" href=""> <i
                                                data-feather="check-square" class="w-4 h-4 mr-1"></i> Edit </a>
                                        <a class="flex mr-3 btn btn-danger" href=""> <i data-feather="trash-2"
                                                class="w-4 h-4 mr-1"></i> Delete </a>
                                        <a class="flex mr-3 btn btn-primary" href="javascript:;" data-tw-toggle="modal"
                                            data-tw-target="#team-modal-preview-{{ $key }}"> <i
                                                data-feather="activity" class="w-4 h-4 mr-1"></i> Add Activity </a>

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
                                                    <div class="w-full"> <label for="modal-form-6"
                                                            class="form-label font-bold">Add an
                                                            Activity</label>

                                                        {{-- <input type="hidden" name="user_id" value="{{ $user->id }}"> --}}
                                                        <div>
                                                            <div class="mt-2">
                                                                Select Date:
                                                                <div class="relative w-full mx-auto mt-2">
                                                                    <div
                                                                        class="absolute rounded-l w-10 h-full flex items-center justify-center bg-slate-100 border text-slate-500 dark:bg-darkmode-700 dark:border-darkmode-800 dark:text-slate-400">
                                                                        <i data-feather="calendar" class="w-4 h-4"></i>
                                                                    </div> <input type="text"
                                                                        class="datepicker form-control pl-12"
                                                                        data-single-mode="true" name="activity_date">
                                                                </div>
                                                                <div class="relative w-full mx-auto mt-2">
                                                                    <div> <label for="regular-form-1"
                                                                            class="form-label">Select Title</label> <input
                                                                            id="regular-form-1" type="text"
                                                                            class="form-control" name="title">
                                                                    </div>
                                                                </div>
                                                            </div>
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
