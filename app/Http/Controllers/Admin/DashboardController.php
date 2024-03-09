<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreDashboardRequest;
use App\Http\Requests\UpdateDashboardRequest;
use App\Models\Category;
use App\Models\Event;
use App\Models\ReserveRequest;
use App\Models\Ticket;
use App\Models\User;
// use Illuminate\Http\Client\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = Auth::user();
        $users = User::all();
        $tickets = Ticket::count();
        $categories = Category::count();
        $events = Event::count();
        $bans = $users->where('acces','banned')->count();
        $users = $users->count();
        $public =Event::where('reserve_method','default')->count();
        $private = Event::where('reserve_method','request')->count();

        $accept = ReserveRequest::where('status','accepted')->count();
        $reject = ReserveRequest::where('status','rejected')->count();
        if($accept+$reject != 0){
            $rate = (($accept) /($accept+$reject)) * 100 ;
            $rate = number_format($rate, 1) . "%";
        }else {

            $rate = "No record";
        }
      
        // rate launch

        

        $accept = Event::where('status','accepted')->count();
        $reject = Event::where('status','rejected')->count();

        if($accept+$reject != 0){
            $rateE = (($accept) /($accept+$reject)) * 100 ;
            $rateE = number_format($rateE, 1) . "%";
        }else {

            $rateE = "No record";
        }

      

        //orgnaizer info

        $eventsUser = Event::where('organizer_id',$user->id)->count();
        $eventsRequests = ReserveRequest::wherehas('event', function($query){
            $query->where('organizer_id',Auth::user()->id);
        })->count();

        $uniqueUsers = ReserveRequest::where('status','accepted')->wherehas('event', function ($query){
            $query->where('organizer_id','=',Auth::user()->id);
        })->distinct('user_id')->count();
        
        $unqiueTickets = ReserveRequest::where('status','accepted')->wherehas('event', function ($query){
            $query->where('organizer_id','=',Auth::user()->id);
        })->count();
        
        $publicUnique = Event::where('organizer_id',$user->id)->where('reserve_method','default')->count();
        $privateUnique = Event::where('organizer_id',$user->id)->where('reserve_method','request')->count();

        //accept rate organizer 

        $accept = ReserveRequest::where('status','accepted')->whereHas('event', function ($query){
            $query->where('organizer_id',Auth::user()->id);
        })->count();
        $reject = ReserveRequest::where('status','rejected')->whereHas('event', function ($query){
            $query->where('organizer_id',Auth::user()->id);
        })->count();
        if($accept+$reject != 0){
            $rateU = (($accept) /($accept+$reject)) * 100 ;
            $rateU = number_format($rateU, 1) . "%";
        }else {

            $rateU = "No record";
        }
      
        // rate launch

        

        $accept = Event::where('status','accepted')->where('organizer_id',Auth::user()->id)->count();

        $reject =Event::where('status','rejected')->where('organizer_id',Auth::user()->id)->count();

        if($accept+$reject != 0){
            $rateEU = (($accept) /($accept+$reject)) * 100 ;
            $rateEU = number_format($rateEU, 1) . "%";
        }else {

            $rateEU = "No record";
        }



        return view('Admin.dashboard',compact('user','users','tickets','categories','events','bans','public','private','rate','rateE','eventsUser','eventsRequests','uniqueUsers','unqiueTickets','privateUnique','publicUnique','rateU','rateEU'));

    }
    public function users()
    {
        $user = Auth::user();
        $users = User::all();
        return view('Admin.users.users',compact('user','users'));

    }
        public function acces(Request $request)
    {
        
        $user = User::find($request->id) ;

        if($user->acces =='authorized'){
                  $user->acces = 'banned';  
        }else{
            $user->acces = 'authorized'; 
        }

        $user->save();
        return redirect()->route('dashboard.users');

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
    public function store(StoreDashboardRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Dashboard $Dashboard)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Dashboard $Dashboard)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateDashboardRequest $request, Dashboard $Dashboard)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Dashboard $Dashboard)
    {
        //
    }

    public function events(){

        $events = Event::where('status','pending')->get();
        $user = Auth::user();
        return view('Admin.events.Requests',compact('user','events'));
    }

    public function accept(Event $event){
        $event->status = 'accepted';
        $event->save();
        return redirect()->route('requests');
    }
    public function reject(Event $event){

        $event->status = 'rejected';
        $event->save();
        return redirect()->route('requests');
    }


}
