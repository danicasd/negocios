<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Booking;
use App\Models\Service;
use App\Models\Technician;
use App\Models\User;

class AdminDashboardController extends Controller
{
    public function index()
    {
        $pendingBookings = Booking::where('status', 'pendiente')->count();

        $activeServices = Service::where('status', true)->count();

        $availableTechnicians = Technician::where('status', true)->count();

        $registeredUsers = User::count();

        $latestBookings = Booking::with(['user', 'service', 'technician'])
            ->latest()
            ->take(5)
            ->get();

        return view('admin.dashboard.index', compact(
            'pendingBookings',
            'activeServices',
            'availableTechnicians',
            'registeredUsers',
            'latestBookings'
        ));
    }
}