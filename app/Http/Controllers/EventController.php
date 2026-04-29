<?php

namespace App\Http\Controllers;

use App\Models\Event;

class EventController extends Controller
{
    public function index()
    {
        $upcoming = Event::where('is_active', true)->where('starts_at', '>=', now())->orderBy('starts_at')->get();
        $past = Event::where('is_active', true)->where('starts_at', '<', now())->orderByDesc('starts_at')->paginate(10);
        return view('events.index', compact('upcoming', 'past'));
    }
}
