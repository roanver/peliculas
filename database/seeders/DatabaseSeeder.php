<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $pelicula = \App\Models\Pelicula::create([
            'nombre' => 'Shrek 4 ',
            'director' => 'El burro',
            'año' => 2015
        ]);
        
        \App\Models\Pelicula::create([
            'nombre' => 'Pollito en fuga',
            'director' => 'pollito',
            'año' => 2016
        ]);
        
        \App\Models\Pelicula::create([
            'nombre' => 'Shrek',
            'director' => 'El burro',
            'año' => 2011
        ]);
        
        \App\Models\Pelicula::create([
            'nombre' => 'Shrek 2',
            'director' => 'El burro',
            'año' => 2012
        ]);
        
        \App\Models\Pelicula::create([
            'nombre' => 'Shrek 3',
            'director' => 'El burro',
            'año' => 2014
        ]);

        $user = \App\Models\User::create([
            'name' => 'El Cinefilo',
                'email' => 'cinefilo@el.cl',
            'password' => '12346'
                ]);
        \App\Models\User::create([
            'name' => 'Juanajuata',
            'email' => 'juanaju@el.cl',
            'password' => '12346'
        ]);

        \App\Models\User::create([
            'name' => 'Don Chicho',
            'email' => 'chichin@el.cl',
            'password' => '12346'
        ]);

        \App\Models\Ranking::create([
            'comentario' => 'maoma',
            'puntaje' => 2.5,
            'user_id' => $user->id,
            'pelicula_id'=> $pelicula->id
        ]);
    }
}
