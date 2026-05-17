<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Service;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class AdminServiceController extends Controller
{
    /**
     * Mostrar todos los servicios.
     */
    public function index()
    {
        $services = Service::with('category')
            ->latest()
            ->get();

        return view('admin.services.index', compact('services'));
    }

    /**
     * Mostrar formulario para crear un servicio.
     */
    public function create()
    {
        $categories = Category::where('status', true)
            ->orderBy('name')
            ->get();

        return view('admin.services.create', compact('categories'));
    }

    /**
     * Guardar un nuevo servicio en la base de datos.
     */
    public function store(Request $request)
    {
        $request->validate([
            'category_id' => 'required|exists:categories,id',
            'name' => 'required|string|max:150|unique:services,name',
            'description' => 'nullable|string|max:1000',
            'base_price' => 'required|numeric|min:0',
            'estimated_duration' => 'nullable|string|max:100',
            'status' => 'required|boolean',
        ]);

        Service::create([
            'category_id' => $request->category_id,
            'name' => $request->name,
            'description' => $request->description,
            'base_price' => $request->base_price,
            'estimated_duration' => $request->estimated_duration,
            'status' => $request->status,
        ]);

        return redirect()
            ->route('admin.services.index')
            ->with('success', 'Servicio creado correctamente.');
    }

    /**
     * Mostrar formulario para editar un servicio.
     */
    public function edit(Service $service)
    {
        $categories = Category::where('status', true)
            ->orderBy('name')
            ->get();

        return view('admin.services.edit', compact('service', 'categories'));
    }

    /**
     * Actualizar un servicio existente.
     */
    public function update(Request $request, Service $service)
{
    $request->validate([
        'category_id' => 'required|exists:categories,id',
        'name' => [
            'required',
            'string',
            'max:150',
            Rule::unique('services', 'name')->ignore($service->id),
        ],
        'description' => 'nullable|string|max:1000',
        'base_price' => 'required|numeric|min:0',
        'estimated_duration' => 'nullable|string|max:100',
        'status' => 'required|boolean',
    ]);

    $service->update([
        'category_id' => $request->category_id,
        'name' => $request->name,
        'description' => $request->description,
        'base_price' => $request->base_price,
        'estimated_duration' => $request->estimated_duration,
        'status' => $request->status,
    ]);

    return redirect()
        ->route('admin.services.index')
        ->with('success', 'Servicio actualizado correctamente.');
}

    /**
     * Eliminar un servicio.
     */
    public function destroy(Service $service)
    {
        $service->update([
            'status' => !$service->status,
        ]);

        $message = $service->status
            ? 'Servicio activado correctamente.'
            : 'Servicio desactivado correctamente.';

        return redirect()
            ->route('admin.services.index')
            ->with('success', $message);
    }
}