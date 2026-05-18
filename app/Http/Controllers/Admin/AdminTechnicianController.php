<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Technician;
use Illuminate\Http\Request;
use App\Models\Service;

class AdminTechnicianController extends Controller
{
    public function index()
    {
        $technicians = Technician::latest()->get();

        return view('admin.technicians.index', compact('technicians'));
    }

    public function create()
    {
        $services = Service::where('status', true)
            ->orderBy('name')
            ->get();

        return view('admin.technicians.create', compact('services'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'phone' => 'required|string|max:20',
            'speciality' => 'required|string|max:100',
            'availability' => 'nullable|array',
            'availability.*' => 'string|max:10',
            'status' => 'required|boolean',
        ]);

        Technician::create([
            'name' => $request->name,
            'phone' => $request->phone,
            'speciality' => $request->speciality,
            'availability' => $request->availability ? implode(', ', $request->availability) : null,
            'status' => $request->status,
        ]);

        return redirect()
            ->route('admin.technicians.index')
            ->with('success', 'Técnico creado correctamente.');
    }

    public function edit(Technician $technician)
    {
        $services = Service::where('status', true)
            ->orderBy('name')
            ->get();

        return view('admin.technicians.edit', compact('technician', 'services'));
    }

    public function update(Request $request, Technician $technician)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'phone' => 'required|string|max:20',
            'speciality' => 'required|string|max:100',
            'availability' => 'nullable|array',
            'availability.*' => 'string|max:10',
            'status' => 'required|boolean',
        ]);

        $technician->update([
            'name' => $request->name,
            'phone' => $request->phone,
            'speciality' => $request->speciality,
            'availability' => $request->availability ? implode(', ', $request->availability) : null,
            'status' => $request->status,
        ]);

        return redirect()
            ->route('admin.technicians.index')
            ->with('success', 'Técnico actualizado correctamente.');
    }

    public function destroy(Technician $technician)
    {
        $technician->update([
            'status' => !$technician->status,
        ]);

        $message = $technician->status
            ? 'Técnico activado correctamente.'
            : 'Técnico desactivado correctamente.';

        return redirect()
            ->route('admin.technicians.index')
            ->with('success', $message);
    }
}