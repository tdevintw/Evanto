<section>
    <header>
        <h2 class="text-lg font-medium text-gray-900">
            {{ __('Ticket History') }}
        </h2>
    </header>
    <table class="table table-borderless table-hover" style="width:100%">
        <thead>
            <tr>
                <th>ID</th>
                <th>Event</th>
                <th>Created_at</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($tickets as $ticket)
                <tr>
                    <td>{{ $ticket->id }}</td>
                    <td>{{ $ticket->request->event->title }}</td>
                    <td>{{ $ticket->created_at }}</td>
                    <td>
                        <button type="button" class="btn btn-success"
                           >Get Ticket</button>
                    </td>
                </tr>
            @endforeach

        </tbody>
    </table>
    @if (count($tickets)==0)
    <h3 style="text-align: center">There is no records for the moment</h3>    
    @endif
    
</section>
