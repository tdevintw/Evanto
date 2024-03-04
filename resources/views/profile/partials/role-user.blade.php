<section>
    <header>
        <h2 class="text-lg font-medium text-gray-900">
            {{ __('Manage Profil Role') }}
        </h2>


    </header>
    <div class="flex items-center gap-5 pt-3">
        <p>Do You want to be an <b>Organizer</b> ? </p>
        <form action="{{ route('home.role') }}" method="post">
            @csrf
            <button type="submit"
                class="bg-green-600 hover:bg-green-800 text-white font-bold py-2 px-4 rounded-full w-24">
                YES</button>
        </form>

    </div>

</section>
