@extends('admin.dashboard.layouts.app')
@section('content')
    <div class="content">
        <!-- BEGIN: Top Bar -->
        @include('admin.dashboard.layouts.topbar')
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

                    <!-- END: Weekly Top Seller -->
                    <!-- BEGIN: Sales Report -->
                    <div class="col-span-12 lg:col-span-12 mt-8">
                        <div class="intro-y block sm:flex items-center h-10">
                            <h2 class="text-lg font-medium truncate mr-5">
                                Sales Report
                            </h2>
                            <div class="sm:ml-auto mt-3 sm:mt-0 relative text-slate-500">
                                <i data-feather="calendar" class="w-4 h-4 z-10 absolute my-auto inset-y-0 ml-3 left-0"></i>
                                <input type="text" class="datepicker form-control sm:w-56 box pl-10">
                            </div>
                        </div>
                        <div class="intro-y box p-5 mt-12 sm:mt-5">
                            <div class="flex flex-col xl:flex-row xl:items-center">
                                <div class="flex">
                                    <div>
                                        <div class="text-primary dark:text-slate-300 text-lg xl:text-xl font-medium">
                                            $15,000</div>
                                        <div class="mt-0.5 text-slate-500">This Month</div>
                                    </div>
                                    <div
                                        class="w-px h-12 border border-r border-dashed border-slate-200 dark:border-darkmode-300 mx-4 xl:mx-5">
                                    </div>
                                    <div>
                                        <div class="text-slate-500 text-lg xl:text-xl font-medium">$10,000</div>
                                        <div class="mt-0.5 text-slate-500">Last Month</div>
                                    </div>
                                </div>
                                <div class="dropdown xl:ml-auto mt-5 xl:mt-0">
                                    <button class="dropdown-toggle btn btn-outline-secondary font-normal"
                                        aria-expanded="false" data-tw-toggle="dropdown"> Filter by Category <i
                                            data-feather="chevron-down" class="w-4 h-4 ml-2"></i> </button>
                                    <div class="dropdown-menu w-40">
                                        <ul class="dropdown-content overflow-y-auto h-32">
                                            <li><a href="" class="dropdown-item">PC & Laptop</a></li>
                                            <li><a href="" class="dropdown-item">Smartphone</a></li>
                                            <li><a href="" class="dropdown-item">Electronic</a></li>
                                            <li><a href="" class="dropdown-item">Photography</a></li>
                                            <li><a href="" class="dropdown-item">Sport</a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="report-chart">
                                <canvas id="report-line-chart" height="169" class="mt-6"></canvas>
                            </div>
                        </div>
                    </div>
                    <!-- END: Sales Report -->
                    <div class="col-span-12 mt-6">
                        <div class="intro-y block sm:flex items-center h-10">
                            <h2 class="text-lg font-medium truncate mr-5">
                                Weekly Top Products
                            </h2>
                            <div class="flex items-center sm:ml-auto mt-3 sm:mt-0">
                                <button class="btn box flex items-center text-slate-600 dark:text-slate-300"> <i
                                        data-feather="file-text" class="hidden sm:block w-4 h-4 mr-2"></i> Export to Excel
                                </button>
                                <button class="ml-3 btn box flex items-center text-slate-600 dark:text-slate-300"> <i
                                        data-feather="file-text" class="hidden sm:block w-4 h-4 mr-2"></i> Export to PDF
                                </button>
                            </div>
                        </div>
                        <div class="intro-y overflow-auto lg:overflow-visible mt-8 sm:mt-0">
                            <table class="table table-report sm:mt-2">
                                <thead>
                                    <tr>
                                        <th class="whitespace-nowrap">IMAGES</th>
                                        <th class="whitespace-nowrap">PRODUCT NAME</th>
                                        <th class="text-center whitespace-nowrap">STOCK</th>
                                        <th class="text-center whitespace-nowrap">STATUS</th>
                                        <th class="text-center whitespace-nowrap">ACTIONS</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr class="intro-x">
                                        <td class="w-40">
                                            <div class="flex">
                                                <div class="w-10 h-10 image-fit zoom-in">
                                                    <img alt="Rubick Tailwind HTML Admin Template"
                                                        class="tooltip rounded-full"
                                                        src="{{ asset('dashboard-dist/dist/images/preview-13.jpg') }}"
                                                        title="Uploaded at 9 September 2022">
                                                </div>
                                                <div class="w-10 h-10 image-fit zoom-in -ml-5">
                                                    <img alt="Rubick Tailwind HTML Admin Template"
                                                        class="tooltip rounded-full"
                                                        src="{{ asset('dashboard-dist/dist/images/preview-4.jpg') }}"
                                                        title="Uploaded at 9 July 2022">
                                                </div>
                                                <div class="w-10 h-10 image-fit zoom-in -ml-5">
                                                    <img alt="Rubick Tailwind HTML Admin Template"
                                                        class="tooltip rounded-full" src="dist/images/preview-11.jpg"
                                                        title="Uploaded at 16 August 2020">
                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                            <a href="" class="font-medium whitespace-nowrap">Nikon Z6</a>
                                            <div class="text-slate-500 text-xs whitespace-nowrap mt-0.5">Photography</div>
                                        </td>
                                        <td class="text-center">56</td>
                                        <td class="w-40">
                                            <div class="flex items-center justify-center text-success"> <i
                                                    data-feather="check-square" class="w-4 h-4 mr-2"></i> Active </div>
                                        </td>
                                        <td class="table-report__action w-56">
                                            <div class="flex justify-center items-center">
                                                <a class="flex items-center mr-3" href=""> <i
                                                        data-feather="check-square" class="w-4 h-4 mr-1"></i> Edit </a>
                                                <a class="flex items-center text-danger" href=""> <i
                                                        data-feather="trash-2" class="w-4 h-4 mr-1"></i> Delete </a>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr class="intro-x">
                                        <td class="w-40">
                                            <div class="flex">
                                                <div class="w-10 h-10 image-fit zoom-in">
                                                    <img alt="Rubick Tailwind HTML Admin Template"
                                                        class="tooltip rounded-full" src="dist/images/preview-6.jpg"
                                                        title="Uploaded at 31 May 2022">
                                                </div>
                                                <div class="w-10 h-10 image-fit zoom-in -ml-5">
                                                    <img alt="Rubick Tailwind HTML Admin Template"
                                                        class="tooltip rounded-full" src="dist/images/preview-9.jpg"
                                                        title="Uploaded at 4 December 2021">
                                                </div>
                                                <div class="w-10 h-10 image-fit zoom-in -ml-5">
                                                    <img alt="Rubick Tailwind HTML Admin Template"
                                                        class="tooltip rounded-full" src="dist/images/preview-8.jpg"
                                                        title="Uploaded at 28 June 2022">
                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                            <a href="" class="font-medium whitespace-nowrap">Apple MacBook Pro
                                                13</a>
                                            <div class="text-slate-500 text-xs whitespace-nowrap mt-0.5">PC &amp; Laptop
                                            </div>
                                        </td>
                                        <td class="text-center">54</td>
                                        <td class="w-40">
                                            <div class="flex items-center justify-center text-success"> <i
                                                    data-feather="check-square" class="w-4 h-4 mr-2"></i> Active </div>
                                        </td>
                                        <td class="table-report__action w-56">
                                            <div class="flex justify-center items-center">
                                                <a class="flex items-center mr-3" href=""> <i
                                                        data-feather="check-square" class="w-4 h-4 mr-1"></i> Edit </a>
                                                <a class="flex items-center text-danger" href=""> <i
                                                        data-feather="trash-2" class="w-4 h-4 mr-1"></i> Delete </a>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr class="intro-x">
                                        <td class="w-40">
                                            <div class="flex">
                                                <div class="w-10 h-10 image-fit zoom-in">
                                                    <img alt="Rubick Tailwind HTML Admin Template"
                                                        class="tooltip rounded-full" src="dist/images/preview-10.jpg"
                                                        title="Uploaded at 26 July 2021">
                                                </div>
                                                <div class="w-10 h-10 image-fit zoom-in -ml-5">
                                                    <img alt="Rubick Tailwind HTML Admin Template"
                                                        class="tooltip rounded-full" src="dist/images/preview-14.jpg"
                                                        title="Uploaded at 7 September 2022">
                                                </div>
                                                <div class="w-10 h-10 image-fit zoom-in -ml-5">
                                                    <img alt="Rubick Tailwind HTML Admin Template"
                                                        class="tooltip rounded-full" src="dist/images/preview-10.jpg"
                                                        title="Uploaded at 12 May 2021">
                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                            <a href="" class="font-medium whitespace-nowrap">Nike Air Max 270</a>
                                            <div class="text-slate-500 text-xs whitespace-nowrap mt-0.5">Sport &amp;
                                                Outdoor</div>
                                        </td>
                                        <td class="text-center">163</td>
                                        <td class="w-40">
                                            <div class="flex items-center justify-center text-danger"> <i
                                                    data-feather="check-square" class="w-4 h-4 mr-2"></i> Inactive </div>
                                        </td>
                                        <td class="table-report__action w-56">
                                            <div class="flex justify-center items-center">
                                                <a class="flex items-center mr-3" href=""> <i
                                                        data-feather="check-square" class="w-4 h-4 mr-1"></i> Edit </a>
                                                <a class="flex items-center text-danger" href=""> <i
                                                        data-feather="trash-2" class="w-4 h-4 mr-1"></i> Delete </a>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr class="intro-x">
                                        <td class="w-40">
                                            <div class="flex">
                                                <div class="w-10 h-10 image-fit zoom-in">
                                                    <img alt="Rubick Tailwind HTML Admin Template"
                                                        class="tooltip rounded-full" src="dist/images/preview-14.jpg"
                                                        title="Uploaded at 17 April 2020">
                                                </div>
                                                <div class="w-10 h-10 image-fit zoom-in -ml-5">
                                                    <img alt="Rubick Tailwind HTML Admin Template"
                                                        class="tooltip rounded-full" src="dist/images/preview-13.jpg"
                                                        title="Uploaded at 25 April 2021">
                                                </div>
                                                <div class="w-10 h-10 image-fit zoom-in -ml-5">
                                                    <img alt="Rubick Tailwind HTML Admin Template"
                                                        class="tooltip rounded-full" src="dist/images/preview-9.jpg"
                                                        title="Uploaded at 27 July 2020">
                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                            <a href="" class="font-medium whitespace-nowrap">Nikon Z6</a>
                                            <div class="text-slate-500 text-xs whitespace-nowrap mt-0.5">Photography</div>
                                        </td>
                                        <td class="text-center">115</td>
                                        <td class="w-40">
                                            <div class="flex items-center justify-center text-success"> <i
                                                    data-feather="check-square" class="w-4 h-4 mr-2"></i> Active </div>
                                        </td>
                                        <td class="table-report__action w-56">
                                            <div class="flex justify-center items-center">
                                                <a class="flex items-center mr-3" href=""> <i
                                                        data-feather="check-square" class="w-4 h-4 mr-1"></i> Edit </a>
                                                <a class="flex items-center text-danger" href=""> <i
                                                        data-feather="trash-2" class="w-4 h-4 mr-1"></i> Delete </a>
                                            </div>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <div class="intro-y flex flex-wrap sm:flex-row sm:flex-nowrap items-center mt-3">
                            <nav class="w-full sm:w-auto sm:mr-auto">
                                <ul class="pagination">
                                    <li class="page-item">
                                        <a class="page-link" href="#"> <i class="w-4 h-4"
                                                data-feather="chevrons-left"></i> </a>
                                    </li>
                                    <li class="page-item">
                                        <a class="page-link" href="#"> <i class="w-4 h-4"
                                                data-feather="chevron-left"></i> </a>
                                    </li>
                                    <li class="page-item"> <a class="page-link" href="#">...</a> </li>
                                    <li class="page-item"> <a class="page-link" href="#">1</a> </li>
                                    <li class="page-item active"> <a class="page-link" href="#">2</a> </li>
                                    <li class="page-item"> <a class="page-link" href="#">3</a> </li>
                                    <li class="page-item"> <a class="page-link" href="#">...</a> </li>
                                    <li class="page-item">
                                        <a class="page-link" href="#"> <i class="w-4 h-4"
                                                data-feather="chevron-right"></i> </a>
                                    </li>
                                    <li class="page-item">
                                        <a class="page-link" href="#"> <i class="w-4 h-4"
                                                data-feather="chevrons-right"></i> </a>
                                    </li>
                                </ul>
                            </nav>
                            <select class="w-20 form-select box mt-3 sm:mt-0">
                                <option>10</option>
                                <option>25</option>
                                <option>35</option>
                                <option>50</option>
                            </select>
                        </div>
                    </div>
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
                                                src="{{ asset('dashboard-dist/dist/images/profile-10.jpg') }}">
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
                                                src="{{ asset('dashboard-dist/dist/images/profile-12.jpg') }}">
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
                                                        src="{{ asset('dashboard-dist/dist/images/preview-6.jpg') }}">
                                                </div>
                                                <div class="tooltip w-8 h-8 image-fit mr-1 zoom-in"
                                                    title="Apple MacBook Pro 13">
                                                    <img alt="Rubick Tailwind HTML Admin Template"
                                                        class="rounded-md border border-white"
                                                        src="{{ asset('dashboard-dist/dist/images/preview-3.jpg') }}">
                                                </div>
                                                <div class="tooltip w-8 h-8 image-fit mr-1 zoom-in"
                                                    title="Nike Air Max 270">
                                                    <img alt="Rubick Tailwind HTML Admin Template"
                                                        class="rounded-md border border-white"
                                                        src="{{ asset('dashboard-dist/dist/images/preview-7.jpg') }}">
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
                                                src="{{ asset('dashboard-dist/dist/images/profile-9.jpg') }}">
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
                                                src="{{ asset('dashboard-dist/dist/images/profile-4.jpg') }}">
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
