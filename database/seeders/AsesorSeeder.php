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
            ['correo' => 'example4@mail.com', 'nombre' => 'Asesor 4'],
            ['correo' => 'example5@mail.com', 'nombre' => 'Asesor 5'],
            ['correo' => 'example6@mail.com', 'nombre' => 'Asesor 6'],
            ['correo' => 'example7@mail.com', 'nombre' => 'Asesor 7'],
            ['correo' => 'example8@mail.com', 'nombre' => 'Asesor 8'],
            ['correo' => 'example9@mail.com', 'nombre' => 'Asesor 9'],
            ['correo' => 'example10@mail.com', 'nombre' => 'Asesor 10'],
        ]);
    }
}
