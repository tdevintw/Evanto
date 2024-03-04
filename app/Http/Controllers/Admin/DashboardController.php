<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreDashboardRequest;
use App\Http\Requests\UpdateDashboardRequest;
use App\Models\Category;
use App\Models\Event;
use App\Models\Ticket;
use App\Models\User;
// use Illuminate\Http\Client\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;




class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = Auth::user();
        $users = User::all();
        $tickets = Ticket::all();
        $categories = Category::all();
        $events = Event::all();
        return view('Admin.dashboard',compact('user','users','tickets','categories','events'));

    }
    public function users()
    {
        $user = Auth::user();
        $users = User::all();
        return view('Admin.users',compact('user','users'));

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
}
