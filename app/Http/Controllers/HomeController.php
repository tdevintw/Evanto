<?php

namespace App\Http\Controllers;

use App\Http\Requests\DateRequest;
use App\Http\Requests\TestRequest;
use App\Models\Category;
use App\Models\Event;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{

    public function index()
    {
        $dateTime = Carbon::createFromTimestamp(time());
        $events = Event::where('status', 'accepted')->where('date', '>', $dateTime)->where('tickets', '>', 0)->paginate(10);
        $user = Auth::user();
        $categories = Category::get();
        // $arr = [];
        // foreach($categories as $cat){
        //     $arr["reserved"] = grgerre
        //     $arr["name"] = $cat-

        // }
        // $arr;

        return view('home', compact('events', 'user', 'categories'));
    }
    public function role()
    {
        $user = Auth::user();
        $user->role = 'organizer';
        $user->save();
        return redirect()->route('dashboard.index');
    }
    public function more(Event $event)
    {
        $user = Auth::user();
        return view('onepage', compact('event', 'user'));
    }

    public function search(Request $request)
    {

        $dateTime = Carbon::createFromTimestamp(time());
        $search = $request->input('search');
        $events = Event::where('status', 'accepted')
            ->where('title', 'like', '%' . $search . '%')
            ->where('date', '>', $dateTime)
            ->where('tickets', '>', 0)
            ->get();

        $user = Auth::user();
        $categories = Category::get();
        return view('discover', compact('events', 'user', 'categories'));
    }

    public function category($id)
    {

        $dateTime = Carbon::createFromTimestamp(time());
        $events = Event::where('status', 'accepted')
            ->where('category_id', 'like', '%' . $id . '%')
            ->where('date', '>', $dateTime)
            ->where('tickets', '>', 0)
            ->get();

        $user = Auth::user();
        $categories = Category::get();
        return view('discover', compact('events', 'user', 'categories'));
    }
    public function discover()
    {
        $dateTime = Carbon::createFromTimestamp(time());
        $events = Event::where('status', 'accepted')
            ->where('date', '>', $dateTime)
            ->where('tickets', '>', 0)
            ->get();

        $user = Auth::user();
        $categories = Category::get();
        return view('discover', compact('events', 'user', 'categories'));
    }
    public function date(Request $request)
    {

        $start  = $request->start;
        $end = $request->end;
        $start = Carbon::parse($start)->startOfDay();
        $end = Carbon::parse($end)->startOfDay();

        $events = Event::where('status', 'accepted')
            ->where('date', '>=', $start)
            ->where('date', '<=', $end)
            ->where('tickets', '>', 0)
            ->get();

        $user = Auth::user();
        $categories = Category::get();
        $time = time();

        $time = Carbon::createFromTimestamp($time);
        $timeY = $time->addYear(1);
         $request->validate([
            'start' => 'required',
            'end'  => 'required',
            'start' => 'after:'.$time,
            'end'  => 'before:'.$timeY,
            
 
        ], [
            'start.required' => 'Start date cant be null',
            'end.required' => 'Ending date cant be null',
            'start.after' => 'past date is invalid',
            'end.before' => 'max is 1 year further',
        ]);

        return view('discover', compact('events', 'user', 'categories'));


    }
}
