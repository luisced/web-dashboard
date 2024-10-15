<?php

namespace App\Http\Controllers;

use App\Models\Asesor;
use Illuminate\Http\Request;

class AsesorController extends Controller
{
    // Get all asesors
    public function index()
    {
        return response()->json(Asesor::all(), 200);
    }

    // Create a new asesor
    public function store(Request $request)
    {
        $validated = $request->validate([
            'correo' => 'required|email|max:50',
            'nombre' => 'required|string|max:100',
        ]);

        $asesor = Asesor::create($validated);

        return response()->json($asesor, 201);
    }

    // Get a specific asesor by ID
    public function show(Asesor $asesor)
    {
        return response()->json($asesor, 200);
    }

    // Update an existing asesor
    public function update(Request $request, Asesor $asesor)
    {
        $validated = $request->validate([
            'correo' => 'required|email|max:50',
            'nombre' => 'required|string|max:100',
        ]);

        $asesor->update($validated);

        return response()->json($asesor, 200);
    }

    // Delete an asesor
    public function destroy(Asesor $asesor)
    {
        $asesor->delete();

        return response()->json(null, 204);
    }
}
