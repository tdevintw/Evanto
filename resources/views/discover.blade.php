@extends('layout')
@section('content')

    <div class="flex justify-center mt-20">
        <div class="flex items-center justify-center gap-2 border-solid border-2 border-gray-300 rounded-lg w-fit p-4">

            <form class="max-w-lg mx-auto" id="searchForm" action="{{ route('events.search') }}" method="GET">
                <div class="flex">
                    <label for="search-dropdown" class="mb-2 text-sm font-medium text-gray-900 sr-only dark:text-white">Your
                        Email</label>
                    <button id="dropdown-button" data-dropdown-toggle="dropdown"
                        class="flex-shrink-0 z-10 inline-flex items-center py-2.5 px-4 text-sm font-medium text-center text-gray-900 bg-gray-100 border border-gray-300 rounded-s-lg hover:bg-gray-200 focus:ring-4 focus:outline-none focus:ring-gray-100 dark:bg-gray-700 dark:hover:bg-gray-600 dark:focus:ring-gray-700 dark:text-white dark:border-gray-600"
                        type="button">All categories <svg class="w-2.5 h-2.5 ms-2.5" aria-hidden="true"
                            xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="m1 1 4 4 4-4" />
                        </svg></button>
                    <div style="position: absolute;margin-top:50px" id="dropdown"
                        class="z-10 hidden bg-white divide-y divide-gray-100 rounded-lg shadow w-44 dark:bg-gray-700">
                        <ul class="py-2 text-sm text-gray-700 dark:text-gray-200" aria-labelledby="dropdown-button">
                            @foreach ($categories as $category)
                                <li>
                                    <a href="{{ route('events.category', $category->id) }}"><button type="button"
                                            class="inline-flex w-full px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">{{ $category->name }}</button>
                                </li></a>
                            @endforeach

                        </ul>
                    </div>
                    <div class="relative w-full">
                        <input type="text" name="search" placeholder="Search by title,location..."
                            class="block p-2.5 w-full z-20 text-sm text-gray-900 bg-gray-50 rounded-e-lg border-s-gray-50 border-s-2 border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-s-gray-700  dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:border-blue-500"
                            placeholder="Search Mockups, Logos, Design Templates..." required />
                        <button type="submit"
                            class="absolute top-0 end-0 p-2.5 text-sm font-medium h-full text-white bg-blue-700 rounded-e-lg border border-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                            <svg class="w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                                viewBox="0 0 20 20">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z" />
                            </svg>
                            <span class="sr-only">Search</span>
                        </button>
                    </div>
                </div>
            </form>


        </div>

    </div>

    <form action="{{ route('date') }}" method="get">
        <div class="flex flex-col items-center sm:flex-row justify-center mt-7 gap-4">
            @method('GET')
            <div date-rangepicker class="flex items-center">
                <div class="relative">
                    <div class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none">
                        <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true"
                            xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                            <path
                                d="M20 4a2 2 0 0 0-2-2h-2V1a1 1 0 0 0-2 0v1h-3V1a1 1 0 0 0-2 0v1H6V1a1 1 0 0 0-2 0v1H2a2 2 0 0 0-2 2v2h20V4ZM0 18a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V8H0v10Zm5-8h10a1 1 0 0 1 0 2H5a1 1 0 0 1 0-2Z" />
                        </svg>
                    </div>
                    <input name="start" type="text"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full ps-10 p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                        placeholder="Select date start">
                </div>
                <span class="mx-4 text-gray-500">to</span>
                <div class="relative">
                    <div class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none">
                        <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true"
                            xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                            <path
                                d="M20 4a2 2 0 0 0-2-2h-2V1a1 1 0 0 0-2 0v1h-3V1a1 1 0 0 0-2 0v1H6V1a1 1 0 0 0-2 0v1H2a2 2 0 0 0-2 2v2h20V4ZM0 18a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V8H0v10Zm5-8h10a1 1 0 0 1 0 2H5a1 1 0 0 1 0-2Z" />
                        </svg>
                    </div>
                    <input name="end" type="text"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full ps-10 p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                        placeholder="Select date end">
                </div>
            </div>
            <div>


                <button type="submit"
                    class="  bg-blue-500 hover:bg-blue-400 text-white font-bold py-2 px-4 border-b-4 border-blue-700 hover:border-blue-500 rounded ">
                    Filter By date
                </button>
            </div>

        </div>
    </form>
    @if ($errors->any())
        <div class="alert alert-danger text-center mt-5">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

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
                        </div>
                        <div class="px-6 pt-2 pb-4">
                            <div class="flex justify-between items-center mb-2">
                                <div class="text-sm text-gray-600"><span class="font-medium">Organized by:</span>
                                    {{ $event->user->name }}</div>

                            </div>
                            <div class="flex justify-between items-center mb-2">
                                <div class="text-sm text-gray-600"><span class="font-medium">Location:</span>
                                    {{ $event->location }}</div>
                            </div>
                            <div class="flex justify-between items-center mb-2">
                                <div class="text-sm text-gray-600"><span class="font-medium">Left Tikcets:</span>
                                    {{ $event->tickets }}</div>
                            </div>
                            <div class="text-sm text-gray-600"><span class="font-medium">Date:</span>
                                {{ $arr[$event->title] }}
                            </div>

                            @if ($user && $user->acces == 'banned' && $user->role != 'admin')
                                <p class="w-full  text-red-500 font-bold py-2 px-4 mt-4">You
                                    Are Banned from reserving </p>
                            @elseif ($user && $user->role != 'admin' && $user->reserveRequests->where('event_id', $event->id)->isNotEmpty())
                                @php
                                    $reserveRequest = $user->reserveRequests->where('event_id', $event->id)->first();
                                    $status = $reserveRequest->status;
                                @endphp

                                @if ($status === 'accepted')
                                    <button
                                        class="w-full bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 mt-4 rounded-full">Reserved</button>
                                    <div style="text-align: center;padding-top:5px">
                                        <a style="font-size: 12px;text-decoration: underline;"
                                            href="{{ asset('storage/' . $reserveRequest->ticket->pdf) }}"
                                            class="btn btn-success" download>download your ticket</a>


                                    </div>
                                @elseif($status === 'pending')
                                    <button type="submit"
                                        class="w-full bg-yellow-500 hover:bg-yellow-700 text-white font-bold py-2 px-4 mt-4 rounded-full">Waiting
                                        Response...</button>
                                @elseif($status === 'rejected')
                                    <button type="submit"
                                        class="w-full bg-gray-500 hover:bg-gray-700 text-white font-bold py-2 px-4 mt-4 rounded-full">Organizer
                                        Reject Your Request</button>
                                @endif
                            @elseif($user && $user->role != 'admin')
                                <form action="{{ route('reserve.store') }}" method="post">
                                    @csrf
                                    @method('POST')
                                    <input type="hidden" id="event_id" name="event_id" value="{{ $event->id }}">
                                    <button type="submit"
                                        class="w-full bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 mt-4 rounded-full">Reserve</button>
                                </form>
                            @elseif(!$user)
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
            <h1 class="text-xl">Nothing Found</h1>
            <img style="width:50%"
                src="https://static.vecteezy.com/system/resources/previews/007/872/974/non_2x/file-not-found-illustration-with-confused-people-holding-big-magnifier-search-no-result-data-not-found-concept-can-be-used-for-website-landing-page-animation-etc-vector.jpg"
                alt="not found">
        </div>
    @endif

    </div>

@endsection
