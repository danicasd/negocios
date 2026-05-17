<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Payment;

class AdminPaymentController extends Controller
{
    public function index()
    {
        $payments = Payment::with([
                'booking.user',
                'booking.service'
            ])
            ->latest()
            ->get();

        return view('admin.payments.index', compact('payments'));
    }
}