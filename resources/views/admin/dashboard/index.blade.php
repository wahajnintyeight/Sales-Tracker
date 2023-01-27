@extends('admin.dashboard.layouts.app')
@section('content')
    <div class="content">
        <!-- BEGIN: Top Bar -->
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
                    <img alt="Rubick Tailwind HTML Admin Template" src="dist/images/profile-8.jpg">
                </div>
                <div class="dropdown-menu w-56">
                    <ul class="dropdown-content bg-primary text-white">
                        <li class="p-2">
                            <div class="font-medium">Arnold Schwarzenegger</div>
                            <div class="text-xs text-white/70 mt-0.5 dark:text-slate-500">Frontend Engineer</div>
                        </li>
                        <li>
                            <hr class="dropdown-divider border-white/[0.08]">
                        </li>
                        <li>
                            <a href="" class="dropdown-item hover:bg-white/5"> <i data-feather="user"
                                    class="w-4 h-4 mr-2"></i> Profile </a>
                        </li>
                        <li>
                            <form action="{{ route('logout') }}" method="post">
                                @csrf
                                @method('POST')
                                <input type="submit" class="dropdown-item hover:bg-white/5" value="Logout">
                            </form>
                        </li>
                    </ul>
                </div>
            </div>
            <!-- END: Account Menu -->
        </div>
        <!-- END: Top Bar -->
        <div class="grid grid-cols-12 gap-6">
            <div class="col-span-12 2xl:col-span-9">
                <div class="grid grid-cols-12 gap-6">
                    <!-- BEGIN: General Report -->
                    <div class="col-span-12 mt-8">
                        <div class="intro-y flex items-center h-10">
                            <h2 class="text-lg font-medium truncate mr-5">
                                General Report
                            </h2>
                            <a href="" class="ml-auto flex items-center text-primary"> <i data-feather="refresh-ccw"
                                    class="w-4 h-4 mr-3"></i> Reload Data </a>
                        </div>
                        <div class="grid grid-cols-12 gap-6 mt-5">
                            <div class="col-span-12 sm:col-span-6 xl:col-span-3 intro-y">
                                <div class="report-box zoom-in">
                                    <div class="box p-5">
                                        <div class="flex">
                                            <i data-feather="shopping-cart" class="report-box__icon text-primary"></i>
                                            <div class="ml-auto">
                                                <div class="report-box__indicator bg-success tooltip cursor-pointer"
                                                    title="33% Higher than last month"> 33% <i data-feather="chevron-up"
                                                        class="w-4 h-4 ml-0.5"></i> </div>
                                            </div>
                                        </div>
                                        <div class="text-3xl font-medium leading-8 mt-6">4.710</div>
                                        <div class="text-base text-slate-500 mt-1">Item Sales</div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-span-12 sm:col-span-6 xl:col-span-3 intro-y">
                                <div class="report-box zoom-in">
                                    <div class="box p-5">
                                        <div class="flex">
                                            <i data-feather="credit-card" class="report-box__icon text-pending"></i>
                                            <div class="ml-auto">
                                                <div class="report-box__indicator bg-danger tooltip cursor-pointer"
                                                    title="2% Lower than last month"> 2% <i data-feather="chevron-down"
                                                        class="w-4 h-4 ml-0.5"></i> </div>
                                            </div>
                                        </div>
                                        <div class="text-3xl font-medium leading-8 mt-6">3.721</div>
                                        <div class="text-base text-slate-500 mt-1">New Orders</div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-span-12 sm:col-span-6 xl:col-span-3 intro-y">
                                <div class="report-box zoom-in">
                                    <div class="box p-5">
                                        <div class="flex">
                                            <i data-feather="monitor" class="report-box__icon text-warning"></i>
                                            <div class="ml-auto">
                                                <div class="report-box__indicator bg-success tooltip cursor-pointer"
                                                    title="12% Higher than last month"> 12% <i data-feather="chevron-up"
                                                        class="w-4 h-4 ml-0.5"></i> </div>
                                            </div>
                                        </div>
                                        <div class="text-3xl font-medium leading-8 mt-6">2.149</div>
                                        <div class="text-base text-slate-500 mt-1">Total Products</div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-span-12 sm:col-span-6 xl:col-span-3 intro-y">
                                <div class="report-box zoom-in">
                                    <div class="box p-5">
                                        <div class="flex">
                                            <i data-feather="user" class="report-box__icon text-success"></i>
                                            <div class="ml-auto">
                                                <div class="report-box__indicator bg-success tooltip cursor-pointer"
                                                    title="22% Higher than last month"> 22% <i data-feather="chevron-up"
                                                        class="w-4 h-4 ml-0.5"></i> </div>
                                            </div>
                                        </div>
                                        <div class="text-3xl font-medium leading-8 mt-6">152.040</div>
                                        <div class="text-base text-slate-500 mt-1">Unique Visitor</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- END: General Report -->
                    <!-- BEGIN: Weekly Top Seller -->
                    <div class="col-span-12 sm:col-span-6 lg:col-span-3 mt-8">
                        <div class="intro-y flex items-center h-10">
                            <h2 class="text-lg font-medium truncate mr-5">
                                Weekly Top Seller
                            </h2>
                            <a href="" class="ml-auto text-primary truncate">Show More</a>
                        </div>
                        <div class="intro-y box p-5 mt-5">
                            <canvas class="mt-3" id="report-pie-chart" height="300"></canvas>
                            <div class="mt-8">
                                <div class="flex items-center">
                                    <div class="w-2 h-2 bg-primary rounded-full mr-3"></div>
                                    <span class="truncate">17 - 30 Years old</span> <span
                                        class="font-medium xl:ml-auto">62%</span>
                                </div>
                                <div class="flex items-center mt-4">
                                    <div class="w-2 h-2 bg-pending rounded-full mr-3"></div>
                                    <span class="truncate">31 - 50 Years old</span> <span
                                        class="font-medium xl:ml-auto">33%</span>
                                </div>
                                <div class="flex items-center mt-4">
                                    <div class="w-2 h-2 bg-warning rounded-full mr-3"></div>
                                    <span class="truncate">>= 50 Years old</span> <span
                                        class="font-medium xl:ml-auto">10%</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- END: Weekly Top Seller -->
                    <!-- BEGIN: Sales Report -->
                    <!-- END: Sales Report -->

                    <!-- BEGIN: General Report -->

                    <!-- END: General Report -->
                    <!-- BEGIN: Weekly Top Products -->

                    <!-- END: Weekly Top Products -->
                </div>
            </div>
            <div class="col-span-12 2xl:col-span-3">
                <div class="2xl:border-l -mb-10 pb-10">
                    <div class="2xl:pl-6 grid grid-cols-12 gap-6">
                        <!-- BEGIN: Transactions -->
                        <!-- END: Transactions -->
                        <!-- BEGIN: Recent Activities -->
                        <div class="col-span-12 md:col-span-6 xl:col-span-4 2xl:col-span-12 mt-3">
                            <div class="intro-x flex items-center h-10">
                                <h2 class="text-lg font-medium truncate mr-5">
                                    Recent Activities
                                </h2>
                                <a href="" class="ml-auto text-primary truncate">Show More</a>
                            </div>
                            <div
                                class="mt-5 relative before:block before:absolute before:w-px before:h-[85%] before:bg-slate-200 before:dark:bg-darkmode-400 before:ml-5 before:mt-5">
                                <div class="intro-x relative flex items-center mb-3">
                                    <div
                                        class="before:block before:absolute before:w-20 before:h-px before:bg-slate-200 before:dark:bg-darkmode-400 before:mt-5 before:ml-5">
                                        <div class="w-10 h-10 flex-none image-fit rounded-full overflow-hidden">
                                            <img alt="Rubick Tailwind HTML Admin Template"
                                                src="dist/images/profile-10.jpg">
                                        </div>
                                    </div>
                                    <div class="box px-5 py-3 ml-4 flex-1 zoom-in">
                                        <div class="flex items-center">
                                            <div class="font-medium">Johnny Depp</div>
                                            <div class="text-xs text-slate-500 ml-auto">07:00 PM</div>
                                        </div>
                                        <div class="text-slate-500 mt-1">Has joined the team</div>
                                    </div>
                                </div>
                                <div class="intro-x relative flex items-center mb-3">
                                    <div
                                        class="before:block before:absolute before:w-20 before:h-px before:bg-slate-200 before:dark:bg-darkmode-400 before:mt-5 before:ml-5">
                                        <div class="w-10 h-10 flex-none image-fit rounded-full overflow-hidden">
                                            <img alt="Rubick Tailwind HTML Admin Template"
                                                src="dist/images/profile-12.jpg">
                                        </div>
                                    </div>
                                    <div class="box px-5 py-3 ml-4 flex-1 zoom-in">
                                        <div class="flex items-center">
                                            <div class="font-medium">Angelina Jolie</div>
                                            <div class="text-xs text-slate-500 ml-auto">07:00 PM</div>
                                        </div>
                                        <div class="text-slate-500">
                                            <div class="mt-1">Added 3 new photos</div>
                                            <div class="flex mt-2">
                                                <div class="tooltip w-8 h-8 image-fit mr-1 zoom-in" title="Nikon Z6">
                                                    <img alt="Rubick Tailwind HTML Admin Template"
                                                        class="rounded-md border border-white"
                                                        src="dist/images/preview-6.jpg">
                                                </div>
                                                <div class="tooltip w-8 h-8 image-fit mr-1 zoom-in"
                                                    title="Apple MacBook Pro 13">
                                                    <img alt="Rubick Tailwind HTML Admin Template"
                                                        class="rounded-md border border-white"
                                                        src="dist/images/preview-3.jpg">
                                                </div>
                                                <div class="tooltip w-8 h-8 image-fit mr-1 zoom-in"
                                                    title="Nike Air Max 270">
                                                    <img alt="Rubick Tailwind HTML Admin Template"
                                                        class="rounded-md border border-white"
                                                        src="dist/images/preview-7.jpg">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="intro-x text-slate-500 text-xs text-center my-4">12 November</div>
                                <div class="intro-x relative flex items-center mb-3">
                                    <div
                                        class="before:block before:absolute before:w-20 before:h-px before:bg-slate-200 before:dark:bg-darkmode-400 before:mt-5 before:ml-5">
                                        <div class="w-10 h-10 flex-none image-fit rounded-full overflow-hidden">
                                            <img alt="Rubick Tailwind HTML Admin Template"
                                                src="dist/images/profile-9.jpg">
                                        </div>
                                    </div>
                                    <div class="box px-5 py-3 ml-4 flex-1 zoom-in">
                                        <div class="flex items-center">
                                            <div class="font-medium">Brad Pitt</div>
                                            <div class="text-xs text-slate-500 ml-auto">07:00 PM</div>
                                        </div>
                                        <div class="text-slate-500 mt-1">Has changed <a class="text-primary"
                                                href="">Samsung Q90 QLED TV</a> price and description</div>
                                    </div>
                                </div>
                                <div class="intro-x relative flex items-center mb-3">
                                    <div
                                        class="before:block before:absolute before:w-20 before:h-px before:bg-slate-200 before:dark:bg-darkmode-400 before:mt-5 before:ml-5">
                                        <div class="w-10 h-10 flex-none image-fit rounded-full overflow-hidden">
                                            <img alt="Rubick Tailwind HTML Admin Template"
                                                src="dist/images/profile-4.jpg">
                                        </div>
                                    </div>
                                    <div class="box px-5 py-3 ml-4 flex-1 zoom-in">
                                        <div class="flex items-center">
                                            <div class="font-medium">Al Pacino</div>
                                            <div class="text-xs text-slate-500 ml-auto">07:00 PM</div>
                                        </div>
                                        <div class="text-slate-500 mt-1">Has changed <a class="text-primary"
                                                href="">Dell XPS 13</a> description</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- END: Recent Activities -->
                        <!-- BEGIN: Schedules -->
                        <!-- END: Schedules -->
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
