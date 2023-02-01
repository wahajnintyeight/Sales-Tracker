<div class="top-bar">
    <!-- BEGIN: Breadcrumb -->
    <nav aria-label="breadcrumb" class="-intro-x mr-auto hidden sm:flex">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#">Application</a></li>
            <li class="breadcrumb-item active" aria-current="page">Dashboard</li>
        </ol>
    </nav>
    <!-- END: Breadcrumb -->
    <!-- BEGIN: Search -->

    <!-- END: Search -->
    <!-- BEGIN: Notifications -->

    <!-- END: Notifications -->
    <!-- BEGIN: Account Menu -->
    <div class="intro-x dropdown w-8 h-8">
        <div class="dropdown-toggle w-8 h-8 rounded-full overflow-hidden shadow-lg image-fit zoom-in" role="button"
            aria-expanded="false" data-tw-toggle="dropdown">
            <img alt="Rubick Tailwind HTML Admin Template"
                src="{{ asset('dashboard-dist/dist/images/profile-8.jpg') }}">
        </div>
        <div class="dropdown-menu w-56">
            <ul class="dropdown-content bg-primary text-white">
                <li class="p-2">
                    <div class="font-medium">{{ Auth::user()->name }}</div>
                    <div class="text-xs text-white/70 mt-0.5 dark:text-slate-500">User</div>
                </li>
                <li>
                    <hr class="dropdown-divider border-white/[0.08]">
                </li>
                <li>
                    <a href="{{ route('/') }}" class="dropdown-item hover:bg-white/5"> <i data-feather="user"
                            class="w-4 h-4 mr-2"></i> Main Site </a>
                </li>
                <li>
                    <form action="{{ route('logout') }}" method="post">
                        @csrf
                        @method('POST')
                        <input type="submit" class="dropdown-item hover:bg-white/5 w-full" value="Logout">
                    </form>
                </li>
            </ul>
        </div>
    </div>
    <!-- END: Account Menu -->
</div>