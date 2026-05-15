<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Booking;
use App\Models\Technician;
use Illuminate\Http\Request;

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
        $booking->load(['user', 'service', 'address', 'technician', 'options', 'payment']);

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
            'status' => 'confirmada',
        ]);

        return redirect()
            ->route('admin.bookings.show', $booking)
            ->with('success', 'Técnico asignado correctamente.');
    }

    /**
     * Actualizar estado de una solicitud.
     */
    public function updateStatus(Request $request, Booking $booking)
    {
        $request->validate([
            'status' => 'required|string|in:pendiente,confirmada,en_proceso,completada,cancelada',
        ]);

        $booking->update([
            'status' => $request->status,
        ]);

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
            'status' => 'cancelada',
            'cancellation_reason' => $request->cancellation_reason,
            'cancelled_at' => now(),
        ]);

        return redirect()
            ->route('admin.bookings.show', $booking)
            ->with('success', 'Solicitud cancelada correctamente.');
    }
}