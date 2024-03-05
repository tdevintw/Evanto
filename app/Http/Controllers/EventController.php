<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Http\Requests\StoreEventRequest;
use App\Http\Requests\UpdateEventRequest;
use App\Models\Category;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;
  
class EventController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $user = Auth::user();
        $events = Event::all()->where('organizer_id',$user->id);
        return view('Admin.events.index',compact('events','user'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $user = Auth::user();
        $categories = Category::get();
        return view('Admin.events.create',compact('user','categories'));

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreEventRequest $request)
    {
        if($request->has('image')){
            $file = $request->file('image');
            // $extension = $file->getClientOriginalExtension();
            // $filename = time().'.'. $extension ;
            // $file->move('images/events/',$filename);
            $fileName ='images/events/' .  time().'.'.$file->extension();  
            $file->move(public_path('storage/images/events'), $fileName);

        }
        // $user = Auth::user();
        // $id = $user->id ;

        $formattedDateTime = Carbon::parse($request->date)->toDateTimeString();
        Event::create([
            'organizer_id' => $request->organize_id,
            'title' => $request->title,
            'description' => $request->title,
            'date' => $formattedDateTime,
            'location' => $request->location,
            'image' => $fileName,
            'category_id' => $request->category_id,
            'reserve_method' => $request->reserve_method,
            'tickets' => $request->tickets,

        ]);

        return redirect()->route('events.index');

    }

    /**
     * Display the specified resource.
     */
    public function show(Event $event)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Event $event)
    {
        $user = Auth::user();
        $categories = Category::get();

        return view('Admin.events.update',compact('user','categories','event'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateEventRequest $request, Event $event)
    {

 
            $file = $request->file('image');
            $fileName = 'images/events/' . time() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('storage/images/events'), $fileName);



        // Update the event with validated data
        $event->update($request->validated());
        
        $event->image = $fileName;
        $event->save();
        return redirect()->route('events.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Event $event)
    {
 

            $event->delete();
            return redirect()->route('events.index');
 
    }

}
