<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Booking;
use App\Models\Service;
use App\Models\Technician;
use App\Models\User;
use App\Models\Payment;
use App\Models\Review;

class AdminDashboardController extends Controller
{
    public function index()
    {
        $pendingBookings = Booking::where('status', 'pending')->count();

        $activeServices = Service::where('status', true)->count();

        $availableTechnicians = Technician::where('status', true)->count();

        $registeredUsers = User::count();

        $totalBookings = Booking::count();

        $completedBookings = Booking::where('status', 'completed')->count();

        $totalRevenue = Payment::where('status', 'paid')->sum('amount');

        $latestBookings = Booking::with(['user', 'service', 'technician'])
            ->latest()
            ->take(5)
            ->get();

        $bookingsByStatus = [
            'Pendientes' => Booking::where('status', 'pending')->count(),
            'Confirmadas' => Booking::where('status', 'confirmed')->count(),
            'En proceso' => Booking::where('status', 'in_progress')->count(),
            'Completadas' => Booking::where('status', 'completed')->count(),
            'Canceladas' => Booking::where('status', 'cancelled')->count(),
        ];

        $paymentsByStatus = [
            'Pendientes' => Payment::where('status', 'pending')->count(),
            'Pagados' => Payment::where('status', 'paid')->count(),
            'Fallidos' => Payment::where('status', 'failed')->count(),
            'Reembolsados' => Payment::where('status', 'refunded')->count(),
        ];

        $reviewsCount = Review::where('status', true)->count();

        $averageRating = Review::where('status', true)->avg('rating');

        $latestReviews = Review::with(['user', 'booking.service'])
            ->where('status', true)
            ->latest()
            ->take(3)
            ->get();

        return view('admin.dashboard.index', compact(
            'pendingBookings',
            'activeServices',
            'availableTechnicians',
            'registeredUsers',
            'totalBookings',
            'completedBookings',
            'totalRevenue',
            'latestBookings',
            'bookingsByStatus',
            'paymentsByStatus',
            'reviewsCount',
            'averageRating',
            'latestReviews'
        ));
    }
}