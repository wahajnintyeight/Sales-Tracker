<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Sales Tracker</title>
    {{-- <link href="css/app.css" rel="stylesheet"> --}}
    @vite('resources/css/app.css')
    {{-- <script src="https://cdn.tailwindcss.com"></script> --}}
</head>

<body>
    <header>
        <nav id="header_" class="fixed top-0 left-0 z-20 w-full transition-all ease-in">
            <div class="container m-auto px-6 md:px-12 lg:px-6">
                <div class="flex flex-wrap items-center justify-between py-6 md:py-4 md:gap-0">
                    <div class="w-full flex items-center justify-between lg:w-auto">
                        <a href="{{ route('/') }}" aria-label="logo" class="font-bold text-white font-lg"
                            style="font-size: 25px">
                            Sales Tracker
                        </a>

                        <div class="block max-w-max">
                            <button aria-label="humburger" id="hamburger" class="block relative h-auto lg:hidden">
                                <div aria-hidden="true" id="line"
                                    class="m-auto h-0.5 w-6 rounded bg-gray-100 transition duration-300"></div>
                                <div aria-hidden="true" id="line2"
                                    class="m-auto mt-2 h-0.5 w-6 rounded bg-gray-100 transition duration-300"></div>
                            </button>
                        </div>
                    </div>

                    <div id="navbar"
                        class="flex h-0 lg:h-auto overflow-hidden lg:flex lg:pt-0 w-full md:space-y-0 lh:p-0 md:bg-transparent lg:w-auto transition-all duration-300">
                        <div id="navBox"
                            class="w-full p-6 lg:p-0 bg-white bg-opacity-40 backdrop-blur-md lg:items-center flex flex-col lg:flex-row lg:bg-transparent transition-all ease-in">
                            @if (Auth::user())

                                @if (Auth::user()->role_id == 0)
                                    <ul
                                        class="border-t w-full lg:w-max gap-3 pt-2 lg:pt-0 lg:pl-2 lg:border-t-0 flex flex-col lg:gap-0 lg:items-center lg:flex-row">
                                        <li class="flex w-full lg:max-w-max justify-center">
                                            <a href="{{ route('user.dashboard') }}"
                                                class="flex w-full py-3 btn px-6 rounded-lg text-center transition bg-purple-600 lg:bg-white active:bg-purple-700 lg:active:bg-purple-200 focus:bg-purple-500 lg:focus:bg-purple-100 justify-center max-w-lg lg:max-w-max">
                                                <span
                                                    class="block text-sm text-white text-[conic-gradient(at_top_right,_var(--tw-gradient-stops))] from-sky-600 via-cyan-600 to-fuchsia-700 font-semibold">
                                                    Dashboard
                                                </span>
                                            </a>
                                        </li>
                                    </ul>
                                @elseif(Auth::user()->role_id == 1)
                                    <ul
                                        class="border-t w-full lg:w-max gap-3 pt-2 lg:pt-0 lg:pl-2 lg:border-t-0 flex flex-col lg:gap-0 lg:items-center lg:flex-row">
                                        <li class="flex w-full lg:max-w-max justify-center">
                                            <a href="{{ route('admin.dashboard') }}"
                                                class="flex w-full py-3 btn px-6 rounded-lg text-center transition bg-purple-600 lg:bg-white active:bg-purple-700 lg:active:bg-purple-200 focus:bg-purple-500 lg:focus:bg-purple-100 justify-center max-w-lg lg:max-w-max">
                                                <span
                                                    class="block text-sm text-white text-[conic-gradient(at_top_right,_var(--tw-gradient-stops))] from-sky-600 via-cyan-600 to-fuchsia-700 font-semibold">
                                                    Dashboard
                                                </span>
                                            </a>
                                        </li>
                                    </ul>
                                @else
                                    <ul
                                        class="border-t w-full lg:w-max gap-3 pt-2 lg:pt-0 lg:pl-2 lg:border-t-0 flex flex-col lg:gap-0 lg:items-center lg:flex-row">


                                        <li class="flex w-full lg:max-w-max justify-center">
                                            <a href="{{ route('user-login-index') }}"
                                                class="flex w-full py-3 btn px-6 rounded-lg text-center transition bg-purple-600 lg:bg-white active:bg-purple-700 lg:active:bg-purple-200 focus:bg-purple-500 lg:focus:bg-purple-100 justify-center max-w-lg lg:max-w-max">
                                                <span
                                                    class="block text-sm text-white text-[conic-gradient(at_top_right,_var(--tw-gradient-stops))] from-sky-600 via-cyan-600 to-fuchsia-700 font-semibold">
                                                    Sign In
                                                </span>
                                            </a>
                                        </li>
                                    </ul>
                                @endif
                            @else
                                <ul
                                    class="border-t w-full lg:w-max gap-3 pt-2 lg:pt-0 lg:pl-2 lg:border-t-0 flex flex-col lg:gap-0 lg:items-center lg:flex-row">


                                    <li class="flex w-full lg:max-w-max justify-center">
                                        <a href="{{ route('user-login-index') }}"
                                            class="flex w-full py-3 btn px-6 rounded-lg text-center transition bg-purple-600 lg:bg-white active:bg-purple-700 lg:active:bg-purple-200 focus:bg-purple-500 lg:focus:bg-purple-100 justify-center max-w-lg lg:max-w-max">
                                            <span
                                                class="block text-sm text-white text-[conic-gradient(at_top_right,_var(--tw-gradient-stops))] from-sky-600 via-cyan-600 to-fuchsia-700 font-semibold">
                                                Sign In
                                            </span>
                                        </a>
                                    </li>
                                </ul>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </nav>
    </header>
    @yield('content')
</body>

</html>


<script>
    window.addEventListener('scroll', e => {
        const header = document.querySelector('#header_')
        e.preventDefault()
        header.classList.toggle('sticky-nav', window.scrollY > 0);
    })

    const toggleMobileMenu = document.querySelector('#hamburger')
    const navbar = document.querySelector('#navbar')

    toggleMobileMenu.addEventListener('click', e => {
        e.preventDefault()
        toggleMobileMenu.querySelector('#line').classList.toggle('rotate-45')
        toggleMobileMenu.querySelector('#line').classList.toggle('translate-y-1.5')

        toggleMobileMenu.querySelector('#line2').classList.toggle('-rotate-45')
        toggleMobileMenu.querySelector('#line2').classList.toggle('-translate-y-1')
        if (navbar.clientHeight === 0) {
            navbar.style.paddingTop = '20px'
            navbar.style.paddingBottom = '20px'
            navbar.style.height = `${parseInt(navbar.scrollHeight) + 60}px`
            return
        }
        navbar.style.height = '0px'
        navbar.style.paddingTop = '0px'
        navbar.style.paddingBottom = '0px'
    })
</script>
