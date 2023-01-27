@extends('layouts.app')
@section('content')
    <div class="relative" style="min-height: 100vh;">

        <img class="absolute inset-0 w-full h-full object-cover object-top"
            src="https://img.freepik.com/free-vector/demand-analysts-shaking-hands-from-laptops-screens-planning-future-demand-demand-planning-demand-analytics-digital-sales-forecast-concept-illustration_335657-2098.jpg?w=2000"
            width="400" height="500" alt="hero background image">
        <div aria-hidden="true" class="absolute inset-0 w-full h-full bg-blue-900 bg-opacity-30 backdrop-blur-sm"></div>
        <div class="relative container m-auto px-6 md:px-12 lg:px-6">
            <div class="mb-12 pt-40 space-y-16 md:mb-20 md:pt-56 lg:w-8/12 lg:mx-auto">
                <h1 class="text-white text-center text-3xl font-bold sm:text-4xl md:text-5xl">
                    Don't look again for your next freelance projects, you got them.
                </h1>

                <form action="" class="w-full">
                    <div class="relative flex p-1 rounded-xl bg-white shadow-2xl md:p-2">
                        <div id="catJobBox"
                            class="hidden text-gray-600 relative md:flex justify-between items-center min-w-max select-none">
                            <input type="checkbox" name="" id="toggleJobLstCat" class="peer hidden outline-none">
                            <input type="text" name="" id="catJobName" value="Design"
                                class="pl-3 w-full bg-white text-base font-medium cursor-pointer" readonly>
                            <label for="toggleJobLstCat" class="absolute top-0 left-0 w-full h-full"></label>
                            <span class="min-w-max">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20"
                                    fill="currentColor">
                                    <path fill-rule="evenodd"
                                        d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                        clip-rule="evenodd" />
                                </svg>
                            </span>
                            <div id="catJobLst"
                                class="absolute transition-all duration-500 ease-in-out translate-y-10 opacity-0 invisible peer-checked:opacity-100 peer-checked:visible peer-checked:translate-y-1 top-full left-0 w-full bg-white bg-opacity-80 rounded-lg py-2">
                                <ul class="flex flex-col w-full">
                                    <li
                                        class="cursor-default transition hover:bg-gray-100 hover:bg-opacity-80 flex px-5 py-2">
                                        Design</li>
                                    <li
                                        class="cursor-default transition hover:bg-gray-100 hover:bg-opacity-80 flex px-5 py-2">
                                        Development</li>
                                    <li
                                        class="cursor-default transition hover:bg-gray-100 hover:bg-opacity-80 flex px-5 py-2">
                                        Marketing</li>
                                </ul>
                            </div>
                        </div>
                        <input placeholder="Your favorite position" class="w-full p-4 outline-none text-gray-600"
                            type="text">
                        <button type="button" title="Start buying"
                            class="ml-auto py-3 px-6 rounded-lg text-center transition bg-gradient-to-br from-pink-500 to-purple-500 hover:to-purple-600 active:from-pink-700 focus:from-pink-600 md:px-12">
                            <span class="hidden text-white font-semibold md:block">
                                Search
                            </span>
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-5 mx-auto text-white md:hidden"
                                fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
                                <path
                                    d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z" />
                            </svg>
                        </button>
                    </div>
                </form>
            </div>

            <div class="pb-16">
              
            </div>
        </div>

    </div>
@endsection
