<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Assesory;
use App\Models\Asesor;
use App\Models\Categoria;

class AssesorySeeder extends Seeder
{
    public function run()
    {
        // Fetch all asesors and categories
        $asesors = Asesor::all();
        $categories = Categoria::all();

        // Map existing data to create assesories
        $assesoryData = [
            [
                'email' => 'assesory1@example.com',
                'date' => now()->subDays(1),
                'duration' => 60,
                'id_sede' => 1,
                'category_id' => $categories[0]->id,
                'asesor_ids' => [$asesors[0]->id, $asesors[1]->id],
            ],
            [
                'email' => 'assesory2@example.com',
                'date' => now()->subDays(2),
                'duration' => 45,
                'id_sede' => 2,
                'category_id' => $categories[1]->id,
                'asesor_ids' => [$asesors[2]->id, $asesors[3]->id],
            ],
            [
                'email' => 'assesory3@example.com',
                'date' => now()->subDays(3),
                'duration' => 30,
                'id_sede' => 3,
                'category_id' => $categories[2]->id,
                'asesor_ids' => [$asesors[4]->id, $asesors[5]->id],
            ],
            [
                'email' => 'assesory4@example.com',
                'date' => now()->subDays(4),
                'duration' => 90,
                'id_sede' => 4,
                'category_id' => $categories[0]->id,
                'asesor_ids' => [$asesors[6]->id, $asesors[7]->id],
            ],
            [
                'email' => 'assesory5@example.com',
                'date' => now()->subDays(5),
                'duration' => 120,
                'id_sede' => 5,
                'category_id' => $categories[1]->id,
                'asesor_ids' => [$asesors[8]->id, $asesors[9]->id],
            ],
        ];

        foreach ($assesoryData as $data) {
            // Create the assesory
            $assesory = Assesory::create([
                'email' => $data['email'],
                'date' => $data['date'],
                'duration' => $data['duration'],
                'id_sede' => $data['id_sede'],
                'category_id' => $data['category_id'],
            ]);

            // Attach asesors to the assesory
            $assesory->asesors()->attach($data['asesor_ids']);
        }
    }
}
