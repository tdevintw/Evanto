<section>
    <header>
        <h2 class="text-lg font-medium text-gray-900">
            {{ __('Reseravtions History') }}
        </h2>
    </header>
    <table class="table table-borderless table-hover" style="width:100%">
        <thead>
            <tr>
                <th>ID</th>
                <th>Event</th>
                <th>Status</th>
                <th>Created_at</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($requests as $request)
                <tr>
                    <td>{{ $request->id }}</td>
                    <td>{{ $request->event->title }}</td>
                    <td>{{ $request->status }}</td>
                    <td>{{ $request->created_at }}</td>
                </tr>
            @endforeach

        </tbody>
    </table>
    @if (count($requests)==0)
    <h3 style="text-align: center">There is no records for the moment</h3>    
    @endif
    
</section>
