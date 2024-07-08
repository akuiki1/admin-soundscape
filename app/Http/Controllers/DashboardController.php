<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Event;
use App\Models\User;
use App\Models\Venue;

class DashboardController extends Controller
{
    public function index()
    {
        $totalEvents = Event::count();
        $totalUsers = User::count();
        $totalVenues = Venue::count();
        $events = Event::latest()->take(4)->get();
        $recentEvents = Event::latest()->take(4)->get();

        return view('dashboard', compact('totalEvents', 'totalUsers', 'totalVenues', 'recentEvents', 'events'));
    }
}
