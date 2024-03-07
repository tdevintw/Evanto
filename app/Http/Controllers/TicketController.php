<?php

namespace App\Http\Controllers;
use Dompdf\Dompdf;
use Illuminate\Support\Facades\Storage;

use App\Models\Ticket;
use App\Http\Requests\StoreTicketRequest;
use App\Http\Requests\UpdateTicketRequest;
use App\Models\Event;
use Illuminate\Support\Facades\Auth;

class TicketController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

        // Retrieving $request_id from session
        $request_id = session('request_id');
        $request_user_id = session('request_user_id');
        $event_id = session('event_id');
        // Destroying $request_id from session
        session()->forget('request_id');
        session()->forget('request_user_id');
        session()->forget('event_id');
        $user = $request_user_id;
 
       $ticket =  Ticket::create([
            'user_id' => $user,
            'request_id' => $request_id
        ]);

        


        $event = Event::where('id',$event_id)->first();
        $event->tickets = $event->tickets - 1;
        $event->save();

        $pdfContent = $this->generatePdf($ticket);

        // Save PDF to storage
        $pdfPath = 'pdf/' . uniqid() . '.pdf';
        Storage::disk('public')->put($pdfPath, $pdfContent);

        // Update ticket record with PDF path
        $ticket->pdf = $pdfPath;
        $ticket->save();


        if(Auth::user()->role =='organizer'){
            return redirect()->route('reserve.index');
        }elseif(Auth::user()->role =='user'){
            return redirect()->route('profile.edit');
        }
    
    }
    private function generatePdf($ticket)
{
    $event = $ticket->request->event;

    $html = '
    <style>
        .ticket {
            width: 400px;
            padding: 20px;
            border: 2px solid #333;
            border-radius: 10px;
            margin: auto;
        }
        .event-title {
            font-size: 24px;
            font-weight: bold;
            margin-bottom: 10px;
        }
        .ticket-owner {
            font-size: 18px;
            margin-bottom: 5px;
        }
        .ticket-details {
            margin-bottom: 10px;
        }
        .ticket-details p {
            margin: 5px 0;
        }
        .ticket-image {
            width: 100%;
            max-height: 200px;
            margin-bottom: 10px;
            border-radius: 5px;
        }
    </style>
    <div class="ticket">
        <div class="event-title">' . $event->title . '</div>
        <img src="' . $event->image . '" class="ticket-image" alt="Event Image">
        <div class="ticket-owner">Ticket Owner: ' . $ticket->user->name . '</div>
        <div class="ticket-details">
            <p>Date: ' . $event->date . '</p>
            <p>Location: ' . $event->location . '</p>
        </div>
    </div>';

    
    $dompdf = new Dompdf();
    $dompdf->loadHtml($html);
    $dompdf->setPaper('A4', 'portrait');
    $dompdf->render();
    return $dompdf->output();
}

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreTicketRequest $request)
    {

    }

    /**
     * Display the specified resource.
     */
    public function show(Ticket $ticket)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Ticket $ticket)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateTicketRequest $request, Ticket $ticket)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Ticket $ticket)
    {
        //
    }
}
