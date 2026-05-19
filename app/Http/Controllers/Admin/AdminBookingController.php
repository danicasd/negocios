<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Booking;
use App\Models\Technician;
use Illuminate\Http\Request;
use App\Mail\BookingConfirmedMail;
use Illuminate\Support\Facades\Mail;

class AdminBookingController extends Controller
{
    /**
     * Mostrar todas las solicitudes.
     */
    public function index()
    {
        $bookings = Booking::with(['user', 'service', 'address', 'technician'])
            ->latest()
            ->get();

        return view('admin.bookings.index', compact('bookings'));
    }

    /**
     * Mostrar el detalle de una solicitud.
     */
    public function show(Booking $booking)
    {
        $booking->load(['user', 'service', 'address', 'technician', 'options', 'payments']);

        $technicians = Technician::where('status', true)
            ->orderBy('name')
            ->get();

        return view('admin.bookings.show', compact('booking', 'technicians'));
    }

    /**
     * Asignar técnico a una solicitud.
     */
    public function assignTechnician(Request $request, Booking $booking)
    {
        $request->validate([
            'technician_id' => 'required|exists:technicians,id',
        ]);

        $booking->update([
            'technician_id' => $request->technician_id,
            'status' => 'confirmed',
        ]);

        $booking->load(['user', 'service', 'technician']);

        if ($booking->user && $booking->user->email) {
            Mail::to($booking->user->email)->send(new BookingConfirmedMail($booking));
        }

        return redirect()
            ->route('admin.bookings.show', $booking)
            ->with('success', 'Técnico asignado correctamente. Se envió una notificación al cliente.');
    }

    /**
     * Actualizar estado de una solicitud.
     */
    public function updateStatus(Request $request, Booking $booking)
    {
        $request->validate([
            'status' => 'required|string|in:pending,confirmed,in_progress,completed,cancelled',
        ]);

        $booking->update([
            'status' => $request->status,
        ]);

        if ($request->status === 'completed') {
            $booking->update([
                'payment_status' => 'paid',
            ]);

            $booking->payments()->update([
                'status' => 'paid',
                'paid_at' => now(),
            ]);
        }

        if ($request->status === 'cancelled') {
            $booking->update([
                'payment_status' => 'refunded',
                'cancelled_at' => now(),
            ]);

            $booking->payments()->update([
                'status' => 'refunded',
            ]);
        }

        return redirect()
            ->route('admin.bookings.show', $booking)
            ->with('success', 'Estado actualizado correctamente.');
    }

    /**
     * Cancelar una solicitud.
     */
    public function cancel(Request $request, Booking $booking)
    {
        $request->validate([
            'cancellation_reason' => 'nullable|string|max:1000',
        ]);

        $booking->update([
            'status' => 'cancelled',
            'payment_status' => 'refunded',
            'cancellation_reason' => $request->cancellation_reason,
            'cancelled_at' => now(),
        ]);

        $booking->payments()->update([
            'status' => 'refunded',
        ]);

        return redirect()
            ->route('admin.bookings.show', $booking)
            ->with('success', 'Solicitud cancelada correctamente.');
    }
}