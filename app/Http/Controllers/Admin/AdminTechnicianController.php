<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

class AdminTechnicianController extends Controller
{
    public function index()
    {
        return view('admin.technicians.index');
    }

    public function create()
    {
        return view('admin.technicians.create');
    }

    public function edit($id)
    {
        return view('admin.technicians.edit', compact('id'));
    }
}