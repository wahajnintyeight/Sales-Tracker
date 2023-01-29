@extends('admin.dashboard.layouts.app')
@section('content')
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/dt/dt-1.10.22/datatables.min.css"/>
    <div class="content">
        @include('admin.dashboard.layouts.topbar')
        <div class="col-span-12 mt-6">
            <div class="intro-y block sm:flex items-center h-10">
                <h2 class="text-lg font-medium truncate mr-5">
                    Users List
                </h2>
             
            </div>
            <div class="intro-y overflow-auto lg:overflow-visible mt-8 sm:mt-0">
                <table class="table table-report sm:mt-2" id="myTable">
                    <thead>
                        <tr>
                            <th class="whitespace-nowrap">#</th>
                            <th class="whitespace-nowrap">NAME</th>
                            <th class="whitespace-nowrap">BELONGS TO TEAM</th>
                            <th class=" whitespace-nowrap">EMAIL</th>
                            <th class=" whitespace-nowrap">REGISTERED ON</th>
                            <th class=" whitespace-nowrap">ACTIONS</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($users as $key => $user)
                            <tr class="intro-x">
                                <td class="w-4">
                                    <div class="flex">
                                        <div class="w-10 h-10 image-fit zoom-in">
                                            <i data-feather="user"></i>
                                        </div>
                                    </div>
                                </td>
                                <td class="w-5">
                                    <a href="" class="font-medium whitespace-nowrap">{{ $user->name }}</a>
                                    {{-- <div class="text-slate-500 text-xs whitespace-nowrap mt-0.5">Photography</div> --}}
                                </td>
                                <td class="w-10">
                                    @if (isset($user->team['name']))
                                        <a href=""
                                            class="font-medium whitespace-nowrap">{{ $user->team['name'] }}</a>
                                    @else
                                        <a href="" class="font-medium whitespace-nowrap">N/A</a>
                                    @endif
                                    {{-- <div class="text-slate-500 text-xs whitespace-nowrap mt-0.5">Photography</div> --}}
                                </td>
                                <td class="w-12">{{ $user->email }}</td>
                                <td class="w-40">

                                    {{ $user->created_at }}

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
                                        <div class="text-center p-1">
                                            <a href="javascript:;" data-tw-toggle="modal"
                                                data-tw-target="#team-modal-preview-{{ $key }}"
                                                class="btn btn-primary m-1">
                                                <i data-feather="user-plus" class="w-4 h-4 mr-1"></i>
                                                Assign
                                            </a>
                                        </div> <!-- END: Modal Toggle -->
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
                                                    <div class="w-full"> <label for="modal-form-6" class="form-label">Select
                                                            Team</label>

                                                        <input type="hidden" name="user_id" value="{{ $user->id }}">
                                                        <div>
                                                            <div class="mt-2"> <select
                                                                    data-placeholder="Select your favorite actors"
                                                                    class="tom-select w-full" name="team_id">
                                                                    @foreach ($teams as $team)
                                                                        <option value="{{ $team->id }}">
                                                                            {{ $team->name }}
                                                                        </option>
                                                                    @endforeach
                                                                </select> </div>
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
                        {{ $users->links() }}
                    </ul>
                </nav>
            </div>
        </div>
    </div>
    {{-- <script src="{{ asset('dashboard-dist/dist/js/datatable.min.js') }}" type="text/javascript"></script> --}}
    {{-- <script type="text/javascript" src="https://cdn.datatables.net/v/dt/dt-1.13.1/datatables.min.js"></script> --}}

  
@endsection
