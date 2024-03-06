<?php

namespace App\Http\Controllers;

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
 
        Ticket::create([
            'user_id' => $user,
            'request_id' => $request_id
        ]);
        $event = Event::where('id',$event_id)->first();
        $event->tickets = $event->tickets - 1;
        $event->save();
        if(Auth::user()->role =='organizer'){
            return redirect()->route('reserve.index');
        }elseif(Auth::user()->role =='user'){
            return redirect()->route('profile.edit');
        }
    
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
