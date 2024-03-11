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

        $arr = [];

        foreach ($events as $event) :
            $inputDate = $event->date;
            $carbonDate = Carbon::parse($inputDate);
            $outputFormat = 'D, M d • h:i A';
            $outputDate = $carbonDate->format($outputFormat);
            $arr[$event->title] =   $outputDate;
        endforeach;
        return view('home', compact('events', 'user', 'categories', 'arr'));
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
        $categories = Category::get();
        $arr = [];


        $inputDate = $event->date;
        $carbonDate = Carbon::parse($inputDate);
        $outputFormat = 'D, M d • h:i A';
        $outputDate = $carbonDate->format($outputFormat);
        $arr[$event->title] =   $outputDate;

        return view('onepage', compact('event', 'user', 'categories', 'arr'));
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



        $arr = [];

        foreach ($events as $event) :
            $inputDate = $event->date;
            $carbonDate = Carbon::parse($inputDate);
            $outputFormat = 'D, M d • h:i A';
            $outputDate = $carbonDate->format($outputFormat);
            $arr[$event->title] =   $outputDate;
        endforeach;

        return view('discover', compact('events', 'user', 'categories', 'arr'));
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


        $arr = [];

        foreach ($events as $event) :
            $inputDate = $event->date;
            $carbonDate = Carbon::parse($inputDate);
            $outputFormat = 'D, M d • h:i A';
            $outputDate = $carbonDate->format($outputFormat);
            $arr[$event->title] =   $outputDate;
        endforeach;

        return view('discover', compact('events', 'user', 'categories', 'arr'));
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



        $arr = [];

        foreach ($events as $event) :
            $inputDate = $event->date;
            $carbonDate = Carbon::parse($inputDate);
            $outputFormat = 'D, M d • h:i A';
            $outputDate = $carbonDate->format($outputFormat);
            $arr[$event->title] =   $outputDate;
        endforeach;

        return view('discover', compact('events', 'user', 'categories', 'arr'));
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

        $time = Carbon::now()->toDateString();
        $timeY = Carbon::now()->addYear(1)->toDateString();

        $request->validate([
            'start' => 'required',
            'end'  => 'required',
            'start' => 'after_or_equal:' . $time,
            'end'  => 'before_or_equal:' . $timeY,


        ], [
            'start.required' => 'Start date cant be null',
            'end.required' => 'Ending date cant be null',
            'start.after_or_equal' => 'past date is invalid',
            'end.before_or_equal' => 'max is 1 year further',
        ]);



        $arr = [];

        foreach ($events as $event) :
            $inputDate = $event->date;
            $carbonDate = Carbon::parse($inputDate);
            $outputFormat = 'D, M d • h:i A';
            $outputDate = $carbonDate->format($outputFormat);
            $arr[$event->title] =   $outputDate;
        endforeach;

        return view('discover', compact('events', 'user', 'categories', 'arr'));
    }
}
