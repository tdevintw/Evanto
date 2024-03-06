<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Tailwind CSS -->
    <link href="https://unpkg.com/tailwindcss@^1.0/dist/tailwind.min.css" rel="stylesheet">


    <title>Tailwind CSS CDN</title>
</head>

<body>


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
                <div class="text-sm text-gray-600"><span class="font-medium">Date:</span> {{ $event->date }}
                </div>
                <form action="{{ route('reserve.store') }}" method="post">
                    @csrf
                    @method('POST')
                    <input type="hidden" id="event_id" name="event_id" value="{{ $event->id }}">
                    <button type="submit"
                        class="w-full bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 mt-4 rounded-full">Reserve</button>
                </form>
            </div>
        </div>
    </div>
    </div>

</body>

</html>
