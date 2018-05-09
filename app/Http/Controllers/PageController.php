<?php

namespace App\Http\Controllers;

use App\Event;
use Illuminate\Http\Request;

class PageController extends Controller
{
    public function index(){
        
        $events = Event::orderBy('created_at', 'desc')->paginate(5);

        return view('home', compact('events'));
    }
}
