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
                        Team Management
                    </h2>
                </div>
                <form action="{{ route('admin.teams.add') }}" method="post">
                    @csrf
                    @method('POST')
                    <div id="input" class="p-3">
                        <div class="preview">
                            <div>
                                <label for="regular-form-1" class="form-label">Team Name</label>
                                <input id="regular-form-1" type="text" name="name" class="form-control">
                            </div>
                        </div>
                    </div>
                    <div id="input" class="p-3">
                        <div class="preview">
                            <div>
                                <button class="btn btn-primary">Create</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <hr>
            <div class="intro-y block sm:flex items-center p-5 h-10 mt-6">
                <h2 class="text-lg font-medium truncate mr-5">
                    Team List
                </h2>

            </div>
            <div class="intro-y overflow-auto lg:overflow-visible mt-8 sm:mt-0">
                <table class="table table-report sm:mt-2" id="myTable">
                    <thead>
                        <tr>
                            <th class="whitespace-nowrap">#</th>
                            <th class="whitespace-nowrap">NAME</th>
                            <th class=" whitespace-nowrap">MEMBERS</th>
                            <th class=" whitespace-nowrap">REGISTERED ON</th>
                            <th class=" whitespace-nowrap">ACTIONS</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($teams as $key => $team)
                            <tr class="intro-x">
                                <td class="w-10">
                                    <div class="flex">
                                        <div class="w-10 h-10 image-fit zoom-in">
                                            <i data-feather="user"></i>
                                        </div>
                                    </div>
                                </td>
                                <td class="w-10">
                                    <a href="" class="font-medium whitespace-nowrap">{{ $team->name }}</a>
                                    {{-- <div class="text-slate-500 text-xs whitespace-nowrap mt-0.5">Photography</div> --}}
                                </td>
                                <td class="w-12">{{ $team->members_count }}</td>
                                <td class="w-40">

                                    {{ $team->created_at }}

                                </td>
                                <td class="table-report__action w-56">
                                    <div class="flex  items-center">
                                        <a class="flex  mr-3" href=""> <i data-feather="check-square"
                                                class="w-4 h-4 mr-1"></i> Edit </a>
                                        <a class="flex mr-3 text-danger" href=""> <i data-feather="trash-2"
                                                class="w-4 h-4 mr-1"></i> Delete </a>
                                        <a class="flex mr-3 text-warning" href="javascript:;" data-tw-toggle="modal"
                                            data-tw-target="#team-modal-preview-{{ $key }}"> <i
                                                data-feather="activity" class="w-4 h-4 mr-1"></i> Add Activity </a>
                                        <!-- BEGIN: Modal Toggle -->

                                        {{-- <div id="header-footer-modal-preview{{ $key }}" class="modal"
                                            tabindex="-1" aria-hidden="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <!-- BEGIN: Modal Header -->
                                                    <div class="modal-header">
                                                        <h2 class="font-medium text-base mr-auto">Broadcast Message</h2>
                                                        <button class="btn btn-outline-secondary hidden sm:flex"> <i
                                                                data-feather="file" class="w-4 h-4 mr-2"></i> Download Docs
                                                        </button>
                                                        <div class="dropdown sm:hidden"> <a
                                                                class="dropdown-toggle w-5 h-5 block" href="javascript:;"
                                                                aria-expanded="false" data-tw-toggle="dropdown"> <i
                                                                    data-feather="more-horizontal"
                                                                    class="w-5 h-5 text-slate-500"></i> </a>
                                                            <div class="dropdown-menu w-40">
                                                                <ul class="dropdown-content">
                                                                    <li> <a href="javascript:;" class="dropdown-item"> <i
                                                                                data-feather="file"
                                                                                class="w-4 h-4 mr-2"></i> Download Docs </a>
                                                                    </li>
                                                                </ul>
                                                            </div>
                                                        </div>
                                                    </div> <!-- END: Modal Header -->
                                                    <!-- BEGIN: Modal Body -->
                                                    <div class="modal-body grid grid-cols-12 gap-4 gap-y-3">
                                                        <div class="col-span-12 sm:col-span-6"> <label
                                                                for="modal-form-1{{ $key }}"
                                                                class="form-label">From</label> <input
                                                                id="modal-form-1{{ $key }}" type="text"
                                                                class="form-control" placeholder="example@gmail.com">
                                                        </div>
                                                        <div class="col-span-12 sm:col-span-6"> <label
                                                                for="modal-form-2{{ $key }}"
                                                                class="form-label">To</label> <input
                                                                id="modal-form-2{{ $key }}" type="text"
                                                                class="form-control" placeholder="example@gmail.com">
                                                        </div>
                                                        <div class="col-span-12 sm:col-span-6"> <label
                                                                for="modal-form-3{{ $key }}"
                                                                class="form-label">Subject</label> <input
                                                                id="modal-form-3{{ $key }}" type="text"
                                                                class="form-control" placeholder="Important Meeting">
                                                        </div>
                                                        <div class="col-span-12 sm:col-span-6"> <label
                                                                for="modal-form-4{{ $key }}"
                                                                class="form-label">Has the Words</label> <input
                                                                id="modal-form-4" type="text" class="form-control"
                                                                placeholder="Job, Work, Documentation"> </div>
                                                        <div class="col-span-12 sm:col-span-6"> <label
                                                                for="modal-form-5{{ $key }}"
                                                                class="form-label">Doesn't Have</label> <input
                                                                id="modal-form-5{{ $key }}" type="text"
                                                                class="form-control"
                                                                placeholder="Job, Work, Documentation"> </div>
                                                        <div class="col-span-12 sm:col-span-6"> <label
                                                                for="modal-form-6{{ $key }}"
                                                                class="form-label">Size</label> <select
                                                                id="modal-form-6{{ $key }}" class="form-select">
                                                                <option>10</option>
                                                                <option>25</option>
                                                                <option>35</option>
                                                                <option>50</option>
                                                            </select> </div>
                                                    </div> <!-- END: Modal Body -->
                                                    <!-- BEGIN: Modal Footer -->
                                                    <div class="modal-footer"> <button type="button"
                                                            data-tw-dismiss="modal"
                                                            class="btn btn-outline-secondary w-20 mr-1">Cancel</button>
                                                        <button type="button" class="btn btn-primary w-20">Send</button>
                                                    </div> <!-- END: Modal Footer -->
                                                </div>
                                            </div>
                                        </div> --}}
                                        <!-- BEGIN: Modal Toggle -->
                                        <!-- BEGIN: Modal Content -->
                                        <!-- END: Modal Content -->
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
                                                        {{-- <select id="modal-form-6" class="form-select w-full" name="team_id"> --}}

                                                        {{-- </select> --}}

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
                        {{ $teams->links() }}
                    </ul>
                </nav>
                {{-- <select class="w-20 form-select box mt-3 sm:mt-0">
                    <option>10</option>
                    <option>25</option>
                    <option>35</option>
                    <option>50</option>
                </select> --}}
            </div>
        </div>
    </div>
@endsection
