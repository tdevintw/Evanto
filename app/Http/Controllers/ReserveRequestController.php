<?php

namespace App\Http\Controllers;

use App\Models\ReserveRequest;
use App\Http\Requests\StoreReserveRequestRequest;
use App\Http\Requests\UpdateReserveRequestRequest;
use App\Models\Event;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ReserveRequestController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = Auth::user();
        $requests = ReserveRequest::where('status','pending')
        ->whereHas('event',function ($query) use ($user){
            $query->where('organizer_id',$user->id);
        })->get();

        return view('Admin.events.reserve', compact('requests','user'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $event_id = $request->event_id;
        $id = Auth::user()->id;
        $event = Event::find($event_id);
        if ($event->reserve_method == 'default') {
            $newRequest =  ReserveRequest::create([
                'user_id' => $id,
                'event_id' => $event_id,
                'status' => 'accepted'
            ]);
            $request_id = $newRequest->id;
            session(['request_id' => $request_id]);
            return redirect()->route('ticket.create');
        } else {

            ReserveRequest::create([
                'user_id' => $id,
                'event_id' => $event->id,

            ]);

            return redirect()->route('home');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(ReserveRequest $reserveRequest)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(ReserveRequest $reserveRequest)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateReserveRequestRequest $request, ReserveRequest $reserveRequest)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ReserveRequest $reserveRequest)
    {
        //
    }

    public function accept(ReserveRequest $reserve){

        $reserve->status = 'accepted';
        $reserve->save();
        $request_id = $reserve->id;
        $request_user_id = $reserve->user_id;
        session(['request_id' => $request_id]);
        session(['request_user_id' => $request_user_id]);
        return redirect()->route('ticket.create');
    }
    public function reject(ReserveRequest $reserve){

        $reserve->status = 'rejected';
        $reserve->save();

            return redirect()->route('reserve.index');
      
    }
}
