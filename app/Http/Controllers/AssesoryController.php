<?php

namespace App\Http\Controllers;

use App\Models\Assesory;
use App\Models\Asesor;
use App\Models\Categoria;
use Illuminate\Http\Request;

class AssesoryController extends Controller
{
    // Display a listing of the resource.
    public function index(Request $request)
    {
        $query = Assesory::with('category', 'asesors');

        if ($request->has('start')) {
            $query->where('date', '>=', $request->start);
        }

        if ($request->has('end')) {
            $query->where('date', '<=', $request->end);
        }

        if ($request->has('talent') && $request->talent != '') {
            $query->whereHas('asesors', function ($q) use ($request) {
                $q->where('asesors.id', $request->talent); // Specify the table for the id
            });
        }

        if ($request->has('category') && $request->category != '') {
            $query->where('category_id', $request->category);
        }

        // Add a check for 'asesor' filter
        if ($request->has('asesor') && $request->asesor != '') {
            $query->whereHas('asesors', function ($q) use ($request) {
                $q->where('asesors.id', $request->asesor); // Specify the table for the id
            });
        }

        $assesories = $query->get();

        return response()->json($assesories);
    }

    // Show the form for creating a new resource (not needed for API routes, but if you have forms)
    public function create()
    {
        $categories = Categoria::all();
        $asesors = Asesor::all();
        return response()->json(['categories' => $categories, 'asesors' => $asesors]);
    }

    // Store a newly created resource in storage.
    public function store(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'date' => 'required|date',
            'duration' => 'required|integer',
            'id_sede' => 'required|integer',
            'category_id' => 'required|exists:categorias,id',
            'asesors' => 'required|array'  // Asesors should be an array of IDs
        ]);

        // Create the assesory
        $assesory = Assesory::create($request->only(['email', 'date', 'duration', 'id_sede', 'category_id']));

        // Attach asesors (many-to-many relationship)
        $assesory->asesors()->sync($request->asesors);

        return response()->json($assesory, 201); // Return created resource with HTTP 201 status
    }

    // Display the specified resource.
    public function show($id)
    {
        $assesory = Assesory::with('category', 'asesors')->findOrFail($id);
        return response()->json($assesory);
    }

    // Show the form for editing the specified resource (not needed for API routes).
    public function edit($id)
    {
        $assesory = Assesory::with('category', 'asesors')->findOrFail($id);
        $categories = Categoria::all();
        $asesors = Asesor::all();

        return response()->json([
            'assesory' => $assesory,
            'categories' => $categories,
            'asesors' => $asesors
        ]);
    }

    // Update the specified resource in storage.
    public function update(Request $request, $id)
    {
        $request->validate([
            'email' => 'required|email',
            'date' => 'required|date',
            'duration' => 'required|integer',
            'id_sede' => 'required|integer',
            'category_id' => 'required|exists:categorias,id',
            'asesors' => 'required|array'
        ]);

        // Find the assesory to update
        $assesory = Assesory::findOrFail($id);

        // Update assesory
        $assesory->update($request->only(['email', 'date', 'duration', 'id_sede', 'category_id']));

        // Update many-to-many relationship
        $assesory->asesors()->sync($request->asesors);

        return response()->json($assesory);
    }

    // Remove the specified resource from storage.
    public function destroy($id)
    {
        $assesory = Assesory::findOrFail($id);
        $assesory->delete();

        return response()->json(null, 204);
    }

    public function dashboardResults()
    {
        $assesories = Assesory::with('category', 'asesors')->get();
        return view('dashboard-results', compact('assesories'));
    }

    public function getSummary(Request $request)
    {
        $query = Assesory::with('asesors');

        // Apply filters
        if ($request->has('start')) {
            $query->whereDate('created_at', '>=', $request->input('start'));
        }

        if ($request->has('end')) {
            $query->whereDate('created_at', '<=', $request->input('end'));
        }

        if ($request->has('talent')) {
            $query->whereHas('asesors', function ($q) use ($request) {
                $q->where('id', $request->input('talent'));
            });
        }

        if ($request->has('location')) {
            $query->where('location', $request->input('location'));  // Assuming 'location' is a column in the Assesory model
        }

        if ($request->has('category')) {
            $query->where('category_id', $request->input('category'));  // Assuming 'category_id' is a foreign key in Assesory
        }

        $assesories = $query->get();

        $sessionsCount = $assesories->count();
        $totalStudentHours = $assesories->sum('duration') / 60; // Assuming duration is in minutes
        $averageSessionDuration = $sessionsCount > 0 ? $assesories->avg('duration') : 0;
        $totalTalentHours = $assesories->sum(function ($assesory) {
                return $assesory->asesors->count() * $assesory->duration;
            }) / 60;
        $uniqueStudents = $assesories->pluck('email')->unique()->count();

        return response()->json([
            'sessionsCount' => $sessionsCount,
            'totalStudentHours' => $totalStudentHours,
            'averageSessionDuration' => $averageSessionDuration,
            'totalTalentHours' => $totalTalentHours,
            'uniqueStudents' => $uniqueStudents,
        ]);
    }

}
