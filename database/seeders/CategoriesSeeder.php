<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategoriesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('categories')->insert([
            'nombreCategoria' => 'Principal',
            'Descripcion' => 'Categoria principal para posts',
            'FechaCreacion' => date("Y-m-d H:i:s"),
            'UsuarioCreador' => 'Usuario Administrador',
        ]);

        DB::table('categories')->insert([
            'nombreCategoria' => 'Bebidas',
            'Descripcion' => 'Categoria de bebidas alcoholicas para vender',
            'FechaCreacion' => date("Y-m-d H:i:s"),
            'UsuarioCreador' => 'Usuario Administrador',
        ]);


        DB::table('categories')->insert([
            'nombreCategoria' => 'Videojuegos',
            'Descripcion' => 'Categoria de videojuegos para entradas',
            'FechaCreacion' => date("Y-m-d H:i:s"),
            'UsuarioCreador' => 'Gus',
        ]);
    }
}
