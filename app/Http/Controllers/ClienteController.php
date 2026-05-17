<?php

namespace App\Http\Controllers;
use App\Models\Category;
use App\Models\Service;
use App\Models\Address;
use App\Models\Booking;
use App\Models\Payment;
use App\Models\Review;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use Illuminate\Http\Request;

class ClienteController extends Controller
{
    public function dashboard()
    {
        $userId = Auth::id();

        $nextBooking = Booking::with(['service', 'address', 'payments'])
            ->where('user_id', $userId)
            ->whereIn('status', ['pending', 'confirmed', 'in_progress'])
            ->where('scheduled_at', '>=', now())
            ->orderBy('scheduled_at', 'asc')
            ->first();

        $pendingCount = Booking::where('user_id', $userId)
            ->where('status', 'pending')
            ->count();

        $completedCount = Booking::where('user_id', $userId)
            ->where('status', 'completed')
            ->count();

        $cancelledCount = Booking::where('user_id', $userId)
            ->where('status', 'cancelled')
            ->count();

        $recentBookings = Booking::with(['service', 'address', 'payments'])
            ->where('user_id', $userId)
            ->latest()
            ->take(3)
            ->get();

        return view('cliente.dashboard', compact(
            'nextBooking',
            'pendingCount',
            'completedCount',
            'cancelledCount',
            'recentBookings'
        ));
    }


    public function catalogo()
    {
        $categorias = Category::with('services')->get();

        return view('cliente.catalogo', compact('categorias'));
    }

    
   public function cotizar(Service $servicio)
    {
        return view('cliente.cotizar', compact('servicio'));
    }

    public function guardarCotizacion(Request $request, Service $servicio)
    {
        $data = $request->validate([
            'urgencia' => 'required|numeric',
            'complejidad' => 'required|numeric',
            'zona' => 'required|numeric',
        ]);

        $precioBase = $servicio->base_price; // cambia si tu columna se llama diferente

        $total = $precioBase
            + $data['urgencia']
            + $data['complejidad']
            + $data['zona'];

        session([
            'cotizacion' => [
                'service_id' => $servicio->id,
                'service_name' => $servicio->name,
                'precio_base' => $precioBase,
                'urgencia' => $data['urgencia'],
                'complejidad' => $data['complejidad'],
                'zona' => $data['zona'],
                'total' => $total,
            ]
        ]);

        return redirect()->route('cliente.direccion');
    }

    public function direccion()
    {
        $direcciones = Address::where('user_id', auth()->id())->get();

        return view('cliente.direccion', compact('direcciones'));
    }

    public function guardarDireccion(Request $request)
    {
        // SI seleccionó dirección guardada
        if ($request->filled('address_id')) {

            session([
                'address_id' => $request->address_id
            ]);

            return redirect()->route('cliente.agendar');
        }

        // SI agregó nueva dirección
        $data = $request->validate([
            'calle' => 'required|string|max:255',
            'estado' => 'required|string|max:100',
            'colonia' => 'required|string|max:255',
            'alcaldia' => 'required|string|max:255',
            'postal_code' => 'required|string|max:10',
            'external_number' => 'required|string|max:20',
            'internal_number' => 'nullable|string|max:20',
            'references' => 'nullable|string|max:500',
        ]);

        $data['user_id'] = auth()->id();

        $address = Address::create($data);

        session([
            'address_id' => $address->id
        ]);

        return redirect()->route('cliente.agendar');
    }

    public function agendar()
    {
        $cotizacion = session('cotizacion');
        $address = Address::find(session('address_id'));

        if (!$cotizacion || !$address) {
            return redirect()->route('cliente.catalogo');
        }

        return view('cliente.agendar', compact('cotizacion', 'address'));
    }

    public function guardarAgenda(Request $request)
    {
        $data = $request->validate([
            'fecha' => 'required|date|after_or_equal:today',
            'hora' => 'required|string',
            'comentarios' => 'nullable|string|max:500',
        ]);

        session([
            'agenda' => $data,
        ]);

        return redirect()->route('cliente.checkout');
    }

    public function checkout()
    {
        $cotizacion = session('cotizacion');
        $agenda = session('agenda');
        $address = Address::find(session('address_id'));

        if (!$cotizacion || !$agenda || !$address) {
            return redirect()->route('cliente.catalogo');
        }

        return view('cliente.checkout', compact('cotizacion', 'agenda', 'address'));
    }

    public function pago()
    {
        $cotizacion = session('cotizacion');
        $agenda = session('agenda');
        $address = Address::find(session('address_id'));

        if (!$cotizacion || !$agenda || !$address) {
            return redirect()->route('cliente.catalogo');
        }

        $depositAmount = $cotizacion['total'] * 0.20;
        $remainingAmount = $cotizacion['total'] - $depositAmount;

        return view('cliente.pago', compact(
            'cotizacion',
            'agenda',
            'address',
            'depositAmount',
            'remainingAmount'
        ));
    }

