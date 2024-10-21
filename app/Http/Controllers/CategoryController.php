<?php

namespace App\Http\Controllers;

use App\Models\Assesory;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function summary()
    {
        $categories = Assesory::with('category', 'asesors')
            ->get()
            ->groupBy('category_id')
            ->map(function ($assesories, $categoryId) {
                $category = $assesories->first()->category;
                $sessionsCount = $assesories->count();
                $uniqueProfessorsCount = $assesories->unique('email')->count();
                $totalHoursProf = $assesories->sum('duration');
                $totalHoursTalent = $assesories->sum(function ($assesory) {
                    return $assesory->asesors->sum('duration');
                });
                $averageDurationProf = $totalHoursProf / max($sessionsCount, 1);
                $averageDurationTalent = $totalHoursTalent / max($sessionsCount, 1);

                return (object) [
                    'key' => $category->llave,
                    'nombre' => $category->nombre,
                    'sessions_count' => $sessionsCount,
                    'unique_professors_count' => $uniqueProfessorsCount,
                    'total_hours_prof' => $totalHoursProf,
                    'total_hours_talent' => $totalHoursTalent,
                    'average_duration_prof' => $averageDurationProf,
                    'average_duration_talent' => $averageDurationTalent,
                ];
            });

        return view('categories-summary', ['categories' => $categories]);
    }
}
