@extends('layout')
@section('content')
    <section class="bg-white dark:bg-gray-900">
        <div class="grid max-w-screen-xl px-4 py-8 mx-auto lg:gap-8 xl:gap-0 lg:py-16 lg:grid-cols-12">
            <div class="mr-auto place-self-center lg:col-span-7">
                <h1
                    class="max-w-2xl mb-4 text-4xl font-extrabold tracking-tight leading-none md:text-5xl xl:text-6xl dark:text-white">
                    Welcome to Evanto: Where Events Come to Life</h1>
                <p class="max-w-2xl mb-6 font-light text-gray-500 lg:mb-8 md:text-lg lg:text-xl dark:text-gray-400">Discover
                    seamless ticket reservations and dynamic event launches. Join us and bring your events to life. Explore
                    the possibilities with Evanto.</p>
                {{-- <a href="#" class="inline-flex items-center justify-center px-5 py-3 mr-3 text-base font-medium text-center text-white rounded-lg bg-primary-700 hover:bg-primary-800 focus:ring-4 focus:ring-primary-300 dark:focus:ring-primary-900">
                Get started
                <svg class="w-5 h-5 ml-2 -mr-1" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M10.293 3.293a1 1 0 011.414 0l6 6a1 1 0 010 1.414l-6 6a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-4.293-4.293a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
            </a>
            <a href="#" class="inline-flex items-center justify-center px-5 py-3 text-base font-medium text-center text-gray-900 border border-gray-300 rounded-lg hover:bg-gray-100 focus:ring-4 focus:ring-gray-100 dark:text-white dark:border-gray-700 dark:hover:bg-gray-700 dark:focus:ring-gray-800">
                Speak to Sales
            </a>  --}}
            </div>
            <div class="hidden lg:mt-0 lg:col-span-5 lg:flex">
                <img src="{{ asset('storage/images/hero.png') }}" alt="mockup">
            </div>
        </div>
    </section>

    <div class="flex justify-center">

        <div class="flex items-center justify-center gap-2 border-solid border-2 border-gray-300 rounded-lg w-fit p-4">

            <button id="dropdownDefaultButton" data-dropdown-toggle="dropdown"
                class="text-white bg-blue-500 hover:bg-blue-600 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center inline-flex items-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800"
                type="button">Select Category <svg class="w-2.5 h-2.5 ms-3" aria-hidden="true"
                    xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="m1 1 4 4 4-4" />
                </svg>
            </button>

            <!-- Dropdown menu -->
            <div id="dropdown"
                class="z-10 hidden bg-white divide-y divide-gray-100 rounded-lg shadow w-44 dark:bg-gray-700">
                <ul class="py-2 text-sm text-gray-700 dark:text-gray-200" aria-labelledby="dropdownDefaultButton">
                    <li>
                        <a href="#"
                            class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Dashboard</a>
                    </li>
                    <li>
                        <a href="#"
                            class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Settings</a>
                    </li>
                    <li>
                        <a href="#"
                            class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Earnings</a>
                    </li>
                    <li>
                        <a href="#"
                            class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Sign
                            out</a>
                    </li>
                </ul>
            </div>


            <form class="w-80">
                <label for="default-search"
                    class="mb-2 text-sm font-medium text-gray-900 sr-only dark:text-white">Search</label>
                <div class="relative">
                    <div class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none">
                        <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true"
                            xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z" />
                        </svg>
                    </div>
                    <input type="search" id="default-search"
                        class="block w-full p-4 ps-10 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                        placeholder="Search by title,..." required />
                    <button type="submit"
                        class="text-white absolute end-2.5 bottom-2.5 bg-blue-500 hover:bg-blue-600 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-4 py-2 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Search</button>
                </div>
            </form>

        </div>
    </div>
    <div class="flex justify-center pt-5">
        <div style="height:2px;width:80%" class="bg-gray-200">

        </div>

    </div>

    @if (count($events) > 0)
        <div class="p-10 grid grid-cols-1 sm:grid-cols-1 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-5">
            @foreach ($events as $event)
                <div class="flex justify-center">


                    <div class="max-w-xs rounded overflow-hidden shadow-lg w-full">
                        <a href="{{ route('more', $event->id) }}">
                            <div class="relative overflow-hidden cursor-pointer">

                                <img title="More Information"
                                    class="w-full h-40 object-cover object-center transform scale-100 transition-transform duration-300 hover:scale-110"
                                    src="{{ asset('storage/' . $event->image) }}" alt="Event Image">
                                <div
                                    class="absolute inset-0 p-8 flex flex-col items-center justify-center text-center bg-black bg-opacity-50 opacity-0 hover:opacity-100 transition-opacity duration-300">
                                    <strong class="tracking-widest text-sm title-font font-bold text-white mb-1">More
                                        Information</strong>
                                </div>
                            </div>
                        </a>
                        <div class="px-6 py-4">
                            <div class="font-bold text-xl mb-2">{{ $event->title }}</div>
                            <p class="text-gray-700 text-base">{{ $event->description }}</p>
                        </div>
                        <div class="px-6 pt-2 pb-4">
                            <div class="flex justify-between items-center mb-2">
                                <div class="text-sm text-gray-600"><span class="font-medium">Organized by:</span>
                                    {{ $event->user->name }}</div>
                                <div class="text-sm text-gray-600"><span class="font-medium">Tickets Left:</span>
                                    {{ $event->tickets }}</div>
                            </div>
                            <div class="flex justify-between items-center mb-2">
                                <div class="text-sm text-gray-600"><span class="font-medium">Location:</span>
                                    {{ $event->location }}</div>
                                <div class="text-sm text-gray-600"><span class="font-medium">Category:</span>
                                    <button
                                        class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-1 px-2 rounded-full">{{ $event->category->name }}</button>
                                </div>
                            </div>
                            <div class="text-sm text-gray-600"><span class="font-medium">Date:</span> {{ $event->date }}
                            </div>

                            @if ($user && $user->reserveRequests->where('event_id', $event->id)->isNotEmpty())
                                @php
                                    $reserveRequest = $user->reserveRequests->where('event_id', $event->id)->first();
                                    $status = $reserveRequest->status;
                                @endphp

                                @if ($status === 'accepted')
                                    <button
                                        class="w-full bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 mt-4 rounded-full">Reserved</button>
                                    <div style="text-align: center;padding-top:5px">
                                        <a style="font-size: 12px;text-decoration: underline;"
                                            href="{{ route('profile.edit') }}">Get your ticket</a>
                                    </div>
                                @elseif($status === 'pending')
                                    <button type="submit"
                                        class="w-full bg-yellow-500 hover:bg-yellow-700 text-white font-bold py-2 px-4 mt-4 rounded-full">Waiting
                                        Response...</button>
                                @elseif($status === 'rejected')
                                    <button type="submit"
                                        class="w-full bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 mt-4 rounded-full">Organizer Reject Your Request</button>
                                @endif
                            @else
                                <form action="{{ route('reserve.store') }}" method="post">
                                    @csrf
                                    @method('POST')
                                    <input type="hidden" id="event_id" name="event_id" value="{{ $event->id }}">
                                    <button type="submit"
                                        class="w-full bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 mt-4 rounded-full">Reserve</button>
                                </form>
                            @endif


                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    @else
        <div class="flex flex-col items-center mt-8">
            <h1 class="text-xl">There Is No Events For The Moments</h1>
            <img style="width:50%"
                src="https://static.vecteezy.com/system/resources/previews/007/872/974/non_2x/file-not-found-illustration-with-confused-people-holding-big-magnifier-search-no-result-data-not-found-concept-can-be-used-for-website-landing-page-animation-etc-vector.jpg"
                alt="not found">
        </div>
    @endif
    </div>
@endsection
