<?php

namespace App\Http\Controllers;
use App\Models\Category;
use App\Models\Service;
use App\Models\Address;
use App\Models\Booking;
use App\Models\Payment;

use Illuminate\Http\Request;

class ClienteController extends Controller
{
    public function dashboard()
    {
        return view('cliente.dashboard'); 
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

            'status' => 'pending',
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
}
