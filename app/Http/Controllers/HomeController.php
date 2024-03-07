<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Event;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{

    public function index(){
        $dateTime = Carbon::createFromTimestamp(time());
        $events = Event::get()->where('status','accepted')->where('date','>',$dateTime);
        $user = Auth::user();
        $categories = Category::get();
        return view('home',compact('events','user','categories'));
    }
    public function role(){
        $user = Auth::user();
        $user->role = 'organizer';
        $user->save();
        return redirect()->route('dashboard.index');
    }
    public function more(Event $event){
        return view('onepage',compact('event'));
    }

    public function search(Request $request) {

        $dateTime = Carbon::createFromTimestamp(time());
        $search = $request->input('search');
        $events = Event::where('status', 'accepted')
                       ->where('title', 'like', '%' . $search . '%')
                       ->where('date','>',$dateTime)
                       ->get();
        
        $user = Auth::user();
        $categories = Category::get();
        return view('home',compact('events','user','categories'));
        
    }

    public function category($id) {
        
        $dateTime = Carbon::createFromTimestamp(time());
        $events = Event::where('status', 'accepted')
                       ->where('category_id', 'like', '%' . $id . '%')
                       ->where('date','>',$dateTime)
                       ->get();
        
        $user = Auth::user();
        $categories = Category::get();
        return view('home',compact('events','user','categories'));
        
    }
    
    
    
}
