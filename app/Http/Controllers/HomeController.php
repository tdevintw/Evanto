<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function index(){
        $events = Event::get()->where('status','accepted');
        return view('home',compact('events'));
    }
    public function role(){
        $user = Auth::user();
        $user->role = 'organizer';
        $user->save();
        return view('Admin.dashboard');
    }

}
