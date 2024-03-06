<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function index(){
        $events = Event::get()->where('status','accepted');
        $user = Auth::user();
        return view('home',compact('events','user'));
    }
    public function role(){
        $user = Auth::user();
        $user->role = 'organizer';
        $user->save();
        return view('Admin.dashboard');
    }
    public function more(Event $event){
        return view('onepage',compact('event'));
    }

}
