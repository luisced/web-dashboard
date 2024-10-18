<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategoriaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('categorias')->insert([
            ['llave' => 'CAT1', 'nombre' => 'Categoría 1'],
            ['llave' => 'CAT2', 'nombre' => 'Categoría 2'],
            ['llave' => 'CAT3', 'nombre' => 'Categoría 3'],
        ]);
    }
}
