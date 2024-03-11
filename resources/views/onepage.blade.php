@extends('layout')
@section('content')
<div class="mt-10 ml-12">
    <a href="{{route('home')}}">
          <button type="button" class=" flex items-center justify-center w-40 px-5 py-2 text-sm text-gray-700 transition-colors duration-200 bg-white border rounded-lg gap-x-2 sm:w-auto dark:hover:bg-gray-800 dark:bg-gray-900 hover:bg-gray-100 dark:text-gray-200 dark:border-gray-700">
        <svg class="w-5 h-5 rtl:rotate-180" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" d="M6.75 15.75L3 12m0 0l3.75-3.75M3 12h18" />
        </svg>
        <span>Go back</span>
    </button>  
    </a>

</div>

    <div style="display: flex; justify-content:center"
        class="p-10 grid grid-cols-1 sm:grid-cols-1 md:grid-cols-1 lg:grid-cols-1 xl:grid-cols-1">
        <div class="rounded overflow-hidden shadow-lg" style="width:60%">
            <img sty class="w-full" src="{{ asset('storage/' . $event->image) }}" alt="Forest">
            <div class="px-6 py-4">
                <div class="font-bold text-xl mb-2">{{ $event->title }}</div>
                <p class="text-gray-700 text-base">{{ $event->description }}</p>
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
                    <div class="text-sm text-gray-600"><span class="font-medium">Tickets Left:</span>
                        {{ $event->tickets }}</div>
                </div>
                <div class="flex justify-between items-center mb-2">
                    <div class="text-sm text-gray-600"><span class="font-medium">Category:</span>
                        <button
                            class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-1 px-2 rounded-full">{{ $event->category->name }}</button>
                    </div>
                </div>
                <div class="text-sm text-gray-600"><span class="font-medium">Date:</span> {{ $arr[$event->title] }}
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
                                href="{{ asset('storage/' . $reserveRequest->ticket->pdf) }}" class="btn btn-success"
                                download>download your ticket</a>


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
    </div>
@endsection