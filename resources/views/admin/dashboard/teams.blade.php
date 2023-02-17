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
                                        <a class="flex  btn btn-primary mr-1" href=""> <i data-feather="check-square"
                                                class="w-4 h-4 mr-1"></i> Edit </a>
                                        <a class="flex btn btn-danger mr-1" data-tw-toggle="modal" href="javascript:;"
                                            data-tw-target="#team-modal-preview-{{ $key }}"> <i
                                                data-feather="trash-2" class="w-4 h-4 mr-1"></i> Delete </a>
                                        {{-- <a class="flex btn bg btn-warning mr-1" href="javascript:;" data-tw-toggle="modal"
                                            data-tw-target="#team-modal-preview-{{ $key }}"> <i
                                                data-feather="activity" class="w-4 h-4 mr-1"></i> Add Activity </a> --}}
                                        <!-- BEGIN: Modal Toggle -->

                                        <!-- BEGIN: Modal Toggle -->
                                        <!-- BEGIN: Modal Content -->
                                        <!-- END: Modal Content -->
                                    </div>
                                </td>
                                <div id="team-modal-preview-{{ $key }}" class="modal" tabindex="-1"
                                    aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <form action="{{ route('admin.teams.delete') }}" method="post">
                                                @csrf
                                                @method('POST')
                                                <div class="modal-body">
                                                    <div class="p-5 text-center"> <i data-feather="x-circle"
                                                            class="w-16 h-16 text-danger mx-auto mt-3"></i>
                                                        <div class="text-3xl mt-5">Are you sure?</div>
                                                        <div class="text-slate-500 mt-2"> Are you sure you want to delete
                                                            this team?</div>
                                                    </div>
                                                    <input type="hidden" name="team_id" value="{{ $team->id }}">
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
