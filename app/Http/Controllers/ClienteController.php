<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ClienteController extends Controller
{
    public function dashboard()
    {
        return view('cliente.dashboard'); // 
    }

    public function catalogo()
    {
        return view('cliente.catalogo');
    }

    
    public function cotizar($servicio)
    {
        return view('cliente.cotizar', compact('servicio'));
    }

    public function direccion()
    {
        return view('cliente.direccion');
    }

    public function guardarDireccion(Request $request)
    {
        $data = $request->validate([
            'calle' => 'required|string|max:255',
            'numero' => 'required|string|max:50',
            'colonia' => 'required|string|max:255',
            'municipio' => 'required|string|max:255',
            'estado' => 'required|string|max:255',
            'codigo_postal' => 'required|digits:5',
            'tipo_domicilio' => 'nullable|string|max:100',
            'referencias' => 'nullable|string|max:500',
        ]);

        // Sin BD: guarda en sesión
        session(['direccion' => $data]);

        return redirect()->route('cliente.agendar');
    }

    public function agendar()
    {
        return view('cliente.agendar');
    }

    public function checkout()
    {
        return view('cliente.checkout');
    }

    public function pago()
    {
        return view('cliente.pago');
    }
}
