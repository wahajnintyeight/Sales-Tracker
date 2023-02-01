@extends('layouts.app')
@section('content')
<div class="relative" style="min-height: 100vh;">

    <img class="absolute inset-0 w-full h-full object-cover object-top"
        src="https://images.unsplash.com/photo-1535320903710-d993d3d77d29?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1170&q=80"
        width="400" height="500" alt="hero background image">
    <div aria-hidden="true" class="absolute inset-0 w-full h-full bg-blue-900 bg-opacity-30 backdrop-blur-sm"></div>
    <div class="relative container m-auto px-6 md:px-12 lg:px-6">
        <div class="mb-12 pt-80 space-y-22 md:mb-20 md:pt-80 lg:w-8/12 lg:mx-auto">
            <h1 class="text-white text-center text-3xl font-bold sm:text-4xl md:text-5xl">
                Track your sales, boost your profits: Your one-stop sales tracker solution.
            </h1>
            <div class="flex mx-auto justify-center mt-10">
                <a href="{{ route('user-login-index') }}"
                    class="rounded-full font-bold text-xl text-white bg-gradient-to-r from-rose-700 to-pink-600 py-4 px-6 hover:bg-sky-200 focus:outline-none focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-sky-300/50 active:bg-sky-500">
                    Go to Dashboard
                </a>
            </div>

        </div>

        <div class="pb-16">

        </div>
    </div>

</div>
@endsection