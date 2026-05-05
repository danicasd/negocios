<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

class AdminServiceController extends Controller
{
    public function index()
    {
        return view('admin.services.index');
    }

    public function create()
    {
        return view('admin.services.create');
    }

    public function edit($id)
    {
        return view('admin.services.edit', compact('id'));
    }
}