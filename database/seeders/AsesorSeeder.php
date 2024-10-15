<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AsesorSeeder extends Seeder
{
    public function run()
    {
        DB::table('asesors')->insert([
            ['correo' => 'example1@mail.com', 'nombre' => 'Asesor 1'],
            ['correo' => 'example2@mail.com', 'nombre' => 'Asesor 2'],
            ['correo' => 'example3@mail.com', 'nombre' => 'Asesor 3'],
        ]);
    }
}