    public function confirmarPago(Request $request)
    {
        $request->validate([
            'payment_method' => 'required|in:card,transfer',
        ]);

        $cotizacion = session('cotizacion');
        $agenda = session('agenda');
        $addressId = session('address_id');

        if (!$cotizacion || !$agenda || !$addressId) {
            return redirect()->route('cliente.catalogo');
        }

        $depositAmount = $cotizacion['total'] * 0.20;

        $booking = Booking::create([
            'user_id' => auth()->id(),
            'service_id' => $cotizacion['service_id'],
            'address_id' => $addressId,

            'scheduled_at' => $agenda['fecha'] . ' ' . $this->convertirHora24($agenda['hora']),

            'status' => 'pendiente',
            'payment_status' => 'deposit_paid',

            'base_price' => $cotizacion['precio_base'],
            'extra_total' => $cotizacion['urgencia'] + $cotizacion['complejidad'] + $cotizacion['zona'],
            'total' => $cotizacion['total'],

            'notes' => $agenda['comentarios'] ?? null,
        ]);

        Payment::create([
            'booking_id' => $booking->id,
            'type' => 'deposit',
            'payment_method' => $request->payment_method,
            'amount' => $depositAmount,
            'status' => 'paid',
            'transaction_reference' => 'SIM-' . strtoupper(uniqid()),
            'paid_at' => now(),
        ]);

        session()->forget([
            'cotizacion',
            'address_id',
            'agenda',
        ]);

        return redirect()->route('cliente.pago.exito', $booking->id);
    }

    public function pagoExito(Booking $booking)
    {
        $booking->load(['service', 'address', 'payments']);
        return view('cliente.pago-exito', compact('booking'));
    }

    private function convertirHora24($hora)
    {
        return date('H:i:s', strtotime($hora));
    }

    public function misServicios()
    {
        $bookings = Booking::with([
                'service',
                'address',
                'payments',
                'technician'
            ])
            ->where('user_id', Auth::id())
            ->latest()
            ->get();

        return view('cliente.mis-servicios', compact('bookings'));
    }

    public function detalleServicio($id)
    {
        $booking = Booking::with([
                'service',
                'address',
                'payments',
                'review',
                'technician'
            ])
            ->where('user_id', Auth::id())
            ->findOrFail($id);

        return view('cliente.detalle-servicio', compact('booking'));
    }

    public function cancelarServicio($id)
    {
        $booking = Booking::where('user_id', Auth::id())
            ->findOrFail($id);

        if ($booking->status !== 'pendiente') {
            return back()->with('error', 'Este servicio ya no se puede cancelar.');
        }

        $scheduledAt = Carbon::parse($booking->scheduled_at);
        $now = Carbon::now();

        if ($scheduledAt->lessThan(now()->addHours(24))) {
            return back()->with('error', 'Solo puedes cancelar el servicio con al menos 24 horas de anticipación.');
        }

        $booking->update([
            'status' => 'cancelada',
            'cancellation_reason' => 'Cancelado por el cliente',
            'cancelled_at' => now(),
        ]);

        return redirect()
            ->route('cliente.mis-servicios')
            ->with('success', 'Tu servicio fue cancelado correctamente.');
    }

    public function reagendarServicio(Request $request, $id)
    {
        $booking = Booking::where('user_id', Auth::id())
            ->findOrFail($id);

        if ($booking->status !== 'pending') {
            return back()->with('error', 'Este servicio ya no se puede reagendar.');
        }

        $scheduledAt = \Carbon\Carbon::parse($booking->scheduled_at);

        if ($scheduledAt->lessThan(now()->addHours(24))) {
            return back()->with('error', 'Solo puedes reagendar el servicio con al menos 24 horas de anticipación.');
        }

        $request->validate([
            'new_date' => 'required|date|after_or_equal:today',
            'new_time' => 'required',
        ]);

        $newScheduledAt = \Carbon\Carbon::parse($request->new_date . ' ' . $request->new_time);

        if ($newScheduledAt->lessThan(now()->addHours(24))) {
            return back()->with('error', 'La nueva fecha debe tener al menos 24 horas de anticipación.');
        }

        $booking->update([
            'scheduled_at' => $newScheduledAt,
        ]);

        return redirect()
            ->route('cliente.servicio.detalle', $booking->id)
            ->with('success', 'Tu servicio fue reagendado correctamente.');
    }

    public function guardarReview(Request $request, $id)
    {
        $booking = Booking::where('user_id', Auth::id())
            ->findOrFail($id);

        if ($booking->status !== 'completed') {
            return back()->with('error', 'Sólo puedes calificar servicios completados.');
        }

        $existingReview = Review::where('booking_id', $booking->id)
            ->where('user_id', Auth::id())
            ->first();

        if ($existingReview) {
            return back()->with('error', 'Ya calificaste este servicio.');
        }

        $request->validate([
            'rating' => 'required|integer|min:1|max:5',
            'comment' => 'nullable|string|max:500',
        ]);

        Review::create([
            'user_id' => Auth::id(),
            'booking_id' => $booking->id,
            'rating' => $request->rating,
            'comment' => $request->comment,
            //'status' => true,
        ]);

        return back()->with('success', 'Gracias por calificar el servicio.');
    }


}
