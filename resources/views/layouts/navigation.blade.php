<nav x-data="{ open: false }"">
    <!-- Primary Navigation Menu -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16">
            <div class="flex">
                <!-- Logo -->
                <div class="shrink-0 flex items-center">
                    <a href="{{ route('home') }}">
                        <img src="{{ asset('storage/images/logo.png') }}" alt="dd" class="block h-auto w-40">
                    </a>
                </div>
                <!-- Navigation Links -->
                <div class="hidden space-x-8 sm:-my-px sm:ms-10 sm:flex">
                    <x-nav-link :href="route('home')" :active="request()->routeIs('home')" style="text-decoration: none">
                        {{ __('Home') }}
                    </x-nav-link>
                </div>
                @auth
                    @if ($user->role == 'admin' || $user->role == 'organizer')
                        <div class="hidden space-x-8 sm:-my-px sm:ms-10 sm:flex">
                            <x-nav-link :href="route('dashboard.index')" :active="request()->routeIs('dashboard.index')" style="text-decoration: none">
                                {{ __('Dashboard') }}
                            </x-nav-link>
                        </div>
                    @endif
                @endauth
                <div class="hidden space-x-8 sm:-my-px sm:ms-10 sm:flex">
                    <x-nav-link :href="route('discover')" :active="request()->routeIs('discover')" style="text-decoration: none">
                        {{ __('Discover') }}
                    </x-nav-link>
                </div>
                
                @isset($categories)
                    <div style="margin-top:18px;cursor:pointer;" class="hidden space-x-8 sm:-my-px sm:ms-10 sm:flex">
                        <x-dropdown align="bottom" width="48" class="relative">
                            <x-slot name="trigger">
                                <x-nav-link
                                    class="flex items-center text-sm font-medium text-gray-500 hover:text-gray-700 focus:outline-none transition ease-in-out duration-150">
                                    Categories
                                    <img style="width:13px;margin-left:5px;"
                                        src="https://cdn-icons-png.flaticon.com/256/13077/13077156.png" alt="">
                                </x-nav-link>
                            </x-slot>

                            <x-slot name="content">
                                @foreach ($categories as $category)
                                    <x-dropdown-link :href="route('events.category', $category->id)">
                                        {{ $category->name }}
                                    </x-dropdown-link>
                                @endforeach
                            </x-slot>




                        </x-dropdown>
                    </div>
                @endisset
            </div>

            <!-- Settings Dropdown -->

            <div class="hidden sm:flex sm:items-center sm:ms-6">
                @auth
                    <x-dropdown align="right" width="48">

                        <x-slot name="trigger">
                            <button
                                class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500 bg-white hover:text-gray-700 focus:outline-none transition ease-in-out duration-150">
                                <div>{{ Auth::user()->name }}</div>

                                <div class="ms-1">
                                    <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg"
                                        viewBox="0 0 20 20">
                                        <path fill-rule="evenodd"
                                            d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                            clip-rule="evenodd" />
                                    </svg>
                                </div>
                            </button>
                        </x-slot>

                        <x-slot name="content">
                            <x-dropdown-link :href="route('profile.edit')">
                                {{ __('Profile') }}
                            </x-dropdown-link>


                            <!-- Authentication -->
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf

                                <x-dropdown-link :href="route('logout')"
                                    onclick="event.preventDefault();
                                                this.closest('form').submit();">
                                    {{ __('Log Out') }}
                                </x-dropdown-link>
                            </form>
                        </x-slot>

                    </x-dropdown>
                @endauth
                {{-- for non authticated users --}}
                @guest
                    <div>


                        <a href="{{ route('login') }}"><button
                                class="w-24 bg-transparent hover:bg-blue-500 text-blue-700 font-semibold hover:text-white py-2 px-4 border border-blue-500 hover:border-transparent rounded">
                                Login
                            </button></a>
                        <a href="{{ route('register') }}"> <button
                                class="w-24 bg-transparent hover:bg-blue-500 text-blue-700 font-semibold hover:text-white py-2 px-4 border border-blue-500 hover:border-transparent rounded">
                                Register
                            </button></a>

                    </div>
                @endguest
            </div>



            <!-- Hamburger -->

            <div class="-me-2 flex items-center sm:hidden">
                <button @click="open = ! open"
                    class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 hover:text-gray-500 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 focus:text-gray-500 transition duration-150 ease-in-out">
                    <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                        <path :class="{ 'hidden': open, 'inline-flex': !open }" class="inline-flex"
                            stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M4 6h16M4 12h16M4 18h16" />
                        <path :class="{ 'hidden': !open, 'inline-flex': open }" class="hidden" stroke-linecap="round"
                            stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>


        </div>
    </div>

    <!-- Responsive Navigation Menu -->
    @auth
        <div :class="{ 'block': open, 'hidden': !open }" class="hidden sm:hidden">
            <div class="pt-2 pb-3 space-y-1">
                <x-responsive-nav-link :href="route('home')" :active="request()->routeIs('home')">
                    {{ __('home') }}
                </x-responsive-nav-link>
                <x-responsive-nav-link :href="route('dashboard.index')" :active="request()->routeIs('dashboard.index')">
                    {{ __('Dashboard') }}
                </x-responsive-nav-link>
                @isset($categories)
                    <x-dropdown align="bottom" width="48">
                        <x-slot name="trigger">
                            <button style="display:flex;"
                                class="text-sm font-medium text-gray-500 hover:text-gray-700 focus:outline-none">
                                Categories
                                <svg class="ml-1 h-5 w-5" fill="currentColor" viewBox="0 0 20 20"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd"
                                        d="M9.293 14.293a1 1 0 001.414 0l5-5a1 1 0 00-1.414-1.414L10 11.586l-4.293-4.293a1 1 0 10-1.414 1.414l5 5z"
                                        clip-rule="evenodd" />
                                </svg>
                            </button>
                        </x-slot>



                        <x-slot name="content">
                            <div">
                                @foreach ($categories as $category)
                                    <x-dropdown-link :href="route('events.category', $category->id)">
                                        {{ $category->name }}
                                    </x-dropdown-link>
                                @endforeach

                        </x-slot>






                    </x-dropdown>
                @endisset
            </div>

            <!-- Responsive Settings Options -->
            <div class="pt-4 pb-1 border-t border-gray-200">
                <div class="px-4">
                    <div class="font-medium text-base text-gray-800">{{ Auth::user()->name }}</div>
                    <div class="font-medium text-sm text-gray-500">{{ Auth::user()->email }}</div>
                </div>

                <div class="mt-3 space-y-1">
                    <x-responsive-nav-link :href="route('profile.edit')">
                        {{ __('Profile') }}
                    </x-responsive-nav-link>

                    <!-- Authentication -->
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf

                        <x-responsive-nav-link :href="route('logout')"
                            onclick="event.preventDefault();
                                        this.closest('form').submit();">
                            {{ __('Log Out') }}
                        </x-responsive-nav-link>
                    </form>
                </div>
            </div>
        </div>
    @endauth
    @guest
        <div :class="{ 'block': open, 'hidden': !open }" class="hidden sm:hidden">
            <div class="pt-2 pb-3 space-y-1">
                <x-responsive-nav-link :href="route('home')" :active="request()->routeIs('home')">
                    {{ __('home') }}
                </x-responsive-nav-link>
            </div>

            <!-- Responsive Settings Options -->
            <div class="pt-4 pb-1 border-t border-gray-200">

                <div class="mt-3 space-y-1">
                    <div>


                        <a href="{{ route('login') }}"><button
                                class="w-24 bg-transparent hover:bg-blue-500 text-blue-700 font-semibold hover:text-white py-2 px-4 border border-blue-500 hover:border-transparent rounded">
                                Login
                            </button></a>
                        <a href="{{ route('register') }}"> <button
                                class="w-24 bg-transparent hover:bg-blue-500 text-blue-700 font-semibold hover:text-white py-2 px-4 border border-blue-500 hover:border-transparent rounded">
                                Register
                            </button></a>

                    </div>
                </div>
            </div>
        </div>
    @endguest
</nav>
